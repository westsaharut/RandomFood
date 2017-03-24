<?php
  session_start();
  session_destroy();
  echo "<script>alert(\"Logout complete!\")
  window.location.href=\"../login.php\";</script>";
?>
