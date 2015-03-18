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
    }



?>
