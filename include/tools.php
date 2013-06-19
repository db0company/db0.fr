<?php

function	getGravatar($email, $size) {
  return "http://www.gravatar.com/avatar/"
    .md5(strtolower(trim($email)))
    ."?d=mm&s=".intval($size);
}

function getRandomPic($kind) {
  $path = 'img/'.$kind.'/';
  $pic = array_diff(scandir($path), array('.', '..'));
  shuffle($pic);
  return $path.$pic[0];
}

function getRandomFavicon($png = false) {
  $path = 'img/favicon/';
  $pic = array_diff(glob($path.($png ? '*.png' : '*.ico')),
		    array('.', '..'));
  shuffle($pic);
  return $path.$pic[0];
}

function getLinkPic($pic) {
  return 'http://icons.db0.fr/s/'.$pic.'.png';
}

function makeGrid($per_line, $elements, $displayer) {
?>
  <div class="row-fluid">
    <?php $i = 1;
	  foreach ($elements as $e) { ?>
    <div class="span<?= 12 / $per_line ?>">
      <?php $displayer($e) ?>
    </div> <!-- span -->
    <?php if ($i == $per_line) { ?>
  </div> <!-- row -->
  <div class="row-fluid">
    <?php $i = 0;
	  }
	  $i++;
	  } ?>
  </div> <!-- row -->
<?php
}

