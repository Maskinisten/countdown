<?php
/**
*
* @package phpBB Extension - PhpBB Countdown
* @copyright (c) 2015 dmzx - http://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
* @Author Stoker - http://www.phpbb3bbcodes.com
*
*/

namespace dmzx\countdown\acp;

class acp_countdown_info
 {
 function module()
 {
return array(
			'filename'	=> '\dmzx\countdown\acp\acp_countdown_module',
			'title'		=> 'ACP_COUNTDOWN',
			'version'	=> '1.0.0',
			'modes'		=> array(
				'config'	=> array('title' => 'ACP_COUNTDOWN_CONFIG', 
				'auth' => 'ext_dmzx/countdown && acl_a_board', 
				'cat' => array('ACP_COUNTDOWN')),
			),
		);
	}


}
