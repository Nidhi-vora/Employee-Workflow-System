<?php
$page_name="upload.php";
require 'authentication.php'; 
   
include("include\header_ews.php");

   $conn=new PDO('mysql:host=localhost;dbname=etmsh','root','')or die(mysqli_error());
   if(isset($_POST['submit'])!="")
   {
       $name=$_FILES['file']['name'];
       $size=$_FILES['file']['size'];
       $type=$_FILES['file']['type'];
       $temp=$_FILES['file']['tmp_name'];
       $fname=date("YmdHis")."_".$name;
       $chk=$conn->query("SELECT * FROM upload WHERE name='$name'")->rowCount();
       if($chk)
       {
         $i=1;
         $c=0;
         while($c==0)
         {
            $i++;
            $reversedparts=explode('.',strrev($name),2);
            $tname=(strrev($reversedparts[1]))."_".($i).".".(strrev($reversedparts[0]));
            $chk2=$conn->query("SELECT * FROM upload WHERE name='$tname'")->rowCount();
            if($chk2==0)
            {
                $c=1;
                $name=$tname;
            }
         }
       }
       $move=move_uploaded_file($temp,"upload/".$fname);
       if($move)
       {
        $tkid=$_POST['taskid'];
        $tknm=$_POST['taskname'];
       // $ennm=$_POST['empname'];
        $msg1 = $_SESSION['name'];
         $query=$conn->query("insert into upload (name,fname,taskid,taskname,empname)values('$name','$fname',$tkid,'$tknm','$msg1')");
          echo "file uploaded successfully";
         header("location:upload.php");
       }
       else{
        die(mysql_error());
       }
   }
?>

<html>
    <head>
       <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="screen">
       <link rel="stylesheet" type="text/css"href="css/DT_bootstrap.css"> 
       <style>
            body
            {
                background-color:white;
                color:#105469;
            }
            </style>
</head>
<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="js/jquery.stellar.js"></script>

<script type="text/javascript" charset="utf-8" language="javascript" src="js/DT_bootstrap.js"></script>
<body>
  <center>
    <div class="container">
      <h3> upload file here </h3><br><br>
      
      <form enctype="multipart/form-data" action="" name="form" method="POST">
        select files :
        <input type="file" name="file" id="file"></td><br><br><br>
     Add Task Id   <input type="text" name="taskid"></td><br><br>
     Add Task Name   <input type="text" name="taskname"></td><br><br>
     <!-- Add User Name   <input type="text" name="empname"></td><br><br> -->
        <input type="submit" name="submit" id="submit"style="margin-left:50px" value="submit"/><br><br>
        <div style="padding-left:10px;" <?php if($page_name == "task-info" ){echo "class=\"active\"";} ?>><a href="task-info.php">GO BACK<span style="font-size:16px; color:#d4ab3a;" class="pull-right hidden-xs showopacity glyphicon glyphicon-calendar"></span></a></li>
  </div>
</div>
</form>
  <br><br>
          </center>
          </body>
          </html>

