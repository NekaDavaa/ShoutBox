<?php 
session_start();
include 'database.php';
?>

<?php
$query = "select * from shouts order by id desc";
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
          <li class="shout">
            <span><span id="date-color"><?php echo $row['time']. ' -' ?> </span><span id="users-color"><?php echo $row['user']. ': ' ?></span><p><?php echo ucfirst($row['message']); ?></p>
            <a href="process.php?action=delete&id=<?php echo $row['id']; ?>">Delete</a>
          </li>
          <?php endwhile ?>
        </ul>
      </div>
      <?php if (isset($_SESSION['error'])) : ?>
        <div class="error-inputs">
          <?php 
            echo $_SESSION['error']; 
            unset($_SESSION['error']);  // Unset the session error after displaying it
          ?>
        </div>
      <?php endif ?>
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
