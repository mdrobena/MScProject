<!DOCTYPE html>
<html lang="en">
<head>
    <!-- These 3 meta tags must come first in the head-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- any other head content must come *after* these tags -->

    <!--My favicon logo-->
    <link rel="icon" href="image/favicon.ico">

    <title>Admin</title>

    <!-- Bootstrap minified CSS -->
    <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">

    <!--DataTables CSS sheet-->
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.css">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="css/adminView.css">


</head>

<body>
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar">l</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand">Admin portal</a>
                </div>

                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="nav navbar-nav">
                        <li><a href="adminView.php">Home</a></li>
                        <li id="addButtonNavBar"><a href="#">Add user/admin</a></li>
                        <li><a href="#">Delete user/admin</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><form action="index.html"><input type="button" value="Sign out"></form></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>
    </div>

    <div class="container">
        <form id="addForm" class="form-horizontal">
            <fieldset>
                <legend>Add user/admin</legend>
                <div class="form-group">
                    <label for="firstName" class="col-lg-2 control-label">First name</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="firstName"  placeholder="First name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastName" class="col-lg-2 control-label">Last name</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="lastName"  placeholder="Last name" required>
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

        <p class="text-muted">Developed by Michal Drobena 2016</p>

</footer>

    <!--jQuery library-->
    <script type="text/javascript" src="jquery-3.1.1.min.js"></script>

    <!-- Bootstrap minified JavaScript -->
    <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

    <!--DataTables javascript file-->
    <script type="text/javascript" charset="utf8" src="DataTables/DataTables-1.10.12/js/jquery.dataTables.js"></script>

    <script type="text/javascript" charset="utf-8">
        $(document).ready(function() {
            $('#table_id').DataTable();

            $('#addForm').toggle();

            $('#addButtonNavBar').click(function(){
                $('#addForm').show();
            });
            $('#resetButton').click(function(){
                $('#addForm').hide();
            });



        } );
    </script>

</body>
</html>
