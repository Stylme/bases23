
function medico() {
    $.ajax({
            type: "POST",
            url: "tabla.php",
            data: "med="+$("#seleccion").val(),
success: function(html){    
$('#carga').html(html);
}

        }
    );


}













