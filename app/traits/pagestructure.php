<?php
    
    namespace Hallify\Traits;

    /**
     * @author Bryan Heredia <bryanheredia@hallify.com>
     * @package Hallify\Traits\PageStructure
     * @version 1.0
     **/


    trait PageStructure
    {
    	/**
    	 * Display the page's HTML Header
    	 **/
    	public function displayHeader()
    	{
    		// load the header.php script
    		require_once APP_FOLDER_PATH . "views/_templates/header.php";
    	}

    	/**
    	 * Display the page's view
    	 * @param string $viewFileName The file name of the view (example "home/index.php")
    	 **/
    	public function displayView($viewFileName)
    	{
    		// load the view
    		require_once APP_FOLDER_PATH . "views/" . $viewFileName;
    	}

    	/**
    	 * Display the page's HTML Footer
    	 **/
    	public function displayFooter()
    	{
    		// load the footer
    		require_once APP_FOLDER_PATH . "views/_templates/footer.php";
    	}
    }