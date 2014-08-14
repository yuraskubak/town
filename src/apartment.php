<?php
	namespace Yura\Town;

    class Apartment {
        public $room;
        public $square;
        public $floor;
        public $people;
        public $balcony;
        public $electro;
        public $gas;
        //private $men;
        
        const rent = 1.92;    //квартплата за 1м2
        const water = 5.508;  //вода за 1м3, норма на одного человека 10м3/мес
        const heat = 10.44;   //отопление (норма потребления 0.1573/м2)
        const garbage = 9.35; //вывоз мусора (1 чел/мес)
        const electro = 0.31; //электричество за 1 кВт/час
        const gas = 1.3;      //газ
                
        public function __construct () {
            $this -> room = rand(1, 3);
            $this -> square;
                if ($this -> room == 1) {
                    $this -> square = rand(20, 40);
                } else if ($this -> room == 2) {
                    $this -> square = rand(40, 60);
                } else if ($this -> room == 3) {
                    $this -> square = rand(60, 80);
                }
            $this -> floor;
            $this -> people = rand(1, 3);
            $this -> balcony = rand(0, 2);
            $this -> electro = rand(0, 500);
            $this -> gas = rand(0, 500);
            //$this -> men;
        }
        
        public function rent() {
            return ($this -> square * self :: rent);
        }
        
        public function water() {
            return ($this -> people * (self :: water * 10));
        }
        
        public function heat() {
            return round($this -> square * (self :: heat * 0.1573), 2);
        }
        
        public function garbage() {
            return ($this -> people * self :: garbage);
        }
        
        public function electro() {
            return ($this -> electro * self :: electro);
        }
        
        public function gas() {
            return ($this -> gas * self :: gas);
        }
        
        public function sum() {
            return ($this->rent() + $this->water() + $this->heat() + $this->garbage() + $this->electro() + $this->gas());
        }
        
        public function apartmentDescription () {
            echo ("<br><b>Описание квартиры</b><br>
                  Кол-во комнат: <b>$this->room</b> <br>
                  Общая площадь квартиры <b>$this->square</b> м<sup>2</sup><br>
                  Квартира находится на <b>$this->floor</b> этаже <br>
                  В квартире проживает людей: <b>$this->people</b> <br>
                  Наличие балконов: <b>$this->balcony</b> <br>
                  <br><b>Коммунальные платежи</b><br>
                  Квартплата: <b>{$this->rent()}</b> грн <br>
                  Холодная вода: <b>{$this->water()}</b> грн <br>
                  Отопление: <b>{$this->heat()}</b> грн <br>
                  Вывоз мусора: <b>{$this->garbage()}</b> грн <br>
                  Электричество: <b>{$this->electro()}</b> грн (кол-во кВт: <b>{$this->electro}</b>)<br>
                  Газ: <b>{$this->gas()}</b> грн (кол-во м<sup>3</sup>: <b>{$this->gas}</b>)<br>
                  Сумма всех платежей: <b>{$this->sum()}</b> <br>"
                  );
        }
             
//        public function adRem() {;
//            echo ("Добавляет жильца: <b>{$this->adMen()}</b> <br>
//                  Удаляет жильца: <b>{$this->remMen()}</b>");
//        }
        
//        public function adMen() {
//            $this -> men ++;
//        }
//        
//        public function remMen() {
//            $this -> men --;
//        }
    }