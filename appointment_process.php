<?php

    $to = "nasir.rubel99@gmail.com";
    $from = $_REQUEST['email'];
    $name = $_REQUEST['name'];
    $headers = "From: $from";
    $subject = "You have a appointment request from Mechanic.";

    $fields1 = array();
    $fields1{"Prefered Date"} = "preferedDate";
    $fields1{"Prefered Time Range"} = "preferedTimeRange";
    $fields1{"Stay Or Not"} = "stayOrNot";
    $fields1{"Service(s) Need"} = "serviceSelect";
    $fields1{"Battery Problems"} = "batteryProblems";

    $fields2 = array();
    $fields2{"Full Name"} = "fullName";
    if($_REQUEST['email'] === $_REQUEST['c_email']){
        $emailAddress = $_REQUEST['email'];
    }
    $fields2{"Email"} = $emailAddress;
    $fields2{"Address"} = "address";
    $fields2{"City"} = "city";
    $fields2{"City"} = "city";
    $fields2{"Phone Number"} = "phoneNumber";
    $fields2{"State Province"} = "stateProvince";

    
    if($_REQUEST['preferredContactMethod'] != 'Preferred Contact Method *'){
        $fields2{"Preferred Contact Method"} = "preferredContactMethod";
    }

    if($_REQUEST['vehicleMake'] != 'Vehicle Make *'){
        $fields2{"Vehicle Make"} = "vehicleMake";
    }

    if($_REQUEST['vehicleModel'] != 'Vehicle Model *'){
        $fields2{"Vehicle Model"} = "vehicleModel";
    }

    if($_REQUEST['vehicleYear'] != 'Vehicle Year *'){
        $fields2{"Vehicle Year"} = "vehicleYear";
    }

    if($_REQUEST['fuelType'] != 'Fuel Type *'){
        $fields2{"Fuel Type"} = "fuelType";
    }
    

    $body = "Here is what was sent:\n\n"; 
    
    foreach($fields1 as $a => $b){   $body .= sprintf("%20s: %s\n",$b,$_REQUEST[$a]); }

    $body .="\n\nPersonal Information:\n\n";

    foreach($fields2 as $c => $d){   $body .= sprintf("%20s: %s\n",$d,$_REQUEST[$c]); }

    $send = mail($to, $subject, $body, $headers);

?>