
<?php
include 'header.php';



// Include config file
require_once "config.php";

$sql = "SELECT pairingID, (SELECT studentForename FROM student WHERE studentID = pairingMentorID) mentorName, (SELECT studentForename FROM student WHERE studentID = pairingMenteeID) menteeName, teacherForename, teacherSurname, subjectName
FROM pairing, student, subject, teacher
WHERE pairingTeacherID = teacherID
AND pairingSubjectID = subjectID
AND pairingMentorID = studentID";

$result = $mysqli->query($sql);
?>

<style>
.sort-heading{
	cursor:pointer;
}
</style>

<h1>hey there a</h1>

<table class="table table-striped table-hover">
<thead>
<tr>
  <th scope="col" class="sort-heading" id="PairingID-asc">PairingID</th>
  <th scope="col" class="sort-heading" id="mentorName-asc">Mentor Name</th>
  <th scope="col" class="sort-heading" id="menteeName-asc">Mentee Name</th>
  <th scope="col" class="sort-heading" id="teacherForename-asc">Teacher Forename</th>
  <th scope="col" class="sort-heading" id="teacherSurname-asc">Teacher Surname</th>
  <th scope="col" class="sort-heading" id="subjectName-asc">Subject Name</th>
</tr>
</thead>
<tbody>


<?php

if ($result->num_rows > 0) {

  // output data of each row
  while($row = $result->fetch_assoc()) {

    echo
    "<tr>
    <th scope='row'> " . $row["pairingID"]. "</th>" . "<td> " . $row["mentorName"]. "</td>".
    "<td> " . $row["menteeName"]. "</td>" . "<td> " . $row["teacherForename"]. "</td>".
    "<td> " . $row["teacherSurname"]. "</td>" . "<td> " . $row["subjectName"]. "</td></tr>"
    ;

    // echo "
    // pairingID: " . $row["pairingID"]. "mentorName: " . $row["mentorName"]. "menteeName" . $row["menteeName"]. "<br>
    //
    // ";


  }
  echo "</tbody></table>";
} else {
  echo "No results were found";
}
$mysqli->close();
?>


<script>
	$(document).ready(function(){
		$(".sort-heading").click(function(){
			//get data-nex-order value
			var getSortHeading = $(this);
			var getNextSortOrder = getSortHeading.attr('id');
      console.log(getNextSortOrder);
			var splitID = getNextSortOrder.split('-');

			var splitIDName = splitID[0];
			var splitOrder = splitID[1];
      //splitIDName is the name of the field in my database e.g. mentorName
      console.log(splitIDName);
      console.log(splitOrder);

			//get current td value
			var getColumnName = getSortHeading.text();
      console.log(getColumnName);

			$.ajax({
				url:'get_order_data.php',
				type:'post',
				data:{'column':splitIDName,'sortOrder':splitOrder},
				success: function(response){
					if(splitOrder == 'asc')
					{
						getSortHeading.attr('id',splitIDName+'-desc');
					}
					else
					{
						getSortHeading.attr('id',splitIDName+'-asc');
					}

					$(".table tr:not(:first)").remove();
					$(".table").append(response);
				}
			});

		});
	});
</script>


<?php
include 'footer.php';
?>
