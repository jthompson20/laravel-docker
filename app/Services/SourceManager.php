<?php 

namespace App\Services;

class SourceManager extends Service
{

	private $_namespace = 'ReportingEngine';	// default

	protected $_class;

	function __construct($content_type)
	{
		parent::__construct();

		$this->_namespace = app()->make('config')->get('sources.source');

		$content_type = ucwords(preg_replace('/[^a-z0-9]/', '', strtolower($content_type)));

		$class = 'App\\Services\\Sources\\'.$this->_namespace.'\\'.$content_type;

		$this->_class = new $class();
	}

	public function __get($attrib_name)
	{

		if (is_object($this->_class) && $this->_class->$attrib_name) {
			return $this->_class->$attrib_name;
		}

		return NULL;
	}

	public function __set($attrib_name, $value)
	{
		return $this->_class->$attrib_name = $value;
	}

	public function __call($method_name, $args = NULL)
	{

		return call_user_func_array(array($this->_class, $method_name), $args);
    
    }

}