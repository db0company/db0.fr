
<div id="portfolio">

  <h3><img src="http://icons.db0.fr/g/picture.png" class="icon" alt="Picture ico">
    Portfolio</h3>


  <div class="messages">
    <?php

$galleries = array(
		   array('name' => 'Photography',
			 'color' => 'red',
			 'icon' => 'camera'),
		   array('name' => 'Design',
			 'color' => 'blue',
			 'icon' => 'compass'),
		   array('name' => 'Drawings',
			 'color' => 'green',
			 'icon' => 'pencil'),
		   );

function	displayMessage($m) {
?>
    <a href="#<?= $m['name'] ?>">
      <div class="well <?= $m['color'] ?>" id="<?= $m['color'] ?>">
	<img src="http://icons.db0.fr/g/white_<?= $m['icon'] ?>.png"
	     alt="<?= $m['icon'] ?>">
	<h4><?= $m['name'] ?></h4>
      </div> <!-- well -->
    </a>
<?php
}

makeGrid(3, $galleries, displayMessage);
?>
  </div>
  <br><br>

  <h3 id="Photography"><img src="http://icons.db0.fr/g/camera.png" class="icon" alt="Photo ico">
    Photography</h3>

  <br>
  <div id="galleria-photos"></div>
  <br>

  <div class="tright buttonwrap">
    <a target="_blank" href="http://slices.db0.fr/"><div class="button">➜ Photos Blog</div></a>
    <a target="_blank" href="http://photos.db0.fr/"><div class="button">➜ More Photos</div></a>
  </div>

  <h3 id="Design"><img src="http://icons.db0.fr/g/compass.png" class="icon" alt="Design icon">
    Design</h3>

  <br>
  <div id="galleria-web"></div>

  <h3 id="Drawings"><img src="http://icons.db0.fr/g/pencil.png" class="icon" alt="Drawing ico">
    Drawings</h3>

  <br>
  <div id="galleria-drawings"></div>
  <br>

  <div class="tright buttonwrap">
    <a target="_blank" href="http://photos.db0.fr/?album=JeSuisUnArtiste"><div class="button">➜ More Drawings</div></a>
  </div>

</div>

