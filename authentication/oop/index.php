<?php
include 'user.php';
$userobj = new Users();

//delete record
if (isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
    $deleteId = $_GET['deleteId'];
    $userobj->deleteRecord($deleteId);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud opration using oops</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
    <!-- font awesome css for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body>
    <div class="card text-center" style="padding:15px;">
        <h4>PHP Mysqli OOP CRUD (Add, Edit, Delete, View) OOP (Object Oriented Programming)</h4>
    </div><br><br>

    <div class="container">
        <?php

        if (isset($_GET['msg']) == "login_success") {
            echo "<div class='alert alert-success alert-dismissible'>
                        Login successfully.
                    </div>";
        }

        if (isset($_GET['msg1']) == "insert") {
            echo "<div class='alert alert-success alert-dismissible'>
                        Your Registration added successfully.
                    </div>";
        }
        //check update 
        if (isset($_GET['msg2']) == "update") {
            echo "<div class='alert alert-success alert-dismissible'>
                        Record update successfully.
                    </div>";
        }
        //for delete
        //check update 
        if (isset($_GET['msg3']) == "delete") {
            echo "<div class='alert alert-success alert-dismissible'>
                        Record Deleted successfully.
                    </div>";
        }
        ?>
        <h2>View Records
            <a href="add.php" class="btn btn-primary" style="float:right;">Add new Reocrd</a>
        </h2>

        <table class="table table-bordered table-striped" id="usersTable">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>UserName</th>
                    <th class="symbol">Action</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $users = $userobj->displayData();
                foreach ($users as $rs) {
                ?>

                    <tr>
                        <td><?php echo $rs['id'] ?></td>
                        <td><?php echo $rs['name'] ?></td>
                        <td><?php echo $rs['email'] ?></td>
                        <td><?php echo $rs['username'] ?></td>
                        <td class="symbol">

                            <a href="edit.php?editId=<?php echo $rs['id'] ?>" style="color:green">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>&nbsp;

                            <a href="index.php?deleteId=<?php echo $rs['id'] ?>" style="color:red" onclick="return isDelete()">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>

                        </td>
                    </tr>
                <?php } ?>
            </tbody>

        </table>
    </div>

    

    <script>
        function isDelete() {
            return confirm("Are you sure you want to delete your record ?");
        }
    </script>
</body>

</html>