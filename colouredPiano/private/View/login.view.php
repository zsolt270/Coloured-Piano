<?php require('viewparts/head.php') ?>
<?php require('viewparts/header.php')?>

<div class="position-relative" style="min-height: 100vh;">
  <main class="container pt-md-3">

    <div class="pt-4 reset-container">
        <h3 class="text-center fw-bold">Bejelentkezés</h3>
        <?php if(isset($_SESSION['deletedAccount'])){?>
                      <h6 class="text-danger text-center">  <?php echo $_SESSION['deletedAccount']; ?></h6>
              <?php } ?>
        <form action="/bejelentkezes" method="POST">
            <div class="mb-3">
              <label for="username" class="form-label">Felhasználónév:</label>
              <input type="text" name="username" id="username" class="form-control <?php echo isset($_SESSION['loginUnameError']) ? "failed" : "" ?>" placeholder="Adja meg a felhasználó nevét">
            </div>
            <?php if(isset($_SESSION['loginUnameError'])){?>
              <p class="text-danger mt-1"> <?php echo $_SESSION['loginUnameError'];?> </p>
              <?php }?>
            <div class="mb-4">
              <label for="pwd" class="form-label">Jelszó:</label>
              <input type="password" name="pwd" id="pwd" class="form-control <?php echo isset($_SESSION['loginPwdError']) ? "failed" : "" ?>" placeholder="Adja meg a jelszavát">
            </div>
            <?php if(isset($_SESSION['loginPwdError'])){?>
              <p class="text-danger mt-1"> <?php echo $_SESSION['loginPwdError'];?> </p>
              <?php }?>
            <a href="/jelszokeres" class="btn ps-0 mb-2">Ha elfelejtette a jelszavát kattintson ide!</a>
            <div class="text-center">
              <input type="hidden" name="csrfToken" value="<?php echo $_SESSION['CSRF_Token'] ?>">
              <button type="submit" name="submit" class="btn btn-light modal-btn">Bejelentkezés</button>
            </div>
          </form>
    </div>

  </main>
</div>

<?php require('viewparts/footer.php') ?>