
<div id="news">
  <div class="row-fluid">
    <div class="span7">
      <h3><img src="http://icons.db0.fr/g/fire.png" class="icon" alt="Fire">
	Latest news
	<img src="http://icons.db0.fr/g/refresh.png" class="icon right" alt="Refresh" id="refresher">
      </h3>
      
      <div id="latest_news">
	<img src="img/i/loading.gif" alt="Loading..." id="loading">
      </div>
      
    </div> <!-- span -->
<?php include_once('include/feeds.php'); ?>

    <div class="span5">
      <h3><img src="http://icons.db0.fr/g/filter.png" class="icon" alt="Contact ico">
	Filters
      <a href="http://rss.db0.fr/?feed=<?= implode(',', getDefaults()) ?>" target="_blank" id="rss_link">
	<img src="http://icons.db0.fr/g/rss.png" alt="RSS" class="icon right">
      </a>
      </h3>

<?php foreach ($feeds as $id => $feed) {  ?>
      <div id="<?= $id ?>" class="row-fluid feed">
	<div class="span2 checker" id="<?= $id ?>">
	  <?php if ($feed['default']) { ?>
	  <img src="http://icons.db0.fr/g/check.png" class="icon" alt="check">
<?php } else { ?>
          <img src="http://icons.db0.fr/g/unchecked.png" class="icon" alt="uncheck">
<?php } ?>
        </div> <!-- span -->
	<div class="span10">
	  <div class="well" style="border-color: <?= $feed['color'] ?>">
	    <div class="row-fluid">
	      <div class="span1">
		<a href="<?= $feed['website'] ?>" target="_blank">
		  <img src="http://icons.db0.fr/g/globe.png" class="icon" alt="URL">
		</a><br>
		<a href="<?= (isset($feed['real_url']) ? $feed['real_url'] : $feed['url']) ?>" target="_blank">
		  <img src="http://icons.db0.fr/g/rss.png" class="icon" alt="RSS">
		</a>
	      </div> <!-- span -->
	      <div class="span8">
		<h5 style="color: <?= $feed['color'] ?>"><?= $feed['name'] ?></h5>
		<small><?= $feed['details'] ?></small>
	      </div> <!-- span -->
	      <div class="span3">
		<a href="<?= $feed['website'] ?>" target="_blank">
		  <img src="<?= $feed['icon'] ?>" alt="<?= $feed['name'] ?>">
		</a>
	      </div> <!-- span -->
	    </div> <!-- row -->
	  </div> <!-- well -->
	</div> <!-- span -->
      </div> <!-- row -->
<?php } ?>
      
    </div> <!-- span -->
  </div> <!-- row -->
</div> <!-- news -->

