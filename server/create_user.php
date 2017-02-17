<?php
require("Conect.php");
require("User.php");

try
{
  $conect = new Conect();
  $usuarios = [new Usuario("next.user1@nextu.com.co", "usuario uno", "1980-01-01", "123")
               ,new Usuario("next.user2@nextu.com.co", "usuario dos", "1990-07-23", "456")
               ,new Usuario("next.user3@nextu.com.co", "usuario tres", "1986-02-07", "987")];
  foreach($usuarios as $usuario)
  {
    $conect->initConexion("agendas");
    $resultado = $conect->insertData("USERS", (Array)$usuario);
    if($resultado>0){
      echo "$usuario->id_login registrado con éxito <br>";
    }
    else{
      echo "Al parecer el usuario $usuario->id_login ya se encuentra registrado ó el servidor no está disponible. Por favor intente autenticarse<br>";
    }
    $conect->cerrarConexion();
  }


}
catch(Exception $ex){
  print_r($ex);
}
?>
