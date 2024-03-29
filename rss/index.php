<?php

include_once('../include/feeds.php');
include_once('../include/tools.php');

function        xmltoarray($xml) {
  return json_decode(json_encode((array)simplexml_load_string($xml)), 1);
}

function	feedsIdTofeed($ids) {
  global $feeds;
  $result_feeds = array();
  foreach ($ids as $id)
    if (isset($feeds[$id]))
      $result_feeds[$id] = $feeds[$id];
  return $result_feeds;
}

function	getCache($id) {
  $timeout = 24 * 60 * 60;
  $filename = 'cache/'.$id;
  if (file_exists($filename)
      && (!$check_time || (time() - filemtime($filename)) < $timeout)) {
    $cache = @file_get_contents($filename);
    return $cache;
  }
  return false;
}

function	updateCache($id, $content) {
  $filename = 'cache/'.$id;
  @file_put_contents($filename, $content);
}

function	getFeed($id, $url, $max = null) {
  if (($rss = getCache($id)) === false) {
    $rss = @file_get_contents($url);
    updateCache($id, $rss);
  }
  $rss = str_replace('&raquo;', '', $rss); // fix for github
  $rss = preg_replace('/\<title\>\<\!\[CDATA\[([^\]]+)\]\]\>\<\/title\>/i', '<title>$1</title>', $rss); // fix for google+
  $feed = xmltoarray($rss);
  $feed = $feed['channel']['item'];
  if (isset($max))
    $feed = array_slice($feed, 0, $max, true);
  return $feed;
}

function getRandomFaviconRSS($png = false) {
  $path = '../img/favicon/';
  $pic = array_diff(glob($path.($png ? '*.png' : '*.ico')),
		    array('.', '..'));
  shuffle($pic);
  return 'img/favicon/'.basename($pic[0]);
}

function	feedSorter($item1, $item2) {
  return (strtotime($item2['item']['pubDate'])
	  - strtotime($item1['item']['pubDate']));
}

function    feedsToArrays($feedsids, $max = null) {
  $feeds_arrays = feedsIdTofeed($feedsids);
  $final_feed = array();
  foreach ($feeds_arrays as $id => $feed_info) {
    $feed = getFeed($id, $feed_info['url']);
    $feed_info['id'] = $id;
    foreach ($feed as $item) {
      $final_feed[] = array('feed' => $feed_info,
			    'item' => $item);
    }
  }
  usort($final_feed, 'feedSorter');
  if (isset($max))
    $final_feed = array_slice($final_feed, 0, $max);
  return $final_feed;
}

function	arrayToXML($a) {
  foreach ($a as $e => $c) {
    if (!is_integer($e)) {
      echo ' <'.$e;
      if (is_array($c) & isset($c['@attributes'])) {
	foreach ($c['@attributes'] as $att => $val) {
	  echo ' '.$att.'="'.$val.'"';
	}
	unset($c['@attributes']);
      }
      echo '> ';
    }
    if (is_array($c))
      arrayToXML($c);
    else
      echo $c;
    if (!is_integer($e))
      echo ' </'.$e.'> ';
  }
}

function	HTMLitem($item) {
?>
    <div class="feed_item well <?= $item['feed']['id'] ?>" id="<?= $item['feed']['id'] ?><?= $item['item']['id'] ?>"
	 style="border-color: <?= $item['feed']['color'] ?>">
      <div class="row-fluid">
	<div class="span1">
	  <img src="<?= $item['feed']['icon'] ?>" alt="<?= $item['feed']['name'] ?>">
	</div> <!-- span -->
	<div class="span10">
	  <h5 style="color: <?= $item['feed']['color'] ?>">
	    <?= $item['item']['title'] ?></h5>
	  <small><?= $item['item']['pubDate'] ?></small>
          <small class="hidden timestamp"><?= strtotime($item['item']['pubDate']) ?></small>
<?php if (!empty($item['item']['description'])) { ?>
          <div class="toggler hidden">Display content</div>
	  <div class="hidden content well">
<?php
if (is_array($item['item']['description'])) { ?>
	      <?php arrayToXML($item['item']['description']); ?>
<?php } else { ?>
	      <?= $item['item']['description'] ?>
<?php } ?>
	  </div> <!-- content-"id" -->
<?php } ?>
	</div> <!-- span -->
	<div class="span1">
	  <a href="<?= $item['item']['link'] ?>" target="_blank">
	    <img src="http://icons.db0.fr/g/right_arrow.png" class="icon" alt="Go the full article">
	  </a>
	</div> <!-- span -->
      </div> <!-- row -->
    </div> <!-- feed_item -->
    </a>
<?php
	    }

function	feedsToHTML($feedsids, $max = null, $format) {
  $feed = feedsToArrays($feedsids, $max);
  foreach ($feed as $id => $item) {
    $item['item']['id'] = $id;
  }
  if ($format == 'html_grid')
    makeGrid(2, $feed, HTMLitem);
  else {
    foreach ($feed as $item) {
      HTMLitem($item);
    }
  }
}

function	returnRSSNews($feedsids) {
  include("../feedwriter/FeedWriter.php");
  $RSSfeed = new FeedWriter(RSS2);

  $RSSfeed->setTitle('db0.fr custom feed');
  $RSSfeed->setLink('http://db0.fr/news');
  $RSSfeed->setDescription('Get all the updates you\'re interested in about db0 with your custom feed');
  $RSSfeed->setImage('db0', 'http://db0.fr/', 'http://db0.fr/'.getRandomFaviconRSS(true));

  $feed = feedsToArrays($feedsids);
  foreach ($feed as $id => $item) {
    $RSSitem = $RSSfeed->createNewItem();
    $RSSitem->setTitle('['.$item['feed']['name'].'] '.$item['item']['title']);
    $RSSitem->setLink($item['item']['link']);
    $RSSitem->setDate($item['item']['pubDate']);
    $RSSitem->setDescription($item['item']['description']);
    $RSSfeed->addItem($RSSitem);
  }
  $RSSfeed->generateFeed();
}

function	returnHTMLNews($feedsids, $type) {
  feedsToHTML($feedsids, null, $type);
}

if (isset($_GET['feed'])) {
  $feedsids = explode(',', $_GET['feed']);
  if (isset($_GET['type'])
      && ($_GET['type'] == 'html'
	  || $_GET['type'] == 'html_grid'))
    returnHTMLNews($feedsids, $_GET['type']);
  else
    returnRSSNews($feedsids);
 }

