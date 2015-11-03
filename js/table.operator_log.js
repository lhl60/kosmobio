


var table;
var editor;

function logout()
{
    window.location = "php/login/logout.php";
}


(function ($, DataTable) {


    if (!DataTable.ext.editorFields) {
        DataTable.ext.editorFields = {};
    }

    var Editor = DataTable.Editor;
    var _fieldTypes = Editor ?
            Editor.fieldTypes :
            DataTable.ext.editorFields;


    _fieldTypes.ckeditor = {
        create: function (conf) {
            var that = this;
            var id = Editor.safeId(conf.id);

            conf._input = $('<div><textarea id="' + id + '"></textarea></div>');

            // CKEditor needs to be initialised on each open call
            this.on('onOpen.ckEditInit-' + id, function () {
                if ($('#' + id).length) {
                    conf._editor = CKEDITOR.replace(id);

                    if (conf._initSetVal) {
                        conf._editor.setData(conf._initSetVal);
                        conf._initSetVal = null;
                    }
                    else {
                        conf._editor.setData('');
                    }
                }
            });

            // And destroyed on each close, so it can be re-initialised on reopen
            this.on('onClose.ckEditInit-' + id, function () {
                if ($('#' + id).length) {
                    conf._editor.destroy();
                    conf._editor = null;
                }
            });

            return conf._input;
        },
        get: function (conf) {
            if (!conf._editor) {
                return conf._initSetVal;
            }

            return conf._editor.getData();
        },
        set: function (conf, val) {
            // If not ready, then store the value to use when the onOpen event fires
            if (!conf._editor) {
                conf._initSetVal = val;
                return;
            }
            conf._editor.setData(val);
        },
        enable: function (conf) {
        }, // not supported in CKEditor

        disable: function (conf) {
        } // not supported in CKEditor
    };


})(jQuery, jQuery.fn.dataTable);

// Helper function to get 'now' as an ISO date string
function isoDateString() {
    var d = new Date();
    var pad = function (n) {
        return n < 10 ? '0' + n : n
    }
//    return d.getUTCFullYear()+'-'
//        + pad(d.getUTCMonth()+1)+'-'
//        + pad(d.getUTCDate())
    return pad(d.getUTCDate()) + '-'
            + pad(d.getUTCMonth() + 1) + '-'
            + d.getUTCFullYear() + ' '
            + pad(d.getHours()) + ':'
            + pad(d.getMinutes());

}
;

/*
 * Editor client script for DB table operator_log
 * Created by http://editor.datatables.net/generator
 */

(function ($) {

    $(document).ready(function () {
        
          $('#operator_log').on('click', 'td.edit-control', function (e) {
              

        editor
            .title( 'Rediger' )
            .buttons( { "label": "Gem", "fn": function () { editor.submit() } } )
            .edit( $(this).closest('tr') );
         });
         
        
         $('#operator_log').on('mouseover', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );
 
        if ( row.child.isShown() ) {
            // This row is already open - close it
            $("#text_window").empty();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            $("#text_window").empty();

            $("#text_window").append(row.data().text)
            tr.addClass('shown');
        }
    } );
        
         editor = new $.fn.dataTable.Editor({
            ajax: 'php/table.operator_log.php',
            table: '#operator_log',
            i18n: {
                create: {
                    button: "Ny",
                    title: "Opret nyt log",
                    submit: "Opret"
                },
                edit: {
                    button: "Rediger",
                    title: "Rediger log",
                    submit: "Gem"
                },
                remove: {
                    button: "Slet",
                    title: "Slet linie",
                    submit: "Slet",
                    confirm: {
                        _: "Er du sikker på at du vil slette %d linier?",
                        1: "Er du sikker på at du vil slette 1 linie ?"
                    }
                }
            },
            fields: [
                {
                    "label": "Dato",
                    "name": "dato",
//                    "type": "date",
//                    "dateFormat": "d M y",
                    def: isoDateString
                },
                {
                    "label": "Navn",
                    "name": "author"
                },
                {
                    "label": "Emne",
                    "name": "subject"
                },
                {
                    "label": "Tekst",
                    "name": "text",
                    "type": "ckeditor"
                }
            ]
        });

         table = $('#operator_log').DataTable({
            "fnInitComplete": function (oSettings, json) {
                  table.page( 'last' ).draw('page');
            },
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.7/i18n/Danish.json"
            },
            dom: 'Bfrtip',
            ajax: 'php/table.operator_log.php',
            "ordering": false,
            "order": [1, 'asc'],
            columns: [     {
                "className":      'details-control',
                "orderable":      false,
                "data":           null,
                "defaultContent": ''
            },              
            {
                "className":      'edit-control',
                "orderable":      false,
                "data":           null,
                "defaultContent": ''
            },  
                {
                    "data": "dato"
                },
                {
                    "data": "subject"
                },
                {
                    "data": "author"
                },
                {
                    "data": "text",
                    visible:false
                }
            ],
            select: true,
            lengthChange: false,
            buttons: [
                {extend: 'create', editor: editor},
                {extend: 'edit', editor: editor},
                {extend: 'remove', editor: editor}
            ]
        });
    
    });



}(jQuery));

