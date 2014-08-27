<?php

$_GET['prod'] = true;

$url = $_SERVER["SERVER_NAME"];
$nick = 'db0';
$name = 'Deby Barbara Lepage';
$detail = 'division by zero';
$title = $nick.' | '.$name.' | '.$url;
$email = 'db0company@gmail.com';

$menu =
  array('index' => array('icon' => 'show_big_thumbnails',
			 'label' => 'Overview'),
	'news' => array('icon' => 'fire',
			    'label' => 'News'),
	'realtime' => array('icon' => 'clock',
			    'label' => 'In Real Time'),
	// 'projects' => array('icon' => 'playing_dices',
	// 		    'label' => 'Projects'),
	'resume' => array('icon' => 'nameplate',
			  'label' => 'Résumé'),
	'portfolio' => array('icon' => 'picture',
			  'label' => 'Portfolio'),
	'contact' => array('icon' => 'e-mail',
			   'label' => 'Contact'),
	);

$p = 'index';
if (isset($_GET['p']))
  $p = $_GET['p'];
if (!file_exists('p/'.$p.'.php'))
  $p = 'error';

include_once('include/tools.php');
include_once('include/header.php');
include_once('include/menu_top.php');
include_once('include/aside.php');

?>
	<div id="page" class="span8">

	  <div id="content">
	    <?php include_once('p/'.$p.'.php'); ?>
	  </div> <!-- content -->
	  
	</div> <!-- page span -->
      </div> <!-- row -->

<?php
include_once('include/footer.php');
?>
