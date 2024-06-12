<?php include(APPPATH.'views/components/admin-sidebar.php'); ?>

    <div id = "content" style="min-height: 100vh; width: 80vw; margin-left: 2vw;" class = "active-page">
        <h3 style="margin-top:30px; font-family:'Lexend'">PRODUCT</h3>
        <hr>
        <button type="button" class="btn btn-warning" id="addProductBtn" data-bs-toggle="modal">+ Add new product</button>        
        <br><br>
        <div style = "width: 90%;">
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
        </div>

<!--POP UP PRODUCT-->
        <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
        <div class="modal-dialog custom-width">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- Đặt tiêu đề mặc định cho modal -->
                    <h5 class="modal-title" id="editProductModalLabel">Product Editting</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <!-- Phần bên trái hiển thị hình ảnh và input file -->
                        <div class="col-md-4 text-center">
                            <div class="mb-3">
                                <img id="productImage"  alt="Product Image" class="img-fluid mb-3" style="width: 100%; height: auto;">
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

    <div class="delete-modal fade" id="deleteProductModal" tabindex="-1" aria-labelledby="deleteProductModalLabel" aria-hidden="true">
        <div class="modal-dialog custom-top">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteProductModalLabel">Delete Product?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="delete-modal" aria-label="Close"></button>
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

    </div>
<!--POP UP PRODUCT-->

</div>



    
    <script src = "/pepicase/public/js/jquery.js"></script>
    <script src = "/pepicase/public/js/admin.js"></script>
</body>
</html>

