<?php
$file = 'file.json';

if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="My Realm"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'You did not enter';
    exit;}
 else {
  $accounts = json_decode(file_get_contents($file), JSON_OBJECT_AS_ARRAY);
  $user = $_SERVER['PHP_AUTH_USER'];
  $password = $_SERVER['PHP_AUTH_PW'];
  $passHash = password_hash($password, PASSWORD_DEFAULT);
  if(is_array($accounts) && count($accounts)>0){
    foreach($accounts as $login=>$hash){
      if(!array_key_exists($user, $accounts)){
        $accounts[$user] = $passHash;
        file_put_contents($file, json_encode($accounts));
        echo "You registred";
        require_once 'index.php';
        exit;
      }else {
        
        if(array_key_exists($user, $accounts)&& password_verify($password, $accounts[$login])){
        echo "You logged in";
        require_once 'index.php';
        exit;}else{
        header('WWW-Authenticate: Basic realm="My Realm"');
        header('HTTP/1.0 401 Unauthorized');
        echo "Error";
        exit;}
  }};
  }else{
    $accounts[$user] = $passHash;
    file_put_contents($file, json_encode($accounts));
    echo "You registred";
  }

 };
