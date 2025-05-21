<!DOCTYPE html>
<html lang="en">
<?php
 ini_set('display_errors', 0);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posyandu</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<?php include "db-con.php"; ?>

<body class="flex flex-col items-center gap-y-10">

    <?php
    // var_dump($_SESSION['login']);
    if ($_SESSION['login'] == false) {
        if ($_SESSION['pesan']) {
            echo "salah username atau password ";
        }

    ?>
        <form action="backside/login.php" method="post" class="flex flex-col my-36 items-center gap-y-2 ">
            <div class="flex flex-col h-56 w-64 bg-green-700 p-5 rounded-md">
                <div class="flex flex-col items-center">
                    <h2 class="rounded-lg font-sans font-bold text-lg">login user</h2>
                </div>
                <label for="usename">username</label>
                <input type="text" name="username" id="" class="rounded-lg border font-mono" required>
                <label for="password">password</label>
                <input type="text" name="password" id="" class="rounded-lg border font-mono" required>
            </div>

            <button class="bg-yellow-400 rounded-xl w-32" name="log-in">log-in</button>
        </form>

    <?php
    } else if ($_SESSION['login'] == true) {
        include 'caller.php';
    }
    ?>

</body>

</html>