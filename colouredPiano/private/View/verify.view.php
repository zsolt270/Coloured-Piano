<?php require('viewparts/head.php') ?>
<?php require('viewparts/header.php')?>


<div class="position-relative" style="min-height: 100vh;">
  <main class="container-fluid pt-md-3">
    <div class="text-center px-2 pt-3">
    <?php if($valid){?>
      <h1>Sikeres fiók megerősítés, <br>jelentkezzen be!</h1>
      <?php }
    else{?>
      <h1>Ez a fiók érvénytelen vagy már meg van erősítve!</h1>
        <?php } ?>
    </div>
  </main>
</div>

<?php require('viewparts/footer.php') ?>