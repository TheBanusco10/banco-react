<?php

    require_once('db.php');

    try {

        $dniCliente = $_POST['dniCliente'];

        $query = "SELECT * FROM Cliente WHERE dniCliente = :dni";
        
        $stm = $pdo->prepare($query);
        $stm->execute(array(
            ':dni' => $dniCliente
        ));

        $user = $stm->fetch(PDO::FETCH_ASSOC)['idCliente'];

        $query = "INSERT INTO Cuenta VALUES (NULL, $user, :iban, :numero, :saldo, :interesAnual, :tipoCuenta)";

        $stm = $pdo->prepare($query);

        $stm->execute(array(
            ':iban' => htmlspecialchars($_POST['iban']),
            ':numero' => htmlspecialchars($_POST['numero']),
            ':saldo' => htmlspecialchars($_POST['saldo']),
            ':interesAnual' => htmlspecialchars($_POST['interesAnual']),
            ':tipoCuenta' => htmlspecialchars($_POST['tipoCuenta']),

        ));

        if ($stm->rowCount() > 0)
            echo json_encode(array(
                'message' => 'Cuenta creada correctamente',
                'status' => 200
            ));
        else
            echo json_encode(array(
                'message' => 'Hubo un problema al crear la cuenta',
                'status' => 500
            ));

    }catch (PDOException $e) {
        print "¡Error!: " . $e->getMessage() . "<br/>";
        die();
    }
