<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $action = $_POST['action'];

    if ($action === 'add') {
        $name = $_POST['name'];
        $quantity = (int)$_POST['quantity'];
        $price = (float)$_POST['price'];

        $stmt = $conn->prepare("INSERT INTO items (name, quantity, price) VALUES (?, ?, ?)");
        $stmt->bind_param("sii", $name, $quantity, $price);
        $stmt->execute();
        $stmt->close();

        header("Location: index.php");
        exit();
    }

    if ($action === 'delete') {
        $id = (int)$_POST['id'];

        $stmt = $conn->prepare("DELETE FROM items WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();

        header("Location: index.php");
        exit();
    }
}
?>