<?php
App::import('Helper', 'Form');
class ExtendedFormHelper extends FormHelper {
	public function create($model = null, $options = array()) {
    	$form = parent::create($model, $options);

    	if (isset($this->params['named']['backTo'])) {
    		$form .= $this->hidden('params.backTo', array('value' => $this->params['named']['backTo']));    		
    	}
    	if (isset($this->data['params']['backTo'])) {
    		$form .= $this->hidden('params.backTo', array('value' => $this->data['params']['backTo']));    		
    	}
    	
    	return $form;
    }
}
?>