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
        if ($('.nav-item.nav_active .title').text() === 'Users') {
            //initiate_product_page();
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
    `
    );

    $.get('/pepicase/public/admin/get_delivery', function(data) {
        let delivery_data = JSON.parse(data);
        console.log(delivery_data);
        delivery_data.forEach(delivery => 
            {
                order_print(delivery.Invoice_ID, delivery.Customer, delivery.Email, delivery.Method, delivery.Date, delivery.Total, delivery.Payment, delivery.Status);
            }
        )
      })
    .fail(function(jqXHR, textStatus, errorThrown) {
        console.log('Something went wrong with the product data from the GET API');
    });

    function order_print(invoice_id, customer, email, shipping_method, date, total, payment_method, status) {
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
                    } else {
                        alert('Failed to update status');
                    }
                },
                error: function(xhr, status, error) {
                    alert('An error occurred while updating the status: ' + xhr.responseText);
                }
            });
        })

        eyeIcon.on('click', function() {
            // Create the modal element
            var modal = $('<div class="modal fade" tabindex="-1" role="dialog">');
            var modalDialog = $('<div class="modal-dialog" role="document">');
            var modalContent = $('<div class="modal-content">');
            var modalBody = $('<div class="modal-body">');
            
            // Add content to the modal
            modalBody.html('<p>This is the popup content</p>');
            modalContent.append(modalBody);
            modalDialog.append(modalContent);
            modal.append(modalDialog);
            
            // Append the modal to the document body
            $('body').append(modal);
            
            // Show the modal
            modal.modal('show');
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
            <div style = "font-size: 25px;" id = "product_alert_div"></div>
            <!-- <button type="button" class="btn btn-warning">+ Add new product</button> -->
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
        </div>
    </div>
    <!-- form edit product -->
    <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
    <div class="modal-dialog custom-width">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                <button type="button" class="btn-close" id="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Phần bên trái hiển thị hình ảnh và input file -->
                    <div class="col-md-4 text-center">
                        <div class="mb-3">
                            <img id="productImage" alt="Product Image" class="img-fluid mb-3" style="width: 100%; max-width: 150px;">
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
                        <div class="mb-3">
                            <img id="newProductImage" alt="Product Image" class="img-fluid mb-3" style="width: 100%; max-width: 150px;">
                            <input type="file" id="new-file-input" accept=".svg" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <form id="addProductForm">
                            <div class="mb-3">
                                <label for="newProductName" class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="newProductName">
                            </div>
                            <div class="mb-3">
                                <label for="newProductId" class="form-label">Product ID</label>
                                <input type="text" class="form-control" id="newProductId">
                            </div>
                            <div class="mb-3">
                                <label for="newSku" class="form-label">SKU</label>
                                <input type="text" class="form-control" id="newSku">
                            </div>
                            <div class="mb-3">
                                <label for="newColor" class="form-label">Color</label>
                                <input type="text" class="form-control" id="newColor">
                            </div>
                            <div class="mb-3">
                                <label for="newCollection" class="form-label">Collection</label>
                                <input type="text" class="form-control" id="newCollection">
                            </div>
                            <div class="mb-3">
                                <label for="newPrice" class="form-label">Price</label>
                                <input type="text" class="form-control" id="newPrice">
                            </div>
                            <div class="text-end">
                              <button type="submit" class="btn btn-primary">Add</button>
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
    
    });     

    // Khi nhấn vào chỉnh sửa
    document.getElementById('table-body').addEventListener('click', function(e) {
    if (e.target.classList.contains('edit-icon')) {
    const product = JSON.parse(e.target.getAttribute('data-product'));
    document.getElementById('productImage').src=product.src;
    document.getElementById('productName').value = product.name;
    document.getElementById('productId').value = product.product_id;
    document.getElementById('sku').value = product.sku;
    document.getElementById('color').value = product.color;
    document.getElementById('collection').value = product.collection;
    document.getElementById('price').value = product.price;
    // Hiển thị modal "Edit Product"
    //var editModal = new bootstrap.Modal(document.getElementById('editProductModal'));
    editModal.show();
    }
    });

    document.getElementById('btn-close').addEventListener('click', function() {
        editModal.hide();
    });

    //khi nhấn save or add
    document.getElementById('editProductForm').addEventListener('submit', function(e) {
        e.preventDefault();
        console.log("Product saved!");
        var modalElement = document.getElementById('editProductModal');
        var modal = bootstrap.Modal.getInstance(modalElement);
        modal.hide();
    });

    document.getElementById('addProductForm').addEventListener('submit', function(e) {
        e.preventDefault();
        console.log("New product added!");
        var modalElement = document.getElementById('addProductModal');
        var modal = bootstrap.Modal.getInstance(modalElement);
        modal.hide();
    });

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





