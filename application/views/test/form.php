<!DOCTYPE html>
<html class="no-js" lang="en" dir="ltr">
<head>
    <link rel="shortcut icon" href="img/favicon_32.ico">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Title</title>
      <!-- CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/foundation6/css/foundation.min.css') ?>">

    <!-- JavaScript -->
    <script src="<?= base_url('assets/foundation6/js/vendor/jquery.js') ?>"></script> 
    <script src="<?= base_url('assets/foundation6/js/vendor/what-input.js') ?>"></script> 
    <script src="<?= base_url('assets/foundation6/js/vendor/foundation.min.js') ?>"></script>

    <script>
        $(document).ready(function(){
            $(document).foundation();
        });
    </script>  
</head>
<body>
	<div class="off-canvas position-left" id="offCanvas" data-off-canvas>
	    <!-- Menu -->
	    <ul class="vertical menu accordion-menu" data-accordion-menu>
	    	<li>
	    		<!-- Close button -->
	    		<button class="close-button" aria-label="Close menu" type="button" data-toggle="offCanvas">
		      		<span aria-hidden="true">&times;</span>
		    	</button>
	    	</li>
	    	<li><a href="#"><h5>AFControl App.</h5></a></li>
			<li>
			    <a href="#">Item 1</a>
			    <ul class="menu vertical nested">
			      <li><a href="#">Item 1A</a></li>
			      <li><a href="#">Item 1B</a></li>
			    </ul>
			</li>
			<li><a href="#">Item 2</a></li>
			<li><a href="#">Item 3</a></li>
	    </ul>
  	</div>
  	<div class="off-canvas-content" data-off-canvas-content>
	    <!-- Your page content lives here -->
	    <button type="button" class="button" data-toggle="offCanvas">Open Menu</button>
  	</div>
</body>
</html>