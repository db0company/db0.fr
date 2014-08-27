<?php
$feeds = array(
	       'productivity0' => array('url' => 'http://p0.db0.fr/rss',
				 'website' => 'http://p0.db0.fr/',
				 'name' => 'Productivity 0',
				 'details' => 'Be productive. Improve your life.',
				 'icon' => 'http://icons.db0.fr/s/p0_200.png',
                                 'default' => true,
                                 'home' => true,
				 'color' => '#ffb000'),
	       'slices' => array('url' => 'http://daily.db0.fr/rss',
				 'website' => 'http://slices.db0.fr/',
				 'name' => 'db0\'s Slices of life',
				 'details' => 'My everyday life through pictures',
				 'icon' => 'http://icons.db0.fr/v/slice.png',
                                 'default' => true,
                                 'home' => true,
				 'color' => '#07a331'),
	       'photos' => array('url' => 'https://picasaweb.google.com/data/feed/base/user/114832380918896847951?alt=rss&kind=album&hl=en_US&imgmax=1600',
				 'website' => 'http://photos.db0.fr/',
				 'name' => 'Photos',
				 'details' => 'Gallery of special events pictures',
				 'icon' => 'http://icons.db0.fr/v/gallery.png',
                                 'default' => true,
                                 'home' => false,
				 'color' => '#8b154e'),
	       'bonjour' => array('url' => 'http://bonjour.db0.fr/rss',
				  'website' => 'http://bonjour.db0.fr/',
				  'name' => 'Bonjour.db0.fr',
				  'details' => 'A picture of me everyday',
				  'icon' => 'http://icons.db0.fr/v/bonjour.png',
				  'default' => true,
				  'home' => true,
				  'color' => '#f894c5'),
	       'manger' => array('url' => 'http://manger.db0.fr/rss',
				 'website' => 'http://manger.db0.fr/',
				 'name' => 'Manger.db0.fr',
				 'details' => 'My food recipes',
				 'icon' => 'http://icons.db0.fr/v/manger.png',
                                 'default' => true,
                                 'home' => false,
				 'color' => 'sienna'),
	       'github' => array('real_url' => 'https://github.com/db0company.atom',
				 'url' => 'http://feedmix.novaclic.com/atom2rss.php?source=https%3A%2F%2Fgithub.com%2Fdb0company.atom',
				 'website' => 'http://github.db0.fr/',
				 'name' => 'GitHub',
				 'details' => 'Activity on my public repositories',
				 'icon' => 'http://icons.db0.fr/s/github.png',
                                 'home' => false,
                                 'default' => true,
				 'color' => 'dimgray'),
	       'plus' => array('url' => 'http://gplusrss.com/rss/feed/28cbb3c943cc2b5478587a2e60ccc62e51bbbcc28ccf3',
			       'website' => 'http://plus.db0.fr/',
			       'name' => 'Google+',
			       'details' => 'Activity on my social network',
			       'icon' => 'http://icons.db0.fr/s/plus.png',
			       'default' => true,
			       'home' => false,
			       'color' => '#df1c1c'),
	       'animes' => array('url' => 'http://pipes.yahoo.com/pipes/pipe.run?_id=5041b730c02de81e9b9492450030b49e&_render=rss&u=db0',
				 'website' => 'http://animes.db0.fr/',
				 'name' => 'My Anime List',
				 'details' => 'Animes I watched or decided to watch',
				 'icon' => 'http://icons.db0.fr/s/mal.png',
                                 'default' => true,
                                 'home' => false,
				 'color' => '#2c4fa0'),
	       'twitter' => array('url' => 'http://www.twitter-rss.com/user_timeline.php?screen_name=db0company',
				  'website' => 'http://twitter.db0.fr/',
				  'name' => 'Twitter',
				  'details' => 'My tweets (most are from external services)',
				  'icon' => 'http://icons.db0.fr/s/twitter.png',
				  'default' => true,
				  'home' => false,
				  'color' => '#2bb3d7'),
	       'pinterest' => array('url' => 'http://pinterest.com/db0company/feed.rss',
				    'website' => 'http://pinterest.db0.fr/',
				    'name' => 'Pinterest',
				    'details' => 'My pins about food or inspiration',
				    'icon' => 'http://icons.db0.fr/s/pinterest.png',
				    'default' => true,
				    'home' => false,
				    'color' => '#ce2228'),
	       );

function	getDefaults() {
  global $feeds;
  $feedsids = array();
  foreach ($feeds as $id => $feed)
    if ($feed['default'])
      $feedsids[] = $id;
  return $feedsids;
}

function	getHome() {
  global $feeds;
  $feedsids = array();
  foreach ($feeds as $id => $feed)
    if ($feed['home'])
      $feedsids[] = $id;
  return $feedsids;
}
