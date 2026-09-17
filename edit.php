<?php
	require_once "config/db.php";

	// Editing A Student
	if ($_SERVER['REQUEST_METHOD'] === 'POST')
	{
		$id = trim($_POST['id'] ?? '');
		

		$stmt = $pdo->prepare('SELECT 1 FROM students WHERE id = ? LIMIT 1');
		$stmt->execute([$id]);
		$exists = (bool) $stmt->fetchColumn();
		
		if($exists)
		{
			$name = trim($_POST['name'] ?? '');
			$email = trim($_POST['email'] ?? '');
			$phone = trim($_POST['phone'] ?? '');
			$course = trim($_POST['course'] ?? '');

			// $value = htmlspecialchars($student['name']);
			$sql = 'UPDATE students SET name = ?, email = ?, phone = ?, course = ? WHERE id = ?';
			$stmt = $pdo->prepare($sql);
			$stmt->execute([$name, $email, $phone, $course, $id]);
			header("Location: edit.php?msg=updated");
			exit;
		} else {
			echo "Student ID Not Found";
			exit;
		}
	}
?>

<?php
	$title = "Update Student";
	require_once "includes/header.php";
?>

	<section>
		<form action="edit.php" method="post">
			<ul>
				<input type="number" id="id" name="id" placeholder="Student ID">
				<input type="text" id="name" name="name" placeholder="Student Name">
				<input type="email" id="email" name="email" placeholder="user@email.com">
				<input type="text" id="phone" name="phone" placeholder="+254700000000">
				<input type="text" id="course" name="course" placeholder="Course Name">
			</ul>

			<button type="submit">Submit</button>
		</form>
	</section>

<?php	require_once "includes/footer.php";	?>