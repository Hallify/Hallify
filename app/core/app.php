<?php
    
    namespace Hallify\Core;

    /**
     * @author Bryan Heredia
     * @package Hallify\Core\App
     * @version 1.0
     **/


    class App
    {
    	/**
    	 * @var string|null The controller's name
    	 **/
    	private $controller_name;

    	/**
    	 * @var object|null The controller object
    	 **/
    	private $controller;

    	/**
    	 * @var string The controller's namespace
    	 **/
    	private $controller_namespace;

    	/**
    	 * @var string|null The action/method name
    	 **/
    	private $action;

    	/**
    	 * @var array|null The list of parameters
    	 **/
    	private $params;


    	/**
    	 * Start Hallify then parse the URL
    	 * to extract the controller name, action/method and parameters
    	 **/
    	public function __construct()
    	{
    		// parse the URL
    		$this->parseUrl();

    		// if the controller name was not given in the URL
    		// load the default controller
    		if (!$this->controller_name) {

                // set the controller name
                $this->controller_name = "Home";

    			// create and store the default controller namespace
    			$this->controller_namespace = "\\Hallify\\Controllers\\{$this->controller_name}";

    			// instantiate the default controller
    			$this->controller = new $this->controller_namespace;

    			// call the defaut action/method
    			$this->controller->index();

    		} elseif (is_readable(APP_FOLDER_PATH . "controllers/" . $this->controller_name . ".php")) {

    			// instantiate the controller
    			$this->controller = new $this->controller_namespace;

    			// if an action/method was given in the URL
    			// check if it exists, then make the proper calls
    			if (method_exists($this->controller, $this->action)) {

    				// check if parameters were given in the URL
    				if (!empty($this->params)) {

    					// call the action/method and pass the $param
    					// values as arguments
    					call_user_func_array(array($this->controller, $this->action), $this->params);

    				} else {

    					// if no parameters were given in the URL
    					// simply call the method without any arguments
    					$this->controller->{$this->action}();

    				}

    			} else {

    				// if no action/method was given in the URL
    				// call the default action/method
    				if (strlen($this->action) === 0) {

    					// call the default action/method
    					$this->controller->index();

    				} else {

    					/**
    					 * Action/Method Error
    					 * @todo Display an error page
    					 **/
    					echo "Method not found!";

    				}

    			}

    		} else {

    			/**
    			 * Controller Error
    			 * @todo Display an error page
    			 **/
    			echo "Controller not found!";
    		}

            $this->debug();

    	}


    	/**
    	 * Get and parse the URL to extract the controller name
    	 * action name and parameters
    	 **/
    	public function parseUrl()
    	{
    		if (isset($_GET["url"])) {

    			// split the URL
    			$url = trim($_GET["url"], "/");
    			$url = filter_var($url, FILTER_SANITIZE_URL);
    			$url = explode("/", $url);

    			// store $url parts into their designated properties

    			// store the controller name
    			$this->controller_name = isset($url[0]) ? ucfirst($url[0]) : null;

    			// store the action/method
    			$this->action = isset($url[1]) ? $url[1] : null;

    			// create the controller's namespace
    			$this->controller_namespace = "\\Hallify\\Controllers\\{$this->controller_name}";

    			// remove the controller name and action from the $url
    			unset($url[0], $url[1]);

    			// rebase the $url and store the params
    			$this->params = array_values($url);
    		}
    	}


        /**
         * (Debug Method) Display the contents of the URL
         * Controller, Action/Method and Parameters
         **/
        public function debug()
        {
            // only output the debug 
            // log if Hallify is in development mode
            if (ENVIRONMENT === "development" || ENVIRONMENT === "dev") {

                echo 'Controller -> ' . $this->controller_name . '<br/>';
                echo 'Action/Method -> ' . $this->action . '<br/>';
                echo 'Parameters -> ' . print_r($this->params, 1) . '<br/>';
            }
        }
    }