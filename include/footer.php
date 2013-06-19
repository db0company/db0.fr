      <footer>
	<?php foreach ($menu as $page => $m) { ?>
	<a href="<?= $page ?>.html"><?= $m['label'] ?></a> |
	<?php } ?>
	<?= $url ?> &copy; <?= date('Y') ?>
      </footer>

    </div> <!-- main -->

  </body>
</html>
