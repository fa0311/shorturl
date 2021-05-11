$(function () {
    $("#send").on('click', function () { 
        var obj = document.forms["form"];
        $.ajax("/add/api.php", {
            type: 'post',
            data: $(obj).serialize(), 
            dataType: 'json'
        }).done(function(data) {
            document.form.reset();
            $("#output").append(data.output);
        }).fail(function(data) {
            alert(data.responseJSON.message);
        });
    });
});