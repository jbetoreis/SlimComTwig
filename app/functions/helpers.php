<?php

function dd($data){
    echo "<pre>";
    print_r($data);
    die;
}

function json($data){
    header('Content-Type: application/json');
    echo json_encode($data);
}

function path(){
    $vendorDir = dirname(__DIR__);
    return dirname($vendorDir);
}

?>