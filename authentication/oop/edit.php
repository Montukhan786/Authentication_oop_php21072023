<?php
    include 'user.php';

    $userobj = new Users();

    //edit record
    if(isset($_GET['editId']) && !empty($_GET['editId'])){
        $editId = $_GET['editId'];
        $rs = $userobj->displayRecordById($editId);
    }

    //update record
    if(isset($_POST['update'])){
        $userobj->updateRecord($_POST);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud opration using oops</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/add.css">

</head>
<body>
    <div class="card text-center" style="padding:15px;">
        <h4>PHP Mysqli OOP CRUD (Add, Edit, Delete, View) OOP (Object Oriented Programming)</h4>
    </div><br><br>


    <div class="container">
        <form action="edit.php" method="POST" id="frm">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="" class="form-control" value="<?php echo $rs['name']; ?>" required>
            </div>

            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" name="email" id="" class="form-control" value="<?php echo $rs['email']; ?>" required>
            </div>

            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="" class="form-control" value="<?php echo $rs['username']; ?>"required>
            </div>

            <div class="form-group">
                <input type="hidden" name="id" value="<?php echo $rs['id'] ?>">
                <input type="submit" value="Update" name="update" class="btn btn-primary" style="float:right;">
            </div>

        </form>
    </div>

    
</body>
</html>