<?php


    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    // require_once __DIR__."/../src/Cuisine.php";
    require_once __DIR__."/../src/Restaurant.php";

    $DB = new PDO('pgsql:host=localhost;dbname=best_restaurants_test');

    class RestaurantTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Restaurant::deleteAll();
        }

        function test_save()
        {
            //Arrange
            $name = "Le Restaurante";
            $review = "Wow this is le awful";
            $stars = 1;
            $id = null;
            $test_restaurant = new Restaurant($name, $review, $stars, $id);

            //Act
            $test_restaurant->save();

            //Assert
            $result = Restaurant::getAll();
            $this->assertEquals($test_restaurant, $result[0]);
        }

        function test_getAll()
        {
            //Arrange
            $name1 = "Le Restaurante";
            $review1 = "Awful";
            $stars1 = 1;
            $id = null;
            $name2 = "El Perrito";
            $review2 = "Sublime";
            $stars2 = 16;
            $test_restaurant1 = new Restaurant($name1, $review1, $stars1, $id);
            $test_restaurant2 = new Restaurant($name2, $review2, $stars2, $id);

            //Act

            $test_restaurant1->save();
            $test_restaurant2->save();
            $result = Restaurant::getAll();

            //Assert
            $this->assertEquals([$test_restaurant1, $test_restaurant2], $result);

        }

        function test_deleteAll()
        {
            //Arrange
            $name1 = "Le Restaurante";
            $review1 = "Awful";
            $stars1 = 1;
            $id = null;
            $name2 = "El Perrito";
            $review2 = "Sublime";
            $stars2 = 16;
            $test_restaurant1 = new Restaurant($name1, $review1, $stars1, $id);
            $test_restaurant2 = new Restaurant($name2, $review2, $stars2, $id);
            $test_restaurant1->save();
            $test_restaurant2->save();

            //Act
            Restaurant::deleteAll();

            //Assert
            $result = Restaurant::getAll();
            $this->assertEquals([], $result);
        }

        function test_getId()
        {
            //Arrange
            $name = "Le Restaurante";
            $review = "Better than I remember";
            $stars = 3;
            $id = 1;
            $test_restaurant = new Restaurant($name, $review, $stars, $id);

            //Act
            $result = $test_restaurant->getId();

            //Assert
            $this->assertEquals(1, $result);
        }

        function test_setId()
        {
            //Arrange
            $name = "La Restaurante";
            $review = "Neat";
            $stars = 3;
            $id = null;
            $test_restaurant = new Restaurant($name, $review, $stars, $id);

            //Act
            $test_restaurant->setId(2);

            //Assert
            $result = $test_restaurant->getId();
            $this->assertEquals(2, $result);

        }



    }



?>
