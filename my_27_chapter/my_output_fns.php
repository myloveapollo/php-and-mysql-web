<?php
function do_html_header($title) {
  // print an HTML header
  header("Content-type:text/html; charset=GBK");
 
?>
  <html>
  <head>
    <title><?php echo $title;?></title>
    <style>
      body { font-family: Arial, Helvetica, sans-serif; font-size: 13px }
      li, td { font-family: Arial, Helvetica, sans-serif; font-size: 13px }
      hr { color: #3333cc; width=300; text-align=left}
      a { color: #000000 }
    </style>
  </head>
  <body>
  <img src="bookmark.gif" alt="PHPbookmark logo" border="0"
       align="left" valign="bottom" height="55" width="57" />
  <h1>PHPbookmark</h1>
  <hr />
<?php
  if($title) {
    do_html_heading($title);
  }
}

function do_html_footer(){
?>
	</body>
	</html>
<?php
}

function do_html_heading($heading){
?>
	<h2><?php echo $heading;?></h2>
<?php
}

function do_html_URL($url, $name){
?>
	<br/><a href="<?php echo $url;?>"><?php echo $name;?></a><br/>
<?php
}

function display_site_info(){
?>
	<ul>
		<li>Store your bookmark online with us</li>
	</ul>
<?php
}

function display_login_form(){
?>
	<p><a href="register_form.php">Not a member?</a></p>
	<form method="post" action="member.php">
		<table>
			<tr>
				<td colspan="2">Members log in here:</td>
			</tr>
			<tr>
				<td>Username:</td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr>
				<td>Password:</td>
				<td><input type="text" name="passwd"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="sumbit" value="Login"></td>
			</tr>
			<tr>
				<td colspan="2"><a href="forgot_form.php">Forgot your password?</a></td>
			</tr>
		</table>
}