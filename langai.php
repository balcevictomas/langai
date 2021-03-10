<?php 
require('header.php');
require('connection.php');
?>

<div class = "container-fluid  " id="durysid">
<h3 class= "m-1 text-center"> Durys</h3>
<br>


  <div class="row">
    <div class="col-3">
    <section class="mb-4">

<h6 class="font-weight-bold mb-3 text-center">Condition</h6>
<div class = "m-2">
<?php
$filter = $db->prepare("SELECT DISTINCT width from langai");
$filter->execute();
$filtrai = $filter->fetchAll(PDO::FETCH_ASSOC);
foreach ($filtrai as $filtras)
{
?>
<div class="form-check ml-3 mb-3">
  <input type="checkbox" class="form-check-input filled-in" value="<?= $filtras['width']?>" id="width"> 
  
 <label class="form-check-label small text-uppercase card-link-secondary" for="new"><?= $filtras['width']?></label>
</div>

 <?php }?>
</div>
</section>
    </div>
   
    
    <div class="col-8">
    <div class ="row" id="filtras" >
      <?php


			$result = $db->prepare("SELECT id,title,description_m, dimage,price from langai");
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
    
  <img class="card-img-top mx-auto d-block" style="width: 11rem;" src="//s7g10.scene7.com/is/image/wickes/GPID_5000003107_00" alt="Card image cap">
  <div class="card-body" >
   <?php echo' <h5 class="card-title text-center">'.$rez['title'].'</h5>'; 
   echo ' <p class="card-text">'.$rez['description_m'].'</p>'; 
   echo '<h5 class="text-center">'.$rez['price'].'&euro;</h5>';
   echo '<a href="#" class="btn btn-primary">Go somewhere</a>'; 
   ?>
    
    
  </div>
</div>
<?php } ?>
</div>
    </div>
    
  </div>



</div>
<script type="text/javascript">
$(document).ready(function()
{
  $(".form-check-input").click(function()
  {
    
    var action = 'data';
    var width = get_filter_text("width");
    
    //var width = $('width').serialize();
    
   
    $.ajax(
      {
          
          url:'action.php',
          method:'POST',
          
          data:{action:action, width:width},
          
          success:function(response)
          {
            $("#filtras").html(response);
          
            
            
          }
      }
    );

  });
  function get_filter_text(text_id)
  {
    var filterData = [];
    $('#'+text_id+':checked').each(function()
    {
      filterData.push($(this).val());
      
     
     
       console.log(filterData);
      return filterData;
     

    });
  }
}
);
</script>






















