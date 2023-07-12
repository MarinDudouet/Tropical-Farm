<?php
session_start();
session_destroy();
header("Location: http://localhost:80/Tropical-Farm/index.php");
?>