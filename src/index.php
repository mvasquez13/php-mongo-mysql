<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>MongoDb and MySql</title>
<?php include "head.php"; ?>

    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>

</head>
<body>
        <div class="container">
            <!-- mysql data -->
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Users List</h2>
                        <a href="create.php" class="btn btn-success pull-right">Add New User</a>
                    </div>
                   <?php
                    include_once 'connection_mysql.php';
                    $result = mysqli_query($conn,"SELECT * FROM users");
                    ?>

                    <?php
                    if(!empty($result) AND mysqli_num_rows($result) > 0) {
                    ?>
                      <table class='table table-bordered table-striped'>
                      
                      <tr>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Mobile</td>
                        <td>Action</td>
                      </tr>
                    <?php
                    $i=0;
                    while($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row["name"]; ?></td>
                        <td><?php echo $row["email"]; ?></td>
                        <td><?php echo ($row["mobile"])?($row["mobile"]):('N/A'); ?></td>
                        <td><a href="update.php?id=<?php echo $row["id"]; ?>" title='Update Record'><span class='glyphicon glyphicon-pencil'></span></a>
                        <a href="delete.php?id=<?php echo $row["id"]; ?>" title='Delete Record'><i class='material-icons'><span class='glyphicon glyphicon-trash'></span></a>
                        </td>
                    </tr>
                    <?php
                    $i++;
                    }
                    ?>
                    </table>
                     <?php
                    }
                    else{
                        echo "No result found";
                    }
                    ?>

                </div>
            </div>     

            <!-- mongodb data -->
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Startup log</h2>                        
                    </div>
                    <?php
                    include_once 'connection_mongodb.php';
                    $mongo_query = new MongoDB\Driver\Query([], []);
                    $mongo_data  = $client_mongodb->executeQuery('local.startup_log', $mongo_query);
                    
                    ?>

                    <?php
                    if(!empty($mongo_data)) {
                    ?>
                      <table class='table table-bordered table-striped'>
                      
                      <tr>
                        <td>N°</td>
                        <td>Hostname</td>
                        <td>Start time</td>
                        <td>PID</td>
                      </tr>
                    <?php
                    $i=1;
                    foreach ($mongo_data as $dt) {
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $dt->hostname; ?></td>
                        <td><?php echo $dt->startTime; ?></td>
                        <td><?php echo $dt->pid; ?></td>
                    </tr>
                    <?php
                    $i++;
                    }
                    ?>
                    </table>
                     <?php
                    }
                    else{
                        echo "No result found";
                    }
                    ?>

                </div>
            </div>     
        </div>

</body>
</html>