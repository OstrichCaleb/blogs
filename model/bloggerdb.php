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
                                    VALUES (:post, :title, member_id)';
            
            $statement = $this->_pdo->prepare($insert);
            $statement->bindValue(':post', $post->getPost(), PDO::PARAM_STR);
            $statement->bindValue(':title', $post->getTitle(), PDO::PARAM_STR);
            $statement->bindValue(':title', $post->getMemberId(), PDO::PARAM_STR);
            
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
            $select = 'SELECT *, (SELECT COUNT(*) AS "numPosts" FROM posts WHERE posts.member_id = bloggers.blogger_id) FROM bloggers';
                            
            $results = $this->_pdo->query($select);
             
            $resultsArray = array();
             
            // create an array of blogger objects
            while ($row = $results->fetch(PDO::FETCH_ASSOC)) {
                $temp = new Blogger($row['username'], $row['email'], $row['photo'], $row['bio'], $row['blogger_id'], $row['numPosts']);
                $resultsArray[] = $temp;
            }
            
            return $resultsArray;
        }
        
        function login($user)
        {
            $select = 'SELECT blogger_id, password FROM bloggers where username = :user';
             
            $statement = $this->_pdo->prepare($select);
            $statement->bindValue(':user', $user, PDO::PARAM_INT);
            $statement->execute();
             
            $creds = $statement->fetch(PDO::FETCH_ASSOC);
            
            return $creds;
        }
         
        /**
         * Returns a member that has the given id.
         *
         * @access public
         * @param int $id the id of the member
         *
         * @return an associative array of member attributes, or false if
         * the member was not found
         */
        function memberById($id)
        {
            $select = 'SELECT member_id, fname, lname, age, gender, phone, email,
                            state, seeking, bio, premium, image FROM members where member_id = :id';
             
            $statement = $this->_pdo->prepare($select);
            $statement->bindValue(':id', $id, PDO::PARAM_INT);
            $statement->execute();
             
            return $statement->fetch(PDO::FETCH_ASSOC);
        }
        
    }