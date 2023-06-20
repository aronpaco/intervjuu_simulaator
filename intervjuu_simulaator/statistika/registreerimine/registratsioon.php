<?php
    session_start();

    // Create connection
    require_once "../../../../config.php";
    $conn = new mysqli($server_host, $server_user_name, $server_password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Ühenduse loomine ebaõnnestus: " . $conn->connect_error);
    }

    $error = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get values from form
        $name = $_POST["name"];
        $username = $_POST["username"];
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // hash the password

        // Check if username already exists
        $checkUsername = "SELECT * FROM admin WHERE kasutajanimi = '$username'";
        $result = $conn->query($checkUsername);

        if ($result->num_rows > 0) {
            $error = "Kasutajanimi on juba võetud";
        } else {
            // validate the passwords
            if ($_POST["password"] == $_POST["confirm_password"]) {
                // Construct the SQL query
                $sql = "INSERT INTO admin (kasutajanimi, parool, nimi) VALUES ('$username', '$password', '$name')";

                // Execute the query
                if ($conn->query($sql) === TRUE) {
                    $last_insert_id = $conn->insert_id; // Get the auto-generated ID of the inserted record
                    echo "Uus kirje loodud edukalt. ID: " . $last_insert_id;
                } else {
                    echo "Viga: " . $sql . "<br>" . $conn->error;
                }
            } else {
                $error = "Paroolid ei kattu";
            }
        }
    }

    $conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin kasutajate registreerimine</title>
    <link rel="stylesheet" type="text/css" href="registratsioon.css">
</head>
<body>
    <div class="container">
        <h2>Admini registeerimine</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="row">
                <div class="col-25">
                    <label for="name">Nimi:</label>
                </div>
                <div class="col-75">
                    <input type="text" id="name" name="name" required>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="username">Kasutajanimi:</label>
                </div>
                <div class="col-75">
                    <input type="text" id="username" name="username" required>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="password">Parool:</label>
                </div>
                <div class="col-75">
                    <input type="password" id="password" name="password" required>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="confirm_password">Kinnita Parool:</label>
                </div>
                <div class="col-75">
                    <input type="password" id="confirm_password" name="confirm_password" required>
                </div>
            </div>
            <div class="row">
                <input type="submit" value="Register">
            </div>
        </form>
        <div id="popup" class="popup">
            <span class="close-btn" onclick="closePopup()">&times;</span>
            <p id="errorMsg"><?php echo $error; ?></p>
        </div>
    </div>

    <script>
        function closePopup() {
            var popup = document.getElementById("popup");
            popup.style.display = "none";
        }

        window.onload = function() {
            var error = document.getElementById("errorMsg").innerText.trim();
            if (error.length > 0) {
                var popup = document.getElementById("popup");
                popup.style.display = "block";
            }
        };

        document.addEventListener("DOMContentLoaded", function () {
            document.querySelector("form").addEventListener("submit", function (e) {
                var password = document.getElementById("password").value;
                var confirmPassword = document.getElementById("confirm_password").value;

                if (password !== confirmPassword) {
                    e.preventDefault();
                    var popup = document.getElementById("popup");
                    document.getElementById("errorMsg").innerText = "Paroolid ei kattu";
                    popup.style.display = "block";
                }
            });
        });
    </script>
</body>
</html>
