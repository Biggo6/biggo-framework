<?php

class EngineTemplate {
	protected $file;

	protected $values = array();

	public function __construct($file){
		$this->file = $file;
	}

	public function output(){
		if(!file_exists($this->file)){
			ErrorBag::collect("<b>Error loading <i style='color: red'>ebig</i> template file </b> __::__" . $this->file );
		}else{
			$out = file_get_contents($this->file);

			foreach ($this->values as $key => $value) {
				$tag     = "<@$key>";
				$out  = str_replace($tag, $value, $out);
		    }

		    return $out;
		}
	}

	public function set($k, $v){
		$this->values[$k]  = $v;
	}
}
