<?php
session_start();

// DB CONNECTION //
$db_server = "localhost";
$db_user = "admins"; // root
$db_key = "pass2k24"; // ""
$db_name = "student_accounts"; // your db name created
$conn = ""; // any name you want for your connection name

try {
    $conn = mysqli_connect($db_server, $db_user, $db_key, $db_name);
} catch (mysqli_sql_exception) {
    echo "<div class='container pt-2 position-fixed top-0 start-50 translate-middle-x'>
    <div class='row justify-content-center'>
        <div class='col-12 text-center'>
            <img src='img/no-signal.png' class='img-fluid' style='max-width: 50px;'> 
            <p>You're not connected</p>
        </div>
    </div>
</div>";
}

if ($conn) {
    echo "<div class='container pt-2 position-fixed top-0 start-50 translate-middle-x'>
    <div class='row justify-content-center'>
        <div class='col-12 text-center'>
            <img src='img/wifi.png' class='img-fluid' style='max-width: 50px;'> 
            <p>You're connected</p>
        </div>
    </div>
</div>";





    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
        $username = mysqli_real_escape_string($conn, $_POST["username"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);

        $retrieve = "SELECT * FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $retrieve);
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            if (password_verify(trim($password), $row['password'])) {
                $_SESSION["username"] = $row["username"];
                $_SESSION["success_message"] = "Please enter a correct password!";

                header("location: home.php");
                exit();
            } else {
                unset($_SESSION["ID"]);
                unset($_SESSION["username"]);
                $_SESSION["error_message"] = "Incorrect password!";
            }
        } else {
            $_SESSION["error_message"] = "Invalid, User not found!";
            unset($_SESSION["ID"]);
            unset($_SESSION["username"]);
        }

        mysqli_stmt_close($stmt);
    }
}
