<?php

/**
 * @package Plana
 */

namespace Inc\Api\Callbacks;


use Inc\Base\BaseController;



class AdminCallbacks extends BaseController
{
	public function Dashboard()
	{
		return require_once( "$this->plugin_path/templates/allEvents.php" );
	}

	public function getAttendees()
	{
		return require_once( "$this->plugin_path/templates/attendees.php" );
	}

	public function createEvents(){
		return require_once("$this->plugin_path/templates/createEvent.php");
	}

}


