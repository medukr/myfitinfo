<?php

function debug($mix, bool $var_dump = false){
    echo "<pre>";
    ($var_dump == true) ? var_dump($mix) : print_r($mix);
    echo "</pre>";
}

function plaintext($mix){
    echo "<plaintext>";
    print_r($mix);
}