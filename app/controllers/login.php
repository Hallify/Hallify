<?php
    
    use Hallify\Traits\PageStructure;

    namespace Hallify\Controllers;

    /**
     * @author Bryan Heredia <bryanheredia@hallify.com
     * @package Hallify\Controllers\Login
     * @version 1.0
     **/


    class Login extends \Hallify\Core\Controller
    {
    	use \Hallify\Traits\PageStructure;

    	/**
    	 * @var string The page's title
    	 **/
    	public $title = "Login";

    	/**
    	 * @var string The page's description
    	 **/
    	public $description = "Description goes here";

    	/**
    	 * @var string The page's keywords
    	 **/
    	public $keywords = "keyword1, keyword2, keyword3, keyword4, keyword5";

    	/**
    	 * @var string The page's name
    	 **/
    	public $name = "login";


    	/**
    	 * Page : index (login page main view)
    	 **/
    	public function index()
    	{
    		// load the header
    		$this->displayHeader();

    		// load the view
    		$this->displayView("login/index.php");

    		// load the footer
    		$this->displayFooter();
    	}
    }