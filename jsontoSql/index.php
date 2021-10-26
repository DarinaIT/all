<?php
function get_json($jsonFile){
  include_once 'JsonDarina.php';
  $dataInfo = new JsonDarina();

  $result = json_decode(file_get_contents($jsonFile), true);




  $dataInfoResult = $dataInfo->add_jsonFile($result);
  print_r($dataInfoResult);
}

$files = scandir('files/');

foreach($files as $file) {
  if($file=="." || $file==".."){
    continue;
  }

  get_json("files/".$file);
}

?>
