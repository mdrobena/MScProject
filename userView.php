<?php
include ("dbconnect.php");
session_start();

if(isset($_SESSION['login_user']) && $_SESSION['login_role'] == "user"){

?>
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

    <title>User</title>

    <!-- Bootstrap minified CSS -->
    <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="css/adminView.css">


</head>
<body>
<div id="master">
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
                    <a class="navbar-brand">User portal</a>
                </div>

                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="nav navbar-nav">
                        <li id="addButtonNavBar"><a href="#">Add user/admin</a></li>
                        <li id="deleteButtonNavBar"><a href="#">Delete user/admin</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><form id="signOutButton" action="logout.php" style="margin: auto"><input type="submit" value="Sign out" ></form></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>
        <div class="iframe">
            <iframe src="https://idsdatanet.shinyapps.io/Test/" width="600px" height="800px" style="border: none"></iframe>
        </div>

        <div class="footer">
            <p>Developed by Michal Drobena 2016</p>
        </div>
    </div>



    <!--jQuery library-->
    <script type="text/javascript" src="jquery-3.1.1.min.js"></script>

    <!-- Bootstrap minified JavaScript -->
    <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

    <script type="text/javascript" charset="utf-8">
        $(document).ready(function() {
            $.fn.dataTable.moment('DD/MM/YYYY');

            $('#table_id').DataTable();


            $('#addForm').toggle();
            $('#deleteForm').toggle();

            $('#addButtonNavBar').click(function(){
                $('#addForm').toggle();
                $('#deleteForm').hide();
            });

            $('#deleteButtonNavBar').click(function(){
                $('#deleteForm').toggle();
                $('#addForm').hide();
            });

            $('#resetAddFormButton').click(function(){
                $('#addForm').hide();
            });

            $('#resetDeleteFormButton').click(function(){
                $('#deleteForm').hide();
            });

        });
    </script>
</div>
</body>

</html>
<?php }
else{
header("location:login.php");
exit();
}
?>