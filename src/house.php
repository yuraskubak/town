<?php
namespace Yura\Town;

    class House {
        public $houseNumber;
        public $countFloor;
        public $countPorch;      //подъезды
        public $countApartments; //кол-во квартир (по 2 на этаже)
        public $adjoinArea;      //прилегающая территория
        public $houseElectro;
        public $arrApart;        //массив квартир
        public $landTax = 14;    //налог на землю

        public function __construct() {
            $this -> houseNumber = rand(1, 20);
            $this -> count = rand(0,2);
            $this -> countFloor;
                if($this->count == 0){
                    $this->countFloor = 5;
                } elseif ($this->count == 1) {
                    $this->countFloor = 9;
                } else {
                    $this->countFloor = 16;
                }
            $this -> countPorch = rand(1, 10);
            $this -> countApartments = (($this -> countFloor * 2) * $this -> countPorch);
            $this -> adjoinArea = ($this->countFloor * $this->countPorch * 4 * 20);
            $this -> houseElectro = ($this->countFloor * $this->countPorch * 10.5);
            $this -> arrApart();
        }
        
        public function landTax() {
            return ($this->countPorch * 40 + $this->adjoinArea) * $this->landTax;
        }
        
        public function arrApart(){
            $arr = array();
            for($i = 0; $i < $this->countApartments; $i++){
                $arr[$i] = new Apartment();
            }
            $this->arrApart = $arr;
        }
        
        public function houseTax() {
            $housePay = 0;
            foreach ($this -> arrApart as $value) {
                $housePay += $value -> sum();
            }
            return $housePay;
        }

        public function houseDescription() {
            echo ("<br><b>Описание дома</b><br>
                   Номер дома: <b>{$this->houseNumber}</b> <br>
                   Этажность : <b>{$this->countFloor}</b> этажей<br>
                   Кол-во подъездов: <b>{$this->countPorch}</b> <br>
                   Кол-во квартир: <b>{$this->countApartments}</b> <br>
                   Площадь прилегающей территории: <b>{$this->adjoinArea}</b> м<sup>2</sup> <br>
                   <br><b>Коммунальные платежи с дома</b><br>
                   Размер коммунальных платежей со всех квартир в этом доме: <b>{$this->houseTax()}</b> грн <br>
                   Объем потребляемого электричества для освещения подъездов: <b>{$this->houseElectro}</b> кВт/мес <br>
                   Налог на землю, отведенной для дома: <b>{$this->landTax()}</b> грн <br>");
        }
    }