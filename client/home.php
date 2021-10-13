<?php
require_once('partials/header.php');
?>






<div>

    <div>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group col-4">
                <label for="data">inserisci lista nomi</label>
                <textarea type="text" class="form-control" id="data" rows="12"></textarea>
            </div>
        </form>
    </div>

    <div>
        <button class="btn btn-primary" id="extract">estrai</button>
    </div>

</div>



<?php
require_once('partials/script.php');
?>
