<?php
echo 
"<div id='sidebar'>
<div id='widget'>
<div id='widget_name'><h3>Recent Posts</h3></div>
<div id='widget_content'>
<ul>
";
	$con=mysql_connect($host,$user,$password,$db);
	if (!$con)
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	else 
	{
	$result1=mysql_query("SELECT * FROM
	`sw`.`sw_post`
	WHERE `post_status`=1
	ORDER BY `post_timeupdate` DESC
	LIMIT 0 , 5");
	
		$num1=mysql_num_rows($result1);
		if (!$num1){
			echo "No Posts!";	
		}
		$i1=0;
		while ($num1 > $i1)
		{
			$post_id=mysql_result($result1,$i1,"post_id");
			$post_title=mysql_result($result1,$i1,"post_title");
			echo "
			<li><a href='/?pt=$post_id'>$post_title</a></li>";
			$i1++;
		}
	}
echo "
</ul>
</div>
</div>
<div id='widget'>
<div id='widget_name'><h3>Recent Categories</h3></div>
<div id='widget_content'>
<ul>";
	$result1=mysql_query("SELECT * FROM
	`sw`.`sw_cat`
	ORDER BY `cat_timeupdate` DESC
	LIMIT 0 , 50");
	$num1=mysql_num_rows($result1);	
	$i1=0;
		if (!$num1){
			echo "No Categories!";	
		}
	while ($num1 > $i1)
	{
		$cat_id=mysql_result($result1,$i1,"cat_id");
		$cat_title=mysql_result($result1,$i1,"cat_title");
		echo "
		<li><a href='/?cat=$cat_id'>$cat_title</a></li>";
		$i1++;
	}
echo "
</ul>
</div>
</div>
";
	$result1=mysql_query("SELECT * 
	FROM  `sw`.`sw_widget` 
	WHERE  `widget_status` =1
	ORDER BY `widget_order` DESC
	LIMIT 0 , 30");
	$num1=mysql_num_rows($result1);	
	$i1=0;
	while ($num1 > $i1)
	{
		$widget_content=mysql_result($result1,$i1,"widget_content");
		$widget_title=mysql_result($result1,$i1,"widget_title");
		echo "
		<div id='widget'>
		<div id='widget_name'><h3>$widget_title</h3></div>
		<div id='widget_content'>
			$widget_content
		</div></div>";
		$i1++;
	}
mysql_close($con);
echo "
</div>";
?>