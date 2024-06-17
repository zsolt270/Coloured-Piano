<?php require('viewparts/head.php') ?>
<?php require('viewparts/header.php')?>

<div class="position-relative" style="min-height: 100vh;">
  <main class="container-fluid pt-md-3">

  <?php if($errorCode == 400){ ?>
    <div class="text-center px-2 pt-3">
      <h1>Hibás URL cím!</h1>
    </div>
  <?php  }

      else if($errorCode == 403){ ?>
    <div class="text-center px-2 pt-3">
      <h1>Kérés megtagadva, nem rendelkezik a megfelelő jogosultsággal!</h1>
    </div>
  <?php  }

  else if($errorCode == 404){ ?>  
    <div class="text-center px-2 pt-3">
      <h1>Ez az oldal nem található.</h1>
    </div>
  <?php  }

  else{?>
  <div class="text-center px-2 pt-3">
      <h1>Hiba történt!</h1>
    </div>
  <?php }?>
  </main>
</div>

<?php require('viewparts/footer.php') ?>