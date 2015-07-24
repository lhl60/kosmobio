<?php

/**
 * Description of db
 *
 * @author lars
 */

class db
{

    private $dbh;

    public function connect()
    {
        $local = FALSE;

        try
        {
            if ($local)
            {
                $host = "localhost";
                $user = "mdbuser1034670";
                $pasw = "ccbzm6ad";
                $database = "filmbasen";
                $this->dbh = new PDO("mysql:host=$host;dbname=$database"/* ;charset=utf8_general_ci" */, $user, $pasw, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET utf8"));
            } else
            {
                $host = "kosmobio.dk.mysql";
                $user = "kosmobio_dk";
                $pasw = "52sJectJ";
                $database = "kosmobio_dk";
                $this->dbh = new PDO("mysql:host=$host;dbname=$database"/* ;charset=utf8_general_ci" */, $user, $pasw, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET utf8"));
            }
        } catch (Exception $e)
        {
            echo "connect fail :" . $e->getMessage();
        }
    }

    public function add_event($e, $movie)
    {
        require_once  './movie.php';

    require_once    './event.php';


// update vagtplan
        $dt = new DateTime($e->DateTime);
        $min = $dt->format("i");
        $hour = $dt->format("H");
        $dato = $dt->format("y/n/j");
        $dag = $dt->format("D");

//if this is the main event (time  18:30 <-> 21)
        $showtime = strtotime($hour . $min);
        $main_early = strtotime("1830");
        $main_late = strtotime("2100");
        if ($showtime >= $main_early && $showtime <= $main_late)
        {
// it is the main event
// do we have an empty record for the main event
            $stmt = "select * from vagtplan where Dato= '" . $dato . "' and Tid='00:00:00'";
            $q = $this->dbh->prepare($stmt);
            $q->execute();
            if ($q->rowCount() != 0)
            {
// we had an empty record update the time
                $updatestmt = "UPDATE vagtplan SET " .
                        " Tid='" . $hour . ':' . $min . "'" .
                        " Where  Dato = '" . $dato . "' and Tid = '00:00:00';";
                $q = $this->dbh->prepare($updatestmt);
                $ret = $q->execute();
            }
        }
        $aa = $e->AA ? 1 : 0;
        //echo "e->DATETIME: $e->DateTime  h:m $hour : $min <br>";

        $stmt = "insert into vagtplan (event_id,Dato,Tid,AA,Titel,Ledige,ugedag,movieNo,poster,Date) VALUES ( " .
                "'" . $e->EB_eventID . "'," .
                "'" . $dt->format("y/n/j") . "'," .
                "'" . $hour . ':' . $min . "'," .
                "'" . $aa . "'," .
                "'" . $movie->Title . "'," .
                "'" . $e->FreeSeats . "'," .
                "'" . $e->ugedag . "'," .
                "'" . $movie->posterPath . "'," .
                "'" . $e->EB_movieID . "'," .
                "'" . $e->DateTime . "')" .
                "ON DUPLICATE KEY UPDATE" .
                " event_id='" . $e->EB_eventID . "'," .
                " Dato='" . $dt->format("y/n/j") . "'," .
                " Tid='" . $hour . ':' . $min . "'," .
                " AA='" . $aa . "'," .
                " Titel='" . $movie->Title . "'," .
                " Ledige='" . $e->FreeSeats . "'," .
                " ugedag='" . $e->ugedag . "'," .
                " Date='" . $e->DateTime . "'," .
                " movieNo='" . $e->EB_movieID . "'," .
                " poster='" . $movie->posterPath . "'";

//echo  $stmt ."<p>";
        $q = $this->dbh->prepare($stmt);
        $ret = $q->execute();
    }

    public function Log($comment)
    {
        $stmt = "insert into Cronlog (Dato,Comment) VALUES ( " .
                "now(), '" . $comment . "')";

        $q = $this->dbh->prepare($stmt);
        $ret = $q->execute();

        $err = $this->dbh->errorInfo();
    }

    public function get_future_shows()
    {
        $stmt = "select distinct  Titel as titel, movieNo as movieNo, poster, AA  from vagtplan where dato >= NOW() AND Titel!='' and event_id!='' order by dato;";

        $q = $this->dbh->prepare($stmt);
        $q->execute();
        $ret = $q->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($ret);
    }

    public function __construct()
    {
        $this->connect();

        $stmt = "SET lc_time_names = 'da_DK'";
        $q = $this->dbh->prepare($stmt);
        $ret = $q->execute();
    }

    public function add_empty_months($numberofmonths)
    {


        $stmt = "call create_foo($numberofmonths);insert ignore into vagtplan (Date,Tid,Dato) SELECT d,'0:0:0',d FROM vagtplan A RIGHT JOIN foo B ON A.Dato = B.d WHERE A.Dato IS NULL;";

        $q = $this->dbh->prepare($stmt);
        $ret = $q->execute();
        echo $ret;
    }

    public function add_duty_event($e)
    {
        $updatestmt = "UPDATE vagtplan SET " .
                " Tid='" . $e->hour . ':' . $e->min . "'," .
                "Cafe1='" .$e->Cafe1 ."',".
                "Cafe2='" .$e->Cafe2 ."',".
                "Operator1='" .$e->OP1 ."',".
                "Operator2='" .$e->OP2 ."'".
                " Where  Dato = '" . $e->dato . "' and Tid = '$e->hour:$e->min:00';";
        $q = $this->dbh->prepare($updatestmt);
        $ret = $q->execute();
    }

    public function Login($username,$password)
    {
        $stmt = "select COUNT(*) from login where password='$password' AND username='$username'";
        $res= $this->dbh->prepare($stmt);
        $res->execute();
        $a= $res->fetchColumn();
        return $a;
    }
    
    public function validate_login($username)
    {
        $stmt = "select COUNT(username) from login where username='$username'";
        $q = $this->dbh->prepare($stmt);
        $q->execute();
        
        $a= $q->fetchColumn();
        return $a;
    }
}

$database = new db();
