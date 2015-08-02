<?php
include('php/login/session.php');
?>

<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />

        <title>DataTables Editor - operator_log</title>

        <link rel="stylesheet" type="text/css" href="css/demo.css">
        <link rel="stylesheet" type="text/css" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.7/css/jquery.dataTables.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/tabletools/2.2.4/css/dataTables.tableTools.css">
        <link rel="stylesheet" type="text/css" href="css/dataTables.editor.css">

        <script type="text/javascript" charset="utf-8" src="https://code.jquery.com/jquery-1.11.2.js"></script>
        <script type="text/javascript" language="javascript" src="//code.jquery.com/ui/1.11.2/jquery-ui.min.js"></script>
        <script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/tabletools/2.2.4/js/dataTables.tableTools.min.js"></script>
        <script type="text/javascript" charset="utf-8" src="js/dataTables.editor.min.js"></script>
        <script type="text/javascript" charset="utf-8" src="js/table.operator_log.js"></script>
    </head>
    <body>
        <div class="container">
            <h1>
                DataTables Editor - operator_log
            </h1>

            <table cellpadding="0" cellspacing="0" border="0" class="display" id="operator_log" width="100%">
                <thead>
                    <tr>
                        <th>Dato</th>
                        <th>Emne</th>
                        <th>Tekst</th>
                    </tr>
                </thead>
            </table>

        </div>
    </body>
</html>f