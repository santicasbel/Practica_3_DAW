<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src=../JavaScript/libCapas.js></script>
        <link rel="stylesheet" href="../CSS/Sesion_iniciada_admin.css" type="text/css"/>
    </head>

    <?php
    if(filter_input(INPUT_POST, 'opcion') != 1 && filter_input(INPUT_POST, 'opcion') != NULL){
        
        $recurso = mysqli_connect("localhost:3306", "root", "", "mr_javiondo_gamer");
        if (mysqli_connect_error()) {
            printf("Error conectando a la base de datos: %s\n", mysqli_connect_error());
            exit();
        }
        else{
            if(filter_input(INPUT_POST, 'opcion') == 2){
                $usuario = filter_input(INPUT_POST, 'eleccion');
                $resultado = mysqli_query($recurso, "SELECT id_pedido,nombre_usuario,nombre_producto,precio,cantidad, envio, fecha FROM pedidos WHERE envio = 1 AND nombre_usuario = '" .$usuario. "';");
            }

            else if(filter_input(INPUT_POST, 'opcion') == 3){
                $producto = filter_input(INPUT_POST, 'eleccion');
                $resultado = mysqli_query($recurso, "SELECT id_pedido,nombre_usuario,nombre_producto,precio,cantidad, envio, fecha FROM pedidos WHERE envio = 1 AND nombre_producto like '%" .$producto. "%';");
            }

            else{
                $fecha = filter_input(INPUT_POST, 'eleccion');
                $resultado = mysqli_query($recurso, "SELECT id_pedido,nombre_usuario,nombre_producto,precio,cantidad, envio, fecha FROM pedidos WHERE envio = 1 AND fecha = '" .$fecha. "';");
            }
        }
        
    }
    
    else{
        $recurso = mysqli_connect("localhost:3306", "root", "", "mr_javiondo_gamer");
        if (mysqli_connect_error()) {
            printf("Error conectando a la base de datos: %s\n", mysqli_connect_error());
            exit();
        } else {
            $resultado = mysqli_query($recurso, "SELECT id_pedido,nombre_usuario,nombre_producto,precio,cantidad, envio, fecha FROM pedidos WHERE envio = 1;");
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
            
            <form method="post" action="Sesion_iniciada_admin_pedidos_enviados.php">
                <input type="radio" name="opcion" value="1" id="1" checked="true"> No filtrar <br>
                <input type="radio" name="opcion" value="2" id="2"> Usuario <br>
                <input type="radio" name="opcion" value="3" id="3"> Nombre Producto <br>
                <input type="radio" name="opcion" value="4" id="4"> Fecha (aaaa-mm-dd) <br>
                    
                <input type="text" size="20" name="eleccion" id="eleccion">
                    
                <td> <input type="submit" value="Buscar"/> </td>
            </form>
            
            <table border="1" id="usuarios">
                <tr>
                    <td> <b> Usuario </b> </td> <td> <b> Nombre producto </b> </td> <td> <b> Unidades </b> </td> <td> <b> Precio (€) </b> </td> <td> <b> Fecha de creación </b> </td>
                </tr>

                <?php
                while ($fila = mysqli_fetch_row($resultado)) {

                    $id_pedido = $fila[0];
                    $nombre_usuario = $fila[1];
                    $nombre_producto = $fila[2];
                    $precio = $fila[3];
                    $cantidad = $fila[4];
                    $envio = $fila[5];
                    $fecha = $fila[6];
                    
                    $precio_final = $precio * $cantidad;
                    
                ?>
                
                <tr>
                    <td> <?php echo $nombre_usuario ?> </td> 
                    <td> <?php echo $nombre_producto ?> </td> 
                    <td> <?php echo $cantidad ?> </td> 
                    <td> <?php echo $precio_final ?> </td>
                    <td> <?php echo $fecha ?> </td>
                    
                    <td colspan="2" align="center"> <b> ENVIADO </b>  </td>
                </tr>

                <?php
                }
                ?>

            </table>

        </div>

        <br> <br>

        <footer id="pie"> 
            <script> Cargar("../HTML/Auxiliar/Pie_de_pagina.html", "pie");</script>
        </footer>

    </body>
</html>