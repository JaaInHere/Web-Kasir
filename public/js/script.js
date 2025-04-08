    document.addEventListener('DOMContentLoaded', function () {
        const productList = document.getElementById('product-list');
        const addButton = document.getElementById('add-product');

        // Fungsi hitung total keseluruhan
        function updateGrandTotal() {
            let total = 0;
            document.querySelectorAll('input[name="totals[]"]').forEach(input => {
                total += parseFloat(input.value || 0);
            });
            document.getElementById('grand-total').textContent = 'Rp ' + total.toLocaleString();
        }

        // Event: ganti produk
        productList.addEventListener('change', function (e) {
            if (e.target.matches('select[name="products[]"]')) {
                const selectedOption = e.target.selectedOptions[0];
                const price = selectedOption.getAttribute('data-price');
                const wrapper = e.target.closest('.grid');
                wrapper.querySelector('input[name="prices[]"]').value = price;
                wrapper.querySelector('input[name="quantities[]"]').dispatchEvent(new Event('input'));
            }
        });

        // Event: input jumlah
        productList.addEventListener('input', function (e) {
            if (e.target.matches('input[name="quantities[]"]')) {
                const wrapper = e.target.closest('.grid');
                const quantity = parseFloat(e.target.value || 0);
                const price = parseFloat(wrapper.querySelector('input[name="prices[]"]').value || 0);
                wrapper.querySelector('input[name="totals[]"]').value = price * quantity;
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

