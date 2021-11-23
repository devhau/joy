<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php SEO::generate(); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/turbolinks/5.0.0/turbolinks.js" integrity="sha512-P3/SDm/poyPMRBbZ4chns8St8nky2t8aeG09fRjunEaKMNEDKjK3BuAstmLKqM7f6L1j0JBYcIRL4h2G6K6Lew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        Turbolinks.start();
    </script>
    <link rel="stylesheet" href="<?php Asset("bootstrap/css/bootstrap-reboot.min.css"); ?>">
    <link rel="stylesheet" href="<?php Asset("bootstrap/css/bootstrap-grid.min.css"); ?>">
    <link rel="stylesheet" href="<?php Asset("common/css/normalize.css"); ?>">
    <link rel="stylesheet" href="<?php Asset("common/css/base.css"); ?>">
    <link rel="stylesheet" href="<?php Asset("theme/admin/admin.css"); ?>">
    <script type="text/javascript" src="<?php Asset("common/js/base.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo Asset("theme/admin/admin.js"); ?>"></script>
</head>

<body>
    <div class="wrapper">
        <?php app()->loadTheme('parts.sidebar'); ?>
        <main class="main">
            <?php app()->loadTheme('parts.menu'); ?>