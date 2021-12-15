   $(document).ready(function(){
          $('.notfound').hide();
          DisplayProducts();
          DisplayCategory();

          // Search all columns
          $('#search_name').keyup(function(){
              // Search Text
              var search = $(this).val();
                // Hide all table tbody rows
                $('table tbody tr').hide();
                  // Count total search result
                  var len = $('table tbody tr:not(.notfound) td:contains("'+search+'")').length;
                    if(len > 0)
                    {
                      // Searching text in columns and show match row
                      $('table tbody tr:not(.notfound) td:contains("'+search+'")').each(function(){$(this).closest('tr').show();
                          });
                      $('.notfound').hide();
                    }
                    else
                    {
                      $('.notfound').show();
                    }
          });


          function DisplayProducts() {
            $.ajax({
              url: 'ajax-queries/food-list.php',
              type: 'POST',
              data: {
                res: 1
              },
              success: function(response){
                $('#food-table').html(response);
              }
            })
          }


  function DisplayCategory(){
    $.ajax({
      url: 'ajax-queries/category-sequence.php',
      type: 'POST',
      data: {
        res: 1
      },
      success: function(response){
        $('#category-input').html(response);
      }
    })
  }

      //add to cart function
      $(document).on('click', '.add_to_cart', function(){
        var Food_Item_ID = $(this).attr('name');
        var Client_ID = $('#Client_ID').val();
        var cartID = $('#cartID').val();
        
        $.ajax({
          url: 'ajax-queries/add-to-cart.php',
          type: 'POST',
          data: {
            Food_Item_ID: Food_Item_ID,
            Client_ID: Client_ID,
            cartID: cartID
          },

          success: function(data){
            var obj = jQuery.parseJSON(data);
            if (obj == "You already have this Item on your list") {
              DisplayCartID();
              DisplayCart();
              alert(obj);
            }
            else{
              DisplayCartID();
              DisplayCart();
              alert(obj);
            }
            
          }
        });
      })


//add to cart function
      $(document).on('click', '.buy-now', function(){
        var Food_Item_ID = $(this).attr('name');
        var Client_ID = $('#Client_ID').val();
        var cartID = $('#cartID').val();
        
        $.ajax({
          url: 'ajax-queries/add-to-cart.php',
          type: 'POST',
          data: {
            Food_Item_ID: Food_Item_ID,
            Client_ID: Client_ID,
            cartID: cartID
          },

          success: function(data){
            var obj = jQuery.parseJSON(data);
            if (obj == "You already have this Item on your list") {
              DisplayCartID();
              DisplayCart();
              alert(obj);
            }
            else{
             window.location.replace("user-cart.php");
            }
            
          }
        });
      })  

  DisplayCartID();
  
  // display ID on input. input id is ="idinput"
  function DisplayCartID(){
    $.ajax({
      url: 'ajax-queries/cart-id-sequence.php',
      type: 'POST',
      data: {
        res: 1
      },
      success: function(response){
        $('#cart-id').html(response);
      }
    })
  }


 

});


// Case-insensitive searching (Note - remove the below script for Case sensitive search )
            $.expr[":"].contains = $.expr.createPseudo(function(arg) {
                return function( elem ) {
                    return $(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
                };
            });