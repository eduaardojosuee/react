export const Calzado = async () => {
  const response = await fetch('http://localhost/react-proyecto/src/php/leer-calzado.php');
  if (response.ok) {
    const datosjson = await response.json();
    console.log('Datos JSON:', datosjson);
    return datosjson.slice(0, 15);
  } else {
    throw new Error('No se pudo obtener datos');
  }
};

export default Calzado