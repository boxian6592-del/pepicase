var ship = 20;
var discount_ratio = 0;
var discounted = total_price * discount_ratio;
var total = (total_price - discounted + ship).toFixed(2);
var ship_option = 0;
var voucher_id;
var protocol = 0;
var vnpay_protocol = 0;

$(document).ready(function() {
    var creditCardBtn = $('#credit-card-btn');
    var codBtn = $('#cod-btn');
    var momoBtn = $('#momo-btn');
    var cardDetails = $('#card-details');
    var cardNumber = $('#card-number');
    var cardExpiryCvc = $('#card-expiry-cvc');
    // var saveCardContainer = $('#save-card-container');

    // Function to hide card details
    function hideCardDetails() {
        cardDetails.addClass('hidden');
        cardNumber.addClass('hidden');
        cardExpiryCvc.addClass('hidden');
        // saveCardContainer.addClass('hidden');
    }

    function removeActiveClass() {
        creditCardBtn.removeClass('active');
        codBtn.removeClass('active');
        momoBtn.removeClass('active');
    }

    hideCardDetails();

    creditCardBtn.click(function() {
        removeActiveClass();
        creditCardBtn.addClass('active');
        cardDetails.removeClass('hidden');
        cardNumber.removeClass('hidden');
        cardExpiryCvc.removeClass('hidden');
        protocol = 'CC';
        console.log(protocol);
    });

    codBtn.click(function() {
        removeActiveClass();
        codBtn.addClass('active');
        hideCardDetails();
        protocol = 'Cash';
        console.log(protocol);
    });

    momoBtn.click(function() {
        removeActiveClass();
        momoBtn.addClass('active');
        hideCardDetails();
        protocol = 'Momo';
        console.log(protocol);
    });

    cart_items.forEach(item =>
    {
        print(item.Quantity, item.Name, item.Price, item.Image,item.Size);
    })

    $('#Total').text((total) + '$');
    
    $('#express-ship').on('change', function() {
        if ($(this).is(':checked')) {
          if(ship !== 20 || ship == 0)
            {
                ship = 20;
                ship_option = "express";
                total = (total_price - discounted + ship).toFixed(2);
                $('#shipping').text(ship + '$');
                $('#Total').text(total + '$');
            }
        }
      });
    
      // Event listener for the "Standard Shipping" radio button
      $('#standard-ship').on('change', function() {
        if ($(this).is(':checked')) {
          if(ship !== 10 || ship == 0)
            {
                ship = 10;
                ship_option = "standard";
                total = (total_price - discounted + ship).toFixed(2);
                $('#shipping').text(ship + '$');
                $('#Total').text(total + '$');
            }
        }
      });
});


function print(quantity, name, price, pathing, size) 
{
    var block = document.createElement("div");
    block.className = "lexend";
    block.style = "width: 100%;height:fit-content; padding: 0; margin: 0; margin-top: 5vh;"
    // Thêm HTML cho mỗi sản phẩm trong mảng products
    block.innerHTML = `
            <div class="cart-item">
                <div class="image-container">
                    <img src="${pathing}" alt="${size}">
                </div>
                <div class="item-details">
                    <div class = "lexend" style="font-size:20px; font-weight:600;">${name}</div>
                    <div class = "lexend" >Model: ${size}</div>
                    <div>Quantity: ${quantity} || <strong>Price of each: ${price}$ </strong></div>
                    <div class = "lexend-tera" style="font-size:20px; font-weight:600;">${quantity*price}$</p>
                </div>
            </div>
        `;
    document.getElementById('item_div').appendChild(block);
};

$('#apply-discount').click(function() 
{
    var code = $('#discount-code').val();
    console.log(typeof code);

    $.ajax({
        type: "POST",
        url: "http://localhost/pepicase/public/checkout/check_discount",
        data: {
            voucher_code: code
        },
        dataType: 'json', // Expect the response to be in JSON format
        success: function(response) {
            var discount_ratio = (parseFloat(response.discount_value));
            if (discount_ratio == 0) {
                $('#discount_alert').css('color', 'red');
                $('#discount_alert').text('Discount code either expired or is not valid!');

                if($('#discount').html()) $('#discount').html('');
            } else {
                discounted = (total_price * discount_ratio).toFixed(2);
                $('#discount_alert').css('color', 'green');
                $('#discount_alert').text('Discount code worked!');
                $('#discount').html(`
                <div style="width: 30%;"><strong>Discounted:</strong></div>

                <div id ="shipping" class="d-flex flex-row justify-content-end" style ="width:70%;">
                    <strong>${(discounted)}$</strong>
                </div>
                `
                );
                total = (total_price - discounted + ship).toFixed(2);
                $('#Total').text(total + '$');
            }
        },
        error: function(xhr, status, error) {
            var errorMessage;
            if (xhr.responseJSON && xhr.responseJSON.message) {
                // If the server returned a JSON response with a 'message' property, use that
                errorMessage = xhr.responseJSON.message;
            } else {
                // Otherwise, use the status text or the error parameter
                errorMessage = xhr.statusText || error;
            }
            console.error("Error checking discount: ", errorMessage);
        }
    });
});

function infoCheck()
{
    var firstName = $('#fname').val();
    var lastName = $('#lname').val();
    var address = $('#address').val();
    var apartment = $('input[placeholder="Apartment, suite, etc (optional)"]').val();
    var country = $('input[placeholder="Country"]').val();
    var city = $('input[placeholder="City"]').val();
    var zipcode = $('input[placeholder="Zipcode"]').val();
    var phone = $('input[placeholder="Phone"]').val();
    var saveContact = $('#save-contact').is(':checked');

    var error = 'None';
    if (firstName.trim() === '') 
        {
            error = 'PLEASE ENTER YOUR FIRST NAME.';
            return error;
        }
    if (lastName.trim() === '') 
        {
            error = 'PLEASE ENTER YOUR LAST NAME.';
            return error;
        }
    if (address.trim() === '') 
        {
            error = 'PLEASE ENTER YOUR ADDRESS.';
            return error;
        }
    if (country.trim() === '') 
        {
            error = 'PLEASE ENTER YOUR COUNTRY.';
            return error;
        }
    if (city.trim() === '') 
        {
            error = 'PLEASE ENTER YOUR CITY.';
            return error;
        }
    if (zipcode.trim() === '') 
        {
            error = 'PLEASE ENTER YOUR ZIP CODE.';
            return error;
        }
    if (phone.trim() === '') 
        {
            error = 'PLEASE ENTER YOUR TELEPHONE NUMBER';
            return error;
        }
}

$('.vnpay').click(function()
{
    var cur_text = $(this).text();
    if(cur_text == 'QR') vnpay_protocol = 1;
    if(cur_text == 'Thẻ nội địa') vnpay_protocol = 2;
    if(cur_text == 'Thẻ quốc tế (VISA)') vnpay_protocol = 3;
    console.log(vnpay_protocol);
})

$('#buy').click(function()
{   
    if(infoCheck() == 'None')
    {
        if(ship_option == 0)
        {
            $('#detail-alert').text('PLEASE CHOOSE A SHIPPING OPTION!')
        }
        else
        {
            if(protocol == 0)
            {
                $('#detail-alert').text('PLEASE CHOOSE A PAYMENT METHOD!');
            }
            else
            {
                console.log("Price: " + (total_price + ship) +"$");
                console.log("Actual price: " + total + "$ after deducting " + discounted + "$ through vouchers");
                console.log("Payment method: " + protocol);
                console.log("Shipping method: " + ship_option);
                console.log("User ID: " + user);    
            }        
        }        
    }
    else $('#detail-alert').text(infoCheck());

    /*

    if(protocol == "Cash")  // AJAX frame when the protocol's cash;
    {
        $.ajax({
            type: "POST",
            url: "http://localhost/pepicase/public/checkout/add_invoice",
            data: {
                
            },
            dataType: 'json', // Expect the response to be in JSON format
            success: function(response) {
                var discount_ratio = (parseFloat(response.discount_value));
                if (discount_ratio == 0) {
                    $('#discount_alert').css('color', 'red');
                    $('#discount_alert').text('Discount code either expired or is not valid!');
    
                    if($('#discount').html()) $('#discount').html('');
                } else {
                    discounted = (total_price * discount_ratio).toFixed(2);
                    $('#discount_alert').css('color', 'green');
                    $('#discount_alert').text('Discount code worked!');
                    $('#discount').html(`
                    <div style="width: 30%;"><strong>Discounted:</strong></div>
    
                    <div id ="shipping" class="d-flex flex-row justify-content-end" style ="width:70%;">
                        <strong>${(discounted)}$</strong>
                    </div>
                    `
                    );
                    total = (total_price - discounted + ship).toFixed(2);
                    $('#Total').text(total + '$');
                }
            },
            error: function(xhr, status, error) {
                var errorMessage;
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    // If the server returned a JSON response with a 'message' property, use that
                    errorMessage = xhr.responseJSON.message;
                } else {
                    // Otherwise, use the status text or the error parameter
                    errorMessage = xhr.statusText || error;
                }
                console.error("Error checking discount: ", errorMessage);
            }
        });
    }

    */
})
