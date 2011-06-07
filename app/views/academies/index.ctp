<div class="academies index">
<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort(__('Nom de l\'academie',true),'name');?></th>
			<th><?php echo $this->Paginator->sort(__('Nom',true),'name');?></th>
			
			
			
                        <th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($academies as $a):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $a['Academie']['name']; ?>&nbsp;</td>
		<td><?php echo $a['Academie']['id']; ?>&nbsp;</td>
                
                
		<td>
			<?php echo $this->Html->link($a['Academie']['title'], array('controller' => 'academies', 'action' => 'view', $a['Academie']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Voir', true), array('action' => 'view', $a['Academie']['id'])); ?>
			<?php echo $this->Html->link(__('Editer', true), array('action' => 'edit', $a['Academie']['id'])); ?>
			<?php echo $this->Html->link(__('Supprimer', true), array('action' => 'delete', $a['Academie']['id']), null, sprintf(__('Êtes vous sûr(e) de vouloir supprimer l\'academie %s ?\nCette opération ne peut pas être annulée.', true), $a['Academie']['name'].' '.$a['Academie']['user_id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% sur %pages%, affichage de %current% enregistrements sur %count% au total, démarrage à l\'enregistrement %start%, fin à l\'enregistrement %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('précédent', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('suivant', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Lister les academies', true), array('action' => 'index'));?></li>	
                <li><?php echo $this->Html->link(__('Nouvelle academie', true), array('controller' => 'academies', 'action' => 'add')); ?> </li>
                <li><?php echo $this->Html->link(__('Supprimer une academie', true), array('action' => 'delete', $this->Form->value('establishment.id')), null, sprintf(__('Etes-vous sure de vouloir supprimer cette academie # %s?', true), $this->Form->value('establishment.id'))); ?></li>
	</ul>
</div>
