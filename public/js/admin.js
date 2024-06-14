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
            initiate_order_page();
        }
    }
});

function clearContent()
{
    $('#content').empty();
}
//////// SIDEBAR / CONTENT CHUNG



function initiate_order_page()
{
    $('#content').html(
    `
    <h3 style="margin-top:30px; font-family:'Lexend'">ONGOING ORDERS</h3>
    <hr>
    <div class="container mt-5">
        <table class="order-table order-table-bordered lexend">
            <thead class="order-thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Email</th>
                    <th>Method</th>
                    <th>Date</th>
                    <th>Total</th>
                    <th>Payment</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id = "order-content">
            </tbody>
        </table>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document" style="max-width: 80vw; margin-top: 9vh; max-height: 150vh;">
        <div class="modal-content">
          <div class="modal-body">
            
          </div>
        </div>
      </div>
    </div>


    `
    );

    $.get('/pepicase/public/admin/get_delivery', function(data) {
        let delivery_data = JSON.parse(data);
        console.log(delivery_data);
        delivery_data.forEach(delivery => 
            {
                order_print(delivery.Invoice_ID, delivery.Customer, delivery.Email, delivery.Method, delivery.Date, 
                delivery.Total, delivery.Payment, delivery.Status, delivery.Phone, delivery.Country, delivery.Address, delivery.Customer);
            }
        )
      })
    .fail(function(jqXHR, textStatus, errorThrown) {
        console.log('Something went wrong with the product data from the GET API');
    });

    function order_print(invoice_id, customer, email, shipping_method, date, total, payment_method, status, phone, country, address, customer) {
        var row = $('<tr>');
        $('<td>').text(invoice_id).appendTo(row);
        $('<td>').text(customer).appendTo(row);
        $('<td>').text(email).appendTo(row);
        $('<td>').text(shipping_method).appendTo(row);
        $('<td>').text(date).appendTo(row);
        $('<td>').text('$' + Number(total).toFixed(2)).appendTo(row);
        $('<td>').text(payment_method).appendTo(row);

        var statusDropdown = $('<select>').addClass('status-dropdown').addClass('status-' + status.toLowerCase()).attr('data-invoice-id', invoice_id);
        $('<option>').val(-1).text('Cancelled').appendTo(statusDropdown);
        $('<option>').val(0).text('Pending').appendTo(statusDropdown);
        $('<option>').val(1).text('Shipping').appendTo(statusDropdown);
        $('<option>').val(2).text('Delivered').appendTo(statusDropdown);

        statusDropdown.val(status);

        $('<td>').append(statusDropdown).appendTo(row);
        var eyeIcon = $('<td>').html('<img src="/pepicase/public/pics/eye.svg" alt="View Details">');
        eyeIcon.appendTo(row);

        $('#order-content').append(row);
        updateDropdownBackground(statusDropdown);

        statusDropdown.on('change', function() {
            var dropdown = $(this);
            updateDropdownBackground(dropdown);
    
            var invoiceId = dropdown.data('invoice-id');
            var newStatus = dropdown.val();
    
            $.ajax({
                url: 'http://localhost/pepicase/public/admin/set_delivery_status',
                type: 'POST',
                data: {
                    invoice_id: invoiceId,
                    status: newStatus
                },
                success: function(response) {
                    if (response.success) {
                        alert('Status updated successfully');
                        curr_status = newStatus;
                    } else {
                        alert('Failed to update status');
                    }
                },
                error: function(xhr, status, error) {
                    alert('An error occurred while updating the status: ' + xhr.responseText);
                }
            });
        })


        var curr_status;
        eyeIcon.on('click', function() {
            $.ajax({
              url: '/pepicase/public/admin/get_delivery_status',
              type: 'POST',
              data: {
                  invoice_id: invoice_id,
              },
              success: function(response) {
                curr_status = parseInt(response);
                var modalBody = $('.modal-body');
    
                var status_string, popupStatusClass;
                if(curr_status == 0) 
                {
                    status_string = 'Pending';
                    popupStatusClass = 'status-pending';
                }
                if(curr_status == 1)
                {
                    status_string = 'Shipping';
                    popupStatusClass = 'status-shipping';
                }
                if(curr_status == 2)
                {
                    status_string = 'Delivered';
                    popupStatusClass = 'status-delivered';
                }
                if(curr_status == -1)
                {
                    status_string = 'Cancelled';
                    popupStatusClass = 'status-cancelled'
                }
                // Add content to the modal
                modalBody.html
                (
                `
          <div style="margin-top: 1%;">
            <div class="row" style="display: flex; margin-left: 2%; width: fit-content;">
              <div style="width: 28vw; margin-top: 20px;">
                <div class="rounded border border-3">
                  <div style="display: flex; margin-left: 15px; margin-top: 10px;">
                    <b style="font-family: 'Lexend'; font-size: 22px;">Order #${invoice_id}</b>
                    <div class = "${popupStatusClass}" style="border-radius: 10px; border: 1px; margin-left: 5px; padding-left: 10px; padding-right: 10px; padding-top: 3px;"><b>${status_string}</b></div>
                  </div>
    
                  <ul class="nav flex-column">
                    <li class="nav-item" style="display: flex; padding-left: 0px; width: auto; margin-top: 10px;">
                      <div class="rounded-circle">
                        <img style="width: 23px; height: 30px; margin-top: 3px;" src="/pepicase/public/pics/time.svg" alt="">
                      </div>
                      <b style="margin-left: 15px; font-family: 'Lexend';">Added</b>
                      <text style="margin-left: 120px; font-family: 'Lexend'; margin-right: 10px;">${date}</text>
                    </li>
      
                    <li class="nav-item" style="display: flex; padding-left: 0px; width: auto; margin-top: 8px;">
                      <div class="rounded-circle">
                        <img style="width: 23px; height: 33px; margin-top: 3px;" src="/pepicase/public/pics/payment.svg" alt="">
                      </div>
                      <b style="margin-left: 15px; font-family: 'Lexend';">Payment Method</b>
                      <text style="margin-left: 35px; font-family: Lexend;">${payment_method}</text>
                    </li>
      
                    <li class="nav-item" style="display: flex; padding-left: 0px; width: auto; margin-top: 8px;">
                      <div class="rounded-circle">
                        <img style="width: 23px; height: 33px; margin-left: 3px; margin-top: 3px;" src="/pepicase/public/pics/delivery.svg" alt="">  
                      </div>
                      <b style="margin-left: 15px; font-family: 'Lexend';">Shipping Method</b>
                      <text style="margin-left: 35px; font-family: Lexend; margin-right: 15px;">${shipping_method}</text>
                    </li>
                  </ul>
                </div>
              </div>
    
              <div style="width: 25vw; margin-top: 20px;">
                <div class="rounded border border-3">
                  <b style="font-family: 'Lexend'; font-size: 22px; display: flex; margin-left: 15px; margin-top: 10px;">Customer</b>
    
                  <ul class="nav flex-column">
                    <li class="nav-item" style="display: flex; padding-left: 0px; width: auto; margin-top: 10px;">
                      <div class="rounded-circle">
                        <img style="width: 22px; height: 30px; margin-top: 3px;" src="/pepicase/public/pics/customer.svg" alt="">
                      </div>
                      <b style="margin-left: 15px; font-family: 'Lexend';">Customer</b>
                      <text style="margin-left: 25px; font-family: 'Lexend'; margin-right: 10px;">${customer}</text>
                    </li>
      
                    <li class="nav-item" style="display: flex; padding-left: 0px; width: auto; margin-top: 8px;">
                      <div class="rounded-circle">
                        <img style="width: 26px; height: 36px;" src="/pepicase/public/pics/mail.svg" alt="">
                      </div>
                      <b style="margin-left: 15px; font-family: 'Lexend';">Email</b>
                      <text style="margin-left: 40px; font-family: Lexend; margin-right: 18px;">${email}</text>
                    </li>
      
                    <li class="nav-item" style="display: flex; padding-left: 0px; width: auto; margin-top: 8px;">
                      <div class="rounded-circle">
                        <img style="width: 26px; height: 25px; margin-left: 0.5px; margin-top: 7px;" src="/pepicase/public/pics/phone.svg" alt="">  
                      </div>
                      <b style="margin-left: 15px; font-family: 'Lexend';">Phone</b>
                      <text style="margin-left: 55px; font-family: Lexend;">${phone}</text>
                    </li>
                  </ul>
                </div>
              </div>
    
              <div class="col" style="width: 27vw; margin-top: 20px;">
                <div class="rounded border border-3">
                  <b style="font-family: 'Lexend'; font-size: 22px; display: flex; margin-left: 15px; margin-top: 10px;">Address</b>
    
                  <ul class="nav flex-column" style="margin-bottom: 1.5%;">
                    <li class="nav-item" style="display: flex; padding-left: 0px; margin-top: 10px;">
                      <div class="rounded-circle" style="height:fit-content;">
                        <img style="width: 26px; height: 36px;" src="/pepicase/public/pics/address.svg" alt="">
                      </div>
                      <b style="margin-left: 15px; font-family: 'Lexend';">Billing</b>
                      <text style="margin-left: 3%; font-family: 'Lexend';">${address}</text>
                    </li>
      
                    <li class="nav-item" style="display: flex; padding-left: 0px; margin-top: 8px;">
                      <div class="rounded-circle">
                        <img style="width: 26px; height: 36px;" src="/pepicase/public/pics/address.svg" alt="">
                      </div>
                      <b style="margin-left: 15px; font-family: 'Lexend';">Shipping</b>
                      <text style="margin-left: 3%; font-family: Lexend;">${country}</text>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
    
            <div style="margin-left: 3%; margin-top: 4%; display: flex; justify-content: start; width: auto;">
              <div class="rounded border border-3" style="margin-top: 20px; width: 90%; display: block; justify-content: center; height: fit-content;">
                <div style="display: flex; margin-left: 15px; margin-top: 10px;">
                  <b style="font-family: 'Lexend'; font-size: 22px;">Order List</b>
                  <div id = "total_num" style="border-radius: 10px; border: 1px; background-color: rgb(224, 252, 191); margin-left: 5px; padding-left: 13px; padding-right: 13px; padding-top: 2px;"><b style="color: rgba(73, 131, 2, 0.752);">2 Products</div>
                </div>
    
                <table class="table" style="background-color: white; margin-top: 3%; margin-bottom: 0%;">
                  <thead class="table-light">
                    <tr>
                      <th style="width: 100px;">Product</th>
                      <th>ID</th>
                      <th>Size</th>
                      <th>QTY</th>
                      <th>Price</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody id = "order-popup">
                  </tbody>
                </table>
              </div>
            </div>
          </div>
                `
                );
                $.ajax({
                  url: 'http://localhost/pepicase/public/admin/get_invoice_details',
                  type: 'POST',
                  data: {
                      invoice_id: invoice_id,
                  },
                  success: function(response) {
                      var invoice_details = JSON.parse(response);
                      invoice_details.forEach(detail =>{
                        var new_row = $('<tr>');
                        new_row.html(
                          `
                          <td style = "text-align: center;">
                            <div style="display: flex;">
                              <div class="rounded" style="background-color: #b0adad; width: 40px; height: 40px; display: flex; justify-content: center;">
                                <img src="${detail.Image}" alt="">
                              </div>
                              <text style="margin-left: 2%; margin-top: 2%;">${detail.Name}</text>
                            </div>
                          </td>
                          <td style="color: blue; text-align: center;">302011</th>
                          <td style="color: #667085; text-align: center;">${detail.Size}</th>
                          <td style="color: #667085; text-align: center;">${detail.Quantity}</th>
                          <td style="color: #667085; text-align: center;">${detail.Price}$</th>
                          <td style="color: #667085; text-align: center;">${parseInt(detail.Quantity) * parseFloat(detail.Price)}$</th>
                          `)
                        $('#order-popup').append(new_row);
                      })
                      var modal = $('.modal');
                      modal.modal('show');
                  },
                  error: function(xhr, status, error) {
                      alert('An error occurred while updating the status: ' + xhr.responseText);
                  }
                });
              },
              error: function(xhr, status, error) {
                console.log(error);
              }
            });
            // Create the modal element
        });
    
    }

    function updateDropdownBackground(element) {
        // Remove all status classes
        element.removeClass('status-pending status-shipping status-delivered status-cancelled');

        // Add the class based on the selected value
        var status = element.val();
        if (status == 0) {
            element.addClass('status-pending');
        } else if (status == 1) {
            element.addClass('status-shipping');
        } else if (status == 2) {
            element.addClass('status-delivered');
        } else if (status == -1) {
            element.addClass('status-cancelled');
        }
    }
}









//////// FUNCTIONS / LISTENERS CHO PRODUCT

function initiate_product_page()
{
    $('#content').html(
    `
            <h3 style="margin-top:30px; font-family:'Lexend'">PRODUCT</h3>
            <hr>
            <!-- <button type="button" class="btn btn-warning">+ Add new product</button> -->
            <button type="button" class="btn btn-warning" id="addProductBtn" data-bs-toggle="modal">+ Add new product</button>
            <div id = "product_alert_div"></div>
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
        </div>
    </div>
    <!-- form edit product -->
    <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
        <div class="modal-dialog custom-width">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"  id="editProductModalLabel">Edit Product</h5>
                    <button type="button" class="btn-close" id="btn-close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <!-- Phần bên trái hiển thị hình ảnh và input file -->
                        <div class="col-md-4 text-center">
                            <div class="image-border mb-3">
                                <img id="productImage" alt="Product Image" class="img-fluid" style="width: 100%;">
                            </div>
                            <div class="file-input-container mb-3">
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
                                    <input type="text" class="form-control" id="productId" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="sku" class="form-label">SKU</label>
                                    <input type="text" class="form-control" id="sku">
                                </div>
                                <div class="mb-3">
                                    <label for="color" class="form-label">Color ID</label>
                                    <input type="text" class="form-control" id="color">
                                </div>
                                <div class="mb-3">
                                    <label for="collection" class="form-label">Collection ID</label>
                                    <input type="text" class="form-control" id="collection">
                                </div>
                                <div class="mb-3">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="text" class="form-control" id="price">
                                </div>
                                <div class ="mb-3" id = "edit-alert"></div>
                                <div class="text-end">
                                  <button type="submit" class="btn btn-primary" id="button-save">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- form add new product -->
    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog custom-width">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductModalLabel">Add New Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4 text-center">
                        <div class="image-border mb-3">
                            <img id="newProductImage" alt="Product Image" class="img-fluid mb-3" style="width: 100%; max-width: 150px;">
                        </div>
                        <div class="file-input-container mb-3">
                            <input type="file" name = "new_add_file" id="new-file-input" accept=".svg" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <form id="addProductForm">
                            <div class="mb-3">
                                <label for="newProductName" class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="newProductName">
                            </div>
                            <div class="mb-3">
                                <label for="newSku" class="form-label">SKU</label>
                                <input type="text" class="form-control" id="newSku">
                            </div>
                            <div class="mb-3">
                                <label for="newColor" class="form-label">Color ID</label>
                                <input type="text" class="form-control" id="newColor">
                            </div>
                            <div class="mb-3">
                                <label for="newCollection" class="form-label">Collection ID</label>
                                <input type="text" class="form-control" id="newCollection">
                            </div>
                            <div class="mb-3">
                                <label for="newPrice" class="form-label">Price</label>
                                <input type="text" class="form-control" id="newPrice">
                            </div>
                            <div class ="mb-3" id = "add-alert"></div>
                            <div class="text-end">
                              <button type="submit" class="btn btn-primary" id="button-add">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- form_delete -->
    <div class="modal fade" id="deleteProductModal" tabindex="-1" aria-labelledby="deleteProductModalLabel" aria-hidden="true">
        <div class="modal-dialog custom-top">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title-delete" id="deleteProductModalLabel">Delete Product?</h5>
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
                product_print(product.Name, product.ID, product.QuantityInStock, product.Image, product.Color_ID, product.Collect_ID, "/pepicase/public/pics/edit_pen.svg", "/pepicase/public/pics/trashbin.svg", product.Price, product.IsDeleted);
            }
        )
      })
      .fail(function(jqXHR, textStatus, errorThrown) {
        console.log('Something went wrong with the product data from the GET API');
    });

    document.getElementById('file-input').addEventListener('change', function(event) {
        selectedFiles = event.target.files;
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('productImage');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    });

     //in ảnh bên add new product
     document.getElementById('new-file-input').addEventListener('change', function(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('newProductImage');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    });
    
    //delete product
    document.getElementById('table-body').addEventListener('click', function(e) {
        if (e.target.classList.contains('delete-icon')) {
        // Lấy thông tin sản phẩm cần xóa từ thuộc tính data-product của biểu tượng trash
        const product = JSON.parse(e.target.getAttribute('data-product'));
        // Hiển thị modal xác nhận xóa
        var deleteModal = new bootstrap.Modal(document.getElementById('deleteProductModal'));
        deleteModal.show();
        // Gán sự kiện cho nút "Yes, Delete!"
        document.getElementById('confirmDeleteBtn').onclick = function() {
            // Thực hiện xóa sản phẩm ở đây
            $.ajax({
                url: 'http://localhost/pepicase/public/admin/delete_product',
                type: 'POST',
                data: {
                    product_id: product.product_id,
                },
                success: function(response) {
                    clearContent();
                    initiate_product_page();
                    if (response == 'success') {
                        $('#product_alert_div').html('<strong>Successfully removed product of ID: ' + product.product_id + '</strong>').css('color','green');
                    } else {
                        alert('An error has occurred.');
                    }
                    $(window).scrollTop(0);
                },
                error: function(xhr, status, error) {
                    $('#product_alert_div').html('<strong>Problem encountered while removing product of ID: ' + product.product_id + '</strong>').css('color','red');
                    $(window).scrollTop(0);
                    console.log(error);
                }
            });
            deleteModal.hide();}
        }
    });

    // Khi nhấn vào nút "Add New Product"
    document.getElementById('addProductBtn').addEventListener('click', function() {
       // Hiển thị modal "Add new Product"
        var addModal = new bootstrap.Modal(document.getElementById('addProductModal'));
        addModal.show();
        $('#addProductForm').on('submit', function(e) {
            e.preventDefault();
            $('#add-alert').text('');
            const productName = $('#newProductName').val();
            const sku = $('#newSku').val();
            const color = $('#newColor').val();
            const collection = $('#newCollection').val();
            const price = $('#newPrice').val();
            const fileInput = $('#new-file-input');
            const check = validate_form(productName, sku, color, collection, price);
            
            if (check === 'none') {
                const file = fileInput[0].files[0];
                if (!file) {
                $('#add-alert').html('<strong>No file inputted!</strong>').css('color', 'red');
                return;
                }

                const formData = new FormData();
                formData.append('name', productName);
                formData.append('sku', sku);
                formData.append('color', color);
                formData.append('collection', collection);
                formData.append('price', price);
                formData.append('file', file);

                $.ajax({
                url: 'http://localhost/pepicase/public/admin/add_product',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) 
                {
                    if(response == 'Insertion failure!' || response == 'Item name is duplicated!' || response == 'File is invalid!')
                    {
                        $('#add-alert').html('<strong>' + response + '</strong>').css('color', 'red');
                    }
                    else
                    {
                        addModal.hide();
                        clearContent();
                        initiate_product_page();
                        $('#product_alert_div').html('<strong>' + response + '</strong>').css('color','green');
                    }
                },
                error: function(xhr, status, error) {
                    $('#add-alert').html('<strong>Something went wrong...</strong>').css('color', 'red');
                }
                });
            } 
            else 
            {
                $('#add-alert').html('<strong>' + check + '</strong>').css('color', 'red');
            }
        });
    });
    
    var editModal = new bootstrap.Modal(document.getElementById('editProductModal'));
    // Khi nhấn vào chỉnh sửa
    $('#table-body').on('click', function(e)
    {
        if (e.target.classList.contains('edit-icon')) 
        {
            const product = JSON.parse(e.target.getAttribute('data-product'));
            $('#edit-alert').text('');
            $('#productImage').attr('src', product.src);
            $('#productName').val(product.name);
            $('#productId').val(product.product_id);
            $('#sku').val(product.sku);
            $('#color').val(product.color);
            $('#collection').val(product.collection);
            $('#price').val(product.price);
            // Hiển thị modal "Edit Product"
            //var editModal = new bootstrap.Modal(document.getElementById('editProductModal'));
            editModal.show();
            $('#editProductForm').on('submit', function(e) {
                e.preventDefault();
                $('#edit-alert').text('');
                const productName = $('#productName').val();
                const productId = $('#productId').val();
                const sku = $('#sku').val();
                const color = $('#color').val();
                const collection = $('#collection').val();
                const price = $('#price').val();
                var check = validate_form(productName, sku, color, collection, price)
                if(check == 'none')
                {

                    $('#edit-alert').html('<strong>Saved successfully!</strong>').css('color','green');
                }
                else $('#edit-alert').html('<strong>'+check+'</strong>').css('color','red');
                
                var modalElement = document.getElementById('editProductModal');
                var modal = bootstrap.Modal.getInstance(modalElement);
            });
        }
    });

    document.getElementById('btn-close').addEventListener('click', function() {
        editModal.hide();
    });

    function validate_form(form_name, form_sku, form_color, form_collection, form_price) 
    {
        let check = 'none';
        if (form_name.trim() === '') {
            check = "Name can't be empty!";
            return check;
        }
        const skuRegex = /^\d+$/;
        if (form_sku.trim() === '' || !skuRegex.test(form_sku)) {
          check = "SKU can only contain numbers and cannot be zero!";
          return check;
        }
      
        // Validate color
        const colorRegex = /^[1-6]$/;
        if (form_color.trim() === '' || !colorRegex.test(form_color)) {
            check = 'Color ID must be a number SINGLE from 1 to 6!';
            return check;
        }

        // Validate collection
        const collectionRegex = /^[1-4]$/;
        if (form_collection.trim() === '' || !collectionRegex.test(form_collection)) {
            check = 'Collection ID must be a SINGLE number from 1 to 4!';
            return check;
        }
        
        if (form_price.trim() === '' || isNaN(parseFloat(form_price))) {
            check = 'Price must be a number or float!';
        }
        return check;
    }

    //khi nhấn save or add

    function product_print(name, product_id, sku, pathing, color, collection, pathing_pen, pathing_trash, price, isDeleted) {
        var block = document.createElement("tr");
        if(isDeleted == 1)
        {
            product_id = 'DELETED';
            sku = 'DELETED';
            price = 'DELETED';
        }
        block.className = "lexend";
        block.style = "width: 100%; height: fit-content; padding: 0; margin: 0; margin-top: 5vh;";
        if(isDeleted == 0)
        {
            block.innerHTML = `
            <td>
                <div class="d-flex align-items-center">
                    <div class="image-container">
                        <img style="height:98%; width:auto" src="${pathing}" alt="">
                    </div>
                    <div class="lexend" style="font-size:20px; font-weight:400; margin-left:10px;">${name}</div>
                </div>
            </td>
            <td style="text-align:center;vertical-align: middle; color:#667085">${product_id}</td>
            <td style="text-align:center;vertical-align: middle; color:#667085">${sku}</td>
            <td style="text-align:center;vertical-align: middle; color:#667085">${color}</td>
            <td style="text-align:center;vertical-align: middle; color:#667085">${collection}</td>
            <td style="text-align:center;vertical-align: middle; color:#667085">${price}$</td>
            <td style="vertical-align: middle;">
                <div class="d-flex justify-content-center">
                    <img class="edit-icon" id="edit-icon" style="cursor:pointer; margin-right:10px" src="${pathing_pen}"  data-bs-toggle="modal" data-bs-target="#editProductModal" data-product='{"src": "${pathing}","name": "${name}", "product_id": "${product_id}", "sku": "${sku}", "color": "${color}", "collection": "${collection}", "price": "${price}"}'>
                    <img class="delete-icon" id="delete-icon" style="cursor:pointer;" src="${pathing_trash}" data-product='{"src": "${pathing}","name": "${name}", "product_id": "${product_id}", "sku": "${sku}", "color": "${color}", "collection": "${collection}", "price": "${price}"}'>
                </div>
            </td>
        `;
        }
        else if(isDeleted == 1)
        {
            block.innerHTML = `
            <td>
                <div class="d-flex align-items-center">
                    <div class="image-container">
                        <img style="height:98%; width:auto" src="${pathing}" alt="">
                    </div>
                    <div class="lexend" style="font-size:20px; font-weight:400; margin-left:10px;">${name}</div>
                </div>
            </td>
            <td style="text-align:center;vertical-align: middle; color:red;">${product_id}</td>
            <td style="text-align:center;vertical-align: middle; color:red;">${sku}</td>
            <td style="text-align:center;vertical-align: middle; color:#667085;">${color}</td>
            <td style="text-align:center;vertical-align: middle; color:#667085;">${collection}</td>
            <td style="text-align:center;vertical-align: middle; color:red;">${price}</td>
            <td style="vertical-align: middle;">
            </td>
        `;
        }
        document.getElementById('table-body').appendChild(block);
    }

}

//test thử

//in ảnh

//////// FUNCTION CHO PRODUCT











//////// FUNCTION CHO ADMINS


function printAdmins(email, phone) 
{
  const adminCount = email.length;
  const adminsPerRow = 3;
  const rows = Math.ceil(adminCount / adminsPerRow);

  var block = document.createElement("div");
  block.className = "inter";
  block.style = "width: 100%;height:fit-content; padding: 0; margin: 0; margin-top: 5vh;";

  // Create the card layout
  var content = "";
  for (let i = 0; i < rows; i++) {
      content += `<div class="admin-row">`;
      for (let j = i * adminsPerRow; j < (i + 1) * adminsPerRow && j < adminCount; j++) 
        {
          content += `
<div class="admincard"style=" margin-left: 8%;  margin-right: 8%">

      <section id="admin-details">
          <img src="/pepicase/public/pics/Contact_Details.svg" alt="contact details">
          <span class="overlay_details"></span>

          <div class="admincard">
  
             <div class="container d-flex align-items-center justify-content-center">
                <div class="left">  
                  <div class="img">
                  <img src="/pepicase/public/pics/admin.svg" alt=""> </div>
  
                  <div>Admin</div>
                  <div>${email[j]}</div>
                  </div>
                 <div class="item-details">
                    <div style="font-size:20px; font-weight:600;">Contact Details</div><br>
                    <div style="font-size:14px; font-weight:600;">Email Address</div>
                    <div style="font-size:14px; font-weight:200;">${email[j]}</div>
                    <hr style="margin-top: 1px;">
                    <div style="font-size:14px; font-weight:600;">Phone Number</div>
                    <div style="font-size:14px; font-weight:200;">${phone[j]}</div>
                    <hr style="margin-top: 1px;">
                    <div style="font-size:14px; font-weight:600;">Password</div>
                    <div style="font-size:14px; font-weight:200;">${password[j]}</div>
                    <hr style="margin-top: 1px;">

                    <div class="button">
                    <button class="btn-save">Save</button>
                    </div>
                  </div>
                 </div>
              </div>        
          </section>

      <section id="admin-delete">
      <img class="trash" src="/pepicase/public/pics/delete.svg" alt="delete">
      <span class="overlay_delete"></span>
      <div class="edit-box">
          <img src="./icon/warning.svg" id="warning" alt="">
          <h2>Delete Contact?</h2>
          <h3>You're going to delete this contact. Are you sure?</h3>

      <div class="buttons">
          <button class="no">No, Keep It.</button>
          <button class="yes">Yes, Delete!</button>
        </div>
  
      </div>
     </section>

      <div class="container">
      <div class="img-container">
          <img src="/pepicase/public/pics/admin.svg" alt=""> </div>
      <div class="item-details">
          <div class="inter" style="font-size:14px; font-weight:400;">Admin</div>
          <div class="inter" style="font-size:14px; font-weight:300"><img src="/pepicase/public/pics/sms.svg" alt="sms-icon">${email[j]}</a></div>
          <div class="inter" style="font-size:14px; font-weight:300"><img src="/pepicase/public/pics/call.svg" alt="call-icon">${phone[j]}</a></div>
      </div>
     </div>
  </div>   
`;
    }
    content += `</div>`;
    }
    block.innerHTML = content;
    document.getElementById('admin_div').appendChild(block);

    //link to javascript delete
    const section2 = document.querySelector("admin-delete"),
    overlay1 = document.querySelector(".overlay_delete"),
    trash = document.querySelector(".trash"),
    no = document.querySelector(".no"),
    yes = document.querySelector(".yes");

    trash.addEventListener("click", () => section2.classList.add("active"));
    no.addEventListener("click", () => section2.classList.remove("active"));
    yes.addEventListener("click", () => section2.classList.remove("active"));

    //link to javascript contact detail
    const section1 = document.querySelector("admin-details"),
    overlay2 = document.querySelector(".overlay_details"),
    edit = document.querySelector(".edit"),
    saveBtn = document.querySelector(".btn-save");

    edit.addEventListener("click", () => section1.classList.add("active"));
    saveBtn.addEventListener("click", () => section1.classList.remove("active")); 
}




//////// FUNCTION CHO ADMINS





