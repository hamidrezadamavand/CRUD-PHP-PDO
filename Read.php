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
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <table class="table table-striped mt-5">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">FirstName</th>
                    <th scope="col">LastName</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $num = 1;
                $result = $conn->prepare("SELECT * FROM person");
                $result->execute();
                $Persons = $result->fetchAll(PDO::FETCH_ASSOC);
                foreach ($Persons as $Person) { ?>
                    <tr>
                        <th scope="row"><?= $num++; ?></th>
                        <td><?php echo $Person['firstname'] ?></td>
                        <td><?php echo $Person['lastname'] ?></td>
                        <td> <a href="Update.php?UpdateId=<?= $Person['id']; ?>" class="btn btn-primary">Update</a></td>
                        <td><a class="btn btn-danger"
                               href="Delete.php?DeleteId=<?= $Person['id']; ?>"
                               title="click for delete"
                               onclick="return confirm('Are you sure you want to delete ?')">Delete</a></td>
                    </tr>
                <?php }
                ?>
                </tbody>
            </table>
        </div>

    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>
