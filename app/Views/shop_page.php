<?php include(APPPATH.'views/components/usual-links.php'); ?>
<link rel="stylesheet" href="/pepicase/public/css/shoppage.css">
<?php include(APPPATH.'views/components/top-header.php'); ?>

<img class="banner" src="/pepicase/public/pics/shop_banner_2.svg" alt="banner" style="width: 100%; height:auto;">

<div class="container">
    <aside class="filters-container">
        <header class="filters-header">
            <h2 class="filters-title">Filters</h2>
            <button class="clear-filters" id="clear-filters">Clear filters</button>
        </header>

        <section class="collection-section">
            <h3 class="collection-title">Collection</h3>
            <div class="collection-item">
                <input type="checkbox" class="collection-checkbox" id="2">
                <label for="pompompurin" class="collection-label">Pompompurin</label>
            </div>
            <div class="collection-item">
                <input type="checkbox" class="collection-checkbox" id="3">
                <label for="my-melody" class="collection-label">My Melody</label>
            </div>
            <div class="collection-item">
                <input type="checkbox" class="collection-checkbox" id="1">
                <label for="cinnamonroll" class="collection-label">Cinnamonroll</label>
            </div>
            <div class="collection-item">
                <input type="checkbox" class="collection-checkbox" id="4">
                <label for="pochacco" class="collection-label">Pochacco</label>
            </div>
        </section>

        <hr class="divider">

        <section class="color-patterns-section">
            <h3 class="color-patterns-title">Color & Patterns</h3>
            <div class="color-row">
                <div id="1" class="color color-white">
                    <span class="check-mark">&#10003;</span>
                </div>
                <div id="2" class="color color-clear">
                    <span class="check-mark">&#10003;</span>
                </div>
                <div id="3" class="color color-yellow">
                    <span class="check-mark">&#10003;</span>
                </div>
            </div>
            <div class="color-label-row">
                <span class="color-label">White</span>
                <span class="color-label">Clear</span>
                <span class="color-label">Yellow</span>
            </div>
            <div class="color-row">
                <div id="4" class="color color-blue">
                    <span class="check-mark">&#10003;</span>
                </div>
                <div id="5" class="color color-pink">
                    <span class="check-mark">&#10003;</span>
                </div>
                <div id="6" class="color color-multicolor">
                    <span class="check-mark">&#10003;</span>
                </div>
            </div>
            <div class="color-label-row">
                <span class="color-label">Blue</span>
                <span class="color-label">Pink</span>
                <span class="color-label">Multicolor</span>
            </div>
        </section>
        <hr class="divider">
        <button class="apply-filters">APPLY</button>
    </aside>
    <div class="product-list">
        <?php foreach ($products as $product): ?>
            <article class="product-container">
                <figure class="image-wrapper">
                    <img loading="lazy" src="<?php echo ($product['Image']); ?>" class="product-image" alt="<?php echo $product['Name']; ?>" />
                </figure>
                <h2 class="product-name">
                    <a href="<?= base_url('/product/'.$product['ID']); ?>">
                        <?php echo $product['Name']; ?>
                    </a>
                </h2>
                <p class="product-price">$<?php echo $product['Price']; ?> USD</p>
            </article>
        <?php endforeach; ?>
    </div>
</div>
<button id="load-more" class="load-more-btn">Load More Products</button>

<?php include(APPPATH.'views/components/bottom-footer.php'); ?>
<script src="/pepicase/public/js/jquery.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Xử lý sự kiện nhấn vào các ô màu để chọn/bỏ chọn
        document.querySelectorAll('.color-row div[id]').forEach(function(colorDiv) {
            colorDiv.addEventListener('click', function() {
                colorDiv.classList.toggle('selected'); // Toggle class 'selected'
            });
        });

        document.querySelector('.apply-filters').addEventListener('click', function() {
            let selectedCollections = [];
            document.querySelectorAll('.collection-checkbox:checked').forEach(function(checkbox) {
                selectedCollections.push(checkbox.id); // Lấy id của checkbox
            });

            let selectedColors = [];
            document.querySelectorAll('.color-row div[id].selected').forEach(function(colorDiv) {
                selectedColors.push(colorDiv.id); // Lấy id của div màu
            });

            let filters = {
                collections: selectedCollections,
                colors: selectedColors
            };

            fetch('<?= base_url("get_filtered_products") ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify(filters)
            })
            .then(response => response.json())
            .then(data => {
                let productContainer = document.querySelector('.product-list');
                productContainer.innerHTML = '';
                data.products.forEach(product => {
                    let productHTML = `
                        <article class="product-container">
                            <figure class="image-wrapper">
                                <img loading="lazy" src="${product.Image}" class="product-image" alt="${product.Name}" />
                            </figure>
                            <h2 class="product-name">
                                <a href="<?= base_url('/product/') ?>${product.ID}">${product.Name}</a>
                            </h2>
                            <p class="product-price">$${product.Price} USD</p>
                        </article>`;
                    productContainer.innerHTML += productHTML;
                });
            })
            .catch(error => console.error('Error:', error));
        });

        // Clear filters functionality
        document.getElementById('clear-filters').addEventListener('click', function() {
            // Uncheck all checkboxes
            document.querySelectorAll('.collection-checkbox').forEach(function(checkbox) {
                checkbox.checked = false;
            });

            // Remove 'selected' class from all color divs
            document.querySelectorAll('.color-row div[id]').forEach(function(colorDiv) {
                colorDiv.classList.remove('selected');
            });

            // Fetch and display the original product list (first 6 products)
            fetch('<?= base_url("get_all_products") ?>', {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                let productContainer = document.querySelector('.product-list');
                productContainer.innerHTML = '';
                data.products.forEach(product => {
                    let productHTML = `
                        <article class="product-container">
                            <figure class="image-wrapper">
                                <img loading="lazy" src="${product.Image}" class="product-image" alt="${product.Name}" />
                            </figure>
                            <h2 class="product-name">
                                <a href="<?= base_url('/product/') ?>${product.ID}">${product.Name}</a>
                            </h2>
                            <p class="product-price">$${product.Price} USD</p>
                        </article>`;
                    productContainer.innerHTML += productHTML;
                });
            })
            .catch(error => console.error('Error:', error));
        });

        let currentPage = 1; // Biến để theo dõi trang hiện tại
        const limit = 6; // Số sản phẩm cần tải mỗi lần

        // Hàm xử lý khi nhấn nút "Load more"
        document.getElementById('load-more').addEventListener('click', function() {
            currentPage++; // Tăng số trang hiện tại lên 1
            fetch('<?= base_url("get_more_products") ?>?page=' + currentPage, {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                let productContainer = document.querySelector('.product-list');
                data.products.forEach(product => {
                    let productHTML = `
                        <article class="product-container">
                            <figure class="image-wrapper">
                                <img loading="lazy" src="${product.Image}" class="product-image" alt="${product.Name}" />
                            </figure>
                            <h2 class="product-name">
                                <a href="<?= base_url('/product/') ?>${product.ID}">${product.Name}</a>
                            </h2>
                            <p class="product-price">$${product.Price} USD</p>
                        </article>`;
                    productContainer.innerHTML += productHTML;
                });
                // Ẩn nút "Load more" nếu số sản phẩm trả về ít hơn số sản phẩm cần tải
                if (data.products.length < limit) {
                    document.getElementById('load-more').style.display = 'none';
                }
            })
            .catch(error => console.error('Error:', error));
        });

    });
</script>
