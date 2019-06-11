<?php
require_once 'DataHandler.php';

class ContentLogic {

public function __construct() {
    //localhost, DB name, Username, password.
	$this->DataHandler = new Datahandler("localhost","cars_r_us" ,"root", "root");
}

public function __destruct() {}

	public function Welcome(){

	}

public function createKlant($voornaam, $tussenvoegsel, $achternaam, $plaats, $straat, $huisnummer, $postcode) {
	 try{
		 $sql = "INSERT INTO `cars_r_us` . `klant`(`voornaam`, `tussenvoegsel`, `achternaam`, `plaats`, `straat`, `huisnummer`, `postcode`) VALUES ('$voornaam','$tussenvoegsel','$achternaam','$plaats', '$straat','$huisnummer', '$postcode')";
		 $stmt = $this->DataHandler->CreateData($sql);
		 //die("test");
		 return $stmt;

	 }catch (Exception $e) {
		 throw $e;
	 }
}
public function createapk($klantid, $kenteken, $apkdatum) {
	 try{
		 $sql = "INSERT INTO `cars_r_us` . `apk`(`klantid`, `kenteken`, `apkdatum`) VALUES ('$klantid','$kenteken','$apkdatum')";
		 $stmt = $this->DataHandler->CreateData($sql);
		 //die("test");
		 return $stmt;

	 }catch (Exception $e) {
		 throw $e;
	 }
}

public function updateKlant() {
	// try {
	// 		$sql = "UPDATE `klant` SET `klant-id` = 'Joppie' WHERE `id` = '8'";
	// 		$stmt = $this->DataHandler->UpdateData($sql);
	// 		return $stmt;
	//
	// 	} catch (Exception $e) {
	// 		throw $e;
	// 	}
}

public function deleteKlant(){

}
public function deleteApk(){

}



// -----------------------------------------------------------------------------
public function collectReadKlant(){
	$sql = "SELECT * FROM klant
					;";
	$stmt = $this->DataHandler->readall($sql);
	return $stmt;
}

public function collectReadApk(){
	$sql = "SELECT * FROM apk
					;";
	$stmt = $this->DataHandler->readall($sql);
	return $stmt;
}
public function collectReadCount(){
	$sql = "SELECT COUNT(kenteken) FROM apk
					;";
	$stmt = $this->DataHandler->read($sql);
	return $stmt;
}

public function readKlant() {
	$arr = $this->collectReadKlant();
	// $html = '<div>';
		$html = "<table class='table table-striped'>";

		$html .= "<thead>";
		$html .= "<tr>"."<td>". "Klant" ."</td>";
		$html .= "<td>".""."<td>";
		$html .= "<td>"."Kenteken"."<td>";
		$html .= "<td>"."Datum APK"."<td>"."</tr>";
		$html .= "</thead>";

		$html .='<tbody>';
		$html .= "<tr>";
		$html .= '<td>';
		foreach ($arr as $key => $value){
			$html .= '<br/>' . $value["klant-id"];
		}
	$html .= '<td/><td>';
		foreach ($arr as $key => $value){
			$html .= '<br/>' . $value["voornaam"].'&thinsp;'. $value["tussenvoegsel"].'&thinsp;'. $value["achternaam"].'<br/>'.$value["straat"].'<br/>'. $value["postcode"].$value["plaats"];
		}
		$html .= '</td>';
	// $html .= '</div>';

		return $html;
}
public function readApk() {
	$arr = $this->collectReadApk();

	// $html = '<div>';
	$html = '<td>' . '</td>';
	$html .= '<td>';
			foreach ($arr as $key => $value){
				$html .= '<br/>'.$value['kenteken'];
			}
	$html .= '<td/><td>';
			foreach ($arr as $key => $value){
				$html .= '<br/>'.$value['apk_datum'];
			}

	$html .= "</td></tr></tbody>";
	$html .= "</table>";
	// $html .= '</div>';

				return $html;
}
public function readCount() {
	$count = $this->collectReadCount();
		$html = "<table>";
		$html .= '<td>' . "Totaal aantal autos: " . implode($count);

	$html .= '</td></table><hr></div>';
	return $html;
}
}
?>
