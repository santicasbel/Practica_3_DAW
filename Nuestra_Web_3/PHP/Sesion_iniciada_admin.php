<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src=../JavaScript/libCapas.js></script>
        <link rel="stylesheet" href="../CSS/Sesion_iniciada_admin.css" type="text/css"/>
    </head>
    <body>

            <div class="menu">
                <header id="menu">
                    <script> Cargar("../HTML/Auxiliar/Menu_desplegable.html", "menu");</script>
                </header>
            </div>

            <br> <br>
            
            <form method="post" action="Sesion_iniciada_admin_usuarios.php">
                <input type="submit" value="Usuarios" id="boton">
            </form>

            <br>

            <form method="post" action="Sesion_iniciada_admin_pedidos.php">
                <input type="submit" value="Pedidos" id="boton">
            </form>    

            <br>
            
            <form method="post" action="Sesion_iniciada_admin_pedidos_enviados.php">
                <input type="submit" value="Pedidos enviados" id="boton">
            </form>  
            
            <br>

            <form method="post" action="Sesion_iniciada_admin_productos.php">
                <input type="submit" value="Productos" id="boton">
            </form>    
            
            <br> <br>

            <footer id="pie"> 
                <script> Cargar("../HTML/Auxiliar/Pie_de_pagina.html", "pie");</script>
            </footer>
    </body>
</html>