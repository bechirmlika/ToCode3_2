<?php

 require_once('lib/nusoap.php'); 
 $server = new nusoap_server();
// Define the method as a PHP function
function confirmTravel($confirme){
 $travel = "You can travel ".$confirme;
 return $travel;}
// Initialize WSDL support
$server->configureWSDL('myname', 'http://www.mynamespace.com');
// Register the method to expose
      $server->register('confirmTravel',
			array('confirme' => 'xsd:string'),  //input parameter
			array('travel' => 'xsd:string'),  //output
			'http://www.mynamespace.com',   //namespace
      'http://www.mynamespace.com#SayHello', //soapaction           
      ); 
// Use the request to (try to) invoke the service
$server->service(file_get_contents("php://input"));
?>