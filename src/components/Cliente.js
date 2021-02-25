import React from 'react'

export const Cliente = ({nombreCliente, apellidosCliente, direccionCliente, localidadCliente, dniCliente, fechaNacimientoCliente}) => {
    return (
        <div id="clienteVista">
            <h2>Bienvenido, {nombreCliente} {apellidosCliente}</h2>
            <hr />
            <div className="contenedor">
                <p><strong>Fecha de nacimiento:</strong> {fechaNacimientoCliente}</p>
                <p><strong>DNI:</strong> {dniCliente}</p>
                <p><strong>Dirección:</strong> {direccionCliente}, {localidadCliente}</p>
            </div>
        </div>
    )
}
