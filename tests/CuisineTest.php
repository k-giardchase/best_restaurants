<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once __DIR__."/../src/Cuisine.php";
    require_once __DIR__."/../src/Restaurant.php";

    $DB = new PDO('pgsql:host=localhost;dbname=best_restaurants_test');

    class CuisineTest extends PHPUnit_Framework_TestCase
    {

        protected function tearDown()
        {
            Cuisine::deleteAll();
            Restaurant::deleteAll();
        }

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

        function test_getId()
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

        function test_save()
        {
            //Arrange
            $type = "Italian";
            $id = null;
            $type2 = "Ethiopian";
            $test_cuisine = new Cuisine($type, $id);
            $test_cuisine2 = new Cuisine($type2, $id);

            //Act
            $test_cuisine->save();
            $test_cuisine2->save();

            //Assert
            $result = Cuisine::getAll();
            $this->assertEquals([$test_cuisine, $test_cuisine2], $result);
        }

        function test_getAll()
        {
            //Arrange
            $type = "Martian";
            $id = null;
            $type2 = "Argentine";
            $test_cuisine = new Cuisine($type, $id);
            $test_cuisine2 = new Cuisine($type2, $id);
            $test_cuisine->save();
            $test_cuisine2->save();

            //Act
            $result = Cuisine::getAll();

            //Assert
            $this->assertEquals([$test_cuisine, $test_cuisine2], $result);
        }

        function test_deleteAll()
        {
            //Arrange
            $type = "Wash the dog";
            $id = null;
            $type2 = "Home stuff";
            $id2 = null;
            $test_cuisine = new Cuisine($type, $id);
            $test_cuisine->save();
            $test_cuisine2 = new Cuisine($type2, $id2);
            $test_cuisine2->save();

            //Act
            Cuisine::deleteAll();
            $result = Cuisine::getAll();

            //Assert
            $this->assertEquals([], $result);
        }

        function test_find()
        {
            //Arrange
            $type = "latkas";
            $id = null;
            $type2 = "dumplings";
            $test_cuisine = new Cuisine($type, $id);
            $test_cuisine2 = new Cuisine($type2, $id);
            $test_cuisine->save();
            $test_cuisine2->save();

            //Act
            $result = Cuisine::find($test_cuisine->getId());

            //Assert
            $this->assertEquals($test_cuisine, $result);
        }




    }


?>
