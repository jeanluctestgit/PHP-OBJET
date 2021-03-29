<?php

abstract class AbstractClass{
    abstract public function getValue();
    abstract public function prefixValue($prefix);

    public function printValue(){
        return $this->getValue() . '<br>';
    }
}