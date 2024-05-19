<?php include(APPPATH.'views/components/usual-links.php'); ?>
  <link rel="stylesheet" href="/pepicase/public/css/shop_page.css">
<?php include(APPPATH.'views/components/top-header.php'); ?>

    <img class = "banner" src="/pepicase/public/pics/shop_banner_2.svg" alt="banner" style = "width: 100%; height:auto;">

    <div class="container">
    <aside class="filters-container">
        <header class="filters-header">
            <h2 class="filters-title">Filters</h2>
            <button class="clear-filters">Clear filters</button>
        </header>

        <section class="collection-section">
            <h3 class="collection-title">Collection</h3>
            <div class="collection-item">
                <input type="checkbox" class="collection-checkbox" id="1">
                <label for="pompompurin" class="collection-label">Pompompurin</label>
            </div>
            <div class="collection-item">
                <input type="checkbox" class="collection-checkbox" id="2">
                <label for="my-melody" class="collection-label">My Melody</label>
            </div>
            <div class="collection-item">
                <input type="checkbox" class="collection-checkbox" id="3">
                <label for="cinnamonroll" class="collection-label">Cinnamonroll</label>
            </div>
            <div class="collection-item">
                <input type="checkbox" class="collection-checkbox" id="4">
                <label for="pochacco" class="collection-label">Pochacco</label>
            </div>
        </section>

        <hr class="divider">

        <section class="material-section">
            <h3 class="material-title">Material</h3>
            <div class="material-item">
                <input type="checkbox" class="material-checkbox" id="hard-plastic">
                <label for="hard-plastic" class="material-label">Hard plastic</label>
            </div>
            <div class="material-item">
                <input type="checkbox" class="material-checkbox" id="silicone">
                <label for="silicone" class="material-label">Silicone</label>
            </div>
            <div class="material-item">
                <input type="checkbox" class="material-checkbox" id="metal">
                <label for="metal" class="material-label">Metal</label>
            </div>
        </section>

        <hr class="divider">

        <section class="color-patterns-section">
            <h3 class="color-patterns-title">Color & Patterns</h3>
            <div class="color-row">
                <div class="color-white"></div>
                <div class="color-clear"></div>
                <div class="color-yellow"></div>
            </div>
            <div class="color-label-row">
                <span class="color-label">White</span>
                <span class="color-label">Clear</span>
                <span class="color-label">Yellow</span>
            </div>
            <div class="color-row">
                <div class="color-blue"></div>
                <div class="color-pink"></div>
                <div class="color-multicolor"></div>
            </div>
            <div class="color-label-row">
                <span class="color-label">Blue</span>
                <span class="color-label">Pink</span>
                <span class="color-label">Multicolor</span>
            </div>
        </section>
        <button class="apply-filters">Apply filters</button>
    </aside>
        <div class="product-list">
            <?php foreach ($products as $product): ?>
                <article class="product-container">
                    <figure class="image-wrapper">
                        <img loading="lazy" src="<?php echo base_url($product['Image']); ?>" class="product-image" alt="<?php echo $product['Name']; ?>" />
                    </figure>
                    <h2 class="product-name"><?php echo $product['Name']; ?></h2>
                    <p class="product-price">$<?php echo $product['Price']; ?> USD</p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
    
<?php include(APPPATH.'views/components/bottom-footer.php'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('.apply-filters').on('click', function() {
        let collections = [];
        let materials = [];
        let colors = [];

        // Lấy các giá trị checkbox được chọn
        $('.collection-checkbox:checked').each(function() {
            collections.push($(this).attr('id'));
        });
        $('.material-checkbox:checked').each(function() {
            materials.push($(this).attr('id'));
        });
        $('.color-row div').each(function() {
            if($(this).hasClass('selected')) {
                colors.push($(this).attr('data-color-id'));
            }
        });

        // Gửi yêu cầu AJAX
        $.ajax({
            url: '<?= site_url('getProductController/filterProducts') ?>',
            method: 'POST',
            data: {
                collections: collections,
                materials: materials,
                colors: colors
            },
            success: function(response) {
                $('.product-list').html(response);
            }
        });
    });

    // Thêm class 'selected' khi click vào màu sắc
    $('.color-row div').on('click', function() {
        $(this).toggleClass('selected');
    });
});
</script>
