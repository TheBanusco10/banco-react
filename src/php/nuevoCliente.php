<?php

    require_once('db.php');

    try {

        $query = 'INSERT INTO Cliente VALUES (NULL, :nombre, :apellidos, :dni, :direccion, :localidad, :fechaNacimiento)';

        $stm = $pdo->prepare($query);

        $stm->execute(array(
            ':nombre' => htmlspecialchars($_POST['nombre']),
            ':apellidos' => htmlspecialchars($_POST['apellidos']),
            ':dni' => htmlspecialchars($_POST['dni']),
            ':direccion' => htmlspecialchars($_POST['direccion']),
            ':localidad' => htmlspecialchars($_POST['localidad']),
            ':fechaNacimiento' => htmlspecialchars($_POST['fechaNacimiento']),

        ));

        if ($stm->rowCount() > 0)
            echo json_encode(array(
                'message' => 'Cliente registrado correctamente',
                'status' => 200
            ));
        else
            echo json_encode(array(
                'message' => 'Hubo un problema al crear el cliente',
                'status' => 500
            ));

    }catch (PDOException $e) {
        print "¡Error!: " . $e->getMessage() . "<br/>";
        die();
    }
