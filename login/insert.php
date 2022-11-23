<?php
include("../connection.php");
include("tables.php");
$result = mysqli_query($con,"SHOW FIELDS FROM $table");
$i = 0;
while ($row = mysqli_fetch_array($result))
 {
 // echo $row['Field'] . ' ' . $row['Type']."<br>";
  $name=$row['Field'];
  //echo $name."<br>";
  $post_values[]=addslashes($_POST[$name]);
  $field_name[]=$name;
  $data_type[]=$row['Type'];
 // echo $post_values[$i];
  $i++;
 }
$j=$i;
//echo "<br>";
for($k=0;$k<$i;$k++)
{
	if($fields=="")
	$fields=$field_name[$k];
	else
	$fields=$fields.",".$field_name[$k];
	
	
	$type=$data_type[$k];
	//$data_type[$k];
	$type = explode("(", $type);
  $type_only=$type[0];
	
	

  if($type_only=='tinytext')
  {
	

$date=date("Y-m-d-h-i-s");
$target_path = $target_path.$date.basename($_FILES[$field_name[$k]]['name']); 
$target_path2 = $date.basename($_FILES[$field_name[$k]]['name']); 
//echo $target_path;
move_uploaded_file($_FILES[$field_name[$k]]['tmp_name'], $target_path);





	if($datas=="")
	{
	$datas="'".$target_path2."'";
	//echo $field_name[$k];
	}
	else
	{
	$datas=$datas.",'".$target_path2."'";
//	echo $field_name[$k];
	}
	
  }
  
  
  else
	 {
	if($datas=="")
	$datas="'".$post_values[$k]."'";
	else
	$datas=$datas.",'".$post_values[$k]."'";
	
  }
}
//echo $datas;

mysqli_query($con,"INSERT INTO $table($fields) VALUES ($datas)") or die("error".mysql_error());


$d=date('Y-m-d');
$msg="New Election Created". $_POST['election_name'];
mysqli_query($con,"INSERT INTO notification (message,date) VALUES('$msg','$d')");

header("location:form.php?cid=$_POST[consultation_id]&pid=$_POST[consultation_id]");
?>
