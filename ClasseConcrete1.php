<?php
require_once 'AbstractClass.php';
class ClassConcrete1 extends AbstractClass{

    public function getValue(){
        return "Classe Concrete 1 ";
    }

    public function prefixValue($prefix){
        return "${prefix} ClasseConcrete1";
    }

}