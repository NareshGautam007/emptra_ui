
<?php require_once 'dbconnect.php'; 

var_dump($_POST);
//die();

$id=$_POST['id'];
$status= $_POST['status'];

$query="UPDATE employers_jobs set status='$status' WHERE job_id ='$id'";
echo $query;
$data=mysql_query($query);

if($data)
{
	
 echo "<div class='alert alert-success alert-dismissible'>
<a href='#' class='close' value='Refresh Page' onClick='window.location.reload()' data-dismiss='alert' id='close' aria-label='close'>&times;</a><h3>User Updated <strong>Successfully</strong>.</h3></div>";


  echo "<style>
  #formmeaages {
    position: absolute;
    top: 0;
    display: block !important;
    width: 100%;
    left: 0;
    height: 100%;
    z-index: 999 !important;
    background: hsla(0, 0%, 100%, 0.58);
}
   </style>";
}

else

{

echo "<div class='alert alert-danger'>Something went wrong!</div>";	


}




?>