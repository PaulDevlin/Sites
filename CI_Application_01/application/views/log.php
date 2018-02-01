<?php
//****************************************************************************************
//
// php - store vistor information
//
//****************************************************************************************
    
    // Getting the information
    $ipaddress = "$_SERVER[REMOTE_ADDR]";
    $referrer  = "$_SERVER[HTTP_REFERER]";
    $useragent = "$_SERVER[HTTP_USER_AGENT]";
    
    date_default_timezone_set('UTC');
    $datetime = mktime();
    $datetime = date("Y-m-d H:i:s");
    
    $remotehost = @getHostByAddr($ipaddress);
    
    
    
    //$page = “http:{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}”;
    $page = "http:{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}";
    
    //$page = "localhost";

    //$page = iif(!empty($_SERVER['QUERY_STRING']), "?{$_SERVER['QUERY_STRING']}", "");
    
    if (!empty($_SERVER['QUERY_STRING']))
    {
    $page = "?{$_SERVER['QUERY_STRING']}";
    echo "page = ".$page;
    }
    
    // Create log line
    $logline = $ipaddress . "|" . $referrer . "|" . $datetime . "|" . $useragent . "|" . $remotehost . "|" . $page;
    
    //echo $logline;
    // Write to log file:
    
    // Open the log file in “Append” mode
    $log = fopen("logfile.txt", "a");
    // Write $logline to our logfile.
    fputs($log,$logline . "\n");
    fclose($log);
    
    
//		$line = " $_SERVER[REMOTE_ADDR]";
//    	echo $line;
    
//    	$file = fopen("index.txt", "a");
//    	fputs($file,$line . "\n");
//    	fclose($file);
?>
