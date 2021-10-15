

$(document).ready(function(){

    $('#show').on('click', function(e) {
        e.preventDefault();

        let list = [];
        $.each($('#data').val().split(/\n/), function(i, line){
            if(list){
                list.push(line);
            }
        });

        $.ajax({
            type: "POST",
            data: JSON.stringify(list),
            url: '/server/Api/extractor.php',
            dataType: "json",
            encode: true,
            contentType: 'application/json',
            success: function (response) {
                console.log(response);
                $('#data').removeClass('alert-danger');

                    if (response.length > 0) {

                        $('#list').html(generateList(response));

                    }else{

                        $('#data').addClass('alert-danger');
                    }

                },
                error: function (err) {
                    console.log("AJAX error: " + err);
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
        <li class="list-group-item">${element}</li>
        `;

        rows.push(list);
    });


    return rows;
}
