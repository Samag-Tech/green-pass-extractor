$(document).ready(function(){

    $('#download').on('click', function(e) {
        e.preventDefault();

        /* creazione lista dai nomi inseriti dall'utente */
        let list = [];
        $.each($('#data').val().split(/\n/), function(i, line){
            if(list){
                list.push(line);
            }
        });


        /* chiamata ajax per scaricare la lista */
        $.ajax({
            type: "POST",
            data: JSON.stringify(list),
            url: '/server/Api/generator.php',
            success: function (blob) {

                    if (blob !== '') {

                        /* download del file csv */
                        $('#data').removeClass('alert-danger');
                        var binaryData = [];
                        binaryData.push(blob);
                        const url = window.URL.createObjectURL(new Blob(binaryData, {type: "text/csv"}))
                        const a = document.createElement('a');

                        a.style.display = 'none';
                        a.href = url;
                        a.download = 'lista.csv';
                        document.body.appendChild(a);
                        a.click();

                }else{
                    /* mostra all'utente un errore nel caso in cui la textarea e vuota */
                    $('#data').addClass('alert-danger');
                }
            },
            error: function (err) {
                alert("AJAX error: " + err);
            }
        });
    });

});