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
