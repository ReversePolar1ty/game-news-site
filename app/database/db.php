<?php

require('connect.php');

function test($value){
    echo '<pre>';
    print_r($value);
    echo '</pre>';
}

//Проверка выполнения запроса к БД
function dbCheckError($query){
    $errInfo = $query->errorInfo();
    if($errInfo[0] !== PDO::ERR_NONE){
        echo $errInfo[2];
        exit();
    }
    return true;
}

//Запрос на получение данных одной таблицы
function selectAll($table, $params = []){
    global $pdo;
    $sql = "SELECT * FROM $table";

    if(!empty($params)){
        $i = 0;
        foreach ($params as $key => $value) {
            if($i === 0){
                $sql = $sql . " WHERE $key = '$value'";
            } else {
                $sql = $sql . " AND $key = '$value'";
            }
            $i++;
        }
    }


    $query = $pdo ->prepare($sql);
    $query -> execute();

    dbCheckError($query);

    return $query->fetchAll();

}


//Запрос на получение одних, конкретных данных с выбранной таблицы
function selectOne($table, $params = []){
    global $pdo;
    $sql = "SELECT * FROM $table";

    if(!empty($params)){
        $i = 0;
        foreach ($params as $key => $value) {
            if($i === 0){
                $sql = $sql . " WHERE $key = '$value'";
            } else {
                $sql = $sql . " AND $key = '$value'";
            }
            $i++;
        }
    }

//    $sql = $sql . " LIMIT 1";

    $query = $pdo ->prepare($sql);
    $query -> execute();

    dbCheckError($query);

    return $query->fetch();

}

$params = [
    'admin' => 1,
    'username' => 'gamer1234',
];

//Запрос на 