<?php

	return [

	    /*
	     * Is email activation required
	     */
	    'send_activation_email' => env('SETTINGS_SEND_ACTIVATION_EMAIL', true),

	    /**
	     * Folder Location to store upload kost's photos
	     */
	    'folder_upload_location'	=>	env('SETTINGS_UPLOAD_LOCATION')

	];