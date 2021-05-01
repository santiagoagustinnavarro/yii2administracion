
$(document).ready(function () {





    $('#movimiento_nuevo').click( function(link) {

        var unaUrl= '../web/index.php?r=movimiento%2Fcreate'
        link.preventDefault();

        crearModal('', unaUrl, 'Nuevo movimiento' )
    })






    function crearModal(parametros, unaUrl, titulo) {
            $.ajax({
                url: unaUrl,
                data: parametros,
            }).done(function (dato) {
                $('#modal').modal('show')
                        .find('.modal-body')
                        .html(dato);
                $('#modal').find('.modal-header')
                .html("<h2>"+titulo+"<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button></h2>");

            });
      }//crearModal



  })//document. ready
