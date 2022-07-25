import React from "react"
import "../Navbar/Navbar.css"
import Navbar from "../Navbar/Navbar"
import CardReturn from "./CardReturn"
export default function Vrati() {

    
    return (
        <>
        <Navbar />
        <div className = "cards">
        <CardReturn />
        </div> 
        </>
        
    )
}