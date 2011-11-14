<?php echo $this->element('listes_nav'); ?>

<?php
echo $this->Html->link(
    '<span class="leftarrow icon"></span>'.__('Liste des niveaux',true),
    array('controller'=>'levels', 'action'=>'index'),
    array('class'=>'button', 'escape' => false)
);
?>
<br /><br />

<div class="levels form">
<?php echo $this->Form->create('Level');?>
	<fieldset>
 		<legend><?php __('Ajouter un niveau'); ?></legend>
	<?php
		echo $this->Form->input('title', array( 'label' => 'Nom'));
		echo $this->Form->input('cycle_id', array('options' => $cycles, 'label'=>'Cycle'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enregistrer', true));?>
</div>