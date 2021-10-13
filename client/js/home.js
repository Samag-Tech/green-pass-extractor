

$(document).ready(function(){

    $('#extract').on('click', function(e) {
        e.preventDefault();

        let form_data = {
            dataset: $('#data').val()
        }

        $.ajax({
            type: "POST",
            data: JSON.stringify(form_data),
            url: '/server/Api/extractor.php',
            success: function (blob) {
                if (blob !== '') {
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
                    $('#data').addClass('alert-danger');
                }
            },
        });
    });

});
