    <!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>
            <?php
                $f = fopen("SiteName.txt","r");
                echo fgets($f);
                fclose($f);
            ?>
        </title>

        <link type="text/css" rel="stylesheet" href="home.css" media="screen" />
    </head>

    <script>
    //****************************************************************************************
    //
    // AJAX scripting
    //
    //****************************************************************************************
			function loadXMLDoc()
			{
				var xmlhttp;
				if (window.XMLHttpRequest)
				  {// code for IE7+, Firefox, Chrome, Opera, Safari
				  xmlhttp=new XMLHttpRequest();
				  }
				else
				  {// code for IE6, IE5
				  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				  }
				
				xmlhttp.onreadystatechange=function()
				  {
				  if (xmlhttp.readyState==4 && xmlhttp.status==200)
				    {
				    document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
				    }
				  }
				xmlhttp.open("GET","ajax_info.txt",true);
				xmlhttp.send();
				}
        
    </script>
        
        <button type="button" onclick="myFunction()">Press for Date</button>
        
        <p id="demo"></p>


<script>
//****************************************************************************************
//
// Javascript
//
//****************************************************************************************
    function myFunction() {
        document.getElementById("demo").innerHTML = Date();
    }
</script>



<?php
include ("mysql.php");
?>


    <body id="home">
    <div id="header">  
      <h1>
        <?php
            $f = fopen("SiteName.txt","r");
            echo fgets($f);
            fclose($f);
        ?>
      </h1>
    </div>
    <div id="navigation">
	      <ul id="tabs">
            <?php
                $f = fopen("navigation.txt","r");
                
                while (!feof($f)){
                    
                    $arrM = explode(",",fgets($f));
                    echo "<li id=\"tab" . $arrM[0]. "\"><a href=' " . $arrM[2] . "'>" . $arrM[1]. " </a></li>";
                   // echo fgets($f)."<br />";
                }
                
                fclose($f);
            ?>
        <li id="tabhome"><a href="home.html">Mauris </a></li>  
        <li id="tab1"><a href="page1.html">Cras </a></li>  
        <li id="tab2"><a href="page2.html">Proin</a></li>
      </ul>  
    
    </div>
    
    <div id="myDiv"><h2>Let AJAX change this text</h2></div>
    <button type="button" onclick="loadXMLDoc()">Change Content</button>
    
    <div id="maincontent"> 
      <div id="primary">
        <p>
          Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Sed feugiat nisi  
          at sapien. Phasellus varius tincidunt ligula. Praesent nisi. Duis  
          sollicitudin. Donec dignissim, est vel auctor blandit, ante est laoreet  
          neque, non pellentesque mauris turpis eu purus. 
        </p>  
        <p>
          Suspendisse mollis leo nec diam. Vestibulum pulvinar tellus sit amet nulla  
          fringilla semper. Aenean aliquam, urna et accumsan sollicitudin, tellus  
          pede lobortis velit, nec placerat dolor pede nec nibh. Donec fringilla. Duis  
          adipiscing diam at enim. Vestibulum nibh.
        </p>  
        <p>
          Nulla facilisi. Aliquam dapibus leo eget leo. Etiam vitae turpis sit amet  
          massa posuere cursus. Sed vitae justo quis tortor facilisis ultrices.  
          Integer id erat. Donec at felis ut erat interdum vestibulum. Quisque et eros.  
          Donec fringilla, est in condimentum venenatis, tortor velit vehicula sem, in  
          elementum quam sapien eu lectus. In dolor urna, ullamcorper vel, tempor sit  
          amet, semper ut, felis. Praesent nisi. 
        </p>  
      </div>
      <div id="secondary">
        <p>
          Fusce scelerisque viverra quam. Nam urna. Nullam urna libero, euismod at,  
          euismod sit amet, porttitor ac, mauris.
        </p>  
        <p>
          Vestibulum interdum aliquet lacus. Vestibulum egestas. Fusce adipiscing  
          quam sed metus.
        </p>  
        <p>
          Nullam dignissim aliquam dui. Proin laoreet, elit sed pulvinar  
          sollicitudin, urna arcu fermentum felis, in rhoncus nunc neque vitae  
          libero.
        </p>
      </div>
    </div>   
    <div id="footer">
      <p>
        Proin quis orci eu erat molestie varius. Praesent condimentum  
        orci in lectus. Ut ipsum. In hac habitasse platea dictumst.
      </p>
    </div>
  </body>
</html>