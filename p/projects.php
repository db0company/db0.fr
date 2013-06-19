<?php

$projects = array(
		  array('status' => 'current',
			'title' => '',
			'details' => '',
			'pictures' => '',
			'types' => array(''),
			'tags' => array(''),
                        'url' => '',
			),
		  );

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

function	getProjectsOfType($type) {
  global $projects;
  $res = array();
  foreach ($projects as $project)
    if (in_array($type, $project['types']))
      $res[] = $project;
  return $res;
}

function	makeProject($p) {
  ?>
<div class="well">
  <h3><?= $p['title'] ?></h3>
  <p><small><?= $t['details'] ?></small></p>
</div>
<?php
}

function	makeType($t) {
  ?>
<div class="well" id="<?= $t['id'] ?>">
	<img src="http://icons.db0.fr/g/white_<?= $t['icon'] ?>.png"
	     alt="<?= $t['icon'] ?>">
  <h4><?= $t['name'] ?></h4>
  <p class="hidden"><?= $t['details'] ?></p>
<?php makeGrid(2, getProjectsOfType($t['id']), makeProject); ?>
</div> <!-- well -->
<?php
}
?>
<div id="projects">
  <h3><img src="http://icons.db0.fr/g/playing_dices.png" alt="dices" class="icon">
    Projects</h3>

  <p><small><i>I organize my whole life with what I call "projects". They can be done in a determined period or endless. I can make them alone or with a team.<br>If you're interested in working with me, feel free to <a href="contact.html">contact me</a>.</i></small></p>
  <div id="messages">
    <?php makeGrid(3, $types, makeType); ?>
  </div> <!-- messages -->
</div> <!-- projects -->

