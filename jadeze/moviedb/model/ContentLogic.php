<?php
require_once 'DataHandler.php';

class ContentLogic {

public function __construct() {
    //localhost, DB name, Username, password.
	$this->DataHandler = new Datahandler("localhost","moviedb" ,"root", "");
}

public function __destruct() {}



public function Welcome(){

}

public function read11(){
  $sql = "SELECT mov_title, MIN(mov_time), mov_dt_rel, dir_fname, dir_lname, act_fname, act_lname, role
          FROM movie
          NATURAL JOIN movie_direction
          NATURAL JOIN director
          NATURAL JOIN movie_cast
          NATURAL JOIN actor
          ;";
  $stmt = $this->DataHandler->readall($sql);
  return $stmt;
}

public function show11(){
  $arr = $this->read11();
  $html = "<div class='container'>";
        $html .= "<table class='table table-bordered'>";

        foreach($arr as $value)
        {
            $html .= '<thead class="thead-dark">';
            $html .= "<tr>";
            foreach ($value as $key => $value)
            {
                $html .= "<th>" . $key. "</th>";
            }
            $html .= "</tr>";
            $html .= '</thead>';
            break;
        }
        foreach($arr as $value)
        {
            $html .='<tbody class="tbody-light">';
            $html .= "<tr>";
            foreach ($value as $key => $value){
                $html .= "<td>" . $value. "</td>";
            }
            $html .= "</tr></tbody>";
        }
        $html .= "</table></div>";
        return $html;
}
//---------SQL 12------------------------
public function read12(){
  $sql = "SELECT mov_title, mov_dt_rel, rev_stars
          FROM movie
          NATURAL JOIN rating
          WHERE rev_stars IN (3, 4)
          ;";
  $stmt = $this->DataHandler->readall($sql);
  return $stmt;
}

public function show12(){
  $arr = $this->read12();
  $html = "<div class='container'>";
        $html .= "<table class='table table-bordered'>";

        foreach($arr as $value)
        {
            $html .= '<thead class="thead-dark">';
            $html .= "<tr>";
            foreach ($value as $key => $value)
            {
                $html .= "<th>" . $key. "</th>";
            }
            $html .= "</tr>";
            $html .= '</thead>';
            break;
        }
        foreach($arr as $value)
        {
            $html .='<tbody class="tbody-light">';
            $html .= "<tr>";
            foreach ($value as $key => $value){
                $html .= "<td>" . $value. "</td>";
            }
            $html .= "</tr></tbody>";
        }
        $html .= "</table></div>";
        return $html;
}
//---------SQL 13------------------------
public function read13(){
  $sql = "SELECT rev_name, mov_title, rev_stars
          FROM rating
          NATURAL JOIN movie
          NATURAL JOIN reviewer
          WHERE rev_name IS NOT NULL
          ORDER BY rev_name, mov_title, rev_stars
          ;";
  $stmt = $this->DataHandler->readall($sql);
  return $stmt;
}

public function show13(){
  $arr = $this->read13();
  $html = "<div class='container'>";
        $html .= "<table class='table table-bordered'>";

        foreach($arr as $value)
        {
            $html .= '<thead class="thead-dark">';
            $html .= "<tr>";
            foreach ($value as $key => $value)
            {
                $html .= "<th>" . $key. "</th>";
            }
            $html .= "</tr>";
            $html .= '</thead>';
            break;
        }
        foreach($arr as $value)
        {
            $html .='<tbody class="tbody-light">';
            $html .= "<tr>";
            foreach ($value as $key => $value){
                $html .= "<td>" . $value. "</td>";
            }
            $html .= "</tr></tbody>";
        }
        $html .= "</table></div>";
        return $html;
}
//---------SQL 14------------------------
public function read14(){
  $sql = "SELECT mov_title, MAX(rev_stars)
          FROM movie
          NATURAL JOIN rating
          GROUP BY mov_title
          HAVING MAX(rev_stars)>0
          ORDER BY mov_title;
          ;";
  $stmt = $this->DataHandler->readall($sql);
  return $stmt;
}

public function show14(){
  $arr = $this->read14();
  $html = "<div class='container'>";
        $html .= "<table class='table table-bordered'>";

        foreach($arr as $value)
        {
            $html .= '<thead class="thead-dark">';
            $html .= "<tr>";
            foreach ($value as $key => $value)
            {
                $html .= "<th>" . $key. "</th>";
            }
            $html .= "</tr>";
            $html .= '</thead>';
            break;
        }
        foreach($arr as $value)
        {
            $html .='<tbody class="tbody-light">';
            $html .= "<tr>";
            foreach ($value as $key => $value){
                $html .= "<td>" . $value. "</td>";
            }
            $html .= "</tr></tbody>";
        }
        $html .= "</table></div>";
        return $html;
}
//---------SQL 15------------------------
public function read15(){
  $sql = "SELECT dir_fname, dir_lname, mov_title, rev_stars
          FROM movie
          NATURAL JOIN director
          NATURAL JOIN movie_direction
          NATURAL JOIN rating
          WHERE rev_stars IS NOT NULL
          ;";
  $stmt = $this->DataHandler->readall($sql);
  return $stmt;
}

public function show15(){
  $arr = $this->read15();
  $html = "<div class='container table-responsive'>";
        $html .= "<table class='table table-bordered table-striped '>";

        foreach($arr as $value)
        {
            $html .= '<thead class="thead-dark">';
            $html .= "<tr>";
            foreach ($value as $key => $value)
            {
                $html .= "<th>" . $key. "</th>";
            }
            $html .= "</tr>";
            $html .= '</thead>';
            break;
        }
        foreach($arr as $value)
        {
            $html .='<tbody class="tbody-light">';
            $html .= "<tr>";
            foreach ($value as $key => $value){
                $html .= "<td>" . $value. "</td>";
            }
            $html .= "</tr></tbody>";
        }
        $html .= "</table></div>";
        return $html;
}
//---------SQL 16------------------------
public function read16(){
  $sql = "SELECT mov_title, act_fname, act_lname, role
          FROM movie
          NATURAL JOIN movie_cast
          NATURAL JOIN actor
          WHERE actor.act_id IN (SELECT act_id FROM movie_cast GROUP BY act_id HAVING COUNT(*)>=2)
          ;";
  $stmt = $this->DataHandler->readall($sql);
  return $stmt;
}

public function show16(){
  $arr = $this->read16();
  $html = "<div class='container'>";
        $html .= "<table class='table table-bordered table-striped'>";

        foreach($arr as $value)
        {
            $html .= '<thead class="thead-dark">';
            $html .= "<tr>";
            foreach ($value as $key => $value)
            {
                $html .= "<th>" . $key. "</th>";
            }
            $html .= "</tr>";
            $html .= '</thead>';
            break;
        }
        foreach($arr as $value)
        {
            $html .='<tbody class="tbody-light">';
            $html .= "<tr>";
            foreach ($value as $key => $value){
                $html .= "<td>" . $value. "</td>";
            }
            $html .= "</tr></tbody>";
        }
        $html .= "</table></div>";
        return $html;
}
//---------SQL 17------------------------
public function read17(){
  $sql = "SELECT dir_fname, dir_lname, mov_title, act_fname, act_lname, role
          FROM movie
          NATURAL JOIN movie_cast
          NATURAL JOIN actor
          NATURAL JOIN movie_direction
          NATURAL JOIN director
          WHERE act_fname='Claire' AND act_lname='Danes'
          ;";
  $stmt = $this->DataHandler->readall($sql);
  return $stmt;
}

public function show17(){
  $arr = $this->read17();
  $html = "<div class='container'>";
        $html .= "<table class='table table-bordered'>";

        foreach($arr as $value)
        {
            $html .= '<thead class="thead-dark">';
            $html .= "<tr>";
            foreach ($value as $key => $value)
            {
                $html .= "<th>" . $key. "</th>";
            }
            $html .= "</tr>";
            $html .= '</thead>';
            break;
        }
        foreach($arr as $value)
        {
            $html .='<tbody class="tbody-light">';
            $html .= "<tr>";
            foreach ($value as $key => $value){
                $html .= "<td>" . $value. "</td>";
            }
            $html .= "</tr></tbody>";
        }
        $html .= "</table></div>";
        return $html;
}
//---------SQL 18------------------------
public function read18(){
  $sql = "SELECT mov_title, act_fname, act_lname, role, dir_fname, dir_lname
          FROM movie
          NATURAL JOIN movie_cast
          NATURAL JOIN actor
          NATURAL JOIN movie_direction
          NATURAL JOIN director
          WHERE act_fname=dir_fname AND act_lname=dir_lname
          ;";
  $stmt = $this->DataHandler->readall($sql);
  return $stmt;
}

public function show18(){
  $arr = $this->read18();
  $html = "<div class='container'>";
        $html .= "<table class='table table-bordered'>";

        foreach($arr as $value)
        {
            $html .= '<thead class="thead-dark">';
            $html .= "<tr>";
            foreach ($value as $key => $value)
            {
                $html .= "<th>" . $key. "</th>";
            }
            $html .= "</tr>";
            $html .= '</thead>';
            break;
        }
        foreach($arr as $value)
        {
            $html .='<tbody class="tbody-light">';
            $html .= "<tr>";
            foreach ($value as $key => $value){
                $html .= "<td>" . $value. "</td>";
            }
            $html .= "</tr></tbody>";
        }
        $html .= "</table></div>";
        return $html;
}
//---------SQL 19------------------------
public function read19(){
  $sql = "SELECT mov_title, act_fname, act_lname
          FROM movie_cast
          NATURAL JOIN actor
          NATURAL JOIN movie
          WHERE mov_title='Chinatown'
          ;";
  $stmt = $this->DataHandler->readall($sql);
  return $stmt;
}

public function show19(){
  $arr = $this->read19();
  $html = "<div class='container'>";
        $html .= "<table class='table table-bordered'>";

        foreach($arr as $value)
        {
            $html .= '<thead class="thead-dark">';
            $html .= "<tr>";
            foreach ($value as $key => $value)
            {
                $html .= "<th>" . $key. "</th>";
            }
            $html .= "</tr>";
            $html .= '</thead>';
            break;
        }
        foreach($arr as $value)
        {
            $html .='<tbody class="tbody-light">';
            $html .= "<tr>";
            foreach ($value as $key => $value){
                $html .= "<td>" . $value. "</td>";
            }
            $html .= "</tr></tbody>";
        }
        $html .= "</table></div>";
        return $html;
}
//---------SQL 20------------------------
public function read20(){
  $sql = "SELECT mov_title, act_fname, act_lname
          FROM movie_cast
          NATURAL JOIN actor
          NATURAL JOIN movie
          WHERE act_fname='Harrison' AND act_lname='Ford'
          ;";
  $stmt = $this->DataHandler->readall($sql);
  return $stmt;
}

public function show20(){
  $arr = $this->read20();
  $html = "<div class='container'>";
        $html .= "<table class='table table-bordered'>";

        foreach($arr as $value)
        {
            $html .= '<thead class="thead-dark">';
            $html .= "<tr>";
            foreach ($value as $key => $value)
            {
                $html .= "<th>" . $key. "</th>";
            }
            $html .= "</tr>";
            $html .= '</thead>';
            break;
        }
        foreach($arr as $value)
        {
            $html .='<tbody class="tbody-light">';
            $html .= "<tr>";
            foreach ($value as $key => $value){
                $html .= "<td>" . $value. "</td>";
            }
            $html .= "</tr></tbody>";
        }
        $html .= "</table></div>";
        return $html;
}
//---------SQL 21------------------------
public function read21(){
  $sql = "SELECT mov_title, mov_year, MAX(rev_stars), mov_rel_country
					FROM movie
					NATURAL JOIN rating
          ;";
  $stmt = $this->DataHandler->readall($sql);
  return $stmt;
}

public function show21(){
  $arr = $this->read21();
  $html = "<div class='container'>";
        $html .= "<table class='table table-bordered'>";

        foreach($arr as $value)
        {
            $html .= '<thead class="thead-dark">';
            $html .= "<tr>";
            foreach ($value as $key => $value)
            {
                $html .= "<th>" . $key. "</th>";
            }
            $html .= "</tr>";
            $html .= '</thead>';
            break;
        }
        foreach($arr as $value)
        {
            $html .='<tbody class="tbody-light">';
            $html .= "<tr>";
            foreach ($value as $key => $value){
                $html .= "<td>" . $value. "</td>";
            }
            $html .= "</tr></tbody>";
        }
        $html .= "</table></div>";
        return $html;
}
//---------SQL 22------------------------
public function read22(){
  $sql = "SELECT mov_title, mov_year, rev_stars
					FROM movie
					NATURAL JOIN rating
					NATURAL JOIN movie_genres
					NATURAL JOIN genres
					WHERE gen_title='Mystery'
          ;";
  $stmt = $this->DataHandler->readall($sql);
  return $stmt;
}

public function show22(){
  $arr = $this->read22();
  $html = "<div class='container'>";
        $html .= "<table class='table table-bordered table-striped'>";

        foreach($arr as $value)
        {
            $html .= '<thead class="thead-dark">';
            $html .= "<tr>";
            foreach ($value as $key => $value)
            {
                $html .= "<th>" . $key. "</th>";
            }
            $html .= "</tr>";
            $html .= '</thead>';
            break;
        }
        foreach($arr as $value)
        {
            $html .='<tbody class="tbody-light">';
            $html .= "<tr>";
            foreach ($value as $key => $value){
                $html .= "<td>" . $value. "</td>";
            }
            $html .= "</tr></tbody>";
        }
        $html .= "</table></div>";
        return $html;
}
//---------SQL 23------------------------
public function read23(){
  $sql = "SELECT mov_year, rev_stars
          FROM movie
          NATURAL JOIN rating
          NATURAL JOIN movie_genres
          NATURAL JOIN genres
          WHERE actor.act_id IN (SELECT act_id FROM movie_cast GROUP BY act_id HAVING COUNT(*)>=2)
          ;"; //still broken, needs to be fixed
  $stmt = $this->DataHandler->readall($sql);
  return $stmt;
}

public function show23(){
  $arr = $this->read23();
  $html = "<div class='container'>";
        $html .= "<table class='table table-bordered'>";

        foreach($arr as $value)
        {
            $html .= '<thead class="thead-dark">';
            $html .= "<tr>";
            foreach ($value as $key => $value)
            {
                $html .= "<th>" . $key. "</th>";
            }
            $html .= "</tr>";
            $html .= '</thead>';
            break;
        }
        foreach($arr as $value)
        {
            $html .='<tbody class="tbody-light">';
            $html .= "<tr>";
            foreach ($value as $key => $value){
                $html .= "<td>" . $value. "</td>";
            }
            $html .= "</tr></tbody>";
        }
        $html .= "</table></div>";
        return $html;
}
//---------SQL 24------------------------
public function read24(){
  $sql = "SELECT mov_title, act_fname, act_lname
          FROM movie_cast
          NATURAL JOIN actor
          NATURAL JOIN movie
          WHERE act_fname='Harrison' AND act_lname='Ford'
          ;";
  $stmt = $this->DataHandler->readall($sql);
  return $stmt;
}

public function show24(){
  $arr = $this->read24();
  $html = "<div class='container'>";
        $html .= "<table class='table table-bordered'>";

        foreach($arr as $value)
        {
            $html .= '<thead class="thead-dark">';
            $html .= "<tr>";
            foreach ($value as $key => $value)
            {
                $html .= "<th>" . $key. "</th>";
            }
            $html .= "</tr>";
            $html .= '</thead>';
            break;
        }
        foreach($arr as $value)
        {
            $html .='<tbody class="tbody-light">';
            $html .= "<tr>";
            foreach ($value as $key => $value){
                $html .= "<td>" . $value. "</td>";
            }
            $html .= "</tr></tbody>";
        }
        $html .= "</table></div>";
        return $html;
}
}?>
