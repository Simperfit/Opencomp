<div class="page-title">
    <h2><?php echo __('Éditer une académie'); ?></h2>
    <?php echo $this->Html->link('<i class="icon-arrow-left"></i> '.__('retour à l\'académie'), 'view/'.$this->data['Academy']['id'], array('class' => 'ontitle btn', 'escape' => false)); ?>
</div>

<?php 

echo $this->Form->create('Academy', array(
    'class' => 'form-horizontal',
    'inputDefaults' => array(
        'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
        'div' => array('class' => 'control-group'),
        'between' => '<div class="controls">',
        'after' => '</div>',
        'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline'))
        )
    )
); 

echo $this->Form->input('id');

echo $this->Form->input('name', array(
    'label' => array(
        'text' => 'Nom de l\'académie',
        'class' => 'control-label'
    )
)); 

echo $this->Form->input('type', array(
    'type' => 'select',
    'options' => array('0'=>'Académie','1'=>'Sous-rectorat'),
    'label' => array(
        'text' => 'Type d\'académie',
        'class' => 'control-label'
    )
)); 

echo $this->Form->input('User', array(
    'class'=>'chzn-select',
    'data-placeholder'=>'Ajoutez un responsable ...',
    'label' => array(
        'text' => 'Responsable(s) de l\'académie',
        'class' => 'control-label'
        )
    )
);
    
?>

<div class="form-actions">
     <?php echo $this->Form->button('Enregistrer les modifications', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>        
</div>

<?php echo $this->Form->end(); ?>