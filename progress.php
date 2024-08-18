<html>
    <head>
      <style>
         .p1{
          border-style:solid;
                border-color:#105469;
                color:white;
                background-color:rgb(92,155,250);
                padding:50px;
                margin-left:350px;
                margin-right:160px;
                margin-bottom:10px;
                font-weight:bold;
                border-radius:20px;
                width:250px;
                height:150px;
            
            }
            .p2{
              border-style:solid;
                border-color:#105469;
                color:white;
                background-color:rgb(92,155,250);
                margin-top:-10px;
                margin-bottom:-5px;
                padding:50px;
                margin-left:50px;
                margin-right:100px;
                margin-top:70px;
                margin-bottom:15px;
                font-weight:bold;
                border-radius:20px;
                width:250px;
                height:150px;
            
            }
            .p3{
              border-style:solid;
                border-color:#105469;
                color:white;
                background-color:rgb(92,155,250);
                padding:50px;
                margin-left:350px;
                margin-right:100px;
                margin-top:-150px;
                margin-bottom:10px;
                font-weight:bold;
                border-radius:20px;
                width:250px;
                height:150px;
            
            }
            .p4{
              border-style:solid;
                border-color:#105469;
                color:white;
                background-color:rgb(92,155,250);
                padding:50px;
                margin-left:650px;
                margin-top:-170px;
                margin-right:100px;
                margin-bottom:10px;
                font-weight:bold;
                border-radius:20px;
                width:250px;
                height:150px;
            
            }
            
        </style>
    <body>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    

<?php
$page_name="progress";
require 'authentication.php';
//include("include/header_ews.php"); 
include("include/sidebar.php");
include("include/header_ews.php");
?>
<h2><h2 style="color:#105469 ;padding-left:370px;padding-bottom:50px"> PROGRESS </h2></h2>
          
<?php

$uid = $_SESSION['admin_id'];
$cn0=$cn1=$cn2=0;
$conn=mysqli_connect("localhost","root","","etmsh")or die("connection failer");
 
if($uid==1)
{
  
    $COUNT=1;
     $sql="SELECT * FROM task_info ";
     $result=$conn->query($sql);
     
     
     if($result->num_rows>0)
     {
       while($row=$result->fetch_assoc())
       { //`user_id`, `fullname`, `username`, `email`, `password`
        if($row['status'] == 1){
          //echo "In Progress";
          $cn1++;
      }elseif($row['status'] == 2){
         //echo "Completed";
         $cn2++;
      }elseif($row['status']==0){
        //echo "Incomplete";
        $cn0++;
      }
        }
      
     }
     
     else{
      echo "0 result found ";
     }
  } 

else{
  $COUNT=1;
   $sql="SELECT * FROM task_info WHERE t_user_id=$uid";
   $result=$conn->query($sql);
   
   
   if($result->num_rows>0)
   {
     while($row=$result->fetch_assoc())
     { //`user_id`, `fullname`, `username`, `email`, `password`
      if($row['status'] == 1){
        //echo "In Progress";
        $cn1++;
    }elseif($row['status'] == 2){
       //echo "Completed";
       $cn2++;
    }elseif($row['status']==0){
      //echo "Incomplete";
      $cn0++;
    }
      }
    
   }
   
   else{
    echo "0 result found ";
   }
} 
   echo "<p class='p1'>Total project : ".$cn0+$cn1+$cn2."</p>";
   echo "<p class='p2'> Incomplete project : ".$cn0."</p>";
   echo "<p class='p3'> Inprogress project : ".$cn1."</p>";
   echo "<p class='p4'> completed poject : ".$cn2."</p>";
    
   $conn->close();
   
?>
<!-- <form>
    <center>
    <input type="text" name="username" ><br><br>
    <input type="text" name="msg">
    <input type="submit" name="send">
</center>
</form> -->
<div>
    
       
</div>
</body>
</html>