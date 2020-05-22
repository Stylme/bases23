<html lang="en">

<head>
    <script src="../js/scripts.js"></script>
    <script src="../js/jquery-3.5.0.min.js"></script>
    <meta charset="UTF-8">
    <title>Base de datos Cirugía</title>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>
    <h4>Seleccionar Médico: <h4>
            <select id="seleccion" class="form-control" onchange="medico()">
                <?php
                $conexion = mysqli_connect("localhost", "root", "", "josebases1");
                $sql = "SELECT * FROM MEDICO";
                mysqli_set_charset($conexion, "utf8");
                $result = mysqli_query($conexion, $sql);
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <option value="<?php echo $row["nom_medico"] ?>"><?php echo $row["nom_medico"] ?></option>
                <?php
                }
                mysqli_close($conexion);
                ?>
            </select>
            <div id="carga">
            </div>
</body>

</html>