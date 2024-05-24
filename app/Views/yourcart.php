<?php include(APPPATH.'views/components/usual-links.php'); ?>
<link rel="stylesheet" href="/pepicase/public/css/yourcart.css"> 
<?php include(APPPATH.'views/components/top-header.php'); ?>
  
<div class ="container-fluid d-flex flex-column align-items-center" style = "margin: 0; padding: 0; min-height: 60vh">
      <div class = "lexend-tera container-fluid d-flex flex-column justify-content-center align-items-center" style = "height:200px; background-color:#FFFAE3; font-weight: 600;">
         <div class = "lexend-tera container-fluid d-flex flex-column justify-content-center align-items-center" style = "font-size: 40px; font-weight: 600">Your Cart </div><br>
          <div class="public sans container-fluid d-flex justify-content-center align-items-center" style="font-size:15px; font-weight: 200" >
         <p > Not ready to checkout?<p>
         <a href="/pepicase/public/"> Continue Shopping</a>        
          </div>
      </div>
</div>

<div class="wrapper">
    <section class="wrapper-content1 public sans">
        <aside class="yourcart">
                <div class="cart-item" >
                    <div class="cart-item d-flex align-items-center justify-content-center" style ="width: 120px; height: 130px; background-color:#D9D9D9">
                    <img src="/pepicase/public/product-pics/pompompurin/1.svg" style = "width: 55px; height: 110px;" alt="Product 1"> </div>
                    <div class="item-details" style="padding: 20px;">
                        <p style="font-size:20px; font-weight: 600; margin-bottom: 1px">My Melody_Milkshake iPhone Case</p>
                        <p style="margin-bottom: 1px">Model: iPhone 15</p>
                        <p style="margin-bottom: 1px">Quantity: 1</p>
                        <p style="font-size:20px; font-weight: 600; margin-bottom: 1px">$999</p>
                        <button class="remove-btn" style="margin-bottom: 1px; margin-left: 260px; ">Remove</button>
                        
                    </div>
                </div>
                <hr>
                <div class="cart-item" >
                    <div class="cart-item d-flex align-items-center justify-content-center" style ="width: 120px; height: 130px; background-color:#D9D9D9">
                    <img src="/pepicase/public/product-pics/pompompurin/1.svg" style = "width: 55px; height: 110px;" alt="Product 1"> </div>
                    <div class="item-details" style="padding: 20px;">
                        <p style="font-size:20px; font-weight: 600; margin-bottom: 1px">My Melody_Milkshake iPhone Case</p>
                        <p style="margin-bottom: 1px">Model: iPhone 15</p>
                        <p style="margin-bottom: 1px">Quantity: 1</p>
                        <p style="font-size:20px; font-weight: 600; margin-bottom: 1px">$999</p>
                        <button class="remove-btn" style="margin-bottom: 1px; margin-left: 260px; ">Remove</button>
                        
                    </div>
                </div>
                <hr>
            </aside>

        <section class="content1">
        <div class="middle-content1 public sans" style="padding: 20px;">
                    <h2 style="font-weight: 600">Order Summary</h2>
                    <input type="text" placeholder="Enter coupon code here"> <br><br>
                    <div class="public sans container-fluid d-flex" style="font-weight: 400">
                        <p>Subtotal:</p> <a style="margin-left: 260px"> $1998</a></div>
                    <div class="public sans container-fluid d-flex  " >
                        <p style="font-weight: 400">Shipping: </p> <a style="margin-left: 110px; font-weight: 100">Calculated at the next step</a></div>
                    <hr>
                    <div class="public sans container-fluid d-flex" style="font-weight: 600" >
                        <p>Total:</p> <a style="margin-left: 285px">$1998</a></div>
                    
                    <button class="checkout">Continue to checkout</button>
                
                </div>
       </section>
</section>
</div>

<div>
    <div class="container-fluid public sans d-flex align-items-center " style = "font-size: 25px; margin-top:80px; font-weight: 600; margin-left: 20px">Order Information</div>
    <hr>
    
    


 <?php include(APPPATH.'views/components/bottom-footer.php'); ?>