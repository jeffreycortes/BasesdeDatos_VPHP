<?php
require("Conect.php");
require("User.php");
try{
  $usr_login = $_REQUEST["usr_login"];
  $pass = md5($_REQUEST["pass"] + ":::");

  $conect = new Conect();
  $on = $conect->initConexion("agendas") == "OK";
  if($on){
    $data = $conect->consultar(["USERS"], ["*"],"WHERE ID_LOGIN = '${usr_login}' AND PASS = '${pass}'");
    $on = $conect->cerrarConexion();
    if($data->num_rows > 0){
      session_start();
      $_SESSION["usr_login"] = $usr_login;
      echo '{"msg":"OK"}';
    }
    else{
      echo '{"msg":"'.$usr_login.' no exists. Pass-> '.$pass.'"}';
    }
  }
}catch(Exception $ex){
  echo $ex;
}
 ?>
