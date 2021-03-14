import React from 'react'

export const IniciarSesionFetch = async (dni) => {

    console.log(dni);
    
    let res = await fetch('/src/php/iniciarSesion.php', {
        method: 'POST',
        mode: 'cors', // no-cors, *cors, same-origin
        headers: new Headers({
            'Content-Type': 'application/x-www-form-urlencoded'
        }),
        body: `dni=${dni}`
    });

    return await res.json();

}
