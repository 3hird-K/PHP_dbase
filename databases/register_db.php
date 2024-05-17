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

    // CREATE|INSERT DATA //
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
        if (!empty($_POST["fname"]) && !empty($_POST["lname"]) && !empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["retyped_pass"])) {

            $fname = $_POST["fname"];
            $lname = $_POST["lname"];
            $username = $_POST["username"];
            $password = $_POST["password"];
            $retyped_password = $_POST["retyped_pass"];

            if ($password === $retyped_password) {
                $pass_hashed = password_hash($password, PASSWORD_DEFAULT);


                $query = "INSERT INTO users (fname, lname, username, password) VALUES (?, ?, ?, ?)";
                $stmt = mysqli_prepare($conn, $query);
                mysqli_stmt_bind_param($stmt, "ssss", $fname, $lname, $username, $pass_hashed);

                if (mysqli_stmt_execute($stmt)) {
                    echo "
                        <script>
                            $(document).ready(function() {
                                $('#account_create').modal('show');
                            });
                        </script>
                        <div class='modal fade' id='account_create' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                            <div class='modal-dialog'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h1 class='modal-title fs-5' id='exampleModalLabel'>Modal title</h1>
                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                    </div>
                                    <div class='modal-body'>
                                        <p class='text-success'>User Registered Successfully!</p>
                                    </div>
                                    <div class='modal-footer'>
                                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Ok</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>alert('User Registered Successfully!');</script>

                    ";
                } else {
                    echo "
                    <div class='modal fade' id='account_create' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                            <div class='modal-dialog'>
                                <div class='modal-content'>
                                <div class='modal-header'>
                                    <h1 class='modal-title fs-5' id='exampleModalLabel'>Modal title</h1>
                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                </div>
                                <div class='modal-body'>
                                    <p class='text-success'>Failed to Register Account!</p>
                                </div>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                    <button type='button' class='btn btn-primary'>Save changes</button>
                                </div>
                                </div>
                            </div>
                        </div>
                        <script>alert('Failed to Register Account!');</script>
                    ";
                }
                mysqli_stmt_close($stmt);
            } else {
                $_SESSION["unmatched_key"] = "<p class='text-danger'>Password do not match.</p>";
            }
        } else {
            $_SESSION["fields_required"] = "<p class='text-danger'>All fields are required.</p>";
        }
    }
}
