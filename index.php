<?php include "templates/header.php";
include_once "dbConfig.php";

$connection = new DbConfig();

if (isset($_REQUEST['status'])) {
    echo "<div class=\"mt-5 alert alert-success\" role=\"alert\"> Your Data Successfully Updated </div>";
}

if (isset($_REQUEST['status_insert'])) {
    echo "<div class=\"mt-5 alert alert-success\" role=\"alert\"> Your Data Successfully Inserted</div>";
}

if (isset($_REQUEST['del_id'])) {
    if ($connection->deleteData($_REQUEST['del_id'], "crud")) {

        echo "<div class=\"mt-5 alert alert-success\" role=\"alert\"> Your Data Successfully Deleted</div>";
    }
}
?>
<h1 class="my-5">Simple Database App</h1>
<table class="table table-bordered my-5">
    <thead>
        <th scope="col">#</th>
        <th scope="col">First name</th>
        <th scope="col">Last name</th>
        <th scope="col">Email</th>
        <th scope="col">Gender</th>
        <th scope="col">Age</th>
        <th scope="col">Action</th>
    </thead>
    <tbody>
        <?php
foreach ($connection->showData("crud") as $value) {
    extract($value);
    echo <<< EOF
                    <tr>
                    <td>$id</td>
                    <td>$firstname</td>
                    <td>$lastname</td>
                    <td>$email</td>
                    <td>$gender</td>
                    <td>$age</td>
                    <td><a href="update.php?id=$id"><button class="btn btn-primary">Edit</button></a>&nbsp;&nbsp;<a href="index.php?del_id=$id"><button class="btn btn-danger">Delete</button></a></td>
                    </tr>
                    EOF;
}

?>
    </tbody>
</table>
<div class="btn-group">

    <a href="create.php"> <button class="btn btn-secondary btn-lg mb-5">Insert New Data</button></a>

</div>
<?php include "templates/footer.php";?>