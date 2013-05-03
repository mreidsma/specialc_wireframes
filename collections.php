
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
			<div class="span4 unit left">
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

	$contentDm = file_get_contents('https://server16015.contentdm.oclc.org/dmwebservices/index.php?q=dmGetCollectionList/json');
	$goodies = json_decode($contentDm);
	foreach($goodies as $value) {
		foreach($value as $key => $value) {
			//echo $key . ' : ' . $value . '<br />';
				if($key == 'alias') {
					$alias = substr($value, 1);
					//echo $key . ' : ' . $alias . '<br />';
				}
				else if($key == 'name') {
			 		$name = $value;
				}
				else if($key == 'path') {
			 		$path = $value;
				}
		}

		//info
		//https://server16015.contentdm.oclc.org/dmwebservices/index.php?q=dmGetItemInfo/p15068coll11/pointer/format

		echo'

		<div class="line">
			<div class="span3 unit left">
				<a href="single_collection.php?alias=' . $alias . '"><img src="http://placehold.it/300x200"></a>
			</div>

			<div class="span2of3 unit left">
				<h4><a href="single_collection.php?alias=' . $alias . '">' . $name . '</a></h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			</div>
		</div>

		';
	
		// Echo html awesomeness
	}

?>

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

	<script>
		var sticky = document.querySelector('.sticky');
		var origOffsetY = sticky.offsetTop;

		function onScroll(e) {
			window.scrollY >= origOffsetY ? sticky.classList.add('fixed') :
			sticky.classList.remove('fixed');
		}
		document.addEventListener('scroll', onScroll);
	</script>

</body>
</html>
