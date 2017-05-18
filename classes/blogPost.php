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
        private $_entry;
        private $_id;
        
        /**
         * A constructor for the blog post class setting all the basic information
         * for a blog post
         *
         * @param Blog title
         * @param Entry text
         * @param Id
         */
        function __construct($title = "NA", $entry = "NA", $id = -1)
        {
            $this->_title = $title;
            $this->_entry = $entry;
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
         * A setter for their entry
         *
         *@param Their entry
         */
        function setEntry($entry)
        {
            $this->_entry = $entry;
        }
        
        /**
         * A getter for their entry
         *
         * @return Their entry
         */
        function getEntry()
        {
            return $this->_entry;
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