<?php
include('php/login/session.php');
?>
<!doctype html>

<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		
		<title>Operatør_log</title>

		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/jqc-1.11.3,moment-2.10.6,ed-bsdate-4.15.35,dt-1.10.9,b-1.0.3,ef-bsdatetime-4.15.35,fh-3.0.0,se-1.0.1/datatables.min.css">
		<link rel="stylesheet" type="text/css" href="css/generator-base.css">
		<link rel="stylesheet" type="text/css" href="css/editor.dataTables.min.css">
                <link href="css/op_log.css" rel="stylesheet" type="text/css"/>
                
                 <script src="//cdn.ckeditor.com/4.5.3/basic/ckeditor.js"></script>
		<script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/r/dt/jqc-1.11.3,moment-2.10.6,ed-bsdate-4.15.35,dt-1.10.9,b-1.0.3,ef-bsdatetime-4.15.35,fh-3.0.0,se-1.0.1/datatables.min.js"></script>
		<script type="text/javascript" charset="utf-8" src="js/dataTables.editor.min.js"></script>
		<script type="text/javascript" charset="utf-8" src="js/table.operator_log.js"></script>
              
                 <script src="//code.jquery.com/jquery-1.10.2.js"></script>
                      <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  
                
	</head>
	<body class="dataTables">
		<div class="container">

			
                    <h1><span>operatør log</span></h1>
                                 <button onclick='logout();'>Log ud </button>
                                 <p><a href = "filmbasen_menu.php"> tilbage</a> til menu
                                 <p>

			
			<table cellpadding="0" cellspacing="0" border="0" class="display cell-border compact" id="operator_log" width="100%">
				<thead>
					<tr>
                                            <th></th>                                            
                                            <th></th>
						<th>Dato</th>
						<th>Emne</th>
						<th>Navn</th>
						<th>Tekst</th>
					</tr>
				</thead>
			</table>
                                 <span id ="text_window"></span>
		</div>
      
	</body>
</html>
