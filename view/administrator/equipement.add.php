<h3>Add Equipement</h3>
<form action="#" method="POST" id="registerEquipementForm">
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name">
        </div>
        <div class="form-group col-md-4">
            <label for="model">Model</label>
            <input type="text" id="model" class="form-control" name="model" placeholder="Model">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="manufactureDate">Manufacture Date</label>
            <input type="text" id="manufactureDate" class="form-control" name="manufactureDate" placeholder="Manufacture Date">
        </div>
        <div class="form-group col-md-2">
            <label for="serialNumber">Serial Number</label>
            <input type="text" class="form-control" name="serialNumber" id="serialNumber" placeholder="Serial Number">
        </div>
        <div class="form-group col-md-4">
            <label for="process">Choose position:</label>
            <select class="form-control" name="process" id="process">
                <option value="sirova" selected>Sirova kafa</option>
                <option value="przenje">Przenje</option>
                <option value="mlevenje">Mlevenje</option>
                <option value="pakovanje">Pakovanje</option>
                <option value="viljuskari">Viljuskari</option>
                <option value="klimatizacija">Klimatizacija</option>
            </select>
        </div>
    </div>

    <button type="submit" class="btn btn-primary col-md-8" name="addEquipement">Add Equipement</button>

</form>