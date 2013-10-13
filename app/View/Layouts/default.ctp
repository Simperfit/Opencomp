<!DOCTYPE html>
<html lang="en">
  <head>
    <?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout.' | Opencomp'; ?>
	</title>
    
    <?php
		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('bootstrap-responsive');
		echo $this->Html->css('datepicker');
		echo $this->Html->css('font-awesome');
		echo $this->Html->css('../js/chosen/chosen.css');
		echo $this->Html->css('jstree');
		echo $this->Html->css('custom');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->Html->script(array('jquery.js'));
	?>
    
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web' rel='stylesheet' type='text/css'>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav icon -->
    <?php echo $this->Html->meta('icon'); ?>
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <?php echo $this->Html->link('Opencomp <sub>αlpha</sub>', '/dashboard', array(
          	'class' => 'brand info',
          	'data-toggle' => 'tooltip',
          	'data-placement' => 'bottom',
          	'data-original-title' => 'Cliquez pour afficher le bureau',
          	'escape' => false
          )); ?>
          <div class="nav-collapse">
            <ul class="nav">
              <li><?php echo $this->Html->link('<i class="icon-home"></i> '.__('Établissements'), '/academies', array('escape' => false)); ?></li>
              <li class="dropdown">
	              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-list"></i> <?php echo __('Référentiels') ?> <b class="caret"></b></a>
	              <ul class="dropdown-menu">
	                <li><?php echo $this->Html->link('<i class="icon-book"></i> '.__('Instructions officielles'), '/competences', array('escape' => false)); ?></li>
	                <li><?php echo $this->Html->link('<i class="icon-book"></i> '.__('Livret Personnel de Compétences'), '/lpcnodes', array('escape' => false)); ?></li>
	              </ul>
	          </li>
              <li><?php echo $this->Html->link('<i class="icon-user"></i> '.__('Utilisateurs'), '/users', array('escape' => false)); ?></li>
              <li><?php echo $this->Html->link('<i class="icon-cogs"></i> '.__('Paramètres'), '/settings', array('escape' => false)); ?></li>
              <li><a href="#" class="info" data-toggle="tooltip" data-placement="bottom" data-original-title="Cliquez pour signaler une anomalie." onclick="window.open('http://projets.traulle.net/opencomp/issues/new')"><i class="icon-bug"></i></a></li>
            </ul>
            <ul class="nav pull-right">
            	<li><?php echo $this->Html->link('<i class="icon-signout"></i> '.__('Sauvegarder et quitter'), '/settings/save', array('escape' => false, 'style'=>'color:Khaki;')); ?></li>
              	<!--
	            <li class="dropdown">
	              <?php $first_name = $this->Session->read('Auth.User.first_name'); 
	              		$name = $this->Session->read('Auth.User.name'); ?>
	              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i> <?php echo($first_name.' '.$name); ?> <b class="caret"></b></a>
	              <ul class="dropdown-menu">
	                <li><?php echo $this->Html->link('<i class="icon-edit"></i> '.__('Mon compte'), '/users/account', array('escape' => false)); ?></li>
	                <li><?php echo $this->Html->link('<i class="icon-signout"></i> '.__('Se déconnecter'), '/users/logout', array('escape' => false)); ?></li>
	              </ul>
	            </li>
	            -->
	        </ul>
          </div><!--/.nav-collapse -->           
        </div>
      </div>
    </div>

    <div class="container">
    
        <?php echo $this->Session->flash(); ?>   
        <?php echo $this->fetch('content'); ?>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <?php 
    	echo $this->Html->script(array('jquery.jstree.js', 'chosen/chosen.jquery.min.js', 'bootstrap.min.js', 'bootstrap-datepicker.js', 'bootstrap-datepicker.fr.js', 'custom.js')); 
	    echo $this->fetch('script');
    ?>

  </body>
</html>
