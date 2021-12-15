$(document).ready(function(){
DisplayProducts();

disableDineIn();
disableDelivery();

DisplayTables();
DisplayDeliveryOptions();

$('#select-dine-in').hide();
$('#select-delivery-payment').hide();

//see summary orders 
$('#checkout-bttn').on('click', function(){

var inputs = document.getElementsByClassName( 'food-quantity' ),
    names  = [].map.call(inputs, function( input ) {
        return input.value;
    }).join('<br>\n');

  $('textarea#summaryorders').val(names);


});

//load cart
function DisplayProducts() {
  var Client_ID = $('#Client_ID').val();
  $.ajax({
    url: 'ajax-queries/cart-list.php',
    type: 'POST',
    data: {
      Client_ID: Client_ID,
      res: 1
    },
    success: function(response){
      $('#food-table').html(response);
    }
  })
}

//load tables
function DisplayTables() {
    // DINE IN OPTION 
    $.ajax({
      url: 'ajax-queries/dine-in.php',
      type: 'POST',
      data: {
        res: 1
      },
      success: function(response){
        $('#select-dine-in').html(response);      
      } 
    })
}


//load Delivery Options
function DisplayDeliveryOptions() {

    // DINE IN OPTION 
     $.ajax({
        url: 'ajax-queries/delivery.php',
        type: 'POST',
        data: {
          res: 1
        },
        success: function(response){
          $('#select-delivery-payment').html(response);
        }
      })

}


//remove item function
  $(document).on('click', '.remove-item', function(){
    var cart_id = $(this).attr('name');
    var Client_ID = $('#Client_ID').val();
    $.ajax({
      url: 'ajax-queries/remove-from-cart.php',
      type: 'POST',
      data: {
        Client_ID: Client_ID,
        cart_id: cart_id
      },

      success: function(data){
        DisplayCart();
        DisplayToPay();
      }
    });
  })

 


   $("#selection-method").on('change', function(){
      
      var year = $("#selection-method").val();

          if (year == "Dine In") 
          {
              activateDineIn();
              disableDelivery();
              $('#select-dine-in').show();
              $('#select-delivery-payment').hide();
          }
          

          else if (year == "Delivery")
          {
              activateDelivery();
              disableDineIn();
              $('#select-dine-in').hide();
              $('#select-delivery-payment').show();

          } 
          else
          {

          $('#select-dine-in').hide();
          $('#select-delivery-payment').hide();
          }

       
      });



                                //place order function
                                $('#dine-in-button').on('click', function(){

                                    var inputs = document.getElementsByClassName( 'food-quantity' ),
                                        names  = [].map.call(inputs, function( input ) {
                                            return input.value;
                                        }).join('<br>\n');

                                    var Client_ID = $('#Client_ID').val();
                                    var item_quantity = $('#itemquantity').val();
                                    var total_price = $('#totalprice').val();
                                    var table = $("#select-table").val();

                                    if (table == "Table") {
                                      var message = "Please select an available table";
                                      document.getElementById("checkout-message").innerHTML = message;
                                    }
                                    else
                                    {
                                          $.ajax({
                                            url: 'ajax-queries/place-order.php',
                                            type: 'POST',
                                            data: {
                                              Client_ID: Client_ID,
                                              names: names,
                                              item_quantity: item_quantity,
                                              total_price: total_price,
                                              table: table
                                            },

                                            success: function(data){
                                              var obj = jQuery.parseJSON(data);

                                              if (obj == "existing") {
                                              alert('You still have items to pay, complete the payment first or cancel the item to place these items on checkout');

                                              DisplayToPay();
                                              DisplayCart();
                                              DisplayProducts();
                                              }
                                              else
                                              {
                                                window.location.replace("orders-to-pay.php");
                                              }

                                            }
                                          });
                                    }     

                                });




                                $('#delivery-button').on('click', function(){

                                    var inputs = document.getElementsByClassName( 'food-quantity' ),
                                        names  = [].map.call(inputs, function( input ) {
                                            return input.value;
                                        }).join('<br>\n');

                                    var Client_ID = $('#Client_ID').val();
                                    var item_quantity = $('#itemquantity').val();
                                    var total_price = $('#totalprice').val();
                                    var delivery = $("#select-delivery").val();

                                          if (delivery == "Pay Now") {
                                            $.ajax({
                                                  url: 'ajax-queries/place-delivery.php',
                                                  type: 'POST',
                                                  data: {
                                                    Client_ID: Client_ID,
                                                    names: names,
                                                    item_quantity: item_quantity,
                                                    total_price: total_price,
                                                    delivery: delivery
                                                  },

                                                  success: function(data){
                                                    var obj = jQuery.parseJSON(data);

                                                    if (obj == "existing") {
                                                    alert('You still have items to pay, complete the payment first or cancel the item to place these items on checkout');

                                                    DisplayToPay();
                                                    DisplayCart();
                                                    DisplayProducts();
                                                    }
                                                    else
                                                    {
                                                      window.location.replace("orders-to-pay.php");
                                                    }

                                                  }
                                                });
                                          }
                                          else if (delivery == "COD")
                                          {
                                            $.ajax({
                                                  url: 'ajax-queries/cash-on-delivery.php',
                                                  type: 'POST',
                                                  data: {
                                                    Client_ID: Client_ID,
                                                    names: names,
                                                    item_quantity: item_quantity,
                                                    total_price: total_price,
                                                    delivery: delivery
                                                  },

                                                  success: function(data){
                                                    window.location.replace("orders-pending.php");
                                                    
                                                  }
                                                });
                                            
                                          }
                                          else
                                          {
                                            var message = "Please select a payment method";
                                            document.getElementById("checkout-message").innerHTML = message;
                                          }     

                                });



});



function disableDineIn() {
  var myDinebttn = document.getElementById("dine-in-button").disabled = true;
}

function activateDineIn() {
  var activateDinebttn = document.getElementById("dine-in-button").disabled = false;
}



function disableDelivery() {
  var myDeliverybttn = document.getElementById("delivery-button").disabled = true;
}

function activateDelivery() {
  var activateDeliverybttn = document.getElementById("delivery-button").disabled = false;
}