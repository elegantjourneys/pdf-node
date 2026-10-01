<!DOCTYPE html>
<html lang="en">
  
<?php echo $this->element('version1/head_section'); ?>
  <body>
    <header id="header" class="fixed-top w-100 wsregular">
         <?php echo $this->element('version1/header'); ?>
    </header>
    <main class="cbnormal margin-top">
      <?= $this->fetch('content') ?>
    </main>
    <footer id="footer" class="footer-bg cbnormal">
         <?php echo $this->element('version1/footer'); ?>
    </footer>
    
  </body>

 <?php echo $this->element('version1/script_section'); ?> 
</html>
