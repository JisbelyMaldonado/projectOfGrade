<?php 
require '../../../cfg/base.php';
$fotos = $macti->poride($ide);
?>
<script>
	function borrarFotoRayoX(ide) {
		if(confirm('¿Realmente desea eliminar la foto seleccionada?')==true) {
			$.post('prc-macti-deleteIcono',ide,function(data){
				load('vst-acti-foto','ide=<?php echo $ide; ?>','#gallery')
			})
		}
	}
	$(function($) {
		var colorbox_params = {
			reposition:true,
			scalePhotos:true,
			scrolling:false,
			previous:'<i class="icon-arrow-left"></i>',
			next:'<i class="icon-arrow-right"></i>',
			close:'&times;',
			current:'{current} de {total}',
			maxWidth:'100%',
			maxHeight:'100%',
			onOpen:function(){
				document.body.style.overflow = 'hidden';
			},
			onClosed:function(){
				document.body.style.overflow = 'auto';
			},
			onComplete:function(){
				$.colorbox.resize();
			}
		};

		$('.ace-thumbnails [data-rel="colorbox"]').colorbox(colorbox_params);
		$("#cboxLoadingGraphic").append("<i class='icon-spinner orange'></i>");//let's add a custom loading icon

		/**$(window).on('resize.colorbox', function() {
			try {
				//this function has been changed in recent versions of colorbox, so it won't work
				$.fn.colorbox.load();//to redraw the current frame
			} catch(e){}
		});*/
	})
</script>

<ul class="ace-thumbnails">
	<?php if(count($fotos)>0) { ?>
		<?php foreach($fotos as $f) { ?>
			<?php if($f->acti_icono!="") { ?>
				<li>
					<a href="img/acti/<?php echo $f->acti_icono ?>" data-rel="colorbox">
						<img alt="150x150" src="img/acti/<?php echo $f->acti_icono ?>" style="width:100%"/>
					</a>
					<div class="tools tools-bottom">
	<!--					
						<a href="#">
							<i class="icon-pencil"></i>
						</a>
	-->
						<a href="#" onclick="borrarFotoRayoX('ide=<?php echo $f->acti_icono ?>'); return false;">
							<i class="fa fa-times fa-2x"></i>
						</a>
					</div>
				</li>
			<?php } ?>
		<?php } ?>
	<?php } ?>
</ul>