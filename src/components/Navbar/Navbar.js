import React from "react"
import Button from "react-bootstrap/Button"
import {Link} from "react-router-dom"
import DodajVozilo from "../DodajVozilo/DodajVozilo"
export default function Navbar() {
   const logout = () => {
        localStorage.clear();
        window.location.href = '/';
    }

    return (
        <nav className = "navbar">
            <h3 className = "navbar-logo">GTA</h3>
            <div className = "navbar-routing">
                <Link to = "/Pocetna/Dodaj" exact component ={<DodajVozilo></DodajVozilo>}>Dodaj vozilo</Link>
                <h3>Zaduži vozilo</h3>
                <h3>Vrati vozilo</h3>
            </div>
            {/* <h3 className = "navbar-title">Vozni park</h3> */}
            <Button variant = "info" className = "navbar-logout" onClick = {logout}>Odjavi se</Button>
            
        </nav>
    )
}