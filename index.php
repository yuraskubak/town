<?php
    require 'vendor/autoload.php';

    $city = new \Yura\Town\City();
    $city -> cityDescription();
    $street = new \Yura\Town\Street();
    $street -> arrHouse();
    $street -> streetDescription();
    $house = new \Yura\Town\House();
    $house -> arrApart();
    $house -> houseDescription();
    $apartment = new \Yura\Town\Apartment();
    $apartment -> floor = rand(1,$house->countFloor);
    $apartment -> apartmentDescription();
    //$apartment -> adRem();
