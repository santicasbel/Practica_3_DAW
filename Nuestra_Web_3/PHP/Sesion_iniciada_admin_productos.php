<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src=../JavaScript/libCapas.js></script>
        <link rel="stylesheet" href="../CSS/Sesion_iniciada_admin.css" type="text/css"/>
    </head>

    <?php
    
    /*if(filter_input(INPUT_POST, 'id_producto') != NULL){
        
        $id_producto = filter_input(INPUT_POST, 'id_producto');
        $nombre_producto = filter_input(INPUT_POST, 'nombre_producto');
        $precio = filter_input(INPUT_POST, 'precio');
        $descripcion = filter_input(INPUT_POST, 'descripcion');
        $stock = filter_input(INPUT_POST, 'stock');
        $alta = filter_input(INPUT_POST, 'alta');
        
        $nombre_producto_ori = filter_input(INPUT_POST, 'nombre_producto_ori');
        
        $total;
        
        $recurso = mysqli_connect("localhost:3306", "root", "", "mr_javiondo_gamer");
        if (mysqli_connect_error()) {
            printf("Error conectando a la base de datos: %s\n", mysqli_connect_error());
            exit();
        }
        else{
            if($nombre_producto == $nombre_producto_ori){
                mysqli_query($recurso, "UPDATE productos SET precio = '" .$precio. "', descripcion = '" .$descripcion. "', stock = '" .$stock. "', alta = '" .$alta. "' WHERE nombre_producto = '" .$nombre_producto. "';");
                $resultado = mysqli_query($recurso, "SELECT id_producto,nombre_producto,precio,descripcion,stock,alta FROM productos;");
            }
            
            else{
                $resultado = mysqli_query($recurso, "SELECT COUNT(id_producto) FROM productos WHERE nombre_producto = '" .$nombre_producto. "';");
                
                while($fila = mysqli_fetch_row($resultado)){
                    $total = $fila[0];
                }
                
                if($total == 1){
                    mysqli_query($recurso, "UPDATE productos SET precio = '" .$precio. "', descripcion = '" .$descripcion. "', stock = '" .$stock. "', alta = '" .$alta. "' WHERE nombre_producto = '" .$nombre_producto_ori. "';");
                    $resultado = mysqli_query($recurso, "SELECT id_producto,nombre_producto,precio,descripcion,stock,alta FROM productos;");
                }
                
                else{
                    mysqli_query($recurso, "UPDATE productos SET nombre_producto = '" .$nombre_producto. "', precio = '" .$precio. "', descripcion = '" .$descripcion. "', stock = '" .$stock. "', alta = '" .$alta. "' WHERE nombre_producto = '" .$nombre_producto_ori. "';");
                    mysqli_query($recurso, "UPDATE pedidos SET nombre_producto = '" .$nombre_producto. "' WHERE nombre_producto = '" .$nombre_producto_ori. "';");
                    $resultado = mysqli_query($recurso, "SELECT id_producto,nombre_producto,precio,descripcion,stock,alta FROM productos;");
                }
            }
            
        }
        
    }*/
    
    if(filter_input(INPUT_POST, 'nombre_producto') != NULL){
        $nombre_producto = filter_input(INPUT_POST, 'nombre_producto');
        
        $id_producto = filter_input(INPUT_POST, 'id_producto');
        $precio = filter_input(INPUT_POST, 'precio');
        $descripcion = filter_input(INPUT_POST, 'descripcion');
        $stock = filter_input(INPUT_POST, 'stock');
        $alta = filter_input(INPUT_POST, 'alta');
        $nombre_producto_ori = filter_input(INPUT_POST, 'nombre_producto_ori');
        
        echo $nombre_producto_ori;
        
        $recurso = mysqli_connect("localhost:3306", "root", "", "mr_javiondo_gamer");
        if (mysqli_connect_error()) {
            printf("Error conectando a la base de datos: %s\n", mysqli_connect_error());
            exit();
        }
        else{
            mysqli_query($recurso, "UPDATE productos SET nombre_producto = '" .$nombre_producto. "', precio = '" .$precio. "', descripcion = '" .$descripcion. "', stock = '" .$stock. "', alta = '" .$alta. "' WHERE nombre_producto = '" .$nombre_producto_ori. "';");
            $resultado = mysqli_query($recurso, "SELECT id_producto,nombre_producto,precio,descripcion,stock FROM productos;");
            
        }
    }
    
    //else{
        
        $recurso = mysqli_connect("localhost:3306", "root", "", "mr_javiondo_gamer");
        if (mysqli_connect_error()) {
            printf("Error conectando a la base de datos: %s\n", mysqli_connect_error());
            exit();
        }
        else{
            $resultado = mysqli_query($recurso, "SELECT id_producto,nombre_producto,precio,descripcion,stock FROM productos;");
            
        }
    //}
    
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
                    <td> <b> Portada </b> </td> <td> <b> Nombre </b> </td> <td> <b> Precio (€) </b> </td> <td> <b> Descripción </b> </td> <td> <b> Stock </b> </td>
                </tr>

                <?php
                while ($fila = mysqli_fetch_row($resultado)) {

                    $id_producto = $fila[0];
                    $nombre_producto = $fila[1];
                    $precio = $fila[2];
                    $descripcion = $fila[3];
                    $stock = $fila[4];
                    
                ?>
                
                <form method="post" action="Sesion_iniciada_admin_productos.php">
                    <tr>
                        <td> <img src="../Imagenes/<?php echo $id_producto ?>.jpg" height="200" width="175"> </td>
                        <td> <input type="text" name="nombre_producto" id="nombre_producto" size="35" value="<?php echo $nombre_producto ?>" required> </td>
                        <td> <input type="text" name="precio" id="precio" value="<?php echo $precio ?>" required> </td>
                        <td> <textarea rows="12" cols="25" name="descripcion" id="descripcion" required> <?php echo $descripcion ?> </textarea> </td>
                        <td> <input type="text" name="stock" id="stock" value="<?php echo $stock ?>" required> </td>

                        <input type="hidden" name="nombre_producto_ori" id="nombre_producto_ori" value="<?php echo $$nombre_producto ?>">
                        <input type="hidden" name="id_producto" id="id_producto" value="<?php echo $$id_producto ?>">

                        <td> <input type="submit" value="Modificar"/> </td>

                    </tr>
                </form>

                <?php
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