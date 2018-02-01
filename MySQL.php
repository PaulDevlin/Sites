<?php
//****************************************************************************************
//
// MySQL code
//
//****************************************************************************************
    //echo "in MySQL.php";   
    
    //****************************************************************************************
    // Create connection
    //****************************************************************************************
    $con=mysqli_connect("127.0.0.1","root","","myDatabase");
    
    //****************************************************************************************
    // Check connection
    //****************************************************************************************
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
    //****************************************************************************************
    // Grab Vistor Stats
    //****************************************************************************************
    include ("log.php");
    
    //****************************************************************************************
    // Check if the Visitor has been on the site before
    //****************************************************************************************
    $result = mysqli_query($con,
               "SELECT * FROM VisitorLog
                WHERE IP_Address  = '$ipaddress'  AND
                      Referrer    = '$referrer'   AND
                      UserAgent   = '$useragent'  AND
                      RemoteHost  = '$remotehost' AND
                      Page        = '$page'       ");
                      
  	$ResultCount = 0;
  	
  	while($row = mysqli_fetch_array($result)) {
  		$ResultCount = $ResultCount + 1;
	}
	   
    If ($ResultCount == 0) {
      //****************************************************************************************
      // New Visitor - Add a new row
      //****************************************************************************************
      $sql="INSERT INTO VisitorLog
          VALUES ('$ipaddress','$referrer','$datetime','$useragent','$remotehost','$page',1)";
    }
    else {
      //****************************************************************************************
      // Returning Visitor - Update row
      //****************************************************************************************
        $sql="UPDATE VisitorLog 
              SET VisitCount = VisitCount + 1, DateTime = '$datetime'
              WHERE IP_Address  = '$ipaddress'  AND
                    Referrer    = '$referrer'   AND
                    UserAgent   = '$useragent'  AND
                    RemoteHost  = '$remotehost' AND
                    Page        = '$page'       ";
    }
    
    //****************************************************************************************
    // Run the query
    //****************************************************************************************
    if (!mysqli_query($con,$sql)) {
    	die('Error: ' . mysqli_error($con));
    }
    //echo "1 record added";
    
    //$result = mysqli_query($con,"SELECT * FROM Header");

    //while($row = mysqli_fetch_array($result)) {
    //    echo $row['IP_Address'] . " " . $row['Name'];
    //    echo "<br>";
    //}

    //****************************************************************************************
    // Close connection
    //****************************************************************************************
    mysqli_close($con);
    
    ?>
