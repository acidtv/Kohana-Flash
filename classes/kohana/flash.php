<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Simple flash message class
 */
class Kohana_Flash {

	/**
	 * name to use in Session()
	 */
	public $session_var = 'flash';

	/**
	 * cache messages here
	 */
	protected $cache = array();

	/**
	 * configuration
	 */
	protected $config = array();
	
	/**
	 * Populate local cache and set config options
	 */
	public function __construct()
		{
		$this->config = Kohana::config('flash');
		$this->cache = Session::instance()->get($this->session_var);
		if (!is_array($this->cache)) $this->cache = array();
		}
	
	/**
	 * Save cache to session
	 */
	public function __destruct()
		{
		Session::instance()->set($this->session_var, $this->cache);
		}
	
	public static function factory()
		{
		return new Flash();
		}	

	/**
	 * Adds flash message to the queue
	 */
	public function add($s)
		{
		$this->cache[] = array('time' => date('H:i'), 'text' => $s);
		return true;
		}
	
	/**
	 * Returns array with scheduled flash messages
	 */
	public function get()
		{
		return $this->cache;
		}
	
	/**
	 * Returns true if there are messages scheduled
	 */
	public function has_messages()
		{
		return (bool)$this->cache;
		}

	/**
	 * Returns rendered flash messages
	 */
	public function render($view = 'flash/seperate')
		{
		$view = View::factory($view);
		//var_dump($this->cache);
		$rendered = $view->set('messages', $this->cache)->render();
		$this->clear();

		return $rendered;
		}
	
	/**
	 * Clears message cache
	 */
	public function clear()
		{
		$this->cache = array();
		}

}
