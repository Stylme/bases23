<?php
if (
    isset($_POST['inputCirugia']) && !empty($_POST['inputCirugia']) &&
    isset($_POST['datetimepicker5']) && !empty($_POST['datetimepicker5']) &&
    isset($_POST['inputTipo']) && !empty($_POST['inputTipo']) &&
    isset($_POST['inputPaciente']) && !empty($_POST['inputPaciente']) &&
    isset($_POST['inputMedico']) && !empty($_POST['inputMedico']) &&
    isset($_POST['inputCosto']) && !empty($_POST['inputCosto'])
) {
    $cod_sitio = $_POST["inputCirugia"];
    $fechayhora = $_POST["datetimepicker5"];
    $cod_cirugia = $_POST["inputTipo"];
    $cod_paciente = $_POST["inputPaciente"];
    $cod_medico = $_POST["inputMedico"];
    $costo = $_POST["inputCosto"];
    
    $conexion = mysqli_connect("localhost", "root", "", "josebases1");
    $sql = "INSERT INTO programacion(cod_sitio, fecha_cirugia, cod_cirugia, cod_paciente, cod_medico, costo) VALUES($cod_sitio, '$fechayhora', $cod_cirugia, $cod_paciente, $cod_medico, $costo)";
    mysqli_query($conexion, $sql);
    // Ahora comprobaremos que todo ha ido correctamente
    $my_error = mysqli_error($conexion);
    if (!empty($my_error)) {
        echo "Ha habido un error al insertar los valores. $my_error";
    } else {
        echo "Los datos han sido introducidos satisfactoriamente";
    }
} else {
    echo "Error, no ha introducido todos los datos";
}
?>
