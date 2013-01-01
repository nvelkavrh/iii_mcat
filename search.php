<!DOCTYPE html> 
<html manifest="m.appcache">
	<head> 
	<title>Wardman Library Mobile Catalog Search</title>
		<!-- essential for mobile scaling -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- mobile web app meta tag
		see http://developer.apple.com/library/safari/#documentation/appleapplications/reference/SafariHTMLRef/Articles/MetaTags.html -->
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta description="A mobile-friendly website for the Wardman Library. View the library hours, search for books,
		visit our academic databases, and ask a librarian; all on your mobile device!" />
		<!-- protocol-relative URL, served from jQuery CDN -->
		<link rel="stylesheet" href="//code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.css" />
		<link rel="stylesheet" href="./meta/m.css" />
		<!-- served from Google CDN instead of jQuery b/c more liked to be cached in visitor's browser -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<!-- override default page transition (fade) - must run this script before jQuerty Mobile loads -->
		<script>
		(function($) {
			$(document).bind("mobileinit", function(){
				$.extend( $.mobile , {
					defaultPageTransition: "slide"
				});
			});
		}(jQuery));
		</script>
		<script src="//code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.js"></script>
	<?php include('functions.inc.php'); ?>
</head> 
<body>
<div data-role="page">

	<div data-role="header">
	
		<h1>Search Results</h1>
	</div><!-- /header -->
	<div data-role="content">

	
    <?php
	
		if (!isset($_GET["searchtype"]) && !isset($_GET["link"]))
			header('Location: index.php');
	
		if (isset($_GET["searchtype"]))
			$searchtype = $_GET["searchtype"];
		if (isset($_GET["searchstring"]))
			$searchstring = $_GET["searchstring"];
		if (isset($_GET["sort"]))
			$sortby = $_GET["sort"]; 
	?>
	<?php
			//first time through there will be no link
			if(isset($_GET["link"])){
				draw_initial_results(urlencode($_GET["link"]));
			}
			else
				draw_initial_results(get_query_string($searchtype,urlencode($searchstring),$sortby),$searchtype,$searchstring,$sortby);

		?>	  
	</div>
	<div data-role="footer" data-id="myfooter" data-position="fixed" >
		<div class="controls" data-role="controlgroup" data-type="horizontal">
			<a href="http://www.whittier.edu/library/test/mobile/index.html" data-role="button" data-icon="home">Home</a>
			<a href="index.php" data-role="button" data-icon="search">Search</a>
			<a href="http://www.whittier.edu/library/" target="_blank" 	data-role="button" data-icon="plus">Full site</a>
		</div>
	</div><!-- /footer -->

	<script type="text/javascript">

		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-25503102-1']);
		_gaq.push(['_trackPageview']);

		(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();

	</script>
</div><!-- /page -->
<?php echo $data; ?>

  </body>
</html>
