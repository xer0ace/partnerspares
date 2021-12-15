   $(document).ready(function(){
          $('.notfound').hide();
          DisplayProducts();

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
              url: 'ajax-queries/order-in-transit-list.php',
              type: 'POST',
              data: {
                res: 1
              },
              success: function(response){
                $('#food-table').html(response);
              }
            })
          }

      //cancel function
      $(document).on('click', '.cancel', function(){
        var Pending_Orders_ID = $(this).attr('name');
        
        $.ajax({
          url: 'ajax-queries/order-cancel.php',
          type: 'POST',
          data: {
            Pending_Orders_ID: Pending_Orders_ID
          },

          success: function(data){
            DisplayProducts();
            DisplayPending();
            DisplayPreparing();
            DisplayInTransit();
            DisplayCompleted();
            DisplayCancelled();
          }
        });
      })

      //pending function
      $(document).on('click', '.pending', function(){
        var Pending_Orders_ID = $(this).attr('name');
        
        $.ajax({
          url: 'ajax-queries/order-pending.php',
          type: 'POST',
          data: {
            Pending_Orders_ID: Pending_Orders_ID
          },

          success: function(data){
            DisplayProducts();
            DisplayPending();
            DisplayPreparing();
            DisplayInTransit();
            DisplayCompleted();
            DisplayCancelled();
          }
        });
      })
  
  //complete function
      $(document).on('click', '.complete', function(){
        var Pending_Orders_ID = $(this).attr('name');
        
        $.ajax({
          url: 'ajax-queries/order-complete.php',
          type: 'POST',
          data: {
            Pending_Orders_ID: Pending_Orders_ID
          },

          success: function(data){
            DisplayProducts();
            DisplayPending();
            DisplayPreparing();
            DisplayInTransit();
            DisplayCompleted();
            DisplayCancelled();
          }
        });
      })

});


// Case-insensitive searching (Note - remove the below script for Case sensitive search )
            $.expr[":"].contains = $.expr.createPseudo(function(arg) {
                return function( elem ) {
                    return $(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
                };
            });