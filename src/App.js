import './App.css';

import { IniciarSesion } from './components/IniciarSesion';
import { useState } from 'react';
import { Cliente } from './components/Cliente';
import { Cuenta } from './components/Cuenta';

function App() {

  const [data, setData] = useState('');

  return (
    <div className="App">
      {data === '' && <IniciarSesion setData={setData} />} {/* Si data está vacío es porque no ha iniciado sesión, mostramos ese Componente */}

      {/* Si se ha iniciado sesión mostramos el resto de componentes */}
      <div id="appContenedor">
        {data !== '' && <Cliente {...data.cliente} />}
        {data !== '' && <Cuenta {...data.cuenta} />}
      </div>
    </div>
  );
}

export default App;
