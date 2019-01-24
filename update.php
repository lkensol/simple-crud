<?php include "templates/header.php";
include_once "dbConfig.php";
$connection = new DbConfig();

if (isset($_REQUEST['update'])) {
    extract($_REQUEST);
    if ($connection->update($id, $firstname, $lastname, $email, $age, $gender, "crud")) {
        header("location:index.php?status=sucsess");
    }
}
extract($connection->getById($_REQUEST['id'], "crud"));
?>

<nav class="pt-5">
    <a class="btn btn-outline-secondary" href="index.php">Back to home</a>
</nav>

<h2 class="my-5">Edit Your Data</h2>

<div class="row">
    <div class="col-md-8 col-sm-12 order-md-1">
        <form action="update.php" method="post">
            <!-- <table class="table table-bordered"> -->
            <div class="form-group">
                <label for="id">Id</label>
                <input type="text" name="id" id="id" class="form-control" value="<?php echo $id ?>" readonly="readonly">
            </div>
            <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" name="firstname" id="firstname" class="form-control"
                    value="<?php echo $firstname ?>">
            </div>
            <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" name="lastname" id="lastname" class="form-control" value="<?php echo $lastname ?>">
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="text" name="email" id="email" class="form-control" value="<?php echo $email ?>">
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="text" name="age" id="age" class="form-control" value="<?php echo $age ?>">
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

            <!-- </table> -->
            <button class="btn btn-primary btn-lg my-5" type="submit" name="update" value="Update">Update</button>
        </form>


    </div>
</div>


<?php include "templates/footer.php";?>