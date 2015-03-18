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

        // protected function tearDown(){
        //     Cuisine::deleteAll();
        // }





    }


?>
