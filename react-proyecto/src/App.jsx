import './App.css'
import { Route, Routes, Navigate } from 'react-router-dom'
import { NavBar } from './components/NavBar'
import { Inicio } from './components/Inicio.jsx'
import { TablaCalzado } from './TablaCalzado.jsx'
import { InsertarCalzado } from './InsertarCalzado.jsx';
import { EliminarCalzado } from './EliminarCalzado.jsx';
import { ModificarCalzado } from './ModificarCalzado.jsx';
import { TablaProveedores } from './TablaProveedores.jsx';
import { InsertarProveedor } from './InsertarProveedor.jsx'
import { EliminarProveedor } from './EliminarProveedor.jsx'
import { ModificarProveedor } from './ModificarProveedor.jsx'
import { TablaPedidos } from './TablaPedidos.jsx'
import { InsertarPedido } from './InsertarPedido.jsx'
import { EliminarPedido } from './EliminarPedido.jsx'
import { ModificarPedido } from './ModificarPedido.jsx'


function App() {
  return (
    <>
      <div className='w3-container'>
        <NavBar />
        <Routes>
          <Route path="/" element={<Inicio/>}></Route>
          <Route path="/calzado" element={<TablaCalzado/>}></Route>
          <Route path="/calzado/insertar" element={<InsertarCalzado/>}></Route>
          <Route path="/calzado/eliminar" element={<EliminarCalzado/>}></Route>
          <Route path="/calzado/modificar" element={<ModificarCalzado/>}></Route>
          <Route path="/proveedores" element={<TablaProveedores/>}></Route>
          <Route path="/proveedores/insertar" element={<InsertarProveedor/>}></Route>
          <Route path="/proveedores/eliminar" element={<EliminarProveedor/>}></Route>
          <Route path="/proveedores/modificar" element={<ModificarProveedor/>}></Route>
          <Route path="/pedidos" element={<TablaPedidos/>}></Route>
          <Route path="/pedidos/insertar" element={<InsertarPedido/>}></Route>
          <Route path="/pedidos/eliminar" element={<EliminarPedido/>}></Route>
          <Route path="/pedidos/modificar" element={<ModificarPedido/>}></Route>
          <Route path="/*" element={<Navigate to='/' />}></Route>
        </Routes>
      </div>
    </>
  )
}

export default App
