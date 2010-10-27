<fb:serverFbml style="width: 755px;">  
     <script type="text/fbml">
        <fb:fbml>
            <fb:request-form
                action="<?php echo $this->Html->url(array('action' => 'index'), true); ?>"
                method="POST"
                invite="true"
                type="XFBML"
                content="This is a test invitation from XFBML test app
                <fb:req-choice url='<?php echo $this->Html->url(array('action' => 'index')); ?>' label='Omitir' />
             ">
				<fb:multi-friend-selector showborder="false" actiontext="Invite your friends to use Facebook." />             
			</fb:request-form>
             
         </fb:fbml>
    </script>
</fb:serverFbml>