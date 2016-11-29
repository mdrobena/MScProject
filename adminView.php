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
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/lumen/bootstrap.min.css" rel="stylesheet" integrity="sha384-gv0oNvwnqzF6ULI9TVsSmnULNb3zasNysvWwfT/s4l8k5I+g6oFz9dye0wg3rQ2Q" crossorigin="anonymous">


    <script type="text/javascript" charset="utf-8">
                $(document).ready(function() {
                    $('#table_id').DataTable({
                        "autoWidth": false
                    });

                    $('div.hidden').toggle();

                } );
    </script>
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand">Admin portal</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="adminView.php">Home</a></li>
                    <li><a href="#">Add user/admin</a></li>
                    <li><a href="#">Delete user/admin</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
        <div id="add" class="container hidden">
            <form id="addForm" class="form-horizontal">
                <fieldset>
                    <legend>Add user/admin</legend>
                    <div class="form-group">
                        <label for="firstName" class="col-lg-2 control-label">First name</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="firstName" placeholder="Fisrt name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastName" class="col-lg-2 control-label">Last name</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="lastName" placeholder="Last name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="userName" class="col-lg-2 control-label">User name</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="userName" placeholder="User name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-lg-2 control-label">Password</label>
                        <div class="col-lg-10">
                            <input type="password" class="form-control" id="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="company" class="col-lg-2 control-label">Company</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="company" placeholder="Company" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="role" class="col-lg-2 control-label">Role</label>
                        <div class="col-lg-10">
                            <select class="form-control" id="role">
                                <option>user</option>
                                <option>admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="startDate" class="col-lg-2 control-label">Start date</label>
                        <div class="col-lg-10">
                            <input type="date" class="form-control" id="startDate" placeholder="Start date" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button type="reset" id="resetButton" class="btn btn-default">Cancel</button>
                            <button type="submit" id="submitButton" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </fieldset>
            </form
        </div>

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
                                    <th>Role</th>
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
