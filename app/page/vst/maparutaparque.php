<?php require '../../../cfg/base.php'; ?>
<?php $row = $mparq->poride($_POST['parque']) ?>
<?php $atr = $matra->lista($_POST['parque']) ?>
<?php $act = $macpa->lista($_POST['parque']) ?>
<link rel="stylesheet" href="../../../css/imprimir.css">
<div class="tabbable">
    <ul class="nav nav-tabs" id="myTab">
        <li class="active">
            <a data-toggle="tab" href="#ficha">
                <i class="fa fa-home"></i>
                Ficha Técnica
            </a>
        </li>
        <li class="">
            <a data-toggle="tab" href="#atra">
                <i class="fa fa-list"></i>
               Atracciones
            </a>
        </li>
        <li class="dropdown">
            <a data-toggle="tab"  href="#acti">
                <i class="fa fa-list"></i>
                Actividades &nbsp;
            </a>
        </li>
        <li class="dropdown">
            <a data-toggle="tab"  href="#acti">
                <i class="fa fa-list"></i>
                Estados / Municipios &nbsp;
            </a>
        </li>
        <li class="dropdown">
            <a data-toggle="tab"  href="" onclick="print();return false">
                <i class="fa fa-list"></i>
                Imprimir
            </a>
        </li>
    </ul>

    <div class="tab-content">
        <div id="ficha" class="tab-pane active">
            <p>
                <div class="table-responsive">
                    <div class="table-header">
                        Ficha Técnica
                    </div>
                    <table class="table table-bordered">
                        <tbody>
                           <tr class="active">
                                <th>Nombre:</th>
                                <th>Ubicación</th>
                                <th>Latitud</th>
                                <th>Longitud</th>
                           </tr>
                           <tr>
                               <td><?php echo $row[0]->parq_nombre ?></td>
                               <td><?php echo $row[0]->parq_ubicaci ?></td>
                               <td><?php echo $row[0]->parq_latitud ?></td>
                               <td><?php echo $row[0]->parq_longitu ?></td>
                           </tr>
                            <tr class="active">
                               <th>Límite Norte</th>
                               <th>Límite Sur</th>
                               <th>Límite Este</th>
                               <th>Límite Oeste</th>
                           </tr>
                           <tr>
                               <td><?php echo $row[0]->parq_norte ?></td>
                               <td><?php echo $row[0]->parq_sur ?></td>
                               <td><?php echo $row[0]->parq_este ?></td>
                               <td><?php echo $row[0]->parq_oeste ?></td>
                           </tr>
                             <tr class="active">
                               <th>MSNM</th>
                               <th>Clima</th>
                               <th>Detalles</th>
                               <th>Característica General</th>
                           </tr>
                           <tr>
                               <td><?php echo $row[0]->parq_msnm ?></td>
                               <td><?php echo $row[0]->parq_clima ?></td>
                               <td><?php echo $row[0]->parq_detalle ?></td>
                               <td><?php echo $row[0]->parq_caracte ?></td>
                           </tr>
                        </tbody>
                    </table>
                </div>
            </p>
        </div>

        <div id="atra" class="tab-pane">
            <p>
                <?php if(count($atr)>0): ?>
                   <table class="table table-striped">
                       <?php foreach($atr as $r): ?>
                            <tr>
                                <td>
                                    <i class="fa fa-check"></i> 
                                    <?php echo $r->atra_descrip ?>
                                </td>
                            </tr>
                       <?php endforeach; ?>
                   </table>
                <?php else: ?>
                    <span class="alert alert-info">No hay atracciones registradas</span>
                <?php endif; ?>
            </p>
        </div>

        <div id="acti" class="tab-pane">
            <p>
                <?php if(count($act)>0): ?>
                   <table class="table table-striped">
                       <?php foreach($act as $r): ?>
                            <tr>
                                <td>
                                    <i class="fa fa-check"></i> 
                                    <?php echo $r->acti_descrip ?>
                                </td>
                            </tr>
                       <?php endforeach; ?>
                   </table>
                <?php else: ?>
                    <span class="alert alert-info">No hay actividades registradas</span>
                <?php endif; ?>
            </p>
        </div>

    </div>
</div>
<div class="clearfix"></div>
<div class="space-10"></div>

<div id="gmap" style="width:100%; height: 400px;"></div>
<div id="route"></div>
<script type="text/javascript">
    $(function() {
        var LocsD = [
    {
        lat: <?php echo $row[0]->parq_latitud ?>,
        lon: <?php echo $row[0]->parq_longitu ?>,
        title: '<?php echo $row[0]->parq_nombre ?>',
        html: '<h2><?php echo $row[0]->parq_nombre ?></h2>',
        stopover: true,
        visible: true,
    },
    <?php foreach($matra->lista($row[0]->parq_ide) as $r): ?>
      {
        lat: <?php echo $r->atra_latitud ?>,
        lon: <?php echo $r->atra_longitu ?>,
        title: '<?php echo $r->atra_descrip ?>',
        html: '<h2><?php echo $r->atra_descrip ?></h2>',
        stopover: true,
        visible: true,
      },
    <?php endforeach; ?>
];
        /*new Maplace({
            locations: locationsList,
            controls_on_map: true
        }).Load();*/
        new Maplace({
            locations: LocsD,
            map_div: '#gmap',
            //generate_controls: true,
            show_markers: true,
            type: 'directions',
            //draggable: true,
            controls_type: 'list',
            controls_on_map: true,
            directions_panel: '#route',
            afterRoute: function(distance) {
                $('#km').text(': '+(distance/1000)+'km');
            }
        }).Load(); 
    });
</script>