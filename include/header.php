<!DOCTYPE html>
<!--
     _ _      ___         __      
  __| | |__  / _ \       / _|_ __ 
 / _` | '_ \| | | |     | |_| '__|
| (_| | |_) | |_| |  _  |  _| |   
 \__,_|_.__/ \___/  (_) |_| |_|   
                                  
-->
<html lang="en">
  <head>
    <title><?= $title ?> | <?= ucfirst($p) ?></title>

    <meta charset="UTF-8">
    <meta name="author" content="<?= $title ?> <?= $email ?>">
    <meta name="Keywords" content="<?= $title ?> Official Web page">

    <link rel="shortcut icon" href="<?= getRandomFavicon() ?>">
    <?php if ($_GET['prod']) { ?>
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen" title="Normal" />
    <?php } else { ?>
    <link rel="stylesheet/less" type="text/css" href="css/style.less">
    <link rel="stylesheet" type="text/css" media="all and (max-width:1024px)" href="css/small.css" />
    <script src="less.js" type="text/javascript"></script>
    <?php } ?>
    <script src="js/jquery.min.js"></script>
    <script src="js/menu.js"></script>
    <?php if (file_exists('js/'.$p.'.js')) { ?>
    <script src="js/<?= $p ?>.js"></script>
    <?php } ?>
  </head>
  <body>
