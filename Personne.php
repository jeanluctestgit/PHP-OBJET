<?php

namespace App\Entity;

class Personne {

    public $name;
    public $age;

    public function __construct(string $name , int $age){
        $this->name = $name;
        $this->age = $age;
    }

    public function __toString():string{
        return "$this->name a $this->age";
    }

    public function __clone(){
        $this->name = ucwords($this->name);
    }
}