import React from "react"
import "./DodajVozilo.css"
import Navbar from "../Navbar/Navbar"
import Form from "react-bootstrap/Form"
import FloatingLabel from 'react-bootstrap/FloatingLabel'
import Datepicker from "react-date-picker"
import {useState} from "react"
import Button from "react-bootstrap/Button"
import Axios from "axios"
import { useNavigate } from "react-router-dom"
import {format} from "date-fns"

export default function DodajVozilo() {
    const Navigate = useNavigate()
    const [value, setValue] = useState(new Date())
    const [istekReg, setIstekReg] = useState(new Date())
    const [formData, setFormData] = useState({
		marka: "", model: "", vrsta: "", registracija: value, istek_registracije: istekReg, slika: ""
	})


    const handleChange = (e) => {
        setFormData(prevFormData => {
            return {
                ...prevFormData,
                [e.target.name]: e.target.value
            }
        })
        console.log(e.target.value);
    }
    const handleSubmit = () => {
        var params = new URLSearchParams();
        //idVozila,:Marka,:Model,:Vrsta_vozila,:Registracija,:Istek_registracije, :Slika
        //var istek = formData.registracija.getFullYear();
        params.append('marka_vozila', "Autekmali");
        params.append('model_vozila', "A3");
        params.append('vrsta_vozila', "Automobil");
        params.append('registracija', formData.registracija);
        params.append('istek_registracije', "2022-06-05");
        params.append('slika', "hhhtpasdkpapsdasd")
		Axios.post("http://localhost/voznipark/src/API/dodaj.php",params).then((response) => {
			if(response.data) {
                
				Navigate("/Pocetna", {replace:true})
			}
			console.log(response.config.data);
            console.log(istekReg)
		})
        .catch((error) => {
            console.log(error)
        })
    }
    
    return (
        <>
        <Navbar />
        <Form className = "dodajform">
        <h3 className = "dodajform-title">Dodaj vozilo!</h3>
        <Form.Group className = "mb-4">
            <FloatingLabel
            label = "Marka vozila">

            <Form.Control 
            onChange = {handleChange} 
            name = "marka" 
            type = "text" 
            placeholder = "Audi/BMW/Mercedes..." 
            value = {formData.marka}
            />
            </FloatingLabel>
        </Form.Group>

        <Form.Group className = "mb-4">
            <FloatingLabel
            label = "Model vozila"
            >
            <Form.Control 
            onChange = {handleChange} 
            name = "model" 
            type = "text" 
            placeholder = "A3/C220/M5..." 
            value = {formData.model}
            />
            </FloatingLabel>
        </Form.Group>

        <Form.Group className = "mb-4">
            
            <Form.Select 
            onChange = {handleChange} 
            name = "vrsta" 
            value = {formData.vrsta}
            >
                <option>Vrsta vozila</option>
                <option>Automobil</option>
                <option>Motocikl</option>
                <option>Kamion</option>
                <option>Radni stroj</option>
            </Form.Select>
            
        </Form.Group>

        <Form.Group className = "mb-4">
        <Datepicker 
        name = "registracija" 
        locale = "hr-HR" 
        onChange = {setValue} 
        value = {value}
        format = "dd.MM.yyyy"
        />

        <Datepicker 
        name = "istek_registracije" 
        locale = "hr-HR" 
        onChange = {setIstekReg} 
        value = {value.setFullYear(value.getFullYear()+1)}
        format = "dd.MM.yyyy"
        />
        </Form.Group>

        <Form.Group className = "mb-4">
            <Form.Label>Odaberi sliku vozila!</Form.Label>
            <Form.Control 
            onChange = {handleChange} 
            type="file" 
            name = "slika" 
            value = {formData.slika}
            />
        </Form.Group>
        <Button variant = "success" onClick = {handleSubmit}>Dodaj</Button>
        </Form>
        </>
           
    )
}