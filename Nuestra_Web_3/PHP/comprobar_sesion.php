<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(session_status() == 1){
    header('Location: Inicio_administrador.php');
}

else {
    header('Location: index.php');
}

?>