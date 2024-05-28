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
                                <strong>Express shipping</strong><br>
                                <span>Estimated delivery in 3 - 5 Business Days</span>
                            </label>
                        </div>
                        <div class="shipping-option">
                            <input type="radio" id="worldwide-shipping" name="shipping">
                            <label for="worldwide-shipping">
                                <strong>Standard shipping</strong><br>
                                <span>Estimated delivery in 7 - 9 Business Days</span>
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

                    <div class="d-flex" style="font-weight: 600; line-height: 40px;">
                        <div style="width: 30%;">Subtotal:</div>
                        <div id ="subTotal" class="d-flex flex-row justify-content-end" style ="width:70%;">100</div>
                    </div>

                    <div class="d-flex" style="font-weight: 600; line-height: 40px;">
                        <div style="width: 30%;">Shipping:</div>
                        <div id ="subTotal" class="d-flex flex-row justify-content-end" style ="width:70%;">20$</div>
                    </div>
                    
                </div>
                <button class="buy-btn">Buy Now</button>
            </aside>
        </section>
    </div>
<script src="/pepicase/public/js/jquery.js"></script>
<script>
 
</script>
<script src="/pepicase/public/js/checkout.js"></script>
<?php include(APPPATH.'views/components/bottom-footer.php'); ?>