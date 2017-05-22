<?php
    /**
     * This is a class that allows you to create a blogger for the blog site
     *
     * @author Caleb Ostrander
     * @version 1.0
     */
    class Blogger
    {
        private $_username;
        private $_email;
        private $_password;
        private $_photo;
        private $_bio;
        private $_id;
        private $_numPosts;
        private $_latest;
        
        /**
         * A constructor for the Blogger class setting all the basic information
         * for a blogger
         *
         * @param Usernmane
         * @param Email
         * @param Password
         * @param Photo 
         * @param Biography
         * @param id
         * @param number of their posts
         * @param their latests post
         */
        function __construct($username = "NA", $email = "NA", $photo = "NA", $bio = "NA", $id = -1, $numPosts = 0, $password = "NA", $latest = "")
        {
            $this->_username = $username;
            $this->_email = $email;
            $this->_password = $password;
            $this->_photo = $photo;
            $this->_bio = $bio;
            $this->_id = $id;
            $this->_numPosts = $numPosts;
            $this->_latest = $latest;
        }
        
        /**
         * A setter for their username
         *
         *@param Their username
         */
        function setUsername($username)
        {
            $this->_username = $username;
        }
        
        /**
         * A getter for their username
         *
         * @return Their username
         */
        function getUsername()
        {
            return $this->_username;
        }
        
        /**
         * A setter for their password
         *
         *@param Their password
         */
        function setPassword($password)
        {
            $this->_password = $password;
        }
        
        /**
         * A getter for their password
         *
         * @return Their password
         */
        function getPassword()
        {
            return $this->_password;
        }
        
        /**
         * A setter for their email
         *
         *@param Their email
         */
        function setEmail($email)
        {
            $this->_email = $email;
        }
        
        /**
         * A getter for their email
         *
         * @return Their email
         */
        function getEmail()
        {
            return $this->_email;
        }
        
        /**
         * A setter for their photo
         *
         *@param Their photo
         */
        function setPhoto($photo)
        {
            $this->_photo = $photo;
        }
        
        /**
         * A getter for their photo
         *
         * @return Their photo
         */
        function getPhoto()
        {
            return $this->_photo;
        }
        
        /**
         * A setter for their ID
         *
         *@param Their ID
         */
        function setId($id)
        {
            $this->_id = $id;
        }
        
        /**
         * A getter for their id
         *
         * @return Their ID
         */
        function getId()
        {
            return $this->_id;
        }
        
        /**
         * A setter for their bio
         *
         *@param Their bio
         */
        function setBio($bio)
        {
            $this->_bio = $bio;
        }
        
        /**
         * A getter for their bio
         *
         * @return Their bio
         */
        function getBio()
        {
            return $this->_bio;
        }
        
        /**
         * A setter for their posts
         *
         *@param Their number of posts
         */
        function setNumPosts($numPosts)
        {
            $this->_numPosts = $numPosts;
        }
        
        /**
         * A getter for their numPosts
         *
         * @return Their numPosts
         */
        function getNumPosts()
        {
            return $this->_numPosts;
        }
        
        /**
         * A setter for their latests post
         *
         *@param Their number of latests post
         */
        function setLatest($latest)
        {
            $this->_latest = $latest;
        }
        
        /**
         * A getter for their latests post
         *
         * @return Their latests post
         */
        function getLatest()
        {
            return $this->_latest;
        }
    }