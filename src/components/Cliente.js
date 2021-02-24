import React from 'react'

export const Cliente = ({nombreCliente, apellidosCliente, direccionCliente, localidadCliente, dniCliente}) => {
    return (
        <div>
            <h2>Bienvenido, {nombreCliente} {apellidosCliente}</h2>
            <p><strong>Nombre:</strong> {nombreCliente}</p>
            <p><strong>Apellidos:</strong> {apellidosCliente}</p>
            <p><strong>DNI:</strong> {dniCliente}</p>
        </div>
    )
}
