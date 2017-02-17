<?php
Class Usuario
{
  public $id_login;
  public $nombre;
  public $fec_nacimiento;
  public $pass;

  public function __construct($e_mail, $nombre, $fec_nacimiento, $pass)
  {
    $this->id_login = $e_mail;
    $this->nombre = $nombre;
    $this->fec_nacimiento = $fec_nacimiento;
    $this->pass = md5($pass + ":::");
  }
}
?>
