<?php
session_start();

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
} else {
    /* Check the request string for user and password */
    $user = '';
    $passwd = '';

    if (isset($_POST['user'])) {
        $user = $_REQUEST['user'];
    }

    if (isset($_POST['passwd'])) {
        $passwd = $_REQUEST['passwd'];
    }

    /* Example authentication */
    if (($user == '1') && ($passwd == '1')) {
        $auth = TRUE;
        /* Save the authorized state in the Session array */
        $_SESSION['auth'] = TRUE;
        header("Location: Teste.php"); // Redireciona para a página de login após o logout
        exit();
    }
}
if (!$auth) {
    /* Show the login form */
    ?>

        Please login:<br>
        <form method="POST">
            <input type="text" name="user">
            <input type="password" name="passwd">
            <input type="submit" value="Log-in">
        </form>
        <?php
}
?>