<?php
$con=mysql_connect($host,$user,$password,$db);
if (!$con)
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$post_id=$_GET['pt'];
$result1=mysql_query("SELECT * 
FROM  `$db`.`sw_post` 
WHERE  `post_status` =1
AND `post_id` =$post_id
LIMIT 0, 1");
if (!$result1)
{
	echo "<h2>No Posts!</h2>";
}
else
{
	$num1=mysql_num_rows($result1);	
	$i1=0;
	while ($num1 > $i1)
	{
		
		$post_id=mysql_result($result1,$i1,"post_id");
		$post_title=mysql_result($result1,$i1,"post_title");
		$post_data=mysql_result($result1,$i1,"post_data");
		$post_timeadd=mysql_result($result1,$i1,"post_timeadd");
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
				echo "<title>$setting_data | $post_title</title>";
				$i1++;
			}
		}
		echo "<h2>$post_title</h2>";
		echo "<div id='microtext'>Posted: $post_timeadd</div>";
		echo "$post_data<hr />";
		echo "
		<form action='/php/postcomment.php' method='post'>
		<input type='hidden' name='post_id' value='$post_id' />
			<h3>Post a comment:</h3>
			<table width='100%' id='commenttable'>
				<tr>
					<td>Email:</td>
					<td><input type='text' name='email' /></td>
				</tr>
				<tr>
					<td>Comment:</td>
					<td><textarea cols='20' name='data'></textarea></td>
				</tr>
				<tr>
					<td colspan='2'><input type='submit' /></td>
				</tr>
			</table>
		</form>
			";
		echo "<h3>Comments:</h3>";
		$post_id=$_GET['pt'];
		$comment_page=$_GET['cpa']*30;
		$result1=mysql_query("SELECT * 
		FROM  `$db`.`sw_comment` 
		WHERE  `comment_post_id` =$post_id
		AND `comment_status` =1
		ORDER BY  `sw_comment`.`comment_timeupdate` DESC 
		LIMIT $comment_page, 30");
		if (!$result1)
		{
			echo "<h2>No comments!</h2>";
		}
		else
		{
			$num1=mysql_num_rows($result1);	
			$i1=0;
			while ($num1 > $i1)
			{
				$emailcheck=array("@",".","/","-");
				$comment_id=mysql_result($result1,$i1,"comment_id");
				$comment_title=mysql_result($result1,$i1,"comment_title");
				$comment_data=mysql_result($result1,$i1,"comment_data");
				$comment_email=str_replace($emailcheck, " ", mysql_result($result1,$i1,"comment_email"));
				$comment_timeadd=mysql_result($result1,$i1,"comment_timeadd");
				echo "<div id='comment'>";
				echo "$comment_data<div id='microtext'>Posted: $comment_timeadd by $comment_email";
				echo "</div></div><br/>";
				$i1++;
			}
		}
		echo "<hr />";
		echo "<p>";
		$result2=mysql_query("SELECT * 
		FROM  `$db`.`sw_comment` 
		WHERE  `comment_post_id` =$post_id
		AND `comment_status` =1");
		$num2=mysql_num_rows($result2);
		$page=ceil($num2/30);
		$pagei1=0;
		echo " Comment page: ";
		while ($page > $pagei1)
		{
			echo "<a href='/?pt=$post_id&cpa=$pagei1' class='pagelink'>$pagei1</a> ";
			$pagei1++;	
		}
		echo "<a href='/'>Home</a></p>";
		$i1++;
	}
}
?>