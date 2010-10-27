<fb:serverFbml style="width: 755px;">  
     <script type="text/fbml">
        <fb:fbml>
            <fb:request-form
                action="<?php echo $this->Html->url(array('action' => 'index'), true); ?>"
                method="POST"
                invite="true"
                type="Ninja Moves"
                content="¿Quieres luchar como un ninja? <fb:req-choice url='<?php echo $this->Html->url(array('action' => 'index')); ?>' label='Omitir' />"
			>
				<fb:multi-friend-selector showborder="false" actiontext="¡Invita a otros ninjas a luchar!." />             
			</fb:request-form>
             
         </fb:fbml>
    </script>
</fb:serverFbml>