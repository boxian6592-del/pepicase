//////// SIDEBAR / CONTENT CHUNG
$(document).ready(function() { // TRANG LOAD PHÍA PRODUCT TRƯỚC
    clearContent();
    initiate_product_page();
});

$('.nav-item').click(function() {
    if (!$(this).hasClass('nav_active')) {
        let previous_nav = $('.nav_active');
        previous_nav.removeClass('nav_active');
        $(this).addClass('nav_active');

        clearContent();
        if ($('.nav-item.nav_active .title').text() === 'Product') {
            initiate_product_page();
        }
        if ($('.nav-item.nav_active .title').text() === 'Orders') {
            initiate_product_page();
        }
        if ($('.nav-item.nav_active .title').text() === 'Users') {
            initiate_product_page();
        }
    }
});

function clearContent()
{
    $('#content').empty();
}
//////// SIDEBAR / CONTENT CHUNG










//////// FUNCTIONS / LISTENERS CHO PRODUCT

function initiate_product_page()
{
    $('#content').html(
    `
    <h3 style="margin-top:30px; font-family:'Lexend'">PRODUCT</h3>
        <hr>
        <button type="button" class="btn btn-warning" id="addProductBtn" data-bs-toggle="modal">+ Add new product</button>        
        <br><br>
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>PRODUCT NAME</th>
                    <th>PRODUCT ID</th>
                    <th>SKU</th>
                    <th>Color</th>
                    <th>Collection</th>
                    <th>PRICE</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody id="table-body"></tbody>
        </table>


        <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
        <div class="modal-dialog custom-width">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- Đặt tiêu đề mặc định cho modal -->
                    <h5 class="modal-title" id="editProductModalLabel">Product Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <!-- Phần bên trái hiển thị hình ảnh và input file -->
                        <div class="col-md-4 text-center">
                            <div class="mb-3">
                                <img id="productImage"  alt="Product Image" class="img-fluid mb-3" style="width: 100%; max-width: 150px;">
                                <input type="file" id="file-input" accept=".svg" class="form-control">
                            </div>
                        </div>
                        <!-- Phần bên phải là form nhập liệu -->
                        <div class="col-md-8">
                            <form id="editProductForm">
                                <div class="mb-3">
                                    <label for="productName" class="form-label">Product Name</label>
                                    <input type="text" class="form-control" id="productName">
                                </div>
                                <div class="mb-3">
                                    <label for="productId" class="form-label">Product ID</label>
                                    <input type="text" class="form-control" id="productId">
                                </div>
                                <div class="mb-3">
                                    <label for="sku" class="form-label">SKU</label>
                                    <input type="text" class="form-control" id="sku">
                                </div>
                                <div class="mb-3">
                                    <label for="color" class="form-label">Color</label>
                                    <input type="text" class="form-control" id="color">
                                </div>
                                <div class="mb-3">
                                    <label for="collection" class="form-label">Collection</label>
                                    <input type="text" class="form-control" id="collection">
                                </div>
                                <div class="mb-3">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="text" class="form-control" id="price">
                                </div>
                                <div class="text-end">
                                <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteProductModal" tabindex="-1" aria-labelledby="deleteProductModalLabel" aria-hidden="true">
        <div class="modal-dialog custom-top">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteProductModalLabel">Delete Product?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>You're going to delete this product. Are you sure?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, Keep It.</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Yes, Delete!</button>
                </div>
            </div>
        </div>
    </div>        
    `
    );

    $.get('/pepicase/public/admin/get_products', function(data) {
        let product_data = JSON.parse(data);
        console.log(product_data);
        product_data.forEach(product => 
            {
                product_print(product.Name, product.ID, product.QuantityInStock, product.Image, product.Color_ID, product.Collect_ID, "/TEST/pen.svg", "/TEST/trash.svg", product.Price);
            }
        )
      })
      .fail(function(jqXHR, textStatus, errorThrown) {
        console.log('Something went wrong with the product data from the GET API');
    });

    document.getElementById('addProductBtn').addEventListener('click', function() {
        // Hiển thị modal "Edit Product"
        var addModal = new bootstrap.Modal(document.getElementById('editProductModal'));
        // Đặt tiêu đề cho modal là "Add New Product"
        document.getElementById('editProductModalLabel').textContent = "Add New Product";
        addModal.show();
    });


    document.getElementById('file-input').addEventListener('change', function(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('productImage');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    });
    
    //khi nhấn vào add new product
    
    // Thêm sự kiện khi nhấn vào nút "Add new product" để hiển thị modal với tiêu đề "Add New Product"
    
    
    //khi nhấn vào chỉnh sửa
    document.getElementById('table-body').addEventListener('click', function(e) {
    if (e.target.classList.contains('edit-icon')) {
        const product = JSON.parse(e.target.getAttribute('data-product'));
        // Đặt dữ liệu sản phẩm vào modal "Edit Product"
        document.getElementById('productName').value = product.name;
        document.getElementById('productId').value = product.product_id;
        document.getElementById('sku').value = product.sku;
        document.getElementById('color').value = product.color;
        document.getElementById('collection').value = product.collection;
        document.getElementById('price').value = product.price;
        // Hiển thị modal "Edit Product"
        var editModal = new bootstrap.Modal(document.getElementById('editProductModal'));
        // Đặt tiêu đề cho modal là "Edit Product"
        document.getElementById('editProductModalLabel').textContent = "Edit Product";
        editModal.show();
    }
    });
    
    document.getElementById('editProductForm').addEventListener('submit', function(e) {
        e.preventDefault();
        console.log("Product saved!");
        var modalElement = document.getElementById('editProductModal');
        var modal = bootstrap.Modal.getInstance(modalElement);
        modal.hide();
    });
    
    //delete
    document.getElementById('table-body').addEventListener('click', function(e) {
        if (e.target.classList.contains('delete-icon')) {
        const product = JSON.parse(e.target.getAttribute('data-product'));
        // Hiển thị modal xác nhận xóa
        var deleteModal = new bootstrap.Modal(document.getElementById('deleteProductModal'));
        deleteModal.show();
        // Thêm sự kiện cho nút Yes, Delete!
        document.getElementById('confirmDeleteBtn').onclick = function() {
        // Xử lý xóa sản phẩm ở đây
        console.log("Product deleted:", product);
        // Ẩn modal sau khi xóa
        deleteModal.hide();
    }
    }
    });    
}

function product_print(name, product_id, sku, pathing, color, collection, pathing_pen, pathing_trash, price) {
    var block = document.createElement("tr");
    block.className = "lexend";
    block.style = "width: 90%; height: fit-content; padding: 0; margin: 0; margin-top: 5vh;";
    block.innerHTML = `
        <td style = "border: 2px solid black;">
            <div class="d-flex align-items-center">
                <div class="image-container">
                    <img style="height:90%; width:auto" src="${pathing}" alt="">
                </div>
                <div class="lexend" style = "width: fit-content; font-size:20px; font-weight:400; margin-left:10px; border: 2px solid black;"><strong>${name}</strong></div>
            </div>
        </td>
        <td style="text-align:center;vertical-align: middle;">${product_id}</td>
        <td style="text-align:center;vertical-align: middle;">${sku}</td>
        <td style="text-align:center;vertical-align: middle;">${color}</td>
        <td style="text-align:center;vertical-align: middle;">${collection}</td>
        <td style="text-align:center;vertical-align: middle;">${price}$</td>
        <td style="vertical-align: middle;">
            <div class="d-flex justify-content-center">
                <img class="edit-icon" style="cursor:pointer; margin-right:10px" src="${pathing_pen}" data-bs-toggle="modal" data-bs-target="#editProductModal" data-product='{"name": "${name}", "product_id": "${product_id}", "sku": "${sku}", "color": "${color}", "collection": "${collection}", "price": "${price}"}'>
                <img class="delete-icon" style="cursor:pointer;" src="${pathing_trash}" data-bs-toggle="delete-modal" data-bs-target="#deleteProductModalLabel" data-product='{"name": "${name}", "product_id": "${product_id}", "sku": "${sku}", "color": "${color}", "collection": "${collection}", "price": "${price}"}'>
            </div>
        </td>
    `;
    document.getElementById('table-body').appendChild(block);
}

//test thử

//in ảnh

//////// FUNCTION CHO PRODUCT
