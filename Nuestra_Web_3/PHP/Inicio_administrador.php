<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src=../JavaScript/libCapas.js></script>
        <link rel="stylesheet" href="../CSS/Inicio_sesion.css" type="text/css"/>
    </head>

    <?php
    if (filter_input(INPUT_POST, 'usuario') != NULL) {
        $user = filter_input(INPUT_POST, 'usuario');
        $passwd = filter_input(INPUT_POST, 'password');
        $total;

        $recurso = mysqli_connect("localhost:3306", "root", "", "mr_javiondo_gamer");
        if (mysqli_connect_error()) {
            printf("Error conectando a la base de datos: %s\n", mysqli_connect_error());
            exit();
        } else {

            $resultado = mysqli_query($recurso, "SELECT COUNT(id_usuario) FROM usuarios WHERE usuario = '" . $user . "' AND contrasenya = '" . $passwd . "';");

            while ($fila = mysqli_fetch_row($resultado)){
                $total = $fila[0];
            }

            if ($total == 1) {
                header('Location: index.php');
            } else {
                header('Location: Inicio_administrador.php');
            }
        }
    }
    ?>

    <body>
        <form method="post" action="Inicio_administrador.php">
            <div class="menu">
                <header id="menu">
                    <script> Cargar("../HTML/Auxiliar/Menu_desplegable.html", "menu");</script>
                </header>
            </div>

            <br> <br> <br> <br>

            <div class="principal">
                <article>
                    <table>
                        <tr>
                            <td> Usuario: </td> <td> <input type="text" pattern="([_]|[a-zA-z]|[0-9])*" name="usuario" id="usuario" size="20" maxlength="20" required /> </td>
                        </tr>
                        <tr>
                            <td> Contraseña: </td> <td> <input type="password" name="password" id="password" size="20" maxlength="20" required /> </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td> <input type="submit" value="Iniciar sesión"> </td>
                        </tr>
                    </table>
                </article>
            </div>

            <br>

            <footer id="pie"> 
                <script> Cargar("../HTML/Auxiliar/Pie_de_pagina.html", "pie");</script>
            </footer>
        </form>
    </body>
</html>