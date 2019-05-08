<?

try {
	$db = new PDO('mysql:host=localhost;dbname=testing', '$user', '$pass');
} catch (PDOException $e) {
	print "Error!: " . $e->getMessage() . "<br/>";
	die();	
}