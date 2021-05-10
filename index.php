<?PHP
require_once('users.php');

$users = new users();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<title>Тест Главная.</title>
	<link rel="stylesheet" type="text/css" href="css.css">
</head>
<body>

<div>
	<a class="s1" href="add.php">Добавить Пользователя</a>
</div>
<table class="table">
   <tr>
     <th>Name</th>
     <th>Login</th>
     <th>Password</th>
     <th></th>
   </tr>

   <?php 
   	$allUsersArray = $users->getAllUsers();
   	foreach ($allUsersArray as $row) { 
   ?>

   <tr>
     <td><?php echo $row["name"]; ?></td>
     <td><?php echo $row["login"]; ?></td>
     <td><?php echo $row["password"];?></td>
     <td>
     	<form action="/delete.php" method="POST" onsubmit="deleteConfirm();return false">
     		<input type="hidden" name="id" value="<?php echo $row['id'];?>">
     		<button >Delete</button>	
     	</form>
     </td>
   </tr>
   <?php } ?>
</table>

<script type="text/javascript">
	
function deleteConfirm(){
	if (confirm("Вы действительно хотите удалить?")) {
  		this.submit();
	} else {
  		alert("Вы нажали кнопку отмена")
	}
}

</script>

</body>
</html>