<?php
class AutoReturnComponent extends Object {
	var $disabled = false;

	//called before Controller::beforeFilter()
	function initialize(&$controller, $settings = array()) {
		// saving the controller reference for later use
		$this->controller =& $controller;
	}

	//called after Controller::beforeFilter()
	function startup(&$controller) {
    	$controller->view = 'SmartRedirect.Custom';
    	$controller->helpers = am($controller->helpers, array('SmartRedirect.ExtendedHtml', 'SmartRedirect.ExtendedForm'));
	}

	//called after Controller::beforeRender()
	function beforeRender(&$controller) {
	}

	//called after Controller::render()
	function shutdown(&$controller) {
	}

	//called before Controller::redirect()
	function beforeRedirect(&$controller, $url, $status=null, $exit=true) {
		if (!$this->disabled) {
			if (isset($this->controller->params['named']['backTo'])) {
				$url = '/' . strtr($this->controller->params['named']['backTo'], '~', '/');
			}
			elseif (isset($this->controller->data['params']['backTo'])) {
				$url = '/' . strtr($this->controller->data['params']['backTo'], '~', '/');
			}
		}
		return $url;
	}
}
?>