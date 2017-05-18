<?php
    /**
     * This is a class that allows you to create a blog post for the blog site
     *
     * @author Caleb Ostrander
     * @version 1.0
     */
    class BlogPost
    {
        private $_title;
        private $_post;
        private $_id;
        
        /**
         * A constructor for the blog post class setting all the basic information
         * for a blog post
         *
         * @param Blog title
         * @param Entry post
         * @param Id
         */
        function __construct($title = "NA", $post = "NA", $id = -1)
        {
            $this->_title = $title;
            $this->_post = $post;
            $this->_id = $id;
        }
        
        /**
         * A setter for their title
         *
         *@param Their title
         */
        function setTitle($title)
        {
            $this->_title = $title;
        }
        
        /**
         * A getter for their title
         *
         * @return Their title
         */
        function getTitle()
        {
            return $this->_title;
        }
        
        /**
         * A setter for their post
         *
         *@param Their post
         */
        function setPost($post)
        {
            $this->_post = $post;
        }
        
        /**
         * A getter for their post
         *
         * @return Their post
         */
        function getPost()
        {
            return $this->_post;
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
    }