<?php

function startup(&$amount =0){
if(!isset($_SESSION['poker'])){
    $_SESSION['poker']=array();
    $_SESSION['poker']['amount']=$amount;
}else{
    $_SESSION['poker']['amount']=$amount;
    return $amount;     
}
}


?>