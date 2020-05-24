
<?php require '../../../cfg/base.php'; ?>
<div id="gmap" style="width:100%; height: 520px;"></div>
<div id="route"></div>
<script type="text/javascript">
    $(function() {
        var LocsD = [
            {
                lat: 6.442954, 
                lon: -65.798462,
                zoom: 6,
                title: 'Venezuela',
                html: ''
            },
            <?php foreach($mparq->lista() as $r): ?>
                    {
                         lat: <?php echo $r->parq_latitud ?>,
                         lon: <?php echo $r->parq_longitu ?>,
                         title: '<?php echo $r->parq_nombre ?>',
                        zoom: 6,
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
            //generate_controls: false,
           show_markers: true,
            //type: 'directions',
            //draggable: true,
           // directions_panel: '#route',
           // afterRoute: function(distance) {
                //$('#km').text(': '+(distance/1000)+'km');
           // }
        }).Load(); 
    });
</script>