<?php
    
    use Hallify\Traits\PageStructure;

    namespace Hallify\Controllers;

    /**
     * @author Bryan Heredia <bryanheredia@hallify.com>
     * @package Hallify\Controllers\Inbox
     * @version 1.0
     **/


    class Inbox extends \Hallify\Core\Controller
    {
    	use \Hallify\Traits\PageStructure;

    	/**
    	 * @var string The page's title
    	 **/
    	public $title = "Inbox";

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
    	public $name = "inbox";


    	/**
    	 * Page : index (results page main view)
    	 **/
    	public function index()
    	{
    		// load the header
    		$this->displayHeader();

    		// load the view
    		$this->displayView("inbox/index.php");

    		// load the footer
    		$this->displayFooter();
    	}
    }