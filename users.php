<?PHP
class users {

	protected $db;

	public $name 	 = '';
	public $login 	 = '';
	public $password = '';

	public function __construct(){

		$this->db = new mysqli('192.168.1.74', 'root', '', 'testdb');

		// Check connection
		if ($this->db->connect_error) {
  			die("Connection to database failed: " . $this->db->connect_error);
		}

	}


	###
	# Сохраняем нового пользователя
	###
	public function save(){
		$this->db->query("
			INSERT INTO `users` (`name`, `login`, `password`) 
			VALUES ('".$this->name."', '".$this->login."', '".$this->password."');
		");
	}


	###
	# Выводим чписок всех юзеров
	###
	public function getAllUsers(){

		$result = $this->db->query("SELECT * FROM users;");

		if ($result->num_rows < 1) {
			die('Таблица пуста');
		}

		return $result;
	}


	###
	# Удаляем пользователя
	###
	public function deleteUser($id){
		$this->db->query("
			DELETE FROM users WHERE users.id = ".$id.";
		");
	}
	

	function __destruct() {
		mysqli_close($this->db);
	}
}
?>