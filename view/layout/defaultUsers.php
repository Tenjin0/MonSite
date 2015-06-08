<?php include("partials/header.php");?>
<div id="main" class="container">

    <?= isset($this->session)?$this->session->flash():'' ?>
	<?= $content_for_layout;?>

</div>


<?php include("partials/footer.php");?>