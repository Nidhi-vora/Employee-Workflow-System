<html>
    <body>
<?php
if(isset($_POST['login']))
{


$connection = mysqli_connect("localhost","root","");
$db =mysqli_select_db($connection,"ews");
$query ="select * from login where emailid = '$_POST[emailid]'";
$query_run=mysqli_query($connection,$query);
$count=0;
while($row=mysqli_fetch_assoc($query_run))
{
    // count++;
    if($row['password']==$_POST['password'])
    {
        
        
       header("Location:index.html");
       
    }
    else{
        
        header("Location:login.php");
    }
}
// if(count==0)
// {
//      he
// }

}
?>
</body>
</html>
