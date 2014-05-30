<?php
class UB_Admin_Bar_Forms  {

    /**
     * Retrieves options
     *
     * @param bool $key
     * @param string $pfx
     * @return mixed|void
     */
    function _get_option ($key=false, $pfx='wdcab') {
		$opts = ub_get_option($pfx);
		if (!$key) return $opts;
		return @$opts[$key];
	}

    /**
     * Renders checkbox
     *
     * @param $name
     * @param string $pfx
     * @return string
     */
    function _create_checkbox ($name, $pfx='wdcab') {
		$opt = self::_get_option($name, $pfx);
		$value = @$opt[$name];
		return
			"<input type='radio' name='{$pfx}[{$name}]' id='{$name}-yes' value='1' " . ((int)$value ? 'checked="checked" ' : '') . " /> " .
				"<label for='{$name}-yes'>" . __('Yes', 'wdcab') . "</label>" .
			'&nbsp;' .
			"<input type='radio' name='{$pfx}[{$name}]' id='{$name}-no' value='0' " . (!(int)$value ? 'checked="checked" ' : '') . " /> " .
				"<label for='{$name}-no'>" . __('No', 'wdcab') . "</label>" .
		"";
	}

    /**
     * Creates enable box
     */
    public static function create_enabled_box () {
		echo self::_create_checkbox('enabled');
	}

    /**
     * Renders disable/enable setting
     */
    public static function create_disable_box () {
		$_menus = array (
			'wp-logo' => __('WordPress menu', 'ub'),
			'site-name' => __('Site menu', 'ub'),
			'my-sites' => __('My Sites', 'ub'),
			'new-content' => __('Add New', 'ub'),
			'comments' => __('Comments', 'ub'),
			'updates' => __('Updates', 'ub'),
		);
		$disabled = self::_get_option('disabled_menus');
		$disabled = is_array($disabled) ? $disabled : array();

		echo '<input type="hidden" name="wdcab[disabled_menus]" value="" />';
		foreach ($_menus as $id => $lbl) {
			$checked = in_array($id, $disabled) ? 'checked="checked"' : '';
			echo '' .
				"<input type='checkbox' name='wdcab[disabled_menus][]' id='wdcab-disabled_menus-{$id}' value='{$id}' {$checked}>" .
				"&nbsp;" .
				"<label for='wdcab-disabled_menus-{$id}'>{$lbl}</label>" .
			"<br />";
		}
	}
}