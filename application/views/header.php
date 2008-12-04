<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo $site_name; ?></title>
	<style media="all" type="text/css">@import "<?php echo url::base() ?>media/css/all.css";</style>
	<style media="all" type="text/css">@import "<?php echo url::base() ?>media/css/photoslider.css";</style>
	<!--[if lt IE 7]><link rel="stylesheet" type="text/css" href="<?php echo url::base() ?>/media/css/ie6.css" media="screen"/><![endif]-->
	<?php
	// Load OpenLayers before jQuery!
	if ($map_enabled)
	{
		echo html::script('media/js/OpenLayers/OpenLayers');
		// OpenLayers Theme
		echo html::stylesheet('media/js/OpenLayers/theme/default/style');
	}	
	
	// Load jQuery
	echo html::script('media/js/jquery');
	echo html::script('media/js/jquery.validate.min');
	echo html::script('media/js/jquery.ui.min');
	
	// Other stuff to load only we have the map enabled
	if ($map_enabled)
	{
		echo html::script('media/js/OpenLayers/LoadingPanel');
		echo $api_url . "\n";
		if ($main_page) {
			echo html::script('media/js/accessibleUISlider.jQuery');
			echo html::script('media/js/jquery.flot');
			?>
			<!--[if IE]><script language="javascript" type="text/javascript" src="<?php echo url::base() ?>media/js/excanvas.pack.js"></script><![endif]-->
			<?php
			echo html::stylesheet('media/css/jquery-ui-themeroller');
		}
	}
	if ($datepicker_enabled)
	{
		echo html::stylesheet('media/css/datepicker/ui.datepicker');
	}
	echo html::script('media/js/photoslider.js');
	
	if ($allow_feed == 1) {
		echo "<link rel=\"alternate\" type=\"application/rss+xml\" href=\"http://" . $_SERVER['SERVER_NAME'] . "/feed/\" title=\"RSS2\" />";
	}
	?>
	<script type="text/javascript">
		<?php echo $js . "\n"; ?>
	</script>
</head>
<body>
	<div id="main">
		<!-- start header block -->
		<div id="header">
			<div class="header-info">
				<strong><a href ="<?php echo url::base(); ?>" <?php echo $site_name_style; ?>><?php echo $site_name; ?></a></strong>
				<p><?php echo $site_tagline; ?></p>
			</div>
			<ul id="menu">
				<li class="first"><a <?php if ($this_page == 'home') echo 'class="active"'; ?> href="<?php echo url::base() . "main" ?>"><?php echo Kohana::lang('ui_main.home'); ?></a></li>
				<li><a <?php if ($this_page == 'reports') echo 'class="active"'; ?> href="<?php echo url::base() . "reports/" ?>"><?php echo Kohana::lang('ui_main.reports'); ?></a></li>
				<li><a <?php if ($this_page == 'reports_submit') echo 'class="active"'; ?> href="<?php echo url::base() . "reports/submit" ?>"><?php echo Kohana::lang('ui_main.submit'); ?></a></li>
				<li><a <?php if ($this_page == 'alerts') echo 'class="active"'; ?> href="<?php echo url::base() . "alerts" ?>"><?php echo Kohana::lang('ui_main.alerts'); ?></a></li>
				<li class="last"><a <?php if ($this_page == 'help') echo 'class="active"'; ?> href="<?php echo url::base() . "help" ?>"><?php echo Kohana::lang('ui_main.help'); ?></a></li>
			</ul>
			<div class="lang_search">
				<div class="lang_box">
					<ul id="languages">
						<li><a <?php if ($site_language == 'en_US') echo 'class="active"'; ?> href="<?php echo url::base(); ?>?lang=en_US"><img alt="en_US" src="<?php echo url::base(); ?>media/img/flags/en_US.png" width="16" height="11" /></a></li>
						<li><a <?php if ($site_language == 'fr_FR') echo 'class="active"'; ?> href="<?php echo url::base(); ?>?lang=fr_FR"><img alt="fr_FR" src="<?php echo url::base(); ?>media/img/flags/fr_FR.png" width="16" height="11" /></a></li>
					</ul>
					
				</div>
				<div class="search_box">
					<form method="get" id="search" action="<?php echo url::base() . 'search/'; ?>">
					<input type="text" id="keywords" name="k" value="" class="text">
					<input type="submit" name="b" class="searchbtn" value="<?php echo Kohana::lang('ui_main.search'); ?>" title="">
					</form>
				</div>
			</div>
		</div>
		<!-- end header block <> start content block -->