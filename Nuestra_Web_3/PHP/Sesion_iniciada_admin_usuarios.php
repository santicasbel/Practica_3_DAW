<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src=../JavaScript/libCapas.js></script>
        <link rel="stylesheet" href="../CSS/Sesion_iniciada_admin.css" type="text/css"/>
    </head>

    <?php
    if (filter_input(INPUT_POST, 'id_usuario') != NULL) {

        $id_usuario = filter_input(INPUT_POST, 'id_usuario');
        $usuario = filter_input(INPUT_POST, 'user');
        $contrasenya = filter_input(INPUT_POST, 'pwd');
        $nombre = filter_input(INPUT_POST, 'nombre');
        $apellidos = filter_input(INPUT_POST, 'apellidos');
        $telefono = filter_input(INPUT_POST, 'tel');
        $direccion = filter_input(INPUT_POST, 'dir');
        $email = filter_input(INPUT_POST, 'mail');
        
        $usuario_ori = filter_input(INPUT_POST, 'user_ori');

        $total;

        $recurso = mysqli_connect("localhost:3306", "root", "", "mr_javiondo_gamer");
        if (mysqli_connect_error()) {
            printf("Error conectando a la base de datos: %s\n", mysqli_connect_error());
            exit();
        } else {

            $resultado = mysqli_query($recurso, "SELECT COUNT(id_usuario) FROM usuarios WHERE usuario = '" . $usuario . "';");

            while ($fila = mysqli_fetch_row($resultado)) {
                $total = $fila[0];
            }

            if($usuario == $usuario_ori){
                mysqli_query($recurso, "UPDATE usuarios SET usuario = '" .$usuario_ori. "', contrasenya = '" .$contrasenya. "', nombre = '" .$nombre. "', apellidos = '" .$apellidos. "', telefono = '" .$telefono. 
                        "', direccion = '" .$direccion. "', email = '" .$email. "' WHERE id_usuario = '" .$id_usuario. "';");
                $error = "Se han modificado los datos";
            } 
            
            else if ($total == 1) {
                mysqli_query($recurso, "UPDATE usuarios SET usuario = '" .$usuario_ori. "', contrasenya = '" .$contrasenya. "', nombre = '" .$nombre. "', apellidos = '" .$apellidos. "', telefono = '" .$telefono. 
                        "', direccion = '" .$direccion. "', email = '" .$email. "' WHERE id_usuario = '" .$id_usuario. "';");
                $error = "Se han modificado los datos, escepto el usuario, el nuevo ya estaba en uso";
            } 
            
            else {
                mysqli_query($recurso, "UPDATE pedidos SET nombre_usuario = '" .$usuario. "' WHERE nombre_usuario = '" .$usuario_ori. "';");
                mysqli_query($recurso, "UPDATE usuarios SET usuario = '" .$usuario. "', contrasenya = '" .$contrasenya. "', nombre = '" .$nombre. "', apellidos = '" .$apellidos. "', telefono = '" .$telefono. 
                        "', direccion = '" .$direccion. "', email = '" .$email. "' WHERE id_usuario = '" .$id_usuario. "';");
                $error = "Se han modificado los datos";
            }
        }
    }
    ?>

    <body>

        <div class="menu">
            <header id="menu">
                <script> Cargar("../HTML/Auxiliar/Menu_desplegable.html", "menu");</script>
            </header>
        </div>

        <br> <br>

        <div class="principal">
            <table border="1" id="usuarios">
                <tr>
                    <td> <b> Nombre </b> </td> <td> <b> Apellidos </b> </td> <td> <b> Usuario </b> </td> <td> <b> Contraseña </b> </td> <td> <b> Teléfono </b> </td> <td> <b> Dirección </b> </td> <td> <b> Email </b> </td>
                </tr>

                <?php
                $recurso = mysqli_connect("localhost:3306", "root", "", "mr_javiondo_gamer");
                if (mysqli_connect_error()) {
                    printf("Error conectando a la base de datos: %s\n", mysqli_connect_error());
                    exit();
                } else {
                    $resultado = mysqli_query($recurso, "SELECT id_usuario, usuario, contrasenya, nombre, apellidos, telefono, direccion, email FROM usuarios;");

                    while ($fila = mysqli_fetch_row($resultado)) {

                        $id_usuario = $fila[0];
                        $usuario = $fila[1];
                        $contrasenya = $fila[2];
                        $nombre = $fila[3];
                        $apellidos = $fila[4];
                        $telefono = $fila[5];
                        $direccion = $fila[6];
                        $email = $fila[7];
                        ?>

                        <form method="post" action="Sesion_iniciada_admin_usuarios.php">
                            <tr>
                                <td> <input type="text" name="nombre" id="nombre" pattern="([ ]|[a-zA-z])*" size="15" maxlength="20" value="<?php echo $nombre ?>" required /> </td> 
                                <td> <input type="text" name="apellidos" id="apellidos" pattern="([ ]|[a-zA-z])*" size="15" maxlength="20" value="<?php echo $apellidos ?>" required /> </td> 
                                <td> <input type="text" name="user" id="user" pattern="([_]|[a-zA-z]|[0-9])*" size="15" maxlength="20" value="<?php echo $usuario ?>" required /> </td> 
                                <td> <input type="text" name="pwd" id="pwd" size="15" maxlength="20" value="<?php echo $contrasenya ?>" required /> </td> 
                                <td> <input type="number" name="tel" id="tel" min="1" max="999999999" value="<?php echo $telefono ?>" required /> </td> 
                                <td> <input type="text" name="dir" id="dir" size="30" maxlength="50" value="<?php echo $direccion ?>" required /> </td> 
                                <td> <input type="email" name="mail" id="mail" size="30" maxlength="50" value="<?php echo $email ?>" required /> </td> 
                                
                                <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $id_usuario ?>">
                                <input type="hidden" name="user_ori" id="user_ori" value="<?php echo $usuario ?>">
                                
                                <td> <input type="submit" value="Modificar"/> </td>
                            </tr>
                        </form>

                <?php
                    }
                }
                ?>

            </table>

        </div>

        <br> <br>

        <footer id="pie"> 
            <script> Cargar("../HTML/Auxiliar/Pie_de_pagina.html", "pie");</script>
        </footer>
        
        <script>
                <?php
                
                if($error != NULL){
                
                ?>
                    
                alert("<?php echo $error ?>");  
                  
                <?php
                
                }
                
                ?>
        </script>

    </body>
</html>