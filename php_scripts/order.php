<?php
session_start();
//require('../../some_files/mysql_connect.php');
require('../mysql_connect.php');

if (isset($_GET['order'])) { // Check if form has been submitted
		$sess = 1;
		
		// check if the person has already ordered the test
		$command_sent = "SELECT COUNT(*) AS nr FROM `test_order` WHERE `random_code`='".$_SESSION['code']."';"; 
                //$command_sent = sprintf("SELECT COUNT(*) AS nr FROM `test_order` WHERE `random_code`='%s'", $_SESSION['code']);
		$query_sent = mysql_query($command_sent);
		$arg = mysql_fetch_object($query_sent);
                  
                if (preg_match('/^[A-B(\d{4})]/', $_SESSION['code'])){

		if ($arg->nr == 0 ) { // if not
			$_SESSION['ordered'] = 1;
			$insert_command = "INSERT INTO `test_order` VALUES('','".$_SESSION['code']."', NOW(), '".$_SESSION['co']."',
											'".$_SESSION['phone']."', '".$_SESSION['email']."');"; 
			//echo $insert_command;
			$insert_result = mysql_query($insert_command);   	       
				
			if (!$insert_result){ 
				die("mySQL error: ". mysql_error());
			} else {
                          echo '<div class="mainFRAME"><h2> Provmaterial är bestält </2></div>';	
			}
			header("Location: ./ordered_2.php");
		}
		
		else { // if yes
                       header("Location: ./ordered_2.php");
		       session_destroy();
		}
                
                }
                else{
                 echo "<script>window.top.location='../index.php'</script>";
                }

		// if page is refreshed after clicking ORDER button
		$pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';
		
		if($pageWasRefreshed ) {
			echo "<script>window.top.location='../index.php'</script>";
		}
} 

if (isset ($_GET['back'])){
	session_destroy();
	header("Location: ../index.php");
}


include('../html/top.inc');
?>
<div class='mainFRAME'>
  <h3> Kontrollera dina uppgifter </h3>
  <form method="GET" action="order.php">
  
    <table>
    
      <tr>
        <td>
            Kod:
        </td>
        <td>

             <?php
                if (!isset($sess)) {echo $_SESSION['code'];}
             ?>        

        </td>        
      </tr>
	  <tr>
    
      <tr>
        <td>
            Förnamn:
        </td>
        <td>			 

             <?php
			 if (!isset($sess)) {echo $_SESSION['firstname'];}
             ?>        

        </td>        
      </tr>
	   
      <tr>
        <td>
            Efternamn:
        </td>
        <td>

             <?php
                if (!isset($sess)) {echo $_SESSION['lastname'];}
             ?>                     

        </td>        
      </tr>
	  
	  	  
     <tr>
     
        <td >
        </td>

        <td>
        </td>      

     <tr>

     <tr>
     
        <td >
        </td>

        <td>
        </td>      

     <tr>
	  
        <td>
            Adress
        </td>      
      </tr>
	 

      <tr>
        <td>
             Gatuadress:
        </td>
        <td>

             <?php
                if (!isset($sess)) {echo $_SESSION['street'];}
             ?>        

        </td>        
      </tr>
	  
	  <tr>
        <td>
            Postnummer:
        </td>
        <td>   

             <?php
               if (!isset($sess)) {echo $_SESSION['postcode'];}
             ?>        

        </td>        
      </tr>
	  <tr>
        <td>
             Ort:
        </td>
		
        <td>

             <?php
                if (!isset($sess)) {echo $_SESSION['city'];}
             ?>        

        </td>        
      </tr>
        <tr>
        <td>
            C/O:
        </td>
		
        <td>

             <?php
                if (!isset($sess)) {echo $_SESSION['co'];}
             ?>        

        </td>        
      </tr>


     <tr>
     
        <td >
        </td>

        <td>
        </td>      

     <tr>

     <tr>
     
        <td >
        </td>

        <td>
        </td>      

     <tr>

     <tr>
     
        <td >
        </td>

        <td>
        </td>      

     <tr>
	  
	  <tr>
        <td>
			
        </td>      
      </tr>
	  
	  <tr>
        <td>
            Mobil:
        </td>
		
        <td>

	    <?php
                if (!isset($sess)) {echo $_SESSION['phone'];}
             ?>        

		</td>        
      </tr>
	  <tr>
        <td>
              E-post:
        </td>
		
        <td>

             <?php
                if (!isset($sess)) {echo $_SESSION['email'];}
             ?>     

        </td>        
      </tr>

     <tr>
     
        <td >
        </td>

        <td>
        </td>      

     <tr>

     <tr>
     
        <td >
        </td>

        <td>
        </td>      

     <tr>
	  
     <tr>

     <tr>
     
        <td >
        </td>

        <td>
        </td>      

     <tr>

     <tr>
     
        <td >
        </td>

        <td>
        </td>      

     <tr>

     <tr>
     
        <td >
        </td>

        <td>
        </td>      

     <tr>
     
        <td align="Left">
           <input type="submit" name="order" value="Beställ" />
		   <input type="submit" name="back" value="Gå tillbaka" />           
        </td>

        <td>
        </td>      

     <tr>
	       
    </table>
  </form>
</div>


<?php
include("../html/bottom.inc");
?>
