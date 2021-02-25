import React from 'react'

export const Cuenta = ({ibanCuenta, numeroCuenta, saldoCuenta, interesAnualCuenta, tipoCuenta}) => {
    return (
        <div id="cuentaVista">
            <h2>Información de tu cuenta</h2>
            <hr />

            <div className="contenedor">
                <p><strong>IBAN:</strong> {ibanCuenta}</p>
                <p><strong>Número de cuenta:</strong> {numeroCuenta}</p>
                <p><strong>Saldo en la cuenta:</strong> {saldoCuenta}</p>
                <p><strong>Interés anual:</strong> {interesAnualCuenta}</p>
                <p><strong>Tipo de cuenta:</strong> {tipoCuenta}</p>
            </div>

        </div>
    )
}
