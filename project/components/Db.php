<?
use PDO;
class Db
{
   public static function getConnection()
   { 
        // Получаем параметры подключения из файла
     $config = require  '/config/db_params.php';

        // Устанавливаем соединение 
     $this->db = new PDO('mysql:host='.$config['host'].'dbname='.$config['name'].'', $config['user'], $config['password']);
        // Задаем кодировку 
     
     $db->exec("set names utf8");
 } 
}
?>
