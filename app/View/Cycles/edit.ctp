<?php echo $this->element('listes_nav'); ?>

<?php
echo $this->Html->link(
    '<span class="leftarrow icon"></span>'.__('Liste des cycles d\'apprentissage',true),
    array('controller'=>'cycles', 'action'=>'index'),
    array('class'=>'button', 'escape' => false)
);
?>

<br /><br />

<div class="cycles form">
<?php echo $this->Form->create('Cycle');?>
	<fieldset>
 		<legend><?php __('Éditer un cycle d\'apprentissage'); ?></legend>
	<?php
		echo $this->Form->input('title', array( 'label' => 'Nom'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Envoyer', true));?>
</div>