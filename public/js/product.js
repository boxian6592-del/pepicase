var quantity = 1;
var total;

var current_sizing = 0, previous_sizing, finalized_size;

$(document).ready(function() {
    total = quantity * price;
    $("#add_to_cart_button").text("Add to Cart - $" + total + " USD");
    
    $(".sizing").each(function() {
        $(this).val($(this).text());
    });
    
    $(".sizing").click(function() {
        if (this === current_sizing) return;
        
        if (current_sizing === 0) {
            $(this).css("background-color", "#FFE57A");
            current_sizing = this;
            finalized_size = $(this).val();
        } else {
            previous_sizing = current_sizing;
            $(this).css("background-color", "#FFE57A");
            current_sizing = this;
            $(previous_sizing).css("background-color", "white");
            finalized_size = $(this).val();
        }
    });
    
    $("#curr_quantity").text(quantity.toString());
    
    $(".review_star").click(function() {
        var index = $(this).data("value");
        
        for (let u = index - 1; u > -1; u--) {
            $(starArr[u]).attr("src", "http://localhost/pepicase/public/pics/review_star_shaded.svg");
        }
        
        for (let u = index; u < starArr.length; u++) {
            $(starArr[u]).attr("src", "http://localhost/pepicase/public/pics/review_star.svg");
        }
    });
});

function toggleFavorite() 
{
    var fav_icon = $("#favorite");
    if (fav_icon.attr("src") === "http://localhost/pepicase/public/pics/favorite_icon_shaded.svg") 
        fav_icon.attr("src", "http://localhost/pepicase/public/pics/favorite_icon.svg")
    else fav_icon.attr("src", "http://localhost/pepicase/public/pics/favorite_icon_shaded.svg");

    /*$.ajax({
        url: "http://localhost/pepicase/public/product/" + id + "/toggleFavorite",
        method: "GET",
        data: {
          status: "value1",
        },
        success: function(response) {
          // Code to handle a successful response
          console.log(response);
        },
        error: function(xhr, status, error) {
          // Code to handle an error response
          console.log("Error:", error);
        }
      });
    */
};

function add() {
    quantity++;
    $("#curr_quantity").text(quantity);
    total = price * quantity;
    $("#add_to_cart_button").text("Add to Cart - $" + total + " USD");
}

function minus() {
    quantity--;
    $("#curr_quantity").text(quantity);
    total = price * quantity;
    $("#add_to_cart_button").text("Add to Cart - $" + total + " USD");
}