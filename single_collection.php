<!DOCTYPE html>

<html lang="en">
<head>

	<title>Special Collections Wireframes</title>

	<link rel="stylesheet" type="text/css" href="css/styles.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style>
		body { background-color: #ddd; }
		#page { width: 970px; margin: 0 auto; background-color: #fff; border-left: 1px solid #bbb; border-right: 1px solid #bbb; padding: 0 14px; }

		.nav li {
			float: left; }
		.nav li a {
			display: block;
			padding: 8px 15px;
			text-decoration: none;
			font-weight: bold;
			color: #069;
			border-right: 1px solid #ccc; }
		.nav li a:hover {
			color: #c00;
			background-color: #fff; }
	</style>

</head>


<!DOCTYPE html>

<html lang="en">
<head>

	<title>Special Collections Wireframes</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style>
		body { background-color: #fff; }
		#page { width: 970px; margin: 0 auto; background-color: #fff; border-left: 0px solid #bbb; border-right: 0px solid #bbb; padding: 0 14px; }

		.nav li {
			float: left; }
		.nav li a {
			display: block;
			padding: 8px 15px;
			text-decoration: none;
			font-weight: bold;
			color: #069;
			border-right: 1px solid #ccc; }
		.nav li a:hover {
			color: #c00;
			background-color: #ddd; }
		.fixed {
  			position: fixed;
   			top: 0;
   			background: #fff;
   			border-bottom: 1px solid #ddd;
  		}
	</style>

</head>

<body>

	<div id="page">
		<div class="line">
			<div class="span4 unit left">3
				<a href="http://gvsu.edu"><img src="img/logo.jpg" alt="Grand Valley State University" /></a>
			</div>

			<div style="#ccc; padding-bottom: 14px; padding-top: 14px; display: block;">
				<div class="span2 unit right nav">
					<ul style="text-align: center;">
						<li style="width: 32%; display: inline-block;"><a href="collections.php">Collections</a></li>
						<li style="width: 32%; display: inline-block;"><a href="services.html">Services</a></li>
						<li style="width: 32%; display: inline-block;"><a href="exhibits.html">Exhibits</a></li>
					</ul>
				</div>
			</div>
		</div>

		<div class="line">
			<div class="span1 unit">
				<h2 style="font-size: 30px; text-align: left;"><a href="index.html">Special Collections &amp; University Archives</a></h2>
			</div>
		</div>

		<div class="line sticky" style="margin-bottom: 28px;">
			<div class="span1 unit left" style="text-align: center;">
				<input style="padding-top: 14px; padding-bottom: 14px; padding-left: 14px; font-size: 24px;" id="search-text" type="text" size="82%" name="q" placeholder="Search our collections" />
			</div>
		</div>


		<?php

			$alias = $_GET["alias"];
			//echo "<p>Alias: " . $_GET["alias"] . "</p>";

			$contentDmParam = file_get_contents('https://server16015.contentdm.oclc.org/dmwebservices/index.php?q=dmGetCollectionParameters/' . $alias . '/json');
			$paramResults = json_decode($contentDmParam);

			foreach($paramResults as $key => $value) {
				if ($key == 'name') {
					$name = $value;
					echo '<h3>' . $name . '</h3> <br/>';
				}
			}


			$contentDmQuery = file_get_contents('https://server16015.contentdm.oclc.org/dmwebservices/index.php?q=dmQuery/' . $alias . '/^^all^and/title!subjec/title/50/1/0/0/0/0/0/0/json');
			$queryResults = json_decode($contentDmQuery);

			foreach($queryResults as $key=>$value) {
				if ($key == 'records') {
					foreach($value as $v) {
						if (is_object($v)) {
							$v = get_object_vars($v);
							
							echo '

								<div class="span3 unit left">

								<img src="http://cdm16015.contentdm.oclc.org/utils/getthumbnail/collection/' . $alias . '/id/' . $v['pointer'] . '.jp2">  

								<h4>' . $v['title'] . '</h4>

								</div>

								';
						}
					}
				}
			}

		?>

		<!--

		<div class="line" style="padding: 1.5em; border-bottom: 1px solid #bbb;">
			<div class="span4 unit left">
				<img src="http://placehold.it/300x200">
			</div>
			<div class="span2 unit left">
				<h4 style="margin-top:0;"><a href="#">Civil War &amp; Slavery</a></h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
			</div>
			<div class="span4 unit left lastUnit">
				<p style="text-align:right;margin-top:2em;"><a href="#" class="lib-button-small-grey" style="width:70%;text-align:center;">Digital Collection</a><br /><a href="#" class="lib-button-small-grey" style="width:70%; text-align:center;">Finding Aid</a></p>
			</div>
		</div>

		-->

		<div style="margin-top: 40px;"></div>


		<div class="footer line">
			<div class="span4 unit left">
				<p class="adr gvsu-address">
				<span class="street-address">1 Campus Drive</span><br>
				<span class="locality">Allendale</span>, <span class="region" title="Michigan">MI</span>
				<span class="postal-code">49401-9403</span><br> <span class="country-name">USA</span> - 
				<a href="tel:616-331-5000" class="tel" title="+1-616-331-5000">(616) 331-5000</a> <br class="gvsu-mobile">
				<a href="/contactus-index.htm" class="gvsu-mobile">Contact Us</a> </p>
			</div>

			<div class="span4 unit left">
				<p>
				<a href="gvsu.edu/admissions">Apply Now</a><br>
				<a href="http://www.gvsulakers.com">Athletics</a><br>
				<a href="gvsu.edu/giving">Giving</a><br> <a href="/diversity">Inclusion/Diversity</a><br>
				<a href="gvsu.edu/library">Library</a><br>
				<a href="gvsu.edu/admissions/undergraduate/index.cfm?sb_path=visit-schedule">Schedule a Campus Visit</a><br>
				</p>
			</div>

			<div class="span2 unit left lastUnit">

				<h5 style="margin-top: 0; font-size: 1.2em;">Location &amp; Hours</h5>
				<p><b>Hours:</b> Monday &#8211; Friday, 9a &#8211; 4:30p</p>

				<div class="span2 unit left">
					<img src="http://placehold.it/240x170">
					
				</div>
			
				<div class="span2 unit left" style="-webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; padding-left: .5em;">

				<p><b>Special Collections &amp; University Archives</b><br />
					Grand Valley State University<br /><a href="mailto:collections@gvsu.edu">collections@gvsu.edu</a><br />
						(616) 331-2749</p>
						<p><a href="#" class="lib-button-small">Donate</a></p>
			</div>
		</div>


	</div><!-- End #page -->

</body>
</html>
