<?php
session_start();

// only if the session exists

if (isset($_SESSION['is_logged_in'])) {
	unset($_SESSION['is_logged_in']);
}
header('Location: ../index.php');
