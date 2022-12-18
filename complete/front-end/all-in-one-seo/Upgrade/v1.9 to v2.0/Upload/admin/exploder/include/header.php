<?php
// ensure this file is being included by a parent file
if( !defined( '_JEXEC' ) && !defined( '_VALID_MOS' ) ) die( 'Restricted access' );
/**
 * @version $Id: header.php 231 2013-09-04 18:12:47Z soeren $
 * @package eXtplorer
 * @copyright soeren 2007-2012
 * @author The eXtplorer project (http://extplorer.net)
 * @author The	The QuiX project (http://quixplorer.sourceforge.net)
 * 
 * @license
 * The contents of this file are subject to the Mozilla Public License
 * Version 1.1 (the "License"); you may not use this file except in
 * compliance with the License. You may obtain a copy of the License at
 * http://www.mozilla.org/MPL/
 * 
 * Software distributed under the License is distributed on an "AS IS"
 * basis, WITHOUT WARRANTY OF ANY KIND, either express or implied. See the
 * License for the specific language governing rights and limitations
 * under the License.
 * 
 * Alternatively, the contents of this file may be used under the terms
 * of the GNU General Public License Version 2 or later (the "GPL"), in
 * which case the provisions of the GPL are applicable instead of
 * those above. If you wish to allow use of your version of this file only
 * under the terms of the GPL and not to allow others to use
 * your version of this file under the MPL, indicate your decision by
 * deleting  the provisions above and replace  them with the notice and
 * other provisions required by the GPL.  If you do not delete
 * the provisions above, a recipient may use your version of this file
 * under either the MPL or the GPL."
 * 
 * This is the file, which prints the header row with the Logo
 */
function show_header($dirlinks='') {
	$url = htmlentities(str_replace( array('&dir=', '&action=', '&file_mode='), 
						array('&a=','&b=','&c='), 
						$_SERVER['REQUEST_URI'] ), ENT_QUOTES );
	$urlArr = parse_url( $url );
	$url_appendix = '';
	if( !empty( $urlArr['query'])) {
		$queryParts = explode('&', $urlArr['query']);
		$params = array(); 
	    foreach ($queryParts as $param) { 
	        $item = explode('=', $param); 
	        $params[urlencode(urldecode($item[0]))] = urlencode(urldecode($item[1])); 
	    }
	    $query = '';
	    foreach( $params as $key => $val ) {
	    	$query .= $key .'='. $val.'&amp;';
	    }
	    $url = $urlArr['path'].'?'.$query;
	} else {
		$url_appendix = '?';
	}
	
	echo "<link rel=\"stylesheet\" href=\""._EXT_URL."/style/style.css\" type=\"text/css\" />\n";
	echo "<div id=\"ext_header\">\n";
    echo '<a href="'.str_replace('/exploder','',_EXT_URL).'"><b>Back to Admin Panel</b></a>';
	echo '</div>';
}
//------------------------------------------------------------------------------
?>
