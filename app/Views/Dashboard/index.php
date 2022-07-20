<?= $this->extend('layout/template'); ?>
<?php if (allowHalaman(session('level_id'), 1)) : ?>

  <?= $this->section('content'); ?>
  </script <?= $this->endSection(); ?> <?php endif; ?>