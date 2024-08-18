<html>
    <?php
    $page_name="event.php";
    require 'authentication.php'; 
    include("include\sidebar.php");
   include("include/header_ews.php");
    
    ?>
    <head>
        <style>
            body
            {
                background-color:#105469;
                color:#105469;
            }
            p{
                color:white;
                border-style:solid;
                border-color:#105469;
                background-color:rgb(92,155,250);
                padding:20px;
                margin-left:350px;
                margin-right:100px;
                margin-bottom:10px;
                font-weight:bold;
                border-radius:20px;
                width:550px;
            
            }
            .admin{
                margin-left:50px;
                background-color:grey;
                color:white;
            }
            .employee
            {

            }
            </style>
</head>
    <body>
        <h2><center style="color:#105469"> EVENT </center><br></h2>
        <form action="" method="POST">
    <center>
    <!-- <input type="text" name="username" ><br><br> --><b>
 Event  Name : <input type="text" name="eventname" style="color:black;padding:5px;border-radius:10px;">
   Event Date :  <input type="text" name="date" style="color:black;padding:5px;border-radius:10px;"><br><br>
    
  discription :  <input type="text" name="discription" style="color:black;padding:15px;border-radius:10px;"> 
        </b>
    
    <input type="submit" name="send" style="color:#105469;font-weight:bold;" value="add">
</center><br> 
</form>
<?php
// $page_name="chat2.php";
// require 'authentication.php'; 
// include("include\sidebar.php");
// include("include/header_ews.php");
  $COUNT=1;
  $conn=mysqli_connect("localhost","root","","etmsh")or die("connection failer");
   $sql="SELECT * FROM tbl_event ORDER BY eventid";
   $result=$conn->query($sql);
   if($result->num_rows>0)
   {
     while($row=$result->fetch_assoc())
     {
        echo "<p>";
          echo "<br>".$row["eventname"];
          echo "<br>".$row["discription"];
          echo " <br> ".$row["date"];
          echo "</p>";
          $COUNT=$row["eventid"];
          //echo "</p>";
     }
   }
   
   else{
    echo "0 result found ";
   }
    $COUNT=$COUNT+1;
    if(isset($_POST['send']))
    {
        if(isset($_POST['eventname']))
        {
       // $name=$_POST['username'];
        $ename=$_POST['eventname'];
        //$msg1=$_SESSION["chatname"];
        
$edate = $_POST['date'];
$dis=$_POST['discription'];
        
        $res=mysqli_query($conn,"INSERT INTO tbl_event VALUES($COUNT,'$ename','$dis','$edate')");
        }
    }
   // include("include/footer.php");
   $conn->close();
 
?>
<!-- <form>
    <center>
    <input type="text" name="username" ><br><br>
    <input type="text" name="msg">
    <input type="submit" name="send">
</center>
</form> -->

</body>
</html>