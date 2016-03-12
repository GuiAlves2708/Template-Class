<?php

class Template {

    private $_template;

    private $_assign = array();

    public function set($file) {

	    $this->_template = '';

	    // All templates are required to contain a header
	    $path = './templates/' . DEFAULT_THEME . '/header.tpl.php';

	    if (file_exists($path)) {
	        $this->_template .= file_get_contents($path);
	    } else {
	        die("Template error: file not found in: {$path}.");
	    }

	    $path = './templates/' . DEFAULT_THEME . '/' . $file . '.tpl.php';

	    if (file_exists($path)) {
	        $this->_template .= file_get_contents($path);
	    } else {
	        die("Template error: file not found in: {$path}.");
	    }

	    //All templates are required to contain a footer
	    $path = './templates/' . DEFAULT_THEME . '/footer.tpl.php';

	    if (file_exists($path)) {
	        $this->_template .= file_get_contents($path);
	    } else {
	        die("Template error: file not found in: {$path}.");
	    }

	}

    public function assign($string_search, $string_replace) {
        if (!empty($string_search)) {
            $this->_assign[strtoupper($string_search)] = $string_replace;
        }
    }

    public function display() {
        if (count($this->_assign) > 0) {
            foreach ($this->_assign as $key => $value) {
                $this->_template = str_replace('{' . $key . '}', $value, $this->_template);
            }
        }

        return $this->_template;
    }
}