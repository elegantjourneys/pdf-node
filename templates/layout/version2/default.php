<!DOCTYPE html>
<html lang="en">
<?php echo $this->element("version2/head_section");?>
<body>  
    <?php //echo $this->element('version2/header'); ?>
    <main class="w-100">
        
        <?php //echo $this->element('version2/enquiry_modal'); ?>
        
        <?= $this->fetch('content') ?>     
        <?php //echo $this->element('version2/our_partner'); ?>
        <?php //echo $this->element('version2/footer'); ?>
    </main>
    

    <?php echo $this->element('version2/script_section'); ?>
</body>
</html>