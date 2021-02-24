import logo from './logo.svg';
import './App.css';

import { IniciarSesion } from './components/IniciarSesion';
import { useState } from 'react';
import { Cliente } from './components/Cliente';

function App() {

  const [cliente, setCliente] = useState('');

  return (
    <div className="App">
      {cliente === '' && <IniciarSesion setCliente={setCliente} />}
      {cliente !== '' && <Cliente {...cliente} />}
    </div>
  );
}

export default App;
