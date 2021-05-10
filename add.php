<?PHP
require_once('users.php');

$users = new users();


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
?>

<div>
	<h3>Добавить</h3>
</div>
<div>
	<form action="/add.php" method="POST">
		<input type="text" name="name" placeholder="Введите имя" maxlength="255">
		<br>
		<input type="text" name="login" placeholder="Введите Логин" maxlength="255">
		<br>
		<input type="text" name="password" placeholder="Введите Пароль" maxlength="255">
		<br>
		<input type="submit" name="Отправить">
	</form>
</div>

<?PHP } ?>


<?PHP
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	if (!isset($_POST['name']) OR !isset($_POST['login']) OR !isset($_POST['password'])) {
		die('Все поля Имя, Логин и Пароль обязательны для заполнения. <a href="/">На главную >>></a> ');
	}

	$users->name 	 = htmlspecialchars($_POST['name'], ENT_QUOTES);
	$users->login 	 = htmlspecialchars($_POST['login'], ENT_QUOTES);
	$users->password = htmlspecialchars($_POST['password'], ENT_QUOTES);
	
	# Пверка введенных данных
	if (
		strlen($users->name) < 3 OR strlen($users->name) > 255 OR 
		strlen($users->login) < 3 OR strlen($users->login) > 255 OR
		strlen($users->password) < 3 OR strlen($users->password) > 255
	) {
		die('Проверка не пройдена <a href="/">На главную >>></a>');
	}

	# Добавление в базу
	$users->save();	
?>
<center>Успешно добавлено.</center>
<center>
	<a href="/">На главную >>></a>  
</center>
<?PHP } ?>