<?php
 $page_name="show";
 require 'authentication.php'; 
 include("include\header_ews.php");
?>
<html>
<head>
       <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="screen">
       <link rel="stylesheet" type="text/css"href="css/DT_bootstrap.css"> 
</head>
<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="js/jquery.stellar.js"></script>

<script type="text/javascript" charset="utf-8" language="javascript" src="js/DT_bootstrap.js"></script>
<body>
<div class="container">
      <h3> Download file here </h3>
      <div style="padding-left:1000px;" <?php if($page_name == "task-info" ){echo "class=\"active\"";} ?>><a href="task-info.php">GO BACK<span style="font-size:16px; color:#d4ab3a;" class="pull-right hidden-xs showopacity glyphicon glyphicon-calendar"></span></a></li>
  </div>
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
    <thead>

      <tr>
        <th width="90%" align="center">Files</th>
        <th allign="center">Action</th>
        <th > Task id </th>
        <th >Task name </th>
        <th> User Name </th>

  </tr>
  </thread>
   <?php
  
   
    $conn=new PDO('mysql:host=localhost;dbname=etmsh','root','')or die(mysqli_error());
  
       $query=$conn->query("select * from upload order by id desc");
       while($row=$query->fetch())
       {
        $name=$row['name'];
        $taskid=$row['taskid'];
        $taskname=$row['taskname'];
        $empname=$row['empname'];
         ?>
         <tr>
          <td> &nbsp;<?php echo $name ;?></td>
       <td>
       <button class="alert-success"><a href="download.php?filename=<?php echo $name;?>&f=<?php echo $row['fname']?>">Download</button>
       </td>
       <td><?php echo $taskid ?></td>
       <td><?php echo $taskname ?></td>
       <td><?php echo $empname ?></td>

       </tr>
       <?php
       } ?>
   
</body>
    </html>