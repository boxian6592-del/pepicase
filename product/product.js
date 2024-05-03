var img_pathing = "/pepicase/product-pics/testing.svg";
var case_name = "My Melody_Milkshake Lmao";
var price = "200000"
document.getElementById("image-box").innerHTML = 
`<img src="${img_pathing}" alt="product" style = "height:398px; width:auto;"></img>`;
document.getElementById("product_name").innerHTML =
`<b>${case_name}</b>`;
document.getElementById("pricing").innerText = price + " VNĐ";


var current_sizing = 0, previous_sizing, finalized_size;
document.addEventListener("DOMContentLoaded", function()
{
    var sizingArr = document.getElementsByClassName("sizing");
    for(i = 0; i < sizingArr.length; i++)
        {
            sizingArr[i].value = sizingArr[i].innerText.toString();
        }
    for(i = 0; i < sizingArr.length; i++)
        {
            var curr = sizingArr[i];
            sizingArr[i].addEventListener("click",function()
            {
                if(this === current_sizing) return;
                if(current_sizing === 0)
                {
                    this.style.backgroundColor = "#FFE57A";
                    current_sizing = this;
                    finalized_size = this.value;
                }
                else
                {
                    previous_sizing = current_sizing;
                    this.style.backgroundColor = "#FFE57A";
                    current_sizing = this;
                    previous_sizing.style.backgroundColor = "white";
                    finalized_size = this.value;
                }
            })
        }
})