import React from 'react'

export const CrearCliente = () => {
    return (
        <div>
            <h3>Creando cliente</h3>
            <div id="crearCliente">
                <form id="crearClienteForm" method="POST">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombreInput" name="nombre" placeholder="Manuel" />
                
                    <label for="nombre">Apellidos:</label>
                    <input type="text" id="apellidosInput" name="apellidos" placeholder="García García" />

                    <label for="nombre">DNI:</label>
                    <input type="text" id="dniInput" name="dni" placeholder="12345678Z" />

                    <label for="nombre">Dirección:</label>
                    <input type="text" id="direccionInput" name="direccion" placeholder="Avenida los Lagos, 32" />

                    <label for="nombre">Dirección:</label>
                    <input type="text" id="direccionInput" name="direccion" placeholder="Avenida los Lagos, 32" />

                    <label for="nombre">Localidad:</label>
                    <input type="text" id="localidadInput" name="localidad" placeholder="Jaén" />

                    <label for="nombre">Fecha de nacimiento:</label>
                    <input type="text" id="fechaNacimientoInput" name="fechaNacimiento" placeholder="YYYY-MM-DD" />

                    <button>Crear</button>
                </form>
            </div>
        </div>
    )
}
