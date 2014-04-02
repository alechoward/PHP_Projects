
<!doctype html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en" data-useragent="Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; Trident/6.0)">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Harrison Howard Home Page</title>

    
    <meta name="description" content="Documentation and reference library for ZURB Foundation. JavaScript, CSS, components, grid and more." />
    
    <meta name="author" content="ZURB, inc. ZURB network also includes zurb.com" />
    <meta name="copyright" content="ZURB, inc. Copyright (c) 2013" />
    
    <link rel="stylesheet" id="google-fonts-css"  href="http://fonts.googleapis.com/css?family=Open+Sans%3A400%2C300&#038;ver=3.5.2" type='text/css' media='all' />
    <link rel="stylesheet" href="css/foundation.css" />
    
    <script src="js/modernizr.js"></script>


  </head>
<body>


<!-- <div class="sub-nav">
<div id='categoryLinks' class="row sub-nav-links text-center">
         <a href="#category">Category<span class="arrow-s"></span></a>
         <a href="#collection">Collection<span class="arrow-s"></span></a>
         <a href="#color">Color<span class="arrow-s"></span></a>
      </div>
-->

<div class="row" style="height:25px">
    <div class="large-3 columns large-centered">
			<dl class="sub-nav">
  				<dd id = "All"><a href="javascript:toggle();"><strong>ALL</strong><span class="arrow-s"></span></a></dd>
  				<dd id = "Originals"><a href="javascript:toggle();"><strong>ORIGINAL</strong><span class="arrow-s"></span></a></dd>
  				<dd id = "Style"><a href="javascript:toggle();"><strong>STYLE</strong><span class="arrow-s"></span></a></dd>
			</dl>
		</div>
</div>





<?php include('inc/cat.php') ?>
<div class="row" style="display:none;" id = "toggleText">
        <div class="large-12 columns large-centered text-center">
          <div class="section-container accordian" data-section="accordion" data-options="deep_linking: true">
            <section>
              <p class="title" data-section-title><a href="#category"></a></p>
              <div class="content" data-slug="category" data-section-content>
                <ul class="inline-list"> <!--refer to inline-list in .css file to see how the list is centered with additon of 'display: inline-block' feature and removal of float:left -->
                   <?php foreach($Originals as $Original) {?><li><em><p><?php echo $Original ?></p></em></li>
                  <?php } ?>
                </ul>
              </div>
            </section>
        </div>
      </div>
    </div>
 <hr></hr>
 <script src="http://foundation.zurb.com/assets/js/jquery.js"></script>
    <script src="http://foundation.zurb.com/assets/js/templates/foundation.js"></script>
    <script src="http://foundation.zurb.com/assets/js/templates/foundation.reveal.js"></script>
   

  <script language="javascript"> 
  
  function toggle() {
  var ele = document.getElementById("toggleText");
  var text = document.getElementById("displayText");
  if(ele.style.display == "block") {
        ele.style.display = "none";
    text.innerHTML = "show";
    }
  else {
    ele.style.display = "block";
    text.innerHTML = "hide";
  }
} 
</script>



<body>