<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Inyungu</title>
		<meta name="description" content="Simple Multi-Item Slider: Category slider with CSS animations" />
		<meta name="keywords" content="jquery plugin, item slider, categories, apple slider, css animation" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico"> 
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<script src="js/modernizr.custom.63321.js"></script>
	</head>
	<body>
	<div class="row-fluid">
	   	<div class="span10">
		
		<div class="container">	
			<div class="main">
				<div id="mi-slider" class="mi-slider">
					<ul>
						<li><a href="#"><img src="images/slider/1.jpg" alt="img01"><h4>Inka</h4></a></li>
						<li><a href="#"><img src="images/slider/2.jpg" alt="img02"><h4>Inkoko</h4></a></li>
						<li><a href="#"><img src="images/slider/3.jpg" alt="img03"><h4>Ihene</h4></a></li>
						<li><a href="#"><img src="images/slider/4.jpg" alt="img04"><h4>Ingurube</h4></a></li>
					</ul>
					<ul>
						<li><a href="#"><img src="images/slider/5.jpg" alt="img05"><h4>Umuceli</h4></a></li>
						<li><a href="#"><img src="images/slider/6.jpg" alt="img06"><h4>Ibishyimbo</h4></a></li>
						<li><a href="#"><img src="images/slider/7.jpg" alt="img07"><h4>Amasaka</h4></a></li>
						<li><a href="#"><img src="images/slider/8.jpg" alt="img08"><h4>Ikawa</h4></a></li>
					</ul>
					<ul>
						<li><a href="#"><img src="images/slider/9.jpg" alt="img09"><h4>Amamesa</h4></a></li>
						<li><a href="#"><img src="images/slider/10.jpg" alt="img10"><h4>Umunyu</h4></a></li>
						<li><a href="#"><img src="images/slider/11.jpg" alt="img11"><h4>Isukali</h4></a></li>
					</ul>
					<ul>
						<li><a href="#"><img src="images/slider/12.jpg" alt="img12"><h4>Imineke</h4></a></li>
						<li><a href="#"><img src="images/slider/13.jpg" alt="img13"><h4>Ibirayi</h4></a></li>
						<li><a href="#"><img src="images/slider/14.jpg" alt="img14"><h4>Ibijumba</h4></a></li>
						<li><a href="#"><img src="images/slider/15.jpg" alt="img15"><h4>Ifumbire</h4></a></li>
					</ul>
					<nav>
						<a href="#">Amatungo</a>
						<a href="#">Ibihingwa</a>
						<a href="#">Ibiribwa</a>
						<a href="#">Ibindi ...</a>
					</nav>
				</div>
			</div>
		</div><!-- /container -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="js/jquery.catslider.js"></script>
		<script>
			$(function() {

				$( '#mi-slider' ).catslider();

			});
		</script>
</div><!--/span-->
	<div class="span2 ">
  <?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>"Ibigezweho",
		));
		
	?>
  	<table class="table table-hover">
        <thead>
        <tr>
          <th>Umuceli</th>
          <th>20</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Ibirayi</td>
          <td>60</td>
        </tr>
        <tr>
          <td>Inka</td>
          <td>20</td>
        </tr>
        <tr>
          <td>Ihene</td>
          <td>10%</td>
        </tr>
        <tr>
          <td>Ikawa</td>
          <td>5</td>
        </tr>
        <tr>
          <td>Ingurube</td>
          <td>5</td>
        </tr>
      </tbody>
    </table>
    <?php $this->endWidget();?>
	</div><!--/span-->
</div><!--/row-->	
	</body>
</html>
