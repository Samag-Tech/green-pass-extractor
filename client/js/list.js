

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

            success: function (blob) {
                $('#data').removeClass('alert-danger');

                    if (blob) {
                        let split = [];
                        split = blob.split('\n');

                        $('#list').html(generateList(split));

                    }else{

                        $('#data').addClass('alert-danger');
                    }

                },
        });
    });

});


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
