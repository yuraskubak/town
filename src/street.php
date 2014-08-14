<?php
namespace Yura\Town;

    class Street {
        public $streetName;         //название
        public $streetLength;       //протяженность
        public $streetCoordinates;  //координаты
        public $countHouse;         //кол-во домой на улице
        public $janitor;            //дворники (один на 3000м2)
        public $arrHouse;           //массив домов
        
        public function __construct() {
            $this -> streetName = rand (1,3);
                if ($this -> streetName == 1) {
                    $this -> streetName = 'Сумская';
                } elseif ($this -> streetName == 2) {
                    $this -> streetName = 'Пушкинская';
                } else {
                    $this -> streetName = 'Петровского';
                }
            $this -> streetLength = rand(100, 5000);
            $this -> streetCoordinates = (rand(48, 50) . "°" . rand(00, 59) . "′" . " с. ш. " . rand(30, 37) . "°" . rand(00, 59) . "′" . " в.д.");
            $this -> countHouse = rand(10, 20);
            $this -> janitor;
            $this->arrHouse();
        }
        
        public function countJanitor() {
            $cleanTer = 0;
            foreach ($this->arrHouse as $value) {
                $cleanTer += $value -> adjoinArea;
            }
            return ceil($cleanTer/3000);
        }

        public function arrHouse() {
            $arr = array();
            for ($i = 0; $i < $this->countHouse; $i++) {
                $arr[$i] = new House();
            }
            $this->arrHouse = $arr;
        }
        
        public function streetTax() {
            $streetPay = 0;
            foreach ($this->arrHouse as $value) {
                $streetPay += $value -> houseTax();
            } 
            return $streetPay;
        }
        
        public function streetLandTax() {
            $streetLanTax = 0;
            foreach ($this->arrHouse as $value) {
                $streetLanTax += $value -> landTax();
            }
            return $streetLanTax;
        }

        public function streetDescription() {
            echo ("<br><b>Информация об улице</b><br>
                  Название улицы: <b>ул. $this->streetName</b> <br>
                  Протяженность улицы: <b>$this->streetLength</b> метров <br>
                  Координаты улицы: <b>$this->streetCoordinates</b> <br>
                  Кол-во домов: <b>$this->countHouse</b> <br>
                  Количество дворников, необходимое для уборки прилегающей территории: <b>{$this->countJanitor()}</b> <br>
                  Объем <b>коммунальных платежей</b>, которые будут получены со всех домов: <b>{$this->streetTax()}</b> грн<br>
                  Налог на землю со всех домов на улице: <b>{$this->streetLandTax()}</b> грн<br>");
        }
    }