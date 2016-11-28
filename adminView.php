<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="jquery-3.1.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
    <link rel="icon" href="image/favicon.ico">
</head>
<body>
    <main>
        <div id="table">
            <?php
                include ("dbconnect.php");
                session_start();

                $sql = "SELECT * FROM people";
                $result = mysqli_query($db, $sql);

                $count = mysqli_num_rows($result);
                $row = $result -> fetch_assoc();
                $role = $row['user_role'];

                if ($count > 0){?>
                    <table id="example" class="display" cellspacing="0" width="100%">
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
                        <tbody><?php while ($row = mysqli_fetch_assoc($result)){?>
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
                <?php }
                ?>
        </div>
    </main>
</body>


</html>
