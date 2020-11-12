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

const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
});

$('.swalDefaultSuccess').click(function() {
  Toast.fire({
    icon: 'success',
    title: 'Barang Berhasil Ditambahkan ke Keranjang.'
  })
});

// window.setTimeout(function() {
//   $('.alert').fadeTo(500, 0).slideUp(500, function() {
//     $(this).remove();
//   }, 5000)
// });