<?php

    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header('Content-type: application/json');

    require_once('db.php');

    try {

        $informacion = array();

        // Hacemos la petición para tomar la información del cliente
        $dni = $_POST['dni'] ?? '';

        $query = "SELECT * FROM Cliente WHERE dniCliente = :dni";
        
        $stm = $pdo->prepare($query);
        $stm->execute(array(
            ':dni' => $dni
        ));
    
        
        if ($stm->rowCount() > 0) {
            
            // Guardamos la información del cliente en $informacion
            foreach($stm->fetch(PDO::FETCH_ASSOC) as $key => $val) {
                $informacion['cliente'][$key] = $val;
            }

            if ($stm->rowCount() > 0) {

                // Hacemos la petición para tomar la información de la cuenta
                $query = "SELECT * FROM Cuenta WHERE idCliente = :idCliente";

                $stm = $pdo->prepare($query);
                $stm->execute(array(
                    ':idCliente' => $informacion['cliente']['idCliente']
                ));

                // Guardamos la información de la cuenta en $informacion
                foreach($stm->fetch(PDO::FETCH_ASSOC) as $key => $val) {
                    $informacion['cuenta'][$key] = $val;
                }

                echo json_encode($informacion);
            
            }else
                echo json_encode(array(
                    'message' => 'Cuenta no encontrada',
                    'status' => 500
                ));

        }
        else
            echo json_encode(array(
                'message' => 'Cliente no encontrado',
                'status' => 500
            ));


    }catch (PDOException $e) {
        print "¡Error!: " . $e->getMessage() . "<br/>";
        die();
    }
