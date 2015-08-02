<?php

/*
 * Editor server script for DB table operator_log
 * Created by http://editor.datatables.net/generator
 */

// DataTables PHP library and database connection
include( "lib/DataTables.php" );

// Alias Editor classes so they are easy to use
use
	DataTables\Editor,
	DataTables\Editor\Field,
	DataTables\Editor\Format,
	DataTables\Editor\Join,
	DataTables\Editor\Upload,
	DataTables\Editor\Validate;


// Build our Editor instance and process the data coming from _POST
Editor::inst( $db, 'operator_log', 'idx' )
	->fields(
		Field::inst( 'dato' )
//			->set( false )
			->validator( 'Validate::notEmpty' )
			->validator( 'Validate::dateFormat', array( 'format'=>'Y-m-d' ) )
			->getFormatter( 'Format::date_sql_to_format', 'Y-m-d H:i' )
			->setFormatter( 'Format::date_format_to_sql', 'Y-m-d' ),
		Field::inst( 'subject' ),
		Field::inst( 'text' )
	)
	->process( $_POST )
	->json();