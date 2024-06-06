$("document").ready(function() {

var data = JSON.parse($purchases);

document.addEventListener("DOMContentLoaded", function()
{
    for(let i = 0; i < data.length; i++)
        print(data[i][0],data[i][1],data[i][2],data[i][3]);
});

var innerItem = 
`<div class="d-flex" style ="width: 100%; height:25vh;">
<div class ="d-flex align-items-center justify-content-center" style = "height: 100%; width: 150px; background-color: #C4C4C4;">
    <img src="http://localhost{pathing}" style= "height: 80%; width:auto;">
</div>
<div style = "padding-left: 20px;">
<a href="http://localhost/pepicase/product/product.php" style="color: black; text-decoration:none;"><div style ="font-size: 25px;"><b>${name}</b></div></a>
    <div>
       <span class="model"> Model: {id} <br> </span>
        <span class="quantity">  Quantity: {quantity} </span>
    </div>
    <div class="lexend-tera" style ="font-size: 20px;">
    <span class="price"> {price}$ <br> </span>
    </div>
</div>
</div>`

function print(id, name, price, pathing, quantity, order_date, receipt_date)
{
    var block = document.createElement("div");
    block.className = "lexend";
    block.style ="width: 80%;height:fit-content; padding: 0; margin: 0; margin-top: 5vh;"
    block.innerHTML =
    `
    <div style = "font-size: 20px;">Date of order: ${order_date}</div>
        
        <div class="lexend" style = "font-size: 20px;">Date of receipt: ${receipt_date}</div>
        <hr style ="height: 10px; margin-top:10px; width: 100%;">
    </div>
    `
    document.getElementById("page-body").appendChild(block);
}
}) 