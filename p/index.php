
<div id="overview">
  <h3><img src="http://icons.db0.fr/g/drink.png" class="icon" alt="Drink with me">
    Hello world 
    <small>Welcome to db0's wonderful world!</small>
  </h3>

  <div id="messages">
<?php
$messages = array(array('name' => 'Getting things done.',
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
                        'details' => 'While some people would want to raise children or be a millionaire, my goal in life is to save the world... or at least enhance it as much as I can. It\'s my motivation factor. I\'m passionate.'),
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

