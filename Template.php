<?php

require_once './Interfaces/ITemplate.php';

class Template implements ITemplate{
    private array $vars = [];

    public function setVariable($name , $var){
        $this->vars[$name] = $var;
    }

    public function getHTML($template){
        foreach ($this->vars as $name => $value) {
            # code...
        }
    }
}