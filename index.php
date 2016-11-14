<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Agenda de contactos</title>
    </head>
    <body>
/**
lalalalalalallalaalalalalallalalalalalallalalalalalalallalalalalallalalalallalalalalalalalalallalalalalalalalall
*/
        <?php
        $contactos = array();

        if (isset($_POST) && !empty($_POST)) {
            /**
             * Inicialización del array con los datos introducidos por el usuario
             */
            if (!isset($_POST["agenda"]) && !isset($contactos)) {
                $contactos = array();
            } else {
                if (isset($_POST["agenda"])) {
                    $contactos = $_POST["agenda"];
                }
            }

            if (!empty($_POST["nombre"]) && !empty($_POST["telef"])) {
                /**
                 * .Si el usuario solo relleña el campo de Nombre, y 
                 * el nombre ya estaba introducido anteriormente, se 
                 * cambiará al nuevo númerode teléfono asignado
                 */
                if (comparar($_POST["nombre"], $contactos)) {
                    $contactos[$_POST["nombre"]] = $_POST["telef"];
                } else {
                    $contactos[$_POST["nombre"]] = $_POST["telef"];
                    echo "Nuevo contacto añadido";
                }
                /**
                 * Si el usuario solo relleña el campo de Nombre, y el 
                 * de teléfono está vacio, y el nombre ya estaba 
                 * introducido anteriormente, se eliminará el contacto,  
                 * o saldrá el mensaje de error
                 */
            } elseif (!empty($_POST["nombre"]) && empty($_POST["telef"])) {
                if (comparar($_POST["nombre"], $contactos)) {
                    unset($contactos[$_POST["nombre"]]);
                    echo "Se ha elliminado elcontacto";
                } else {
                    echo "Error, el nombre introducido no tenia ningún teléfono asignado";
                }
            }
        }

        /**
         * @param type $name
         * @param type $array
         * @return boolean
         * Función para comparar si el valor a comparar es igual a los 
         * indices que hay insertados en la array
         */
        function comparar($name, $array) {
            $valor = false;
            foreach ($array as $nombre => $telefono) {
                if (strcmp($nombre, $name) == 0) {
                    $valor = true;
                }
            }
            return $valor;
        }
        ?>
        <div id="principal">
            <div id="resultado">

                <h1>Agenda personal</h1>
                <table>
                    <tr>
                        <th>Nombre</th>
                        <th>Teléfono</th>
                    </tr>
<?php
/**
 * Parcada elemento de la array decontactos imprime en una 
 * columna de la tabla el nombre del contacto y en la siguiente
 * columna el teléfono asignado 
 */
foreach ($contactos as $_POST["nombre"] => $_POST["telef"]) {
    echo '<tr><td>' . $_POST["nombre"] . '</td>';
    echo '<td>' . $_POST["telef"] . '</td></tr>';
}
?>
                </table>
            </div>

            <div id="forms">
                <form method="post">
                    <fieldset>
                        <legend>Introduce los datos del contacto</legend>
<?php
/**
 * Recoge los datos de los campos de texto y los define 
 * como indice y valor asignado, para luego añadirlo 
 * directamente en la array
 */
foreach ($contactos as $nombre => $telefono) {
    echo '<input type="hidden" name="agenda[' . $nombre . ']" value="' . $telefono . '"';
    echo"<br>";
}
?>
                        <label>Escriba el nombre</label>
                        <input type="text" name="nombre" class="texto" required>
                        <br>
                        <label>Escriba el numero</label>
                        <input type="text" name="telef" class="texto">
                        <br>
                        <input type="submit" name="array">
                    </fieldset>
                </form> 
            </div>
        </div>
    </body>
</html>
