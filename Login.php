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
$user = '';
$passwd = '';

if (isset($_POST['user'])) {
    $username = $_REQUEST['user'];
}
if (isset($_POST['passwd'])) {
    $password = $_REQUEST['passwd'];
}
    /* Check the request string for user and password */


        $sql = "SELECT * FROM users WHERE user_name = $user AND password = $passwd";
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
            session_unset();
            header("Location: Login.php"); // Redireciona para a página de login após o logout
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
        

        /* Example authentication */
        if ($stmt->rowsCount() > 0) {
            echo "Senha Certa";

            $auth = TRUE;
            $_SESSION['auth'] = TRUE;
            header("Location: Teste.php"); // Redireciona para a página de login após o logout
            exit();

        } else {
            echo "Senha Errada";
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
?>