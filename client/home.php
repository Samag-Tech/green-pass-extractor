<?php
require_once('partials/header.php');
?>
<!-- logo strategy -->
<div class="logo">
    <img src="public/logo-strategy.png" alt="">
</div>



<div class="flex">

    <!-- taxtarea in cui inserire la lista dei nomi -->
    <div class="inputs ">
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="data"><h2 class="label">Inserisci lista nomi</h2></label>
                <textarea type="text" class="form-control" id="data" rows="12"></textarea>
            </div>
        </form>
    </div>

    <!-- bottoni per effettuare le varie azioni -->
    <div class="inputs flex-outp">
        <div class="quantity center-items">
            <div class="btn btn-light">
                percentuale: <span style="font-size: 16px;" class="badge badge-light">25%</span>
            </div>
        </div>
        <button class="btn btn-info center-items" id="show">Estrai</button>
        <button class="btn btn-primary center-items" id="download">Scarica csv</button>
    </div>

    <!-- risultato dell'operazione mostrato a schermo -->
    <div>
        <h2>Lista:</h2>
        <div class="inputs data" style="border: 1px solid lightgray;">

            <ul class="list-group" id="list">
            </ul>
        </div>
    </div>
</div>



<?php
require_once('partials/script.php');
?>
