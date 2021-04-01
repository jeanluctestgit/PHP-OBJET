<?php
require __DIR__ . '/vendor/autoload.php';
use SebastianBergmann\Timer\Timer;

$timer = new Timer;
$timer->start();
foreach (\range(0, 100000) as $i) {
  
}
$duration = $timer->stop();
var_dump(get_class($duration));

dump($duration);

echo $duration->asString();
echo ' ' .$duration->asSeconds() . 's';
echo '<br>';
echo ' ' .$duration->asMilliseconds() . 'ms';
echo '<br>';
echo ' ' .$duration->asMicroseconds() . 'micro s';
echo '<br>';
echo ' ' .$duration->asNanoseconds() . 'nano s';
echo '<br>';

