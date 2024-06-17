<?php require('viewparts/head.php') ?>
<?php require('viewparts/header.php')?>


<div class="position-relative" style="min-height: 100vh;">
  <main class="container pt-md-3">

  <div class="pt-4 reset-container">
        <?php if(isset($_SESSION['success'])){?>
          <h4 class="text-success fw-bold text-center">Sikeresen megváltoztatta a jelszavát, jelentkezzen be!</h4>
        <?php }?>
        <?php if(isset($_SESSION['failed'])){?>
          <h3 class="text-danger fw-bold text-center"> Hiba történt,  kérjen új cserét!</h3>
        <?php }?>
        <?php if(isset($_SESSION['success']) == false && isset($_SESSION['failed']) == false){?>
          <h3 class="text-center fw-bold">Jelszó csere</h3>
        <?php if(isset($_SESSION['invalidReset'])){?>
                      <h6 class="text-danger fw-bold text-center">Ez a kérvény már lejárt vagy nem érvényes, kérjen újat!</h6>
              <?php } ?>
        <form action="/jelszovaltas" method="POST">
        <div class="mb-4">
              <label for="pwd" class="form-label">Jelszó:</label>
              <div class="d-flex align-content-center">
                <input type="password" name="pwdreset" id="pwd" class="form-control <?php echo isset($_SESSION['pwdError']) ? "failed" : "" ?>" placeholder="Adja meg a jelszót">
                <i class="bi bi-info-circle-fill pt-2 ps-2 fs-5" data-bs-toggle="tooltip" data-bs-placement="right" title="Legalább 8 karakter, tartalmazzon számot, legalább egy nagy betűt és speciális karaktert."></i>
              </div>
              <?php if(isset($_SESSION['pwdError'])){?>
              <p class="text-danger mt-2"> <?php echo $_SESSION['pwdError'];?> </p>
              <?php }?>
            </div>
            <div class="mb-4">
              <label for="password" class="form-label">Új Jelszó még egyszer:</label>
              <div class="d-flex align-content-center">
                <input type="password" id="pwdreset_two" name="pwdreset_two" class="form-control <?php echo isset($_SESSION['pwdErrorMatch']) ? "failed" : "" ?>" placeholder="Adja meg az új jelszót még egyszer">
                <i class="bi bi-info-circle-fill pt-2 ps-2 fs-5" data-bs-toggle="tooltip" data-bs-placement="right" title="Legalább 8 karakter, tartalmazzon számot, legalább egy nagy betűt és speciális karaktert."></i>
              </div>
              <?php if(isset($_SESSION['pwdErrorMatch'])){?>
              <p class="text-danger mt-2"> <?php echo $_SESSION['pwdErrorMatch'];?> </p>
              <?php }?>
            </div>
            <div class="text-center">
                <input type="hidden" name="identifier" value="<?php echo htmlspecialchars($identifier); ?>">
                <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
                <input type="hidden" name="csrfToken" value="<?php echo $_SESSION['CSRF_Token']; ?>">
                <?php if(!isset($_SESSION['invalidReset'])){?>
                <button type="submit" name="submit" class="btn btn-light modal-btn">Megerősítés</button>
                <?php } ?>
            </div>
          </form>
        <?php }?>
    </div>

  </main>
</div>

<?php require('viewparts/footer.php') ?>