
let contenidoHtml = document.querySelector("#bodytabla")

let config = { //Inicializo la configuracion de comunicacion 
    headers:new Headers({
        "Content-Type": "application/json"
    }),
};

const getAll = async()=>{ 
    config.method = "GET";
    let response= await fetch("http://localhost/ApolT01-019/Filtro/uploads/campers",config);
    let datosTabla = await response.json();
    let tabla = '';
    datosTabla.forEach(element => {
        tabla += `
        <tr>
            <td>${element.idCamper}</td>
            <td>${element.nombreCamper}</td>
            <td>${element.apellidoCamper}</td>
            <td>${element.fechaNac}</td>
            <td>${element.idReg}</td>
        </tr>`
    });
    contenidoHtml.innerHTML = tabla;

}

getAll();
