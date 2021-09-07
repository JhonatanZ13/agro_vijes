$(document).ready(function () {
  /* $('#usuarios').DataTable(); */
  $('#usuarios').DataTable({

    "order": [0, "desc"],

    responsive: true,
    language: {
        "decimal": "",
        "emptyTable": "No hay datos",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
        "infoEmpty": "Mostrando 0 a 0 de 0 registros",
        "infoFiltered": "(Filtro de _MAX_ registros Totales)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Numero de filas _MENU_",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "No se encontraron resultados",
        "paginate": {

            "first": "Primero",
            "last": "Ultimo",
            "next": "Proximo",
            "previous": "Anterior"

        },


    },
  });

  $(document).on("click", "#modalBoton", function() {
    var pro_id = $(this).attr("data-id");
    var url = "ajax.php?modulo=Agro&controlador=Agro&funcion=getProducto";
    $.ajax({
        url: url,
        data: "pro_id=" + pro_id,
        type: "POST",
        success: function(datos) {
            $("#contenedor_modal").html(datos);
            $("#modal").modal("show");
        },
    });
    /* $("#modal").modal("show"); */
  });

  $(document).on("change", "#subirFirma", function() {
    const seleccionArchivos = document.querySelector("#subirFirma"), 
        imagenPrevisualizacion = document.querySelector("#prevfirma");
    // Los archivos seleccionados, pueden ser muchos o uno
    const archivos = seleccionArchivos.files;
    // Si no hay archivos salimos de la función y quitamos la imagen
    if (!archivos || !archivos.length) {
        imagenPrevisualizacion.src = "";
        return;
    }
    // Ahora tomamos el primer archivo, el cual vamos a previsualizar
    const primerArchivo = archivos[0];
    // Lo convertimos a un objeto de tipo objectURL
    const objectURL = URL.createObjectURL(primerArchivo);
    // Y a la fuente de la imagen le ponemos el objectURL
    imagenPrevisualizacion.src = objectURL;
 });

 $(document).on("change", "#subirFirma2", function() {
    const seleccionArchivos = document.querySelector("#subirFirma2"), 
        imagenPrevisualizacion = document.querySelector("#prevfirma2");
    // Los archivos seleccionados, pueden ser muchos o uno
    const archivos = seleccionArchivos.files;
    // Si no hay archivos salimos de la función y quitamos la imagen
    if (!archivos || !archivos.length) {
        imagenPrevisualizacion.src = "";
        return;
    }
    // Ahora tomamos el primer archivo, el cual vamos a previsualizar
    const primerArchivo = archivos[0];
    // Lo convertimos a un objeto de tipo objectURL
    const objectURL = URL.createObjectURL(primerArchivo);
    // Y a la fuente de la imagen le ponemos el objectURL
    imagenPrevisualizacion.src = objectURL;
 });
 $(document).on("change", "#subirFirma3", function() {
    const seleccionArchivos = document.querySelector("#subirFirma3"), 
        imagenPrevisualizacion = document.querySelector("#prevfirma3");
    // Los archivos seleccionados, pueden ser muchos o uno
    const archivos = seleccionArchivos.files;
    // Si no hay archivos salimos de la función y quitamos la imagen
    if (!archivos || !archivos.length) {
        imagenPrevisualizacion.src = "";
        return;
    }
    // Ahora tomamos el primer archivo, el cual vamos a previsualizar
    const primerArchivo = archivos[0];
    // Lo convertimos a un objeto de tipo objectURL
    const objectURL = URL.createObjectURL(primerArchivo);
    // Y a la fuente de la imagen le ponemos el objectURL
    imagenPrevisualizacion.src = objectURL;
 });

 $(document).on("click", "#modalEliminar", function() {
  var url = $(this).attr("data-url");
  var id = $(this).attr("data-id");
  swal({
      title: '¿Desea eliminar este prodcuto?',
      text: 'Si lo elimina se perderan todos los datos.',
      icon: 'warning',
      buttons: {
          confirm: {
              text: 'Eliminar Producto',
              className: 'btn btn-danger'
          },

          cancel: {
              visible: true,
              text: "Cancelar",
              className: 'btn btn-info'
          }

      }
  }).then((Delete) => {
      if (Delete) {
          $.ajax({
              url: url,
              data: "pro_id=" + id,
              type: "POST",
              success: function() {
                  swal({
                      title: 'Se a eliminado correctamente',
                      icon: 'success'
                  });
                  setTimeout('document.location.reload()', 500);
              }
          });
      }
  });

});
});

$(document).on("change", "#select_dep", function () {
  var url = $(this).attr("data-url");
  $("#select_dep option:selected").each(function () {
    var elegido = $(this).val();
    if (elegido > 0) {
      $.ajax({
        url: url,
        data: "dep_id=" + elegido,
        type: "POST",
        success: function (datos) {
          $("#select_ciu").html(datos);
        },
      });
    } else if (elegido == 0) {
      $("#select_ciu").html("");
    }
  });
});

$("#carousel-example").on("slide.bs.carousel", function (e) {
  
  var $e = $(e.relatedTarget);
  var idx = $e.index();
  var itemsPerSlide = 5;
  var totalItems = $(".carousel-item").length;

  if (idx >= totalItems - (itemsPerSlide - 1)) {
    var it = itemsPerSlide - (totalItems - idx);
    for (var i = 0; i < it; i++) {
     
      if (e.direction == "left") {
        $(".carousel-item").eq(i).appendTo(".carousel-inner");
      } else {
        $(".carousel-item").eq(0).appendTo(".carousel-inner");
      }
    }
  }
});

$('input[name="rol"]').on('change', function(){
  var id = $(this).val();
  if(id == 3){
    $("#ocultarComprador").css("display","none");
  }else{
    $("#ocultarComprador").css("display","");
  }
});


//Validaciones
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
