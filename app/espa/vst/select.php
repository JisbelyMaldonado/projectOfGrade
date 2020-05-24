<?php require '../../../cfg/base.php'; ?>

<option value=""></option>
<?php foreach($mmuni->lista($esta) as $r): ?>
	<option value="<?php echo $r->muni_ide ?>"><?php echo $r->muni_descrip ?></option>
<?php endforeach; ?>