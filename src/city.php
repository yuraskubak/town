<?php
	namespace Yura\Town;

    class City {
        public $cityName;            //название города
        public $yearOfFoundation;    //год основания
        public $geoCoord;            //геогрфические координаты
        public $countStreet;
        public $arrStreet;           //массив улиц


        public function __construct() {
            $this -> cityName = rand (1,3);
                if ($this -> cityName == 1) {
                    $this -> cityName = 'Андреевка';
                } elseif ($this -> cityName == 2) {
                    $this -> cityName = 'Вольное';
                } else {
                    $this -> cityName = 'Луговое';
                }
            $this -> yearOfFoundation = rand(1,3);
                if ($this -> yearOfFoundation == 1) {
                    $this -> yearOfFoundation = '1950';
                } elseif ($this -> yearOfFoundation == 2) {
                    $this -> yearOfFoundation = '1925';
                } else {
                    $this -> yearOfFoundation = '1935';
                }
            $this -> geoCoord = rand(1,3);
                if ($this -> geoCoord == 1) {
                    $this -> geoCoord = '50°27′01″ с. ш. 30°31′22″ в. д.';
                } elseif ($this -> geoCoord == 2) {
                    $this -> geoCoord = '50°00′00″ с. ш. 36°13′45″ в. д.';
                } else {
                    $this -> geoCoord = '50°05′10″ с. ш. 33°03′05″ в. д.';
                }   
            $this -> countStreet = rand(3,10);
            $this -> arrStreet();
        }
        
        public function population() {
            $population = 0;
            foreach ($this->arrStreet as $value) {
                foreach ($value->arrHouse as $value2) {
                    foreach ($value2->arrApart as $value3) {
                        $population += $value3 -> people;
                    }
                }
            }
            return $population;
        }

        public function arrStreet() {
            $arr = array();
            for ($i = 0; $i < $this->countStreet; $i++) {
                $arr[$i] = new Street();
            }
            $this->arrStreet = $arr;
        }
        
        public function cityTax() {
            $cityPay = 0;
            foreach ($this->arrStreet as $value) {
                $cityPay += (($value -> streetTax()) + ($value -> streetLandTax()));
            }
            return $cityPay;
        }

        public function cityDescription() {
            echo ("<b>Описание населенного пункта</b> <br>
                   Название населенного пункта: <b>$this->cityName</b> <br>
                   Год основания: <b>$this->yearOfFoundation</b>год<br>
                   Географические координаты населенного пункта: <b>$this->geoCoord</b> <br>
                   Кол-во улиц: <b>$this->countStreet</b> <br>
                   Кол-во населения, проживающего в населенном пункте: <b>{$this->population()}</b> человек<br>
                   Бюджет населенного пункта в зависимости от размера налога на землю: <b>{$this->cityTax()}</b> грн<br>
                  ");
        }
        
    }