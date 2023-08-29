<?php 
  include 'database.php';
?>
<?php
$query = "select * from shouts";
$shouts = mysqli_query($con, $query);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>ShoutBox</title>
    <link href="css/style.css" rel="stylesheet" />
  </head>
  <body>
   <div id="container">
     <header>
        <h1>Shout IT!</h1>
    </header>
   <div id="shouts">
      <ul>
        <?php while ($row = mysqli_fetch_assoc($shouts)) : ?>
        <li class="shout"><span><span id="date-color"><?php echo $row['time']. ' -' ?> </span><span id="users-color"><?php echo $row['user']. ': ' ?></span><p><?php echo ucfirst($row['message']); ?></p></li>
      <?php endwhile ?>
        </ul>
       </div>
  <div id="input">
    <form method="post" action="process.php">
     <input type="text" name="user" placeholder="Enter Your Name" />
     <input type="text" name="message" placeholder="Enter a Message" />
     <br />
     <input class="shout-btn" type="submit" name="submit" value="Shout It Out" />
     </form>
  </div>
    <div id="project-repo">
    <a href="https://github.com/NekaDavaa/ShoutBox" target="_blank">Click on the link to overview the project code...</a>
    </div>
   </div>
  </body>
</html>