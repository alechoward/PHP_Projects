<?php ?>
<?php include('inc/productsarray.php');

$product_id = $_GET["id"];
$product = $products[$product_id];
$section = "Product_Page";
$pageTitle = $product["name"];
include("inc/headercopyhschl.php"); 
include("inc/filterhead.php"); ?>

<div class="row">
    <div class="large-12 columns">

		<div class="large-5 large-7 columns" data-reveal-id="myVid">
			<ul>
			  
				  <li style="list-style: none;">
				   <img src="<?php echo $product["img"]; ?>" class="image-preload" />
				   <div class="reveal-modal large" id="myVid" data-reveal>
                    	<h2><?php echo $product["name"]; ?></h2>
                  			<img src="<?php echo $product["img"]; ?>" frameborder="0" allowfullscreen="">
                      	<a class="close-reveal-modal">×</a>
                  </div>
				  </li></a>
			</ul>
    	</div>

<script src="http://foundation.zurb.com/assets/js/jquery.js"></script>
    <script src="http://foundation.zurb.com/assets/js/templates/foundation.js"></script>
    <script src="http://foundation.zurb.com/assets/js/templates/foundation.reveal.js"></script>
    <script>
      $(document).foundation();

      var doc = document.documentElement;
      doc.setAttribute('data-useragent', navigator.userAgent);
    </script>
    