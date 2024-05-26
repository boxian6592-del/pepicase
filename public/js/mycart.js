
var data = JSON.parse(js_arr);

document.addEventListener("DOMContentLoaded", function()
{
    for(let i = 0; i < data.length; i++) {
        print(data[i][0],data[i][1],data[i][2],data[i][3]);
    }
    // hiển thị tổng tiền 
 document.getElementById("page-body").appendChild(document.createTextNode(`Total Price: ${totalPrice}$`));
});


function print(id, name, price, pathing)
{
    var block = document.createElement("div");
    block.className = "lexend";
    block.style ="width: 80%;height:fit-content; padding: 0; margin: 0; margin-top: 5vh;"
    block.innerHTML =
    `
    <div class="container">
      <div class="d-flex flex-column justify-content-center align-items-center">
         <div class="d-flex" style ="height:25vh; width: 100%; text-align: left">
            <div class ="d-flex align-items-center justify-content-center" style = "height: 100%; width: 150px; background-color: #C4C4C4;">
                <img src="http://localhost${pathing}" style= "height: 80%; width:auto;">
            </div>
            <div style = "padding-left: 20px;">
            <a href="http://localhost/pepicase/product/product.php" style="color: black; text-decoration:none;">
                <div style ="font-size: 25px;"><b>${name}</b></div></a>
                <div>
                    Model: ${id} <br>
                    Quantity: 1
                </div>
                <div class="lexend-tera" style ="font-size: 20px;">
                    ${price}$
                </div>
                <div><button class="remove-btn" style="margin-bottom: 1px; margin-left: 200px; ">Remove</button></div>
            </div>
        </div>
        <hr style ="height: 10px; margin-top:20px;">
    </div>


    
    <div class="content1">
        <div class="middle-content1 public sans" style="padding-left: 80px;">
                    <h2 style="font-weight: 600;">Order Summary</h2>
                    <input class="container-fluid d-flex flex-column justify-content-center align-items-center" type="text" placeholder="Enter coupon code here"> <br>

                    <div class="container public sans container-fluid d-flex" style="font-weight: 600; line-height: 40px" >
                        <div stle="text-align: left; font-weight: 600">
                             Subtotal: <br>
                             Shipping:
                         
                        </div>
                        <div style=" padding-left:80px; text-align: right; line-height: 40px" >
                             ${totalPrice}$ <br>
                             <p style="font-weight: 400">Calculated at the next step<p>
                  
                        </div>
                  </div>
                  <hr>
                  <div class="container public sans container-fluid d-flex" style="font-weight: 600; text-align: left; line-height: 40px" >
                        <div style="text-align: left">
                             Total: 
                        </div>
                        <div style=" padding-left:80px; text-align: right; line-height: 40px" >
                            ${totalPrice}$
                        </div>
                  </div>
                  <div><button class="container-fluid d-flex flex-column justify-content-center align-items-center" style="background: #000000; color:#ffffff; font-weight: 600 ">Continue to checkout</button></div>
            </div>
      </div>
</div>
    `
    document.getElementById("page-body").appendChild(block);
      // cập nhật tổng giá tiền khi thêm sản phẩm 
    totalPrice += parseFloat(price);
    document.getElementById("subtotal-price").textContent = totalPrice; 
}