<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php __('Opencomp | '); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
                echo $this->Html->css('opencomp.generic');
                echo $this->Html->css('jquery-ui-1.8.10.custom');
		echo $this->Html->css('http://fonts.googleapis.com/css?family=Ubuntu:regular,bold&subset=Latin');
                
                echo $javascript->link('jquery');
                echo $javascript->link('jquery-ui');
	?>
    <script type="text/javascript">
    $(function() {
    $(".sortable").sortable({
        placeholder: "fond",
        update : function(){
            var order = $(".sortable").sortable("serialize");
            $(".maj").load("ajax.php?",order);
        }
    })
    $(".sortable").disableSelection();

});
    </script>
</head>
<body>
    <div id="wrap">
                
        <div id="en_tete">                

                <?php echo $html->image('logo.png', array('alt' => 'Opencomp logo', 'class' => 'logo_entete'))?>

                <div class="titre_entete">Opencomp</div>
                <div class="description_entete">Gestion de r&eacute;sultats scolaires par navigateur<span class ="description_entete" style="font-size:x-small">et bien plus encore !</span></div>

                <div class="info-connect_entete">

                    <?php
                    function datefr()
                    {
                            $jour = array("Dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi");
                            $mois = array("","Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre");
                            $datefr = $jour[date("w")]." ".date("d")." ".$mois[date("n")]." ".date("Y");
                            return "Nous sommes le ". $datefr;
                    }
                    ?>
                    <span style="float:right;"><?php echo datefr(); ?></span><br />
                    <div style="padding-top:5px;">Bienvenue, <?php echo $session->read('Auth.User.prenom').' '. $session->read('Auth.User.nom') ?> | <?php echo $html->link('Se déconnecter',array('controller'=>'users', 'action'=>'logout')) ?></div>
                </div>

        </div>
       
        <ul id="tabnav">
            <?php
            if($this->params['controller'] == 'pages')
                echo '<li class="active">';
            else
                echo '<li class="tab1">';
           
            echo $this->Html->link('Tableau de bord',array(
                    'controller'=>'pages', 
                    'action'=>'display', 
                    'home')); ?>
            </li>
            <?php
            if($this->params['controller'] == 'pupils')
                echo '<li class="active">';
            else
                echo '<li class="tab2">';
            ?>
                <?php echo $this->Html->link('Élèves et classes',array(
                    'controller'=>'pupils', 
                    'action'=>'index')); ?>
            </li>
            <?php
            if($this->params['controller'] == 'competences')
                echo '<li class="active">';
            else
                echo '<li class="tab3">';
            
            echo $this->Html->link('Référentiel de compétences',array(
                    'controller'=>'competences', 
                    'action'=>'index')); ?>
            </li>
            <?php
            if($this->params['controller'] == 'users')
                echo '<li class="active">';
            else
                echo '<li class="tab4">';
            
            echo $this->Html->link('Utilisateurs',array(
                    'controller'=>'users', 
                    'action'=>'index')); ?>
            </li>        
        </ul>
        
        <div id="corps" class="clearfix">

            <h2><?php echo $title_for_layout; ?></h2>

            <?php echo $this->Session->flash(); ?>
            <?php echo $this->Session->flash('auth'); ?>
            <?php echo $content_for_layout; ?>
            
            
        </div>
    </div>

    <div id="footer">
        <p style='position:relative; top:7px; left:10px;'>Opencomp est distribué sous licence <a href ='http://www.gnu.org/licenses/agpl-3.0-standalone.html'>GNU/AGPL</a>.<br /><a href='http://zolotaya.isa-geek.com/redmine/projects/gnote'>Forge du projet Opencomp</a> - <a href='http://zolotaya.isa-geek.com/redmine/projects/gnote/issues/new'>rapporter une anomalie</a></p><div style='float:right; position:relative; bottom:18px; right:10px;'>Page générée en $tps seconde requêtes exécutées.</div>

    </div>
    
	<?php //echo $this->element('sql_dump'); 
              echo $this->Js->writeBuffer();   ?>
</body>
</html>