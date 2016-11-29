<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="admin's view" content="">
    <meta name="Michal Drobena" content="">
    <link rel="icon" href="image/favicon.ico">

    <title>Admin</title>

    <script type="text/javascript" src="jquery-3.1.1.min.js"></script>
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.css">

    <!-- Custom styles for this template -->
    <link href="css/sticky-footer-navbar.css" rel="stylesheet">


    <script type="text/javascript" charset="utf-8">
                $(document).ready(function() {
                    $('#table_id').DataTable({
                        "autoWidth": false
                    });

                } );
    </script>
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li></li><p>Admin portal</p></li>
                    <li><a class="b" href="adminView.php">Home</a></li>
                    <li><a href="#">Add user/admin</a></li>
                    <li><a href="#">Delete user/admin</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>

                    <div class="container">
                        <table id="table_id" class="display">
                            <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>First name</th>
                                    <th>Last name</th>
                                    <th>User name</th>
                                    <th>User password</th>
                                    <th>Company</th>
                                    <th>User role</th>
                                    <th>Start date</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            include ("dbconnect.php");
                            session_start();

                            $sql = "SELECT * FROM people";
                            $result = mysqli_query($db, $sql);

                            while ($row = mysqli_fetch_assoc($result)){?>
                                <tr>
                                    <td><?php echo $row['user_id']?></td>
                                    <td><?php echo $row['first_name']?></td>
                                    <td><?php echo $row['last_name']?></td>
                                    <td><?php echo $row['user_name']?></td>
                                    <td><?php echo $row['user_password']?></td>
                                    <td><?php echo $row['company']?></td>
                                    <td><?php echo $row['user_role']?></td>
                                    <td><?php echo $row['start_date']?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>


    <footer class="footer">
        <div class="container">
            <p class="text-muted">Developed by Michal Drobena 2016</p>
        </div>
    </footer>
</body>
</html>
