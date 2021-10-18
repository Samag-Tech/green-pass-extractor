<?php

require_once('partials/header.php');
?>


<section class="home">
    <!-- logo strategy -->
    <div class="logo">
        <img src="public/logo-strategy.png" alt="">
    </div>



    <div class="flex">

        <!-- taxtarea in cui inserire la lista dei nomi -->
        <div class="inputs ">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="data"><h2 class="label">Inserisci dati</h2></label>
                    <textarea type="text" class="form-control" id="data" rows="12"></textarea>
                </div>
            </form>
        </div>

        <!-- bottoni per effettuare le varie azioni -->
        <div class="inputs flex-outp">
            <div class="quantity center-items">
                <div class="input-group mb-2 mr-sm-2">
                    <div class="input-group-prepend">
                    <div class="input-group-text">%</div>
                    </div>
                    <div class="form-control text-center"><strong>25</strong></div>
                </div>
            </div>
            <button class="btn btn-primary center-items" id="show">Estrai</button>
            <button class="btn btn-success center-items" id="download" disabled>Scarica csv</button>
        </div>

        <!-- risultato dell'operazione mostrato a schermo -->
        <div>
            <h2>Dati estratti</h2>
            <div class="inputs data" style="border: 1px solid lightgray;">

                <ul class="list-group" id="list">
                </ul>
            </div>
        </div>
    </div>
</section>



<?php
require_once('partials/script.php');
?>
