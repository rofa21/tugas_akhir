$(document).ready(function(){
    // Fitur pencarian
    $("#search").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#barangTable tbody tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    // Fitur kategorisasi
    $("#categoryFilter").on("change", function() {
        var value = $(this).val().toLowerCase();
        $("#barangTable tbody tr").filter(function() {
            if(value === "all") {
                $(this).show();
            } else {
                $(this).toggle($(this).find("td:eq(2)").text().toLowerCase() === value);
            }
        });
    });

    // Fitur tambah barang
    $("#addForm").on("submit", function(e) {
        e.preventDefault();
        var nama = $("#namaBarang").val();
        var kategori = $("#kategoriBarang").val();
        var harga = $("#hargaBarang").val();
        var stok = $("#stokBarang").val();
        var newRow = `<tr>
            <td></td>
            <td>${nama}</td>
            <td>${kategori}</td>
            <td>${harga}</td>
            <td>${stok}</td>
            <td>
                <button class="btn btn-primary btn-sm">Edit</button>
                <button class="btn btn-danger btn-sm">Hapus</button>
            </td>
        </tr>`;
        $("#barangTable tbody").append(newRow);
        $('#addModal').modal('hide');
        $("#addForm")[0].reset();
    });
});


//edit
// fresh.js

$(document).ready(function() {
    $('.btn-edit').click(function() {
        // Mendapatkan nilai dari atribut data-* tombol Edit
        var id = $(this).data('id');
        var nama = $(this).data('nama');
        var merek = $(this).data('merek');
        var harga = $(this).data('harga');
        var ukuran = $(this).data('ukuran');
        var warna = $(this).data('warna');
        var stok_barang = $(this).data('stok_barang');
        var deskripsi = $(this).data('deskripsi');

        // Mengisi nilai-nilai ke dalam form modal edit
        $('#edit_id').val(id);
        $('#edit_nama').val(nama);
        $('#edit_merek').val(merek);
        $('#edit_harga').val(harga);
        $('#edit_ukuran').val(ukuran);
        $('#edit_warna').val(warna);
        $('#edit_stok_barang').val(stok_barang);
        $('#edit_deskripsi').val(deskripsi);
    });
});


