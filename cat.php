<?php
class Animal {
    private $name;
    private $gender;

    public function getName(){
        return $this->name;
    }

    public function setName($_name){
        $this->name = $_name;
        return $this;
    }

    public function AnimalSay(){
        self::Say();
    }

    public function Say(){
        return 'un cri';
    }
}

class Cat extends Animal {
    
    public function Say(){
        return ' say meoowww!!!';
    }
}

class Dog extends Animal {
    
    public function Say(){
        return ' say Ouaf!!!';
    }
}