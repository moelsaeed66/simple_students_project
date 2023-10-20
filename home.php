<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@1,300&display=swap" rel="stylesheet">
    <style>
        body{
            background: whitesmoke;
            font-family: 'Rubik', sans-serif;
        }
        #mother{
            width: 100%;
            font-size: 20px;
        }
        main{
            float: right;
            border: 2px solid black;
            padding: 100px;
        }
        input{
            padding: 5px;
            border: 2px solid black;
            font-family: 'Rubik', sans-serif;
        }
        aside{
            text-align: center;
            float: left;
            width: 400px;
            border: 2px solid black;
            padding: 10px;
            background-color: silver;
        }
        #tbl1{
            width: 800px;
            font-size: 20px;
            text-align: center;
        }
        #tbl1:hover{
            background-color: white;
            /*color: red;*/
        }
        #tbl1 th{
            background-color: silver;
            color: black;
            padding: 20px;
        }
        aside button{
            width: 150px;
            padding: 8px;
            background-color: slategray;
        }
    </style>
    <title>Document</title>
</head>
<body>
<?php
$dbhost='localhost';
$dbname='student';
$dbpass='';
$dbuser='root';

$conn=new mysqli($dbhost,$dbuser,$dbpass,$dbname);
$req=mysqli_query($conn,'select * from `students`');
$id='';
$name='';
$address='';
if(isset($_POST['id'])){
    $id=$_POST['id'];
};
if(isset($_POST['name'])){
    $name=$_POST['name'];
};
if(isset($_POST['address'])){
    $address=$_POST['address'];
};
$insert_query='';
if(isset($_POST['add'])){
    $insert_query="INSERT INTO `students` (`id`,`name`,`address`)VALUES ('$id','$name','$address')";
    mysqli_query($conn,$insert_query);
    header('location:home.php');
}
if(isset($_POST['del'])){
    $del_query="DELETE FROM  `students` WHERE `name`='$name'";
    mysqli_query($conn,$del_query);
    header('location:home.php');
}

?>
<div id="mother">
    <form action="" method="post">
        <aside>

            <div id="aside">
                <img src="https://th.bing.com/th/id/OIP.11qta-gEHlgVeJE3b5N2VQHaEz?pid=ImgDet&rs=1" alt="logo" width="200px">
                <h1>control panal</h1>
                <lable>student id:</lable><br>
                <input type="text" name="id"><br>
                <lable>student name:</lable><br>
                <input type="text" name="name"><br>
                <lable>student address:</lable><br>
                <input type="text" name="address"><br><br>
                <button name="add">add</button><br>
                <button name="del">delete</button>
            </div>
        </aside>
        <main>
            <h1>all students</h1>
            <table id="tbl1">
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>address</th>
                </tr>
                <?php while($rows=mysqli_fetch_assoc($req)):?>

                <tr>
                    <td><?=$rows['id'];?></td>
                    <td><?=$rows['name'];?></td>
                    <td><?=$rows['address'];?></td>
                </tr>


                <?php endwhile;?>
            </table>
        </main>
    </form>

</div>

</body>
</html>
