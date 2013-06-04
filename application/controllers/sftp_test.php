<?php

class Sftp_test extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        // Load libraries
        $this->load->library('sftp');

    }


//----------------------------------------------------------------------------------->
// private functions
//----------------------------------------------------------------------------------->

//----------------------------------------------------------------------------------->
// end private functions
//----------------------------------------------------------------------------------->

	function index() {
		
		/*
		The sFTP config. These are the credentials you use to connect to the remote sFTP server.
		These can also be stored in a seperate config file to save having to enter them in all
		the time.
		
		If 'debug' is set to TRUE, then if the library encounters and error, the error will be displayed
		using the error values with the language file supplied (application/language/english/sftp_lang.php).
		If it's set to FALSE, it will gracefully error with no error messages.
		*/
		
		$sftp_config['hostname'] = 'your.sftp-domain.com';
		$sftp_config['username'] = 'your_sftp_username';
		$sftp_config['password'] = 'your_sftp_password';
		$sftp_config['debug'] = TRUE;
		
		// Actually try and connect to the remote server...
		$this->sftp->connect($sftp_config);
		
		/*
		Some example commands you can run (look in the actual library file for more info).
		*/
		
		/*
		upload:	This will upload a file from your local filesystem to the remote filesystem.
				It will also overwrite any file that's on the remote server of the same name.
		*/
		$success = $this->sftp->upload("/var/www/cgi-bin/data/test.csv","/tmp/test.csv");
		
		
		/*
		download:	This will download a file from the remote filesystem to the local filesystem.
					It will also overwrite any file that's on the local filesystem of the same name.
		*/
		$success = $this->sftp->download("/tmp/test.csv", "/var/www/cgi-bin/data/test.csv");
		
		
		/*
		mkdir:	This will create a directory on the remote filesystem.
		*/
		$success = $this->sftp->mkdir("/tmp/test/");
		
		
		/*
		rename:	This will rename a file on the remote filesystem.
		*/
		$success = $this->sftp->rename("/tmp/test/test.csv", "/tmp/test/test2.csv");
		
		
		/*
		delete_file:	This will remove a file on the remote filesystem.
		*/
		$success = $this->sftp->delete_file("/tmp/test/test2.csv");
		
		
		/*
		delete_dir:	This will remove a diretory on the remote filesystem.
		*/
		$success = $this->sftp->delete_dir("/tmp/test/");
		
		
		/*
		list_files:	This will list all files in a diretory on the remote filesystem.
		*/
		$success = $this->sftp->list_files("/tmp/test/", TRUE);
		
		
		// Output is the method was successful!
		print_r($success);
	}
//----------------------------------------------------------------------------------->
}
?>