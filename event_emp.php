<html>
    <?php
    $page_name="eventemp.php";
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
                margin-left:300px;
                margin-right:100px;
                margin-bottom:10px;
                font-weight:bold;
                border-radius:20px;
                width:550px;
            
            }
        
            </style>
</head>
  
<body>
        <h2><center style="color:#105469"> EVENT </center><br><br></h2> 
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
          
     }
   }
   
   else{
    echo "0 result found ";
   }
  ?>  
</body>
</html>