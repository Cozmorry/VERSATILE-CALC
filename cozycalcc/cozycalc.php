<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cozycalc";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function add($a, $b) {
    return $a + $b;
}

function subtract($a, $b) {
    return $a - $b;
}

function multiply($a, $b) {
    return $a * $b;
}

function divide($a, $b) {
    if ($b == 0) {
        return "ERROR! Division by zero!";
    }
    return $a / $b;
}

function exponentiate($a, $b) {
    return pow($a, $b);
}

function percentage($a, $b) {
    return ($a / $b) * 100;
}

function squareRoot($a) {
    return sqrt($a);
}

function logarithm($a, $base = 10) {
    return log($a, $base);
}

$result = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = floatval($_POST["num1"]);
    $num2 = isset($_POST["num2"]) ? floatval($_POST["num2"]) : 0;
    $operation = $_POST["operation"];

    switch ($operation) {
        case "add":
            $result = add($num1, $num2);
            break;
        case "subtract":
            $result = subtract($num1, $num2);
            break;
        case "multiply":
            $result = multiply($num1, $num2);
            break;
        case "divide":
            $result = divide($num1, $num2);
            break;
        case "exponentiate":
            $result = exponentiate($num1, $num2);
            break;
        case "percentage":
            $result = percentage($num1, $num2);
            break;
        case "squareRoot":
            $result = squareRoot($num1);
            break;
        case "logarithm":
            $result = logarithm($num1);
            break;
        default:
            $result = "Invalid operation!";
            break;
    }

    $stmt = $conn->prepare("INSERT INTO calculations (num1, num2, operation, result) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ddss", $num1, $num2, $operation, $result);
    $stmt->execute();
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cozy Calculator</title>
    <link rel="stylesheet" type="text/css" href="cozycss.css">
</head>
<body>
    <h2>Cozy Calc</h2>
    <form method="post" action="">
        <label for="num1">Number 1:</label>
        <input type="number" step="any" id="num1" name="num1" required>
        <br><br>
        <label for="num2">Number 2:</label>
        <input type="number" step="any" id="num2" name="num2">
        <br><br>
        <label for="operation">Operation:</label>
        <select id="operation" name="operation">
            <option value="add">Add</option>
            <option value="subtract">Subtract</option>
            <option value="multiply">Multiply</option>
            <option value="divide">Divide</option>
            <option value="exponentiate">Exponentiate</option>
            <option value="percentage">Percentage</option>
            <option value="squareRoot">Square Root</option>
            <option value="logarithm">Logarithm</option>
        </select>
        <br><br>
        <input type="submit" value="Calculate">
    </form>
    <h3>Result: <?php echo $result; ?></h3>
</body>
</html>
