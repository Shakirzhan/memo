<?

try {
	$db = new PDO('mysql:host=localhost;dbname=testing', '$user', '$pass');
} catch (PDOException $e) {
	print "Error!: " . $e->getMessage() . "<br/>";
	die();	
}

$stmt = $db->query('SELECT * FROM users');
$rows = $stmt->fetchAll();

$stmt = $db->prepare("SELECT * FROM table WHERE id = ? AND name = ?");
$stmt->bindValue(1, $id, PDO::PARAM_INT);
$stmt->bindValue(2, $name, PDO::PARAM_STR);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $db->prepare("UPDATE users set email = :email where lastname = :lastname");
$stmt->bindParam(':lastname', $lastname);
$stmt->bindParam(':email', $email);
$lastname = "Smith";
$email = "newmail@test.com";
$stmt->execute();

$stmt = $db->prepare("INSERT INTO users (firstname, lastname, email) VALUES (:firstname, :lastname, :email)");
$stmt->bindParam(':firstname', $firstname);
$stmt->bindParam(':lastname', $lastname);
$stmt->bindParam(':email', $email);
$firstname = "John";
$lastname = "Smith";
$email = "john@test.com";
$stmt->execute();