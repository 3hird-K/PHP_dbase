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

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["admin"])) {
        $username = mysqli_real_escape_string($conn, $_POST["username"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);

        if ($username === "administrator") {
            if (password_verify(trim($password), '$2y$10$lWg79SC84w4qgSAx8w3BSeun.StCi5fX0lG6ocC3vh/qz3L3hTDii')) {
                $_SESSION["username"] = $username;
                header("Location: home.php");
                exit();
            } else {
                $_SESSION["error_message"] = "Incorrect password!";
            }
        } else {
            $_SESSION["error_message"] = "Invalid username!";
        }
    }
}
