import React from "react"
import {useState} from "react"
import Button from "react-bootstrap/Button"
import Modal from "react-bootstrap/Modal"


export default function ShowModal() {
    const [show, setShow] = useState(true);
    const handleClose = () => setShow(false);

    return (
        <Modal show = {true} onHide = {false}>
            <Modal.Header closeButton>
                <Modal.Title>Modal heading</Modal.Title>
            </Modal.Header>
            <Modal.Body>Isuse boze kolko je ovo uzasno</Modal.Body>
            <Modal.Footer>
                <Button variant = "secondary" onClick = {handleClose}>Close</Button>
                <Button variant = "primary" onClick = {handleClose}>Save changes</Button>
            </Modal.Footer>
        </Modal>
    )
}
