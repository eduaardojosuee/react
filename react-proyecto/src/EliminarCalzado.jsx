import React, { useState } from 'react';

export const EliminarCalzado = () => {
  const [id, setId] = useState('');
  const [mensaje, setMensaje] = useState('');

  const handleInputChange = (e) => {
    setId(e.target.value);
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    setMensaje('');

    try {
      const response = await fetch('http://localhost/react-proyecto/src/php/eliminar-calzado.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams({ ID: id })
      });

      const text = await response.text();

      if (response.ok) {
        setMensaje(text);
      } else {
        setMensaje(`Error: ${text}`);
      }
    } catch (error) {
      setMensaje('Error de conexión');
    }
  };

  return (
    <div className="w3-container w3-margin-top">
      <div className="w3-card-4 w3-light-grey w3-padding-large">
        <h2>Eliminar Calzado</h2>
        <form onSubmit={handleSubmit} className="w3-container">
          <div className="w3-section">
            <label htmlFor="ID" className="w3-text-grey">ID del Calzado</label>
            <input
              className="w3-input w3-border"
              type="text"
              id="ID"
              name="ID"
              value={id}
              onChange={handleInputChange}
              required
            />
          </div>
          <button type="submit" className="w3-button w3-blue w3-margin-top">Eliminar</button>
        </form>
        {mensaje && <p className="w3-text-red w3-margin-top">{mensaje}</p>}
      </div>
    </div>
  );
};

export default EliminarCalzado;
