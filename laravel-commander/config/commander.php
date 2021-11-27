<?php

return [
	
   /*
   |--------------------------------------------------------------------------
   | Root Directory
   |--------------------------------------------------------------------------
   |
   | Specifies where all folders are created
   |
   */
	'rootDirectory' => 'app',
	
	/*
   |--------------------------------------------------------------------------
   | Default Namespace
   |--------------------------------------------------------------------------
   |
   | Specifies which namespace the commands to run
   |
   */
	'defaultNamespace' => [
		'composer' => 'Http\Views',
		'contract' => 'Contracts',
		'enumeration' => 'Enumerations',
		'facade' => 'Facades',
		'helper' => 'Helpers',
		'repository' => 'Repositories',
		'service' => 'Services',
	],
	
	/*
   |--------------------------------------------------------------------------
   | Not Allowed Tables
   |--------------------------------------------------------------------------
   |
   | When the seed command is executed, unwanted tables will be specified here.
   |
   */
	'notAllowedTables' => [
		'migrations',
		'telescope_entries',
		'telescope_entries_tags',
		'telescope_monitoring',
	]
];