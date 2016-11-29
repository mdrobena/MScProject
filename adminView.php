<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>Admin</title>
    <script type="text/javascript" src="jquery-3.1.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" type="text/css" href="css/sticky-footer-navbar.css">
    <link rel="icon" href="image/favicon.ico">
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
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Project name</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li class="dropdown-header">Nav header</li>
                            <li><a href="#">Separated link</a></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
        <main>
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
                                    <th>Select<input type="checkbox" name=""></th>
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

    </main>
    <footer class="footer">
        <div class="container">
            <p class="text-muted">Developed by michal Drobena 2016</p>
        </div>
    </footer>
</body>
</html>
