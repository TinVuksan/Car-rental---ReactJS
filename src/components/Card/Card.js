import {useEffect, useState} from "react"
import "./Card.css"
import React from "react"
import Axios from "axios"
import Button from "react-bootstrap/Button"
import {format} from "date-fns"
import { useNavigate } from "react-router-dom"
import {Modal,Col, Row,FloatingLabel, Form} from 'react-bootstrap'

export default function Card(props) {
    const navigate = useNavigate();
    const [data, setData] = useState([])
    const [show, setShow] = useState(false)
    const [dataJedan, setDataJedan] = useState([{
        idVozila: "", Marka: "", Model: "", Vrsta: "", Registracija: "", Istek_registracije: "",  Slika: ""
    }])
    
   
    useEffect(() => {
        getData();
    },[])

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
    
    const handleChange = (e) => {
        setDataJedan(prevFormData => {
            return {
                ...prevFormData,
                [e.target.name]: e.target.value
            }
            
        })
        
    }

    const handleSubmit = () => {
        var params = new URLSearchParams();
        
        params.append('idVozila', dataJedan.idVozila);
         params.append('marka_vozila', dataJedan.Marka);
         params.append('model_vozila', dataJedan.Model);
         params.append('slika', dataJedan.Slika);
         Axios.post("http://localhost/voznipark/src/API/edit.php", params)
         .then((response) => {
			
                console.log(response.data)
				setShow(false)
                getData()
			
		})
        
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
      
        var params = new URLSearchParams()
        params.append('Id', id)
        Axios.post("http://localhost/voznipark/src/API/getById.php", params)
        .then((res) => {
            const Array = res.data
            console.log(Array[0]);
            setDataJedan(Array[0])
            console.log(id)
        })
        .catch((error) => {
            console.log(error)
        })
        
        setShow(true)
        
        
    }

    return (
        <>
        {data.map(data => 
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
        </div>)}
    {/* id: "", marka: "", model: "", vrsta: "", registracija: "",  slika: "" */}
        <Modal show={show} onHide={()=>setShow(false)}>
                <Modal.Header closeButton>
                    <Modal.Title>Uredi vozilo</Modal.Title>
                </Modal.Header>
                <Modal.Body>
                    <Form>
                    <FloatingLabel controlId="floatingInput" label="Id vozila" className="mb-3" >
                        <Form.Control type="text" placeholder="Id vozila" name="idVozila" value={dataJedan.idVozila || ""}  readOnly onChange={handleChange}/>
                    </FloatingLabel>
                    <Row>
                        <Col>
                            <Form.Group className="mb-3" controlId="select1">
                                <FloatingLabel controlId="floatingInput" label="Marka" className="mb-3" >
                                    <Form.Control type="text" placeholder="Student" name="Marka" value={dataJedan.Marka || ""} onChange={handleChange} />
                                </FloatingLabel>                 
                            </Form.Group>
                        </Col>
                        <Col>
                            <Form.Group className="mb-3" controlId="select2">
                                <FloatingLabel controlId="floatingInput" label="Model" className="mb-3" >
                                    <Form.Control type="text" placeholder="Model" name="Model" value={dataJedan.Model || ""} onChange={handleChange} />
                                </FloatingLabel>                               
                            </Form.Group>
                        </Col> 
                    </Row>                   
                    <Form.Group className="mb-3" controlId="select3">
                        <FloatingLabel controlId="floatingInput" label="Registracija" className="mb-3" >
                            <Form.Control type="text" placeholder="Slika" name="Registracija" value={dataJedan.Registracija || ""} onChange={handleChange} readOnly/>
                        </FloatingLabel>            
                    </Form.Group>
                    <Form.Group className="mb-3" controlId="select3">
                        <FloatingLabel controlId="floatingInput" label="Slika" >
                            <Form.Control as="textarea" rows={1} placeholder="Slika" name="Slika" value={dataJedan.Slika || ""} onChange={handleChange} style={{height:'150px', maxHeight:'200px'}} />
                        </FloatingLabel>             
                    </Form.Group>
                    </Form> 
                </Modal.Body>
                <Modal.Footer>
                    <Button variant="primary" onClick={handleSubmit}>Uredi</Button>
                </Modal.Footer>
            </Modal> 
        
        </>
        
        
    )
}