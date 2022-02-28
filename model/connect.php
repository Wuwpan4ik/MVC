<?php 
class Database {
	private $link;

	public function __construct() {
		$this->connect();
	}

	public function connect() {
		include_once 'constant.php';
		
		$dsn = 'mysql:host='. HOST .';dbname='. db_name .';charset='. charset ;

		$this->link = new PDO($dsn, username, password);

		return $this;
	}

	public function execute($sql) {
		$sth = $this->link->prepare($sql);
		
		return $sth->execute();
	}

	public function query($sql) {
		$sth = $this->link->prepare($sql);
		$sth->execute();
		$result = $sth->fetchALL(PDO::FETCH_ASSOC);

		if ($result === false) {
			return ;
		}

		return $result;
	}
};
global $db;
$db = new Database();
?>	