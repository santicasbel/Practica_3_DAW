<?php
   
if(filter_input(INPUT_POST, 'nombre_producto') != NULL){
        
    $nombre_producto = filter_input(INPUT_POST, 'nombre_producto');
    $descripcion = filter_input(INPUT_POST, 'descripcion');
    $precio = filter_input(INPUT_POST, 'precio');
    $stock = filter_input(INPUT_POST, 'stock');
    
    $total;
    
    $recurso = mysqli_connect("localhost:3306", "root", "", "mr_javiondo_gamer");
    if (mysqli_connect_error()) {
        printf("Error conectando a la base de datos: %s\n", mysqli_connect_error());
        exit();
    }
    else{
        $resultado = mysqli_query($recurso, "SELECT COUNT(id_producto) FROM productos WHERE nombre_producto = '" .$nombre_producto. "';");
        
        while($fila = mysqli_fetch_row($resultado)){
            $total = $fila[0];
        }
        
        if($total == 1){
            $error = "No se ha podido agregar el producto porque el nombre ya esta en uso";
        }
        
        else{
            mysqli_query($recurso, "INSERT INTO productos (descripcion, precio, nombre_producto, stock, alta) VALUES ('" .$descripcion. "', '" .$precio. "', '" .$nombre_producto. "', '" .$stock. "', '1')");
            $error = "El producto se ha agregado con exito";
        }
    }
        
}
?>

<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src=../JavaScript/libCapas.js></script>
        <link rel="stylesheet" href="../CSS/Agregar_producto.css" type="text/css"/>
    </head>
    <body>
            <div class="menu">
                <header id="menu">
                    <script> Cargar("../HTML/Auxiliar/Menu_desplegable.html", "menu");</script>
                </header>
            </div>

            <br>

            <div class="principal">
                <article>
                    <form method="post" action="Sesion_iniciada_admin_productos_agregar.php">
                        <table>
                            <tr>
                                <td> Nombre: </td> <td> <input type="text" name="nombre_producto" id="nombre_producto" size="40" maxlength="40" required /> </td>
                            </tr>
                            <tr>
                                <td> Descripcion </td> <td> <textarea name="descripcion" id="descripcion" rows="8" cols="35" required> </textarea> </td>
                            </tr>
                            <tr>
                                <td> Precio (€): </td> <td> <input type="text" name="precio" id="precio" required /> <a> <b> Formato: nn.nn </b> </a> </td>
                            </tr>
                            <tr>
                                <td> Stock: </td> <td> <input type="number" name="stock" id="stock" min="1" max="9999" required /> </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td> <input type="submit" id="boton" value="Agregar" id='boton'/> <a href="../PHP/Sesion_iniciada_admin_productos.php"> Volver atrás </a> </td>
                                
                            </tr>
                        </table>
                    </form>
                </article>
            </div>

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