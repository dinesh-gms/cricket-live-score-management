<?php
include 'config.php';
session_start();
error_reporting(0);
if (isset($_SESSION['username'])) {
    header("Location: index.php");
}
if (isset($_POST['submit'])) {
    $uname = trim($_POST['uname']);
    $pass = md5($_POST['pass']);
    $sql = "SELECT * FROM `admin` WHERE BINARY `username`= BINARY '$uname' AND `password`= '$pass'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        header("Location: index.php");
    } else {
        echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="..\assets\css\main.css">
    <link rel="stylesheet" href="..\assets\bootstrap\bootstrap.css">
    <style>
        body {
            background-color: #111;
        }

        .card {
            background-color: #212121;
            box-shadow: none;
        }

        .input:focus~label,
        input:valid~label {
            transform: translateY(-50%) scale(0.8);
            background-color: #212121;
            padding: 0 .2em;
            color: #fefefe;
        }
    </style>
</head>

<body>
    <div class="vh-100 container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <form action="" method="POST">
                            <h2 class="mb-4">Login</h2>
                            <div class="input-group">
                                <input type="text" class="input" name="uname" value="<?php isset($uname) ? print($uname) : print('admin'); ?>" autocomplete="nope" required>
                                <label class="user-label">Username</label>
                            </div>
                            <div class="input-group">
                                <input type="password" class="input" name="pass" value="<?php isset($_POST['pass']) ? print($_POST['pass']) : print('admin'); ?>" autocomplete="off" required>
                                <label class="user-label">Password</label>
                            </div>
                            <button class="login-btn" name="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
</body>

</html>