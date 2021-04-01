<!-- // Connect database function -->

<?php
function connection($name, $user, $password)
{
    try {
        $connection = new PDO("mysql:host=localhost;dbname=$name", $user, $password);
        return $connection;
        echo "Connection OK";
    } catch (PDOException $event) {
        return false;
    }
}


?>