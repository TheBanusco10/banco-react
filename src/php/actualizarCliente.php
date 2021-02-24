<?php

    header('content-type: application/json');

    require_once('db.php');

    
    try {
        
        $query = 'UPDATE Cliente SET nombreCliente = :nombre, apellidosCliente = :apellidos, direccionCliente = :direccion WHERE dniCliente = :dni';
    
        $stm = $pdo->prepare($query);
    
        $stm->execute(array(
            ':nombre' => htmlspecialchars($_POST['nombre']),
            ':apellidos' => htmlspecialchars($_POST['apellidos']),
            ':direccion' => htmlspecialchars($_POST['direccion']),
            ':dni' => htmlspecialchars($_POST['dni'])
    
        ));
        
        if ($stm->rowCount() > 0)
            echo json_encode(array(
                'message' => 'Cliente actualizado correctamente',
                'status' => 200
            ));
        else
            echo json_encode(array(
                'message' => 'Hubo un problema al actualizar el cliente',
                'status' => 500
            ));

    }catch (PDOException $e) {
        print "¡Error!: " . $e->getMessage() . "<br/>";
        die();
    }
