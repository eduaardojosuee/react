import { NavLink } from "react-router-dom"
export const NavBar = () => {
  return (
    <div className="w3-bar w3-border w3-light-grey">
        <NavLink to='/' className="w3-bar-item w3-button">Inicio</NavLink>
        <NavLink to='/calzado' className="w3-bar-item w3-button">Calzado</NavLink>
        <NavLink to='/proveedores' className="w3-bar-item w3-button">Proveedores</NavLink>
        <NavLink to='/pedidos' className="w3-bar-item w3-button">Pedidos</NavLink>
    </div>
  )
}
