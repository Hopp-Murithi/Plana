<?php

/**
 * @package Plana
 */

namespace Inc\Api\Callbacks;


use Inc\Base\BaseController;



class AdminCallbacks extends BaseController
{
	public function adminCreate()
	{
		return require_once( "$this->plugin_path/templates/createEvent.php" );
	}

	public function adminAttendees()
	{
		return require_once( "$this->plugin_path/templates/allEvents.php" );
	}

}


