<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="DataTables/Bootstrap-3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="DataTables/DataTables-1.10.12/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.css">
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>
    <script type="text/javascript" src="jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="jquery-1.12.3.js"></script>
    <link rel="icon" href="image/favicon.ico">
</head>
<body>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
    <main>
        <div id="table">
            <?php
                include ("dbconnect.php");
                session_start();

                $sql = "SELECT * FROM people";
                $result = mysqli_query($db, $sql);

                $count = mysqli_num_rows($result);

                if ($count > 0){?>
                    <table id="example" class="display compact" cellspacing="0" width="960px">
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
                        <?php while ($row = mysqli_fetch_assoc($result)){?>
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
