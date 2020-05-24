<?php 
if(isset($_GET['page'])) {
	require 'app/page/vst/'.base64_decode($_GET['page']).'.php';
}
?>