var ship = 0;
var discount_ratio = 0;
var discounted = total_price * discount_ratio;
var total = (total_price - discounted + ship).toFixed(2);
var ship_option = 0;
var voucher_id;
var protocol = 0;
var vnpay_protocol = 0;
var voucher_id = 0;

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
        protocol = 'VNPAY';
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
                ship_option = "Express";
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
                ship_option = "Standard";
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
            voucher_id = response.voucher_id;
            console.log(voucher_id);
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
                    <strong>-${(discounted)}$</strong>
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

function infoCheck() {
    var firstName = $('#fname').val();
    var lastName = $('#lname').val();
    var address = $('#address').val();
    var apartment = $('input[placeholder="Apartment, suite, etc (optional)"]').val();
    var country = $('input[placeholder="Country"]').val();
    var city = $('input[placeholder="City"]').val();
    var zipcode = $('input[placeholder="Zipcode"]').val();
    var areaCode = $('input[placeholder="Area Code (e.g +84)"]').val();
    var phone = $('input[placeholder="Telephone (e.g 0932456783)"]').val();

    var error = 'None';

    if(firstName.trim() === 'test') return error;


    if (firstName.trim() === '' || !/^[a-zA-Z\s]+$/.test(firstName)) {
        error = 'PLEASE ENTER A VALID FIRST NAME.';
        return error;
    }

    if (lastName.trim() === '' || !/^[a-zA-Z\s]+$/.test(lastName)) {
        error = 'PLEASE ENTER A VALID LAST NAME.';
        return error;
    }

    if (address.trim() === '' || !/^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z0-9\s,#-./]+$/.test(address)) {
        error = 'PLEASE ENTER A VALID ADDRESS.';
        return error;
    }
    
    if (apartment.trim() !== '' && !/^[a-zA-Z0-9\s,#-]+$/.test(apartment)) {
        error = 'PLEASE ENTER A VALID APARTMENT/SUITE NUMBER.';
        return error;
    }

    if (country.trim() === '' || !/^[a-zA-Z\s]+$/.test(country)) {
        error = 'PLEASE ENTER A VALID COUNTRY.';
        return error;
    }

    if (city.trim() === '' || !/^[a-zA-Z\s]+$/.test(city)) {
        error = 'PLEASE ENTER A VALID CITY.';
        return error;
    }

    if (zipcode.trim() === '' || !/^\d{5}(?:[-\s]\d{4})?$/.test(zipcode)) {
        error = 'PLEASE ENTER A VALID ZIP CODE.';
        return error;
    }

    if (areaCode.trim() === '' || !/^\+?\d{1,2}$/.test(areaCode)) {
        error = 'PLEASE ENTER A VALID AREA CODE.';
        return error;
    }

    if (phone.trim() === '' || !/^\d{6,15}$/.test(phone)) {
        error = 'PLEASE ENTER A VALID TELEPHONE NUMBER.';
        return error;
    }

    return error;
}

$('#buy').click(function()
{

    $('#detail-alert').text('');
    console.log('Current protocol: ' + protocol);
    if(infoCheck() == 'None')
    {
        if(ship_option == 0)
        {
            $('#detail-alert').text('PLEASE CHOOSE A SHIPPING OPTION!')
        }
        else
        {
            note = 'Ship: ' + ship + '$';
            if(voucher_id !== 0) note += '. Discounted: ' + discounted + '$';

            console.log(note);

            if(protocol == '0')
            {
                $('#detail-alert').text('PLEASE CHOOSE A PAYMENT METHOD!');
            }
            if(protocol == 'VNPAY')
            {
                console.log("VNPAY's protocol chosen: "+ vnpay_protocol);
                $.ajax({
                    type: "POST",
                    url: "http://localhost/pepicase/public/checkout/vnpay",
                    data: {
                        amount: 10000,
                        bankCode: '',
                        user: user,
                    },
                    dataType: 'json', // Expect the response to be in JSON format
                    success: function(response) {
                        var vnpay_url_API = response.url;
                        var method_id = response.method_id;
                        $.post
                        ({
                            url: "http://localhost/pepicase/public/checkout/generate_invoice",
                            data: {
                                Total_Price: total_price,
                                Actual_Price: total,
                                Voucher_ID: voucher_id,
                                user: user,
                                Note: note,
                                Method: protocol,
                                Method_ID: method_id,
                            },
                            dataType: 'json',
                            success: function(response) {
                                var new_invoice_id = response.new_invoice_id;
                                $.post({
                                    url: "http://localhost/pepicase/public/checkout/create_delivery",
                                    data: {
                                        /*
                                            var firstName = $('#fname').val();
                                            var lastName = $('#lname').val();
                                            var address = $('#address').val();
                                            var apartment = $('input[placeholder="Apartment, suite, etc (optional)"]').val();
                                            var country = $('input[placeholder="Country"]').val();
                                            var city = $('input[placeholder="City"]').val();
                                            var zipcode = $('input[placeholder="Zipcode"]').val();
                                            var phone = $('input[placeholder="Phone"]').val();
                                            var saveContact = $('#save-contact').is(':checked');
                                        */
                                        Invoice_ID: new_invoice_id,
                                        firstName: $('#fname').val().toString(),
                                        lastName: $('#lname').val().toString(),
                                        Address: $('#address').val().toString(),
                                        Apartment: $('input[placeholder="Apartment, suite, etc (optional)"]').val().toString(),
                                        Country: $('input[placeholder="Country"]').val().toString(),
                                        Zipcode: $('input[placeholder="Zipcode"]').val().toString(),
                                        Phone: $('input[placeholder="Area Code (e.g +84)"]').val().toString() + ' ' + $('input[placeholder="Telephone (e.g 0932456783)"]').val().toString(),
                                        Ship: ship_option,
                                    },
                                    dataType: 'json',
                                    success: function(response) {                        
                                        window.location.href = response.url_vnpay;
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
                                        console.error("Error creating invoice / delivery", errorMessage);
                                    }
                                });            
                                window.open(vnpay_url_API);
                                window.location.href = response.url_vnpay;
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
                                console.error("Error", errorMessage);
                            }
                        })
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
                        console.error("Error: ", errorMessage);
                    }
                })
            }
            if(protocol == 'Cash')
            {
                $.post({
                    url: "http://localhost/pepicase/public/checkout/generate_invoice",
                    data: {
                        Total_Price: total_price,
                        Actual_Price: total,
                        Voucher_ID: voucher_id,
                        user: user,
                        Note: note,
                        Method: protocol,
                        Method_ID: '',
                    },
                    dataType: 'json',
                    success: function(response) {
                        var new_invoice_id = response.new_invoice_id;
                        $.post({
                            url: "http://localhost/pepicase/public/checkout/create_delivery",
                            data: {
                                /*
                                    var firstName = $('#fname').val();
                                    var lastName = $('#lname').val();
                                    var address = $('#address').val();
                                    var apartment = $('input[placeholder="Apartment, suite, etc (optional)"]').val();
                                    var country = $('input[placeholder="Country"]').val();
                                    var city = $('input[placeholder="City"]').val();
                                    var zipcode = $('input[placeholder="Zipcode"]').val();
                                    var phone = $('input[placeholder="Phone"]').val();
                                    var saveContact = $('#save-contact').is(':checked');
                                */
                                Invoice_ID: new_invoice_id,
                                firstName: $('#fname').val().toString(),
                                lastName: $('#lname').val().toString(),
                                Address: $('#address').val().toString(),
                                Apartment: $('input[placeholder="Apartment, suite, etc (optional)"]').val().toString(),
                                Country: $('input[placeholder="Country"]').val().toString(),
                                City: $('input[placeholder="City"]').val().toString(),
                                Zipcode: $('input[placeholder="Zipcode"]').val().toString(),
                                Phone: $('input[placeholder="Area Code (e.g +84)"]').val().toString() + ' ' + $('input[placeholder="Telephone (e.g 0932456783)"]').val().toString(),
                                Ship: ship_option,
                            },
                            dataType: 'json',
                            success: function(response) {                        
                                window.location.href = response.url;
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
                                console.error("Error creating invoice / delivery", errorMessage);
                            }
                        });            
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
                        console.error("Error creating invoice / delivery", errorMessage);
                    }
                });            
            }    
        }           
    }
    else $('#detail-alert').text(infoCheck());
})