import React, { useState } from 'react'
import { IniciarSesionFetch } from '../helpers/IniciarSesionFetch'

export const IniciarSesion = ({setCliente}) => {

    const [dni, setDni] = useState('');

    function handleDni(e) {
        
        setDni(e.target.value);

    }

    function sesion(dni) {

        console.log(dni);

        
        IniciarSesionFetch(dni)
        .then(data => {
                setCliente(data.cliente);
                console.log(data);
            });

    }

    return (
        <div>
            <h1>Inicia sesión con tu DNI</h1>
            <p>{dni}</p>
            <input type="text" id="dniInput" placeholder="1234567Z" value={dni} onChange={handleDni} />
            <button id="iniciarSesion" onClick={ () => sesion(dni)}>Iniciar sesión</button>
        </div>
    )
}
