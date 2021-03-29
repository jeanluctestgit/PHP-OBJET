<?php

interface ITemplate {
    public function setVariable($name , $var);
    public function getHTML($template);
}