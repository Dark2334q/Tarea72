<!DOCTYPE html>
<html>

<head lang="en">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>SYSTEM GEST CORPORACION</title>
	<link href="bootstrap/img/favicon.144x144.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
	<link href="bootstrap/img/favicon.114x114.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
	<link href="bootstrap/img/favicon.72x72.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
	<link href="bootstrap/img/favicon.57x57.png" rel="apple-touch-icon" type="image/png">
	<link href="bootstrap/img/favicon.png" rel="icon" type="image/png">
	<link href="bootstrap/img/logo_EY3.png" rel="shortcut icon">
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<link rel="stylesheet" href="bootstrap/css/lib/lobipanel/lobipanel.min.css">
	<link rel="stylesheet" href="bootstrap/css/separate/vendor/lobipanel.min.css">
	<link rel="stylesheet" href="bootstrap/css/lib/jqueryui/jquery-ui.min.css">
	<link rel="stylesheet" href="bootstrap/css/separate/pages/widgets.min.css">
	<link rel="stylesheet" href="bootstrap/css/lib/font-awesome/font-awesome.min.css">
	<link rel="stylesheet" href="bootstrap/css/lib/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap/css/main.css">

</head>
<body class="with-side-menu dark-theme dark-theme-blue">
	<?php include "encabezado/menu.php"; ?>
	<div class="page-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-6">
					<div class="chart-statistic-box">
						<div class="chart-txt">
							<div class="chart-txt-top">
							</div>
							<table class="tbl-data">
								<div class="body">
								</div>
							</table>
						</div>

						<div class="chart-container">
							<div class="chart-container-in">
								<div id="chart_div"></div>
								<header class="chart-container-title">VALOR CARRERA</header>

							</div>
						</div>
					</div><!--.chart-statistic-box-->
				</div><!--.col-->
				<div class="col-xl-6">
					<div class="row">
						<div class="col-sm-6">
							<article class="statistic-box red">
								<div>
									<?php
									$resultado = mysqli_query($con, "SELECT COUNT(*) AS cantidad_filas FROM estudiante");
									if ($resultado) {
										$fila = mysqli_fetch_assoc($resultado);
										echo '<div class="number" id="estudiante">' . $fila['cantidad_filas'] . '</div>';
									} else {
										echo "Error al ejecutar la consulta: " . mysqli_error($con);
									}
									?>
									<div class="caption">
										<div>ESTUDIANTES</div>
									</div>
									<div class="percent">
										<div class="arrow up"></div>
										<p>14%</p>
									</div>
								</div>
							</article>
						</div><!--.col-->
						<div class="col-sm-6">
							<article class="statistic-box purple">
								<div>
									<?php
									$resulta = mysqli_query($con, "SELECT COUNT(*) AS cantidad FROM docente");
									if ($resulta) {
										$fila = mysqli_fetch_assoc($resulta);
										echo '<div class="number" >' . $fila['cantidad'] . '</div>';
									} else {
										echo "Error al ejecutar la consulta: " . mysqli_error($con);
									}
									?>
									<div class="caption">
										<div>DOCENTES</div>
									</div>
									<div class="percent">
										<div class="arrow down"></div>
										<p>11%</p>
									</div>
								</div>
							</article>
						</div><!--.col-->
						<div class="col-sm-6">
							<article class="statistic-box yellow">
								<div>
									<?php
									$resulta = mysqli_query($con, "SELECT COUNT(*) AS cantidad FROM usuarios");
									if ($resulta) {
										$fila = mysqli_fetch_assoc($resulta);
										echo '<div class="number" >' . $fila['cantidad'] . '</div>';
									} else {
										echo "Error al ejecutar la consulta: " . mysqli_error($con);
									}
									?>
									<div class="caption">
										<div>USUARIOS</div>
									</div>
									<div class="percent">
										<div class="arrow down"></div>
										<p>5%</p>
									</div>
								</div>
							</article>
						</div><!--.col-->
						<div class="col-sm-6">
							<article class="statistic-box green">
								<div>
									<?php
									$resulta = mysqli_query($con, "SELECT COUNT(*) AS cantidad FROM carrera");
									if ($resulta) {
										$fila = mysqli_fetch_assoc($resulta);
										echo '<div class="number" >' . $fila['cantidad'] . '</div>';
									} else {
										echo "Error al ejecutar la consulta: " . mysqli_error($con);
									}
									?>
									<div class="caption">
										<div>CARRERAS</div>
									</div>
									<div class="percent">
										<div class="arrow up"></div>
										<p>84%</p>
									</div>
								</div>
							</article>
						</div><!--.col-->
					</div><!--.row-->
				</div><!--.col-->
			</div><!--.row-->
			<div class="row">
				<div class="col-xl-6 dahsboard-column">
					<section class="box-typical box-typical-dashboard panel panel-default scrollable">
						<header class="box-typical-header panel-heading">
							<h3 class="panel-title">ESTUDIANTE APROBADOS</h3>
						</header>
						<div class="box-typical-body panel-body">
							<table class="tbl-typical">

								<?php
								if (mysqli_connect_errno()) {
									echo "Error al conectar con la base de datos: " . mysqli_connect_error();
									exit();
								}
								$resultado = mysqli_query(
									$con,
									"SELECT  CONCAT(e.nombre_est, ' ', e.apellidos_estu) as Estudiante, 
                                c.nombre_carrera AS Carrera, m.nombre_mod AS Modulo, 
                                rel.NOTA1*0.25+rel.NOTA2*0.25+rel.NOTA3*0.5 As Promedio
                                FROM REL_NOTAS rel
                                INNER JOIN estudiante e ON rel.id_estudiante = e.ID_ESTUDIANTE
                                INNER JOIN carrera c ON rel.cod_carrera = c.COD_CARRERA
                                INNER JOIN modulos m ON rel.cod_modulo = m.COD_MODULO 
                                where rel.NOTA1*0.25 + rel.NOTA2*0.25 + rel.NOTA3*0.5 >= 3;;
                                "
								);
								if ($resultado) {
									echo '<table class="tbl-typical">';
									echo '<tr>';
									echo '<th align="center"><div>ESTUDIANTE</div></th>';
									echo '<th align="center"><div>CARRERA</div></th>';
									echo '<th align="center"><div>MODULO</div></th>';
									echo '<th align="center"><div>PROMEDIO</div></th>';
									echo '</tr>';
									while ($fila = mysqli_fetch_assoc($resultado)) {
										echo '<tr>';
										echo '<td>' . $fila['Estudiante'] . '</td>';
										echo '<td>' . $fila['Carrera'] . '</td>';
										echo '<td> <span class="label label-primary">' . $fila['Modulo'] . '</span> </td>';
										echo '<td align="center">' . $fila['Promedio'] . '</td>';
										echo '</tr>';
									}
									echo '</table>';
									mysqli_free_result($resultado);
								} else {
									echo "Error al ejecutar la consulta: " . mysqli_error($con);
								}
								?>

							</table>
						</div><!--.box-typical-body-->
					</section><!--.box-typical-dashboard-->
				</div><!--.col-->
				<div class="col-xl-6 dahsboard-column">
					<section class="box-typical box-typical-dashboard panel panel-default scrollable">
						<header class="box-typical-header panel-heading">
							<h3 class="panel-title">ESTUDIANTE DESAPROBADOS</h3>
						</header>
						<div class="box-typical-body panel-body">
							<table class="tbl-typical">
								<?php
								if (mysqli_connect_errno()) {
									echo "Error al conectar con la base de datos: " . mysqli_connect_error();
									exit();
								}
								$resultado = mysqli_query(
									$con,
									"SELECT  CONCAT(e.nombre_est, ' ', e.apellidos_estu) as Estudiante, 
                                c.nombre_carrera AS Carrera, m.nombre_mod AS Modulo, 
                                rel.NOTA1*0.25+rel.NOTA2*0.25+rel.NOTA3*0.5 As Promedio
                                FROM REL_NOTAS rel
                                INNER JOIN estudiante e ON rel.id_estudiante = e.ID_ESTUDIANTE
                                INNER JOIN carrera c ON rel.cod_carrera = c.COD_CARRERA
                                INNER JOIN modulos m ON rel.cod_modulo = m.COD_MODULO
								where rel.NOTA1*0.25 + rel.NOTA2*0.25 + rel.NOTA3*0.5 < 3;
                                "
								);
								if ($resultado) {
									echo '<table class="tbl-typical">';
									echo '<tr>';
									echo '<th align="center"><div>ESTUDIANTE</div></th>';
									echo '<th align="center"><div>CARRERA</div></th>';
									echo '<th align="center"><div>MODULO</div></th>';
									echo '<th align="center"><div>PROMEDIO</div></th>';
									echo '</tr>';
									while ($fila = mysqli_fetch_assoc($resultado)) {
										echo '<tr>';
										echo '<td>' . $fila['Estudiante'] . '</td>';
										echo '<td>' . $fila['Carrera'] . '</td>';
										echo '<td> <span class="label label-primary">' . $fila['Modulo'] . '</span> </td>';
										echo '<td align="center">' . $fila['Promedio'] . '</td>';
										echo '</tr>';
									}
									echo '</table>';
									mysqli_free_result($resultado);
								} else {
									echo "Error al ejecutar la consulta: " . mysqli_error($con);
								}
								?>
							</table>
						</div><!--.box-typical-body-->
					</section><!--.box-typical-dashboard-->

				</div><!--.col-->
			</div>
		</div><!--.container-fluid-->
	</div><!--.page-content-->
	<script src="bootstrap/js/lib/jquery/jquery.min.js"></script>
	<script src="bootstrap/js/lib/tether/tether.min.js"></script>
	<script src="bootstrap/js/lib/bootstrap/bootstrap.min.js"></script>
	<script src="bootstrap/js/plugins.js"></script>
	<script type="text/javascript" src="bootstrap/js/lib/jqueryui/jquery-ui.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/lib/lobipanel/lobipanel.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/lib/match-height/jquery.matchHeight.min.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script src="bootstrap/js/app.js"></script>
	<?php
	if (!$con) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$sql = "SELECT nombre_carrera, valor_carrera FROM carrera";
	$resultado = mysqli_query($con, $sql);
	$datos = array();
	while ($fila = mysqli_fetch_assoc($resultado)) {
		$nombre = $fila['nombre_carrera'];
		$costo = (float)$fila['valor_carrera'];
		$datos[] = "['$nombre', $costo, '$costo']";
	}
	$datos_js = implode(",", $datos);
	?>
	<script>
		$(document).ready(function() {
			$('.panel').lobiPanel({
				sortable: true
			});
			$('.panel').on('dragged.lobiPanel', function(ev, lobiPanel) {
				$('.dahsboard-column').matchHeight();
			});

			google.charts.load('current', {
				'packages': ['corechart']
			});
			google.charts.setOnLoadCallback(drawChart);

			function drawChart() {
				var dataTable = new google.visualization.DataTable();
				dataTable.addColumn('string', 'nombre_carrera');
				dataTable.addColumn('number', 'valor_carrera');
				dataTable.addColumn({
					type: 'string',
					role: 'tooltip',
					'p': {
						'html': true
					}
				});
				dataTable.addRows([
					<?php echo $datos_js; ?>
				]);

				var options = {
					height: 314,
					legend: 'none',
					areaOpacity: 0.18,
					axisTitlesPosition: 'out',
					hAxis: {
						title: '',
						textStyle: {
							color: '#fff',
							fontName: 'Proxima Nova',
							fontSize: 11,
							bold: true,
							italic: false
						},
						textPosition: 'out'
					},
					vAxis: {
						minValue: 0,
						textPosition: 'out',
						textStyle: {
							color: '#fff',
							fontName: 'Proxima Nova',
							fontSize: 11,
							bold: true,
							italic: false
						},
						baselineColor: '#16b4fc',
						ticks: [0, 25, 50, 75, 100, 125, 150, 175, 200, 225, 250, 275, 300, 325, 350],
						gridlines: {
							color: '#1ba0fc',
							count: 15
						},
					},
					lineWidth: 2,
					colors: ['#fff'],
					curveType: 'function',
					pointSize: 5,
					pointShapeType: 'circle',
					pointFillColor: '#f00',
					backgroundColor: {
						fill: '#008ffb',
						strokeWidth: 0,
					},
					chartArea: {
						left: 0,
						top: 0,
						width: '100%',
						height: '100%'
					},
					fontSize: 11,
					fontName: 'Proxima Nova',
					tooltip: {
						trigger: 'selection',
						isHtml: true
					}
				};

				var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
				chart.draw(dataTable, options);
			}
			$(window).resize(function() {
				drawChart();
				setTimeout(function() {}, 1000);
			});
		});
	</script>
</body>
</html>