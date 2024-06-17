<?php require('viewparts/head.php')?> 
<?php require('viewparts/header.php')?>

<main class="container-fluid py-3">
  <div class="row">
    <div class="col-12 px-lg-4">
      <div class="row mb-4">
        <article>
          <h1 class="text-center">Oldal bemutatás</h1>
          <p class="mb-0">
            Ez az oldal a hangszeres játéknak és a kottaolvasásnak a kevésbé ismert formájára alapszik, a színeskottára. <br>
            A színeskotta módszer eredetileg értelmi fogyatékos gyerekek számára készült. A módszer használata közben kiderült, hogy képességtől és kortól
            függetlenül mindenki könnyen elsajátíthatja a kottaolvasást ezzel a módszerrel. <br>
            Az oldal lehetőséget nyújt a színeskotta módszer megismerésére, elsajátítására, az erre épülő virtuális zongora biztosításával pedig
            segítené a sérült gyerekeknek és felnőtteknek a zongorajáték tanulását.
          </p>
        </article>
      </div>
      <div class="row">
        <article>
          <h2 class="text-center mb-3">Zongora működése</h2>
          <div class="showing_pics">
            <img class="img-fluid" src="imgs/text_pics/zongora_oldalrol.webp" alt="">
          </div>
          <ol >
            <li>
              <p>Az 1. számú gombnak a megnyomásával visszaléphet az előző dalra.</p>
            </li>
            <li>
              <p>A 2. számú gombnak a megnyomásával tovább léthet a következő dalra. </p>
            </li>
            <li>
                <p>Az 3. számnál látható az aktuális dal címe.</p>
            </li>
            <li>
              <p>
              Az 4. számú gombnak a megnyomásával meghallgathatja, hogy szól a dal eredetiben.
              </p>
            </li>
            <li>
              <p>A zongorának a billentyűin a színes körök jelölik a zenei hangsor hangjait(<a href="/kotta" class="text-dark">lásd a Színeskottáról oldalt</a>). 
              </p>
            </li>
          </ol>
        </article>
      </div>
    </div>
  </div>
</main>

<?php require('viewparts/footer.php')?>