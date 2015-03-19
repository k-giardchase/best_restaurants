<?php

    class Cuisine
    {
            private $type;
            private $id;

        function __construct($type, $id=null)
        {
            $this->type = $type;
            $this->id = $id;
        }

        function getType()
        {
            return $this->type;
        }
        function setType($new_type)
        {
            $this->type = (string) $new_type;
        }

        function getId()
        {
            return $this->id;
        }

        function setId($new_id)
        {
            $this->id = (int) $new_id;
        }

        function save(){
            $statement = $GLOBALS['DB']->query("INSERT INTO cuisines (type) VALUES ('{$this->getType()}') RETURNING id;");
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $this->setId($result['id']);
        }

        static function getAll(){
            $returned_cuisines = $GLOBALS['DB']->query("SELECT * FROM cuisines ;");
            $cuisines = array();
            foreach ($returned_cuisines as $cuisine)
            {
                $type = $cuisine['type'];
                $id = $cuisine['id'];
                $new_cuisine = new Cuisine($type, $id);
                array_push($cuisines, $new_cuisine);
            }
            return $cuisines;

        }

        function getRestaurants()
        {
            $restaurants = array();
            $returned_restaurants = $GLOBALS['DB']->query("SELECT * FROM restaurants WHERE type_id = {$this->getId()};");
            foreach($returned_restaurants as $restaurant){
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
            $GLOBALS['DB']->exec("DELETE FROM cuisines *;");
        }

        static function find($search_id)
        {
            $found_cuisine = null;
            $cuisines = Cuisine::getAll();
            foreach($cuisines as $cuisine){
                $cuisine_id = $cuisine->getId();
                if($cuisine_id == $search_id){
                    $found_cuisine = $cuisine;
                }
            }
            return $found_cuisine;
        }

        function update($new_type)
        {
            $GLOBALS['DB']->exec("UPDATE cuisines SET type = '{$new_type}' WHERE id = {$this->getId()};");
            $this->setType($new_type);
        }


    }

?>
