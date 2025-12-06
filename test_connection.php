<?php
// test_connection.php
echo "Testing connection to latihanci_fix...<br>";

$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'latihanci_fix';

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected!<br>";

// Cek data user
$query = "SELECT id_user, name, email, password FROM `user`";
$result = mysqli_query($conn, $query);

echo "<h3>Users in latihanci_fix:</h3>";
while($row = mysqli_fetch_assoc($result)) {
    echo "ID: " . $row['id_user'] . "<br>";
    echo "Name: " . $row['name'] . "<br>";
    echo "Email: " . $row['email'] . "<br>";
    echo "Password (hash): " . substr($row['password'], 0, 20) . "...<br>";
    echo "---<br>";
}

// Test password
echo "<h3>Test Password Match:</h3>";
$password_to_test = '09876'; // password sina
$hash_from_db = ''; // ambil dari query di atas

$query2 = "SELECT password FROM `user` WHERE email='leesina1920@gmail.com'";
$result2 = mysqli_query($conn, $query2);
if($row2 = mysqli_fetch_assoc($result2)) {
    $hash_from_db = $row2['password'];
    $is_match = password_verify($password_to_test, $hash_from_db);
    echo "Password '09876' matches hash? : " . ($is_match ? 'YES' : 'NO') . "<br>";
    echo "Hash in DB: " . $hash_from_db . "<br>";
}

mysqli_close($conn);
?>