<?php
require "db_conn.php"; // Making sure this file has the connection to our database
require_once "function.php";

    if(!isset($_GET['id'])){
        // redirect to show page
        die('id not provided');
    }
    $id =  $_GET['id'];
    $sql = "SELECT * FROM sets_list where ID = $id";
    $result = $conn->query($sql);

    if($result->num_rows != 1){
        // redirect to show page
        die('id is not in db');
    }
    $data = $result->fetch_assoc();
?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set Editor</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css"> <!-- Specific file for all customization-->
    <!-- Getting JQuery bundles -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <style>
    table 
    {
        overflow-y: scroll;
        width: 500px;
        display: block;
        position: relative;
        background: black;
        color: white;
    }
    tr, td 
    {
        text-align: center;
        border: thin solid;
        max-width: 100%;
        overflow: hidden; 
    }
    th 
    {
        position: sticky;
        border: thin solid;
        top: 0;
        background-color: black;
        color: white;
    }
    html, body 
    {
        overflow-y: visible;
    }
    .form-group
    {
        margin: 3%;
        outline: 5px solid black;
        outline-offset: 20px;
        border-radius: 10px;
        outline-color: lightblue;
    }
    img
    {
        margin-bottom: 4%;
    }
    </style>

</head>
<body>
    <div class="jumbotron">
        <button style="border-radius: 10px; font-size: 24px;"><a style="text-decoration: none; color: black;" href="editorHome.php"><b>&#8592;</b></a></button>
        <h1 class="text-center">
            Set Editor
        </h1>
    </div>
<!--- LEFT SIDE OF THE SCREEN, SET EDITOR --->
<div style='float:left; margin-left: 2%;'>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 col-sm-12">
                <form action="modify.php?id=<?= $id ?>" method="POST">
                <h3>Set <?php echo $data['ID']; ?></h3>
                <br>
                    <div class="form-group" style="margin-bottom: 10%">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="setName" id="name" value="<?= $data['setName']?>">
                    </div>
            </div>
            <div class="row">
                
                <div class="form-group">
                    <b><label for="description">Image 1</label></b>
                    <br>
                    <?php
                    if (!empty($data['link1']))
                    {
                        echo '<img width="150px"; height="150px"; src="'.$data['link1'].'">';
                    }
                    ?>
                    <br>
                    <textarea class="form-control" name="link1" cols="30" rows="5"><?= $data['link1']?></textarea>
                </div>
                <div class="form-group">
                    <b><label for="description">Image 2</label></b>
                    <br>
                    <?php
                    if (!empty($data['link2']))
                    {
                        echo '<img width="150px"; height="150px"; src="'.$data['link2'].'">';
                    }
                    ?>
                    <br>
                    <textarea class="form-control" name="link2" cols="30" rows="5"><?= $data['link2']?></textarea>
                </div>
                <div class="form-group">
                    <b><label for="description">Image 3</label></b>
                    <br>
                    <?php
                    if (!empty($data['link3']))
                    {
                        echo '<img width="150px"; height="150px"; src="'.$data['link3'].'">';
                    }
                    ?>
                    <br>
                    <textarea class="form-control" name="link3" cols="30" rows="5"><?= $data['link3']?></textarea>
                </div>
                <div class="form-group">
                    <b><label for="description">Image 4</label></b>
                    <br>
                    <?php
                    if (!empty($data['link4']))
                    {
                        echo '<img width="150px"; height="150px"; src="'.$data['link4'].'">';
                    }
                    ?>
                    <br>
                    <textarea class="form-control" name="link4" cols="30" rows="5"><?= $data['link4']?></textarea>
                </div>
                <div class="form-group">
                    <b><label for="description">Image 5</label></b>
                    <br>
                    <?php
                    if (!empty($data['link5']))
                    {
                        echo '<img width="150px"; height="150px"; src="'.$data['link5'].'">';
                    }
                    ?>
                    <br>
                    <textarea class="form-control" name="link5" cols="30" rows="5"><?= $data['link5']?></textarea>
                </div>
                <div class="form-group">
                    <b><label for="description">Image 6</label></b>
                    <br>
                    <?php
                    if (!empty($data['link6']))
                    {
                        echo '<img width="150px"; height="150px"; src="'.$data['link6'].'">';
                    }
                    ?>
                    <br>
                    <textarea class="form-control" name="link6" cols="30" rows="5"><?= $data['link6']?></textarea>
                </div>
                <div class="form-group">
                    <b><label for="description">Image 7</label></b>
                    <br>
                    <?php
                    if (!empty($data['link7']))
                    {
                        echo '<img width="150px"; height="150px"; src="'.$data['link7'].'">';
                    }
                    ?>
                    <br>
                    <textarea class="form-control" name="link7" cols="30" rows="5"><?= $data['link7']?></textarea>
                </div>
                <div class="form-group">
                    <b><label for="description">Image 8</label></b>
                    <br>
                    <?php
                    if (!empty($data['link8']))
                    {
                        echo '<img width="150px"; height="150px"; src="'.$data['link8'].'">';
                    }
                    ?>
                    <br>
                    <textarea class="form-control" name="link8" cols="30" rows="5"><?= $data['link8']?></textarea>
                </div>
                <div class="form-group">
                    <b><label for="description">Image 9</label></b>
                    <br>
                    <?php
                    if (!empty($data['link9']))
                    {
                        echo '<img width="150px"; height="150px"; src="'.$data['link9'].'">';
                    }
                    ?>
                    <br>
                    <textarea class="form-control" name="link9" cols="30" rows="5"><?= $data['link9']?></textarea>
                </div>
                <div class="form-group">
                    <b><label for="description">Image 10</label></b>
                    <br>
                    <?php
                    if (!empty($data['link10']))
                    {
                        echo '<img width="150px"; height="150px"; src="'.$data['link10'].'">';
                    }
                    ?>
                    <br>
                    <textarea class="form-control" name="link10" cols="30" rows="5"><?= $data['link10']?></textarea>
                </div>
                <div class="form-group">
                    <b><label for="description">Image 11</label></b>
                    <br>
                    <?php
                    if (!empty($data['link11']))
                    {
                        echo '<img width="150px"; height="150px"; src="'.$data['link11'].'">';
                    }
                    ?>
                    <br>
                    <textarea class="form-control" name="link11" cols="30" rows="5"><?= $data['link11']?></textarea>
                </div>
                <div class="form-group">
                    <b><label for="description">Image 12</label></b>
                    <br>
                    <?php
                    if (!empty($data['link12']))
                    {
                        echo '<img width="150px"; height="150px"; src="'.$data['link12'].'">';
                    }
                    ?>
                    <br>
                    <textarea class="form-control" name="link12" cols="30" rows="5"><?= $data['link12']?></textarea>
                </div>
            </div>
                <input type="submit" name="editForm" value="Submit" class="btn btn-primary btn-block">
                </form>
        </div>
    </div>
</div>

<!--- RIGHT SIDE OF THE SCREEN, TABLE LIST --->
<div style='float:right; right: 0; margin-right: 9%; margin-top: 2%; position:fixed;'>
    <br>
    <h2 style="position: relative;">*Drag or right click on picture for link*</h2>
    <br>
    <table width="300px" height= "50px" style="overflow-y:hidden; background-color:black;">
        <tr height="50px">
            <th><input style="background-color: #79BBEB; width: 70px; height: 50px" type="submit" name = "searchIcon" value="Search"></th>
            <th><input size="30px" type = "text" id="itemToSearch" placeholder="Enter picture/id" style="text-align: center"></th>
            <th><input type = "submit" name = "search"></th>
            <th><input type = "submit" name ="reset" value="Reset"></th>
        </tr>
    </table>

    <table border="1" width="300px" height="500px" style="float:top;">
    <tr>
        <th width="50" >#</th>
        <th width="200">Name</th>
        <th width="200">Type</th>
        <th width="250">Picture</th>
    </tr>
    <tbody id = "myTableData">
        <?php
            $search_result = mysqli_query($conn,"select * from objectslist");
            while($row = mysqli_fetch_array($search_result)) 
            { ?>
                <tr>
                    <td id="itemID"><?php echo $row['ID']; ?></td>
                    <td id="itemName"><?php echo $row['itemName']; ?></td>
                    <td><?php echo $row['Type']; ?></td>
                    <td><img src="<?php echo $row['link']?>" width=100px; height=100px;></td>
                </tr>
        <?php } ?>

    </tbody>
    </table>
</div>

<script>
    $(document).ready(function()
    {
        $("#itemToSearch").on("keyup", function() 
        {
            var value = $(this).val().toLowerCase();
            $("#myTableData tr").filter(function() 
            {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>
</html>

