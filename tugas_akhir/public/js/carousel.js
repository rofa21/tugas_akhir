document.addEventListener('DOMContentLoaded', function() {
    const carouselContainer = document.querySelector('.carousel-container');
    let isDown = false;
    let startX;
    let scrollLeft;

    carouselContainer.addEventListener('mousedown', (e) => {
        isDown = true;
        carouselContainer.classList.add('active');
        startX = e.pageX - carouselContainer.offsetLeft;
        scrollLeft = carouselContainer.scrollLeft;
    });
    carouselContainer.addEventListener('mouseleave', () => {
        isDown = false;
        carouselContainer.classList.remove('active');
    });
    carouselContainer.addEventListener('mouseup', () => {
        isDown = false;
        carouselContainer.classList.remove('active');
    });
    carouselContainer.addEventListener('mousemove', (e) => {
        if (!isDown) return;
        e.preventDefault();
        const x = e.pageX - carouselContainer.offsetLeft;
        const walk = (x - startX) * 3; //scroll-fast
        carouselContainer.scrollLeft = scrollLeft - walk;
    });
});


document.addEventListener('DOMContentLoaded', function () {
    const selectAll = document.getElementById('select-all');
    const selectAllFooter = document.getElementById('select-all-footer');
    const checkboxes = document.querySelectorAll('.select-item');
    const totalPriceElement = document.getElementById('total-price');
    let totalPrice = 0;

    function updateTotalPrice() {
        totalPrice = 0;
        checkboxes.forEach(checkbox => {
            if (checkbox.checked) {
                totalPrice += parseInt(checkbox.closest('.cart-item').dataset.price);
            }
        });
        totalPriceElement.textContent = 'Rp ' + totalPrice.toLocaleString('id-ID');
    }

    selectAll.addEventListener('change', function () {
        checkboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
        updateTotalPrice();
    });

    selectAllFooter.addEventListener('change', function () {
        checkboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
        updateTotalPrice();
    });

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function () {
            if (!this.checked) {
                selectAll.checked = false;
                selectAllFooter.checked = false;
            }
            updateTotalPrice();
        });
    });

    document.querySelectorAll('.remove-button').forEach(button => {
        button.addEventListener('click', function () {
            this.closest('.cart-item').remove();
            updateTotalPrice();
        });
    });

    updateTotalPrice();
});