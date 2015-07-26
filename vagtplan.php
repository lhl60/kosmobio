<?php
include('php/login/session.php');
?>
<!doctype html>

<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />

        <title>KOSMORAMA's - vagtplan</title>

        <link rel="stylesheet" type="text/css" href="css/demo.css">
        <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
        <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
        <link rel="stylesheet" type="text/css" href="css/dataTables.tableTools.css">
         <link rel="stylesheet" type="text/css" href="css/dataTables.editor.css">
        <link href="css/vagtplan.css" rel="stylesheet" type="text/css"/>
        <link rel="icon" href="favicon.ico" type="image/vnd.microsoft.icon" />
        <script type="text/javascript" charset="utf-8" src="js/jquery-1.11.2.min.js"></script>
       <!-- <script src="js/jquery.scrollintoview.js" type="text/javascript"></script>-->
        <script type="text/javascript" language="javascript" src="js/jquery-ui.min.js"></script>
        <script type="text/javascript" charset="utf-8" src="js/jquery.dataTables.min.js"></script>
      <!--  <script type="text/javascript" charset="utf-8" src="//cdn.datatables.net/plug-ins/1.10.7/api/page.jumpToData().js"></script>-->
        <script type="text/javascript" charset="utf-8" src="js/dataTables.tableTools.min.js"></script>
        <script type="text/javascript" charset="utf-8" src="js/dataTables.editor.js"></script>
        <script type="text/javascript" charset="utf-8" src="js/moment.min.js"></script>
        <script type="text/javascript" charset="utf-8" src="js/datetime-moment.js"></script>
        <script type="text/javascript" charset="utf-8" src="js/table.vagtplan.js"></script>
    </head>
    <body>
        <div class="container">
            <h1>
                Kosmorama's Vagtplan
            </h1> 
            
            Kun cafevagt 1 & 2, operatør 1 & 2 samt note felter kan ændres,
            Klik på det du felt du vil ændre, skriv/ret hvad du skal, gem med Enter.
          
            <p> farvekoder :<p><span class="dato_present">I dag</span>-    
                <span class="alle_vagter_mangler"> alle vagter mangler &nbsp; </span>-
              <span class="op_vagter_mangler"> operatør vagter mangler&nbsp;</span>-
              <span class="cafe_vagter_mangler"> café vagter mangler&nbsp;</span>-
             <span class="odd even"> fuldt bemandet</span>-
             <button onclick="print(true);"> Udskriv</button>
             <input type="button" value="Hjælpe videoer" onclick="window.open('guides.php')" />
            <p>År : <select id="yearselect"></select>
                &nbsp;&nbsp; Vis kun AA: <input type="checkbox" id="AA_only" />
         
                    
            
             <p> <a href ="filmbasen_menu.php"> tilbage</a> til menu

             <div id="searchbar"></div>
            <table cellpadding="0" cellspacing="0" class="cell-border hover  compact nowrap" class="display" id="vagtplan" width="100%">
                <thead>
                    <tr>                    
                        <th>Date</th>
                        <th>Dag</th>
                        <th>Dato</th>
                        <th>Kl</th>
                        <th>Titel</th>
                        <th>Cafevagt 1</th>
                        <th>Cafevagt 2</th>
                        <th>Operat&oslash;r 1</th>
                        <th>Operat&oslash;r 2</th>
                        <th >Solgt/bestilt</th>
                        <th >Ledige</th>
                        <th >AA</th>
                        <th>Note</th>
                    </tr>
                </thead>
            </table>

        </div>
        
        <div id="update_stopped">
            Opdatering af Skærmbilledet er stoppet på grund af inavtivitet. Flyt musen eller rør en knap.
            Ved længere tids inaktivitet bliver du logget af
        </div>
    </body>
    
  
    
    
</html>

