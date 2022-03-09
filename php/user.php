<?php
$con=mysql_connect($host,$user,$password,$db);
if (!$con)
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else 
{
	$user_id=$_GET['us'];
	$result1=mysql_query("SELECT * 
	FROM  `$db`.`sw_user` 
	WHERE `user_id` =$user_id
	AND `user_status`=1
	LIMIT 0, 1");
	if (!$result1)
	{
		echo "<h2>No user!</h2>";
	}
	else
	{
		$num1=mysql_num_rows($result1);	
		$i1=0;
		while ($num1 > $i1)
		{
			
			$user_id=mysql_result($result1,$i1,"user_id");
			$user_title=mysql_result($result1,$i1,"user_title");
			$user_data=mysql_result($result1,$i1,"user_data");
			$user_name=mysql_result($result1,$i1,"user_name");
			$user_img_url=mysql_result($result1,$i1,"user_img_url");
			$user_timeadd=mysql_result($result1,$i1,"user_timeadd");
			$result1=mysql_query("SELECT * 
			FROM  `sw`.`sw_setting` 
			WHERE  `setting_name` LIKE  'website_title'
			LIMIT 0 , 30");
			if (!$result1)
			{
				$result1=mysql_query("INSERT INTO  `sw`.`sw_setting` (
				`setting_id` ,
				`setting_name` ,
				`setting_data`
				)
				VALUES (
				NULL ,  'website_title',  'Website Title'
				);");
			}
			else
			{
				$num1=mysql_num_rows($result1);	
				$i1=0;
				while ($num1 > $i1)
				{
					$setting_data=mysql_result($result1,$i1,"setting_data");
					echo "<title>$setting_data | $user_title</title>";
					$i1++;
				}
			}
			echo "<style>#user_content { width:100%; }</style>";
			echo "<h2>$user_title</h2>";
			echo "<div id='microtext'>Username: $user_name</div>";
			if (!empty($user_img_url)) {
				echo "<img src='$user_img_url' style='margin-top:0px;' />";
			}
			echo "<p>$user_data</p>";
			echo "$user_image";
			##if ($i1+1 !== $num1) 
			##{
			echo "<hr />";
			echo "<p><a href='/'>Home</a></p>";
			##}
			$i1++;
		}
	}
}
mysql_close($con);
?>