<?php
App::import('Helper', 'Html');
class ExtendedHtmlHelper extends HtmlHelper {
    public function link($title, $url = null, $htmlAttributes = array(), $confirmMessage = false, $escapeTitle = true) {
		if ($url !== null) {
			$url = $this->url($url);
		} else {
			$url = $this->url($title);
			$title = $url;
			$escapeTitle = false;
		}
		if (isset($this->base) && $this->base != '/') {
			$url = str_replace($this->base, '', $url);
		}

		$formPatterns = array ('add', 'edit', 'delete');

		if (preg_match('/\/' . join('|', $formPatterns) . '\//', $url)) {
			if (strpos($this->params['url']['url'], 'backTo:') !== false) {
				$this->params['url']['url'] = preg_replace('/backTo\:.*$/', '', $this->params['url']['url']);
			}
			$url = $url . '/' . 'backTo:' . rawurlencode(strtr($this->params['url']['url'], '/', '~'));
		}

		return parent::link($title, $url, $htmlAttributes, $confirmMessage, $escapeTitle);
    }

}
?>