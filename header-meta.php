<!DOCTYPE html>
<html>
	<head>
<meta name="renderer" content="webkit" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /><meta charset="<?php bloginfo('charset'); ?>" />

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>

<meta content="black" name="apple-mobile-web-app-status-bar-style" />
<meta content="yes" name="apple-mobile-web-app-capable" /><meta content="telephone=no" name="format-detection" />

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo(’name’); ?>的Atom" href="<?php bloginfo('atom_url'); ?>" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo(’name’); ?>的RSS" href="<?php bloginfo('rss2_url'); ?>" />

<link rel='stylesheet' id='reset-css'  href='<?php bloginfo('stylesheet_url'); ?>' type='text/css' media='all' />
<link rel='stylesheet' id='publicCss-css'  href='<?php bloginfo('template_url'); ?>/css/page.css' type='text/css' media='all' />
<link rel='stylesheet' id='indexCss-css'  href='<?php bloginfo('template_url'); ?>/css/index-min.css' type='text/css' media='all' />

<script type='text/javascript' src='http://g.tbcdn.cn/kissy/k/1.4.1/seed-min.js'></script>
<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/init-min.js'></script>
<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/init-min002.js'></script>

<link rel="EditURI" type="application/rsd+xml" title="RSD" href="<?php bloginfo('url'); ?>/xmlrpc.php?rsd" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="<?php bloginfo('url'); ?>/wp-includes/wlwmanifest.xml" /> 

<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" />
<link rel="apple-touch-icon-precomposed" href="<?php bloginfo('template_url'); ?>/images/touch-icon.png" />

<?php if(is_home()) : { ?>
    <title><?php bloginfo('name'); ?> - <?php bloginfo('description'); ?></title>
<?php ;} ?>

<?php else : ?>
    <title><?php wp_title(' - ', true, 'right'); ?> - <?php bloginfo('name'); ?></title>
<?php endif; ?>

<style type="text/css" id="custom-background-css">
body.custom-background { background-color: #f8f8f8; }
</style>
	<?php wp_head(); ?>	
	</head>
    <!-- 整理完成 -->