
<form id="alquilarpropiedad" class="form-horizontal" role="form">
    <div class="form-group">
        <div class="col-md-12">
            <input type="text" class=" form-control " required="" id="search-box"  placeholder="Apellido" />
            <div id="suggesstion-box" ></div>
            <input type="hidden" id="idpersonas"  />
             <input type="hidden" id="idpropiedad"  />
        </div>
    </div>
    <div class="form-group ">
        <div class="col-md-5">
            <input type="number" class=" form-control " required=""   id="precio" placeholder="Precio de alquiler por mes" />
        </div>
    </div>
    <div class="form-group ">
        <div class="col-md-6">
            <input type="date" class=" form-control " required="" name="fecha"  id="fecha" placeholder="Fecha de inicio Contrato" />
        </div>
    </div>
    <button class="btn btn-success" id="alqui">Enviar</button>
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
</form>
 
