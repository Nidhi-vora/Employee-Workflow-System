<?php
     $conn=mysqli_connect("localhost","root","","etmsh")or die("connection failer");
     $sql="SELECT * FROM tbl_chh ORDER BY ID";
     $result=$conn->query($sql);
     if(isset($_POST['send']))
     {
         if(isset($_POST['msg']))
         {
         $name=$_POST['nm'];
         $em=$_POST['em'];
         //$msg1=$_SESSION["chatname"];
         
   $msg = $_POST['msg'];
         
         $res=mysqli_query($conn,"INSERT INTO tbl_contact VALUES('$name','$em','$msg')");
         }
     }
     ?>