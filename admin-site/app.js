

let link_tablas = document.querySelectorAll(".link_tablas");
let contenidoHtml = document.querySelector("#contenido")

let config = { //Inicializo la configuracion de comunicacion 
    headers:new Headers({
        "Content-Type": "application/json"
    }),
};

const getAll = async(nombreTabla)=>{ 
    config.method = "GET";
    let response= await fetch(`http://localhost/PDOnew/uploads/${nombreTabla}`,config);
    let datosTabla = await response.json();
    return datosTabla;

}


link_tablas.forEach(async tabla => {
    tabla.addEventListener('click', async (e) => {
        e.preventDefault();
        contenidoHtml.innerHTML = '';
        let datosTabla = await getAll(tabla.textContent);
        let tableCampus = new TableCampus(datosTabla,tabla.textContent);
        contenidoHtml.appendChild(tableCampus);

    });
});


