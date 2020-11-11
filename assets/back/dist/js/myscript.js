function bacaGambar(input) {
  if(input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('#gambar_load').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}

$('#preview_gambar').change(function() {
  bacaGambar(this);
});

// window.setTimeout(function() {
//   $('.alert').fadeTo(500, 0).slideUp(500, function() {
//     $(this).remove();
//   }, 5000)
// });