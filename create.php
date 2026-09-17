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

<?php	require_once "includes/header.php";	?>

	<section>
		<form action="create.php" method="post">
			<ul>
				<input type="text" id="name" name="name" placeholder="Student Name">
				<input type="email" id="email" name="email" placeholder="user@email.com">
				<input type="text" id="phone" name="phone" placeholder="+254700000000">
				<input type="text" id="course" name="course" placeholder="Course Name">
			</ul>
			
			<button type="submit">Submit</button>
		</form>
	</section>

<?php	require_once "includes/footer.php";	?>