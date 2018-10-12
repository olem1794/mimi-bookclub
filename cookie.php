
<?php
@ob_start();
session_start();
?>

<?php
if (isset($_COOKIE['counter']))
    $count = $_COOKIE['counter'];
else
    $count = 0;
$count = $count + 1; is 5
setcookie('counter', $count, time() + 24 * 3600, '/', 'localhost', false);
// here it overrides and resets, thats why is at the end
?>
<html>
    <head>
        <title>Counting with a cookie</title>
    </head>
    <body>
        <FORM action="cookie.php" method="GET">
            <INPUT type="submit" name="Count" value="Count">
            <?php
            echo "count is $count";
            ?>
        </FORM>
    </body>
</html>
