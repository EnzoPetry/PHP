<?php
session_start();
include "BD.php";

if (!isset($_SESSION['visits'])) {
    $_SESSION['visits'] = 0;
}
/* Is the client authenticated? */
$auth = FALSE;
/* Check the Session array to see if this client is already authenticated */
if (isset($_SESSION['auth'])) {
    $auth = TRUE;
    header("Location: Teste.php"); // Redireciona para a página de login após o logout
    exit();
}
if (!$auth) {
    ?>

    Please login:<br>
    <form method="POST">
        <input type="text" name="user">
        <input type="password" name="passwd">
        <input type="submit" name="login" value="Log-in">
        <input type="submit" value="Sign-in">
    </form>
    <?php
}
$user = '';
$passwd = '';

if (isset($_POST['user'])) {
    $username = $_REQUEST['user'];
}
if (isset($_POST['passwd'])) {
    $password = $_REQUEST['passwd'];
}
/* Check the request string for user and password */
if (isset($_POST['login'])) {

    if (!empty($username) && !empty($password)) {
        $sql = "SELECT * FROM users WHERE user_name = ? AND password = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(1, $username);
        $stmt->bindParam(2, $password);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "<p>Autenticação bem-sucedida.</p>";
            $_SESSION['auth'] = TRUE;
            sleep(2);
        } else {
            echo "<p>Usuário ou senha inválidos.</p>";
            session_unset();
            exit();
        }
    }
}
?>