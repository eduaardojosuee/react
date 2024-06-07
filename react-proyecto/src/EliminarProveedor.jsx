import React, { useState } from 'react';

export const EliminarProveedor = () => {
  const [RFC, setRFC] = useState('');
  const [message, setMessage] = useState('');

  const handleChange = (e) => {
    setRFC(e.target.value);
  };

  const handleSubmit = async (e) => {
    e.preventDefault();

    try {
      const response = await fetch('http://localhost/react-proyecto/src/php/eliminar-proveedor.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({ RFC })
      });

      if (response.ok) {
        const result = await response.text();
        setMessage(result);
      } else {
        const errorText = await response.text();
        setMessage(errorText);
      }
    } catch (error) {
      setMessage('Error de conexión');
    }
  };

  return (
    <div className="w3-container w3-margin-top">
      <div className="w3-card-4 w3-light-grey w3-padding-large">
        <h2>Eliminar Proveedor</h2>
        <form onSubmit={handleSubmit} className="w3-container">
          <div className="w3-section">
            <label htmlFor="RFC" className="w3-text-grey">RFC</label>
            <input
              className="w3-input w3-border"
              type="text"
              id="RFC"
              name="RFC"
              value={RFC}
              onChange={handleChange}
              required
            />
          </div>
          <button type="submit" className="w3-button w3-blue w3-margin-top">Eliminar</button>
        </form>
        {message && <p className="w3-text-red">{message}</p>}
      </div>
    </div>
  );
};

export default EliminarProveedor;
