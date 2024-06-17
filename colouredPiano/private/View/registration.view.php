<?php require('viewparts/head.php')?> 
<?php require('viewparts/header.php')?>

<div class="position-relative" style="min-height: 100vh;">
  <main class="container pt-md-3">

    <div class="pt-4 reset-container">
        <h3 class="text-center fw-bold">Regisztráció</h3>
        <?php if(isset($_SESSION['success'])){?>
                      <h5 class="text-success text-center">Egy megerősítő link lett elküldve a megadott email címre.</h5>
              <?php } ?>
        <form id="regForm" action="/regisztracio" method="POST" class="mb-3">
            <div class="mb-4">
              <label for="username" class="form-label">Felhasználónév:</label>
              <div class="d-flex align-content-center">
                <input type="text" name="username" id="username" class="form-control <?php echo isset($_SESSION['unameError']) ? "failed" : "" ?>" placeholder="Adja meg a felhasználó nevét">
              </div>
              <?php if(isset($_SESSION['unameError'])){?>
              <p class="text-danger mt-2"> <?php echo $_SESSION['unameError'];?> </p>
              <?php }?>
            </div>
            <div class="mb-4">
              <label for="email" class="form-label">Email cím:</label>
              <div class="d-flex align-content-center">
                <input type="text" name="email" id="email" class="form-control <?php echo isset($_SESSION['emailError']) ? "failed" : "" ?>" placeholder="Adja meg az email címét">
              </div>
              <?php if(isset($_SESSION['emailError'])){?>
              <p class="text-danger mt-2"> <?php echo $_SESSION['emailError'];?> </p>
              <?php }?>
            </div>
            <div class="mb-4">
              <label for="pwd" class="form-label">Jelszó:</label>
              <div class="d-flex align-content-center">
                <input type="password" name="pwd" id="pwd" class="form-control <?php echo isset($_SESSION['pwdError']) ? "failed" : "" ?>" placeholder="Adja meg a jelszót">
                <i class="bi bi-info-circle-fill pt-2 ps-2 fs-5" data-bs-toggle="tooltip" data-bs-placement="right" title="Legalább 8 karakter, tartalmazzon számot, legalább egy nagy betűt és speciális karaktert."></i>
              </div>
              <?php if(isset($_SESSION['pwdError'])){?>
              <p class="text-danger mt-2"> <?php echo $_SESSION['pwdError'];?> </p>
              <?php }?>
            </div>
            <div class="mb-4">
              <label for="pwdrepeat" class="form-label">Jelszó ismét:</label>
              <div class="d-flex align-content-center">
                <input type="password" name="pwdrepeat" id="pwdrepeat" class="form-control <?php echo isset($_SESSION['pwdErrorMatch']) ? "failed" : "" ?>" placeholder="Ismételje meg a jelszót">
                <i class="bi bi-info-circle-fill pt-2 ps-2 fs-5" data-bs-toggle="tooltip" data-bs-placement="right" title="Legalább 8 karakter, tartalmazzon számot, legalább egy nagy betűt és speciális karaktert."></i>
              </div>
              <?php if(isset($_SESSION['pwdErrorMatch'])){?>
              <p class="text-danger mt-2"> <?php echo $_SESSION['pwdErrorMatch'];?> </p>
              <?php }?>
              <input type="hidden" id="csrfToken" name="csrfToken" value="<?php echo $_SESSION['CSRF_Token']; ?>">
            </div>
            <div class="text-center">
                <button type="submit" id="submit" name="submit" class="btn btn-light modal-btn">Regisztráció</button>
              </div>
            <div class="d-flex justify-content-center">
              <div class="spinner-border d-none" id="spinner" role="status">
              </div>
            </div>
          </form>
    </div>

  </main>
</div>

<?php require('viewparts/footer.php')?>