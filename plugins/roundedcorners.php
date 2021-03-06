<?php
###############################################################################
# Gregarius - A PHP based RSS aggregator.
# Copyright (C) 2003 - 2006 Marco Bonetti
#
###############################################################################
# This program is free software and open source software; you can redistribute
# it and/or modify it under the terms of the GNU General Public License as
# published by the Free Software Foundation; either version 2 of the License,
# or (at your option) any later version.
#
# This program is distributed in the hope that it will be useful, but WITHOUT
# ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or
# FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for
# more details.
#
# You should have received a copy of the GNU General Public License along
# with this program; if not, write to the Free Software Foundation, Inc.,
# 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA  or visit
# http://www.gnu.org/licenses/gpl.html
#
###############################################################################
# E-mail:      mbonetti at gmail dot com
# Web page:    http://gregarius.net/
#
###############################################################################


/// Name: Rounded Corners
/// Author: Marco Bonetti
/// Description: Rounded corners in some GUI elements. Enabling this plugin breaks the CSS validation.
/// Version: 0.4

/**
 * Changelog:
 *
 * 0.3 Hack for a Gecko bug which did not render rounded corners properly
 *  on large divs. https://bugzilla.mozilla.org/show_bug.cgi?id=252241 - Sameer
 *
 * 0.4 Be evil on WebKit browsers, too
 */


function __rc_CSS($dummy) {
	$url = getPath(). RSS_PLUGINS_DIR . "/roundedcorners.php?rc-css";
    return "\t<link rel=\"stylesheet\" type=\"text/css\" href=\"$url\" />\n";
}

if (isset($_GET['rc-css'])) {
	$css = "
/* bad bad bad */
.frame,.item,h3.collapsed,table,div.content img,
ul.navlist li,a.bookmarklet, fieldset, div#pbholder, div.ief,
div.ief p a, #loginfo, input[type=\"submit\"] { -moz-border-radius: 5px; -webkit-border-radius:5px }
#sidemenu li {
	-moz-border-radius-top-left:5px;
	-moz-border-radius-top-right:5px;
	-webkit-border-top-left-radius:5px;
	-webkit-border-top-right-radius:5px;
}
";

	require_once('../core.php');
	rss_bootstrap(false, '$Revision$' . $css,  24);
  header('Content-Type: text/css');
	echo $css;
	exit();
}

/* Turn off rounded corners on the big frames because of a gecko
rendering bug */
function __roundedCornersCheckjs ($dummy) {
?>
      <script type="text/javascript">
      <!--
      	var theMainDivsOfItems = document.getElementById("items");	
		if (theMainDivsOfItems && (theMainDivsOfItems.offsetHeight > 29000)) {
			theMainDivsOfItems.style.MozBorderRadius = 0;
		}
	   -->
      </script>
<?php
   return $dummy;
}



rss_set_hook("rss.plugins.stylesheets",'__rc_CSS');
rss_set_hook('rss.plugins.bodyend','__roundedCornersCheckjs');
?>
