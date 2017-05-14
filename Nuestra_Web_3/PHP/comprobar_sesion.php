<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();

if($_SESSION['admin'] == NULL){
    header('Location: Inicio_administrador.php');
}

else {
    header('Location: Sesion_iniciada_admin.php');
}

?>