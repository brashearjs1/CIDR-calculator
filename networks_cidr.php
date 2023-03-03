<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CIDR Calculator</title>
    <link href="css/mystyle.css" media="all" rel="stylesheet" />

</head>
<body>
<h1>Jacob's CIDR Calculator</h1>

<form method="GET" action="networks_cidr.php">
    <label>Enter your desired IP address: <br />
        <input id="ip" name="ip" />
    </label> <br />
    <label>Enter your slash mask: <br />
        <input type="number" id="slash" name="slash" />
    </label> <br />
    <input class="button" type="submit" value="Calculate" id="calculateButton" name="calculateButton"/>
</form>
<br />

<hr />
<section id="Mainsection">
    <?php  include("networks_snippet.php");    ?>

</section>
</body>
</html>

