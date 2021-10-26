<table border="1">
	<tbody>
		
<?php 
$dsn = "localhost";
$user = "root";
$pass = "";
$db = "subject_evaluation";
$conn = mysqli_connect($dsn, $user, $pass, $db);

$grades = mysqli_query($conn, "SELECT * 
				FROM
				    `grades`
				LEFT JOIN `student_subjects` ON `grades`.stud_subject_id = `student_subjects`.id
				LEFT JOIN `prospectus` ON `student_subjects`.subject_id = `prospectus`.id
				LEFT JOIN `subject` ON `prospectus`.subject_id = `subject`.id
				WHERE `grades`.student_id = 84 AND `grades`.semester = 1 AND `grades`.level = 1 AND `grades`.gwa < 75 ");

$student_subjects = mysqli_query($conn, "SELECT * FROM `student_subjects` WHERE curriculum_id = 2 AND semester = 1 AND year_level = 1");
$prospectus = mysqli_query($conn, "SELECT * FROM `prospectus` LEFT JOIN subject on prospectus.subject_id = subject.id  WHERE curriculum_id = 2 AND semester = 2 AND curriculum_level_id = 5 ");
$filter_array = "";

// foreach ($student_subjects as $key => $val) {
while ($row = mysqli_fetch_assoc($prospectus)) {
	
	foreach ($grades as $key => $value) {
		if ($value['subject_code'] == $row['prerequisite']) { 
					print("<tr>");
						print("<td><p style='color: red;'>".$row['subject_code']."</p></td>");
					print("</tr>");
			$filter_array .= ",".$value['subject_code'];
		}
	}

	if (in_array($row['prerequisite'], array($filter_array))) {
		echo "<tr>";
		echo "<td>".$row['subject_code']."</td>";
		echo "</tr>";
	}
}

print "<br>";

echo $filter_array;

?>
	</tbody>
</table>