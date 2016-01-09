
/*
 * Editor client script for DB table filminfo
 * Created by http://editor.datatables.net/generator
 */

var editor;
var filminfotable;
var help_dialog;
function hover_over_daterow(row)
{
    var i = $(row).index() - 1; // my index-1 = my tuple 
    $("#currentfield").empty();

    var keys = Object.keys(editor.get());
    var mycontent = editor.get(keys[i * 2]);
    var myhidden_neighbour = editor.get(keys[2 * i + 1]);
    var titel = editor.field(keys[2 * i]).s.opts.label;
    $("#currentfield").append(i + " " + titel + "  dato:" + mycontent + "  navn:" + myhidden_neighbour);

}

(function ($) {
    $.datepicker.setDefaults({
        dayNamesMin: ['Sø', 'Ma', 'Ti', 'On', 'To', 'Fr', 'Lø'],
        monthNames: ['Januar', 'Februar', 'Marts', 'April', 'Maj', 'Juni', 'Juli', 'August', 'September', 'Oktober', 'November', 'December']
    });

    $(document).ready(function () {
        editor = new $.fn.dataTable.Editor({
            ajax: 'php/table.filminfo.php',
            display: 'envelope',
            table: '#filminfo',
            i18n: {
                create: {
                    button: "Ny",
                    title: "Opret nyt film (til skolebio ol.)",
                    submit: "Opret"
                },
                edit: {
                    button: "Rediger",
                    title: "Rediger film info",
                    submit: "Gem"
                },
                remove: {
                    button: "Slet",
                    title: "Slet linie",
                    submit: "Slet",
                    confirm: {
                        _: "Er du sikker på at du vil slette %d linier? ",
                        1: "Er du sikker på at du vil slette 1 linie <br>Alle Datoer og navne går tabt og kan ikke genskabes"
                    }
                }
            },
            fields: [
                {
                    "label": "titel",
                    "name": "titel",
                },
                {
                    "label": "movieno",
                    "name": "MovieNo",
                    "type": "hidden"
                },
                {
                    "label": "DCP indl\u00e6st",
                    "name": "DCP_loaded_date",
                    "type": "date",
                    "dateImage": "../images/calender.png",
                    dateFormat: "dd-mm-y",
                    opts: {
                        showOn: "button"
                    },
                    def: function () {
                        return "";
                    }
                },
                {
                    "label": "Navn",
                    "name": "DCP_loaded_name"
                },
                {
                    "label": "N\u00f8gle indl\u00e6st",
                    "name": "Key_loaded_date",
                    "type": "date",
                    "dateImage": "../images/calender.png",
                    dateFormat: "dd-mm-y",
                    def: function () {
                        return "";
                    }, opts: {
                        showOn: "button"
                    },
                },
                {
                    "label": "Navn",
                    "name": "Key_loaded_name"
                },
                {
                    "label": "Film bygget",
                    "name": "Movie_build_date",
                    "type": "date",
                    "dateImage": "images/calender.png",
                    dateFormat: "dd-mm-y",
                    opts: {
                        showOn: "button"
                    },
                    def: function () {
                        return "";
                    }

                },
                {
                    "label": "Navn",
                    "name": "Movie_build_name"
                },
                {
                    "label": "Start Gennemset",
                    "name": "Start_verified_date",
                    "type": "date",
                    "dateImage": "../images/calender.png",
                    dateFormat: "dd-mm-y",
                    def: function () {
                        return "";
                    },
                    opts: {
                        showOn: "button"
                    }

                },
                {
                    "label": "Navn",
                    "name": "Start_verified_name"
                },
                {
                    "label": "DCP sendt",
                    "name": "DCP_sent_date",
                    "type": "date",
                    dateFormat: "dd-mm-y",
                    "dateImage": "../images/calender.png",
                    def: function () {
                        return "";
                    },
                    opts: {
                        showOn: "button"
                    }


                },
                {
                    "label": "Navn",
                    "name": "DCP_sent_name"
                },
                {
                    "label": "Note",
                    "name": "note"
                }
            ]
        });




        editor.on('onInitCreate', function (e) {
            editor.message("Opret kun film som IKKE bliver sat til salg i BilletPro, ");
            editor.enable('titel');
            editor.buttons(true);
        });

        editor.on('onInitEdit', function (e) {
            editor.disable('titel');
        });

        editor.on('onInitRemove', function () {

        });

        $('#filminfo').on('mouseover', 'td.hovershow', function(){
                   
                    hover_over_daterow(this);
        }
        );




        $('#filminfo').on('click', 'tbody td:not(:first-child)', function (e) {
            var cellData = filminfotable.cell(this).data();
            editor.disable('titel');
            editor.bubble(this);
        });

        filminfotable = $('#filminfo').DataTable({
            "language": {'url':
                        "https://cdn.datatables.net/plug-ins/1.10.10/i18n/Danish.json"
            },
            "ordering": false,
            "scrollY": "600px",
            "scrollCollapse": true,
            "paging": false,
            dom: 'Bfrtip',
            ajax: 'php/table.filminfo.php',
            "columnDefs": [
                {
                    className: "hovershow", "targets": [3, 5, 7, 9, 11]
                }
            ],
            columns: [
                {
                    data: null,
                    defaultContent: '',
                    className: 'select-checkbox',
                    orderable: false

                },
                {
                    "data": "titel"
                },
                {
                    "data": "MovieNo",
                    visible: false
                },
                {
                    "data": "DCP_loaded_date",
                    editField: ["DCP_loaded_date", "DCP_loaded_name"],
                    classname: "hoverfield"
                },
                {
                    "data": "DCP_loaded_name",
                    visible: false

                },
                {
                    "data": "Key_loaded_date",
                    editField: ["Key_loaded_date", "Key_loaded_name"]

                },
                {
                    "data": "Key_loaded_name",
                    visible: false

                },
                {
                    "data": "Movie_build_date",
                    editField: ["Movie_build_date", "Movie_build_name"]

                },
                {
                    "data": "Movie_build_name",
                    visible: false

                },
                {
                    "data": "Start_verified_date",
                    editField: ["Start_verified_date", "Start_verified_name"]

                },
                {
                    "data": "Start_verified_name",
                    visible: false

                },
                {
                    "data": "DCP_sent_date",
                    editField: ["DCP_sent_date", "DCP_sent_name"]

                },
                {
                    "data": "DCP_sent_name",
                    visible: false

                },
                {
                    "data": "note",
                    type: "textarea"

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



        help_dialog = $("#help_dialog").dialog({
            title: 'Hjælp',
            height: "auto",
            width: "auto",
            autoOpen: false
        });

        $('#helpbutton').on('click', function (e) {
            $(help_dialog).dialog("open");
        });

        $('#help_remember').on('click', function (e) {

            setCookie("help_remember", this.checked.toString(), 365);
        });

        if (getCookie("help_remember") === "true")
        {
            $('#help_remember').prop('checked', true);

        }
        else
        {
            $('#help_remember').prop('checked', false);
            $(help_dialog).dialog("open");

        }



    });
}(jQuery));

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ')
            c = c.substring(1);
        if (c.indexOf(name) == 0)
            return c.substring(name.length, c.length);
    }
    return "";
}