<?php
$links = array(array('name' => 'Google+',
		     'id' => 'plus'),
	       array('name' => 'GitHub',
		     'id' => 'github'),
	       array('name' => 'Pinterest',
		     'id' => 'pinterest'),
	       array('name' => 'CouchSurfing',
		     'id' => 'couchsurfing'),
	       array('name' => 'LinkedIn',
		     'id' => 'linkedin'),
	       array('name' => 'MyAnimeList',
		     'id' => 'mal'),
	       array('name' => 'Facebook',
		     'id' => 'facebook'),
	       array('name' => 'Twitter',
		     'id' => 'twitter'),
	       array('name' => 'Slices of life',
		     'id' => 'slices'),
	       array('name' => 'Bonjour',
		     'id' => 'bonjour'),
	       array('name' => 'Food blog',
		     'id' => 'manger'),
	       array('name' => 'Programming blog',
		     'id' => 'impatient'),
	       array('name' => 'Photos',
		     'id' => 'photos'),
	       array('name' => 'Public files',
		     'id' => 'public'),
	       array('name' => 'Paypal',
		     'id' => 'paypal'),
	       array('name' => 'Epitech',
		     'id' => 'epitech'),
	       );

function	makeLink($l) {
  global $url;
  ?>
                  <a href="http://<?= $l['id'] ?>.<?= $url ?>/" target="_blank">
		    <div class="row-fluid linkset">
		      <div class="span3">
			<img src="<?= getLinkPic($l['id']) ?>"
			     alt="<?= $l['name'] ?>">
		      </div> <!-- span -->
		      <div class="span9">
			<?= is_string($l['name']) ? $l['name'] : ucfirst($l['id']) ?>
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

		  <small class="bubble" title="This is the way you should pronounce my nickname ;)"> ~ <?= $detail ?></small>
		</h2>
	      </figcaption>
	    </figure>

	    <div id="quicklinks">
<?php makeGrid(2, array_slice($links, 0, 6), makeLink); ?>
              <div class="morelinks hidden">
<?php makeGrid(2, array_slice($links, 6), makeLink); ?>
              </div>
	      
	    </div> <!-- quicklinks -->

	    <div id="morelinks">
	      <div class="button">
		More links
	      </div>
	    </div> <!-- morelinks -->

	  </aside>
	</div> <!-- span -->

