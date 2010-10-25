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
        $(function() {
          // initialize the library with the API key
          FB.init({ apiKey: '<?php echo Configure::read("Facebook.apiKey") ?>' });

          // fetch the status on load
          FB.getLoginStatus(handleSessionResponse);

          $('#login').bind('click', function() {
            FB.login(handleSessionResponse);
          });

          $('#logout').bind('click', function() {
            FB.logout(handleSessionResponse);
          });

          $('#disconnect').bind('click', function() {
            FB.api({ method: 'Auth.revokeAuthorization' }, function(response) {
              clearDisplay();
            });
          });
        });

          // no user, clear display
          function clearDisplay() {
            $('#user-info').hide('fast');
          }

          // handle a session response from any of the auth related calls
          function handleSessionResponse(response) {
            // if we dont have a session, just hide the user info
            if (!response.session) {
              clearDisplay();
              return;
            }
          }
    </script>
    
	<div id="container">
		<div id="header">
			<h1>Ninja Moves</h1>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>
            
            <div>
                  <button id="login">Login</button>
                  <button id="logout">Logout</button>
                  <button id="disconnect">Disconnect</button>
                </div>
                <div id="user-info" style="display: none;"></div>
            
			<?php echo $content_for_layout; ?>

		</div>
		<div id="footer">
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>