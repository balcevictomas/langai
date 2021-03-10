<?php
require ('connectionmysql.php');
//if($_SERVER['REQUEST_METHOD'] == "POST"){ echo 'patenku i faila';}
if(isset($_POST['action']))
{
  
  
	$sql= "SELECT * from langai where width !=''";

  if(isset($_POST['width']))
  {
    $width =$_POST['width'];
    $width = implode("','", $_POST['width']);
    
    $sql .="AND width IN('".$width."')";
    
    

  }

 $result = $mysqli->query($sql);
 if (!$result) {
  trigger_error('Invalid query: ' . $mysqli->error);
}

        
  $output ='';
  if ($result->num_rows>0)
  {
    while ($filtras=$result->fetch_assoc())
    {
      
     $output .= '<div class="card col-3 mx-3" >
<img class="card-img-top mx-auto d-block" style="width: 11rem;" src="//s7g10.scene7.com/is/image/wickes/GPID_5000003107_00" alt="Card image cap">
 <div class="card-body" >
 <h5 class="card-title text-center">'.$filtras['title'].'</h5>
  <p class="card-text">'.$filtras['description_m'].'</p>
  <h5 class="text-center">'.$filtras['price'].'&euro;</h5>
 <a href="#" class="btn btn-primary">Go somewhere</a>
  
   
   
 </div>
 </div>';
    }
  }
  else
  {
    $output ="None";
  }
  echo $output;
	

}


?>