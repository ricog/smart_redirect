<?php
class CustomView extends View {
    public function &_loadHelpers(&$loaded, $helpers, $parent = null) {
        $loaded = parent::_loadHelpers($loaded, $helpers, $parent);

		if(isset($loaded['ExtendedHtml'])) {
			$loaded['Html'] = $loaded['ExtendedHtml'];
			unset($loaded['ExtendedHtml']);
		}
		
		if(isset($loaded['ExtendedForm'])) {
			$loaded['Form'] = $loaded['ExtendedForm'];
			unset($loaded['ExtendedForm']);
		}

		return $loaded;
    }
}
?>