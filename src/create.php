<?php
require_once "connection_mysql.php";

if(isset($_POST['save']))
{    
    $sql = "CREATE TABLE IF NOT EXISTS users(
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(255) DEFAULT NULL,
        mobile VARCHAR(255) DEFAULT NULL,
        email VARCHAR(255) DEFAULT NULL
    )";
    mysqli_query($conn, $sql);


    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $sql = "INSERT INTO users (name,mobile,email)
    VALUES ('$name','$mobile','$email')";
    if (mysqli_query($conn, $sql)) {
       header("location: index.php");
       exit();
    } else {
       echo "Error: " . $sql . "
" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <?php include "head.php"; ?>
</head>
<body>
 
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h2>Create Record</h2>
                    </div>
                    <p>Please fill this form and submit to add employee record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="" maxlength="50" required="">
                        </div>
                        <div class="form-group ">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="" maxlength="30" required="">
                        </div>
                        <div class="form-group">
                            <label>Mobile</label>
                            <input type="mobile" name="mobile" class="form-control" value="" maxlength="12" required="">
                        </div>

                        <input type="submit" class="btn btn-primary" name="save" value="submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>

            </div> 
               
        </div>

</body>
</html>
