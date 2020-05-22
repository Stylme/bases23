function medico() {
    $.ajax({
        type: "POST",
        url: "../php/tabla.php",
        data: "med=" + $("#seleccion").val(),
        success: function(html) {
            $("#carga").html(html);
        },
    });
}