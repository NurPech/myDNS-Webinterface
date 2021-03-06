<?php
/* lib/func.class.php - myDNS-WI
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
class func {
	public static function getOptions ($type, $id = NULL) {
		global $conf;
		$return = NULL;
		if(isset($id)) {
			$return .= '<select name="type['.$id.']">';
		} else {
			$return .= '<select name="newtype">';
		}
		foreach($conf["typearray"] as $name ){
			if($name == $type) {
				$return .= '<option label="'.$name.'" value="'.$name.'" selected="selected">'.$name.'</option>';
			} else {
				$return .= '<option label="'.$name.'" value="'.$name.'">'.$name.'</option>';
			}
		}
		$return .= '</select>';
		return $return;
	}
	
	public static function isAdmin () {
		global $conf;
		$res = DB::query("SELECT * FROM ".$conf["users"]." WHERE id = '".DB::escape($_SESSION["userid"])."'") or die(DB::error());
		$row = DB::fetch_array($res);
		if(isset($row['admin']) && $row['admin'] == 1){
			return true;
		} else {
			return false;
		}
	}
	
	public static function ent ($str) {
		return htmlentities($str);
	}
}
?>
