<?php
include "connection.php";
if (isset($_GET['DeleteId'])) {
    $stmt_delete = $conn->prepare('DELETE FROM person WHERE id =:id');
    $stmt_delete->bindParam(':id', $_GET['DeleteId']);
    $stmt_delete->execute();

    header("Location: Read.php");
}
?>