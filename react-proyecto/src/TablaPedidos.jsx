import { useState, useEffect } from 'react';
import { Pedidos } from './helpers/Pedidos.js';
import { useNavigate } from 'react-router-dom';

export const TablaPedidos = () => {
  const [data, setData] = useState([]);
  const [allData, setAllData] = useState([]);

  useEffect(() => {
    const fetchData = async () => {
      try {
        const datos = await Pedidos();
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
    navigate('/pedidos/insertar');
  };

  const handleEliminarClick = () => {
    navigate('/pedidos/eliminar');
  };

  const handleModificarClick = () => {
    navigate('/pedidos/modificar');
  };

  return (
    <div className="w3-container">
      <table className="w3-table-all w3-card-4 w3-hoverable">
        <thead>
          <tr className="w3-light-grey">
            <th>ID PEDIDO</th>
            <th>FECHA PEDIDO</th>
            <th>ID CALZADO</th>
            <th>RFC PROVEEDOR</th>
            <th>CANTIDAD SOLICITADA</th>
            <th>FECHA DE SURTIDO</th>
            <th>COSTO DE PEDIDO</th>
          </tr>
        </thead>
        <tbody>
          {data.map(d => (
            <tr key={d.ID_PED}>
              <td>{d.ID_PED}</td>
              <td>{d.FECHAPED_PED}</td>
              <td>{d.ID_CAL}</td>
              <td>{d.RFC_PROV}</td>
              <td>{d.CANT_PED}</td>
              <td>{d.FECHASURT_PED}</td>
              <td>{d.COSTO_PED}</td>
            </tr>
          ))}
        </tbody>
      </table>
      <div className="w3-margin-top">
        <button onClick={handleInsertarClick} className="w3-button w3-blue w3-margin-right">Insertar Pedido</button>
        <button onClick={handleEliminarClick} className="w3-button w3-blue w3-margin-right">Eliminar Pedido</button>
        <button onClick={handleModificarClick} className="w3-button w3-blue w3-margin-right">Modificar Pedido</button>
      </div>
    </div>
  );
};

export default TablaPedidos;