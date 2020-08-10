<?php
include ("connection.php");
if(isset($_POST['delete']))
{
    $id_to_delete = mysqli_real_escape_string($conn,$_POST['id_to_delete']);
    $sql = "DELETE FROM recepie WHERE id = $id_to_delete";
    if(mysqli_query($conn,$sql))
    {
        header('Location: index.php');
    }{
        echo "Err" . mysqli_error($conn);
    }
}
    if(isset($_GET['id']))
    {
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $sql = "SELECT * FROM recepie WHERE id = $id";
        $result = mysqli_query($conn,$sql);
        $recepie = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        mysqli_close($conn);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="https://cdn1.iconfinder.com/data/icons/cooking-15/34/13-512.png" type="image/icon type">
    <title>CookBook.co</title>
</head>
<body>
    <?php include("head.php"); ?><br><br><br>
    <div class="container center white">
        <?php if($recepie):?><br>
            <h4><?php echo htmlspecialchars($recepie['title']) ?></h4>
            <p>Created by : <?php echo htmlspecialchars($recepie['email'])?></p>
            <p>Created at : <?php echo date($recepie['created_at'])?></p>
            <h5>Ingredients:</h5>
            <p><?php echo htmlspecialchars($recepie['ingredients'])?></p>
            <form action="info.php" method="POST">
                <input type="hidden" name="id_to_delete" value="<?php echo $recepie['id'];?>">
                <input type="submit" name="delete" value="Delete" class="btn z-depth-0 red">
                <a href="index.php" class="btn z-depth-0 blue">To Homepage</a>
            </form> <br>
        <?php else:?>
            <h4 class="center">No Such Recepie exists!</h4>
        <?php endif;?>
    </div>
    <?php include("foot.php"); ?>
</body>
</html>