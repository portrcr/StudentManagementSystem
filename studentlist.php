<?php
require_once "config/db.php";
$title = "Enrolled Students";
require_once "includes/header.php";

$stmt = $pdo->query('SELECT * FROM students ORDER BY id DESC');
$students = $stmt->fetchAll();
?>

<section class="wide">
	<h1>Enrolled Students</h1>

	<?php if (empty($students)): ?>
		<p style="color: var(--text-muted);">No students enrolled yet.</p>
	<?php else: ?>
		<table>
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Course</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($students as $student): ?>
					<tr>
						<td><?= htmlspecialchars($student['id']); ?></td>
						<td><?= htmlspecialchars($student['name']); ?></td>
						<td><?= htmlspecialchars($student['email']); ?></td>
						<td><?= htmlspecialchars($student['phone'] ?? '-'); ?></td>
						<td><?= htmlspecialchars($student['course']); ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	<?php endif; ?>
</section>

<?php require_once "includes/footer.php"; ?>