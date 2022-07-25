import React from "react"
import "./AddVehicle.css"
import Navbar from "../Navbar/Navbar"
import Form from "react-bootstrap/Form"
import FloatingLabel from 'react-bootstrap/FloatingLabel'
import {useState} from "react"
import Button from "react-bootstrap/Button"
import Axios from "axios"
import { useNavigate } from "react-router-dom"
import DatePicker from "react-date-picker"
import {format, add} from "date-fns"




export default function DodajVozilo() {
    
    const Navigate = useNavigate()
    const [value, setValue] = useState(new Date())
    const [formData, setFormData] = useState({
		marka: "", model: "", vrsta: "", registracija: value,  slika: ""
	})
   
   


    

    const handleChange = (e) => {
        setFormData(prevFormData => {
            return {
                ...prevFormData,
                [e.target.name]: e.target.value
            }
            
        })
        
    }
    const addVehicle = (marka,model,vrsta,registracija,istek,slika) => {
        var params = new URLSearchParams();
        
        
         params.append('marka_vozila', marka);
         params.append('model_vozila', model);
         params.append('vrsta_vozila', vrsta);
         params.append('registracija', registracija);
         params.append('istek_registracije', istek);
         params.append('slika', slika);
         Axios.post("http://localhost/voznipark/src/API/addVehicle.php", params)
         .then((response) => {
			
                console.log(response.data)
				Navigate("/Home", {replace:true})
			
		})
    }
    const handleSubmit = (event) => {
        event.preventDefault();
        let brojka = 0
        switch(formData.vrsta) {
            case "Automobil":
            brojka = 1;
            break;

            case "Kamion":
            brojka = 1;
            break;

            case "Motocikl":
            brojka = 2;
            break;

            case "Radni stroj":
            brojka = 3;
            break;

            default:
                alert("Error!");


        }
        
        addVehicle(formData.marka, formData.model, formData.vrsta, format(value, 'yyyy-MM-dd'), format(add(value, {years:brojka}), 'yyyy-MM-dd'), formData.slika)

    }
    
    return (
        <>
        <Navbar />
        <Form className = "dodajform">
        <h3 className = "dodajform-title">Add a vehicle</h3>
        <Form.Group className = "mb-4">
            <FloatingLabel
            label = "Brand">

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
            label = "Vehicle model"
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
                <option>Vehicle type</option>
                <option>Automobil</option>
                <option>Motocikl</option>
                <option>Kamion</option>
                <option>Radni stroj</option>
            </Form.Select>
            
        </Form.Group>

        <Form.Group className = "mb-0">
        <Form.Label>Registration date</Form.Label>
        </Form.Group>
        <Form.Group className = "mb-4">
        <DatePicker
        name = "registracija" 
        onChange = {setValue}  
        value = {value}
        format = "dd.MM.yyyy"
        clearIcon = {null}
        locale = "hr-HR"


        />
        </Form.Group>

        <Form.Group className = "mb-4">
            <Form.Label>Enter vehicle image URL</Form.Label>
            <Form.Control 
            onChange = {handleChange} 
            type="text" 
            name = "slika" 
            value = {formData.slika}
            />
        </Form.Group>
        <Button variant = "success" onClick = {handleSubmit}>Submit</Button>
        </Form>
        </>
           
    )
}