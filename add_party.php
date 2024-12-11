<?php
include("conn.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $party_name = $_POST['party_name'];
    $phone_number = $_POST['phone_number'];
    $opening_balance = $_POST['opening_balance'];
    $you_gave = $_POST['you_gave'];
    $who_are_they = $_POST['who_are_they'];

    if (!empty($party_name) && !empty($you_gave) && !empty($who_are_they)) {
        $stmt = $conn->prepare("INSERT INTO parties (party_name, phone_number, opening_balance, you_gave, who_are_they) VALUES (:party_name, :phone_number, :opening_balance, :you_gave, :who_are_they)");
        $stmt->bindParam(':party_name', $party_name);
        $stmt->bindParam(':phone_number', $phone_number);
        $stmt->bindParam(':opening_balance', $opening_balance);
        $stmt->bindParam(':you_gave', $you_gave);
        $stmt->bindParam(':who_are_they', $who_are_they);

        if ($stmt->execute()) {
        header("location:transc.php");
        } else {
            echo "Error: " . $stmt->errorInfo()[2];
        }
    } else {
        echo "Please fill in all required fields.";
    }
}
?>
