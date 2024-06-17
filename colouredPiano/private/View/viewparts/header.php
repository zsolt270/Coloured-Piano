<header <?php echo isUrlName('/zongora') ? 'style="position: relative"' : '' ?>   id="top">
    <nav class="navbar navbar-expand-lg pt-3">
      <div class="container-fluid">
          <!-- left side -->
        <div>
          <a class="navbar-brand" href="/"><img src="imgs/violin.webp" alt="violin kulcsról egy kerek kép"></a>        
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbartoggler">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbartoggler">
           <div class="row d-flex m-0 w-100 mt-2 mt-lg-0">
            <div class=" col-12 col-md-3 col-lg-6">
              <ul class="navbar-nav d-flex flex-column flex-md-row">
                <li class="nav-item btn btn-light <?php echo isUrlName('/') ? 'active': '' ?> ">
                  <a class="nav-link px-md-3" href="/">
                    Főoldal
                  </a>
                </li>
                <li class="nav-item btn btn-light my-1 my-md-0 mx-md-3 <?php echo isUrlName('/kotta') ? 'active': '' ?> ">
                  <a class="nav-link " href="/kotta">
                    Színeskottáról
                  </a>
                </li>
                <li class="nav-item btn btn-light <?php echo isUrlName('/zongora') ? 'active': '' ?>">
                  <a class="nav-link px-md-3" href="/zongora">
                    Zongora
                  </a>
                </li>
              </ul>
            </div>
            <!-- right side -->
            <div class=" col-12 col-md-9 col-lg-6 d-flex flex-sm-row align-items-center justify-content-end mt-1 mt-md-0 pe-0 pe-sm-2">
               
                <?php if(!isset($_SESSION['loggedin'])){ ?>
                <a href="/regisztracio" class="btn btn-light me-lg-3 nav_buttons" >Regisztráció</a>
                <a href="/bejelentkezes" class="btn btn-light me-lg-3 nav_buttons" >Bejelentkezés</a>
                <?php } else{?>
                <p class="fs-4 mb-0 me-3 text-dark"><?php echo htmlspecialchars($_SESSION['userName']) ?></p>
                <form action="/kijelentkezes" method="POST">
                  <input type="hidden" name="csrfToken" value="<?php echo $_SESSION['CSRF_Token'] ?>">
                  <button type="submit" name="submit" class="btn"><i class="bi bi-box-arrow-right fs-2 me-4 icons"></i></button>
                </form>
                <?php } ?>
            </div>
           </div>
          </div>
      </div>
    </nav>
  </header>