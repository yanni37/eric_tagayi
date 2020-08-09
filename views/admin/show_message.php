<!-- HEADER -->
<?php require_once "views/admin/header.php"; ?>
<!-- HEADER -->

<span><?= htmlentities($message->getEmail()) ?></span>
<span><?= htmlentities($message->getDate()) ?></span>
<span><?= htmlentities($message->getSujet()) ?></span>
<p><?= htmlentities($message->getContenue()) ?></p>

<!-- FOOTER -->
<?php require_once "views/admin/footer.php"; ?>
<!-- FOOTER -->
