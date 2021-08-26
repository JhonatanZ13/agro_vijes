$(document).ready(function () {
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
  /*
      CC 2.0 License Iatek LLC 2018 - Attribution required
  */
  var $e = $(e.relatedTarget);
  var idx = $e.index();
  var itemsPerSlide = 5;
  var totalItems = $(".carousel-item").length;

  if (idx >= totalItems - (itemsPerSlide - 1)) {
    var it = itemsPerSlide - (totalItems - idx);
    for (var i = 0; i < it; i++) {
      // append slides to end
      if (e.direction == "left") {
        $(".carousel-item").eq(i).appendTo(".carousel-inner");
      } else {
        $(".carousel-item").eq(0).appendTo(".carousel-inner");
      }
    }
  }
});

function showImageHereFunc() {
    var total_file=document.getElementById("uploadImageFile").files.length;
    for(var i=0;i<total_file;i++) {
      $('#showImageHere').append("<div class='card col-md-2'><img class='card-img-top' src='"+URL.createObjectURL(event.target.files[i])+"'></div>");
    }
  }
