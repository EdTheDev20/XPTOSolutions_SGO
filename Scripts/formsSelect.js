function alterMunicipios() {
  var selectElement = document.getElementById("provinciaSelect");
  var selectedValue = selectElement.value;
  /*
  $.ajax({
        url:'Scripts/getMunicipios.php',
        type:'GET',
        data:{
            provincia: selectedValue
        },
        success: function(response){
          alert(response);
        },error:function(xhr){
            //do something
        }
    }) */
  window.location.href = `index.php?op=register&provid=${selectedValue}`; 
}

function alterComunas() {
  var provinciaSelect = document.getElementById("provinciaSelect");
  var provinciaId = provinciaSelect.value;

  var municipioSelect = document.getElementById("municipioSelect");
  var municipioId = municipioSelect.value;
  window.location.href = `index.php?op=register&provid=${provinciaId}&munid=${municipioId}`;
}

function check() {
  if (
    document.getElementById("inputPassword").value ==
    document.getElementById("checkPassword").value
  ) {
    document.getElementById("message").style.color = "green";
    document.getElementById("message").innerHTML = "Passwords iguais";
  } else {
    document.getElementById("message").style.color = "red";
    document.getElementById("message").innerHTML = "Passwords diferentes";
  }
}

function typeOfClient() {
  var tipodeClienteSelect = document.getElementById("tipodeCliente");
  var clienteId = tipodeClienteSelect.value;
  var empresaActivitiesDiv = document.getElementById("empresaActivities");
  if (clienteId == 2) {
    empresaActivitiesDiv.innerHTML = `<label for="actividadeDaEmpresa" class="form-label">Actividade Da Empresa</label>
    <textarea class="form-control" id="actividadeDaEmpresa" name="actividadeDaEmpresa" rows="3" required></textarea>`;
  } else {
    empresaActivitiesDiv.innerHTML = '';
  }
}
