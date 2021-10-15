<?php
require_once('partials/header.php');
?>

<div class="logo">
    <img src="public/logo-strategy.png" alt="">
</div>

<div class="flex">
    <div class="inputs ">
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group col-4">
                <label for="data"><h2 class="label">inserisci lista nomi</h2></label>
                <textarea type="text" class="form-control" id="data" rows="12"></textarea>
            </div>
        </form>
    </div>

    <div class="inputs flex-outp">
        <div class="quantity center-items">
            <div class="btn btn-light">
                percentuale: <span style="font-size: 16px;" class="badge badge-light">25%</span>
            </div>
        </div>
        <button class="btn btn-info center-items" id="show">estrai</button>
        <button class="btn btn-primary center-items" id="download">scarica csv</button>
    </div>
<!--     <div class="inputs show">

    </div> -->

    <div class="inputs data" style="border: 1px solid lightgray;">
        <ul class="list-group" id="list">
        </ul>
    </div>
</div>



<?php
require_once('partials/script.php');
?>
