<?php require('viewparts/head.php') ?>
<?php require('viewparts/header.php')?>

<div class="position-relative" style="min-height: 120vh;">
  <main class="container-fluid pt-md-3">
  <?php if(isset($_SESSION['loggedin']) && ($_SESSION['verified']) == true){ ?>
    <!-- Text if the user is on mobile -->
    <div class="text-center d-block d-lg-none px-2 middle">
      <h1>A virtuális zongora kis képernyőn nem érhető el. A jobb használhatóság érdekében kérjük nyissa meg ezt az oldalt a számítógépről vagy forgassa el a tablet készülékét!</h1>
    </div>
    <!-- Text if the user is on mobile end-->
    <h3 class="text-danger text-center errorMsg" id="errorText" >Hiba, további dal nem található!</h3>
    <!-- Virtual piano -->
    <div class="d-none d-lg-block">
      <div>

        <!-- piano ctrl panel part -->
        <div class="row justify-content-center align-items-center">
          <div class="col-2 text-end">
            <button class="btn btn-light piano_ctrl_btns" id="prevSongBtn"><i class="bi bi-skip-start-fill btn_icons"></i></button>
          </div>
          <div class="col-2 text-start">
            <button class="btn btn-light piano_ctrl_btns" id="nextSongBtn"><i class="bi bi-skip-end-fill btn_icons"></i></button>
          </div>
          <div class="col text-center">
            <p class="songtittle_place" id="songTitle"><?php echo $_SESSION["songTitle"]; ?></p>
          </div>
          <div class="col-2 text-end">
            <button class="btn btn-light piano_ctrl_btns" id="playSongBtn"><i class="bi bi-play-fill btn_icons"></i></button>
          </div>
          <div class="col-1 text-start">
            <button class="btn btn-light piano_ctrl_btns" id="pauseSongBtn"><i class="bi bi-pause-fill btn_icons"></i></button>
          </div>
        </div>
        <!-- piano ctrl panel part end-->

        <!-- piano sheet part-->
        <div class="row mt-4 mx-3 mb-1 piano_sheetBG">
          <div style="background-color: white;" class="position-relative">
            <img class="img-fluid" id="songSheetPic" src=" <?php echo $_SESSION["songSheetPath"]; ?> " alt=""> 
          </div>
        </div>
        <!-- piano sheet part end-->
        <!-- piano keys -->
        <div class="mb-3 piano_keyBG d-flex justify-content-center">
          <button class="key white" data-note="C"><img class="noteIMGW img-fluid" src="imgs/notes/c.webp" alt=""></button>
          <button class="key black" data-note="CISZ"><img class="noteIMGB img-fluid" src="imgs/notes/cisz.webp" alt=""></button>
          <button class="key white" data-note="D"><img class="noteIMGW img-fluid" src="imgs/notes/d.webp" alt=""></button>
          <button class="key black" data-note="DISZ"><img class="noteIMGB img-fluid" src="imgs/notes/disz.webp" alt=""></button>
          <button class="key white" data-note="E"><img class="noteIMGW img-fluid" src="imgs/notes/e.webp" alt=""></button>
          <button class="key white" data-note="F"><img class="noteIMGW img-fluid" src="imgs/notes/f.webp" alt=""></button>
          <button class="key black" data-note="FISZ"><img class="noteIMGB img-fluid" src="imgs/notes/fisz.webp" alt=""></button>
          <button class="key white" data-note="G"><img class="noteIMGW img-fluid" src="imgs/notes/g.webp" alt=""></button>
          <button class="key black" data-note="GISZ"><img class="noteIMGB img-fluid" src="imgs/notes/gisz.webp" alt=""></button>
          <button class="key white" data-note="A"><img class="noteIMGW img-fluid" src="imgs/notes/a.webp" alt=""></button>
          <button class="key black" data-note="AISZ"><img class="noteIMGB img-fluid" src="imgs/notes/aisz.webp" alt=""></button>
          <button class="key white" data-note="H"><img class="noteIMGW img-fluid" src="imgs/notes/h.webp" alt=""></button>
          <button class="key white" data-note="C1"><img class="noteIMGW img-fluid" src="imgs/notes/c_1.webp" alt=""></button>
          <button class="key black" data-note="CISZ1"><img class="noteIMGB img-fluid" src="imgs/notes/cisz_1.webp" alt=""></button>
          <button class="key white" data-note="D1"><img class="noteIMGW img-fluid" src="imgs/notes/d_1.webp" alt=""></button>
          <button class="key black" data-note="DISZ1"><img class="noteIMGB img-fluid" src="imgs/notes/disz_1.webp" alt=""></button>
          <button class="key white" data-note="E1"><img class="noteIMGW img-fluid" src="imgs/notes/e_1.webp" alt=""></button>
          <button class="key white" data-note="F1"><img class="noteIMGW img-fluid" src="imgs/notes/f_1.webp" alt=""></button>
          <button class="key black" data-note="FISZ1"><img class="noteIMGB img-fluid" src="imgs/notes/fisz_1.webp" alt=""></button>
          <button class="key white" data-note="G1"><img class="noteIMGW img-fluid" src="imgs/notes/g_1.webp" alt=""></button>
          <button class="key black" data-note="GISZ1"><img class="noteIMGB img-fluid" src="imgs/notes/gisz_1.webp" alt=""></button>
          <button class="key white" data-note="A1"><img class="noteIMGW img-fluid" src="imgs/notes/a_1.webp" alt=""></button>
          <button class="key black" data-note="AISZ1"><img class="noteIMGB img-fluid" src="imgs/notes/aisz_1.webp" alt=""></button>
          <button class="key white" data-note="H1"><img class="noteIMGW img-fluid" src="imgs/notes/h_1.webp" alt=""></button>
          <button class="key white" data-note="C2"><img class="noteIMGW img-fluid" src="imgs/notes/c_2.webp" alt=""></button>
          <button class="key black" data-note="CISZ2"><img class="noteIMGB img-fluid" src="imgs/notes/cisz_2.webp" alt=""></button>
          <button class="key white" data-note="D2"><img class="noteIMGW img-fluid" src="imgs/notes/d_2.webp" alt=""></button>
          <button class="key black" data-note="DISZ2"><img class="noteIMGB img-fluid" src="imgs/notes/disz_2.webp" alt=""></button>
          <button class="key white" data-note="E2"><img class="noteIMGW img-fluid" src="imgs/notes/e_2.webp" alt=""></button>
          <button class="key white" data-note="F2"><img class="noteIMGW img-fluid" src="imgs/notes/f_2.webp" alt=""></button>
          <button class="key black" data-note="FISZ2"><img class="noteIMGB img-fluid" src="imgs/notes/fisz_2.webp" alt=""></button>
          <button class="key white" data-note="G2"><img class="noteIMGW img-fluid" src="imgs/notes/g_2.webp" alt=""></button>
          <button class="key black" data-note="GISZ2"><img class="noteIMGB img-fluid" src="imgs/notes/gisz_2.webp" alt=""></button>
          <button class="key white" data-note="A2"><img class="noteIMGW img-fluid" src="imgs/notes/a_2.webp" alt=""></button>
          <button class="key black" data-note="AISZ2"><img class="noteIMGB img-fluid" src="imgs/notes/aisz_2.webp" alt=""></button>
          <button class="key white" data-note="H2"><img class="noteIMGW img-fluid" src="imgs/notes/h_2.webp" alt=""></button>
        </div>
        <!-- piano keys end-->
      </div>
    </div>
    <!-- Virtual piano end-->
    <audio id="C" src="audio_files/notes/C.mp3"></audio>
    <audio id="CISZ" src="audio_files/notes/Cisz.mp3"></audio>
    <audio id="D" src="audio_files/notes/D.mp3"></audio>
    <audio id="DISZ" src="audio_files/notes/Disz.mp3"></audio>
    <audio id="E" src="audio_files/notes/E.mp3"></audio>
    <audio id="F" src="audio_files/notes/F.mp3"></audio>
    <audio id="FISZ" src="audio_files/notes/Fisz.mp3"></audio>
    <audio id="G" src="audio_files/notes/G.mp3"></audio>
    <audio id="GISZ" src="audio_files/notes/Gisz.mp3"></audio>
    <audio id="A" src="audio_files/notes/A.mp3"></audio>
    <audio id="AISZ" src="audio_files/notes/Aisz.mp3"></audio>
    <audio id="H" src="audio_files/notes/H.mp3"></audio>
    <audio id="C1" src="audio_files/notes/C1.mp3"></audio>
    <audio id="CISZ1" src="audio_files/notes/Cisz1.mp3"></audio>
    <audio id="D1" src="audio_files/notes/D1.mp3"></audio>
    <audio id="DISZ1" src="audio_files/notes/Disz1.mp3"></audio>
    <audio id="E1" src="audio_files/notes/E1.mp3"></audio>
    <audio id="F1" src="audio_files/notes/F1.mp3"></audio>
    <audio id="FISZ1" src="audio_files/notes/Fisz1.mp3"></audio>
    <audio id="G1" src="audio_files/notes/G1.mp3"></audio>
    <audio id="GISZ1" src="audio_files/notes/Gisz1.mp3"></audio>
    <audio id="A1" src="audio_files/notes/A1.mp3"></audio>
    <audio id="AISZ1" src="audio_files/notes/Aisz1.mp3"></audio>
    <audio id="H1" src="audio_files/notes/H1.mp3"></audio>
    <audio id="C2" src="audio_files/notes/C2.mp3"></audio>
    <audio id="CISZ2" src="audio_files/notes/Cisz2.mp3"></audio>
    <audio id="D2" src="audio_files/notes/D2.mp3"></audio>
    <audio id="DISZ2" src="audio_files/notes/Disz2.mp3"></audio>
    <audio id="E2" src="audio_files/notes/E2.mp3"></audio>
    <audio id="F2" src="/audio_files/notes/F2.mp3"></audio>
    <audio id="FISZ2" src="audio_files/notes/Fisz2.mp3"></audio>
    <audio id="G2" src="audio_files/notes/G2.mp3"></audio>
    <audio id="GISZ2" src="audio_files/notes/Gisz2.mp3"></audio>
    <audio id="A2" src="audio_files/notes/A2.mp3"></audio>
    <audio id="AISZ2" src="audio_files/notes/Aisz2.mp3"></audio>
    <audio id="H2" src="audio_files/notes/H2.mp3"></audio>
    <audio id="song" src=" <?php echo $_SESSION["songFilePath"]; ?> "></audio>
    <input type="hidden" id="currSongId" value="<?php echo $_SESSION["songId"]; ?>">

      <?php } else if(isset($_SESSION['loggedin']) && $_SESSION['verified'] == false) {?>
      <div class=" d-block text-center">
      <div class="row my-3">
        <h3>Ehhez a tartalomhoz meg kell erősítenie a fiókját, az emailben kapott linken keresztül!</h3>
        </div>
      <div class="row">
        <div class="col">
         <?php if(isset($_SESSION['success'])){ ?>
         <p class="text-success fs-3 fw-bold">Az email újra elküldésre került!</p>
         <?php } ?>
          <?php if(isset($_SESSION['success']) == false){?>
          <form id="sendVmailForm" action="/zongora" method="POST">
            <button type="submit" id="submit" class="btn btn-light p_page_btns">Email újraküldés</button>
            <div class="d-flex justify-content-center">
              <div class="spinner-border d-none" id="spinner" role="status">
              </div>
            </div>
          </form>
          <?php }?>
        </div>
      </div>
    </div>
      <?php } else{ ?>
    <div class=" d-block text-center">
      <div class="row my-3">
        <h3>Ehhez a tartalomhoz előbb regisztráljon vagy jelentkezzen be!</h3>
        </div>
    </div>
    <?php } ?>
  </main>
    
  <?php require('viewparts/footer.php') ?>
</div>

