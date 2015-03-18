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
        function test_save()
        {
            //Arrange
            $name = "Le Restaurante";
            $review = "Wow this is le awful";
            $stars = 1;
            $test_restaurant = new Restaurant($name, $review, $stars);

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
            $name2 = "El Perrito";
            $review2 = "Sublime";
            $stars2 = 16;
            $test_restaurant1 = new Restaurant($name1, $review1, $stars1);
            $test_restaurant2 = new Restaurant($name2, $review2, $stars2);

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
            $name2 = "El Perrito";
            $review2 = "Sublime";
            $stars2 = 16;
            $test_restaurant1 = new Restaurant($name1, $review1, $stars1);
            $test_restaurant2 = new Restaurant($name2, $review2, $stars2);
            $test_restaurant1->save();
            $test_restaurant2->save();

            //Act
            Restaurant::deleteAll();

            //Assert
            $return = Restaurant::getAll();
            $this->assertEquals([], $result);
        }

    }



?>
