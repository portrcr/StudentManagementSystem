<?php
	require_once "config/db.php";

	// Adding A Student
	if ($_SERVER['REQUEST_METHOD'] === 'POST')
	{
		$name = trim($_POST['name'] ?? '');
		$email = trim($_POST['email'] ?? '');
		$phone = trim($_POST['phone'] ?? '');
		$course = trim($_POST['course'] ?? '');

		$stmt = $pdo->prepare("INSERT INTO students (name, email, phone, course) VALUES (?, ?, ?, ?)");
		$stmt->execute([$name, $email, $phone, $course]);
		header("Location: index.php?msg=Added");
		echo "Student Added Successfuly";
		exit;
	}
?>

<?php
	$title = "Enrol Student";
	require_once "includes/header.php";
?>

	<section>
		<h1>Enrol A Student</h1>

		<form action="create.php" method="post">
			<ul>
				<li>
					<label for="name">Student Name</label>
					<input type="text" id="name" name="name" placeholder="e.g. Jane Doe" required>
				</li>
				<li>
					<label for="email">Email Address</label>
					<input type="email" id="email" name="email" placeholder="jane@example.com" required>
				</li>
				<li>
					<label for="phone">Phone Number</label>
					<input type="text" id="phone" name="phone" placeholder="+254700000000">
				</li>
				<li>
					<label for="course">Course Name</label>
					<input type="text" id="course" name="course" placeholder="e.g. Computer Science" required>
				</li>
			</ul>

			<button type="submit">Submit</button>
		</form>
	</section>

<?php	require_once "includes/footer.php";	?>