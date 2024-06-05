 $(document).ready(function() {
    

    if (data && data.length > 0) {
        data.forEach(purchase => {
            const block_purchases = createPurchaseBlock(purchase.id, purchase.order_date);
            document.getElementById("page-body").appendChild(block_purchases);
            const block = createItemBlock(purchase.product_id, purchase.name_product, purchase.price, purchase.image, purchase.quantity);
            document.getElementById(`purchases-${purchase.id}`).appendChild(block);
        });
    } else {
        var block = document.createElement("div");
        block.innerHTML = `
            <div style="font-size: 20px;">There are no purchases! Go and shop now </div>
        `;
        document.getElementById("page-body").appendChild(block);
    }

});




function createItemBlock(id, name, price, pathing, quantity) {
    var block = document.createElement("div");
    block.className = "item";
    block.innerHTML = 
    `<div class="d-flex" style="width: 100%; height:25vh;">
    <div class="d-flex align-items-center justify-content-center" style="height: 100%; width: 150px; background-color: #C4C4C4;">
        <img src="http://localhost/${pathing}" style="height: 80%; width:auto;">
    </div>
    <div style="padding-left: 20px;">
        <a href="http://localhost/pepicase/product/product.php" style="color: black; text-decoration:none;">
            <div style="font-size: 25px;"><b>${name}</b></div>
        </a>
        <div>
            <span class="model">Model: ${id} <br></span>
            <span class="quantity">Quantity: ${quantity}</span>
        </div>
        <div class="lexend-tera" style="font-size: 20px;">
            <span class="price">${price}$ <br></span>
        </div>
    </div>
    </div>`
    return block;
}

function createPurchaseBlock(id, order_date) {
    var block = document.createElement("div");
    var deleteOrder = document.createElement("deleteOrder");
    var orderDate = new Date(order_date);
    var currentDate = new Date(); 
    var threeDaysLater = new Date(orderDate)
    threeDaysLater.setDate(threeDaysLater.getDate() + 3); 
    block.className = "purchases-container";
    block.style = "width: 80%; height:fit-content; padding: 0; margin: 0; margin-top: 5vh;";
    block.innerHTML = 
    `
    <div class="order-id-${id}" id="purchases-${id}" style = "font-size: 20px;">Date of order: ${order_date}</div>
    <hr style ="height: 10px; margin-top:10px; width: 100%;">
    <a class="deleteOrder" href="http://localhost/pepicase/pep> </a>
    </div>
    `
    if (threeDaysLater < currentDate) {
        var button = document.createElement("button");
        button.setAttribute("type", "button");
        button.setAttribute("class", "btn btn-primary cancel-order-btn");
        button.setAttribute("data-order-id", id);
        button.textContent = "Hủy đơn hàng";
        deleteOrder.appendChild(button);
    }
    return block;
}

