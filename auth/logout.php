<?php 
echo('<script>alert(""); document.location="index.php"');
session_start();
session_destroy();
header("location: index.php");
