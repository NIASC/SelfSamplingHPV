<?php
session_start();

echo "<h1> web page is under construction </h1>" ;

include("./html/top.inc");
require('../some_files/mysql_connect.php');

//javascript for auto submitting after entering the code
echo '<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>';
echo "<script> 
$(document).ready(function(){
    $('#link_input').keyup(function(){
    if(this.value.length == 15){
    $('#myform').submit();
    }
});;
});
</script>";

############
#regex
$good_email = "[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}";


if (isset($_POST['code'])){
	
	//javascript for clearing other fields if user deletes even one character of code
	echo "<script> $(document).ready(function(){
             $('#link_input').keyup(function(){
			if(this.value.length < 15){
				$('#first').val('');
				$('#last').val('');
				$('#street').val('');
				$('#post').val('');
				$('#city').val('');
				$('#co').val('');
				$('#phone').val('');
				$('#email').val('');
		}});});</script>";

   // Check if form has been submitted
   if ((empty($_POST['code']))) {   
        $error_code = 1;		//notify customer that he/she has to enter a code
		
   }
    
   else{ //if everything is correct redirect to order.php
		//check if the person exists in the database
		$code = mysql_real_escape_string($_POST['code']);
		$count_command = sprintf("SELECT COUNT(*) AS nr FROM test_order_info WHERE `random_code`='%s'", $code);
		$count_query  = mysql_query($count_command);         
        //----------------------------------------------- 
        if (!$count_query){ 
            die("mySQL error: ". mysql_error());
        }   
        $count_data = mysql_fetch_object($count_query);  
         
        //----------------------------------------------- 
        if($count_data -> nr == 0){  
              $error_message  = "YOU ENTERD WRONG Kod, please try again";
             
        }
		else {
			//if exists
			$exists=1;
			$command = "select * from `test_order_info` where `random_code` = '".$code."';";
			$query  = mysql_query($command); 
			if (!$query){ 
					die("mySQL error: ". mysql_error());
			}	
			$person = mysql_fetch_object($query);
			$_SESSION['code'] = $person->random_code;
			$_SESSION['firstname'] = $person->firstname;
			$_SESSION['lastname'] = $person->lastname;
			$_SESSION['street'] = $person->street;
			$_SESSION['postcode'] = $person->postcode;
			$_SESSION['city'] = $person->city;
			$_SESSION['municipality'] = $person->municipality;

		}
	
}	
}

if (isset($_POST['submit'])) {

	$_SESSION['co'] = mysql_real_escape_string($_POST['co']);
	$_SESSION['phone'] = mysql_real_escape_string($_POST['phone']);
	$_SESSION['email'] = mysql_real_escape_string($_POST['email']);
	
	// redirect to order.php if the form includes all necessary information
	if (!empty($_POST['firstname'])){
       //echo "Location: "."http://".$_SERVER['HTTP_HOST']."/php_scripts/products.php";
       //header("Location: php_scripts/order.php");
       //header("Location: "."http://".$_SERVER['HTTP_HOST']."/php_scripts/products.php");
       echo "<script>window.top.location='"."php_scripts/order.php'</script>";
	}	else {
		$error_message  = "YOU ENTERD WRONG Kod, please try again";

	}
}

?>

<div>
  <h3> Beställ gratis HPV prov </h3>
</div>


<div class='mainFRAME'>
  <h4>Dina uppgifter</h4>
  
  <form action='hem_test.php' id='myform' method='post'>
  
  <table>
      <tr>      
        <td>
            Kod
        </td>        
        <td>

             <input type="text" id='link_input' size="25" name="code" autocomplete="off" value = '<?php if (isset($_POST['code'])){echo $_POST['code'];}?>' >    

           <span style="color:red;font-size:12px;">
             <?php
                if ($error_message) {
                  
                     echo $error_message;
                }
                
             ?>        
          </span>

        </td>                
      </tr>
  
      </form>



      <form method="POST" action="hem_test.php">	
      <tr>
        <td>
            Förnamn
        </td>        
        <td>

             <input type="text" size="25" id="first" name="firstname" value = '<?php if (isset($exists)){echo $_SESSION['firstname'];} ?>' readonly>    

        </td>                
      </tr>
	   
      <tr>
        <td>
            Efternamn
        </td>
        
        <td>

             <input type="text" size="25" id="last" name="lastname" value = '<?php if (isset($exists)){echo $_SESSION['lastname'];} ?>' readonly >          

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
        <td>
            Adress
        </td>      
        
        <td>
        </td>
                      
      </tr>
	 

      <tr>
      
        <td>
            Gatuadress:
        </td>
        
        <td>

             <input type="text" size="25" id="street" name="street" value = '<?php if (isset($exists)){echo $_SESSION['street'];} ?>' readonly>    


        </td> 
               
      </tr>
	  
	  <tr>
	  
        <td>
            Postnummer:
        </td>
        
        <td>

             <input type="text" size="25" id="post" name="postcode" value = '<?php if (isset($exists)){echo $_SESSION['postcode'];} ?>' readonly>    

        </td>
                
      </tr>
      

	  <tr>
        <td>
            Ort
        </td>
		
        <td>

             <input type="text" size="25" id="city" name="city"  value = '<?php if (isset($exists)){echo $_SESSION['city'];} ?>' readonly  >    

        </td>        
      </tr>
      
      <tr>
        <td>
            C/O
        </td>
		
        <td>

             <input type="text" size="25" id="co" name="co" />    
      
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
			Meddela när provet är klart
        </td>      

        <td>
        </td>      

      </tr>
	  
	  <tr>
	  
        <td>
            Mobil (SMS)
        </td>
		
        <td>
             <input type="text" id="phone" size="25" name="phone" />         
        </td>       
         
      </tr>
      
	  <tr>
        <td>
            E-post
        </td>
		
        <td>
             <input type="text" id="email" size="25" name="email" />         
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
           <input type="submit" name="submit" value="Fortsätt" />
        </td>

        <td>
        </td>      

     <tr>
     
    </table>
  </form>
</div>

<?php

include("./html/bottom.inc");

?>
