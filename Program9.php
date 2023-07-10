<!DOCTYPE html>
<html>
<head>
    <title>Regex</title>
</head>

<body>
<?php
$string = "Mississippi Alabama Texas Massachusetts Kansas";
$statesList = [];
$states = explode(' ', $string);
echo "Original String Array :<br>";
foreach ($states as $i => $value)
    print("STATES[$i]=$value<br>");

foreach ($states as $state) {
    if (preg_match('/xas$/', ($state)))
        $statesList[0] = ($state);

    if (preg_match('/^k.*s$/i', ($state)))
        $statesList[1] = ($state);

    if (preg_match('/^M.*s$/', ($state)))
        $statesList[2] = ($state);

    if (preg_match('/a$/', ($state)))
        $statesList[3] = ($state);
}

echo "<br><br>StatesList Array :<br>";
for ($i = 0; $i < 4; $i++)
    print("StatesList[$i]=$statesList[$i]<br>");
?>
</body>
</html>