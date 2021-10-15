$(document).ready(function(){

    $('#show').on('click', function(e) {
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
            url: '/server/Api/extractor.php',
            dataType: "json",
            encode: true,
            contentType: 'application/json',
            success: function (response) {

                /* mostra il contenuto della lista al centro */
                $('#data').removeClass('alert-danger');


                    if (response.length > 0) {

                        $('#list').html(generateList(response));

                    }else{
                        /* mostra un errore in caso di dati mancanti */
                        $('#data').addClass('alert-danger');
                    }

                },
                error: function (err) {
                    alert("AJAX error: " + err);
                }
        });
    });

});

/* funzione per generare dinamicamente la lista ricevuta nell'html da mostrare all'utente */
function generateList(elements) {

    let rows = [];

    elements.forEach(element => {

        let list =

        `
        <li class="list-group-item text-center">${element}</li>
        `;

        rows.push(list);
    });


    return rows;
}
