<div class="academies form">

<?php echo $this->Form->create('Academie');?>
	<fieldset>
 		<legend><?php __('Ajouter une Academie'); ?></legend>
	<?php
		echo $this->Form->input('Nom de l\'academie');
		echo $form->label('type');
		$options=array('0'=>'Académie','1'=>'Sous-rectorat');
		echo $form->select('type',$options)	 
	?>
        </fieldset>
</div>
<?php echo $this->Form->end(__('Enregistrer une academie', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Lister les academies', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('Nouvelle academie', true), array('controller' => 'academies', 'action' => 'add')); ?> </li>
	</ul>
</div>
