<?php

header('Content-type: application/json');

require_once('db.php');

$numeroCuenta = $_POST['numeroCuenta'] ?? '';

    try {

        $query = "SELECT * FROM Cuenta WHERE numeroCuenta LIKE :numeroCuenta";
        
        $stm = $pdo->prepare($query);
        $stm->execute(array(
            ':numeroCuenta' => "%" . htmlspecialchars($numeroCuenta) . "%"
        ));
        
        if ($stm->rowCount() > 0) {
            echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
        }
        else
            echo json_encode(array(
                'message' => 'Cuenta no encontrada',
                'status' => 500
            ));


    }catch (PDOException $e) {
        print "¡Error!: " . $e->getMessage() . "<br/>";
        die();
    }