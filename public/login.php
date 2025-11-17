<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <?php
        if($_POST){
        include("../conn.php");

     //   $sql = "SELECT * FROM admin WHERE email = " . $_POST["email"] . "";
        $stmt = $conn->prepare("SELECT * FROM admin WHERE email = ?");
        $stmt->bind_param("s", $_POST["email"]);
        $stmt->execute();
        $result = $stmt->get_result();

        $userdatafromdb = $result->fetch_assoc();
        if(password_verify($_POST["password"], $userdatafromdb["password"])) {
            $_SESSION["gio"] = true;
            header("Location: /add.php");
            exit;
        }
       
        $conn->close();
    }   
        ?>
         <form action="" method="POST">
            <input type="text" name="email" placeholder="E-mail">
            <input type="text" name="password" placeholder="Password">
            <input type="submit">
        </form>
</body>
</html>