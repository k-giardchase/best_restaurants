<?php

    class Restaurant
    {
        private $name;
        private $review;
        private $stars;
        private $type_id;
        private $id;

        function __construct($name, $review, $stars, $id = null, $type_id)
        {
            $this->name = $name;
            $this->review = $review;
            $this->stars = $stars;
            $this->id = $id;
            $this->type_id = $type_id;
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

        function getId()
        {
            return $this->id;
        }

        function setId($new_id)
        {
            $this->id = (int) $new_id;
        }

        function getTypeId()
        {
            $return $this->type_id;
        }

        function setTypeId($new_type_id)
        {
            $this->type_id = (int) $new_type_id;
        }

        function save()
        {
            $statement = $GLOBALS['DB']->query("INSERT INTO restaurants (name, review, stars) VALUES ('{$this->getName()}', '{$this->getReview()}', {$this->getStars()}, {$this->getTypeId()}) RETURNING id;");
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $this->setId($result['id']);
        }

        static function getAll()
        {
            $returned_restaurants = $GLOBALS['DB']->query('SELECT * FROM restaurants;');
            $restaurants = array();
            foreach($returned_restaurants as $restaurant)
            {
                $name = $restaurant['name'];
                $review = $restaurant['review'];
                $stars = $restaurant['stars'];
                $id = $restaurant['id'];
                $type_id = $restaurant['type_id'];
                $new_restaurant = new Restaurant($name, $review, $stars, $id, $type_id);
                array_push($restaurants, $new_restaurant);
            }
            return $restaurants;

        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM restaurants *;");
        }

        static function find($search_id)
        {
            $found_restaurant = null;
            $restaurants = Restaurant::getAll();
            foreach($restaurants as $restaurant)
            {
                $restaurant_id = $restaurant->getId();
                if( $restaurant_id == $search_id) {
                    $found_restaurant = $restaurant;
                }
            }
            return $found_restaurant;
        }
    }

?>
