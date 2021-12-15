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
            var Client_ID = $('#Client_ID').val();
            $.ajax({
              url: 'ajax-queries/orders-cancelled-list.php',
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

   
  

});


// Case-insensitive searching (Note - remove the below script for Case sensitive search )
            $.expr[":"].contains = $.expr.createPseudo(function(arg) {
                return function( elem ) {
                    return $(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
                };
            });