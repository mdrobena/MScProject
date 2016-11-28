<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/r/bs-3.3.5/jq-2.1.4,dt-1.10.8/datatables.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="jquery-1.12.3.js"></script>
    <link rel="icon" href="image/favicon.ico">
    <script type="text/javascript" charset="utf-8">
                $(document).ready(function() {
                    $('#example').DataTable();

                } );
    </script>
</head>
<body>
    <main>
        <div class="container">
            <div id="example_wrapper" class="dataTables_wrapper from-inline dt-bootstrap no-footer">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="dataTables_length" id="example_length">
                            <label>
                                Show
                                <select name="example_length" aria-controls="example" class="form-control input-sm">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                                entries
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div id="example_filter" class="dataTables_filter">
                            <label>
                                Search:
                                <input type="search" class="form-control input-sm" placeholder aria-controls="example">
                            </label>
                        </div>
                    </div>
                 </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example" class="table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
                            <thead>
                                <tr role="row">
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="User ID: activate to sort column ascending" style="width: 150px;">User ID</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="First name: activate to sort column ascending" style="width: 258px;">First name</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Last name: activate to sort column ascending" style="width: 258px;">Last name</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="User name: activate to sort column ascending" style="width: 258px;">User name</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="User password: activate to sort column ascending" style="width: 258px;">User password</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Company: activate to sort column ascending" style="width: 150px;">Company</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="User role: activate to sort column ascending" style="width: 150px;">User role</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 150px;">Start date</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            include ("dbconnect.php");
                            session_start();

                            $sql = "SELECT * FROM people";
                            $result = mysqli_query($db, $sql);

                            while ($row = mysqli_fetch_assoc($result)){?>
                                <tr role="row">
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
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="dataTables_info" id="example_info" role="status" aria-live="polite"></div>
                    </div>
                    <div class="col-sm-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="example_paginate">
                            <ul class="pagination">
                                <li class="paginate_button previous" id="example_previous">
                                    <a href="#" aria-controls="example" data-dt-idx="0" tabindex="0">Previous</a>
                                </li>
                                <li class="paginate_button">
                                    <a href="#" aria-controls="example" data-dt-idx="1" tabindex="0">1</a>
                                </li>
                                <li class="paginate_button">
                                    <a href="#" aria-controls="example" data-dt-idx="2" tabindex="0">2</a>
                                </li>
                                <li class="paginate_button">
                                    <a href="#" aria-controls="example" data-dt-idx="3" tabindex="0">3</a>
                                </li>
                                <li class="paginate_button">
                                    <a href="#" aria-controls="example" data-dt-idx="4" tabindex="0">4</a>
                                </li>
                                <li class="paginate_button">
                                    <a href="#" aria-controls="example" data-dt-idx="5" tabindex="0">5</a>
                                </li>
                                <li class="paginate_button">
                                    <a href="#" aria-controls="example" data-dt-idx="6" tabindex="0">6</a>
                                </li>
                                <li class="paginate_button next" id="example_next">
                                    <a href="#" aria-controls="example" data-dt-idx="7" tabindex="0">Next</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--<script type="text/javascript">
            $('#example')
                .remove('display')
                .addClass('table table-striped table-bordered');
        </script>-->
    </main>
</body>
</html>
