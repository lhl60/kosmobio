<?php

require_once './movie.php';
require_once './event.php';

require_once './db.php';

require_once './da_time.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

$ret = setlocale(LC_COLLATE, "dk_DK");

//$EB_file = "http://www.ebillet.dk/system/export.asmx/GetEvents?nStartDate=0&nStartTime=0&nEndDate=0&nEndTime=0&nSystemNo=3&nOrgNo=201&nWebMovieNo=0";
$EB_file= "http://remote.lhlarsen.dk/eb.php";
try {
    //$str = file_get_contents($EB_file);
    $ixml =  new SimpleXMLIterator(file_get_contents($EB_file));
    //$ixml =  new SimpleXMLIterator($EB_file);
    //var_dump($ixml);
} catch (Exception $e) {
    
    echo "exception ". $e->getMessage();
    return;
}

//echo $str;
//var_dump($ixml);
$all_events = array();
$all_movies = array();
$all_locations= array();

$eventitem = $ixml->Events;
$movies = $ixml->Movies;
$dates = $ixml->Dates;
$prefs = $ixml->xpath("//Preferences/Paths/Path");
$locations=$ixml->Locations;
for ($locations->rewind(); $locations->valid(); $locations->next()) {
    foreach ($locations->getChildren() as $name => $e) {
         $attr = $e->attributes();
        $all_locations[(string) $attr["No"]] = (string) $e->Seats["TotalCount"];
    }
    }

$posterurl = (string) $prefs[0];







//echo "evnetItem: $ixml->Events<br>";
//var_dump($eventitem);


for ($eventitem->rewind(); $eventitem->valid(); $eventitem->next()) {
    foreach ($eventitem->getChildren() as $name => $e) {
        $event = new EBevent();
        $attr = $e->attributes();
        $location= $attr["LocationNo"];
        $event->Capacity=$all_locations[(string)$location];       
        $event->EB_eventID = $attr["No"];
        $event->EB_movieID = $attr["MovieNo"];
        $event->AA = false;

        if ($event->EB_movieID == 0) {
            $event->AA = true;
            $event->EB_movieID = $attr["SubjectNo"];
            $all_movies[(string) $event->EB_movieID] = add_subject_no($attr["SubjectNo"], $ixml);
        }
        $event->DateTime = $e->DateTime;
        $date = $dates->xpath("//Date[@No=" . $e['DateNo'] . "]");
        $event->ugedag = $date[0]->DayOfWeek;

        $dt = new DateTime($e->DateTime);
        $event->ugedag = get_week_day($dt);
        $event->dato = get_dato($dt);
//            $event->tid = get_hour_min($dt);
        $s = $e->Seats["FreeCount"];

        $event->FreeSeats = $s;
        
        $all_events[(string) $event->EB_eventID] = $event;
    }
}

for ($movies->rewind(); $movies->valid(); $movies->next()) {
    foreach ($movies->getChildren() as $name => $m) {
        $movie = new EBmovie();



        $attr = $m->attributes();
        $movie->EB_movieNo = $attr["No"];
        $movie->Title = $m->Name;
        $movie->Censur = $m->Censoring;
        $movie->length = $m->Length;

        $movie->posterPath = $posterurl . (string) $m->Path;
        $movie->IMDb = $m->IMDb;
        $movie->synops = $m->Synopsis;
        $all_movies[(string) $movie->EB_movieNo] = $movie;
    }
}



foreach ($all_events as $e) {
    echo "call add event";
    $database->add_event($e, $all_movies[(string) $e->EB_movieID]);
}


// now add movies to the film_info db

foreach ($all_movies as $m) {
    $database->add_info($m);
}



echo "OK";

function add_subject_no($SubjectNo, $ixml) {
    $query = "//Subjects/Subject[@No=" . (int) $SubjectNo . "]";
    $subject = $ixml->xpath($query);
    $pp = $ixml->xpath("//Preferences/Paths");
    $attr = $pp[0]->attributes();
    $posterpath = (string) $attr["Default"];

    // make a movie to this event
    $movie = new EBmovie();

    $movie->EB_movieNo = $SubjectNo;
    $movie->Title = (string) $subject[0]->Name;
    $movie->Censur = "";
    $movie->length = "";

    $movie->posterPath = $posterpath . (string) $subject[0]->Path;
    return $movie;
}

;
?>
