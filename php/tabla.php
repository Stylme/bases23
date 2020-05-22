<div>
    <?php
    header('Content-type: text/html; charset=utf-8');
    $conexion = mysqli_connect("localhost", "root", "", "josebases1");
    mysqli_set_charset($conexion, "utf8");
    $i = 0;
    $medico = $_POST['med'];
    $sql = "SELECT * FROM PROGRAMACION,PACIENTE,MEDICO,TIPO_CIRUGIA,SITIO,CIRUGIA 
    WHERE MEDICO.nom_medico='$medico' AND PROGRAMACION.cod_medico=MEDICO.cod_medico 
    AND PROGRAMACION.cod_sitio=SITIO.cod_sitio 
    AND PROGRAMACION.cod_paciente=PACIENTE.cod_paciente 
    AND CIRUGIA.cod_cirugia=PROGRAMACION.cod_cirugia 
    AND CIRUGIA.cod_t_cirugia=TIPO_CIRUGIA.cod_t_cirugia";
    mysqli_set_charset($conexion, "utf8");
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
                                <h5 class="card-title">Fecha y hora</h5>
                                <p class="card-text"><?php echo $row["fecha_cirugia"] ?></p>
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
                            <?php
                            $sql1 = "SELECT sum(programacion.costo) 
                            FROM programacion, medico 
                            WHERE medico.cod_medico=programacion.cod_medico 
                            AND medico.nom_medico = '$medico';";
                            $resultadoGanancias = mysqli_query($conexion, $sql1);
                            $gananciastotales = mysqli_fetch_array($resultadoGanancias);
                            $sql2 = ""
                            ?>
                            <p class="card-text"><h6>Ganancias totales:</h6><?php echo $gananciastotales[0] ?></p>
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
                                <h5 class="card-title">Fecha y hora</h5>
                                <p class="card-text"><?php echo $row["fecha_cirugia"] ?></p>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-1">
                </div>
            </div>
        <?php
        } ?>
    <?php $i++;
    }
    ?>
</div>