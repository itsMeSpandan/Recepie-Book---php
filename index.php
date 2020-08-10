<?php
  include 'connection.php';
  $sql = 'SELECT title, ingredients, id FROM recepie ORDER BY created_at';
  $result = mysqli_query($conn,$sql);
  $recepies = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_free_result($result);
  mysqli_close($conn);
  //print_r($recepie);
  //print_r (explode(',',$recepies[0]['ingredients']));
?>
<!DOCTYPE html>
<html lang="en">

 <?php include "head.php"; ?>
 <h4 class="center white-text">Recepie</h4>
 <div class="container">
   <div class="row">
     <?php foreach($recepies as $recepie): ?>
      <div class="col s12 m12">
        <div class="card z-depth-0">
          <div class="card-content">
            <h6 style="text-transform: uppercase;" class="center"><?php echo htmlspecialchars($recepie['title']);?></h6>
            <h6>
              <ul class="collection" >
                <?php foreach(explode(',',$recepie['ingredients']) as $ing):?>
                  <li class="collection-item" style="border-bottom: 2px solid red; border-left:2px solid red"><?php echo htmlspecialchars($ing);?></li>
                <?php endforeach;?>
              </ul>
            </h6> 
          </div>
          <div class="card-action center-align">
            <a href="info.php?id=<?php echo $recepie['id'] ?>" class="btn red z-depth-0">More Info</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
   </div>
 </div>
 <?php include "foot.php"; ?>