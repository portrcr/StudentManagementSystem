<?php
	require_once "config/db.php";

	$title = "Dashboard";
	require_once "includes/header.php";
?>

	<main>
		<h1>Dashboard</h1>

		<a href="create.php">Add A New Student</a>
		<a href="studentlist.php">List Enrolled Students</a>
		<a href="edit.php">Modify A Student's Data</a>
		<a href="delete.php">Remove A Student</a>
	</main>

<?php	require_once "includes/footer.php";	?>