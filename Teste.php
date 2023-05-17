<?php
session_start();

if (isset($_POST['logout'])) {
    session_unset();
    header("Location: Login.php"); // Redireciona para a página de login após o logout
    exit();
}

if (!isset($_SESSION['visits'])) {
    $_SESSION['visits'] = 0;
}
/* Is the client authenticated? */
$auth = FALSE;
/* Check the Session array to see if this client is already authenticated */
if (isset($_SESSION['auth'])) {
    $auth = TRUE;
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
    if (($user == 'user') && ($passwd == 'passwd')) {
        $auth = TRUE;
        /* Save the authorized state in the Session array */
        $_SESSION['auth'] = TRUE;
    }
}
if ($auth) {
    echo 'Aqui está o conteúdo privado.<br>';
    ?>
    <form method="post">
        <input type="submit" name="logout" value="Log-out">
        </form>
        <?php

} else {
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
echo 'Visitou essa página ' . $_SESSION['visits']++ . ' vezes.<br>';

echo "Teste";

$variavel = 10;

echo $variavel . "<br>";

$cars = ['Toyota', 'BMW', 'Ford', 'Ferrari'];
foreach ($cars as $key => $car) {
    echo $key . ": ";
    echo $car;
    echo '<br>';
}
?>