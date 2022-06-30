import React from "react"
import { BrowserRouter as Router, Routes,  Route } from "react-router-dom"
import Login from "./Login/Login"
import Pocetna from "./Pocetna/Pocetna"
import ZaduziVozilo from "./ZaduziVozilo/Zaduzi"
import DodajVozilo from "./DodajVozilo/DodajVozilo"
import Vrati from "./Vrati/Vrati"
import Uredi from "./Uredi/Uredi"

export default function App() {
    return (
        <>
        <Router>
            <Routes>
                <Route path = "/" element = {<Login></Login>} />
                <Route path = "/Pocetna" element = {<Pocetna ></Pocetna>} />
                <Route path = "/Pocetna/Dodaj" element = {<DodajVozilo></DodajVozilo>} />
                <Route path = "/Pocetna/Zaduzi" element = {<ZaduziVozilo></ZaduziVozilo>} />
                <Route path = "/Pocetna/Vrati" element = {<Vrati></Vrati>} />
                <Route path = "Pocetna/Uredi" element = {<Uredi></Uredi>} />
            </Routes>
        </Router>
        </>
    )
}