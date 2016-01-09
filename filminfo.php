<?php

include('php/login/session.php');
?>
<!doctype html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />

        <title>Filminfo</title>
<link href="css/demo.css" rel="stylesheet" type="text/css"/>
<!--<link href="datatables.min.css" rel="stylesheet" type="text/css"/>-->
<link rel="stylesheet" type="text/css" href="jQueryUI-1.11.4/jquery-ui.min.css"/>
<!--<link href="DataTables-1.10.10/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>-->
<link rel="stylesheet" type="text/css" href="DataTables-1.10.10/css/dataTables.jqueryui.min.css"/>
<link rel="stylesheet" type="text/css" href="Buttons-1.1.0/css/buttons.jqueryui.min.css"/>
<link href="Buttons-1.1.0/css/buttons.dataTables.css" rel="stylesheet" type="text/css"/>
<!--<link rel="stylesheet" type="text/css" href="Editor-1.5.1/css/editor.jqueryui.min.css"/>-->
<link rel="stylesheet" type="text/css" href="FixedHeader-3.1.0/css/fixedHeader.jqueryui.min.css"/>
<link rel="stylesheet" type="text/css" href="Responsive-2.0.0/css/responsive.jqueryui.min.css"/>
<link rel="stylesheet" type="text/css" href="Scroller-1.4.0/css/scroller.jqueryui.min.css"/>
<link href="Editor-1.5.1/css/editor.dataTables.min.css" rel="stylesheet" type="text/css"/>
<link href="css/generator-base.css" rel="stylesheet" type="text/css"/>
<!--<link href="css/editor.dataTables.min.css" rel="stylesheet" type="text/css"/>-->

<script src="jQuery-2.1.4/jquery-2.1.4.js" type="text/javascript"></script>
<script src="datatables.js" type="text/javascript"></script>
<script src="DataTables-1.10.10/js/jquery.dataTables.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/select/1.1.0/js/dataTables.select.min.js" type="text/javascript"></script>
<script src="Buttons-1.1.0/js/dataTables.buttons.js" type="text/javascript"></script>
<script src="js/table.filminfo.js" type="text/javascript"></script>
<script src="Editor-1.5.1/js/dataTables.editor.min.js" type="text/javascript"></script>
</head>
<body class="dataTables">
    <div class="container">

        <h1>
            filminfo
        </h1>      
         <p><a href = "filmbasen_menu.php"> tilbage</a> til menu
         <p>

        <hr>
        <img id="helpbutton" src="images/question-button.png" alt="HELP" />  hjælp<br>
        Åben ikke hjælp hver gang<input id="help_remember" type="checkbox">

     
            
        <table cellpadding="0" cellspacing="0" border="0" class="display cell-border compact" id="filminfo" width="100%">
            <thead>
                <tr>
                    <th>X</th>
                    <th>titel</th>
                    <th>movieno</th>
                    <th>DCP indlæst</th>
                    <th>DCP indlæst navn</th>
                    <th>Nøgle indlæst</th>
                    <th>Nøgle indlæst navn</th>
                    <th>Film bygget</th>
                    <th>Film bygget navn</th>
                    <th>Start gennemset</th>
                    <th>Start checket navn</th>
                    <th>DCP sendt</th>
                    <th>DCP sendt navn</th>
                    <th>Note</th>
                </tr>
            </thead>
        </table>

        <div id="help_dialog">
            <ul>
                <li>Denne boks kan du flytte rundt på skærmen, eller lukke (X i hjørnet)</li>
                <li>Den kan åbnes igen ved at trykke på hjælp <img src="images/question-button.png" alt="help"/></li>
                <li></li>
                <li>Alle arrangementer  oprettes automatisk når de er sat til salg i BilletPro</li>
                <li>Arrangementer som ikke er til salg (SkoleBio etc) skal oprettes manuelt.('Ny' knappen)</li>
                <li>Klik på et felt for at opdatere dato og navn</li>
                <li>titlen kan ikke ændres den bestemmes når filmen oprettes.</li>
                <li>Brug  <img src="../images/calender.png" alt="Kalender"/> for at åbne en kalender.<br></li>
                <li>Hvis du vil bruge en af knapperne (Rediger/Slet)så vælg en linje ved at klikke i venstre kolonne.</li>
                <li>Noter skal være korte 2-3 ord, lange noter skal i loggen.</li>
                <li>Slet film når de ikke længere er relevante for os  (evt. når de slettes fra serveren).</li>
            </ul>
        </div>
            
    </div>
</body>
</html>
