<?php 
require('header.php');
require('connection.php');
?>

<div class = "container-fluid  " id="durysid">
<h3 class= "m-1 text-center"> Durys</h3>
<br>


  <div class="row">
    <div class="col-3">
      One of three columns
    </div>
   
    
    <div class="col-8">
    <div class ="row">
      <?php


			$result = $db->prepare("SELECT id,title,description_m, dimage,price from durys");
			$result->execute();
			$rezultatai = $result->fetchAll(PDO::FETCH_ASSOC);

     foreach ($rezultatai as $rez) {
        

    if ($rez < 3)
    {
         echo '<div class="card col-3 mx-3" >';
    }
    else
    {
      echo '<div class="card col-3 mt-2 mx-3" >';
    }
   
    ?>
    
  <img class="card-img-top mx-auto d-block" style="width: 7rem;" src="https://s7g10.scene7.com/is/image/wickes/GPID_1100344475_00?id=FTpRf3&fmt=jpg&fit=constrain,1&wid=161&hei=400" alt="Card image cap">
  <div class="card-body" >
   <?php echo' <h5 class="card-title text-center">'.$rez['title'].'</h5>'; 
   echo ' <p class="card-text">'.$rez['description_m'].'</p>'; 
   echo '<h5 class="text-center">'.$rez['price'].'</h5>';
   echo '<a href="#" class="btn btn-primary">Go somewhere</a>'; 
   ?>
    
    
  </div>
</div>
<?php } ?>
</div>
    </div>
    
  </div>



</div>























</body>