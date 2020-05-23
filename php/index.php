<html lang="en">

<head>
    <script src="../js/scripts.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="../js/jquery-3.5.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js" integrity="sha256-FEqEelWI3WouFOo2VWP/uJfs1y8KJ++FLh2Lbqc8SJk=" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <title>Base de datos Cirugía</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>
    <?php
    $conexion = mysqli_connect("localhost", "root", "", "josebases1");
    ?>
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand">Software agenda</a>
        <form class="form-inline my-2 my-lg-0">
            <button type="button" class="btn btn-primary mr-sm-2" data-toggle="modal" data-target="#consultasModal">Consultas generales</button>
            <button class="btn btn-success" type="button" data-toggle="modal" data-target="#exampleModal">Programar cirugía</button>
        </form>
    </nav>
    <div class="form-row">
        <div class="col-1 ml-2"></div>
        <br>
        <div class="col-3">
            <br>
            <h4>Agenda por médico</h4>
            <label for="seleccion">Listado de médicos</label>
            <select id="seleccion" class="form-control" onchange="medico()">
                <option>Seleccionar médico...</option>
                <?php

                $sql = "SELECT * FROM MEDICO";
                mysqli_set_charset($conexion, "utf8");
                $result = mysqli_query($conexion, $sql);
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <option value="<?php echo $row["nom_medico"] ?>"><?php echo $row["nom_medico"] ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="">
            <!-- Button trigger modal -->

        </div>
    </div>
    <div id="carga"></div>

    <div class="modal fade" id="consultasModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Consultas generales</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Ganancias totales</label>
                        <?php
                        $con0 = "SELECT sum(costo)
                                    FROM PROGRAMACION;";
                        $resultadoCon0 = mysqli_query($conexion, $con0);
                        $impr0 = mysqli_fetch_array($resultadoCon0);
                        ?>
                        <h6><?php echo $impr0[0] ?></h6>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label>Número de cirugías programadas</label>
                        <?php
                        $con1 = "SELECT count(cod_cirugia)
                                    FROM PROGRAMACION;";
                        $resultadoCon1 = mysqli_query($conexion, $con1);
                        $impr1 = mysqli_fetch_array($resultadoCon1);
                        ?>
                        <h6><?php echo $impr1[0] ?></h6>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agendar cirugía</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="insertarProgramacion.php">
                        <!--Input fecha datetimepicker-->
                        <div class="container">
                            <div class="row">
                                <div class="form-group">
                                    <label for="datetimepicker5">Fecha y hora</label>
                                    <input type="text" name="datetimepicker5" id="datetimepicker5" class="form-control" />
                                </div>
                                <script type="text/javascript">
                                    $('#datetimepicker5').datetimepicker({
                                        timepicker: true,
                                        datapicker: true,
                                        format: 'Y-m-d H:i',
                                        value: '2020-05-22 09:45',
                                        hours12: false,
                                        step: 30,
                                        weeks: true
                                    });
                                </script>
                            </div>
                        </div>
                        <!--Select cirugia-->
                        <div class="form-group">
                            <label for="inputCirugia">Sala de cirugía</label>
                            <select id="inputCirugia" name="inputCirugia" class="form-control">
                                <option selected>Seleccione...</option>
                                <?php
                                $sqlSalas = "SELECT * FROM sitio";
                                $resultadoSalas = mysqli_query($conexion, $sqlSalas);
                                while ($rowSalas = mysqli_fetch_array($resultadoSalas)) {
                                ?>
                                    <option value="<?php echo $rowSalas["cod_sitio"] ?>"><?php echo $rowSalas["cod_sitio"] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <!--Select tipo de cirugia-->
                        <div class="form-group">
                            <label for="inputTipo">Tipo de cirugía</label>
                            <select id="inputTipo" name="inputTipo" class="form-control">
                                <option selected>Seleccione...</option>
                                <?php
                                $sqlTipo = "SELECT * FROM cirugia";
                                $resultadoTipo = mysqli_query($conexion, $sqlTipo);
                                while ($rowTipo = mysqli_fetch_array($resultadoTipo)) {
                                ?>
                                    <option value="<?php echo $rowTipo["cod_cirugia"] ?>"><?php echo $rowTipo["nom_cirugia"] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <!--Select paciente-->
                        <div class="form-group">
                            <label for="inputPaciente">Paciente</label>
                            <select id="inputPaciente" name="inputPaciente" class="form-control">
                                <option selected>Seleccione...</option>
                                <?php
                                $sqlPaciente = "SELECT * FROM paciente";
                                $resultadoPaciente = mysqli_query($conexion, $sqlPaciente);
                                while ($rowPaciente = mysqli_fetch_array($resultadoPaciente)) {
                                ?>
                                    <option value="<?php echo $rowPaciente["cod_paciente"] ?>"><?php echo $rowPaciente["nom_paciente"] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <!--Select médico-->
                        <div class="form-group">
                            <label for="inputMedico">Médico</label>
                            <select id="inputMedico" name="inputMedico" class="form-control">
                                <option selected>Seleccione...</option>
                                <?php
                                $sqlMedico = "SELECT * FROM medico";
                                $resultadoMedico = mysqli_query($conexion, $sqlMedico);
                                while ($rowMedico = mysqli_fetch_array($resultadoMedico)) {
                                ?>
                                    <option value="<?php echo $rowMedico["cod_medico"] ?>"><?php echo $rowMedico["nom_medico"] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <!--Input costo-->
                        <div class="form-group">
                            <label for="inputCosto">Costo</label>
                            <input type="number" name="inputCosto" id="inputCosto" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" id="btnAgendar" class="btn btn-primary">Agendar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="alert">
    </div>
    <?php mysqli_close($conexion); ?>
</body>

</html>