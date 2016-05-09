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
        <link href="css/jquery.contextmenu.css" rel="stylesheet" type="text/css"/>
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
        <script src="js/datepicker-da.js" type="text/javascript"></script>
        <script src="js/jquery.contextmenu.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="container">
            <div class="no-print">
                <h1>
                    Kosmorama's Vagtplan
                </h1> 

                Kun cafevagt 1 & 2, operatør 1 & 2 samt note felter kan ændres,
                Klik på det du felt du vil ændre, skriv/ret hvad du skal, gem med Enter.

                <p> farvekoder :<p><span class="green_strip">"grøn" ekstra vagt  &nbsp;</span>-
                <span class="dato_present">Dags dato &nbsp;</span>-    
                    <span class="alle_vagter_mangler"> alle vagter mangler &nbsp; </span>-
                    <span class="op_vagter_mangler"> operatør vagter mangler&nbsp;</span>-
                    <span class="cafe_vagter_mangler"> café vagter mangler&nbsp;</span>-
                    <span class="odd even"> fuldt bemandet</span>-
                    <button onclick="print(true);"> Udskriv</button>
                    <button onclick='logout();'>Log ud </button>
                    <input type="button" value="Hjælpe videoer" onclick="window.open('guides.php')" />
                <p>År : <select id="yearselect"></select>
                    &nbsp;&nbsp; Vis kun AA: <input type="checkbox" id="AA_only" />
                    <?php
                    if ($_SESSION['is_admin'])
                   {
		
                        echo "<button onclick=\"$('#make_edit').val('0');$( '#opret-dialog-form' ).dialog('open');\"> Opret</button>";
                        echo "<intput id='isadmin' type=hidden />";
                    }
                    ?>
                    



                <p> <a href = "filmbasen_menu.php"> tilbage</a> til menu
            </div>
            <div id = "searchbar"></div>

            <table cellpadding = "0" cellspacing = "0" class = "cell-border hover  compact nowrap" class = "display" id = "vagtplan" width = "100%">
                <thead>
                    <tr >
                        <th>Date</th>
                        <th>Dag</th>
                        <th>Dato</th>
                        <th>Kl</th>
                        <th>Titel</th>
                        <th>Cafevagt 1</th>
                        <th>Cafevagt 2</th>
                        <th>Operat&oslash;
                            r 1</th>
                        <th>Operat&oslash;
                            r 2</th>
                        <th >Solgt/bestilt</th>
                        <th >Ledige</th>
                        <th >AA</th>
                        <th>Note</th>
                    </tr>
                </thead>
            </table>

        </div>

        <div id = "update_stopped">
            Opdatering af Skærmbilledet er stoppet på grund af inavtivitet. Flyt musen eller rør en knap.
            Ved længere tids inaktivitet bliver du logget af
        </div>
        <div id = "dialog">


            <div id="opret-dialog-form" title="Opret event">
                
                <form>
                    <input type="hidden" id="make_edit">
                    <input type="hidden" id="row_id">
                    <fieldset>
                        <label for='opretdato'>Dato</label>
                        <input id='opretdato' required type="text" ><input id="dag" type="text" readonly>
                        <p>
                        <label for="name">Titel</label>
                        <select id='name' required>
                            <option>SkoleBio</option>
                            <option>Cafémøde</option>
                            <option>Operatørmøde</option>
                            <option>Stormøde</option>
                            <option>Særforestilling</option>
                            <option>Generalforsamling</option>

                        </select><p>
                        <label for='tid'>KL</label>
                        <input required id='tidh' min="00" value="20" max="24" type="number">:
                        <input required id='tidm' min="00" value="00" max="59" type="number"><p>
                            <label title="En KORT note" for="note">Kort Note</label>
                            <input id="note" type="textarea"  >
                        <!-- Allow form submission with keyboard without duplicating the dialog button -->
                        <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
                    </fieldset>
                </form>
            </div>

            <div id="Slet_Ebillet_dialog" title="Slet Event">
                <span>
                 
                    Dette arrangement er oprettet via BilletPro.<br>
                    Hvis det stadig findes i BilletPro, vil det 'genopstå' i vagtplanen-
                    ved næste update (inden for ca 15.min).<br>
                    Hvis det er slettet fra BilletPro forsvinder det helt.<br><br>
                    Vagter og note vil - i begge tilfælde - blive slettet og kan ikke genskabes .<br>
                    (<span id="slettitel"></span>)<br><br>
                                   
                    Er du sikker på at du vil slette dette fra vagtplanen? (kan ikke fortrydes)
                    
                </span>
                
            </div>
            <div id="Slet_NON_Ebillet_dialog" title="Slet Event">
                <span>
                 
                    Dette arrangement er ikke oprettet via BilletPro.<br>
                    (<span id="slet_non_titel"></span>)<br><br>
                                   
                    Er du sikker på at du vil slette dette fra vagtplanen? (kan ikke fortrydes)
                    
                </span>
                
            </div>

        </div>
    </body>




</html>

