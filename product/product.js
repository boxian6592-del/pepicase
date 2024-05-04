var img_pathing = "/pepicase/product-pics/testing.svg";
var case_name = "My Melody_Milkshake";
var price = "9.99"
document.getElementById("image-box").innerHTML = 
`<img src="${img_pathing}" alt="product" style = "height:398px; width:auto;"></img>`;
document.getElementById("product_name").innerHTML =
`<b>${case_name}</b>`;
document.getElementById("pricing").innerText = "$ " + price + " USD";

var quantity = 1;
var total;

var current_sizing = 0, previous_sizing, finalized_size;
document.addEventListener("DOMContentLoaded", function()
{
    total = quantity * price;
    document.getElementById("add_to_cart_button").innerText += "Add to Cart - $" + total + " USD";
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
    document.getElementById("curr_quantity").innerText = quantity.toString();

var starArr = document.getElementsByClassName("review_star");
for(i = 0; i < starArr.length; i++)
{
    let i_pass_on = i;
    starArr[i].addEventListener("click", function()
    {
        let index = starArr[i_pass_on].dataset.value;
        for(let u = index - 1; u > -1; u--)
            {
                starArr[u].src = "http://localhost/pepicase/pics/review_star_shaded.svg";
            }
        for(let u = index; u < starArr.length; u++)
            {
                starArr[u].src = "http://localhost/pepicase/pics/review_star.svg";
            }
    })
}
})

function favorite()
{
    var fav_icon = document.getElementById("favorite");      
    if(fav_icon.src === "http://localhost/pepicase/pics/favorite_icon_shaded.svg")
        fav_icon.src = "http://localhost/pepicase/pics/favorite_icon.svg";
    else
        fav_icon.src = "http://localhost/pepicase/pics/favorite_icon_shaded.svg";
}

function add()
{
    quantity++;
    document.getElementById("curr_quantity").innerText = quantity;
    total = price * quantity;
    document.getElementById("add_to_cart_button").innerText = "Add to Cart - $" + (price * quantity) + " USD";
}

function minus()
{
    quantity--;
    document.getElementById("curr_quantity").innerText = quantity;
    total = price * quantity;
    document.getElementById("add_to_cart_button").innerText = "Add to Cart - $" + (price * quantity) + " USD";
}