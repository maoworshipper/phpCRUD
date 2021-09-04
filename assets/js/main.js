// Acciones Menu

window.addEventListener("load",()=>{

    let insertar = document.getElementById("btnIngresar");
    insertar.addEventListener("click", (e) => {
        e.preventDefault();
        document.getElementById("mensaje-inicial").style.display = "none";
        document.getElementById("insertar").style.display = "block";
        document.getElementById("consultar").style.display = "none";
    }, false);

    let consultar = document.getElementById("btnConsultar");
    consultar.addEventListener("click", (e) => {
        e.preventDefault();
        document.getElementById("mensaje-inicial").style.display = "none";
        document.getElementById("insertar").style.display = "none";
        document.getElementById("consultar").style.display = "block";

        consultarInfo();
    }, false);

    let insertForm = document.getElementById("insertarForm");
    let guardar = document.getElementById("guardar");
    insertForm.addEventListener("submit", function(event) {
      event.preventDefault();
      guardar.click();
    }, true);

});


// Procesar acciones

function insertar() {
    
    let tarea=document.getElementById("tarea").value;
   
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      if(xhttp.responseText==1){
		    document.getElementById("respuestas").innerHTML = "Tarea Guardada correctamente.";	
            document.getElementById("insertarForm").reset();
		}
		else{
            document.getElementById("respuestas").innerHTML = "Lo sentimos, no fue posible guardar la información.";	
		}
    }
  };
  xhttp.open("POST", "controllers/insert.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("tarea="+tarea);

}

function consultarInfo() {
 
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {

		    document.getElementById("consultar").innerHTML = xhttp.responseText;	
		
    }
  };
  xhttp.open("GET", "controllers/getdata.php");
  xhttp.send();

}

function actualizar(idTarea) {
 
  let xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
  if (xhttp.readyState == 4 && xhttp.status == 200) {
    if(xhttp.responseText==1){
      document.getElementById("tarea" + idTarea).className = 'completada';	
      document.getElementById("btn" + idTarea).disabled = true;
  }
  else{
          document.getElementById("respuestas").innerHTML = "Lo sentimos, no fue posible guardar la información.";	
  }
  }
};
xhttp.open("POST", "controllers/update.php", true);
xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhttp.send("id="+idTarea);

}

function eliminar(idTarea) {
 
  let xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
  if (xhttp.readyState == 4 && xhttp.status == 200) {
    if(xhttp.responseText==1){
      document.getElementById("tarea" + idTarea).style.display = 'none';	
  }
  else{
          document.getElementById("respuestas").innerHTML = "Lo sentimos, no fue posible eliminar la información.";	
  }
  }
};
xhttp.open("POST", "controllers/delete.php", true);
xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhttp.send("id="+idTarea);

}