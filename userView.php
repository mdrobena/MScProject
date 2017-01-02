<?php
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
                    <a class="navbar-brand" >User portal</a>
                </div>

                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="nav navbar-nav">
                        <li id="aboutButtonNavBar"><a href="#">About</a></li>
                        <li id="helpButtonNavBar"><a href="#">Help</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="logout.php">Log out</a></form></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>

        <!--About form starts here-->
        <form id="aboutForm" class="form-horizontal">
            <fieldset>
                <legend>About this application</legend>
                <div class="form-group">
                    <div class="col-lg-12">
                        <p>This application aims to predict the amount of day it will take to drill a well. The time calculated represents the productive time only, e.g. only the time that actively contributes to the delivery of the well. The non-productive time, e.g. waiting-on-weather is not included in the prediction. Please note: All physical variables have to be entered in metric units!</p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-11">
                        <button type="submit" id="closeAboutFormButton" class="btn btn-primary">Close</button>
                    </div>
                </div>
            </fieldset>
        </form>
        <!--About form ends here-->

        <!--Help form starts here-->
        <form id="helpForm" class="form-horizontal">
            <fieldset>
                <legend>Help</legend>
                <div class="form-group">
                    <div class="col-lg-10">
                        <p>If you have any question regarding this product please contact us at support@well.org or 004659784654.</p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-11">
                        <button type="submit" id="closeHelpFormButton" class="btn btn-primary">Close</button>
                    </div>
                </div>
            </fieldset>
        </form>
        <!--Help form ends here-->

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

            $('#aboutForm').toggle();
            $('#helpForm').toggle();

            $('#aboutButtonNavBar').click(function(){
                $('#aboutForm').toggle();
                $('#helpForm').hide();
            });

            $('#helpButtonNavBar').click(function(){
                $('#helpForm').toggle();
                $('#aboutForm').hide();
            });

            $('#closeAboutFormButton').click(function(){
                $('#aboutForm').hide();
            });

            $('#closeHelpFormButton').click(function(){
                $('#helpForm').hide();
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