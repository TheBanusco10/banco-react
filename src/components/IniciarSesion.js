import React, { useState } from 'react'
import { IniciarSesionFetch } from '../helpers/IniciarSesionFetch'

export const IniciarSesion = ({setData}) => {

    const [dni, setDni] = useState('');

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
        </div>
    )
}
