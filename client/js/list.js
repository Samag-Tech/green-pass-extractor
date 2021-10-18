$(document).ready(function(){

        /* download file csv */
        $('#download').on('click', function () {
            download(listValue);
        })


    $('#show').on('click', function(e) {
        e.preventDefault();

        /* creazione lista dai nomi inseriti dall'utente */
        let list = [];
        $.each($('#data').val().split(/\n/), function(i, line){
            if(list){
                list.push(line);
            }
        });

        listTotal = list;

        /* chiamata ajax per scaricare la lista */
        $.ajax({
            type: "POST",
            data: JSON.stringify(list),
            url: '/server/Api/extractor.php',
            dataType: "json",
            encode: true,
            contentType: 'application/json',
            success: function (response) {
                console.log(response);

                /* mostra il contenuto della lista al centro */
                $('#data').removeClass('alert-danger');


                    if (response.length > 0) {
                        /* disabilita il pulsante per estrarre la lista */
                        $('#show').prop('disabled' , true);
                        $('#list').html(generateList(response));

                        /* abilita il pulsante di download */
                        $('#download').prop('disabled' , false);

                        listValue = response;

                    }else{
                        /* mostra un errore in caso di dati mancanti */
                        response = '';
                        $('#list').html(generateList(response));
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

    if (elements !== '') {
        elements.forEach(element => {

            let list =

            `
            <li class="list-group-item text-center">${element}</li>
            `;

            rows.push(list);
        });
    }else{

        let list = '';

        rows.push(list);

    }


    return rows;
}


function download(resp) {
    $.ajax({
        type: "POST",
        data: JSON.stringify(resp),
        url: '/server/Api/generator.php',
        success: function (response) {
            console.log(response);
                if (response !== '') {
                    /* da la possibilita di ricreare la lista */
                    $('#show').prop('disabled' , false);
                    /* download del file csv */
                    $('#data').removeClass('alert-danger');
                    var binaryData = [];
                    binaryData.push(response);
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
}