<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if IE 8 ]><html dir="<?php echo $direction; ?>" lang="<?php echo $lang; ?>" class="ie8"><![endif]-->
<!--[if IE 9 ]><html dir="<?php echo $direction; ?>" lang="<?php echo $lang; ?>" class="ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<!--suppress ALL -->
<html dir="<?php echo $direction; ?>" lang="<?php echo $lang; ?>">
<!--<![endif]-->
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $title; ?></title>
<base href="<?php echo $base; ?>" />
<?php if ($description) { ?>
<meta name="description" content="<?php echo $description; ?>" />
<?php } ?>
<?php if ($keywords) { ?>
<meta name="keywords" content= "<?php echo $keywords; ?>" />
<?php } ?>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<?php if ($icon) { ?>
<link href="<?php echo $icon; ?>" rel="icon" />
<?php } ?>
<?php foreach ($links as $link) { ?>
    <link href="<?php echo $link['href']; ?>" rel="<?php echo $link['rel']; ?>" />
    <?php } ?>
    <link rel="stylesheet" href="catalog/view/theme/fotoprizme/stylesheet/reset.css" type="text/css" media="screen">
    <script src="catalog/view/javascript/jquery/jquery-3.0.0.js"></script>
    <link rel="stylesheet" href="catalog/view/javascript/dropzone/dropzone.css">
    <script src="catalog/view/javascript/dropzone/dropzone.js"></script>
    
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,400i,300,700" type="text/css" />
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,latin-ext" type="text/css">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"  type="text/css" />
    
    
    <link rel="stylesheet" href="catalog/view/theme/fotoprizme/stylesheet/stylesheet.css" type="text/css">
    <link rel="stylesheet" href="catalog/view/theme/fotoprizme/stylesheet/jquery.modal.css" type="text/css" media="screen">
    <link rel="stylesheet" href="catalog/view/theme/fotoprizme/stylesheet/remodal.css" type="text/css" media="screen">
    <link rel="stylesheet" href="catalog/view/theme/fotoprizme/stylesheet/remodal-default-theme.css" type="text/css" media="screen">

    <link rel="stylesheet" href="catalog/view/theme/fotoprizme/stylesheet/custom_by_j.css" type="text/css">
    <link rel="stylesheet" href="catalog/view/theme/fotoprizme/stylesheet/client-slider.css" type="text/css" media="screen">
    <?php foreach ($styles as $style) { ?>
        <link href="<?php echo $style['href']; ?>" type="text/css" rel="<?php echo $style['rel']; ?>" media="<?php echo $style['media']; ?>" />
    <?php } ?>
    <script src="catalog/view/javascript/common.js" type="text/javascript"></script>
    <?php foreach ($scripts as $script) { ?>
        <script src="<?php echo $script; ?>" type="text/javascript"></script>
    <?php } ?>
    <?php //echo $google_analytics; ?>
    <!--[if gte IE 9]>
    <style type="text/css">
        .gradient {
            filter: none;
        }
    </style>
    <![endif]-->
    <meta name="verify-paysera" content="f10c06f7a30831aaf2a05096ccccaa19">
<!--    
<a href="<?php echo $shopping_cart; ?>" title="<?php echo $text_shopping_cart; ?>"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs hidden-sm hidden-md"><?php echo $text_shopping_cart; ?></span></a>
-->

</head>