<?php

    class Animal{
        private $legs;
        private $sound;
        private $type;
        private $name;

        public function __construct($legs, $sound, $type, $name){
            $this->legs = $legs;
            $this->sound = $sound;
            $this->type = $type;
            $this->name = $name;
        }

        public function DisplayDetails(){
            return "Legs: $this->legs<br> Sound: $this->sound<br> Type: $this->type<br> Name: $this->name<br>";
        }

        public function __get($value){
            if(property_exists($this, $value)){
                return $this->$value;
            }
            return null;
        }

        public function __set($property, $value){
            if(property_exists($this, $property)){
                $this->$property = $value;
            }
        }

        public function MakeANoise(){
            return "$this->name says $this->sound<br>";
        }

        public function CountLegs(){
            return "$this->name has $this->legs legs!<br>";
        }

    }

    class Dog extends Animal{
        public $registration;

        public function __construct($legs, $sound, $type, $name, $registration){
            parent::__construct($legs, $sound, $type, $name);
            $this->registration = $registration;
        }

        public function DisplayRegistration(){
            return "Registration: $this->registration<br>";
        }
    }

    class Cat extends Animal{
        public $favtoy;

        public function __construct($legs, $sound, $type, $name, $favtoy){
            parent::__construct($legs, $sound, $type, $name);
            $this->favtoy = $favtoy;
        }

        public function DisplayFavToy(){
            return "Favourite Toy: $this->favtoy<br>";
        }
    }

    class Snake extends Animal{
        public $favfood;

        public function __construct($legs, $sound, $type, $name, $favfood){
            parent::__construct($legs, $sound, $type, $name);
            $this->favfood = $favfood;
        }

        public function DisplayFavFood(){
            return "Favourite Food: $this->favfood<br>";
        }
    }

    $animal1 = new Dog(4, 'Woof', 'Mammal', 'Jimbo', 30001654);
    $animal2 = new Cat(4, 'Meow', 'Mammal', 'Professor Whiskers', "Ball of Wool");
    $animal3 = new Snake(0, 'Hiss', 'Reptile', 'Max', "Mice");

    echo "Dog";
    echo "<br>======================";
    echo "<br>Legs: ".$animal1->__get('legs');
    echo "<br>Sound: ".$animal1->__get('sound');
    echo "<br>Type: ".$animal1->__get('type');
    echo "<br>Name: ".$animal1->__get('name');
    echo "<br>Registration: ".$animal1->__get('registration');

    echo "<br><br>Cat";
    echo "<br>======================";
    echo "<br>Legs: ".$animal2->__get('legs');
    echo "<br>Sound: ".$animal2->__get('sound');
    echo "<br>Type: ".$animal2->__get('type');
    echo "<br>Name: ".$animal2->__get('name');
    echo "<br>Favourite Toy: ".$animal2->__get('favtoy');

    echo "<br><br>Snake";
    echo "<br>======================";
    echo "<br>Legs: ".$animal3->__get('legs');
    echo "<br>Sound: ".$animal3->__get('sound');
    echo "<br>Type: ".$animal3->__get('type');
    echo "<br>Name: ".$animal3->__get('name');
    echo "<br>Favourite Food: ".$animal3->__get('favfood');
    echo "<br><br>";

    echo "Dog";
    echo "<br>======================<br>";
    echo $animal1->DisplayDetails();
    echo $animal1->DisplayRegistration();
    echo "<br>";

    echo "Cat";
    echo "<br>======================<br>";
    echo $animal2->DisplayDetails();
    echo $animal2->DisplayFavToy();
    echo "<br>";

    echo "Snake";
    echo "<br>======================<br>";
    echo $animal3->DisplayDetails();
    echo $animal3->DisplayFavFood();
    echo "<br><br>";

    echo $animal1->MakeANoise();
    echo $animal2->MakeANoise();
    echo $animal3->MakeANoise();

    echo "<br>";

    echo $animal1->CountLegs();
    echo $animal2->CountLegs();
    echo $animal3->CountLegs();

    echo "<br>Oh no! Jimbo Got hit by a car and had to have one of his legs amputated!<br>";
    $animal1->__set('legs', '3');
    echo $animal1->CountLegs();
?>