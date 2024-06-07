import { useState, useEffect } from 'react';
import { Calzado } from './helpers/Calzado.js';
import { useNavigate } from 'react-router-dom';

export const TablaCalzado = () => {
  const [data, setData] = useState([]);
  const [allData, setAllData] = useState([]);

  useEffect(() => {
    const fetchData = async () => {
      try {
        const datos = await Calzado();
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
    navigate('/calzado/insertar');
  };

  const handleEliminarClick = () => {
    navigate('/calzado/eliminar');
  };

  const handleModificarClick = () => {
    navigate('/calzado/modificar');
  };

  return (
    <div className="w3-container">
      <table className="w3-table-all w3-card-4 w3-hoverable">
        <thead>
          <tr className="w3-light-grey">
            <th>ID</th>
            <th>MARCA</th>
            <th>TALLA</th>
            <th>COLOR</th>
            <th>TIPO</th>
            <th>EXISTENCIA EN ALMACÉN</th>
            <th>STOCK MÍNIMO</th>
            <th>STOCK MÁXIMO</th>
            <th>COSTO DE COMPRA</th>
            <th>COSTO DE VENTA</th>
          </tr>
        </thead>
        <tbody>
          {data.map(d => (
            <tr key={d.ID_CAL}>
              <td>{d.ID_CAL}</td>
              <td>{d.MARCA_CAL}</td>
              <td>{d.TALLA_CAL}</td>
              <td>{d.COLOR_CAL}</td>
              <td>{d.TIPO_CAL}</td>
              <td>{d.STOCK_CAL}</td>
              <td>{d.STOCKMIN_CAL}</td>
              <td>{d.STOCKMAX_CAL}</td>
              <td>{d.CC_CAL}</td>
              <td>{d.CV_CAL}</td> 
            </tr>
          ))}
        </tbody>
      </table>
      <div className="w3-margin-top">
        <button onClick={handleInsertarClick} className="w3-button w3-blue w3-margin-right">Insertar Calzado</button>
        <button onClick={handleEliminarClick} className="w3-button w3-blue w3-margin-right">Eliminar Calzado</button>
        <button onClick={handleModificarClick} className="w3-button w3-blue w3-margin-right">Modificar Calzado</button>
      </div>
    </div>
  );
};

export default TablaCalzado;