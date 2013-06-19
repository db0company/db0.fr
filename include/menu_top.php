    <nav class="tabs">
      <ul>
	<?php foreach ($menu as $page => $m) { ?><li><a href="<?= $page ?>.html" class="<?= $p == $page ? 'active' : 'inactive' ?>" id="tab_<?= $page ?>"><img src="http://icons.db0.fr/g/<?= $m['icon'] ?>.png" class="icon" alt="<?= $m['label'] ?>"><img src="http://icons.db0.fr/g/white_<?= $m['icon'] ?>.png" class="icon white opa" alt="<?= $m['label'] ?>"><span>&#xA0;<?= $m['label'] ?></span></a></li><?php } ?>
      </ul>
    </nav>
    
