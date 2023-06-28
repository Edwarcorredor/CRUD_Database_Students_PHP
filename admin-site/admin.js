const formulario = document.querySelector('#formulario');

let config = { //Inicializo la configuracion de comunicacion para el json-server
    headers:new Headers({
        "Content-Type": "application/json"
    }),
};


const postCampers = async(data)=>{ //funcion para agregar un Campers nuevo al json-server
    config.method = "POST";
    config.body = JSON.stringify(data);
    await ( await fetch(`http://localhost/ApolT01-019/Filtro/uploads/campers`,config)).text();

}

const deleteCampers = async(data)=>{ //funcion para eliminar un Campers del json-server usando su id
    config.method = "DELETE";
    config.body = JSON.stringify(data);
    let res = await ( await fetch(`http://localhost/ApolT01-019/Filtro/uploads/campers`,config)).text();

}

const putCampers = async(data)=>{ // funcion para actualizar informacion de un Campers
    config.method = "PUT";
    config.body = JSON.stringify(data);
    await ( await fetch(`http://localhost/ApolT01-019/Filtro/uploads/campers`,config)).text();
}


const opc = { // objeto tipo menu para saber cual de todas las funciones elegir dependiendo del submit
    "GET": () => getCampersAll(),
    "PUT": (data) => putCampers(data),
    "DELETE": (data) => deleteCampers(data),
    "POST": (data) => postCampers(data)
}


const elegirMetodo = function(e){ //funcion para extraer informacion del formulario y saber cual funcion de manejo de datos ejecutar luego, basandonos en el data-accion
    e.preventDefault();
    let data = Object.fromEntries(new FormData(e.target)); 
    opc[e.submitter.dataset.accion](data) 
}

formulario.addEventListener('submit', elegirMetodo);


