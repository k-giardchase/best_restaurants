<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once __DIR__."/../src/Cuisine.php";
    // require_once __DIR__."/../src/Restaurant.php";

    $DB = new PDO('pgsql:host=localhost;dbname=best_restaurants_test');

    class CuisineTest extends PHPUnit_Framework_TestCase
    {

        // protected function tearDown()
        // {
        //     Cuisine::deleteAll();
        // }

        function test_getType()
        {
            //Arrange
            $type = "Mexican";
            $id = null;
            $test_cuisine = new Cuisine($type, $id);

            //Act
            $result = $test_cuisine->getType();

            //Assert
            $this->assertEquals($type, $result);
        }

        function getId()
        {
            //Arrange
            $type = "Mexican";
            $id = null;
            $test_cuisine = new Cuisine($type, $id);

            //Act
            $test_cuisine->setId(2);
            $result = $test_cuisine->getId();

            //Assert
            $this->assertEquals(2, $result);
        }





    }


?>
