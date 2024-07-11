document.addEventListener('DOMContentLoaded', function () {
    const jumlahInputs = document.querySelectorAll('.jumlah');
    const totalInput = document.getElementById('total');

    function updateTotal() {
        let total = 0;
        jumlahInputs.forEach(input => {
            const harga = parseFloat(input.getAttribute('data-harga'));
            const jumlah = parseInt(input.value);
            total += harga * jumlah;
        });
        totalInput.value = 'RP. ' + total.toLocaleString('id-ID', {minimumFractionDigits: 0});
    }

    jumlahInputs.forEach(input => {
        input.addEventListener('change', updateTotal);
    });

    updateTotal();
});



document.addEventListener('DOMContentLoaded', function () {
    const selectAllCheckbox = document.getElementById('select-all');
    const selectAllFooterCheckbox = document.getElementById('select-all-footer');
    const itemCheckboxes = document.querySelectorAll('.select-item');

    selectAllCheckbox.addEventListener('change', function () {
        itemCheckboxes.forEach(checkbox => {
            checkbox.checked = selectAllCheckbox.checked;
        });
        selectAllFooterCheckbox.checked = selectAllCheckbox.checked;
    });

    selectAllFooterCheckbox.addEventListener('change', function () {
        itemCheckboxes.forEach(checkbox => {
            checkbox.checked = selectAllFooterCheckbox.checked;
        });
        selectAllCheckbox.checked = selectAllFooterCheckbox.checked;
    });

    itemCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function () {
            if (!this.checked) {
                selectAllCheckbox.checked = false;
                selectAllFooterCheckbox.checked = false;
            }
        });
    });
});

document.addEventListener('DOMContentLoaded', function () {
    // Hapus item individual
    document.querySelectorAll('.remove-button').forEach(function (button) {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            const itemId = this.getAttribute('data-id');
            removeItem(itemId);
        });
    });

    // Hapus item yang dipilih
    document.getElementById('remove-selected').addEventListener('click', function () {
        const selectedIds = Array.from(document.querySelectorAll('.select-item:checked')).map(function (checkbox) {
            return checkbox.getAttribute('data-id');
        });
        removeMultipleItems(selectedIds);
    });

    // Pilih semua item
    document.getElementById('select-all').addEventListener('change', function () {
        const isChecked = this.checked;
        document.querySelectorAll('.select-item').forEach(function (checkbox) {
            checkbox.checked = isChecked;
        });
    });

    function removeItem(itemId) {
        fetch(`/keranjang/remove/${itemId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            }
        });
    }

    function removeMultipleItems(ids) {
        fetch(`/keranjang/remove-multiple`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ ids: ids })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            }
        });
    }
});