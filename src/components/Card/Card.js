import {useEffect, useState} from "react"
import "./Card.css"
import React from "react"
import Axios from "axios"
import Button from "react-bootstrap/Button"
import {format} from "date-fns"
export default function Card() {

    const [data, setData] = useState([])
    
    useEffect(() => {
        getData()
    }, [])

    const getData = () => {
        Axios.get("http://localhost/voznipark/src/API/json.php")
        .then((res) => {
            const Array = res.data

            setData(Array)
        })
        .catch((error) => {
            console.log(error)
        })

    }
    return (
        
        data.map(data => 

        <div className = "card">
            <img alt = "Auto slika" className = "card-img" src = {data.Slika} />
            <h1 className = "card-title">{data.Marka} {" "} {data.Model}</h1>
            
            <div className = "card-infogroup">
                <h3>Registriran od: {format(new Date(data.Registracija), 'dd.MM.yyyy')}</h3>
                <h3>Registriran do: {format(new Date(data.Istek_registracije), 'dd.MM.yyyy')}</h3>
            </div>
            <div className = "card-footer">
                <Button variant = "success">Uredi</Button>
                <Button variant = "danger">Obriši</Button>
            </div>
        </div>)
        
    )
}