<?php

class BaseClass
{
    public function test(){
        echo "BaseClass::test appelé\n";
    }
    final public function moreTesting(){
        echo "BaseClass::moreTesting appelé \n";
    }
}