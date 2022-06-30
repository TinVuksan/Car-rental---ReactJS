import React from "react"
import Axios from "axios"
import {useState, useEffect} from "react"
import Table from "react-bootstrap/Table"
import Button from "react-bootstrap/Button"
import {useNavigate} from "react-router-dom"

import "./Datatable.css"


export default function Datatable(props) {

    const [data, setData] = useState([])

    const navigate = useNavigate();

    useEffect(() => {
        getData()
    }, [])
    
    const headers = ["#", "Marka", "Model", "Vrsta vozila", "Registracija", "Istek registracije", "Obriši",  props.zaduzenje && "Uredi"]

    const getData = () => {
        Axios.get("http://localhost/voznipark/src/API/json.php")
        .then((res) => {
            console.log(res.data);
            const Array = res.data
            setData(Array)
        })
        .catch((error) => {
            console.log(error)
        })

    }

    const deleteRow = (id) => {
        if(window.confirm("Zelite li obrisati vozilo br " + id)) 
            {
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
        const deleteURL = "http://localhost/voznipark/src/API/zaduzi.php"
        var params = new URLSearchParams()
        params.append("Id", id)
        Axios.post(deleteURL, params).then(() => {
            
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
        <>
        <Table responsive striped bordered hover className = "tablica">
        <thead>
            <tr>
            {headers.map(header => <th>{header}</th>)}
            </tr>
        </thead>
        <tbody>
            {data.map(vozilo => 
            <tr>
                <td>
                    {vozilo.idVozila}
                </td>
                <td>
                    {vozilo.Marka}
                </td>
                <td>
                    {vozilo.Model}
                </td>
                <td>
                    {vozilo.Vrsta_vozila}
                </td>
                <td>
                    {vozilo.Registracija}
                </td>
                <td>
                    {vozilo.Istek_registracije}
                </td>
                <td>
                    <Button variant = "danger" onClick = {() => deleteRow(vozilo.idVozila)}>Obriši</Button>
                    
                </td>
                <td>
                {props.zaduzenje && <Button variant = "success" onClick = {() => zaduziVozilo(vozilo.idVozila)}> Zaduži</Button>}
                </td>
            </tr>)}
            
        </tbody>
        </Table>
   
        </>
        
        

         
            
        
    )
}