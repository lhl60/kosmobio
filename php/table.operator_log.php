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
	DataTables\Editor\Mjoin,
	DataTables\Editor\Upload,
	DataTables\Editor\Validate;


// Build our Editor instance and process the data coming from _POST
Editor::inst( $db, 'operator_log', 'idx' )
	->fields(
		Field::inst( 'dato' )
                         ->validator( 'Validate::notEmpty' )
			->validator( 'Validate::dateFormat', array( 'format'=>'d-m-Y H:i' ) ),
			//->getFormatter( 'Format::date_sql_to_format', 'd-m-Y H:i' )
			//->setFormatter( 'Format::date_format_to_sql', 'd-m-Y H:i' ),
		Field::inst( 'subject' )
                    ->validator( 'Validate::notEmpty' ),
		Field::inst( 'text' )
                    ->validator( 'Validate::notEmpty' ),
                Field::inst( 'author')
                ->validator( 'Validate::notEmpty' )
                )                
	->process( $_POST )
	->json();
