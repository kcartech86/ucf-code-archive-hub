<?php
function search_results($keywords) {
  $returned_results = array();
  $where = "";
 
  $keywords = preg_split('/[\s]+/', $keywords);

  $total_keywords = count($keywords);
 
  foreach($keywords as $key=>$keyword) {
    $where .= "`Product_Name` LIKE '%$keyword%'";
    if ($key != ($total_keywords - 1))  {
      $where .= " AND ";
  }


}
   $results = "SELECT `id`, `Product_Name`, `Description`, `Brand`, `Category` FROM `products` WHERE $where";
   $results_num = ($results = mysql_query($results)) ? mysql_num_rows($results) : 0;
    echo mysql_error();
   if ($results_num === 0) {
     return false;
  }  else {

     while ($results_row = mysql_fetch_assoc($results)) {
       $returned_results[] = array(
                   'id' => $results_row['id'],           
                   'Product_Name' => $results_row['Product_Name'],
                   'Description' => $results_row['Description'],
                   'Brand' => $results_row['Brand'],
                   'Category' => $results_row['Category'],
       );
     }
     return $returned_results;

  }
}

?>