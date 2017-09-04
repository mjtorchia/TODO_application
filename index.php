


<!Doctype html>
<html>
<body>
<head>
<style>
td,th{
	border: 1px solid black;
	overflow-wrap: break-word;
}
th{
	text-align: left;
}
</style>
<title>My TODO</title>
	<h2>TODO</h2>
	


<?php

#connection information
$host='localhost';
$username='root';
$password='mike91290';
$database='todo';


#connect to database
$connection=mysqli_connect($host,$username,$password,$database); 
if(!$connection){
	die("Cannot connect: " . mysql_error());
}


#when the delete button is pressed, run the querey
if(isset($_POST['delete'])){
	$delete="DELETE FROM tasks WHERE id='$_POST[id]'";
	mysqli_query($connection,$delete);
};

if(isset($_POST['submit'])){
	#$add="DELETE FROM tasks WHERE id='$_POST[id]'";
	$add="INSERT INTO tasks (Task,Description,Priority) VALUES ('$_POST[taskname]','$_POST[desc]','$_POST[priority]')";
	mysqli_query($connection,$add);
};

#get all data from tasks table
$q="SELECT * FROM tasks";
$result=mysqli_query($connection,$q);

#table heading creation
echo "<table cellpadding=5>
		<tr>
			<!--<th>ID</th>-->
			<th>Task</th>
			<th>Description</th>
			<th>Priority</th>

		</tr>";

#fetch each row of my tasks table and output
#them in html table
while($row=mysqli_fetch_array($result)){
	echo "<form action=index.php method=post>"; #each row is its own form
	echo "<tr>";
		#echo "<td align=center>" . $row['id'] . " </td>";
		echo "<td align=left>" . $row['Task'] . "</td>";
		echo "<td>" . $row['Description'] . "</td>";
		echo "<td align=center>" . $row['Priority'] . "</td>";

		#hidden typed used to properly delete entry in the
		#if(isset) condition statement
		#$row['id'] is the same of the $row['id'] from above
		echo "<td style=display:none>" . "<input type=hidden name=id value="  . $row['id'] . " </td>";
		
		echo "<td style=border:0>" . "<input type=submit name=delete value=Delete>" . "</td>";
		echo "</tr>";
	echo "</form>";
}
echo"</table>";
echo "<br>";
echo "<form action=index.php method=post>";
echo "Add Task" . " ";
echo "<input type=text name=taskname size=5>" . " ";
echo "<br>";

echo "Priority Level" . " ";
echo "<select name=priority>
		<option value=High name=high>High</option>
		<option value=Medium name=medium>Medium</option>
		<option value=Low name=low>Low</option>
	 </select>";
echo "<br>";
echo "<br>";
echo "<textarea name=desc rows=6 cols=25 align=left>Enter task description.</textarea>";
echo "<br>";
echo "<input type=submit name=submit value=Submit>";





?>





<!-- Close database connection-->
<?php mysqli_close($connection);?>


</body>
</head>

</html>
