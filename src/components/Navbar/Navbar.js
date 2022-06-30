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
            <a href="/Pocetna"><h3 className = "navbar-logo">GTA</h3></a>
            <div className = "navbar-routing">
                <Link style = {{textDecoration:'none', color:'black'}}to = "/Pocetna/Dodaj"><h3 className = "navbar-link" >Dodaj vozilo</h3></Link>
                <Link style = {{textDecoration:'none', color:'black'}}to = "/Pocetna/Zaduzi"><h3 className = "navbar-link">Zaduži vozilo</h3></Link>
                <Link style = {{textDecoration:'none', color:'black'}}to = "/Pocetna/Vrati"><h3 className = "navbar-link">Vrati vozilo</h3></Link>
            </div>
            {/* <h3 className = "navbar-title">Vozni park</h3> */}
            <Button variant = "outline-dark" className = "navbar-logout" onClick = {logout}>Odjavi se</Button>
            
        </nav>
    )
}