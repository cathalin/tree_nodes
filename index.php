<!DOCTYPE html>
<html>
<head>
    <title>cPanel Account Creator</title>

    <link href="css/jquery-ui.custom.min.css" rel="stylesheet" type="text/css"/>
    <link href="css/jquery-ui-slider-pips.css" rel="stylesheet" type="text/css"/>
    <link href="css/style.css" type="text/css" rel="stylesheet"/>

    <script src="js/jquery.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/jquery-ui-slider-pips.js"></script>
    <script src="js/packages.js"></script>

</head>
<body>


<section class="container">
    <div class="login">
        <h1>Create cPanel Account</h1>

        <div id="msg" style="display: none"></div>
        <!-- If you wanna integrate the plugin into your site just copy the form bellow and integrate the js and css files into your site -->

        <!-- form start -->
        <form method="post" action="" onsubmit="return false;">
            <p><input type="text" name="domain" class="domain" value="" placeholder="yourdomain.com"></p>

            <p><input type="text" name="username" class="username" value="" placeholder="Username" MAXLENGTH="8"></p>

            <p><input type="password" name="password" class="password" value="" placeholder="Password"></p>

            <p><input type="text" name="email" class="cemail" value="" placeholder="E-Mail-Address"></p>

            <div id="slider">
                <div class="slider-pkg"></div>
            </div>

            <ul class="pkg-details">

            </ul>

            <div style="clear: both"></div>

            <p class="submit">
                <input type="submit" name="commit" value="submit">
            </p>
        </form>
        <!-- form end -->

    </div>

</section>

<section class="about">
    <p class="about-links">
        <a href="javascript:history.back()" target="_parent">Back to Website</a>
        <a href="http://ladensia.com/product/cpanel-user-account-creator/" target="_parent">Download</a>
    </p>
</section>


</body>
</html>

