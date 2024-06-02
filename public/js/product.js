var total;
var starArr = [];
var current_sizing = 0, previous_sizing, finalized_size;
var isFavoritedNow = isFavorited;
var amount = parseInt(cart_amount);

$(document).ready(function() {
    total = quantity * price;
    $("#add_to_cart_button").text("Add to Cart - $" + total + " USD");
    
    $(".sizing").each(function() {
        $(this).val($(this).text());
    });
    
    $(".sizing").click(function() 
    {
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
    $("#curr_quantity").text(quantity);
    var starArr = $(".review_star");
    console.log(starArr);
    
    $(".review_star").click(function() {
        var index = $(this).data("value");
    
        for (let u = index - 1; u > -1; u--) {
            $(starArr[u]).prop("src", "http://localhost/pepicase/public/pics/review_star_shaded.svg");
        }
    
        for (let u = index; u < starArr.length; u++) {
            $(starArr[u]).prop("src", "http://localhost/pepicase/public/pics/review_star.svg");
        }
    });

    $("#add_to_cart_button").click(function() {
        console.log(product_id);
        console.log(user);
        console.log(finalized_size);
        console.log(quantity);        

        if(finalized_size == null) $("#combotext").text("Please pick a size!");
        else
        {
            $.ajax({
                type: "POST",
                url: "http://localhost/pepicase/public/product/add",
                data: {
                    product: product_id,
                    user_id: user,
                    size: finalized_size,
                    quantity: quantity,
                    name: product_name,
                    price: price,
                },
                success: function(response) {
                    $("#combotext").css("color", "green");
                    $("#combotext").text("You have added " + quantity + " items to your cart successfully!");
                    amount += parseInt(quantity);
                    $('#cart_amount').text(amount);
                },
                error: function(xhr, status, error) {
                    // Handle the error response
                    var errorMessage;
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        // If the server returned a JSON response with a 'message' property, use that
                        errorMessage = xhr.responseJSON.message;
                    } else {
                        // Otherwise, use the status text or the error parameter
                        errorMessage = xhr.statusText || error;
                    }
                    console.error("Error adding item to cart: ", errorMessage);
                }
            });
        }
    });

    printFeedback("Anonymous", 4, "so cuteee luv it soo much!!", "Jan 1, 2024");
    printFeedback("Anonymous", 5, "luv it soo much!! luv it soo much!! luv it soo much!! luv it soo much!!", "Jan 1, 2024");
    printFeedback("Anonymous", 4, "so cuteee luv it soo much!!", "Jan 1, 2024");
});

function toggleFavorite() 
{
    var fav_icon = $("#favorite");
    if (fav_icon.attr("src") === "http://localhost/pepicase/public/pics/favorite_icon_shaded.svg") 
    {
        fav_icon.attr("src", "http://localhost/pepicase/public/pics/favorite_icon.svg")
        isFavoritedNow = 'no';
    }
    else 
    {
        fav_icon.attr("src", "http://localhost/pepicase/public/pics/favorite_icon_shaded.svg");
        isFavoritedNow = 'yes';
    }
};

function add() {
    quantity++;
    $("#curr_quantity").text(quantity);
    total = price * quantity;
    $("#add_to_cart_button").text("Add to Cart - $" + total + " USD");
}

function minus() {
    if(quantity > 0)
    {
        quantity--;
        $("#curr_quantity").text(quantity);
        total = price * quantity;
        $("#add_to_cart_button").text("Add to Cart - $" + total + " USD");        
    }
}

$(window).on('beforeunload', function() 
{
    if(isFavoritedNow !== isFavorited)
    {
        $.post('http://localhost/pepicase/public/product/toggleFavorite', {
            product: product_id,
            user_id: user,
        })
    }
});
const reviews = [
    {
      author: "Anonymous",
      rating: 5,
      comment: "so cuteee luv it soo much!!",
      date: "Jan 1, 2024"
    },
    {
      author: "Anonymous",
      rating: 5,
      comment: "so cuteee luv it soo much!! luv it soo much!! luv it soo much!! luv it soo much!!",
      date: "Jan 1, 2024"
    },
    {
      author: "Anonymous",
      rating: 5,
      comment: "so cuteee luv it soo much!!",
      date: "Jan 1, 2024"
    }
  ];
  
  const container = document.createElement("div");
  container.classList.add("reviews-container");
  
  reviews.forEach(review => {
    const reviewElement = document.createElement("div");
    reviewElement.classList.add("review");
  
    const authorElement = document.createElement("h3");
    authorElement.textContent = review.author;
    authorElement.style.color = "#844700";
  
    const ratingElement = document.createElement("div");
    ratingElement.classList.add("rating");
    for (let i = 0; i < review.rating; i++) {
      const starElement = document.createElement("i");
      starElement.classList.add("fas", "fa-star");
      ratingElement.appendChild(starElement);
    }
    const dateElement = document.createElement("span");
    dateElement.textContent = review.date;
    ratingElement.appendChild(dateElement);
  
    const commentElement = document.createElement("p");
    commentElement.textContent = review.comment;
  
    reviewElement.appendChild(authorElement);
    reviewElement.appendChild(ratingElement);
    reviewElement.appendChild(commentElement);
  
    container.appendChild(reviewElement);
  });
  
  document.body.appendChild(container);