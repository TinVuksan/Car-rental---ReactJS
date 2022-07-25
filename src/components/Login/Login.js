import "./Login.css"
import {useState} from "react"
import React from "react"
import Button from "react-bootstrap/Button"
import Axios from "axios"
import { useNavigate } from "react-router-dom"

export default function Login() {
	const navigate = useNavigate();
	const [formData, setFormData] = useState({
		mail: "", lozinka: ""
	})

	//let {mail, lozinka} = formData



	function handleChange(e) {

		setFormData(prevFormData => {
			return {
				...prevFormData,
				[e.target.name]: e.target.value
		}
			
		})
		

	}
	

	function handleSubmit() {
		var params = new URLSearchParams();
        params.append('mail', formData.mail);
        params.append('lozinka', formData.lozinka);
		console.log(params);
		Axios.post("http://localhost/voznipark/src/API/login.php",params).then((response) => {
			if(response.data) {
				window.sessionStorage.setItem("prijava", true)
				navigate("/Home", {replace:true})
			}
		})
	}

    return (
        <>

        <div className="loginbox">
		<h1 className = "login-title"><b>Welcome!</b></h1>
		<form id="login-form">

		<div className="form-floating mb-3">				
				<input 
				id="login-mail" 
				className="form-control" 
				type="email" 
				name="mail" 
				placeholder="yourmail@domain.com" 
				value = {formData.mail}
				onChange = {handleChange}
				required
				/>	
				<label htmlFor = "login-mail">Mail</label>			
		</div>

		<div className="form-floating mb-3">				
				<input 
				id="login-lozinka" 
				className="form-control"
				type="password" 
				name="lozinka" 
				placeholder="Enter your password..." 
				onChange = {handleChange} 
				value = {formData.lozinka}
                required
				/>	
				<label htmlFor = "login-lozinka">Password</label>			
		</div>


		
		<Button id="login-btn" variant = "outline-dark" onClick = {handleSubmit}>
			LOGIN
		</Button>

		</form>
	    </div>
        

        </>
        
    )
}