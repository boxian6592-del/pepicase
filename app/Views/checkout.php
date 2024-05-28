<?php include(APPPATH.'views/components/usual-links.php'); ?>
<link rel="stylesheet" href="/pepicase/public/css/checkout.css">
<?php include(APPPATH.'views/components/top-header.php'); ?>



    <div class="wrapper">
        <div class="content-top1">
            <p class="check-out-title1">Checkout</p>
            <div class="steps">
                <p>Address</p>
                <hr>
                <p>Shipping</p>
                <hr>
                <p>Payment</p>
            </div>
        </div>   
        <section class="wrapper-content1">
            <section class="content1">
                <article class="top-content1">
                    <form action="">
                        <h2>Shipping Information</h2>
                        <table>
                            <tr>
                                <td><input type="text" placeholder="First Name"></td>
                                <td colspan="2"><input type="text" placeholder="Last Name"></td>
                            </tr>
                            <tr>
                                <td colspan="3"><input type="text" placeholder="Address" class="full-width"></td>
                            </tr>
                            <tr>
                                <td colspan="3"><input type="text" placeholder="Apartment, suite, etc (optional)" class="full-width"></td>
                            </tr>
                            <tr>
                                <td><input type="text" placeholder="Country"></td>
                                <td><input type="text" placeholder="City"></td>
                                <td><input type="text" placeholder="Zipcode"></td>
                            </tr>
                            <tr>
                                <td colspan="3"><input type="text" placeholder="Phone" class="full-width"></td>
                            </tr>
                        </table>
                        <p><input type="checkbox" id="save-contact"><label for="save-contact"> Save contact information</label></p>
                    </form>
                </article>
                <div class="middle-content1">
                    <h2>Shipping Method</h2>
                    <form action="">
                        <div class="shipping-option">
                            <input type="radio" id="standard-shipping" name="shipping" required checked>
                            <label for="standard-shipping">
                                <strong>Standard shipping</strong><br>
                                <span>Estimated delivery in 3-5 Business Days</span>
                            </label>
                        </div>
                        <div class="shipping-option">
                            <input type="radio" id="worldwide-shipping" name="shipping">
                            <label for="worldwide-shipping">
                                <strong>Worldwide shipping</strong><br>
                                <span>Estimated delivery in 7-9s Business Days</span>
                            </label>
                        </div>
                    </form>
                </div>
                <div class="bottom-content1">
                    <h2>Payment</h2>
                    <p>All transactions are secure and encrypted.</p>
                    <form action="">
                        <table style="width:100%">
                            <tr>
                                <td><button type="button" id="credit-card-btn">Credit Card</button></td>
                                <td><button type="button" id="cod-btn">Cash On Delivery</button></td>
                                <td><button type="button" id="momo-btn">Momo</button></td>
                            </tr>
                            <tr id="card-details" class="hidden">
                                <td colspan="3"><input type="text" placeholder="Cardholder Name" class="full-width"></td>
                            </tr>
                            <tr id="card-number" class="hidden">
                                <td colspan="3"><input type="text" placeholder="Card Number" class="full-width"></td>
                            </tr>
                            <tr id="card-expiry-cvc" class="hidden">
                                <td><input type="text" placeholder="Month"></td>
                                <td><input type="text" placeholder="Year"></td>
                                <td><input type="text" placeholder="CVC"></td>
                            </tr>
                        </table>
                        <!-- <p id="save-card-container" class="hidden"><input type="checkbox" id="save-card"><label for="save-card"> Save card data for future payments</label></p> -->
                    </form>
                </div>
            </section>
            <aside class="sidebar1">
                <h2 align="center">Your Cart</h2>
                <div id="item_div" style = "min-height: 10vh;">
            
                </div>
                <div class="cart-summary">
                    <div class="input-discount">
                        <input type="text" id="discount-code"class="form-control" placeholder="Discount Code" aria-label="Discount Code" aria-describedby="button-addon2" style="width:200%; margin-right:20px">
                        <button class="btn btn-dark" type="button" id="apply-discount" style="width:50%">Apply</button>
                    </div>
                    <p id="discount-alert"></p>
                    <div style="display:flex; flex-direction:row; justify-content:space-between;align-items:flex-start">
                    <div class="left-item">
                        <p>Subtotal</p>
                        <p>Shipping</p>
                        <p id="discount_text">Discount</p>
                        <p><strong>Total</strong></p></div>
                    <div class="right-item">
                        <p class="subtotal" id="subtotal">199$</p>
                        <p class="shipping" id="shipping">20$</p>
                        <p id="discount_money"></p>
                        <p class="total" id="total">20$</p>
                    </div>
                    </div>
                    <button class="buy-btn">Buy Now</button>
                </div>
            </aside>
        </section>
    </div>
<script>
 document.addEventListener('DOMContentLoaded', function() {
    const creditCardBtn = document.getElementById('credit-card-btn');
    const codBtn = document.getElementById('cod-btn');
    const momoBtn = document.getElementById('momo-btn');
    const cardDetails = document.getElementById('card-details');
    const cardNumber = document.getElementById('card-number');
    const cardExpiryCvc = document.getElementById('card-expiry-cvc');
    // const saveCardContainer = document.getElementById('save-card-container');

    // Function to hide card details
    function hideCardDetails() {
        cardDetails.classList.add('hidden');
        cardNumber.classList.add('hidden');
        cardExpiryCvc.classList.add('hidden');
        // saveCardContainer.classList.add('hidden');
    }

    function removeActiveClass() {
        creditCardBtn.classList.remove('active');
        codBtn.classList.remove('active');
        momoBtn.classList.remove('active');
    }
    hideCardDetails();

    creditCardBtn.addEventListener('click', function() {
        removeActiveClass(); // Remove active class from all buttons
        creditCardBtn.classList.add('active'); // Add active class to the clicked button
        cardDetails.classList.remove('hidden');
        cardNumber.classList.remove('hidden');
        cardExpiryCvc.classList.remove('hidden');
        // saveCardContainer.classList.remove('hidden');
    });

    codBtn.addEventListener('click', function() {
        removeActiveClass(); // Remove active class from all buttons
        codBtn.classList.add('active'); // Add active class to the clicked button
        hideCardDetails();
    });

    momoBtn.addEventListener('click', function() {
        removeActiveClass(); // Remove active class from all buttons
        momoBtn.classList.add('active'); // Add active class to the clicked button
        window.location.href = 'http://example.com';
    });
});
</script>
<script src="/pepicase/public/js/checkout.js"></script>
<?php include(APPPATH.'views/components/bottom-footer.php'); ?>