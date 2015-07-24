
/*
 * Editor client script for DB table vagtplan
 * Created by http://editor.datatables.net/generator
 */


var mlist = ["Januar", "Februar", "Marts", "April", "Maj", "Juni", "Juli", "August", "September", "Oktober", "November", "December"];
var _monthsSearch = '';
var _yearsearch = "";
var weekday = ["Søndag", "Mandag", "Tirsdag", "Onsdag", "Torsdag", "Fredag", "Lørdag"];
var reloadtimer = 0;
var refresh_interval = 15000;
var timedout = false;


$.fn.dataTable.ext.search.push(function (settings, searchData) {
    if (!_monthsSearch) {
        return true;
    }

    if (searchData[13] === _monthsSearch) {
        return true;
    }

    return false;
});

$.fn.dataTable.ext.search.push(function (settings, searchData) {

    if (searchData[14] == _yearsearch) {
        return true;
    }

    return false;
});


function add_year_to_selectlist(y)
{
    if ($("#yearselect option[value='" + y + "']").length == 0)
    {
        $("#yearselect").append($('<option/>', {
            value: y,
            text: y
        }));
    }
}

function logout()
{
    window.location="php/login/logout.php";
}

var inactivityTime = function () {
    var timeout;
    var t_logout;
    window.onload = resetTimer;
    document.onmousemove = resetTimer;
    document.onkeypress = resetTimer;

    

    function resetTimer() {
        clearTimeout(timeout);
        clearTimeout(t_logout);
        timeout= setTimeout(stop_page_reload, refresh_interval * 2);
        t_logout = setTimeout(logout, refresh_interval * 7);
        if (timedout)
        {
            start_page_reloadtimer();
            reload_page();
        }
        
        // 1000 milisec = 1 sec
    }
};


function reload_page()
{
    VPTable.ajax.reload();
}

function stop_page_reload()
{
    timedout = true;
    $("#update_stopped").dialog("open");
    clearInterval(reloadtimer);
}


function start_page_reloadtimer()
{
    if (!timedout)
    {
       inactivityTime();
    }
    timedout = false;
    $("#update_stopped").dialog("close");

    reloadtimer = setInterval(reload_page, refresh_interval);
}
(function ($) {


    $(document).ready(function () {

        $("#update_stopped").dialog({
        autoOpen: false,
        modal:true,
         buttons: {
        Ok: function() {
                    reload_page();
                    start_page_reloadtimer();
            $( this ).dialog( "close" );
            }
        }
        });    
            start_page_reloadtimer();

                $.fn.dataTable.moment('e D/M H:mm');
        var editor = new $.fn.dataTable.Editor({
            "ajax": {
                "url": "php/table.vagtplan.php",
                "type": "POST"
            },
            "table": "#vagtplan",
            "fields": [
                {
                    "label": "Cafevagt 1",
                    "name": "cafe1"
                },
                {
                    "label": "Cafevagt 2",
                    "name": "Cafe2"
                },
                {
                    "label": "Operat 1",
                    "name": "Operator1"
                },
                {
                    "label": "Operat 2",
                    "name": "Operator2"
                },
                {
                    "label": "Note",
                    "name": "Note",
                    "type": "textarea"
                }

            ]
        });
        $('#vagtplan').on('click', 'tbody td:not(:first-child)', function (e) {
            editor.inline(this, {
                submitOnBlur: true
            });
        });
        VPTable = $('#vagtplan').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.7/i18n/Danish.json"
            },
            "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull)
            {
                $(nRow.cells[0]).removeClass("alle_vagter_mangler");
                $(nRow.cells[0]).removeClass("op_vagter_mangler");
                $(nRow.cells[0]).removeClass("cafe_vagter_mangler");
                $(nRow.cells[1]).removeClass("alle_vagter_mangler");
                $(nRow.cells[1]).removeClass("op_vagter_mangler");
                $(nRow.cells[1]).removeClass("cafe_vagter_mangler");
                $(nRow.cells[2]).removeClass("alle_vagter_mangler");
                $(nRow.cells[2]).removeClass("op_vagter_mangler");
                $(nRow.cells[2]).removeClass("cafe_vagter_mangler");
                if (!aData["AA"] || aData["AA"] === "0")
                {
                    if (!aData["cafe1"] & !aData["Cafe2"] & !aData["Operator1"] & !aData["Operator2"])
                    {
                        $(nRow.cells[0]).addClass("alle_vagter_mangler")
                        $(nRow.cells[1]).addClass("alle_vagter_mangler")
                        $(nRow.cells[2]).addClass("alle_vagter_mangler")
                    }
                    else
                    {

                        if (!aData["Operator1"] & !aData["Operator2"])
                        {
                            $(nRow.cells[0]).addClass("op_vagter_mangler")
                            $(nRow.cells[1]).addClass("op_vagter_mangler")
                            $(nRow.cells[2]).addClass("op_vagter_mangler")
                        }
                        else
                        {
                            if (!aData["cafe1"] & !aData["Cafe2"])
                            {
                                $(nRow.cells[0]).addClass("cafe_vagter_mangler")
                                $(nRow.cells[1]).addClass("cafe_vagter_mangler")
                                $(nRow.cells[2]).addClass("cafe_vagter_mangler")
                            }
                        }
                    }
                }

                var x = new Date(aData["Dato"]);
                var today = new Date();
                if (x.toDateString() === today.toDateString())
                {
                    $(nRow).addClass("dato_present");
                }
                else
                {
                    if (x < today)
                    {
                        $(nRow).addClass("dato_past");
                    }
                    if (x > today)
                    {
                        $(nRow).addClass("dato_future");
                    }
                }

            },
            //"lengthMenu": [[-1, 30, 50], ["Alle", 30, 50]],

            "dom": '<"top"f>rt<"bottom"><"clear">',
            "processing": true,
//            "bServerSide": true,
//            "ajax":{
//                "url":"php/vagtplan_server_side.php",
//                "type": "POST"
//            },

            "bSearchable": false,
            "bPaginate": false,
            "autoWidth": true,
            //  "scrollY":        "600px",
            "scrollCollapse": true,
            "aoColumnDefs": [
                {"sTitle": "Date", "aTargets": [0], "data": "Date", "sType": "date", "iDataSort": 0, "bSortable": false, "visible": false,
                    "render": function (data, type, full, meta)
                    {
                        var t = data.split(/[- :]/);

                        var d = new Date(t[0], t[1] - 1, t[2], t[3], t[4], t[5]);
                        return d;
                    }
                },
                {"sTitle": "ugedag", "aTargets": [1], "data": 'ugedag', "bSortable": false,
                    "render": function (data, type, full, meta)
                    {
                        var x = new Date(full.Dato);
                        return weekday[x.getDay()];
                    }
                },
                {"sTitle": "Dato", "aTargets": [2], "bSortable": false,
                    "render": function (data, type, full, meta)
                    {
                        var options = {day: "2-digit", month: "2-digit"};
                        var x = new Date(full.Dato);
                        return x.toLocaleDateString('da-DK', options);
                    }
                },
                {"sTitle": "Tid", "aTargets": [3], "data": "Tid", "bSortable": false},
                {"sTitle": "Titel", "aTargets": [4], "data": "Titel", "bSortable": false,
                    "render": function (data, type, full, meta)
                    {
                        if (!data)
                            return data;
                        if (data.length > 22)
                        {
                            return data.substring(0, 20) + "...";
                        }
                        else
                            return data;
                    }},
                {"sTitle": "Cafe 1", "aTargets": [5], "data": "cafe1", "bSortable": false,
                    "render": function (data, type, full, meta)
                    {
                        if (full.AA === "1" & data === "")
                        {
                            return "-";
                        }
                        else
                            return data;
                    }
                },
                {"sTitle": "Cafe 2", "aTargets": [6], "data": "Cafe2", "bSortable": false},
                {"sTitle": "Op 1", "aTargets": [7], "data": "Operator1", "bSortable": false,
                    "render": function (data, type, full, meta)
                    {
                        if (full.AA === "1")
                        {
                            return "-";
                        }
                        else
                            return data;
                    }
                },
                {"sTitle": "Op 2", "aTargets": [8], "data": "Operator2", "bSortable": false},
                {"sTitle": "Solgt", "aTargets": [9], "bSortable": false,
                    "render": function (data, type, full, meta)
                    {
                        if (!full.Ledige)
                        {
                            return 0;
                        }
                        var capacity = 78;
                        if (full.AA === "1")
                        {
                            capacity = 110;
                        }
                        var x = capacity - full.Ledige;
                        if (x < 0)
                        {
                            x = 125 - full.Ledige;
                        }
                        return x;
                    }
                },
                {"sTitle": "Ledige", "aTargets": [10], "data": "Ledige", "bSortable": false,
                    "render": function (data, type, full, meta)
                    {
                        if (!data)
                        {
                            return "93";
                        }
                        if (full.AA === "1")
                        {
                            return  data;
                        }
                        var x = 15 + parseInt(data);
                        return x;
                    }
                },
                {"sTitle": "AA", "aTargets": [11], "data": "AA", "bSortable": false,
                    "render": function (data, type, full)
                    {
                        if (data === "1")
                        {
                            return 'JA';
                        }
                        return 'NEJ';
                    }
                },
                {"sTitle": "Note", "aTargets": [12], "data": "Note", "bSortable": false},
                {"sTitle": "Maaned", "aTargets": [13], "bSortable": false, "visible": false,
                    "render": function (data, type, full)
                    {
                        var x = new Date(full.Dato);
                        return mlist[x.getMonth()];


                    }},
                {"sTitle": "Aar", "aTargets": [14], "bSortable": false, "visible": false,
                    "render": function (data, type, full)
                    {
                        var x = new Date(full.Dato);
                        var y = x.getFullYear();
                        add_year_to_selectlist(y);
                        return y;


                    }}

            ],
            "ajax": "php/table.vagtplan.php",
            "tableTools": {
                "sRowSelect": "os",
                "aButtons": [
                ]
            }
        });

        VPTable.$('th').tooltip({
            "delay": 0,
            "track": true,
            "fade": 250
        });



        months = $('<div class="months"/>').append('Måned: ');

        $('<span class="push_button" />')
                .data('letter', '')
                .html('Alle')
                .appendTo(months);


        var d = new Date();
        _monthsSearch = mlist[d.getMonth()];
        _yearsearch = d.getFullYear();

        for (var i = 0; i < mlist.length; i++) {
            var m = mlist[i];
            if (m !== _monthsSearch)
            {
                $("<span class='push_button'  />")
                        .data('letter', m)
                        .html(m)
                        .appendTo(months);
            }
            else
            {
                $("<span class='active push_button' />")
                        .data('letter', m)
                        .html(m)
                        .appendTo(months);
            }
        }

        $("#searchbar").append(months);


        $("#yearselect").change(function () {
            _yearsearch = $("#yearselect option:selected").text();
            VPTable.draw();
        });

        months.on('click', 'span', function () {
            months.find('.active').removeClass('active');
            $(this).addClass('active');

            _monthsSearch = $(this).data('letter');
            $("input[type='search']").val("");
            VPTable.search("");
            VPTable.draw();
        });

    });
}(jQuery));

 