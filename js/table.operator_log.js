/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


(function($){

$(document).ready(function() {
	var editor = new $.fn.dataTable.Editor( {
		"ajax": 
                        {
                          url:  "php/table.operator_log.php",
                          data: {
                              "data[dato]":  function () { return  new Date().toISOString(); } 
                          }
                        },
		"table": "#operator_log",
		"fields": [
			{
				"label": "Emne",
				"name": "subject"
			},
			{
				"label": "Tekst",
				"name": "text"
			}
		],
        i18n: {
            create: {
                button: "Ny",
                title:  "Ny Log",
                submit: "Gem"
            },
            edit: {
                button: "Rediger",
                title:  "Rediger",
                submit: "Gem"
            },
            remove: {
                button: "Slet",
                title:  "slet",
                submit: "Slet",
                confirm: {
                    _: "Er du HELT sikker?, kan ikke fortrydes",
                    1: "Er du HELT sikker ?, kan ikke fortrydes"
                }
            }
        }
    } );

	$('#operator_log').DataTable( {
              "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.7/i18n/Danish.json"
            },

		"dom": "Tfrtip",
		"ajax": "php/table.operator_log.php",
		"columns": [
			{
				"data": "dato"
			},
			{
				"data": "subject"
			},
			{
				"data": "text"
			}
		],
		"tableTools": {
			"sRowSelect": "os",
			"aButtons": [
				{ "sExtends": "editor_create", "editor": editor },
				{ "sExtends": "editor_edit",   "editor": editor },
				{ "sExtends": "editor_remove", "editor": editor }
			]
		}
	} );
} );

}(jQuery));
