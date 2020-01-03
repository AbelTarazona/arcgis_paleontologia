var sectores = [];
var sectoresDetalle = [];

var j = 0;


function addSector() {
    var sector = $('#sectorID').val();
    var sectorDetalle = $('#sectorDescripcionID').val();

    var sectorObj = {};
    sectorObj.name = sector;
    sectorObj.description = sectorDetalle;
    sectores.push(sectorObj);

    showSectores();
}

function showSectores() {
    var html = "";

    for (i = j; i < sectores.length; i++) {
        html += `<div class='card'>
        <div class="card-body">
            <div class='row'>
                <div class='col-md-9'>
                    <b>Sector ` + sectores[i].name + `</b>
                </div>
                <div class='col-md-3' style='text-align: end' onclick='removerFundamento(` + i + `)'>
                    <button type="button" class="btn btn-danger btn-sm">Eliminar</button>
                </div>     


                <div class="col-2">
                    <div class="form-group">
                        <label for="nombre">Coordenada</label>
                        <select class="form-control" id='coordenadaID` + i + `' >
                            <option selected>Seleccionar</option>
                            <option>Norte</option>
                            <option>Sur</option>
                            <option>Este</option>
                            <option>Oeste</option>
                        </select>
                    </div>
                </div>

                <div class="col-2">
                    <div class="form-group">
                        <label for="nombre">Tipo</label>
                        <select class="form-control" id='tipoID` + i + `' >
                            <option selected>Seleccionar</option>
                            <option>X</option>
                            <option>Y</option>
                        </select>
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label for="nombre">Valor</label>
                        <input id='valorID` + i + `' type="text" class="form-control" placeholder="1.0520">
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label style="opacity: 0;">...</label>
                        <button type="button" class="btn btn-success" onclick="addSectorDetalle(` + i + `)"
                            style="width: inherit; display: block;">Agregar</button>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card-deck" id="sectoresDetalleContainer` + i + `" style="padding: 5px;"></div>
                </div>

            </div>  
            </div>     
        </div>`;
        html += "<br>";
        //toBD += articulos[i].article;
    }
    j++;
    $("#sectoresContainer").append(html);

    /*var salida = JSON.stringify(articulos);
    $("#inputOcultoArticulos").val(salida);*/

    feather.replace()
}

//Detalle

function addSectorDetalle(position) {
    var coordenada = $('#coordenadaID' + position + '').val();
    var tipo = $('#tipoID' + position + '').val();
    var valor = $('#valorID' + position + '').val();

    var sectorDetalleObj = {};
    sectorDetalleObj.position = position;
    sectorDetalleObj.coordenada = coordenada;
    sectorDetalleObj.type = tipo;
    sectorDetalleObj.value = valor;

    console.dir(sectorDetalleObj);

    sectoresDetalle.push(sectorDetalleObj);

    showSectoresDetalles(position);
}

function showSectoresDetalles(positionSector) {
    var html = "";

    for (i = 0; i < sectoresDetalle.length; i++) {

        console.log("pos>" + sectoresDetalle[i].position + " // " + positionSector);

        if (sectoresDetalle[i].position != positionSector) 
            continue;
        
        html += `
        <div class='card'>
            <div class="card-body">
                <h5 class="card-title">` + sectoresDetalle[i].coordenada + ' ' + sectoresDetalle[i].type + `</h5>
                <div class="card-footer">
                    <small class="text-muted">` + sectoresDetalle[i].value + `</small>
                </div>
            </div>     
        </div>`;
        html += "<br>";
        //toBD += articulos[i].article;
    }

    console.log(html);

    $("#sectoresDetalleContainer" + positionSector + "").html(html);

    /*var salida = JSON.stringify(articulos);
    $("#inputOcultoArticulos").val(salida);*/

    feather.replace()
}

function save() {

    //Patrimonio
    var txtNombre = $('#txtNombre').val();
    var selectClasificacion = $('#selectClasificacion').val();
    var selectEstado = $('#selectEstado').val();
    var txtDescripcion = $('#txtDescripcion').val();
    var txtEstratigrafia = $('#txtEstratigrafia').val();
    var txtNumPlano = $('#txtNumPlano').val();
    var modelo3d = $('#files').val();

    var txtAntecedentes = $('#txtAntecedentes').val();
    var txtAfectaciones = $('#txtAfectaciones').val();
    var txtObservaciones = $('#txtObservaciones').val();
    var txtCroquis = $('#txtCroquis').val();
    var txtImportancia = $('#txtImportancia').val();
    var txtValor = $('#txtValor').val();
    var txtSignificado = $('#txtSignificado').val();

    //Ubicacion
    var txtDepartamento = $('#selectDepartamento option:selected').text();
    var txtProvincia = $('#selectProvincia option:selected').text();
    var txtDistrito = $('#selectDistrito option:selected').text();
    var txtUbigeo = $('#selectDistrito').val();




    var formData = new FormData();
    formData.append('txtNombre', txtNombre);
    formData.append('selectClasificacion', selectClasificacion);
    formData.append('selectEstado', selectEstado);
    formData.append('txtDescripcion', txtDescripcion);
    formData.append('txtEstratigrafia', txtEstratigrafia);
    formData.append('txtNumPlano', txtNumPlano);

    for(var i = 0; i<$('input[name=fileImagen]')[0].files.length; i++){
        formData.append('archivo'+(i+1), $('input[name=fileImagen]')[0].files[i]);
    }

    //formData.append('modelo3d', $('input[name=files]')[0].files[0]);

    formData.append('txtAntecedentes', txtAntecedentes);
    formData.append('txtAfectaciones', txtAfectaciones);
    formData.append('txtObservaciones', txtObservaciones);
    formData.append('txtCroquis', txtCroquis);
    formData.append('txtImportancia', txtImportancia);
    formData.append('txtValor', txtValor);
    formData.append('txtSignificado', txtSignificado);

    //Ubicacion
    formData.append('txtDepartamento', txtDepartamento);
    formData.append('txtProvincia', txtProvincia);
    formData.append('txtDistrito', txtDistrito);
    formData.append('txtUbigeo', txtUbigeo);



    $.ajax({
        url: 'C_ficha_tecnica/insertarPatrimonio',
        data: formData,
        type: 'POST',
        contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
        processData: false, // NEEDED, DON'T OMIT THIS
    }).done(function (response) {
        let data = JSON.parse(response);
        if (data.error == 0) {
            alert('Se registró patrimonio correctamente');
            location.reload();
        } else {
            alert(data.msj);
        }
    }).fail(function () {
        alert("error");
    });

    

}

function getUbigeo() {
    var api_url = 'https://pahis-desafio-uno.herokuapp.com/api/departamentos';
    

    $.ajax({
        url: api_url,
        contentType: "application/json",
        dataType: 'json',
        success: function(result){
            var html = "";

            for (var i = 0; i < result.length; i++)
            {
                html += `
                <option value="`+result[i].cod_ubigeo+`">`+result[i].nombre+`</option>`;
            }

            $("#selectDepartamento").append(html);

            console.log(html);
        }
    })

    /*$.ajax({
        url: 'https://pahis-desafio-uno.herokuapp.com/api/departamentos',
        type: 'POST',
        contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
        processData: false, // NEEDED, DON'T OMIT THIS
    }).done(function (response) {
        let data = JSON.parse(response);
        console.dir(data);
    }).fail(function () {
        alert("error");
    });*/
}

function getProvincia() {
    var input = $("#selectDepartamento").val();
    var departamento = input.substr(0, 2);

    var api_url = 'https://pahis-desafio-uno.herokuapp.com/api/provincias/'+departamento;
    

    $.ajax({
        url: api_url,
        contentType: "application/json",
        dataType: 'json',
        success: function(result){
            var html = "<option value='-1'>Seleccione una provincia</option>";

            for (var i = 0; i < result.length; i++)
            {
                html += `
                <option value="`+result[i].cod_ubigeo+`">`+result[i].nombre+`</option>`;
            }

            $("#selectProvincia").html(html);
        }
    })
}

function getDistrito() {

    var input = $("#selectProvincia").val();
    var provincia = input.substr(0, 4);

    var api_url = 'https://pahis-desafio-uno.herokuapp.com/api/distritos/'+provincia;
    

    $.ajax({
        url: api_url,
        contentType: "application/json",
        dataType: 'json',
        success: function(result){
            var html = "<option value='-1'>Seleccione un distrito</option>";

            for (var i = 0; i < result.length; i++)
            {
                html += `
                <option value="`+result[i].cod_ubigeo+`">`+result[i].nombre+`</option>`;
            }

            $("#selectDistrito").html(html);
        }
    })
}






function xd() {
    
    var input = $('input[name=fileImagen]')[0].files[0];
    console.log(input);
}

/*    
    var input = $('#files').val();
    console.log(input);
madeleine.adaptViewerTheme('soft');
//https://stackoverflow.com/questions/5802580/html-input-type-file-get-the-image
    //-before-submitting-the-form
function previewFile() {
    var preview = document.querySelector('img');
    var file = document
        .querySelector('input[name=fileImagen]')
        .files[0];
    var reader = new FileReader();

    reader.onloadend = function () {
        preview.src = reader.result;
    }

    if (file) {
        reader.readAsDataURL(file);
    } else {
        preview.src = "";
    }
}*/