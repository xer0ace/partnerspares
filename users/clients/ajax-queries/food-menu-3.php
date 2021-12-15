<?php

require_once '../include/config.php';
  if(ISSET($_POST['res'])){
    $query = $link->query("SELECT Name, Price FROM tbl_menu_list INNER JOIN tbl_food_item_list ON tbl_menu_list.Food_Item_ID = tbl_food_item_list.Food_Item_ID WHERE Menu_Number = 'Menu-03';");

    while($fetch = $query->fetch_array()){
      echo
        "
          <li>".$fetch['Name']." <span class='dots'>........................................................</span>₱".$fetch['Price']."</li>
        ";
      
    }
  }

?>                                       









          