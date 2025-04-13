document.addEventListener('DOMContentLoaded', function () {
    const productList = document.getElementById('product-list');
    const addButton = document.getElementById('add-product');

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
            const stok = selectedOption.getAttribute('data-stok');
            const wrapper = e.target.closest('.grid');

            // Update harga satuan dan stok
            wrapper.querySelector('input[name="hargaSatuan[]"]').value = price;
            const jumlahInput = wrapper.querySelector('input[name="jumlahProduk[]"]');
            jumlahInput.setAttribute('max', stok); // Update batas jumlah
            jumlahInput.setAttribute('data-stok', stok); // Simpan stok untuk validasi
            jumlahInput.value = ""; // Reset jumlah saat produk berubah
            jumlahInput.dispatchEvent(new Event('input'));
        }
    });

    // Event: input jumlah
    productList.addEventListener('input', function (e) {
        if (e.target.matches('input[name="jumlahProduk[]"]')) {
            const wrapper = e.target.closest('.grid');
            const max = parseFloat(e.target.getAttribute('max') || Infinity);
            const stok = parseFloat(e.target.dataset.stok || Infinity);
            const price = parseFloat(wrapper.querySelector('input[name="hargaSatuan[]"]').value || 0);
            let quantity = parseFloat(e.target.value || 0);
    
            if (quantity > max) {
                alert('Jumlah melebihi stok yang tersedia!');
                quantity = max;
                e.target.value = max;
            }
    
            const subtotal = price * quantity;
            wrapper.querySelector('input[name="subtotal[]"]').value = subtotal;
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

            if (el.name === 'jumlahProduk[]') {
                el.removeAttribute('data-stok');
                el.removeAttribute('max');
            }
        });

        productList.appendChild(newRow);
    });
});


