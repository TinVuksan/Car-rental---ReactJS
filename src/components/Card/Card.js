import {useEffect, useState} from "react"
import "./Card.css"
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
        Axios.get("http://localhost/voznipark/src/API/json.php")
        .then((res) => {
            const Array = res.data
            console.log(Array);
            setData(Array)

        })
        .catch((error) => {
            console.log(error)
        })

    }

    const deleteRow = (id) => {
        if(window.confirm("Zelite li obrisati vozilo broj " + id + "?")) {
            
                deleteConfirm(id)
            }
        
        
    }

    async function deleteConfirm(id) {
        const deleteURL = "http://localhost/voznipark/src/API/delete.php"
        var params = new URLSearchParams()
        params.append("Id", id)
        Axios.post(deleteURL, params).then(() => {
            
            getData();
        })
        .catch((error) => {
            console.log(error)
        })
    }

    const zaduziVozilo = (id) => {
        if(window.confirm("Želite li sigurno zadužiti vozilo broj " + id + "?")) {
            zaduziConfirm(id)
        }
    }

    async function zaduziConfirm(id) {
        const zaduziURL = "http://localhost/voznipark/src/API/zaduzi.php"
        var params = new URLSearchParams()
        params.append("Id", id)
        Axios.post(zaduziURL, params).then(() => {

            navigate("/Pocetna/Vrati", {replace:true})
        })
        .catch((error) => {
            console.log(error)
        })
    }

    const urediVozilo = (id) => {
        if(window.confirm("Uređujete vozilo broj " + id + "!")) {
            navigate("/Pocetna", {replace:true})
        }
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
                <Button variant = "success" onClick = {props.zaduzenje ? () => zaduziVozilo(data.idVozila) : () => urediVozilo(data.idVozila)}>{props.zaduzenje ? "Zaduži" : "Uredi"}</Button>
                <Button variant = "danger" onClick = {() => deleteRow(data.idVozila)}>Obriši</Button>
            </div>
        </div>)
        
    )
}