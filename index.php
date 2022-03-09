<?
	include "php/connect.php";
	include "php/track.php";
	$con=mysql_connect($host,$user,$password,$db);
	if (!$con)
	{
		die("Server Down");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <link href="<?php
				$con=mysql_connect($host,$user,$password,$db);
                $result1=mysql_query("SELECT * 
				FROM  `sw`.`sw_setting` 
				WHERE  `setting_name` =  'style_file'
				LIMIT 0 , 30");
				$num1=mysql_num_rows($result1);	
				$i1=0;
				while ($num1 > $i1)
				{
					$setting_data=mysql_result($result1,$i1,"setting_data");
					echo "$setting_data";
					$i1++;
				}
				?>" media="all" rel="Stylesheet" type="text/css" />
    	<link rel="icon" type="image/png" href="<?php
                $result1=mysql_query("SELECT * 
				FROM  `sw`.`sw_setting` 
				WHERE  `setting_name` = 'favicon'
				LIMIT 0 , 30");
				$num1=mysql_num_rows($result1);	
				$i1=0;
				while ($num1 > $i1)
				{
					$setting_data=mysql_result($result1,$i1,"setting_data");
					echo "$setting_data";
					$i1++;
				}
				?>">
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <meta name="viewport" content="width=<?php
                $result1=mysql_query("SELECT * 
				FROM  `sw`.`sw_setting` 
				WHERE  `setting_name` = 'view_width'
				LIMIT 0 , 30");
				$num1=mysql_num_rows($result1);	
				$i1=0;
				while ($num1 > $i1)
				{
					$setting_data=mysql_result($result1,$i1,"setting_data");
					echo "$setting_data";
					$i1++;
				}
				?>,  user-scalable=no">
        <script>
		num=1;
		function showDiv() {
			if (num==1){
				document.querySelector("div#adminnav").style.height = "32px";
				document.querySelector("div#adminnav").style.paddingTop = "18px";
				num=0;
			}
			else {
				num=1;
				document.querySelector("div#adminnav").style.height = "0px";
				document.querySelector("div#adminnav").style.paddingTop = "0px";
			}
		};
		</script>
        <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js?ver=1.3.2'></script>
<script type='text/javascript'>
    
    $(function(){
    
        var iFrames = $('iframe');
      
    	function iResize() {
    	
    		for (var i = 0, j = iFrames.length; i < j; i++) {
    		  iFrames[i].style.height = iFrames[i].contentWindow.document.body.offsetHeight + 'px';}
    	    }
    	    
        	if ($.browser.safari || $.browser.opera) { 
        	
        	   iFrames.load(function(){
        	       setTimeout(iResize, 0);
               });
            
        	   for (var i = 0, j = iFrames.length; i < j; i++) {
        			var iSource = iFrames[i].src;
        			iFrames[i].src = '';
        			iFrames[i].src = iSource;
               }
               
        	} else {
        	   iFrames.load(function() { 
        	       this.style.height = this.contentWindow.document.body.offsetHeight + 'px';
        	   });
        	}
        
        });

</script>
    </head>
    <body>
        <div id="main_content">
            <div id="header">
                <a href="/"><h1><?php
                $result1=mysql_query("SELECT * 
				FROM  `sw`.`sw_setting` 
				WHERE  `setting_name` =  'website_title'
				LIMIT 0 , 30");
				$num1=mysql_num_rows($result1);	
				$i1=0;
				while ($num1 > $i1)
				{
					$setting_data=mysql_result($result1,$i1,"setting_data");
					echo "$setting_data";
					$i1++;
				}
				?></h1></a>
                <div id="search">
                    <form action="/" method="put">
                    <input type="search" name="s"/>
                    <input type="submit" value="Search"/>
                    </form>
                </div>
                <div id="clear"></div>
            </div>
            <div id="navbar">
            	<div id="navwrap">
                    <div id="navlinks">
                        <?php
                        $result1=mysql_query("SELECT * 
                        FROM  `sw`.`sw_setting` 
                        WHERE  `setting_name` =  'show_home_nav'
                        LIMIT 0 , 30");
                        $num1=mysql_num_rows($result1);	
                        $i1=0;
                        while ($num1 > $i1)
                        {
                            $setting_data=mysql_result($result1,$i1,"setting_data");
                            if ($setting_data==1){
                                echo "<span><a href='/'>Home</a></span>";
                            }
                            $i1++;
                        }
                        ?>
                        <?php
                        $result1=mysql_query("SELECT *
                        FROM `sw`.`sw_page`
                        WHERE `page_navbar` =1
                        AND `page_status` =1
                        LIMIT 0 , 30");
                        $num1=mysql_num_rows($result1);	
                        $i1=0;
                        while ($num1 > $i1)
                        {
                            $page_id=mysql_result($result1,$i1,"page_id");
                            $page_title=mysql_result($result1,$i1,"page_title");
                            echo "<span><a href='/?pg=$page_id'>$page_title</a></span>";
                            $i1++;
                        }
                        $result1=mysql_query("SELECT *
                        FROM `sw`.`sw_cat`
                        WHERE `cat_navbar` =1
                        AND `cat_status` =1
                        LIMIT 0 , 30");
                        $num1=mysql_num_rows($result1);	
                        $i1=0;
                        while ($num1 > $i1)
                        {
                            $cat_id=mysql_result($result1,$i1,"cat_id");
                            $cat_title=mysql_result($result1,$i1,"cat_title");
                            echo "<span><a href='/?cat=$cat_id'>$cat_title</a></span>";
                            $i1++;
                        }
                        ?>
                        <spam><a href="#"></a></span>
                        <div id="menu" onclick="javascript:showDiv();"></div>
                    </div>
            	</div>
            </div>
            <div id="adminnav">
            	<div id="adminwrap"><span>
                <?php
                $result1=mysql_query("SELECT *
				FROM `sw`.`sw_footer`
				LIMIT 0 , 30");
				$num1=mysql_num_rows($result1);	
				$i1=0;
				while ($num1 > $i1)
				{
					$footer_data=mysql_result($result1,$i1,"footer_data");
					$footer_url=mysql_result($result1,$i1,"footer_url");
					echo "<a href='$footer_url'>$footer_data</a>";
					$i1++;
				}
				?></span></div>
            </div>
            <?php
				if (empty($_GET['cat']) and empty($_GET['md']) and empty($_GET['pt']) and empty($_GET['us']) and empty($_GET['pg']) and empty($_GET['s'])) {
					include ("php/img.php");			
				}
            ?>
            <div id="page">
            <div id="page_content">
            <div id="post">
            <?php
	if (empty($_GET['cat']) and empty($_GET['md']) and empty($_GET['pt']) and empty($_GET['us'])and empty($_GET['pg']) and empty($_GET['s'])) {
		include ("php/home.php");			
	}
	if (empty($_GET['cat']) and empty($_GET['md']) and !empty($_GET['pt']) and empty($_GET['pg']) and empty($_GET['us']) and empty($_GET['s'])) {
		include ("php/post.php");	
	}
	if (empty($_GET['cat']) and empty($_GET['md']) and empty($_GET['pt']) and !empty($_GET['pg']) and empty($_GET['us']) and empty($_GET['s'])) {
		include ("php/page.php");	
	}
	if (!empty($_GET['cat']) and empty($_GET['md']) and empty($_GET['pt']) and empty($_GET['pg']) and empty($_GET['us']) and empty($_GET['s'])) {
		include ("php/cat.php");	
	}
	if (empty($_GET['cat']) and !empty($_GET['md']) and empty($_GET['pt']) and empty($_GET['pg']) and empty($_GET['us']) and empty($_GET['s'])) {
		include ("php/media.php");	
	}
	if (empty($_GET['cat']) and empty($_GET['md']) and empty($_GET['pt']) and empty($_GET['pg']) and !empty($_GET['us']) and empty($_GET['s'])) {
		include ("php/user.php");	
	}
	if (empty($_GET['cat']) and empty($_GET['md']) and empty($_GET['pt']) and empty($_GET['pg']) and empty($_GET['us']) and !empty($_GET['s'])) {
		include ("php/search.php");	
	}
            ?>
            </div>
            </div>
            <?php
				if (!$_GET['md'] and !$_GET['pg']) {
					include ("php/sidebar.php");	
				}
            ?>
            <div id='clear'></div>
        	</div>
        	<div id="footer">
                <center><span><?php
					$con=mysql_connect($host,$user,$password,$db);
                	$result1=mysql_query("SELECT *
					FROM `sw`.`sw_footer`
					LIMIT 0 , 30");
					$num1=mysql_num_rows($result1);	
					$i1=0;
					while ($num1 > $i1)
					{
						$footer_data=mysql_result($result1,$i1,"footer_data");
						$footer_url=mysql_result($result1,$i1,"footer_url");
						echo "<a href='$footer_url'>$footer_data</a>";
						$i1++;
					}
					mysql_close($con);
					?></span></center>
            <div id='clear'></div>
        	</div>
        </div>
    </body>
</html>