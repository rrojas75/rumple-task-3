<?php 
  
    $link = mysqli_connect("localhost","root","", "rumple_task");
    
    if(mysqli_connect_errno()) {

      die("Database connection error.");

    }

    $query ="SELECT U.Id as Id, CONCAT(first_name, ' ', last_name) AS Fullname, GROUP_CONCAT(Name SEPARATOR ', ')  AS Team FROM `users` U INNER JOIN `teams_users` TU ON U.Id = TU.user_id INNER JOIN teams T ON T.Id = TU.team_id GROUP BY U.Id ORDER BY U.Id";
  
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

    <title>Rumple - Task 3</title>

    <style type="text/css">
      
        .container {

            margin-top: 100px;
        }

    </style>
  </head>
  <body>
    
     <div class="container">
     
          <table class="table">
            <thead>
              <tr>
                <th>Id</th>
                <th>User</th>
                <th>Teams</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                  $result = mysqli_query($link,$query);

                  while($row = mysqli_fetch_array($result)) { ?>

                  <tr>
                    <td><?php echo $row['Id']; ?></td>
                    <td><?php echo $row['Fullname']; ?></td>
                    <td><?php echo $row['Team']; ?></td>
                  </tr>
             
              <?php  } ?>
            </tbody>
          </table>
          
       </div>

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </body>
</html>
