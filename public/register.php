<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if($_POST)/* körs varje gång något uppdateras till Post med hjälp av method POST*/{
        require("../conn.php");
        if($_POST["posttype"] == "register"){
            echo "registered";

            $stmt = $conn->prepare("INSERT INTO admin (email, password) VALUES(?,?)");
            $stmt->bind_param("ss", $_POST["email"], $_POST["password"]);
            $stmt->execute();
            $stmt->close();
            $conn->close();
        } 
    }
        ?>

    <form action="" method="POST">
        <input type="text" name="email" placeholder="E-mail">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" name="posttype" value="register">
    </form>
</body>
</html>