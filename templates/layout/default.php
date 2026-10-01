<!doctype html>
<html lang="en">

<?php echo $this->element("common/head-section");?>

<body>
	<?php echo $this->element("common/header");?>
	<main class="margin-top">
		   <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
	</main>
	<?php echo $this->element("common/footer");?>
	<div id="mybutton">
		<div class="feedback">Feedback</div>
		</div>
</body>
<?php echo $this->element("common/script-section");?>	
</html>