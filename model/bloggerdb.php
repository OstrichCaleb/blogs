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
            $insert = 'INSERT INTO posts (post, title)
                                    VALUES (:post, :title)';
            
            $statement = $this->_pdo->prepare($insert);
            $statement->bindValue(':post', $post->getPost(), PDO::PARAM_STR);
            $statement->bindValue(':title', $post->getTitle(), PDO::PARAM_STR);
            
            $statement->execute();
            
            //Return ID of inserted row
            return $this->_pdo->lastInsertId();
        }
        
        /**
         * A method to add a blog to a bloggers profile
         *
         *@param The blogger you want to add
         *@param The blog post you want to add
         */
        function addBlogConnection($blogger_id, $post_id)
        {
            $insert = 'INSERT INTO bloggerposts (blogger_id, post_id)
                                    VALUES (:blogger_id, :post_id)';
            
            $statement = $this->_pdo->prepare($insert);
            $statement->bindValue(':blogger_id', $blogger_id, PDO::PARAM_INT);
            $statement->bindValue(':post_id', $post_id, PDO::PARAM_INT);
            
            $statement->execute();
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
            $select = 'SELECT username, email, photo, bio, blogger_id FROM bloggers';
                            
            $results = $this->_pdo->query($select);
             
            $resultsArray = array();
             
            //map each blogger id to a row of data for that blogger
            while ($row = $results->fetch(PDO::FETCH_ASSOC)) {
                $resultsArray[$row['blogger_id']] = $row;
            }
             
            return $resultsArray;
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
        
        /**
         * A method to return the string of interests of any given member
         *
         *
         *@param the members id
         */
        function getInterestString($member_id)
        {
            $select = 'SELECT interest_id FROM memberinterest WHERE member_id=:id';
             
            $statement = $this->_pdo->prepare($select);
            $statement->bindValue(':id', $member_id, PDO::PARAM_INT);
            $statement->execute();
             
            $interests = $statement->fetchAll(PDO::FETCH_ASSOC);
            
            $interestString = "";
            $count = 0;
            $select = 'SELECT interest_desc FROM interests WHERE interest_id=:id';
            $statement = $this->_pdo->prepare($select);
            
            foreach($interests as $interest_id)
            {
                $statement->bindValue(':id', $interest_id['interest_id'], PDO::PARAM_INT);
                $statement->execute();
                
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                
                if ($count > 0)
                {
                    $interestString .= ", " . $row['interest_desc'];
                } else
                {
                    $interestString .= $row['interest_desc'];
                    $count++;
                }
            }
            
            return $interestString;
        }
    }