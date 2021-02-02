<?php 
class DB {
  /* String $host */
  private $host = 'localhost';

  /* String $dname */
  private $dname = 'testphp';

  /* String $charset */
  private $charset = 'utf8';

  /* String $username */
  private $username = 'homestead';

  /* String $password */
  private $password = 'secret';

  /* Object $db */
  private $db;

  /* String $tableName */
  private $tableName = 'main';

  public function __construct()
  {
    $this->db = new \PDO("mysql:host={$this->host};dbname={$this->dname};charset={$this->charset}", $this->username, $this->password, array(
      \PDO::ATTR_EMULATE_PREPARES => false,
      \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
    ));
  }

  /*
  * Create table
  *
  * @return Boolean
  */
  public function create()
  {
    $fields = [
      'id'          => 'INT AUTO_INCREMENT NOT NULL',
      'ip'          => 'varchar(15) NOT NULL',
      'created_at'  => 'DATETIME NOT NULL',
      'button_id'   => 'varchar(64)',
    ];
    
    $sql = "CREATE TABLE IF NOT EXISTS `{$this->tableName}` (";
    $pk  = '';

    foreach($fields as $field => $type) {
      $sql.= "`$field` $type,";

      if (preg_match('/AUTO_INCREMENT/i', $type)) {
        $pk = $field;
      }
    }

    $sql = rtrim($sql,',') . ', PRIMARY KEY (`'.$pk.'`)';

    $sql .= ") CHARACTER SET utf8 COLLATE utf8_general_ci";

    if($this->db->exec($sql) !== false) return true;

    return false;
  }

  /*
  * Insert data to table
  *
  * @param Array $data - fields: ip, created_at, button_id
  */
  public function insert($data) {
    $sql = "INSERT INTO `{$this->tableName}` (ip, created_at, button_id) VALUES (:ip, :created_at, :button_id)";
    $this->db->prepare($sql)->execute($data);
  }
}