<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (filter_input(INPUT_POST, 'usuario') != NULL) {
    $user = filter_input(INPUT_POST, 'usuario');
    $passwd = filter_input(INPUT_POST, 'password');
    $total;

    $recurso = mysqli_connect("localhost:3306", "root", "", "mr_javiondo_gamer");
    if (mysqli_connect_error()) {
        printf("Error conectando a la base de datos: %s\n", mysqli_connect_error());
        exit();
    } else {

        $resultado = mysqli_query($recurso, "SELECT COUNT(id_usuario) FROM usuarios WHERE usuario = '" .$user. "' AND contrasenya = '" .$passwd. "';");

        $total = mysqli_num_rows($resultado);

        if ($total == 1) {
            header('Location: index.php');
        } else {
            header('Location: Inicio_administrador.php');
        }
    }
}
?>