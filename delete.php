<?PHP

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	header('Location: / ');
} 

require_once('users.php');

$users = new users();
?>


<?PHP
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	if (!isset($_POST['id'])) {
		die('Ошибка Id. <a href="/">На главную >>></a> ');
	}

	$deleteId 	 = htmlspecialchars($_POST['id'], ENT_QUOTES);
	
	# Пверка введенных данных
	if (!is_numeric($deleteId) AND $deleteId < 1) {
		die('Проверка id не пройдена <a href="/">На главную >>></a>');
	}

	# удаление
	$users->deleteUser($deleteId);	
?>
<center>Успешно удалено.</center>
<center>
	<a href="/">На главную >>></a>  
</center>
<?PHP } ?>