<?php
  session_start();
<<<<<<< HEAD
  if( isset( $_SESSION[ 'sno' ] ) ) {
=======
  if (isset($_SESSION['sno'])) {
>>>>>>> DanielHan0117
    $jb_login = TRUE;
  }
  else{
    $jb_login = FALSE;
  }
?>