<?php

require_once('client/partials/header.php');
?>


<section class="home">
    <!-- logo strategy -->
    <div class="logo">
        <img src="client/public/logo-strategy.png" alt="">
    </div>



    <div class="flex">

        <!-- taxtarea in cui inserire la lista dei nomi -->
        <div class="inputs ">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="data"><span class="label">Inserisci dati</span></label>
                    <textarea type="text" class="form-control" id="data" rows="12"></textarea>
                </div>
            </form>
        </div>

        <!-- bottoni per effettuare le varie azioni -->
        <div class="inputs flex-outp">
            <div class="quantity center-items">
                <div class="input-group">
                    <div class="input-group-prepend">
                    <div class="input-group-text">%</div>
                    </div>
                    <input style="text-align: center;" type="text" class="form-control" placeholder="25" readonly >
                </div>
            </div>
            <button class="btn btn-primary center-items" id="show">

                <div>
                    <span>
                        <i class="fas fa-share-square"></i>
                    </span>

                    <span>
                        Estrai
                    </span>
                </div>

            </button>
            <button class="btn btn-success center-items" id="download" disabled>

                <div>
                    <span>
                        <i class="fas fa-file-excel"></i>
                    </span>

                    <span style="margin-left: 5px;">Scarica CSV </span>
                </div>

            </button>
        </div>

        <!-- risultato dell'operazione mostrato a schermo -->
        <div class="result">
            <span class="topText">Dati estratti</span>
            <div class="inputs data" style="border: 1px solid lightgray;">

                <ul class="list-group" id="list">
                </ul>
            </div>
        </div>
    </div>
</section>

<?php
require_once('client/partials/footer.php');
?>


<?php
require_once('client/partials/script.php');
?>
