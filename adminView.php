<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>Admin</title>
    <script type="text/javascript" src="jquery-3.1.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>
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
    <main>

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

    </main>
</body>
</html>
