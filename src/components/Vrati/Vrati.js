import React from "react"
import "../Navbar/Navbar.css"
import Navbar from "../Navbar/Navbar"
import Datatable from "../Datatable/Datatable"
import CardVrati from "./CardVrati"
import {useState} from "react"
import {Switch, FormControlLabel} from "@mui/material"
export default function Vrati() {

    
    return (
        <>
        <Navbar />
        <div className = "cards">
        <CardVrati />
        </div> 
        </>
        
    )
}