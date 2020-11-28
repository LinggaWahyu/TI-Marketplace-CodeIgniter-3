const flashData = $(".flash-data").data("flashdata");

if (flashData) {
  Swal({
    title: "Success !",
    text: flashData,
    type: "success",
  });
}

// tombol-hapus
$(".btn-remove-cart").on("click", function (e) {
  e.preventDefault();
  const href = $(this).attr("href");

  Swal({
    title: "Apakah anda yakin",
    text: "akan menghapus produk dari keranjang ?",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Hapus Produk!",
  }).then((result) => {
    if (result.value) {
      document.location.href = href;
    }
  });
});
