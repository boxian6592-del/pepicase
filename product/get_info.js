var img_pathing = "/pepicase/product-pics/testing.svg";
var case_name = "My Melody_Milkshake Lmao";
document.getElementById("image-box").innerHTML = 
`<img src="${img_pathing}" alt="product" style = "height:398px; width:auto;"></img>`;
document.getElementById("product_name").innerHTML =
`<b>${case_name}</b>`;