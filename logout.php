<?php
session_start();
session_unset();
session_destroy();

// Redirigimos al login en lugar del index público
header("Location: login.php");
exit;
?>