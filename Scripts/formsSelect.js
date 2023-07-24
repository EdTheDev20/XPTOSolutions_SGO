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

function alterMunicipiosOut() {
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
  window.location.href = `index.php?op=createoutdoors&provid=${selectedValue}`; 
}

function alterMunicipiosAlt() {
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
  window.location.href = `index.php?op=creategestores&provid=${selectedValue}`; 
}

function editAlterMunicipios() {
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
  window.location.href = `index.php?op=dashboard&provid=${selectedValue}`; 
}
function alterComunas() {
  var provinciaSelect = document.getElementById("provinciaSelect");
  var provinciaId = provinciaSelect.value;

  var municipioSelect = document.getElementById("municipioSelect");
  var municipioId = municipioSelect.value;
  window.location.href = `index.php?op=register&provid=${provinciaId}&munid=${municipioId}`;
}
function alterComunasout() {
  var provinciaSelect = document.getElementById("provinciaSelect");
  var provinciaId = provinciaSelect.value;

  var municipioSelect = document.getElementById("municipioSelect");
  var municipioId = municipioSelect.value;
  window.location.href = `index.php?op=createoutdoors&provid=${provinciaId}&munid=${municipioId}`;
}

function alterComunasAlt() {
  var provinciaSelect = document.getElementById("provinciaSelect");
  var provinciaId = provinciaSelect.value;

  var municipioSelect = document.getElementById("municipioSelect");
  var municipioId = municipioSelect.value;
  window.location.href = `index.php?op=creategestores&provid=${provinciaId}&munid=${municipioId}`;
}

function editalterComunas() {
  var provinciaSelect = document.getElementById("provinciaSelect");
  var provinciaId = provinciaSelect.value;

  var municipioSelect = document.getElementById("municipioSelect");
  var municipioId = municipioSelect.value;
  window.location.href = `index.php?op=dashboard&provid=${provinciaId}&munid=${municipioId}`;
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

function imageoutdoorFunc() {
  var outdoorimage = document.getElementById("outdoorimage");
  var choice = outdoorimage.value;
  var uploaddiv = document.getElementById("upload");
  if (choice == 1) {
    uploaddiv.innerHTML = ` <label for="imageUpload" class="form-label">Upload Image</label>
    <input type="file" class="form-control" id="imageUpload" name="imageUpload" accept="image/*" required>
    <div class="form-text">Escolha uma imagem para fazer upload (JPEG, PNG, GIF).</div>
`;
  } else {
    uploaddiv.innerHTML = '';
  }
}

document.addEventListener("DOMContentLoaded", function() {
  function checkDateValidity() {
      const startDate = new Date(document.getElementById("startdate").value);
      const endDate = new Date(document.getElementById("enddate").value);

      if (endDate < startDate) {
          alert("A data de fim deve ser posterior à data de início.");
          return false;
      }
      return true;
  }

  document.getElementById("enddate").addEventListener("change", checkDateValidity);
});

