import { useState, useEffect } from 'react';
import { Proveedores } from './helpers/Proveedores.js';
import { useNavigate } from 'react-router-dom';

export const TablaProveedores = () => {
  const [data, setData] = useState([]);
  const [allData, setAllData] = useState([]);

  useEffect(() => {
    const fetchData = async () => {
      try {
        const datos = await Proveedores();
        console.log('Datos obtenidos:', datos);
        setData(datos);
        setAllData(datos);
      } catch (error) {
        console.error('Error fetching data:', error);
      }
    };
    fetchData();
  }, []);

  const navigate = useNavigate();

  const handleInsertarClick = () => {
    navigate('/proveedores/insertar');
  };

  const handleEliminarClick = () => {
    navigate('/proveedores/eliminar');
  };

  const handleModificarClick = () => {
    navigate('/proveedores/modificar');
  };

  return (
    <div className="w3-container">
      <table className="w3-table-all w3-card-4 w3-hoverable">
        <thead>
          <tr className="w3-light-grey">
            <th>RFC PROVEEDOR</th>
            <th>NOMBRE PROVEEDOR</th>
            <th>TELEFONO PROVEEDOR</th>
            <th>DIRECCION PROVEEDOR</th>
            <th>EMAIL PROVEEDOR</th>
          </tr>
        </thead>
        <tbody>
          {data.map(d => (
            <tr key={d.RFC_PROV}>
              <td>{d.RFC_PROV}</td>
              <td>{d.NOMBRE_PROV}</td>
              <td>{d.TEL_PROV}</td>
              <td>{d.DIR_PROV}</td>
              <td>{d.EMAIL_PROV}</td>
            </tr>
          ))}
        </tbody>
      </table>
      <div className="w3-margin-top">
        <button onClick={handleInsertarClick} className="w3-button w3-blue w3-margin-right">Insertar Proveedor</button>
        <button onClick={handleEliminarClick} className="w3-button w3-blue w3-margin-right">Eliminar Proveedor</button>
        <button onClick={handleModificarClick} className="w3-button w3-blue w3-margin-right">Modificar Proveedor</button>
      </div>
    </div>
  );
};

export default TablaProveedores;