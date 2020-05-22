<div>
    <?php
    require_once("conexion.php");
    $i = 0;

    $medico = $_POST['med'];
    $sql = "SELECT * 
FROM PROGRAMACION,PACIENTE,MEDICO,TIPO_CIRUGIA,SITIO,CIRUGIA 
where MEDICO.nom_medico='$medico' 
and PROGRAMACION.cod_medico=MEDICO.cod_medico 
and PROGRAMACION.cod_sitio=SITIO.cod_sitio 
and PROGRAMACION.cod_paciente=PACIENTE.cod_paciente 
and CIRUGIA.cod_cirugia=PROGRAMACION.cod_cirugia 
and CIRUGIA.cod_t_cirugia=TIPO_CIRUGIA.cod_t_cirugia;";

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

                            <button type="button" data-toggle="modal" data-target="#modaltablita"
                                    class="btn btn-outline-success"><strong>Tipo de
                                    cirugía:</strong> <?php echo $row["nom_t_cirugia"] ?>
                            </button>


                            <div class="modal" id="modaltablita" tabindex="-1" role="dialog"
                                 aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Requerimentos de la cirugía</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">

                                                    <table class="table table-borderless">

                                                        <thead>
                                                        <tr>
                                                            <th scope="col">Materiales</th>
                                                        </tr>
                                                        </thead>
                                                <?php
                                                $nom_t = $row['nom_t_cirugia'];
                                                $sqli = "SELECT nom_t_cirugia,nom_material 
FROM TIPO_CIRUGIA,CIRUGIA_MATERIALES,MATERIALES 
WHERE nom_t_cirugia='$nom_t' and TIPO_CIRUGIA.cod_t_cirugia=CIRUGIA_MATERIALES.cod_t_cirugia and CIRUGIA_MATERIALES.cod_materiales=MATERIALES.cod_material";
                                                $resulti = mysqli_query($conexion, $sqli);
                                                while ($rowmat = mysqli_fetch_array($resulti)) { ?>


                                                            <tbody>


                                                                <td ><?php echo $rowmat["nom_material"] ?></td>


                                                            </tbody>




                                                    <?php
                                                }
                                                ?></table>
                                            </div>
                                            <div class="col-6">

                                                <table class="table table-borderless">

                                                    <thead>
                                                    <tr>
                                                        <th scope="col">Medicamentos</th>
                                                    </tr>
                                                    </thead>
                                                    <?php
                                                    $nom_t = $row['nom_t_cirugia'];
                                                    $sqli = "SELECT nom_t_cirugia,nom_medicamento
FROM TIPO_CIRUGIA,CIRUGIA_MEDICAMENTOS,MEDICAMENTOS
WHERE nom_t_cirugia='$nom_t' and TIPO_CIRUGIA.cod_t_cirugia=CIRUGIA_MEDICAMENTOS.cod_t_cirugia and CIRUGIA_MEDICAMENTOS.cod_medicamentos=MEDICAMENTOS.cod_medicamento";
                                                    $resulti = mysqli_query($conexion, $sqli);
                                                    while ($rowmat = mysqli_fetch_array($resulti)) { ?>


                                                        <tbody>


                                                        <td ><?php echo $rowmat["nom_medicamento"] ?></td>


                                                        </tbody>




                                                        <?php
                                                    }
                                                    ?></table>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>


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
                                <p class="card-text"><?php echo substr ( $row["fecha_cirugia"], 0, 10  )  ?></p>
                                <h5 class="card-title">Hora:</h5>
                                <p class="card-text"><?php echo substr ( $row["fecha_cirugia"], 11,18  )  ?></p>

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
                            <button type="button" data-toggle="modal" data-target="#<?php echo $row["nom_t_cirugia"] ?>"
                                    aria-pressed="false"
                                    class="btn btn-outline-success"><strong>Tipo de
                                    cirugía:</strong> <?php echo $row["nom_t_cirugia"] ?>
                            </button>


                            <div class="modal fade" id=<?php echo $row["nom_t_cirugia"] ?> tabindex="-1" role="dialog"
                                 aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Requerimentos de la cirugía</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">

                                                <table class="table table-borderless">

                                                    <thead>
                                                    <tr>
                                                        <th scope="col">Materiales</th>
                                                    </tr>
                                                    </thead>
                                                    <?php
                                                    $nom_t = $row['nom_t_cirugia'];
                                                    $sqli = "SELECT nom_t_cirugia,nom_material 
FROM TIPO_CIRUGIA,CIRUGIA_MATERIALES,MATERIALES 
WHERE nom_t_cirugia='$nom_t' and TIPO_CIRUGIA.cod_t_cirugia=CIRUGIA_MATERIALES.cod_t_cirugia and CIRUGIA_MATERIALES.cod_materiales=MATERIALES.cod_material";
                                                    $resulti = mysqli_query($conexion, $sqli);
                                                    while ($rowmat = mysqli_fetch_array($resulti)) { ?>


                                                        <tbody>


                                                        <td ><?php echo $rowmat["nom_material"] ?></td>


                                                        </tbody>




                                                        <?php
                                                    }
                                                    ?></table>
                                            </div>
                                            <div class="col-6">

                                                <table class="table table-borderless">

                                                    <thead>
                                                    <tr>
                                                        <th scope="col">Medicamentos</th>
                                                    </tr>
                                                    </thead>
                                                    <?php
                                                    $nom_t = $row['nom_t_cirugia'];
                                                    $sqli = "SELECT nom_t_cirugia,nom_medicamento
FROM TIPO_CIRUGIA,CIRUGIA_MEDICAMENTOS,MEDICAMENTOS
WHERE nom_t_cirugia='$nom_t' and TIPO_CIRUGIA.cod_t_cirugia=CIRUGIA_MEDICAMENTOS.cod_t_cirugia and CIRUGIA_MEDICAMENTOS.cod_medicamentos=MEDICAMENTOS.cod_medicamento";
                                                    $resulti = mysqli_query($conexion, $sqli);
                                                    while ($rowmat = mysqli_fetch_array($resulti)) { ?>


                                                        <tbody>


                                                        <td ><?php echo $rowmat["nom_medicamento"] ?></td>


                                                        </tbody>




                                                        <?php
                                                    }
                                                    ?></table>
                                            </div></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3 ml-2 mt-2">
                    <div class="card">

                        <div class="card-body">
                            <h5 class="card-title"></h5>
                            <div class="card-body">
                                <h5 class="card-title">Fecha:</h5>
                                <p class="card-text"><?php echo substr($row["fecha_cirugia"], 0, 10) ?></p>
                                <h5 class="card-title">Hora:</h5>
                                <p class="card-text"><?php echo substr($row["fecha_cirugia"], 11, 18) ?></p>
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
