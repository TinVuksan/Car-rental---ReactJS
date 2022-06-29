import React from "react"
import { BrowserRouter as Router, Routes,  Route } from "react-router-dom"
import DodajVozilo from "./DodajVozilo/DodajVozilo"
import Login from "./Login/Login"
import Pocetna from "./Pocetna/Pocetna"


export default function App() {
    return (
        <>
        <Router>
            <Routes>
                <Route path = "/" element = {<Login></Login>} />
                <Route path = "/Pocetna" element = {<Pocetna></Pocetna>} />
                <Route path = "/Pocetna/Dodaj" element = {<DodajVozilo></DodajVozilo>} />
            </Routes>
        </Router>
        </>
    )
}