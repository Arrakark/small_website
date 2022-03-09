
	<style>
		body {
			margin:0;
			padding:0;
			width:100%;	
		}
		img {
			border-radius:5px;
			
	box-shadow: 0 1px 5px rgba(0, 0, 0, 0.15);
		}
	</style>
    <base target="_blank" />
<?php
include "connect.php";
$con=mysql_connect($host,$user,$password,$db);
if (!$con)
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else 
{
	$media_id=$_GET['md'];
	$result1=mysql_query("SELECT * 
	FROM  `sw`.`sw_media` 
	WHERE  `media_id` =$media_id
	AND  `media_status` =1
	LIMIT 0 , 1");
	if (!$result1)
	{
		echo "<h2>404 Not Found</h2>";
	}
	else
	{
		$num1=mysql_num_rows($result1);	
		$i1=0;
		while ($num1 > $i1)
		{
			$media_id=mysql_result($result1,$i1,"media_id");
			$media_title=mysql_result($result1,$i1,"media_title");
			$media_data=mysql_result($result1,$i1,"media_data");
			$media_image_data=mysql_result($result1,$i1,"media_image_data");
			$media_video_data=mysql_result($result1,$i1,"media_video_data");
			if (!empty($media_image_data)) {
				echo "<a href='/?md=$media_id'><img src='$media_image_data' width='100%'></a>";
			}
			else {
				echo $media_video_data;	
			}
			$i1++;
		}
	}
}
mysql_close($con);
?>