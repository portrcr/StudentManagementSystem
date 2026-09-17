<?php
	require_once "config/db.php";

	// Editing A Student
	if ($_SERVER['REQUEST_METHOD'] === 'POST')
	{
		$id = trim($_POST['id'] ?? '');
		
		$sql = 'SELECT 1 FROM students WHERE id = ? LIMIT 1';
		$stmt = $pdo->prepare($sql);
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
		<h1>Modify Student Data</h1>

		<form action="edit.php" method="post">
			<ul>
				<li>
					<label for="id">Student ID</label>
					<input type="number" id="id" name="id" placeholder="Enter Student ID" required>
				</li>
				<li>
					<label for="name">New Name</label>
					<input type="text" id="name" name="name" placeholder="Student Name" required>
				</li>
				<li>
					<label for="email">New Email</label>
					<input type="email" id="email" name="email" placeholder="user@email.com" required>
				</li>
				<li>
					<label for="phone">New Phone</label>
					<input type="text" id="phone" name="phone" placeholder="+254700000000">
				</li>
				<li>
					<label for="course">New Course</label>
					<input type="text" id="course" name="course" placeholder="Course Name" required>
				</li>
			</ul>

			<button type="submit">Update Student</button>
		</form>
	</section>

<?php	require_once "includes/footer.php";	?>