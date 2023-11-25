<?php
    if(!isset($_SESSION['showMessage'])){
        $_SESSION['showMessage'] = false;
    }
    //Gera mensagem de retorno do redirectWithMessage
    if($_SESSION['showMessage']){
      echo $_SESSION['contentMessage'];
      $_SESSION['showMessage'] = false;
    }
?>