<?php
/*
* Get Data
*
* @param String || Number $id
*
* @return Array
*/
function getData($id) {
  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
  } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  } else {
    $ip = $_SERVER['REMOTE_ADDR'];
  }

  return [
    'ip' => $ip,
    'created_at' => date("Y-m-d H:i:s"),
    'button_id' => $id
  ];
}

/*
* Add data to log file
*
* @param Array
*/
function addToLogFile($data) {
  $dir = "../../logs";

  $fileName = date('Y-m-d') . '-click.log';
  $content = '';
  foreach ($data as $key => $value) {
    $content .= "{$key}: {$value}\n";
  }
  $content .= "----------------\n";

  if(is_dir($dir) === false) mkdir($dir);

  $file = fopen($dir . '/' . $fileName, "a");


  fwrite($file, $content);
  fclose($file);
}
