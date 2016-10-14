<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CCI Lorraine';
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="ThemeStarz">

    <title>VosgesTime</title>


    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?=$this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', array('inline' => false));?>
    <?=$this->Html->script('https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js', array('inline' => false));?>
    <?= $this->Html->css('css/style.css') ?>
    <?= $this->Html->css('css/owl.carousel.css') ?>
    <?= $this->Html->css('css/jquery.slider.min.css') ?>
    <?= $this->Html->css('css/magnific-popup.css') ?>
    <?= $this->Html->css('css/bootstrap-select.min.css') ?>
    <?= $this->Html->css('http://fonts.googleapis.com/css?family=Roboto:300,400,700') ?>
    <?= $this->Html->css('bootstrap/css/bootstrap.css') ?>
    <?= $this->Html->css('fonts/font-awesome.css') ?>
    <?= $this->Html->script('jquery-2.1.0.min.js');?>
    <?= $this->Html->script('jquery-migrate-1.2.1.min.js');?>
    <?= $this->Html->script('bootstrap.min.js');?>
    <?= $this->Html->script('bootstrap/js/');?>
    <?= $this->Html->script('smoothscroll.js');?>
    <?= $this->Html->script('bootstrap-select.min.js');?>
    <?= $this->Html->script('jquery.validate.min.js');?>
    <?= $this->Html->script('icheck.min.js');?>
    <?= $this->Html->script('retina-1.1.0.min.js.js');?>
    <?= $this->Html->script('custom.js');?>



    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

   <link rel="stylesheet" href="hhttps://bootswatch.com/simplex/bootstrap.min.css">
</head>
<body class="page-sub-page page-my-properties page-account" id="page-top">
<?= $this->Flash->render() ?>
<div class="container clearfix">
    <?= $this->fetch('content') ?>
</div>
</body>
</html>
