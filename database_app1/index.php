<?php
require_once("../smarty/libs/Smarty.class.php");

define("HOST", "127.0.0.1");
define("USER", "www-data");
define("PWD", "");
define("DB_NAME", "testdb");
$smarty_object = new Smarty();
$smarty_object->left_delimiter = '<!--{';
$smarty_object->right_delimiter = '}-->';
$template = "database_app.html";

//avoid notice index undefined
$name = (isset($_POST["name"]) && $_POST["name"]) ? $_POST["name"] : "";
$age = (isset($_POST["age"])&& $_POST["age"]) ? $_POST["age"] : "";
$hometown = (isset($_POST["hometown"])&& $_POST["hometown"])?$_POST["hometown"] : "";
$isMale = (isset($_POST["isMale"])&& $_POST["isMale"])?$_POST["isMale"] : "";
$row_id = (isset($_POST["row_id"])&& $_POST["row_id"])?$_POST["row_id"]: "";
$select_id = (isset($_POST["select_id"])&& $_POST["select_id"])?$_POST["select_id"]: "";
$select_attribute = (isset($_POST["select_attribute"])&& $_POST["select_attribute"])?$_POST["select_attribute"]: "";
$change_value = (isset($_POST["change_value"])&& $_POST["change_value"])?$_POST["change_value"]: "";

$connect = mysqli_connect(HOST,USER,PWD,DB_NAME);
$all_data = mysqli_query($connect,"SELECT * FROM mytable");
$rows_num = mysqli_num_rows($all_data);
$set_auto_increment_query = "ALTER TABLE mytable AUTO_INCREMENT=".$rows_num+=1;
mysqli_query($connect,$set_auto_increment_query);

if(isset($_POST["submit_input"])&&isset($_POST["isMale"])){

  $name = $_POST["name"];
  $age = $_POST["age"];
  $hometown = $_POST["hometown"];
  $isMale = $_POST["isMale"];

  //block SQL Injection
  $name=mysqli_real_escape_string($connect,$name);
  $age=mysqli_real_escape_string($connect,$age);
  $hometown=mysqli_real_escape_string($connect,$hometown);


  //insert a new row into the database
  $insert_query = "INSERT INTO mytable (name,age,hometown,isMale) VALUES('".$name."','".$age."','".$hometown."','".$isMale."')";
  $insert_new_data = mysqli_query($connect,$insert_query);
}


if(isset($_POST["submit_row_id"])){
  global $rows_num;
  $row_id = $_POST["row_id"];
  if ($row_id !== ""){
    $delete_query_row_id = "DELETE  FROM mytable WHERE id=".$row_id;
    $delete_row = mysqli_query($connect,$delete_query_row_id);
  }if($row_id == "all"){
    $delete_all_query = "DELETE FROM testdb.mytable;";
    $delete_all = mysqli_query($connect,$delete_all_query);
  }else{
    $delete_query_last_entry = "DELETE FROM testdb.mytable WHERE id ORDER BY id DESC LIMIT 1;";
    $delete_last_entry = mysqli_query($connect,$delete_query_last_entry);
  }
}


if(isset($_POST["submit_demo"])){

  /*$demo_array = [
    ["Hendrik",22,"Hildesheim",true],
    ["Specht",11,"Baum",true],
    ["Eule",99,"Wald",false],
    ["Spatz",3,"Busch",true],
    ["Blaumeise",17,"Wiese",false],
    ["Rabe",42,"Felder",true]
  ];*/

  $name_array = [
  "Liam",
  "Olivia",
  "Noah",
  "Emma",
  "Oliver",
  "Ava",
  "William",
  "Sophia",
  "Elijah",
  "Isabella",
  "James",
  "Charlotte",
  "Benjamin",
  "Amelia",
  "Lucas",
  "Mia",
  "Mason",
  "Harper",
  "Ethan",
  "Evelyn"
  ];
  $name_array_len = count($name_array);
  $name = $name_array[random_int(0,$name_array_len)];

  $age = random_int(1,99);

  $hometown_array = ["Berlin",
"Hamburg",
"Münnchen",
"Köln",
"Frankfurt am Main",
"Stuttgart",
"Düsseldorf",
"Dortmund",
"Essen",
"Bremen",
"Dresden",
"Leipzig",
"Hannover",
"Nürnberg",
"Duisburg",
"Bochum",
"Wuppertal",
"Bonn",
"Bielefeld",
"Mannheim",
"Karlsruhe",
"Münster",
"Wiesbaden",
"Augsburg",
"Aachen",
"Münchengladbach",
"Gelsenkirchen",
"Braunschweig",
"Chemnitz",
"Kiel",
"Krefeld",
"Halle (Saale)",
"Magdeburg",
"Freiburg im Breisgau",
"Oberhausen",
"Lübeck",
"Erfurt",
"Rostock",
"Mainz",
"Kassel",
"Hagen",
"Hamm",
"Saarbrücken",
"Mülheim an der Ruhr",
"Herne",
"Ludwigshafen am Rhein",
"Osnabrück",
"Oldenburg",
"Leverkusen ",
"Solingen",
"Potsdam",
"Neuss",
"Heidelberg ",
"Paderborn",
"Darmstadt",
"Regensburg",
"Würzburg",
"Ingolstadt",
"Heilbronn",
"Ulm",
"Wolfsburg",
"Göttingen",
"Offenbach am Main",
"Pforzheim",
"Recklinghausen",
"Bottrop",
"Fürth",
"Bremerhaven",
"Reutlingen",
"Remscheid",
"Koblenz",
"Bergisch Gladbach",
"Erlangen",
"Moers",
"Trier",
"Jena",
"Siegen",
"Hildesheim",
"Salzgitter",
"Cottbus",

  ];
  $hometown_array_len = count($hometown_array);
  $hometown = $hometown_array[random_int(0,$hometown_array_len)];

  if(random_int(0,1)== 1){
    $isMale = "true";
  }else{
    $isMale = "false";
  }

    $insert_demo = "INSERT INTO mytable (name,age,hometown,isMale) VALUES('".$name."','".$age."','".$hometown."','".$isMale."')";
    $demo_query = mysqli_query($connect,$insert_demo);

  }




if(isset($_POST["change_button"])){
  if($change_value !== "") {
    $change_query = "UPDATE mytable SET " . $select_attribute . "='" . $change_value . "' WHERE  id=" . $select_id;
    $send_change_query = mysqli_query($connect, $change_query);
  }
}

$all_data = mysqli_query($connect,"SELECT * FROM mytable");

function create_table($all_data)
{
  $table = "";
  $table .= "<table> <tr> <td><ins>ID</ins></td> <td><ins>name</ins></td> <td><ins>age</ins></td> <td><ins>hometown</ins></td> <td><ins>isMale</ins></td> </tr>";
  while ($row = mysqli_fetch_assoc($all_data)) {
    $table .= "<tr>";
    foreach ($row as $item => $value) {
      if($item == "id"){
        $table .=  "<td><i>" . $value . "</i></td>";
      }else{
        $table .=  "<td>" . $value . "</td>";
      }
    }
    $table .=  "</tr>";
  }
  $table .= "</table>";
  return $table;
}

function create_dropdown_id($connect){
  $query = "SELECT id FROM mytable";
  $result = mysqli_query($connect,$query);
  $dropdown = "<select name='select_id'>";
  while($array = mysqli_fetch_row($result)){
    foreach ($array as $i){
      $dropdown .= "<option value='".$i."'>".$i."</option>";
    }
  }
  $dropdown .="</select>";
  return $dropdown;
}


$vars = ["output" => create_table($all_data), "dropdown_id" => create_dropdown_id($connect)];
$smarty_object->assign($vars);
$smarty_object->display($template);