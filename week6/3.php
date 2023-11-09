<?php
$klassenlijst = array("tobias", "hasna", "aukje",
    "fred", "sep", "koen", "wahed", "anna", "jackie",
    "rashida", "winston", "sammy", "manon", "ben", "karim", "bart", "lisa");


foreach($klassenlijst as $value){
    echo ucfirst($value)."<br>";
}


$aantal = count($klassenlijst);
print "aantal leerlingen: ". $aantal;

$str = $klassenlijst[$aantal] = "tom";
array_push($str);

    ?>




