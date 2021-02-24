<?php

    require_once('db.php');

    try {

        $idCuenta = htmlspecialchars($_POST['id']) ?? '';
        $cantidad = htmlspecialchars($_POST['cantidad']) ?? 0;
        $tipoMovimiento = htmlspecialchars($_POST['tipo']) ?? '';
        $dniCliente = htmlspecialchars($_POST['dni']) ?? '';


        // Si el número que pasamos es negativo, restamos (Añadir dinero y retirar en un solo php)
        $query = "UPDATE Cuenta SET saldoCuenta = saldoCuenta + $cantidad WHERE idCuenta = :idCuenta";
        
        $stm = $pdo->prepare($query);
        $stm->execute(array(
            ':idCuenta' => $idCuenta
        ));
        
        if ($stm->rowCount() > 0) {

            //Creamos un movimiento
            $query = "INSERT INTO Movimiento VALUES (NULL, DEFAULT, :tipoMovimiento, :importe, :dniCliente)";
        
            $stm = $pdo->prepare($query);
            $stm->execute(array(
                ':tipoMovimiento' => $tipoMovimiento,
                ':importe' => $cantidad,
                ':dniCliente' => $dniCliente
            ));

            //Añadimos el movimiento a la cuenta
            $query = "SELECT idMovimiento FROM Movimiento WHERE dniCliente = :dniCliente ORDER BY idMovimiento DESC LIMIT 1";

            $stm = $pdo->prepare($query);
            $stm->execute(array(
                ':dniCliente' => $dniCliente
            ));

            $idMovimiento = $stm->fetch(PDO::FETCH_ASSOC)['idMovimiento'];

            $query = "INSERT INTO Movimientos VALUES (:idCuenta, :idMovimiento)";

            $stm = $pdo->prepare($query);
            $stm->execute(array(
                ':idCuenta' => $idCuenta,
                ':idMovimiento' => $idMovimiento
            ));

            if ($stm->rowCount() > 0) {

                echo json_encode(array(
                    'message' => 'Operación realizada correctamente',
                    'status' => 200
                ));
            
            }
            else {
                echo json_encode(array(
                    'message' => 'Hubo un problema al realizar la operación',
                    'status' => 500
                ));
            }
            
        }
        else {

            echo json_encode(array(
                'message' => 'Hubo un problema al realizar la operación',
                'status' => 500
            ));
        }


    }catch (PDOException $e) {
        print "¡Error!: " . $e->getMessage() . "<br/>";
        die();
    }
