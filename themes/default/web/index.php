<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo rss_header_doclang(); ?>">
<head>
<?php rss_main_header(); ?>
<?php include_once 'cls/optimize.php'; ?>
</head>

<body<?php echo rss_header_onLoadAction() ?>>

<div id="nav" class="frame">
    <?php echo rss_header_logininfo() ?>
    <a class="hidden" href="#feedcontent">skip to content</a>
    <h1 id="top"><?php echo rss_main_title() ?></h1>
    <?php echo rss_nav() ?>
    <?php echo rss_nav_afternav() ?>
</div>
<div id="ctnr">
<ul id="sidemenu">
	<?php rss_main_sidemenu("li") ?>
</ul>
<div id="channels" class="frame">
	<?php rss_main_feeds(); ?>
<a href="http://haiti.ushahidi.com/"><img src="http://sitroom.ushahididev.com/wp-content/uploads/help-haiti.png" alt="help haiti" /></a>
</div>
<img src="img/logo.png" class="htlogo" alt="haiti tracker logo" />
<?php rss_errors_render() ?>
<?php rss_plugin_hook('rss.plugins.before.maindiv', rss_main_div_id()); ?>
<div <?php echo rss_main_div_id(); ?> class="frame">
 	<?php rss_main_object(); ?>
</div>

<div id="footer" class="frame">
	<?php rss_main_footer(); ?>
</div>

</div>
<?php rss_plugin_hook('rss.plugins.bodyend', null); ?>
</body>
</html>
