<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
table,
tr,
td,
th {
border: 2px solid rgb(11, 247, 180);
width: 40%;
height: 30px;
text-align: center;
border-collapse: collapse;
background-color: rgb(182, 250, 227);
color: rgb(9, 126, 172);
font-size: 20px;
}

.table {
margin: 0 auto;
}
.sort{
    margin-top: 20px;
    padding: 10px;
    background-color: aqua;
    color: black;
    font-size: larger;
    border-radius: 15px;
}
</style>

<body>
    <?php
    // Database configuration
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'weblab';

    // Establish a connection to the database
    $connection = mysqli_connect($host, $username, $password, $database);

    // Check if the connection was successful
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve student records from the "student" table
    $query = "SELECT * FROM weblab";
    $result = mysqli_query($connection, $query);

    // Check if records were retrieved successfully
    if (!$result) {
        die("Error retrieving student records: " . mysqli_error($connection));
    }

    // Fetch all records into an array
    $students = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $students[] = $row;
    }

    // Create a copy of the unsorted student records
    $unsortedStudents = $students;

    // Sort the student records based on the "usn" field
    function sortStudents(&$students)
    {
        $length = count($students);
        for ($i = 0; $i < $length - 1; $i++) {
            $minIndex = $i;
            for ($j = $i + 1; $j < $length; $j++) {
                if ($students[$j]['usn'] < $students[$minIndex]['usn']) {
                    $minIndex = $j;
                }
            }
            // Swap the records
            $temp = $students[$minIndex];
            $students[$minIndex] = $students[$i];
            $students[$i] = $temp;
        }
    }

    // Check if the sort button was clicked
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['sort'])) {
            // Sort the student records
            sortStudents($students);
        }
    }

    // Display the unsorted student records
    echo "<h2>Unsorted Student Records</h2>";
    echo "<table>";
    echo "<tr><th>USN</th><th>Name</th><th>Course</th></tr>";
    foreach ($unsortedStudents as $student) {
        echo "<tr>";
        echo "<td>" . $student['usn'] . "</td>";
        echo "<td>" . $student['name'] . "</td>";
        echo "<td>" . $student['course'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    // Display the sorted student records
    echo "<h2>Sorted Student Records</h2>";
    echo "<table>";
    echo "<tr><th>USN</th><th>Name</th><th>Course</th></tr>";
    foreach ($students as $student) {
        echo "<tr>";
        echo "<td>" . $student['usn'] . "</td>";
        echo "<td>" . $student['name'] . "</td>";
        echo "<td>" . $student['course'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    // Close the database connection
    mysqli_close($connection);
    ?>

    <!-- HTML form with the sort button -->
    <form method="post">
        <input type="submit" class="sort" name="sort" value="Sort">
    </form>

</body>

</html>