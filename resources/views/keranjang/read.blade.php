@extends('layouts.app')

@section('content')

  <section class="py-5 bg-light">
            <div class="container px-4 px-lg-5 mt-5">
<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Produk</th>
      <th scope="col">Image</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody id="keranjangData">

  </tbody>
</table>

            </div>
  </section>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
$.ajax({
    url: '/keranjang',
    method: 'GET',
    dataType: 'json',
    success: function(data) {
        $("#keranjangData").empty();
        data.forEach(item => {
            const gambarUrl = item.produk.gambar
    ? `/storage/${item.produk.gambar}`
    : "/image/default.png";

            $("#keranjangData").append(`
                <tr>
                    <th scope="row">${item.id}</th>
                    <td>${item.produk.nama}</td>
                    <td><img src="${gambarUrl}" alt="Gambar Produk" style="width: 150px; height: 150px;"></td>
                    <td>${item.jumlah}</td>
                    <td>
                            <button onclick="hapusData(${item.id})" class="btn btn-danger">Hapus</button>
                        </td>
                </tr>
            `);
        });
    },
    error: function(error) {
        console.error(error);
    }
});

function hapusData(id) {

    // Dapatkan nilai token CSRF dari meta tag
    const csrfToken = $('meta[name="csrf-token"]').attr('content');

    // Buat header permintaan Ajax dengan token CSRF
    const headers = {
        'X-CSRF-TOKEN': csrfToken
    };

        $.ajax({
            url: `/keranjang/${id}`,
            method: 'DELETE',
            dataType: 'json',
            headers: headers,
            success: function(response) {
                console.log('Data berhasil dihapus');
                window.location.href = '/keranjang/halaman';
            },
            error: function(error) {
                console.error(error);
            }
        });
    }
    </script>
@endsection
