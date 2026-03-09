<?php
session_start();
session_destroy();
header("Location: Trangchu.php");
exit();