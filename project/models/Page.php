<?php
namespace components;
class Page 
{
     // Добавление пользователя

    public static function InsertInfo($name,$surname,$email,$password)
    {
        $db = Db::getConnection();
        $sql = 'INSERT INTO `personal_data`(`name,surname,email,p_number,password`) VALUES (:name_bind, :surname_bind, :email_bind, :password_bind)';
        $result = $db->prepare($sql);
        $result->bindParam(':name_bind',$name, PDO::PARAM_STR);;
        $result->bindParam(':surname_bind',$surname, PDO::PARAM_STR);;
        $result->bindParam(':email_bind',$email, PDO::PARAM_STR);;
        $result->bindParam(':password_bind',$password, PDO::PARAM_STR);;
        return $result->execute();
    }

    public static function GetInfo()
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM `personal_data`';
        $result = $db->query($sql);
        $index = array();
        $i=0;
        while($row=$result->fetch()) {
            $index[$i]['id'] = $row['id'];
            $index[$i]['name'] = $row['name'];
            $index[$i]['surname'] = $row['surname'];
            $index[$i]['email'] = $row['email'];
            $index[$i]['password'] = $row['password'];
            $i++;
        }
        return $index;
    }
        // Получение пользователя по логину и паролю
    public function getByLoginAndPass($login = null, $password = null)
    {
        if($login == null or $password == null) return false;
        $query = $this->_db->prepare("SELECT * FROM {$this->_table} WHERE `email`=:login AND `password`=:password");
        $query->bindParam(":login", $login, PDO::PARAM_STR);
        $query->bindParam(":password", $password, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetchObject(__CLASS__);
        return $result;

    }

    // обновления данных в бд
    public static function UpdateInfo($id, $name,$surname,$email,$password)
    {
        $db = Db::getConnection();
        $sql = 'UPDATE `personal_data` SET name=:name_bind, surname=:surname_bind, email=:email_bind, password=:password_bind WHERE id=:id_bind';
        $result = $db->prepare($sql);
        $result->bindParam(':id_bind',$id, PDO::PARAM_INT);
        $result->bindParam(':name_bind',$name, PDO::PARAM_STR);
        $result->bindParam(':surname_bind',$surname, PDO::PARAM_STR);;
        $result->bindParam(':email_bind',$email, PDO::PARAM_STR);;
        $result->bindParam(':password_bind',$password, PDO::PARAM_STR);;
        return $result->execute();
    }

}
?>