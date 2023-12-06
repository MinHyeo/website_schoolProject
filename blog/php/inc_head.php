<?php
  session_start();
  if (isset($_SESSION['sno'])) {
    $jb_login = TRUE;
  }
  else{
    $jb_login = FALSE;
  }
?>