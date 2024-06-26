<?php
defined('BASEPATH') or die('No direct script access allowed!');

function is_login($is_true = false)
{
	$CI =& get_instance();
	if (!@$CI->session->is_login && !$is_true) {
		redirect('auth/');
	} elseif ($CI->session->is_login && $is_true) {
		redirect('dashboard');
	}

	return;
}

function is_role($role)
{
	$CI =& get_instance();
	if ($CI->session->role == $role) {
		return true;
	}

	return false;
}

function redirect_if_role_not($role)
{
	$CI =& get_instance();
	$is_match = false;
	if (is_array($role)) {
		if (in_array($CI->session->role, $role)) {
			$is_match = true;
		}
	} else {
		$is_match = is_role($role);
	}

	if (!$is_match) {
		return redirect('dashboard/');
	}

	return;
}