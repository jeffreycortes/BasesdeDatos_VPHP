<?php
session_start();
session_destroy();
 ?>
<script>
  alert("Sesión cerrada con éxito");
  window.location = "../client/index.html";
</script>
