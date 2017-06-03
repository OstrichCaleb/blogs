<?php

require '/home/costrander/config.php';

    /**
     * Provides CRUD acces
     *
     * PHP Version 5
     *
     * @author Caleb Ostrander 
     * @version 1.0
     */
    
    /*
     *A blogger DB class that allows you to create
     *bloggers, as well as blog posts
     */
    class BloggerDB
    {
        private $_pdo;
        
        function __construct()
        {
            try {
                //Establish database connection
                $this->_pdo = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
                
                //Keep the connection open for reuse to improve performance
                $this->_pdo->setAttribute( PDO::ATTR_PERSISTENT, true);
                
                //Throw an exception whenever a database error occurs
                $this->_pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            }
            catch (PDOException $e) {
                die( "Error!: " . $e->getMessage());
            }
        }
        
         
        /**
         * A method to add a blogger to the database
         *
         *@param The blogger object that you want to add
         *@return The id of the new blogger
         */
        function addBlogger($blogger)
        {
            $insert = 'INSERT INTO bloggers (username, email, password, photo, bio)
                                    VALUES (:username, :email, :password, :photo, :bio)';
            
            $statement = $this->_pdo->prepare($insert);
            $statement->bindValue(':username', $blogger->getUsername(), PDO::PARAM_STR);
            $statement->bindValue(':email', $blogger->getEmail(), PDO::PARAM_STR);
            $statement->bindValue(':password', $blogger->getPassword(), PDO::PARAM_INT);
            $statement->bindValue(':photo', $blogger->getPhoto(), PDO::PARAM_STR);
            $statement->bindValue(':bio', $blogger->getBio(), PDO::PARAM_STR);
            
            $statement->execute();
            
            //Return ID of inserted row
            return $this->_pdo->lastInsertId();
        }
        
        /**
         * A method to add a blog post to the database
         *
         *@param The blog post object that you want to add
         *@return The id of the new blog post
         */
        function addPost($post)
        {
            $insert = 'INSERT INTO posts (post, title, member_id)
                                    VALUES (:post, :title, :member_id)';
            
            $statement = $this->_pdo->prepare($insert);
            $statement->bindValue(':post', $post->getPost(), PDO::PARAM_STR);
            $statement->bindValue(':title', $post->getTitle(), PDO::PARAM_STR);
            $statement->bindValue(':member_id', $post->getMemberId(), PDO::PARAM_STR);
            
            $statement->execute();
            
            //Return ID of inserted row
            return $this->_pdo->lastInsertId();
        }
         
        
        /**
         * Returns all bloggers in the database collection.
         *
         * @access public
         *
         * @return an associative array of bloggers indexed by id
         */
        function allBloggers()
        {
            $select = "SELECT *, (SELECT COUNT(*) AS 'numPosts' FROM posts WHERE posts.member_id = bloggers.blogger_id) FROM bloggers";
                            
            $results = $this->_pdo->query($select);
             
            $resultsArray = array();
             
            // create an array of blogger objects
            while ($row = $results->fetch(PDO::FETCH_ASSOC)) {
                
                $temp = new Blogger($row['username'], $row['email'], $row['photo'], $row['bio'], $row['blogger_id'], $row["(SELECT COUNT(*) AS 'numPosts' FROM posts WHERE posts.member_id = bloggers.blogger_id)"], "pass", $this->latestBlog($row['blogger_id']));
                $resultsArray[] = $temp;
            }
            
            return $resultsArray;
        }
        
        function login($user)
        {
            $select = 'SELECT blogger_id, password FROM bloggers WHERE username = :user';
             
            $statement = $this->_pdo->prepare($select);
            $statement->bindValue(':user', $user, PDO::PARAM_INT);
            $statement->execute();
             
            $creds = $statement->fetch(PDO::FETCH_ASSOC);
            
            return $creds;
        }
         
        /**
         * Returns a blogger that has the given id.
         *
         * @access public
         * @param int $id the id of the blogger
         *
         * @return an associative array of blogger attributes, or false if
         * the member was not found
         */
        function bloggerById($id)
        {
            $select = 'SELECT * FROM bloggers WHERE blogger_id = :id';
             
            $statement = $this->_pdo->prepare($select);
            $statement->bindValue(':id', $id, PDO::PARAM_INT);
            $statement->execute();
             
            $row = $statement->fetch(PDO::FETCH_ASSOC);
            
            $temp = new Blogger($row['username'], $row['email'], $row['photo'], $row['bio'], $row['blogger_id'], $row['numPosts'], null, $this->latestBlog($id));
            
            return $temp;
        }
        
        /**
         * Returns true or false if the username is found in the database
         *
         * @access public
         * @param the username that you want to check for
         *
         * @return true or false if the id is found
         */
        function checkUsername($username)
        {
            $select = 'SELECT * FROM bloggers WHERE username = :username';
             
            $statement = $this->_pdo->prepare($select);
            $statement->bindValue(':username', $username, PDO::PARAM_INT);
            $statement->execute();
             
            $row = $statement->fetch(PDO::FETCH_ASSOC);
            
            return $row;
        }
        
        /**
         * Returns a summary of the latest blog by a blogger
         *
         * @access public
         * @param int $id the id of the blogger
         *
         * @return a String that has a summary of the latest blog
         */
        function latestBlog($id)
        {
            $select = 'SELECT post FROM posts WHERE member_id = :id ORDER BY date DESC LIMIT 1';
             
            $statement = $this->_pdo->prepare($select);
            $statement->bindValue(':id', $id, PDO::PARAM_INT);
            $statement->execute();
             
            $row = $statement->fetch(PDO::FETCH_ASSOC);
            
            $summary = substr($row['post'], 0, 200);
            
            return $summary;
        }
        
        /**
         * Returns an array of blogs by a user that has the given id.
         *
         * @access public
         * @param int $id the id of the blogger
         *
         * @return an associative array of blogs by the blogger
         */
        function blogsById($id)
        {
            $select = "SELECT * FROM posts WHERE member_id = :id ORDER BY date DESC";
             
            $statement = $this->_pdo->prepare($select);
            $statement->bindValue(':id', $id, PDO::PARAM_INT);
            $statement->execute();
            
            $resultsArray = array();
             
            // create an array of blogger objects
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                $temp = new BlogPost($row['title'], substr($row['post'],0,155), $row['date'], str_word_count($row['post']), $row['post_id']);
                $resultsArray[] = $temp;
            }
            
            return $resultsArray;
        }
        
        /**
         * Returns a blog by a user that has the given id.
         *
         * @access public
         * @param int $id the id of the blog
         *
         * @return a blog object
         */
        function blogById($id)
        {
            $select = "SELECT * FROM posts WHERE post_id = :id";
             
            $statement = $this->_pdo->prepare($select);
            $statement->bindValue(':id', $id, PDO::PARAM_INT);
            $statement->execute();
        
            $row = $statement->fetch(PDO::FETCH_ASSOC);
            $temp = new BlogPost($row['title'], $row['post'], $row['date'], str_word_count($row['post']), $row['post_id'], $row['member_id']);
            
            return $temp;
        }
        
        /**
         * Deletes a post associated with a post id
         *
         * @access public
         * @param int $id the id of the post you want to delete
         */
        function delPost($id)
        {
            $select = "DELETE FROM posts WHERE post_id = :id";
             
            $statement = $this->_pdo->prepare($select);
            $statement->bindValue(':id', $id, PDO::PARAM_INT);
            $statement->execute();
        }
        
        /**
         * A method to update a blog post to the database
         *
         *@param The blog post object that you want to update
         */
        function updatePost($post)
        {
            $insert = 'UPDATE posts SET post = :post, title = :title WHERE post_id = :post_id';
            
            $statement = $this->_pdo->prepare($insert);
            $statement->bindValue(':post', $post->getPost(), PDO::PARAM_STR);
            $statement->bindValue(':title', $post->getTitle(), PDO::PARAM_STR);
            $statement->bindValue(':post_id', $post->getId(), PDO::PARAM_STR);
            
            $statement->execute();
        }
    }