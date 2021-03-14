import React, { useState } from 'react'
import { IniciarSesionFetch } from '../helpers/IniciarSesionFetch'
import { CrearCliente } from './CrearCliente';

export const IniciarSesion = ({setData}) => {

    const [dni, setDni] = useState('');
    const [crearCliente, setCrearCliente] = useState(false)

    function handleDni(e) {
        
        setDni(e.target.value);

    }

    function sesion(dni) {
        
        IniciarSesionFetch(dni)
        .then(data => {
                setData(data);
            });

    }

    return (
        <div>
            <h1>Inicia sesión con tu DNI</h1>
            <input type="text" id="dniInput" placeholder="12345678Z" value={dni} onChange={handleDni} />
            <button id="iniciarSesion" onClick={ () => sesion(dni)}>Iniciar sesión</button>
            <hr />
            <button id="crearCliente" onClick={ () => setCrearCliente(true)}>Crear cliente</button>
            <button id="crearCuenta">Crear cuenta</button>

            {crearCliente && <CrearCliente />}
        </div>
    )
}
