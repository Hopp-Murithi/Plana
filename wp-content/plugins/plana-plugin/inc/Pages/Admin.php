<?php
/**
 * @package Plana
 */

 namespace Inc\Pages;

 use \Inc\Api\SettingsApi;
 use \Inc\Base\BaseController;
 use \Inc\Api\Callbacks\AdminCallbacks;

class Admin extends BaseController{
    public $settings;

    public $callbacks;

    public $pages = array();

    public $subpages = array();

    

    //My Api for creating admin pages in seconds
    public function register(){
$this-> callbacks = new AdminCallbacks();

        $this->settings = new SettingsApi();
        $this->setPages();
        $this->setSubPages();

        $this->settings->addPages($this->pages)->withSubPage('My Events')-> addSubPages($this->subpages) ->register();
        // $this->settings->addPages($this->pages)->withSubPage('Dashboard')-> addSubPages($this->subpages) ->reg();
    }

    public function setPages(){
        $this->pages = array(
            [
            'page_title' => 'Manage Events',
            'menu_title' => 'Manage Events',
            'capability' => 'manage_options',
            'menu_slug' => 'events',
            'callback' => array($this->callbacks, 'Dashboard'),
            'icon_url' => 'dashicons-groups',
            'position' => 110
            ],
        );

    }

    public function setSubPages(){
        $this->subpages = array(
            array(
                'parent_slug' => 'events',
                'page_title' => 'Add Events',
                'menu_title' => 'Create Event',
                'capability' => 'manage_options',
                'menu_slug' => 'create',
                'callback' => array($this->callbacks, 'createEvents'),
            ),

            array(
                'parent_slug' => 'events',
                'page_title' => 'Attendees',
                'menu_title' => 'Attendees',
                'capability' => 'manage_options',
                'menu_slug' => 'attendees',
                'callback' => array( $this->callbacks, 'Dashboard' ),
            ),

        );
    }
}
