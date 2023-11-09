<?php
$minimum = 3;
$maximum = 5;
$aantalp = 2;

if ($aantalp < $minimum){
    echo $aantalp. " Teweinig personen";
} elseif ($aantalp > $maximum){
    echo $aantalp . ' teveel mensen';
}else{
    echo $aantalp . " kunnen samen in een groep";
}
