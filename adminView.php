<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Pro</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
    <link href="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js">
    <link href="https://code.jquery.com/jquery-1.12.3.js">
    <link rel="icon" href="image/favicon.ico">
    <script src="jquery-3.1.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
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
                        <tfoot>
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
                        </tfoot>
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
                <?php }
                ?>
        </div>
    </main>
</body>


</html>
