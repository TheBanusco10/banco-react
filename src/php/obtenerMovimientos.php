<?php

    require_once('db.php');

    try {

        $idCuenta = $_POST['id'] ?? '';

        $query = "SELECT fechaMovimiento, tipoMovimiento, importeMovimiento, saldoCuenta, ibanCuenta, dniCliente FROM Movimiento INNER JOIN Movimientos ON Movimientos.idMovimiento = Movimiento.idMovimiento INNER JOIN Cuenta ON Movimientos.idCuenta = Cuenta.idCuenta WHERE Movimientos.idCuenta = :idCuenta";
        
        $stm = $pdo->prepare($query);
        $stm->execute(array(
            ':idCuenta' => $idCuenta
        ));
        
        if ($stm->rowCount() > 0) {
            echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
        }
        else
            echo json_encode(array(
                'message' => 'No hay movimientos para mostrar',
                'status' => 500
            ));


    }catch (PDOException $e) {
        print "¡Error!: " . $e->getMessage() . "<br/>";
        die();
    }
