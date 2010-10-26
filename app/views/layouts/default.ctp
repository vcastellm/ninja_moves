<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('cake.generic');
		echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js');
		echo $scripts_for_layout;
	?>
</head>
<body>
    <div id="fb-root"></div>
    <?php echo $this->Html->script('http://connect.facebook.net/es_ES/all.js'); ?>
    <script>
    <?php if ($redirect) { ?>
			window.top.location = "<?php echo $this->facebook->getLoginUrl(); ?>";
		<?php } ?>
        $(function() {
          // initialize the library with the API key
          FB.init({
            appId   : "<?php echo Configure::read("Facebook.apiKey") ?>",
            status  : true, // check login status
            cookie  : true, // enable cookies to allow the server to access the session
            xfbml   : true // parse XFBML
        	});
        });
    </script>
    
	<div id="container">
		<div id="header">
			<h1>Ninja Moves</h1>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>
            
			<?php echo $content_for_layout; ?>

		</div>
		<div id="footer">
		</div>
	</div>
</body>
</html>