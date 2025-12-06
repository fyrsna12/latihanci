<?php
// File: generate_hash.php
$password_admin = 'admin123'; 
$hash_baru = password_hash($password_admin, PASSWORD_DEFAULT);
echo "Password: " . $password_admin . "<br>";
echo "Hash Baru: " . $hash_baru . "<br>";
?>