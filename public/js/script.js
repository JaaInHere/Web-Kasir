document.addEventListener('DOMContentLoaded', function () {
    const productList = document.getElementById('product-list');
    const addButton = document.getElementById('add-product');

    // Fungsi hitung total keseluruhan
    function updateGrandTotal() {
        let total = 0;
        document.querySelectorAll('input[name="subtotal[]"]').forEach(input => {
            total += parseFloat(input.value || 0);
        });
        document.getElementById('grand-total').textContent = 'Rp ' + total.toLocaleString();
    }

    // Event: ganti produk
    productList.addEventListener('change', function (e) {
        if (e.target.matches('select[name="produkID[]"]')) {
            const selectedOption = e.target.selectedOptions[0];
            const price = selectedOption.getAttribute('data-price');
            const wrapper = e.target.closest('.grid');
            wrapper.querySelector('input[name="hargaSatuan[]"]').value = price;
            wrapper.querySelector('input[name="jumlahProduk[]"]').dispatchEvent(new Event('input'));
        }
    });

    // Event: input jumlah
    productList.addEventListener('input', function (e) {
        if (e.target.matches('input[name="jumlahProduk[]"]')) {
            const wrapper = e.target.closest('.grid');
            const quantity = parseFloat(e.target.value || 0);
            const price = parseFloat(wrapper.querySelector('input[name="hargaSatuan[]"]').value || 0);
            wrapper.querySelector('input[name="subtotal[]"]').value = price * quantity;
            updateGrandTotal();
        }
    });

    // Event: hapus produk
    productList.addEventListener('click', function (e) {
        if (e.target.matches('.remove-product')) {
            e.target.closest('.grid').remove();
            updateGrandTotal();
        }
    });

    // Tambah baris baru
    addButton.addEventListener('click', function () {
        const firstRow = productList.querySelector('.grid');
        const newRow = firstRow.cloneNode(true);

        newRow.querySelectorAll('input, select').forEach(el => {
            if (el.tagName === 'SELECT') el.selectedIndex = 0;
            else el.value = '';
        });

        productList.appendChild(newRow);
    });
});
