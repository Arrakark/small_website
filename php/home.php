<?php
$con=mysql_connect($host,$user,$password,$db);
if (!$con)
{
	die("Server Down");
}
$result1=mysql_query("SELECT * 
FROM  `sw`.`sw_setting` 
WHERE  `setting_name` LIKE  'website_title'
LIMIT 0 , 30");
{
	$num1=mysql_num_rows($result1);	
	$i1=0;
	while ($num1 > $i1)
	{
		$setting_data=mysql_result($result1,$i1,"setting_data");
		echo "<title>$setting_data | Home</title>";
		$i1++;
	}
}
$postnumber=$_GET['pag']*5;
$result1=mysql_query("SELECT * 
FROM  `$db`.`sw_post` 
WHERE  `post_status` =1
ORDER BY  `sw_post`.`post_timeupdate` DESC 
LIMIT $postnumber , 5");
if (!$result1)
{
	echo "<h2>No Posts!</h2>";
}
else
{
	$num1=mysql_num_rows($result1);	
	if (!$num1)
	{
		echo "<h2>No Posts!</h2>";
	}
	$i1=0;
	while ($num1 > $i1)
	{
		$post_id=mysql_result($result1,$i1,"post_id");
		$post_title=mysql_result($result1,$i1,"post_title");
		$post_data=mysql_result($result1,$i1,"post_data");
		$post_timeadd=mysql_result($result1,$i1,"post_timeadd");
		echo "<a href='/?pt=$post_id' style='text-decoration:none;'><h2>$post_title</h2></a>";
		echo "<div id='microtext'>Posted: $post_timeadd</div>";
		echo "$post_data";
		##if ($i1+1 !== $num1) 
		##{
		echo "<hr />";
		##}
		$i1++;
	}
}
$result2=mysql_query("SELECT * 
FROM  `$db`.`sw_post` 
WHERE  `post_status` =1");
$num2=mysql_num_rows($result2);
$page=ceil($num2/5);
$pagei1=0;
if ($num2)
{
	echo "<p>Page: ";
	while ($page > $pagei1)
	{
		echo "<a href='/?pag=$pagei1' class='pagelink'>$pagei1</a> ";
		$pagei1++;	
	}
	echo "</p>";
}
?>