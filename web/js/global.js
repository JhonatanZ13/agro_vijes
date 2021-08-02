$(document).ready(function (e) {
  $("#input-file-1").customFile({
    allowed: ["jpge", "jpg", "png"],
    maxFiles: 1,
    filePicker : "<div class='text-center'> <h3>Agregar foto de perfil</h3><br><i class='fas fa-image fa-5x'></i></i> </div>"
  });
  $("#input-file-2").customFile({
    allowed: ["jpge", "jpg", "png"],
    maxFiles: 6,
    filePicker : "<div class='text-center'> <h3>Agregue fotos de su producto</h3><br><i class='fas fa-image fa-5x'></i></i> </div>"
  });
});

$('#carousel-example').on('slide.bs.carousel', function (e) {
  /*
      CC 2.0 License Iatek LLC 2018 - Attribution required
  */
  var $e = $(e.relatedTarget);
  var idx = $e.index();
  var itemsPerSlide = 5;
  var totalItems = $('.carousel-item').length;

  if (idx >= totalItems-(itemsPerSlide-1)) {
      var it = itemsPerSlide - (totalItems - idx);
      for (var i=0; i<it; i++) {
          // append slides to end
          if (e.direction=="left") {
              $('.carousel-item').eq(i).appendTo('.carousel-inner');
          }
          else {
              $('.carousel-item').eq(0).appendTo('.carousel-inner');
          }
      }
  }
});
