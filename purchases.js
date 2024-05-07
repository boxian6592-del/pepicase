var data = JSON.parse(js_arr);

document.addEventListener("DOMContentLoaded", function()
{
    for(let i = 0; i < data.length; i++)
        printLmao(data[i][0],data[i][1],data[i][2],data[i][3]);
});


function printLmao(id, name, price, pathing)
{
    var block = document.createElement("div");
    block.className = "lexend";
    block.style ="width: 100%; height:fit-content; margin-left: 20vw;"
    block.innerHTML =
    `
    <div style = "font-size: 20px;">Date of order: 02, March, 2024</div>
        <div class="d-flex" style ="width: 100%; height:25vh;">
            <div class ="d-flex align-items-center justify-content-center" style = "height: 100%; width: 150px; background-color: #C4C4C4;">
                <img src="http://localhost${pathing}" style= "height: 80%; width:auto;">
            </div>
            <div style = "padding-left: 20px;">
                <div style ="font-size: 20px;"><a src="http://localhost/pepicase/product/product.php"><b>${name}</b></a></div>
                <div>
                    Model: ${id} <br>
                    Quantity: Probably 1
                </div>
                <div class="lexend-tera" style ="font-size: 20px;">
                    ${price}$
                </div>
            </div>
        </div>
        <div class="lexend" style = "font-size: 20px;">Date of receipt: 06, March, 2024</div>
        <hr style ="height: 10px; margin-top:10px; width: 50w;">
    </div>
    `
    document.getElementById("page-body").appendChild(block);
}