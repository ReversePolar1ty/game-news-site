<?php

session_start();
require('connect.php');

function test($value){
    echo '<pre>';
    print_r($value);
    echo '</pre>';
    exit();
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
function selectAll(string $table, $data = []) {
    global $pdo;
    $sql = "SELECT * FROM $table";

    if(!empty($data)){
        $i = 0;
        foreach ($data as $key => $value) {
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
function selectOne(string $table, array $data) {
    global $pdo;
    $sql = "SELECT * FROM $table";

    if(!empty($data)){
        $i = 0;
        foreach ($data as $key => $value) {
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

//Запрос на запись в БД
function insertData(string $table, array $data): string {
    global $pdo;

    if (empty($data)) {
        throw new InvalidArgumentException("Data array is empty.");
    }

    // Список колонок и плейсхолдеров
    $columns = implode(", ", array_keys($data));
    $placeholders = ":" . implode(", :", array_keys($data));

    $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
    $stmt = $pdo->prepare($sql);

    // Привязка значений
    foreach ($data as $key => $value) {
        $stmt->bindValue(":$key", $value);
    }

    $stmt->execute();
    dbCheckError($stmt);
    return $pdo->lastInsertId();
}

//Запрос на обновление данных в БД
function updateData(string $table, array $data, int $id): void {
    global $pdo;

    if (empty($data)) {
        throw new InvalidArgumentException("Data array is empty.");
    }

    // Формируем список пар `column = :column`
    $setParts = [];
    foreach ($data as $key => $value) {
        $setParts[] = "`$key` = :$key";
    }
    $setClause = implode(', ', $setParts);
    echo $setClause;

    $sql = "UPDATE $table SET $setClause WHERE id = :id";
    $stmt = $pdo->prepare($sql);

    // Привязка значений
    foreach ($data as $key => $value) {
        $stmt->bindValue(":$key", $value);
    }

    // Привязка ID
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);

    $stmt->execute();
    dbCheckError($stmt);
}

//Запрос на удаление данных из БД
function deleteData(string $table, int $id): void {
    global $pdo;

    $sql = "DELETE FROM $table WHERE id = :id";
    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(':id', $id, PDO::PARAM_INT);

    $stmt->execute();
    dbCheckError($stmt);
}
