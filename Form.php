Please login:<br>
<form method="POST">
    <input type="text" name="user">
    <input type="password" name="passwd">
    <input type="submit" name="login"value="Log-in">
</form>
<?php
session_start();
include "BD.php";

if (isset($_POST['user'])) {
    $username = $_REQUEST['user'];
}
if (isset($_POST['passwd'])) {
    $password = $_REQUEST['passwd'];
}
if (isset($_POST['login'])) {
    $sql = "INSERT INTO users (user_name, password) VALUES ($username, $password)";
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    session_unset();
    header("Location: Login.php"); // Redireciona para a página de login após o logout
    exit();
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
}

?>