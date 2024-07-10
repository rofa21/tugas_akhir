document.addEventListener('DOMContentLoaded', function () {
    const jumlahInputs = document.querySelectorAll('.jumlah');
    const totalField = document.getElementById('total');

    function calculateTotal() {
        let total = 0;
        jumlahInputs.forEach(input => {
            const harga = parseFloat(input.getAttribute('data-harga'));
            const jumlah = parseInt(input.value);
            total += harga * jumlah;
        });
        totalField.value = `Rp. ${total.toLocaleString('id-ID')}`;
    }

    jumlahInputs.forEach(input => {
        input.addEventListener('input', calculateTotal);
    });

    calculateTotal();
});



document.addEventListener('DOMContentLoaded', function () {
    const selectAll = document.getElementById('select-all');
    const selectAllFooter = document.getElementById('select-all-footer');
    const selectItems = document.querySelectorAll('.select-item');
    const selectedItemsInput = document.getElementById('selected-items');

    function updateSelectedItems() {
        const selectedIds = Array.from(selectItems)
            .filter(item => item.checked)
            .map(item => item.getAttribute('data-id'));
        selectedItemsInput.value = JSON.stringify(selectedIds);
    }

    selectAll.addEventListener('change', function () {
        selectItems.forEach(item => item.checked = selectAll.checked);
        updateSelectedItems();
    });

    selectAllFooter.addEventListener('change', function () {
        selectItems.forEach(item => item.checked = selectAllFooter.checked);
        updateSelectedItems();
    });

    selectItems.forEach(item => {
        item.addEventListener('change', function () {
            if (!item.checked) {
                selectAll.checked = false;
                selectAllFooter.checked = false;
            }
            updateSelectedItems();
        });
    });

    document.querySelector('form').addEventListener('submit', function () {
        updateSelectedItems();
    });
});


