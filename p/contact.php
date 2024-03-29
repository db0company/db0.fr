<?php
   $objects = array('Say hi!',
		    'Hire me',
		    'Take part into a project',
		    'Work together',
		    'Ask a question',
		    'Report a problem',
		    'meet' => 'Organize a meeting',
		    'other' => 'Other',
		    );

include_once('Mail.php');

function protect($string) {
  return (htmlspecialchars(stripslashes($string)));
}

if (isset($_POST['submit'])) {
  $headers['From']    = 'db0fr@db0.fr';
  $headers['To']      = 'db0company@gmail.com';
  if ($_POST['object'] == 'other')
    $object = protect($_POST['otherobject']);
  elseif ($_POST['object'] == 'meet')
    $object = $objects['meet'];
  else
    $object = $objects[intval($_POST['object'])];
  $headers['Subject'] = '[db0.fr] '.$object;
  $content = utf8_encode('From '.protect($_POST['email'])."<br>".protect($message));
  $headers['Content-Type'] = "text/html; charset=\"UTF-8\"";
  $headers['Content-Transfer-Encoding'] = "8bit";

  $params['sendmail_path'] = '/usr/lib/sendmail';

  $mail_object =& Mail::factory('sendmail', $params);

  $mail_object->send($to, $headers, $content);
  ?>
    <div class="alert-success">Message successfully sent. Thank you!</div>
    <?
 }
?>
<h3><img src="http://icons.db0.fr/g/pen.png" class="icon" alt="Contact ico">
  Send a message</h3>

<form method="post" id="contact" >

<?php

$objectcontrol = '
<select name="object" id="object">
';
foreach ($objects as $idx => $object) {
  $objectcontrol .= '
  <option value="'.$idx.'"';
  $objectcontrol .= '>'.$object.'</option>
';
}
$objectcontrol .= '
</select>
<input type="text" class="hidden" name="otherobject" id="otherobject" placeholder="Specify...">
';

$controls =
   array('name' => array('icon' => 'user',
			 'label' => 'Your name',
			 'placeholder' => 'John Smith'),
	 'email' => array('icon' => 'envelope',
			  'label' => 'Your e-mail address',
			  'placeholder' => 'john@smith.com',
			  'type' => 'email'),
	 'object' => array('icon' => 'coffe_cup',
			   'label' => 'Object',
			   'input' => $objectcontrol),
	 );
foreach ($controls as $t => $c) { ?>
  <div class="control">
    <label for="<?= $t ?>">
      <img src="http://icons.db0.fr/g/<?= $c['icon'] ?>.png" class="icon" alt="<?= $c['label'] ?>">
      <?= $c['label'] ?></label>
    <div class="input">
<?php if (isset($c['input'])) { ?><?= $c['input'] ?><?php } else { ?>
      <input type="<?= isset($c['type']) ? $c['type'] : 'text' ?>" id="<?= $t ?>" name="<?= $t ?>" placeholder="<?= $c['placeholder'] ?>" required>
<?php } ?>
    </div>
  </div>
<?php } ?>

<div id="hiddenmeeting">
  <img src="http://icons.db0.fr/g/white_circle_info.png" class="icon opa" alt="Information">
  You should use this tool to organize a meeting:
  <div class="tright buttonwrap">
    <a href="http://meet.db0.fr/" target="_blank">
      <div class="button">
	➜ Organize a meeting
      </div>
    </a>
  </div>
</div>

<textarea name="message" id="message">
</textarea>

<div class="control">
  <label for="submit"></label>
  <div class="input">
    <input type="submit" name="submit" id="submit" value="Send">
    <input type="reset" name="reset" id="reset" value="Reset">
    <div class="clear"></div>
  </div>

</div>

</form>

<h3><img src="http://icons.db0.fr/g/conversation.png" class="icon" alt="Contact ico">
  Instant messaging</h3>

<?php
include_once('../include/external.php');
$chat = array_filter($ext, function($link) {
    return $link['type'] == 'im-only' || $link['type'] == 'im';
  });

function	makeMessengerBox($c) {
?>
<?php if (!empty($c['url'])) { ?>
      <a href="<?= $c['url'] ?>" target="_blank">
<?php } ?>
	<div class="well messenger <?php if (!empty($c['url'])) { ?>well-link<?php } ?>">
	  <div class="row-fluid">
	    <div class="span3">
	      <img src="http://icons.db0.fr/s/<?= $c['icon'] ?>.png" alt="<?= $c['name'] ?>">
	    </div> <!-- span -->
	    <div class="span9">
	      <h5><?= $c['name'] ?></h5>
	      <h6><?= $c['details'] ?></h6>
	      <p><?= $c['info'] ?></p>
	    </div> <!-- span -->
	  </div> <!-- row -->
	</div> <!-- well -->
<?php if (!empty($c['url'])) { ?>
      </a>
<?php } ?>
<?php
}
?>

<div class="messengers">
<?php makeGrid(2, $chat, makeMessengerBox) ?>
</div> <!-- messengers -->

<h3><img src="http://icons.db0.fr/g/envelope.png" class="icon" alt="Address">
  Address</h3>

<?php
  $adresses = array(array('id' => 'USA-sf',
			  'address' => '601 Van Ness Ave<br>Unit #607<br>San Francisco, CA 94110',
			  'country' => 'USA',
			  'flag' => 'usa',
			  'lat' => 37.763457,
			  'long' => -122.417136,
			  'zoom' => 11),
		    array('id' => 'FR-pr',
			  'address' => '363 Route Stratégique du Mont Macaron<br>06730 St André de la Roche',
			  'country' => 'France',
			  'flag' => 'french',
			  'lat' => 43.755602,
			  'long' => 7.289803,
			  'zoom' => 10),
		    );

function	makeAddress($a) {
?>
    <div class="well" id="<?= $a['id'] ?>">
      <div class="row-fluid">
	<div class="span7">
	  <div class="map" id="<?= $a['id'] ?>map">
	    <span class="lat hidden"><?= $a['lat'] ?></span>
	    <span class="long hidden"><?= $a['long'] ?></span>
	    <span class="zoom hidden"><?= $a['zoom'] ?></span>
	  </div> <!-- map -->
	</div> <!-- span -->
	<div class="span5">
	  <p class="address"><?= $a['address'] ?></p>
	  <h5><img src="http://icons.db0.fr/f/<?= $a['flag'] ?>.png" alt="<?= $a['country'] ?>">
	    <?= $a['country'] ?></h5>
	</div> <!-- span -->
      </div>  <!-- row -->
    </div> <!-- well -->
<?php
}
?>

<div class="addresses">
  <?php makeGrid(2, $adresses, makeAddress); ?>
</div>
