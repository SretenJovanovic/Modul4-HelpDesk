<h2>Equipement List</h2>
<table class="table table-sm">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Model</th>
            <th>Manufacture Date</th>
            <th>Serial Number</th>
            <th>Process</th>
            <th colspan=2 class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!$allEquipement || $allEquipement == null || $allEquipement[0] == 'There is no equipement') {
        ?>
            <tr class="table-secondary">
                <td colspan="7">There is no equipement in database.</td>
            </tr>
            <?php
        } else {
            foreach ($allEquipement as $eq) :
            ?>
                <tr class="table-secondary">
                    <td><?php echo $eq->getId(); ?></td>
                    <td id="name<?php echo $eq->getId(); ?>"><?php echo $eq->getName(); ?></td>
                    <td id="model<?php echo $eq->getId(); ?>"><?php echo $eq->getModel(); ?></td>
                    <td id="date<?php echo $eq->getId(); ?>"><?php echo $eq->getManufactureDate(); ?></td>
                    <td id="serial<?php echo $eq->getId(); ?>"><?php echo $eq->getSerialNumber(); ?></td>
                    <td id="process<?php echo $eq->getId(); ?>"><?php echo $eq->getProcess(); ?></td>
                    <td class="text-right">
                        <button type="button" class="btn btn-primary btn-block editEquipementModalBtn" data-toggle="modal" data-target="#editEquipementModal" value="<?php echo $eq->getId(); ?>">
                            Edit
                        </button>
                        <?php
                        include_once('equipement.edit.php');
                        ?>
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-danger deleteEquipementModalBtn" data-toggle="modal" data-target="#deleteEquipementModal" value="<?php echo $eq->getId(); ?>">
                            Delete
                        </button>
                        <?php
                         include_once('equipement.delete.php'); 
                        ?>
                    </td>
                </tr>
        <?php
            endforeach;
        } ?>

    </tbody>
</table>