<?php
/* page/tools.php - myDNS-WI
 * Copyright (C) 2012-2013  Nexus-IRC project
 * http://nexus-irc.de
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License 
 * along with this program. If not, see <http://www.gnu.org/licenses/>. 
 */
?>
<h2><a href="?page=main">DNS</a> &raquo; <a href="#" class="active">Tools</a></h2>
<div id="main">
<?php
if(isset($_POST["Submit"])) {
	if(isset($_POST["dns"]) && $_POST["dns"] != "") {
		$dns = new dns;
		echo "<pre>";
		echo $dns->get($_POST["dns"]);
		echo "</pre>";
	}
	if(isset($_POST["whois"]) && $_POST["whois"] != "") {
		echo nl2br(shell_exec("whois ".$_POST["whois"]));
	}
} else {
?>
<form method="post" name="target" action="?page=tools" class="jNice">
	<table width="320"  border="0" align="center">
		<tr>
			<td><strong>DNS lookup:</strong></td>
			<td><input class="text" type="text" name="dns" /></td>
		</tr>
			<td><strong>Domain WHOIS:</strong></td>
			<td><input class="text" type="text" name="whois" /></td>
		<tr class="odd">
			<td>&nbsp;</td>
			<td><center><input type="submit" name="Submit" value="Check" /></center></td>
		</tr>
	</table>
</form>
<?php } ?>
</div>
