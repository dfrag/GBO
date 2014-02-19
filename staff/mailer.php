<?php
/* Set e-mail recipient */
$myemail = "jonathan.price@creation.me.uk";
$subject = "New signup on BGO site";

/* Check all form inputs using check_input function */
$staffname = check_input($_POST['staffname'], "Enter staff members name.");
$org = check_input($_POST['org'], "Enter staff members organisation.");
$firstname = check_input($_POST['firstname'], "Enter your first name.");
$lastname = check_input($_POST['lastname'], "Enter your second name.");
$dob = check_input($_POST['dob'], "Enter your date of birth.");
$postc = check_input($_POST['postc'], "Enter your current post code.");
$intro = check_input($_POST['intro'], "Enter the name of the person who introduced you.");

/* If e-mail is not valid show error message */
/*if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))*/
/*{*/
/*show_error("E-mail address not valid");*/
/*}*/

/* Let's prepare the message for the e-mail */
$message = "
Staff Information
=================
Staff Name: $staffname
Organisation: $org

Beneficiary Information
=======================
First Name: $firstname
Last Name: $lastname
Date of Birth: $dob
Post Code: $postc
Introduced By: $intro
";

/* Send the message using mail() function */
mail($myemail, $subject, $message);

/* Redirect visitor to the thank you page */
header('Location: http://getbonline.co.uk/gbo/resources/index.html');
exit();

/* Functions we used */
function check_input($data, $problem='')
{
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
if ($problem && strlen($data) == 0)
{
show_error($problem);
}
return $data;
}

function show_error($myError)
{
?>
<html>
<head> 
    <title>Get Bridgend Online</title>
    <meta charset="utf-8">
    <link href="http://getbonline.co.uk/gbo/css/style.css" media="screen" rel="stylesheet" type="text/css"/>
    <link rel="favicon" href="favicon.ico">
</head>
<body>
    <!-- top of page anchor -->
    <!--<a id='top'>&nbsp;</a>-->
    <!-- whole page container -->
    <div id='container'>
        <!-- Page -->
        <div id='page'>
            <!-- logo -->
            <div id='logo'>
                <img src='http://getbonline.co.uk/gbo/media/logo.png' />
            </div>
            <!-- logo end -->
            <!-- content -->
            <div id='content'>
                <div class='article'>
                    <h1>Error!</h1>
                    <p>Please correct the following error:</p>
                    <strong><?php echo $myError; ?></strong>
					<p>Hit the back button and try again</p>
                    <!--<div id='toplink'><a href="index.html#top">To top of page.</a></div>-->
                </div>
            </div>
            <!-- content end -->
            <div id='foot'>
                <h6><a href="http://www.dfdd.co.uk" target="_blank">Created by DFDD.</a></h6>
            </div>
        </div>
        <!-- page end -->
        <!-- foot -->
        <!--<div id='nav'>
            <div id='navbuttons'>
                <a href="http://www.getbonline.co.uk">Return to Get Bridgend Online.</a>
            </div>
        </div>-->
        <!-- foot end -->
    </div>
    <!-- container end -->
</body>
</html>

<?php
exit();
}
?>