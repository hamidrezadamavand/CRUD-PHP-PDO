<?php
include "connection.php";
if (isset($_POST['insert'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
$sql = "INSERT INTO person(firstname , lastname) VALUES (:firstname , :lastname)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':firstname',$firstname);
$stmt->bindParam(':lastname',$lastname);
$stmt->execute();
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
            <input type="text" class="form-control w-100" name="firstname" placeholder="firstname">
        </div>
        <div class="mb-3 col-sm-8">
            <label for="" class="form-label">LastName :</label>
            <input type="text" class="form-control w-100" name="lastname" placeholder="lastname">
        </div>
        <div class="mb-3 col-sm-8">
            <button type="submit" name="insert" class="btn btn-primary mb-3">Save</button>
        </div>
        <a href="index.php">home</a>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>
