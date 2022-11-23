
<html>
<body>
<!--<form method="POST" enctype="multipart/form-data">-->
<div id="page-content">
	<br>	<br>	<br>
    	<!--Page Title-->
    	<div class="page section-header text-center">
			<div class="page-title">
        		<div class="wrapper"><h1 class="page-width">Customer Registration</h1></div>
      		</div>
		</div>
  <div class="container">
            <div class="row">
            	<div class="col-12 col-sm-12 col-md-8 col-lg-8 mb-4">


<form action='ins.php' method='POST'> 
<table>
		<tr>
		<th>  DESIGN NAME :</th>         
<td><input type="text" name="design_name" required ></td>
 </tr>
  
 <!--<tr>  
<th>GENDER :</th>  
<td> <input type="radio" name="gender" required /> Male 
<input type="radio" name="gender" required /> Female 
<input type="radio" name="gender" required /> Other  
</td>

</tr>-->

 
  
 <tr>
<th>DESCRIPTION :</th>  
  
<td>   
<input type="text" name="description" pattern="[+0-9]{12,13}" required="" onfocus="(this.value='+91')"/>
</td>
</tr>

<!--<tr>
<th>ADDRESS :</th>
  
<td>
	<textarea cols="60" rows="5" name="address" >  
</textarea>  
</td> </tr> -->
<tr>
<th>MAKING CHARGE :</th>  
<td><input type="email" id="email" name="making_charge" required /> </td>
</tr>

<!-- <tr>
<th> ID PROOF:</th>
<td><input type="id_proof" id="id_proof" name="id_proof" required /> </td>
</tr> -->

<tr>
<th> IMAGE:</th>
<td><input type="file" id="username" name="image" required /></td>
</tr>
 


<tr>
	
<td><input type="submit" name="button" class="btn btn-primary"/> </td>
</table>
</form>  

<?php
include("connection.php");

if(isset($_POST['submit']))
{
$design_name)=$_POST['design_name'];
$description=$_POST['description'];
$making_charge=$_POST['making_charge'];
$shop_id=$_POST['shop_id'];
$target="uploads/";

//print_r($_FILES);

$target_path = $target . basename( $_FILES['image']['name']);
//$target_path = $target ."image.jpg";

if(move_uploaded_file($_FILES['image']['tmp_name'], $target_path))
{
echo "success";
}else{
echo"failed";
}

$insert="INSERT INTO `design`(`design_name`, `description`, `making_charge`, `image`,`shop_id`) VALUES ('$design_name','$description','$making_charge','$target_path',$shop_id)";
mysqli_query($connect,$insert);
}

?>



</div>
</div>
</div>
</div>






</body>

</html>