<?php

function set_cookie($name, $value = '', $expire = '', $domain = '', $path = '/', $prefix = '', $secure = FALSE, $httponly = FALSE)
{
	{
		if (empty($expire)) 
		{
			$expire=time()+172800;
		}
		if (!is_string($value)) 
		{
			$value=serialize($value);
		}


		// Set the config file options
		get_instance()->input->set_cookie($name, $value, $expire, $domain, $path, $prefix, $secure, $httponly);
	}

	
}

function get_cookie($index, $xss_clean = NULL)
	{
		is_bool($xss_clean) OR $xss_clean = (config_item('global_xss_filtering') === TRUE);
		$prefix = isset($_COOKIE[$index]) ? '' : config_item('cookie_prefix');
		$value=get_instance()->input->cookie($prefix.$index, $xss_clean);
		return unserialize($value);
	}

?>