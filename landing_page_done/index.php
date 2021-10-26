<?php
session_start();
// Redirect
$return_domains=$_SESSION['return_domain'];
header('Location: '.$return_domains);
echo "<hr>The return domain should be: ". $return_domains ."<hr>";

// Get IP address of the user
function getUserIpAddr(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
$ip_address = getUserIpAddr();
echo "The IP address is: ". $ip_address . "<hr> The IP data is: ";

// Get the IP Data of the user (location, etc.)
$ip_data = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$ip_address));
var_dump($ip_data);
echo "<hr>The country code is: " . $ip_data['geoplugin_countryCode'];
$_SESSION['country'] = $ip_data['geoplugin_countryName'];
echo "<hr>The country name is: " . $_SESSION['country'];


 if($_GET){
   $return_domain = substr($_SERVER['HTTP_HOST'], 0, strrpos($_SERVER['HTTP_HOST'],".")) . "." . $_GET['locations'];
 } else {
   switch (strtolower($ip_data['geoplugin_countryCode'])) {
     case "bg":
       $return_domain = "booll.bg";
       break;
     case "pl":
       $return_domain = "booll.pl";
       break;
     case "fr":
       $return_domain = "booll.fr";
       break;
     case "es":
       $return_domain = "booll.es";
       break;
     case "it":
       $return_domain = "booll.it";
       break;
     case "uk":
       $return_domain = "booll.co.uk";
       break;

     default:
      $return_domain = "http://darina.targovec.bg/landing_page_cs/";
       // $return_domain = substr($_SERVER['HTTP_HOST'], 0, strrpos($_SERVER['HTTP_HOST'],".")) . "." . strtolower($ip_data['geoplugin_countryCode']);
   }
 }
echo "<hr>The return domain should be: ". $return_domain ."<hr>";
$_SESSION['return_domain'] = $return_domain;
?>
