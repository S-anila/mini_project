 <?php
include("../header_inner.php");
include("tables.php");

$k=0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>
</head>
<body>

<?php

include("data_validation.php");
include("../connection.php");

$pid='1';


$g=0;

$result = mysqli_query($con,"SHOW FIELDS FROM $table");

$i = 0;

echo "<div class='col-sm-12'>";
echo "<h2>$title</h2>";
echo "<form action='insert.php' method='post' enctype='multipart/form-data' name='register_form' id='register_form'>";
while ($row = mysqli_fetch_array($result))
 {

  $name=$row['Field'];
  $type=$row['Type'];
  $type = explode("(", $type);
  $type_only=$type[0];
$i++; 
$g++; 

if($i==1 )
{
	
	//echo "<td>Male <input type='radio' name='$name'> </td>";
	
}

else if($i==11)
{
	
	  echo "<input type='hidden' name='$name' value='unset' class='form-control' >";
}
else if($i==5)
{
	
	  echo "<input type='file' name='$name' value='unset' class='form-control' >";
}

elseif($name=="college_id" )
  {
	  echo "<input type='hidden' name='$name' value='$pid' class='form-control' >";
    
  }
elseif($name=="consultation_id")
{
	$dateT=date("Y-m-d H:i:s");
	echo "<input type='hidden' name='$name' value='$consult_id' class='form-control' >";
}

 elseif($i==80 )
  {
	   echo "
	  
	  
	  <div class='col-md-10'>
                                            <div class='form-group'><label>
	  
	  ".str_replace('_', ' ', $name)."  </label>
	  <select name='$name' class='form-control'>
	 
	 <option>Mothers Name</option>
	 <option>Year Of Passout</option>
	 <option>Pin Code</option>
	 </select>
	 </div>
                                        </div>";
	    
  }
  



else
{

  if($type_only=="varchar" || $type_only=="int" || $type_only=="int" || $type_only=="tinyint")
  {
	  echo "
	  
	  
	  <div class='col-md-4'>
                                            <div class='form-group'><label>
	  
	  ".str_replace('_', ' ', $name)."</label><input type='text' name='$name'class='form-control' required > </div>
                                        </div>";
	
      
    
  }
  
   
   if($type_only=="date" )
  {
	  $date=date("Y-m-d");
	 // $date = date("h:i:s");
	  // echo $date;
 	  echo "
	
	  	<div class='col-md-4'>
            <div class='form-group'>
            	<label>".str_replace('_', ' ', $name)."</label>
	  			<input type='date' name='$name'  class='form-control' value='$date'>
	  		</div>
	  	</div>";
	  
	  ?>
	  
	  
      <?php
	  $k++;
  }
  
  
   if($type_only=="time" )
  {
	  // $date=date("Y-m-d");
	  $date = date("h:i:s");
	  // echo $date;
 	  echo "
	
	  	<div class='col-md-4'>
            <div class='form-group'>
            	<label>".str_replace('_', ' ', $name)."</label>
	  			<input type='time' name='$name'  class='form-control' value='$date'>
	  		</div>
	  	</div>";
	  
	  ?>
	  
	    <script type="text/javascript">
$(function() {
	$('#t<?php echo $k;?>').datepick();
	
});

function showDate(date) {
	alert('The date chosen is ' + date);
}
</script>
      <?php
	  $k++;
  }
  
  
  if($type_only=="tinytext" )
  {
	  echo "
	  
	  	  
	  <div class='col-md-10'>
                                            <div class='form-group'><label>
	  
	  ".str_replace('_', ' ', $name)."</label>
	  
	  <input type='file' name='$name' class='form-control'></div></div>";
  }
  if($type_only=="text" )
  {
	  echo "<div class='col-md-10'>
                                            <div class='form-group'><label>
											
											 ".str_replace('_', ' ', $name)."</label>
											
											<textarea name='$name'  class='form-control' rows='8'></textarea>
											</div>
											</div>";
  }
  
  
  

}
  


//echo "</div></div><br>";

 
}



echo "
<div class='col-md-12'>
                              <div class='col-md-3'>              <div class='form-group'>
											<input type='submit' value='Add' name='submit' class='form-control btn-success'>";



echo "</form>";



echo "
</div></div>";

echo"
<div class='clearfix'></div>

</div>
";

mysqli_free_result($result);

















mysqli_close($con);

include("select1.php");

?>
   <div id="sample">
 