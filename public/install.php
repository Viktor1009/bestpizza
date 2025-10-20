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
        require('../install-func.php');
    }
    ?>
    <form action="" method="POST">
        <input type="text"  name="host" placeholder="Host">
        <input type="text"  name="database" placeholder="Database">
        <input type="text"  name="password" placeholder="Password">
        <input type="text"  name="user" placeholder="User">
        <input type="text"  name="loginpassword" placeholder="">
        <input type="text"  name="loginemail" placeholder="User">
        <input type="submit" name="go" >
    </form>
    
</body>
</html>


