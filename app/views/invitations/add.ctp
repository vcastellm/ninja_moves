<?php if (count($sentToIds) > 0) {?>
<h1>Tus inivitaciones se han enviado a:</h1>
<?php } ?>

<fb:serverFbml>  
     <script type="text/fbml">
        <fb:fbml>
            <?php foreach($sentToIds as $id) { ?>
							<fb:profile-pic uid="<?php echo $id ?>" /> <fb:name uid="<?php echo $id ?>" /> <br />
						<?php } ?>
             
         </fb:fbml>
    </script>
</fb:serverFbml>

<?php echo $this->Html->link('Enviar mas invitaciones', array('action' => 'index')) ?>