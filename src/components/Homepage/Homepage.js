import React from "react"
import "../Navbar/Navbar.css"
import "./Homepage.css"
import Navbar from "../Navbar/Navbar"
import Datatable from "../Datatable/Datatable"
import Card from "../Card/Card"
import {useState} from "react"
import {Switch, FormControlLabel} from "@mui/material"



export default function Pocetna() {
    const [checked, setChecked] = useState(true)
    const handleChange = (event) => {
        setChecked(event.target.checked)
    }

    return (
        <>
        <Navbar />
        <FormControlLabel 
            control = {
                <Switch 
                checked = {checked} 
                onChange = {handleChange}
                />
            }

        label = "View mode toggle"
        />
        
        {checked ? 
        <div className = "cards">
        <Card  zaduzenje = {false}/>
        </div> : 
        <Datatable zaduzenje = {false}/>
        }
        
        </>
        
    )
    
}