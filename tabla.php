
<div>
<?php
require_once("conexion.php");
$i = 0;

$medico = $_POST['med'];
$sql = "SELECT * FROM PROGRAMACION,PACIENTE,MEDICO,TIPO_CIRUGIA,SITIO,CIRUGIA where MEDICO.nom_medico='$medico' and PROGRAMACION.cod_medico=MEDICO.cod_medico and PROGRAMACION.cod_sitio=SITIO.cod_sitio and PROGRAMACION.cod_paciente=PACIENTE.cod_paciente and CIRUGIA.cod_cirugia=PROGRAMACION.cod_cirugia and CIRUGIA.cod_t_cirugia=TIPO_CIRUGIA.cod_t_cirugia;";

$result = mysqli_query($conexion, $sql);
while ($row = mysqli_fetch_array($result)) {
    if ($i == 0) {
        ?>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-3 ml-2 mt-2">
                <div class="card">
                    <div class="card-header">
                        <h2>Datos</h2>
                    </div>
                    <div class="card-body">

                        <p class="card-text"><strong>Médico: </strong> <?php echo $row["nom_medico"] ?></p>

                        <p class="card-text"><strong>Paciente: </strong> <?php echo $row["nom_paciente"] ?></p>

                        <p class="card-text"><strong>Sitio: </strong> <?php echo $row["nom_sitio"] ?></p>

                        <p class="card-text"><strong>Costo:</strong> <?php echo $row["costo"] ?></p>

                        <button class="btn"><strong>Tipo de cirugía:</strong> <?php echo $row["nom_t_cirugia"] ?>
                        </button>


                    </div>
                </div>
            </div>
            <div class="col-3 ml-2 mt-2">
                <div class="card">
                    <div class="card-header">
                        <h2>Programación</h2>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <div class="card-body">
                            <h5 class="card-title">Fecha:</h5>
                            <p class="card-text"><?php echo $row["fecha_cirugia"] ?></p>
                            <h5 class="card-title">Hora:</h5>
                            <p class="card-text"><?php echo $row["hora_cirugia"] ?></p>

                        </div>

                    </div>
                </div>
            </div>

            <div class="ml-2 mt-2 col-3 ">
                <div class="card">
                    <div class="card-header">
                        <h2>Consultas</h2>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text">Consultas</p>

                    </div>
                </div>
            </div>
            <div class="col-1"></div>
        </div>

        <?php
    } else {
        ?>

        <div class="row">
            <div class="col-1"></div>
            <div class="col-3 ml-2 mt-2">
                <div class="card">
                    <div class=""></div>
                    <div class="card-body">

                        <p class="card-text"><strong>Médico:</strong> <?php echo $row["nom_medico"] ?></p>

                        <p class="card-text"><strong>Paciente:</strong> <?php echo $row["nom_paciente"] ?></p>

                        <p class="card-text"><strong>Sitio:</strong> <?php echo $row["nom_sitio"] ?></p>

                        <p class="card-text"><strong>Costo:</strong> <?php echo $row["costo"] ?></p>

                        <button class="btn"><strong>Tipo de cirugía:</strong> <?php echo $row["nom_t_cirugia"] ?>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-3 ml-2 mt-2">
                <div class="card">

                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <div class="card-body">
                            <h5 class="card-title">Fecha:</h5>
                            <p class="card-text"><?php echo $row["fecha_cirugia"] ?></p>
                            <h5 class="card-title">Hora:</h5>
                            <p class="card-text"><?php echo $row["hora_cirugia"] ?></p>

                        </div>

                    </div>
                </div>
            </div>
            <div class="col-1"></div>

        </div>
        <?php
    } ?>

    <?php $i += 1;
}
?>
</div>
