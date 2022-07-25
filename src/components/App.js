import React from "react"
import { BrowserRouter as Router, Routes,  Route } from "react-router-dom"
import Login from "./Login/Login"
import Homepage from "./Homepage/Homepage"
import Rent from "./Rent/Rent"
import AddVehicle from "./AddVehicle/AddVehicle"
import Return from "./Return/Return"


export default function App() {
    return (
        <>
        <Router>
            <Routes>
                <Route path = "/" element = {<Login></Login>} />
                <Route path = "/Home" element = {<Homepage ></Homepage>} />
                <Route path = "/Home/Add" element = {<AddVehicle></AddVehicle>} />
                <Route path = "/Home/Rent" element = {<Rent></Rent>} />
                <Route path = "/Home/Return" element = {<Return></Return>} />
            </Routes>
        </Router>
        </>
    )
}