var asignaturas =[];
var cantidad_rep =[];
var cantidad_apr =[];
for(var i =0;i<reprobados.length;i++){
    asignaturas.push(reprobados[i].asignatura);
    cantidad_rep.push(reprobados[i].cant_est)
}
for(var j =0;j<aprobados.length;j++){
    cantidad_apr.push(aprobados[j].cant_est)
}


new Chart(document.getElementById("bar-chart-grouped"), {
    type: 'horizontalBar',
    data: {
      labels: asignaturas,
      datasets: [
        {
          label: "REPROBADOS",
          backgroundColor: "#E00B0B",
          data: cantidad_rep
        }, {
          label: "APROBADOS",
          backgroundColor: "#0CE708",
          data: cantidad_apr
        }
      ]
    },
    options: {
      title: {
        display: true,
        text: ' '
      }

    }
});




function ocultar(){
    
    $("#table").toggle('slow');
    $( window ).scrollTop( 786 );
    
    
}

function ocultarOnload(){
    $("#table").hide()
    FormSubmit();
}

function openCity(evt, corte) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  
  for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(corte).style.display = "block";
  evt.currentTarget.className += " active";
}

function FormSubmit(){
  var submitBtn = document.getElementById('clickPrimary');
    if(submitBtn){
      submitBtn.click();
    }
}
var cant_reprobados=0;
var cant_aprobados =0;
for(var k=0;k<cantidad_rep.length;k++){
  cant_reprobados = cantidad_apr[k] + cantidad_rep[k];
}

for(var h=0;h<cantidad_apr.length;h++){
  cant_aprobados = cant_aprobados + cantidad_apr[h];
}
console.log(cant_reprobados);
console.log(cant_aprobados);
new Chart(document.getElementById("pie-chart"), {
  type: 'pie',
  data: {
    labels: ["aprobados","reprobados"],
    datasets: [{
      label: "Population (millions)",
      backgroundColor: ["#3e95cd","#3ADF00"],
      data: [cantidad_apr.length,cantidad_apr.length]
    }]
  },
  options: {
    title: {
      display: true,
      text: 'Predicted world population (millions) in 2050'
    }
  }
});





