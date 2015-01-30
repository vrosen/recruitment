<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/sb-admin.css" rel="stylesheet">
<link href="../css/plugins/morris.css" rel="stylesheet">
<link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<?php

include ('header.php');
include_once ('caller.php');

//this is the posted search term
$search = $_POST['search'];

//we instantiate the theCaller class here
$call = new Caller();

//we call the Curl post function with the search term here
$responseData = $call->searchCandidatePost($search);

// we check if there is data found or it is an empty string
if(strlen($responseData) > 2){
    echo '<pre>';
    echo '<h3>JSON</h3>';
    print_r($responseData);
    echo '</pre>';
    
    echo '<pre>';
    echo '<h3>Array</h3>';
    print_r(json_decode($responseData));
    echo '</pre>';
    
} else {
    echo '<pre>';
    print_r('No match found!');
    echo '</pre>';
}


