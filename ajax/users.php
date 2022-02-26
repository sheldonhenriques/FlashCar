<?php

$connect = mysqli_connect("localhost", "root", "root", "cars");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM car
	WHERE name LIKE '%".$search."%'
	OR mileage LIKE '%".$search."%'
	OR availability LIKE '%".$search."%'
	OR city LIKE '%".$search."%';";
}
else
{
	$query = "SELECT * FROM car ORDER BY id;";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '
	<div class="table-responsive">
	<table class="table table-hover">
	<thead class="thead-dark">
		<tr>
			<th scope="col">ID</th>
			<th scope="col">Name</th>
			<th scope="col">Mileage</th>
			<th scope="col">Availability</th>
			<th scope="col">City</th>
		</tr>
	</thead>
	<tbody>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
		<tr>
			<th scope="row">'.$row["id"].'</th>
			<td>'.$row["name"].'</td>
			<td>'.$row["mileage"].'</td>
			<td>'.$row["availability"].'</td>
			<td>'.$row["city"].'</td>
		</tr>';
	}
	$output .= '</tbody></table>';
	echo $output;
}
else
{
	echo 'No such cars found';
}

?>
