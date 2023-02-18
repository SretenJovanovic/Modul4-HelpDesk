<div class="modal fade" id="editEquipementModal" tabindex="-1" role="dialog" aria-labelledby="editEquipementModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit equipement : <span id="editID"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <form action="" method="POST" id="editEquipementForm">
                <input type="hidden" name="equipementId" id="eequipementId">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="ename">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="model">Model</label>
                            <input type="text" id="emodel" class="form-control" name="model">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="manufactureDate">Manufacture Date</label>
                            <input type="text" id="emanufactureDate" class="form-control" name="manufactureDate">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="serialNumber">Serial Number</label>
                            <input type="text" class="form-control" name="serialNumber" id="eserialNumber">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="process">Change position:</label>
                            <select class="form-control" name="process" id="eprocess">
                                <option value="sirova">Sirova kafa</option>
                                <option value="przenje">Przenje</option>
                                <option value="mlevenje">Mlevenje</option>
                                <option value="pakovanje">Pakovanje</option>
                                <option value="viljuskari">Viljuskari</option>
                                <option value="klimatizacija">Klimatizacija</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" name="submitEdit">Edit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>