<?php require('viewparts/head.php') ?>
<?php require('viewparts/header.php')?>


<div class="position-relative" style="min-height: 100vh;">
  <main class="container pt-md-3">

    <div class="pt-4 reset-container">
        <h3 class="text-center fw-bold mb-4">Adja meg az email címet!</h3>
        <?php if( $hibasEmail){?>
                      <h6 class="text-danger fs-5 fw-bold text-center" id="givenMailError">Nem megfelelő email!</h6>
              <?php }
                   else if($successEmail){?>
                      <h6 class="text-success fs-5 fw-bold text-center">Email elküldésre került!</h6>
              <?php } ?>
        <form id="getNewPwd" action="/jelszokeres" method = "POST">
            <div class="mb-3">
              <label for="username" class="form-label">Email cím</label>
              <input type="text" name="resetEmail" id="username" class="form-control" placeholder="Ide az email címet">
            </div>
            <div class="text-center">
              <input type="hidden" name="csrfToken" value="<?php echo $_SESSION['CSRF_Token'] ?>">
              <?php if( $successEmail == false){?>
                <button type="submit" id="submit" class="btn btn-light modal-btn">Igénylés</button>
                <?php } ?>
            </div>
            <div class="d-flex justify-content-center">
              <div class="spinner-border d-none" id="spinner" role="status">
              </div>
            </div>
          </form>
    </div>

  </main>
</div>

<?php require('viewparts/footer.php') ?>