<?php
 // Pull in the NuSOAP code
 require_once('lib/nusoap.php'); 
 // Create the server instance
 $server = new nusoap_server();
// Define the method as a PHP function
function travelReservation($travel){
 $reserve = "You have a travel reservation ".$travel;
 return $reserve;}
// Initialize WSDL support
$server->configureWSDL('myname', 'http://www.mynamespace.com');
// Register the method to expose
      $server->register('travelReservation',
			array('travel' => 'xsd:string'),  //input parameter
			array('reserve' => 'xsd:string'),  //output
			'http://www.mynamespace.com',   //namespace
      'http://www.mynamespace.com#SayHello', //soapaction           
      ); 
// Use the request to (try to) invoke the service
$server->service(file_get_contents("php://input"));
?>