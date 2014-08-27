<?php

include_once('external.php');
$links = array_filter($ext, function($link) {
    return $link['type'] != 'im-only';
  });

$max = 22;

function	makeLink($l) {
  global $url;
  ?>
                  <a href="<?= $l['url'] ?>" target="_blank"
		     class="<?= empty($l['info']) ? '' : 'bubble' ?>" title="<?= $l['info'] ?>">
		    <div class="row-fluid linkset">
		      <div class="span3">
			<img src="<?= getLinkPic($l['icon']) ?>"
			     alt="<?= $l['name'] ?>">
		      </div> <!-- span -->
		      <div class="span9">
			<?= is_string($l['name']) ? $l['name'] : ucfirst($l['icon']) ?>
		      </div> <!-- span -->
		    </div> <!-- row -->
		  </a>
<?php
    }
?>
    <div id="main">
      <div class="row-fluid">
	<div class="span4">
	  <aside>
	    
	    <figure id="me">
	      <div class="imgwrap">
		<a href="http://bonjour.db0.fr/" target="_blank">
		  <img src="<?= getGravatar($email, 800) ?>" alt="<?= $title ?>">
		</a>
	      </div>
	      <figcaption>
		<h1><?= $name ?></h1>
		<h2>
		  <?= $nick ?>

		  <small class="bubble" title="This is the signification of my nickname ;)"> ~ <?= $detail ?></small>
		</h2>
	      </figcaption>
	    </figure>

	    <div id="quicklinks">
  <?php makeGrid(2, array_slice($links, 0, $max), makeLink); ?>
              <div class="morelinks hidden">
<?php makeGrid(2, array_slice($links, $max), makeLink); ?>
              </div>
	      
	    </div> <!-- quicklinks -->

	    <div id="morelinks">
	      <!-- <div class="button more"> -->
	      <!-- 	More links -->
	      <!-- </div> -->
	      <a href="/contact.html">
		<div class="button">
		  Contact
		</div>
	      </a>
	    </div> <!-- morelinks -->

	  </aside>
	</div> <!-- span -->

