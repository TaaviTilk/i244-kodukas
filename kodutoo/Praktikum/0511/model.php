<?php 

  //    global $connection;
  $host="localhost";
  $user="test";
  $pass="t3st3r123";
  $db="test";
  $connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa ühendust mootoriga- ".mysqli_error());
  mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));
  
  
  function model_load(){
      global $connection;
      
//      $query = "SELECT ID, NIMETUS, KOGUS FROM ttilk__kaubad ORDER BY Nimetus ASC";
//      
//      $stmt = mysqli_stmt_prepare($connection, $query);
//      mysqli_stmt_execute($stmt);
//      mysqli_stmt_bind_result($stmt, $id, $nimetus, $kogus);
//      $rows = array ();
//      while(mysqli_stmt_fetch($stmt)){
//          $rows[] = array (
//              "ID"=> $id,
//              "NIMETUS"=>$nimetus,
//              "KOGUS"=>$kogus
//          );
//      }
//      mysqli_stmt_close($stmt);
//      return $kogus;
      
      $query = "SELECT * FROM ttilk__kaubad ORDER BY Nimetus ASC";
      $result = mysqli_query($connection, $query);
      $rows = array ();
      while ($row = mysqli_fetch_assoc($result)) {
          $rows = $row;          
      }
      return $row;
  }
  var_dump(model_load());
  
  function model_add($nimetus, $kogus){
      global $connection;
      
      $query = "INSERT IN TO ttilk__kaubad (Nimetus, Kogus) VALUES (?,?)";
      $stmt = mysqli_prepare($connection, $query);
      mysqli_stmt_bind_param($stmt, "si", $nimetus, $kogus);
      mysqli_stmt_execute($stmt);
      $id = mysqli_stmt_insert_id($stmt);
      mysqli_stmt_close($stmt);
      return $id;
      
  }
  function model_delete($id){
      global $connection;
      
      $query = "DELETE FROM ttilk__kaubad WHERE ID = ? LIMIT 1";
      $stmt = mysqli_prepare($connection, $query);
      mysqli_stmt_bind_param($stmt,"i", $id);
      mysqli_stmt_execute($stmt);
      $deleted = mysqli_stmt_affected_rows($stmt);
      mysqli_stmt_close($stmt);
      return $deleted;
      
      
  }
      
