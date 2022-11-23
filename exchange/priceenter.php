<?php
include('../header_inner.php');
?>

    <div id="page-content">
	<br>	<br>	<br>
    	<!--Page Title-->
    	
  <div class="container">
            <div class="row">
            	<div class="col-12 col-sm-12 col-md-8 col-lg-8 mb-4">


<form action='' method='POST'> 
<table>
		
 
  
 


<tr>
<th>OLD GOLD PRICE :</th>
<td><input type="text" id="price" name="price" required /></td>
</tr>
 <td></td>
<td><input type="submit" name="button" class="btn btn-primary"/> </td>
</table>
</form>  
<?php
		  include("../connection.php");

if(isset($_POST['button']))
	
	{
		$price=$_POST['price'];

	
	
	$up="update exchange set price='$price',status='exchange' where id='$_REQUEST[id]'";
	//echo $up;
	if(mysqli_query($con,$up))
		
	
	{
		echo"<script>
		
		alert('Exchange Can Be Possible');
		window.location.href='select.php';
		
		</script>";
		
	}
	}

?>



</div>
</div>
</div>
</div>
<script type="text/javascript">
		window.onload = function () {
					document.getElementById("password1").onchange = validatePassword;
					document.getElementById("password2").onchange = validatePassword;
				}

				function validatePassword() {
					var pass2 = document.getElementById("password2").value;
					var pass1 = document.getElementById("password1").value;
					if (pass1 != pass2)
						document.getElementById("password2").setCustomValidity("Passwords Don't Match");
					else
						document.getElementById("password2").setCustomValidity('');
					//empty string means no validation error
				}
			</script>

    <?php
	//include('footer.php');
	?>