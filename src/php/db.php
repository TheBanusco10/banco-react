<?php

    $dbname = 'banco';
    $user = 'root';
    $password = 'root';

    try {

        $pdo = new PDO("mysql:host=localhost;dbname=$dbname;charset=utf8", $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }catch (PDOException $e) {
        print "¡Error!: " . $e->getMessage() . "<br/>";
        die();
    }