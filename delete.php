<?php
	require_once "config/db.php";

	// Deleting A Student
	if ($_SERVER['REQUEST_METHOD'] === 'POST')
	{
		$id = trim($_POST['id'] ?? '');
		$name = trim($_POST['name'] ?? '');

		$sql = 'SELECT 1 FROM students WHERE id = ? AND name = ?';
		$stmt = $pdo->prepare($sql);
		$stmt->execute([$id, $name]);
		$exists = $stmt->fetchColumn();

		if ($exists)
		{
			$sql = 'DELETE FROM students WHERE id = ? AND name = ?';
			$stmt = $pdo->prepare($sql);
			$stmt->execute([$id, $name]);
			
			echo "Student info cleared";
			header("Location: delete.php?msg=deleted");
			exit;
		}
		else
		{
			echo "Student Not Found in system";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
		}
	}
?>

<?php
	$title = "Delete Student Info";
	require_once "includes/header.php";
?>
	<section>
		<h1>Remove A Student</h1>

		<form action="delete.php" method="post">
			<ul>
				<li>
					<label for="id">Student ID</label>
					<input type="number" id="id" name="id" placeholder="Student ID" required>
				</li>
				<li>
					<label for="name">Student Name</label>
					<input type="text" id="name" name="name" placeholder="Student Name" required>
				</li>
			</ul>

			<button type="submit" class="danger">Delete Student</button>
		</form>
	</section>

<?php	require_once "includes/footer.php";	?>