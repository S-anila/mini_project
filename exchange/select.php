<?php
include("tables.php");
include("../header_inner.php");

$del_id=0;
$i=0;
?>


		<link rel="stylesheet" type="text/css" href="datatables.min.css">
 
		<script type="text/javascript" src="datatables.min.js"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#example').DataTable();
			} );
		</script>

<style>
.hiddentd
{
display:inline-block;
    width:180px;
    white-space: nowrap;
    overflow:hidden !important;
   
}
</style>


<div class="">
<?php
if($_SESSION['user']!="patient")
{
}
?>
<div class="clearfix"></div>
<table class="table table-striped " cellspacing="0"  role="grid" aria-describedby="example_info" >

       
        
            
          <?php
	
		  include("../connection.php");
	
	
	
	
	
	
	
	
if(isset($_REQUEST['del_id']))
{
$del_id=$_REQUEST['del_id'];
mysqli_query($con,"delete from $table where id='$del_id'");
//if($del_id!="")
}
	?>
    <script>


function rem()
{
if(confirm('Are you sure you want to delete this record?')){
return true;
}
else
{
return false;
}
}


function rem2()
{
if(confirm('Are you sure you want to deactive this record?')){
return true;
}
else
{
return false;
}
}
</script>
    
	
	<?php


	
	
	

	
	
		  $result2 = mysqli_query($con,"SHOW FIELDS FROM $table");

 echo "<thead><tr>";

while ($row2 = mysqli_fetch_array($result2))
 {

  $name=$row2['Field'];

  echo "<th>".
  str_replace('_', ' ', $name)
  ."</th>";
 $i++;
 }
 echo "
<th>Approve</th>
 
  ";
 if($_SESSION['user']=="admin" || $_SESSION['user']=="hospital")
		{
		
 echo "
<th>Update</th>
 
 <th>Del</th> ";
		}
		echo"
 </tr></thead>";
   
  // $i=0;
   echo "<tbody>";
   
            
            
     
			if(isset($_REQUEST['cid']))
            {
                
            	$result = mysqli_query($con,"SELECT * FROM $table WHERE id='$_REQUEST[cid]'");
				//echo "SELECT * FROM $table WHERE patient_id='$_SESSION[patient_id]'";
            }
            else
            {
                $result = mysqli_query($con,"SELECT * FROM $table ");
            }
          
$sl=1;
		while($row = mysqli_fetch_array($result))
		{
		$id=$row['0'];
		echo "<tr>";
		for($k=0;$k<$i;$k++)
		{
	if($k==0)
            {
                echo "<td > $sl</td>";
                
            }
            
		
            elseif($k==8)
			{
			  $sql2 = "select *  from design where shop_id='$row[shop_id]' ";
    $result2 = mysqli_query($con, $sql2) or die("Error in Selecting " . mysqli_error($connection));
$row2 =mysqli_fetch_array($result2);
		
		

			echo "<td > <img src='../../shop/design/uploads/$row2[image]' width='100'></td>";
				
			}
            
			  elseif($k==1)
			{
			  $sql2 = "select *  from design where id='$row[item_name]' ";
    $result2 = mysqli_query($con, $sql2) or die("Error in Selecting " . mysqli_error($connection));
$row2 =mysqli_fetch_array($result2);
		
		

			echo "<td> $row2[design_name]</td>";
				
			}
			elseif($k==31)
			{
				

			echo "<td> $row[status]</td>";
			}
				
			elseif($k==31)
			{
				

			echo "<td class='hiddentd'> $row[content] </td>";
				
			}
			
			
				elseif($k==40)
			{
			  

			echo "<td > <img src='uploads/$row[$k]' width='100'></td>";
				
			}
			elseif($k==8)
			{
			  

			echo "<td > <img src='uploads/$row[item_image]' width='100'></td>";
				
			}
			elseif($k==7)
			{
			  

			echo "<td > <img src='../../$row[image]' width='100'></td>";
				
			}
			
			else
			{
			echo "<td >$row[$k]</td>";
			}
		
		}
		
		
$id=$row['id'];
		
			echo "
			
			<td><a href='priceenter.php?id=$id'>Approve</a></td>
			
		";
		
		
		
		
		
		
		if($_SESSION['user']=="admin" || $_SESSION['user']=="hospital")
		{
		
		
			echo "
			
			<td><a href='update.php?id=$id'>Update</a></td>
			
			<td><a href='?del_id=$id' onclick='return rem()'>Del</a></td>
		";
			
		}
		echo"</tr>";
		
		$sl++;
		
		}
        
        ?>
        </tbody>
    </table>
			
		



<script type="text/javascript">
	// For demo to fit into DataTables site builder...
	$('#example')
		.removeClass( 'display' )
		.addClass('table table-striped table-bordered');
</script>

<div class="clearfix"></div>
	
    </div> 
    <?php
	
//	include("../footer_inner.php");
	?>