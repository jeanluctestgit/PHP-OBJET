<?php
echo '<h1>Hello world </h1>';

spl_autoload_extensions(".php"); // comma-separated list
spl_autoload_register();

//require_once 'cat.php';

$oscar = new Cat();
$oscar->setName('Oscar');

echo $oscar->getName();
echo $oscar->Say();
echo '<br>';

$Lia = new Dog();
$Lia->setName('Lia');

echo $Lia->getName();
echo $Lia->Say();

echo '<br>';

echo $Lia->AnimalSay();

require_once 'AbstractClass.php';
require_once 'ClasseConcrete1.php';
require_once 'ClasseConcrete2.php';

$class1 = new ClassConcrete1();
echo $class1->printValue();

require_once 'Personne.php';
use App\Entity\Personne;

$original = new Personne("tintin", 30);
// --- Clonage
$clone = clone($original);
echo "<br />Original : " . $original;
echo "<br />Clone : " . $clone;
if ($original === $clone) {
echo "<br />Les deux sont égaux";
} else {
echo "<br />Les deux sont différents";
}

require_once "DBA.php";
$dba = new DBA();
$am = new ArticleManager($dba->getPDO());
var_dump($am);


