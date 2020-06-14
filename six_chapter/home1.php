<?php
	require("page.inc");
	$homepage = new Page();
	// $homepage -> keywords = "sssss";
	// $homepage -> content = "ddddd";
	// echo "$homepage->keywords";
	// echo "$homepage->set($keywords,"ssssss")";
	

	$homepage->content = "<p>Welcome to the home of TLA Consulting.
							please take some time to get to know us.</p>
							<p>We specialize in serving your business needs
							and hope to hear from you soon.</p>";
	$homepage->Display();
?>

