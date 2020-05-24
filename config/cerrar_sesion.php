<?php 
    session_start(); $_SESSION['loggedin'] = FALSE; 
    session_destroy(); 
    header("Location: ../public/vista/paginashtml/index.php");
?>