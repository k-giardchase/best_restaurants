<?php

    class Restaurant
    {
        private $name;
        private $review;
        private $stars;
        private $type_id;
        private $id;

        function __construct($name, $review, $stars, $type_id, $id = null)
        {
            $this->name = $name;
            $this->review = $review;
            $this->stars = $stars;
            $this->type_id = $type_id;
            $this->id = $id;
        }

        function getName()
        {
            return $this->name;
        }

        function setName($new_name)
        {
            $this->name = (string) $new_name;
        }

        function getReview()
        {
            return $this->review;
        }

        function setReview($new_review)
        {
            $this->review = (string) $new_review;
        }

        function getStars()
        {
            return $this->stars;
        }

        function setStars($new_stars)
        {
            $this->stars = (int) $new_stars;
        }

        function getTypeId()
        {
            $return $this->type_id;
        }

        function setTypeId($new_type_id)
        {
            $this->type_id = (int) $new_type_id;
        }

        function getId()
        {
            return $this->id;
        }

        function setId($new_id)
        {
            $this->id = (int) $new_id;
        }
    }

?>
