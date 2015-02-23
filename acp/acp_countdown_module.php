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

class acp_countdown_module
{
var $u_action;

	function main($id, $mode)
	{
		global $db, $user, $auth, $template, $cache;
		global $config, $phpbb_root_path, $phpbb_admin_path, $phpEx;

		$user->add_lang_ext('dmzx/countdown', 'info_acp_countdown');
		$this->tpl_name = 'acp_countdown_config';
		$this->page_title = $user->lang['COUNTDOWN_CONFIG'];
		add_form_key('acp_countdown_config');
		
		$submit = (isset($_POST['submit'])) ? true : false;
		if ($submit)
		{
			if (!check_form_key('acp_countdown_config'))
			{
				trigger_error('FORM_INVALID');
			}
			set_config('countdown_enable', request_var('countdown_enable', 0));
			set_config('countdown_testmode', request_var('countdown_testmode', 0));
			set_config('countdown_direction', request_var('countdown_direction', 0));
			set_config('countdown_date', request_var('countdown_date', ''));
			set_config('countdown_offset_enable', request_var('countdown_offset_enable', 0));
			set_config('countdown_year', request_var('countdown_year', 0));
			set_config('countdown_month', request_var('countdown_month', 0));
			set_config('countdown_text', request_var('countdown_text', ''));
			set_config('countdown_complete', request_var('countdown_complete', ''));

			trigger_error($user->lang['COUNTDOWN_CONFIG_SAVED'] . adm_back_link($this->u_action));
		}
		$template->assign_vars(array(
			'COUNTDOWN_VERSION'			=> (isset($config['countdown_version'])) ? $config['countdown_version'] : '',
			'COUNTDOWN_ENABLE'			=> (!empty($config['countdown_enable'])) ? true : false,
			'COUNTDOWN_TESTMODE'		=> (!empty($config['countdown_testmode'])) ? true : false,
			'COUNTDOWN_DIRECTION'		=> (!empty($config['countdown_direction'])) ? true : false,
			'COUNTDOWN_DATE'			=> (isset($config['countdown_date'])) ? $config['countdown_date'] : '',
			'COUNTDOWN_OFFSET_ENABLE'	=> (!empty($config['countdown_offset_enable'])) ? true : false,
			'COUNTDOWN_OFFSET'			=> (isset($config['countdown_offset'])) ? $config['countdown_offset'] : '',
			'COUNTDOWN_YEAR'			=> (!empty($config['countdown_year'])) ? true : false,
			'COUNTDOWN_MONTH'			=> (!empty($config['countdown_month'])) ? true : false,
			'COUNTDOWN_TEXT'			=> (isset($config['countdown_text'])) ? $config['countdown_text'] : '',
			'COUNTDOWN_COMPLETE'		=> (isset($config['countdown_complete'])) ? $config['countdown_complete'] : '',
			'U_ACTION'					=> $this->u_action,
		));
	}
}
