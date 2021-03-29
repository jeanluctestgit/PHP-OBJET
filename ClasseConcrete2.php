<?php
class ClassConcrete2 extends AbstractClass{

    public function getValue(){
        return "Classe Concrete 2 ";
    }

    public function prefixValue($prefix){
        return "${prefix} ClasseConcrete2";
    }

}