<?php
ob_start();
session_start();

include("dbh-inc.php");
include("functions.php");


$val = $_GET["value"];

$val_M = mysqli_real_escape_string($conn, $val);

if($result && mysqli_num_rows($result) > 0)
{
	echo "<select id='office' name='office' onchange='my_other_fun(this.value);'>";

	while ($rows = mysqli_fetch_assoc($result))
	{
	    $office_id = $rows["office_id"];
	    $street = $rows["street_address"];
	    $city = $rows["city"];
	    $state = $rows["state"];
	    $zip = $rows["zip"];

	    echo "<option value='$office_id'>$street $city $state $zip</option>";
	}
	echo "</select>";
}
?>