<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php require '../../../cfg/base.php'; ?>
<link rel="stylesheet" href="css/print.css">
<script src="js/jquery.js"></script>
<script src="js/highcharts.js"></script>
<script src="js/exporting.js"></script>
<title>Parques más Buscados</title>
<center><img src="img/logo.png" class="logoini" alt=""></center><br><br>
<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto; margin-top:-20%;"></div>
<table id="datatable" class="tabla8" style="width:50%;margin:auto; margin-top:30px;">
	<caption>Parques más Buscados</caption>
	<thead>
		<tr>
			<th>Parque</th>
			<th>Total</th>
			<th>Relación Porcentual</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($mparq->lista() as $r): ?>
			<tr>
				<td><?php echo $r->parq_nombre ?></td>
				<td><?php echo $mparq->totalbusquedasN($r->parq_ide) ?></td>
				<td><?php echo $mparq->totalbusquedasP($r->parq_ide) ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<script>
	$(function () {

	    $(document).ready(function () {

	        // Build the chart
	        $('#container').highcharts({
	            chart: {
	                plotBackgroundColor: null,
	                plotBorderWidth: null,
	                plotShadow: false,
	                type: 'pie'
	            },
	            title: {
	                text: 'Parques más Buscados',
	            },
	            tooltip: {
	                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
	            },
	            plotOptions: {
	                pie: {
	                    allowPointSelect: true,
	                    cursor: 'pointer',
	                    dataLabels: {
	                        enabled: false
	                    },
	                    showInLegend: true
	                }
	            },
	            series: [{
	                name: "Porcentaje",
	                colorByPoint: true,
	                data: [
	                		<?php foreach($mparq->lista() as $r): ?>
			                {
			                    name: "<?php echo $r->parq_nombre ?>",
			                    y:<?php echo $mparq->totalbusquedasP($r->parq_ide) ?>,
			                }, 
			           <?php endforeach ?>
	                ]
	            }]
	        });
	    });
	});
</script>