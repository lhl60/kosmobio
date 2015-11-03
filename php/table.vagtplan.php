<?php

/*
 * Editor server script for DB table vagtplan
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
Editor::inst( $db, 'vagtplan', 'idx' )
	->fields(
                Field::inst('Date'),
			Field::inst( 'ugedag' )
			->set( false ),

		Field::inst( 'Dato' )
			->set( false )
/*			->validator( 'Validate::dateFormat', array( 'format'=>'d M' ) )
			->getFormatter( 'Format::date_sql_to_format', 'm/d/Y' )
			->setFormatter( 'Format::date_format_to_sql', 'd M' )*/,
		Field::inst( 'Tid' )
			->set( false ),
		Field::inst( 'Titel' )
			->set( false ),
		Field::inst( 'cafe1' ),
		Field::inst( 'Cafe2' ),
		Field::inst( 'Operator1' ),
		Field::inst( 'Operator2' ),
                Field::inst( 'Note' ),
		Field::inst( 'AA' )
			->set( false ),
		Field::inst( 'Ledige' )
			->set( false ),
                Field::inst( 'event_id' )
			->set( false ),
                Field::inst("ordinary")
                ->set( false),
                Field::inst("capacity")
                ->set( false)

	)
	->process( $_POST )
	->json();
