/*
data = [
    {
      "id": 1234,
      "order_date": "2024-05-15",
      "receipt_date": "2024-05-17",
      "items": [
        {
          "id": "prod-1",
          "name_product": "T-Shirt",
          "price": 20.00,
          "pathing": "/images/t-shirt.jpg",
          "quantity": 2
        },
        {
          "id": "prod-2",
          "name_product": "Jeans",
          "price": 45.00,
          "pathing": "/images/jeans.jpg",
          "quantity": 1
        }
      ]
    },
    {
      "id": 5678,
      "order_date": "2024-05-10",
      "receipt_date": "2024-05-12",
      "items": [
        {
          "id": "prod-3",
          "name_product": "Book",
          "price": 15.00,
          "pathing": "/images/book.jpg",
          "quantity": 3
        },
        {
          "id": "prod-4",
          "name_product": "Coffee Mug",
          "price": 10.00,
          "pathing": "/images/mug.jpg",
          "quantity": 2
        }
      ]
    }
  ] */

  $(document).ready(function() {
    if (data) {
        data.forEach(purchase => {
            const block_purchases = createPurchaseBlock(purchase.id, purchase.order_date, purchase.receipt_date);
            document.getElementById("page-body").appendChild(block_purchases);
            purchase.items.forEach(product => {
                const block = createItemBlock(product.id, product.name_product, product.price, product.pathing, product.quantity);
                document.getElementById(`purchases-${purchase.id}`).appendChild(block);
            });
        });
    }
  });

function createItemBlock(id, name, price, pathing, quantity) {
    var block = document.createElement("div");
    block.className = "item";
    block.innerHTML = 
    `<div class="d-flex" style="width: 100%; height:25vh;">
    <div class="d-flex align-items-center justify-content-center" style="height: 100%; width: 150px; background-color: #C4C4C4;">
        <img src="http://localhost${pathing}" style="height: 80%; width:auto;">
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

function createPurchaseBlock(id, order_date, receipt_date) {
    var block = document.createElement("div");
    block.className = "purchases-cointaner";
    block.style = "width: 80%; height:fit-content; padding: 0; margin: 0; margin-top: 5vh;";
    block.innerHTML = 
    `
    <div id="purchases-${id}" style = "font-size: 20px;">Date of order: ${order_date}</div>
    <div style = "font-size: 20px;">Date of receipt: ${receipt_date}</div>
    <hr style ="height: 10px; margin-top:10px; width: 100%;">
    </div>
    `
    return block;
}

