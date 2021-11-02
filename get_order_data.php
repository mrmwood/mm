<?php
	require_once('config.php');


	if(isset($_POST['column']))
	{
		// $columnName = str_replace(" ","_",strtolower($_POST['column']));
		$columnName = $_POST['column'];
		// $sortOrder  = $_POST['sortOrder'];
		// echo "column name is " . $columnName . "<br>";
		// echo "sortOrder is " . $sortOrder;


		$sql = "SELECT pairingID, (SELECT studentForename FROM student WHERE studentID = pairingMentorID) mentorName, (SELECT studentForename FROM student WHERE studentID = pairingMenteeID) menteeName, teacherForename, teacherSurname, subjectName
		FROM pairing, student, subject, teacher
		WHERE pairingTeacherID = teacherID
		AND pairingSubjectID = subjectID
		AND pairingMentorID = studentID
		ORDER BY $columnName";

		$result = $mysqli->query($sql);



			while($row = $result->fetch_assoc()) {
				echo
		    "<tr>
		    <th scope='row'> " . $row["pairingID"]. "</th>" . "<td> " . $row["mentorName"]. "</td>".
		    "<td> " . $row["menteeName"]. "</td>" . "<td> " . $row["teacherForename"]. "</td>".
		    "<td> " . $row["teacherSurname"]. "</td>" . "<td> " . $row["subjectName"]. "</td></tr>"
		    ;
			}
			echo "</tbody></table>";


	}
?>
