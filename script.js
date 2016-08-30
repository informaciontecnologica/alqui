/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function (e) {

    $("#uploadimage").on('submit', (function (e) {
        e.preventDefault();

        $("#message").empty();
        $('#loading').show();
        $.ajax({
            url: "ajax_php_file.php", // Url to which the request is send
            type: "POST", // Type of request to be send, called as method
            data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData: false, // To send DOMDocument or non processed data file it is set to false
            success: function (data)   // A function to be called if request succeeds
            {
                console.log(data);
                $('#loading').hide();
                $("#message").html(data);

            }
        });
    }));

// Function to preview image after validation
    $(function () {
        $("#file").change(function () {

            $("#message").empty(); // To remove the previous error message
            var file = this.files[0];
            var imagefile = file.type;
            var match = ["image/jpeg", "image/png", "image/jpg"];
            if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2])))
            {
                $('#previewing').attr('src', '');
                $("#message").html("<p id='error'>Please Select A valid Image File</p>" + "<h4>Note</h4>" + "<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
                return false;
            }
            else
            {

                var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);
            }
        });
    });
    function imageIsLoaded(e) {
//$("#file").css("color","green");
        $('#image_preview').css("display", "block");
        $('#previewing').attr('src', e.target.result);
        $('#previewing').attr('width', '250px');
        $('#previewing').attr('height', '230px');
    }
    ;

    function imagenborrar(e) {
        $('#previewing').attr('src', 'imagenes/Personal/fotos/avatar/noimage.png');
        $('#previewing').attr('width', '250px');
        $('#previewing').attr('height', '230px');
        $('#file').val('');


    }
    $('#cancelar').click(function () {
        imagenborrar(e);


    });


   




function selectCountry(val, val2) {
    $("#search-box").val(val2);
    $('#idpersonas').val(val);
    $("#suggesstion-box").hide();
    var idpersonas = $(val);


}


    

});
