<?php
include_once('include/feeds.php');
?>
<div id="overview">

  <h3><img src="http://icons.db0.fr/g/certificate.png" class="icon" alt="Life.tl">
    Co-Founder & CEO at Life.tl
  </h3>

  <a href="http://life.tl" target="_blank">
    <img src="/img/i/life.png" alt="Life.tl" style="max-width: 100%; border-radius: 10px; border: 1px solid #26b671;" />
  </a>

  <h3><img src="http://icons.db0.fr/g/drink.png" class="icon" alt="Drink with me">
    About me
    <small>Welcome to my wonderful world!</small>
  </h3>

  <div class="messages">
<?php
$messages = array(array('name' => 'I get things done.',
			'color' => 'red',
			'icon' => 'stats',
			'details' => 'I\'m the kind of person who never procrastinate. I have new ideas of exciting projects everyday, so to make them come true, I\'m very organized. If you work with me, you\'ll understand what "productivity" means!'),
		  array('name' => 'In a simple world.',
			'color' => 'blue',
			'icon' => 'lightbulb',
			'details' => 'I believe that things should be easy to understand and to use, so they\'re more entertaining and sharable. That\'s why I like ergonomy, documentation, maintainability and open-sourcing.'),
		  array('name' => 'To make it a better place.',
			'color' => 'green',
			'icon' => 'leaf',
			'details' => 'While some people would want to raise children or be a millionaire, my goal in life is to save the world... or at least enhance it as much as I can. It\'s my motivation fuel. I\'m passionate.'),
		 );

function	displayMessage($m) {
?>
      <div class="well <?= $m['color'] ?>" id="<?= $m['color'] ?>">
	<img src="http://icons.db0.fr/g/white_<?= $m['icon'] ?>.png"
	     alt="<?= $m['icon'] ?>">
	<h4><?= $m['name'] ?></h4>
	<p class="hidden"><?= $m['details'] ?></p>
      </div> <!-- well -->
<?php
}

makeGrid(3, $messages, displayMessage);
?>
  </div>

  <h3><img src="http://icons.db0.fr/g/fire.png" class="icon" alt="Fire">
    Latest news
  </h3>
  <div class="hidden" id="default_news">
<?php
  $defaults = getHome();
  foreach ($defaults as $default) { ?>
    <span><?= $default ?></span>
<?php } ?>
  </div>
  <div id="latest_news">
    <img src="img/i/loading.gif" alt="Loading..." id="loading">
  </div>
<div class="tright buttonwrap">
  <a href="news.html"><div class="button">➜ More news</div></a>
</div>

  <h3><img src="http://icons.db0.fr/g/playing_dices.png" class="icon" alt="Work">
    My Work
    <small>The 3 main fields I work in</small>
  </h3>

<?php

$types = array(
	       array('id' => 'dev',
		     'name' => 'Programming',
		     'details' => 'I\'m into programming since 2007, starting with <b>web</b>, moving around <b>networking</b>, jumping on <b>software</b> and <b>objects</b>, entering deep inside <b>functionnal programming</b> and now playing around Android and Glass.',
		     'icon' => 'embed_close',
		     ),
	       array('id' => 'mgmt',
		     'name' => 'Management',
		     'details' => 'I\'m usually the one who brings the ideas on the table so I naturally became a leader. I builted my first team when I was 13 and since then, I never stopped learning from all the one-of-a-kind teams I leaded.',
		     'icon' => 'group',
		     ),
	       array('id' => 'art',
		     'name' => 'Art',
		     'details' => 'I would not call myself an "artist" but I think I have a sense of creativity that, combined with my productivity eager, can produce good things.',
		     'icon' => 'magic',
		     ),

	       );
function	makeType($t) {
  ?>
<div class="well" id="<?= $t['id'] ?>">
	<img src="http://icons.db0.fr/g/white_<?= $t['icon'] ?>.png"
	     alt="<?= $t['icon'] ?>">
  <h4><?= $t['name'] ?></h4>
  <p class="hidden"><?= $t['details'] ?></p>
</div> <!-- well -->
<?php
}
?>
  <div class="messages">
    <?php makeGrid(3, $types, makeType); ?>
  </div> <!-- messages -->

  <h3><img src="http://icons.db0.fr/g/more.png" class="icon" alt="More">
    More
  </h3>

<?php
  $more = array('resume', 'portfolio', 'contact');

function makeMore($m) {
?>
<a href="/<?= $m['id'] ?>.html">
  <div class="well" id="more_<?= $m['id'] ?>">
    <img src="http://icons.db0.fr/g/white_<?= $m['icon'] ?>.png"
	 alt="<?= $m['icon'] ?>">
    <h4><?= $m['label'] ?></h4>
  </div> <!-- well -->
</a>
<?php
}

foreach ($more as $m) {
  $menu[$m]['id'] = $m;
  $more_[] = $menu[$m];
}
?>
<div class="messages">
  <?php makeGrid(3, $more_, makeMore); ?>
</div>
