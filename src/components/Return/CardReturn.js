import {useEffect, useState} from "react"
import "./Return.css"
import React from "react"
import Axios from "axios"
import Button from "react-bootstrap/Button"
import {format} from "date-fns"
import { useNavigate } from "react-router-dom"

export default function Card(props) {
    const navigate = useNavigate();
    const [data, setData] = useState([])
    
    useEffect(() => {
        getData()
    }, [])

    const getData = () => {
        Axios.get("http://localhost/voznipark/src/API/getZaduzena.php")
        .then((res) => {
            const Array = res.data
            console.log(Array);
            setData(Array)

        })
        .catch((error) => {
            console.log(error)
        })

    }

    const vratiVozilo = (id) => {
        if(window.confirm("Zelite li vratiti vozilo broj " + id + "?")) {
            
                vratiConfirm(id)
            }
        
        
    }

    async function vratiConfirm(id) {
        const deleteURL = "http://localhost/voznipark/src/API/vrati.php"
        var params = new URLSearchParams()
        params.append("Id", id)
        Axios.post(deleteURL, params).then(() => {
            
            navigate("/Pocetna", {replace:true})
        })
        .catch((error) => {
            console.log(error)
        })
    }

    return (
        
        data.map(data => 

        <div className = "card-vrati">
            <img alt = "Auto slika" className = "card-vrati-img" src = {data.Slika} />
            <h1 className = "card-title">{data.Marka} {" "} {data.Model}</h1>
            
            <div className = "card-vrati-infogroup">
                <h3>Registriran od: {format(new Date(data.Registracija), 'dd.MM.yyyy')}</h3>
                <h3>Registriran do: {format(new Date(data.Istek_registracije), 'dd.MM.yyyy')}</h3>
            </div>
            <div className = "card-vrati-footer">
                <Button className = "card-vrati-btn" variant = "info" onClick = {() => vratiVozilo(data.idVozila)}>Return vehicle</Button>
            </div>
        </div>)
        
    )
}