<?php
echo "install-func run";
$env = [
    'DB_HOST' => $_POST["host"],
    'DB_PORT' => '3306',
    'DB_DATABASE' => $_POST["database"],
    'DB_USER' => $_POST["user"],
    'DB_PASSWORD' => $_POST["password"],
];

$conn = mysqli_connect($env["DB_HOST"], $env["DB_USER"], $env["DB_PASSWORD"], $env["DB_DATABASE"]);
if(!$conn) {
    die("connection failer:" . mysqli_connect_error());
} 
else 
{
    $content = "";
    foreach ($env as $key => $value) {
        $content .= "{$key}={$value}\n";
    }
    $file = __DIR__ . '/.env';
    if (file_put_contents($file, $content)) {
        echo ".env file created successfully at {$file}";
    } else {
        echo "Error creating .env file.";
    }

    $sql = "CREATE TABLE IF NOT EXISTS pizzas (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(25) NOT NULL,
        type VARCHAR(500),
        cost VARCHAR INT(11) NOT NULL
    )";
    $createadmin = $conn->query($sql);

    $sql = "CREATE TABLE IF NOT EXISTS admin (
        id INT AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(50) NOT NULL,
        password VARCHAR(50) NOT NULL
    )";
    $createadmin = $conn->query($sql);

    $sql = "CREATE TABLE IF NOT EXISTS info (
        id INT AUTO_INCREMENT PRIMARY KEY,
        type VARCHAR(25) NOT NULL,
        cost VARCHAR(1000)
    )";
    $createadmin = $conn->query($sql);

    $somearray = [
        ['Image', ''],
        ['Öppetider', ''],
        ['Kontakt', '']
    ];
    foreach ($somearray as $row) {
        $type = $row[0];
        $content = $row[1];
        $conn->query("INSERT INTO info (type, content) VALUES ('$type', '$content')");
    }
    $conn->query("INSERT INTO admin (email, password) VALUES ('viktorosterberg10@gmail.com', '123')");
    $conn->query("INSERT INTO pizzas (name, type, cost) VALUES ('testPizza', 'testToppings', 'testPrice kr')");


}

?>