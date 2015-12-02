<html>
    <head>
        <link rel="stylesheet" href="CSS/TableStyle.css" type="text/css"/>
        <link rel="stylesheet" href="CSS/Style.css" type="text/css"/>
        <?php
        /* Incluimos el fichero de la clase Db */
        require './Datos/Db.class.php';
        /* Incluimos el fichero de la clase Conf */
        require 'Conf.class.php';
        ?>
    </head>
    <body>
        <table class="CSS_Table">

            <th>N° de Orden</th>
            <th>Cliente</th>
            <th>Daño</th>

            <?php
            /* Creamos la instancia del objeto. Ya estamos conectados */
            $bd = Db::getInstance();

            /* Creamos una query */
            $sql = 'SELECT * FROM boleta ORDER BY codigo';

            /* Ejecutamos la query */
            $stmt = $bd->ejecutar($sql);

            /* Realizamos un bucle para ir obteniendo los resultados */
            while ($x = $bd->obtener_fila($stmt, 0)) {
                ?>
                <tr>
                    <td>
                        <?php echo $x['codigo']; ?>
                    </td>
                    <td>
                        <?php echo $x['codigoCliente']; ?>
                    </td>
                    <td>
                        <?php echo $x['dañoReportado']; ?>
                    </td>
                </tr>
                <?php
            }
            ?>

        </table>
        <form action="Taller.php" method="get" >
            <input class="btn-style" type="submit" value="Nuevo" />
        </form>
    </body>
</html>

