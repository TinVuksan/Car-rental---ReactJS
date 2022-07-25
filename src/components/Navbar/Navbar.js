import React from "react"
import Button from "react-bootstrap/Button"
import {Link} from "react-router-dom"

export default function Navbar() {
   const logout = () => {
        localStorage.clear();
        window.location.href = '/';
    }

    return (
        <nav className = "navbar">
            <a href="/Home"><h3 className = "navbar-logo">GTA</h3></a>
            <div className = "navbar-routing">
                <Link style = {{textDecoration:'none', color:'black'}}to = "/Home/Add"><h3 className = "navbar-link" >Add new vehicle</h3></Link>
                <Link style = {{textDecoration:'none', color:'black'}}to = "/Home/Rent"><h3 className = "navbar-link">Rent a vehicle</h3></Link>
                <Link style = {{textDecoration:'none', color:'black'}}to = "/Home/Return"><h3 className = "navbar-link">Return a vehicle</h3></Link>
            </div>
            <Button variant = "outline-dark" className = "navbar-logout" onClick = {logout}>Sign out</Button>
            
        </nav>
    )
}