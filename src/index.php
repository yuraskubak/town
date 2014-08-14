<!DOCTYPE html>
<html>
    <head>
        <title>OOP Task 4 Practice 1</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
    </head>
    <body>
        <div>
            <form method="POST">
                <hr width='30%' align='left'>
                    <?php
						namespace Yura\Town;
                        include "apartment.php";
                        include "house.php";
                        include "street.php";
                        include "city.php";
                        $city = new City();
                        $city -> cityDescription();
                        $street = new Street();
                        $street -> arrHouse();
                        $street -> streetDescription();
                        $house = new House();
                        $house -> arrApart();
                        $house -> houseDescription();
                        $apartment = new Apartment();
                        $apartment -> floor = rand(1,$house->countFloor);
                        $apartment -> apartmentDescription();
                        //$apartment -> adRem();
                    ?>
                <hr width='30%' align='left'>
                <p><input type="submit" name="submit" value="Рассчитать другие данные"/></p>
            </form>
        </div>
    </body>
</html>