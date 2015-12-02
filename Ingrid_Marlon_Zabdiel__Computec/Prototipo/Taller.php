<html>
    <head>
        <link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="CSS/TableStyle.css" type="text/css"/>
        <link rel="stylesheet" href="CSS/Style.css" type="text/css"/>
        <link rel="stylesheet" href="CSS/popup.css" type="text/css">
        <script type="text/javascript" src="js/Funciones.js"></script>
        <script src="js/jquery-2.1.4.js"></script>
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <?php
        require_once('calendar/tc_calendar.php');
        /* Incluimos el fichero de la clase Db */
        require './Datos/Db.class.php';
        /* Incluimos el fichero de la clase Conf */
        require 'Conf.class.php';
        ?>
    </head>
    <body onload="inicio()">

        <div class="popupGrayBg"  id="popupGrayBg"></div>
        <div id="pop" class="pop" draggable="true">
            <input type="button" class="close" onclick="cerrar()" value="X"/>

            <table class="CSS_Table">
                <th>Tipo de Equipo</th>
                <tr>
                    <td>
                        <input type="radio" name="equipo" value="Computadora"/>Computadora
                        <input type="radio" name="equipo" value="Impresora">Impresora
                        <input type="radio" name="equipo" value="Celular">Celular
                    </td>
                </tr>
            </table>
            <tr>
            <table class="CSS_Table">
                <th>Marca</th>
                <th>Modelo</th>
                <th>Serie</th>
                <tr>
                    <td><input id="Marca" type="text" class="textbox"/></td>
                    <td><input id="Modelo" type="text" class="textbox"/></td>
                    <td><input id="Serie" type="text" class="textbox"/></td>
                </tr>
            </table>

            <input type="button" class="btn-style" value="Agregar" onclick="agregarEquipo()"/>
        </div>

        <script>
            $("#pop").draggable();
        </script>


        <form action="" >
            <table class="CSS_Table">
                <th>N° de Orden</th>
                <th>Fecha de Ingreso</th>

                <tr>  
                    <td>
                        <?php
                        /* Creamos la instancia del objeto. Ya estamos conectados */
                        $bd = Db::getInstance();

                        /* Creamos una query */
                        $sql = 'SELECT codigo FROM boleta ORDER BY codigo DESC LIMIT 1';

                        /* Ejecutamos la query */
                        $stmt = $bd->ejecutar($sql);

                        /* Realizamos un bucle para ir obteniendo los resultados */
                        while ($x = $bd->obtener_fila($stmt, 0)) {
                            echo $x['codigo'] + 1;
                        }
                        ?></td>
                    <td><?php
                        $myCalendar = new tc_calendar("date5", true, false);
                        $myCalendar->setIcon("calendar/images/iconCalendar.gif");
                        $myCalendar->setDate(date('d'), date('m'), date('Y'));
                        $myCalendar->setPath("calendar/");
                        $myCalendar->setYearInterval(2000, 2030);
                        $myCalendar->dateAllow('2008-05-13', '2017-03-01');
                        $myCalendar->setDateFormat('j F Y');
                        $myCalendar->setAlignment('left', 'bottom');
                        $myCalendar->setSpecificDate(array("2011-04-01", "2011-04-04", "2011-12-25"), 0, 'year');
                        $myCalendar->setSpecificDate(array("2011-04-10", "2011-04-14"), 0, 'month');
                        $myCalendar->setSpecificDate(array("2011-06-01"), 0, '');
                        $myCalendar->writeScript();
                        ?></td>


                </tr>

                <table class="CSS_Table">
                    <th>Cliente</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <tr>
                        <td><select class="textbox">
                                <?php
                                $sql = 'SELECT * FROM `cliente`';

                                /* Ejecutamos la query */
                                $stmt = $bd->ejecutar($sql);

                                /* Realizamos un bucle para ir obteniendo los resultados */
                                while ($x = $bd->obtener_fila($stmt, 0)) {
                                    ?>
                                    <option class="textbox" value="<?php $x['codigo'] ?>" ><?php
                                        echo $x['codigo'];
                                        echo ': ';
                                        echo $x['nombre'];
                                        ?></option>
                                    <?php
                                }
                                ?>
                            </select></td>
                        <td><input class="textbox" type="text" placeholder="Nombre"/></td>
                        <td><input class="textbox" type="tel" placeholder="Telefono"/></td>
                    </tr>
                </table>
                <!--agregar equipos al la orden (en el siguiente div) -->

                <div id="panelEquipos"></div>

                <input type="button" onclick="mostrar()" class="btn-style" align="right" value="Agregar Equipo"/>

                </tr>
            </table>

            <input type="button" onclick="guardarBoleta()" class="btn-style" align="right" value="Confirmar"/>
        </form>

    </body>
</html>
