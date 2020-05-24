<link rel="stylesheet" href="css/imprimir.css">
<script src="http://maps.google.com/maps/api/js?sensor=false&libraries=geometry&v=3.7"></script>
<!--<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>-->
<script src="js/maplace-0.1.3.js"></script>

<div class="btn-group">
    <button class="btn btn-inverse" onclick="modal('vst-page-buscarparque','')">Buscar un Parque</button>
    <button class="btn btn-inverse" onclick="modal('vst-page-buscarparque.ruta','')">Calcular Distancia y Ruta</button>
</div>
<div class="clearfix"></div>
<div class="space-10"></div>
<div class="mapa"></div>
<script>
    load('vst-page-mapadefecto','','.mapa')
</script>