<?php include_once 'dbconnect.php'; 
?>

  <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th><span>Date</span></th>
                          <th><span>Employer</span></th>
                          <th><span>Job Category</span></th>
                          <th><span>Job Title</span></th>
                          <th><span>Location</span></th>
                          <th><span>Department</span></th>
                          <th><span>Job type</span></th>
                           <th><span>Status</span></th>
                          <th><span>Action</span></th>
                        </tr>
                      </thead>


                      <tbody>
                      
<?php
$query="select * from employers_jobs order by job_id DESC";
$data=mysql_query($query);
$count=1;
while($read1=mysql_fetch_array($data))
{
?>
                                   

<tr>
<td><?php echo $read1['date']; ?></td>
<td><?php $employer_id = $read1["employer_id"];
$query_em="select * from employeer WHERE employer_id ='$employer_id' order by employer_id DESC";
$data_em=mysql_query($query_em);
$read1_em=mysql_fetch_array($data_em);
$company_name = $read1_em['company_name'];
if($company_name == NULL) {
echo "Not Defined";    
}else {
echo $company_name;    
}


?></td>
<td><?php $catid = $read1["job_catagory"];
$query1="select * from job_catagory WHERE id='$catid'";
$data1=mysql_query($query1);
$read2=mysql_fetch_array($data1);
echo $read2['catagory']; 

?></td>
<td><?php echo $read1["job_title"] ?></td>

<td><?php echo $read1["location"] ?></td>
<td><?php echo $read1["department"] ?></td>
<td><?php echo $read1["working_hour"] ?></td>

<td><i data="<?php echo $read1['job_id'];?>" class="status_checks btn
  <?php echo ($read1['status'] ==1)?
  'btn-success': 'btn-danger'?>"><?php echo ($read1['status']==1) ? 'Active' : 'Inactive'?>
 </i></td>
 
 <td><button type="button" onclick="location.href='edit-job.php?job_id=<?php echo $read1["job_id"] ?>';" class="btn btn-primary">Edit</button>
<button type="button" onclick="location.href='delete_jobs.php?job_id=<?php echo $read1["job_id"] ?>';" class="btn btn-danger">Delete</button>
</td>

</tr>

<?php

$count++;

}

?>
</tbody>
</table>



<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
$(document).on('click','.status_checks',function(){
      var status = ($(this).hasClass("btn-success")) ? '0' : '1';
      var msg = (status=='0')? 'Deactivate' : 'Activate';
      if(confirm("Are you sure to "+ msg)){
        var current_element = $(this);
        url = "status.php";
        $.ajax({
          type:"POST",
          url: url,
          data: {id:$(current_element).attr('data'),status:status},
          success: function(data)
          {   
            //alert(data);
            location.reload();
          }
        });
      }      
    });
</script>
                    
                   