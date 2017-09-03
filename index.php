


<!Doctype html>
<html>
<body>
<head>
<title>My TODO</title>
	<h1>My TODO</h1>
	<h2>TODO
	<br>
	--------</h2>


<?php

$host='localhost';
$username='root';
$password='mike91290';
$database='todo';



$connection=mysqli_connect($host,$username,$password,$database);
#if(!$connection){
#	echo 'Could not connect';
#}
#else{
#	echo nl2br("Connected\n");
#}







#if($result=mysqli_query($connection, "SELECT id FROM tasks LIMIT 10")){
#	printf("Select returned %d rows.\n",mysqli_num_rows($result));
#	mysqli_free_result($result);
#}


#echo "<th>ID</th>";
#echo "<th>Task</th>";
#echo "<th>Priority</th>";
#echo "<th>Completed</th>";



$q="SELECT * FROM tasks";
$result=mysqli_query($connection,$q);
while($row=mysqli_fetch_row($result)){

	#echo"<pre>";
	#printf("%s    %s    %s    %s\n",$row[0],$row[1],$row[2],$row[3]);
	#echo "</pre>";
	#printf ("%s (%s)\n",$row[0],$row[1]);
}





mysqli_close($connection);

?>

<?php
$shop = array( array("title"=>"rose", "price"=>1.25 , "number"=>15),
               array("title"=>"daisy", "price"=>0.75 , "number"=>25),
               array("title"=>"orchid", "price"=>1.15 , "number"=>7) 
             ); 
?>
<?php if (count($shop) > 0): ?>
<table>
  <thead>
    <tr>
      <th><?php echo implode('</th><th>', array_keys(current($shop))); ?></th>
    </tr>
  </thead>
  <tbody>
<?php foreach ($shop as $row): array_map('htmlentities', $row); ?>
    <tr>
      <td><?php echo implode('</td><td>', $row); ?></td>
    </tr>
<?php endforeach; ?>
  </tbody>
</table>
<?php endif; ?>


</body>
</head>

</html>
