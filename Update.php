<?php
include "connection.php";
if (isset($_GET['UpdateId'])) {
    $id = $_GET['UpdateId'];
    $select_stmt = $conn->prepare('SELECT * FROM person WHERE id =:id');
    $select_stmt->bindParam(':id', $id);
    $select_stmt->execute();
    $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
    extract($row);
}
if (isset($_POST['update'])) {
    $id = $_GET['UpdateId'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $sql = "UPDATE person SET firstname=:firstname, lastname=:lastname WHERE id=:id";
    $update_stmt = $conn->prepare($sql);
    $update_stmt->bindParam(':firstname', $firstname);
    $update_stmt->bindParam(':lastname', $lastname);
    $update_stmt->bindParam(':id', $id);
    $update_stmt->execute();
    header("Read.php");
}
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Create</title>
</head>
<body>
<div class="container d-flex justify-content-center">
    <form method="post" class="mt-5 row">
        <div class="mb-3 col-sm-8">
            <label for="" class="form-label">FirstName : </label>
            <input type="text" class="form-control w-100" name="firstname" value="<?= $row['firstname']; ?>">
        </div>
        <div class="mb-3 col-sm-8">
            <label for="" class="form-label">LastName :</label>
            <input type="text" class="form-control w-100" name="lastname" value="<?= $row['lastname']; ?>">
        </div>
        <div class="mb-3 col-sm-8">
            <button type="submit" name="update" class="btn btn-primary mb-3">Update</button>
        </div>
        <a href="Read.php">Read</a>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>
