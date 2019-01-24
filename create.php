<?php include "templates/header.php";

include_once "dbConfig.php";

$connection = new DbConfig();
if (isset($_REQUEST['insert'])) {
    extract($_REQUEST);
    if ($connection->insertData($firstname, $lastname, $email, $age, $gender, "crud")) {
        header("location:index.php?status_insert=sucsess");
    }
}
?>
<nav class="pt-5">
    <a class="btn btn-outline-secondary" href="index.php">Back to home</a>
</nav>

<h2 class="my-5">Add a user</h2>
<div class="row">
    <div class="col-md-8 col-sm-12 order-md-1">
        <form method=" post">
            <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" name="firstname" id="firstname" class="form-control">
            </div>
            <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" name="lastname" id="lastname" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="text" name="email" id="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="text" name="age" id="age" class="form-control">
            </div>
            <p>Gender</p>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="gender" value="Male" checked>
                <label class="form-check-label" for="male">
                    Male
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="gender" value="Female">
                <label class="form-check-label" for="female">
                    Female
                </label>
            </div>
            <button class="btn btn-primary btn-lg my-5" type="submit" name="insert" value="Insert">Submit</button>

        </form>
    </div>
</div>




<?php include "templates/footer.php";?>