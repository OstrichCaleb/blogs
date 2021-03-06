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
        private $_memberId;
        private $_date;
        private $_wordCount;
        
        /**
         * A constructor for the blog post class setting all the basic information
         * for a blog post
         *
         * @param Blog title
         * @param Entry post
         * @param Id
         * @param memberId
         * @param date entered
         * @param words in post
         */
        function __construct($title = "NA", $post = "NA", $date = NULL, $wordCount = 0, $id = -1, $memberId = -1)
        {
            $this->_title = $title;
            $this->_post = $post;
            $this->_date = $date;
            $this->_id = $id;
            $this->_memberId = $memberId;
            $this->_wordCount = $wordCount;
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
        
        /**
         * A setter for their memberId
         *
         *@param Their memberId
         */
        function setMemberId($memberId)
        {
            $this->_memberId = $memberId;
        }
        
        /**
         * A getter for their memberId
         *
         * @return Their memberId
         */
        function getMemberId()
        {
            return $this->_memberId;
        }
        
        /**
         * A setter for their date
         *
         *@param Their date
         */
        function setDate($date)
        {
            $this->_date = $date;
        }
        
        /**
         * A getter for their date
         *
         * @return Their date
         */
        function getDate()
        {
            return substr($this->_date, 0, 11);
        }
        
        /**
         * A setter for their wordCount
         *
         *@param Their wordCount
         */
        function setWordCount($wordCount)
        {
            $this->_wordCount = $wordCount;
        }
        
        /**
         * A getter for their wordCount
         *
         * @return Their wordCount
         */
        function getWordCount()
        {
            return $this->_wordCount;
        }
    }