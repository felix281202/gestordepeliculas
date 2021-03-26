<?php 

$generos=["Accion","Terror","Comedia","Suspenso","Documentales"];

function lastID($array) {
    $countId = count($array);
    $lastId= $array[$countId - 1];
    return $lastId;
}

function careerFilter($array, $place, $value) {
    $filter = [];

    foreach($array as $comp) {
        if($comp[$place]==$value) {
            array_push($filter, $comp);
        }
    }
    return $filter;
}

function deleteElement($array, $place, $value) {

    $loc=0;

    foreach($array as $key => $item) {
        if($item[$place]==$value) {
            $loc = $key;
        }
    }
    return $loc;
}

?>