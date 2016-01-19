<?php

/*
 * Editor server script for DB table filminfo
 * Created by http://editor.datatables.net/generator
 */

// DataTables PHP library and database connection
include( "lib/DataTables.php" );

// Alias Editor classes so they are easy to use
use
	DataTables\Editor,
	DataTables\Editor\Field,
	DataTables\Editor\Format,
	DataTables\Editor\Mjoin,
	DataTables\Editor\Upload,
	DataTables\Editor\Validate;


// Build our Editor instance and process the data coming from _POST
Editor::inst( $db, 'filminfo', 'idx' )
	->fields(
		Field::inst( 'titel' )->validator( 'Validate::notEmpty' ),
		Field::inst( 'MovieNo' ),
		Field::inst( 'DCP_loaded_date' )
			->validator( 'Validate::dateFormat', array( 'format'=>'d-m-y' ) )
			->getFormatter( 'Format::date_sql_to_format', 'd-m-y' )
			->setFormatter( 'Format::date_format_to_sql', 'd-m-y' ),
		Field::inst( 'DCP_loaded_name' ),
		Field::inst( 'Key_loaded_date' )
			->validator( 'Validate::dateFormat', array( 'format'=>'d-m-y' ) )
			->getFormatter( 'Format::date_sql_to_format', 'd-m-y' )
			->setFormatter( 'Format::date_format_to_sql', 'd-m-y' ),
		Field::inst( 'Key_loaded_name' ),
		Field::inst( 'Movie_build_date' )
			->validator( 'Validate::dateFormat', array( 'format'=>'d-m-y' ) )
			->getFormatter( 'Format::date_sql_to_format', 'd-m-y' )
			->setFormatter( 'Format::date_format_to_sql', 'd-m-y' ),
		Field::inst( 'Movie_build_name' ),
		Field::inst( 'Start_verified_date' )
			->validator( 'Validate::dateFormat', array( 'format'=>'d-m-y' ) )
			->getFormatter( 'Format::date_sql_to_format', 'd-m-y' )
			->setFormatter( 'Format::date_format_to_sql', 'd-m-y' ),
		Field::inst( 'Start_verified_name' ),
		Field::inst( 'DCP_sent_date' )
			->validator( 'Validate::dateFormat', array( 'format'=>'d-m-y' ) )
			->getFormatter( 'Format::date_sql_to_format', 'd-m-y' )
			->setFormatter( 'Format::date_format_to_sql', 'd-m-y' ),
		Field::inst( 'DCP_sent_name' ),
		Field::inst( 'note' )
	)
	->process( $_POST )
	->json();
