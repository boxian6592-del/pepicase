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
                                <td><input type="text" placeholder="Last Name"></td>
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
                            <input type="checkbox" id="standard-shipping" name="shipping">
                            <label for="standard-shipping">
                                <strong>Standard shipping</strong><br>
                                <span>Estimated delivery in 3-5 Business Days</span>
                            </label>
                        </div>
                        <div class="shipping-option">
                            <input type="checkbox" id="worldwide-shipping" name="shipping">
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
                        <table>
                            <tr>
                                <td><button type="button" id="credit-card-btn">Credit Card</button></td>
                                <td><button type="button" id="cod-btn">Cash On Delivery</button></td>
                                <td><button type="button" id="momo-btn">Momo</button></td>
                            </tr>
                            <tr id="card-details">
                                <td colspan="3"><input type="text" placeholder="Cardholder Name" class="full-width"></td>
                            </tr>
                            <tr id="card-number">
                                <td colspan="3"><input type="text" placeholder="Card Number" class="full-width"></td>
                            </tr>
                            <tr id="card-expiry-cvc">
                                <td><input type="text" placeholder="Month"></td>
                                <td><input type="text" placeholder="Year"></td>
                                <td><input type="text" placeholder="CVC"></td>
                            </tr>
                        </table>
                        <p id="save-card-container"><input type="checkbox" id="save-card"><label for="save-card"> Save card data for future payments</label></p>
                    </form>
                </div>
            </section>
            <aside class="sidebar1">
                <h2 align="center">Your Cart</h2>
                <div class="cart-item">
                    <img src="/pepicase/public/product-pics/pompompurin/1.svg" alt="Product 1">
                    <div class="item-details">
                        <p>Model: iPhone 15</p>
                        <p>Price: $999</p>
                        <div class="quantity-control">
                            <button class="quantity-btn" data-action="decrease">-</button>
                            <input type="text" value="1" class="quantity-input">
                            <button class="quantity-btn" data-action="increase">+</button>
                        </div>
                        <button class="remove-btn">Remove</button>
                    </div>
                </div>
                <div class="cart-item">
                    <img src="/pepicase/public/product-pics/pochacco/2.svg" alt="Product 2">
                    <div class="item-details">
                        <p>Model: iPhone 15</p>
                        <p>Price: $999</p>
                        <div class="quantity-control">
                            <button class="quantity-btn" data-action="decrease">-</button>
                            <input type="text" value="1" class="quantity-input">
                            <button class="quantity-btn" data-action="increase">+</button>
                        </div>
                        <button class="remove-btn">Remove</button>
                    </div>
                </div>
                <div class="cart-summary">
                    <input type="text" placeholder="Discount Code">
                    <p>Subtotal: $1998</p>
                    <p>Shipping: $20</p>
                    <p><strong>Total: $2018</strong></p>
                    <button class="buy-btn">Buy Now</button>
                </div>
            </aside>
        </section>
    </div>
    <script>
       document.addEventListener('DOMContentLoaded', function() {
    const quantityControls = document.querySelectorAll('.quantity-control');

    quantityControls.forEach(control => {
        const input = control.querySelector('.quantity-input');
        
        control.addEventListener('click', function(event) {
            const target = event.target;
            
            if (target.classList.contains('quantity-btn')) {
                const action = target.getAttribute('data-action');
                let currentValue = parseInt(input.value);
                
                if (action === 'decrease' && currentValue > 1) {
                    currentValue--;
                } else if (action === 'increase') {
                    currentValue++;
                }
                
                input.value = currentValue;
            }
        });
                input.addEventListener('input', function(event) {
            let value = parseInt(event.target.value);
            
            if (isNaN(value) || value < 1) {
                value = 1;
            }
            
            input.value = value;
        });
    });
});
    </script>
   
<?php include(APPPATH.'views/components/bottom-footer.php'); ?>