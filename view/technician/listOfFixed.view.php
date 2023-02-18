<table  class="table table-sm">
  <thead class="thead-dark">
        <tr>
            <th>Report ID</th>
            <th>Operator ID</th>
            <th>Operator Name</th>
            <th>Equipement ID</th>
            <th>Equipement Name</th>
            <th>Equipement Model</th>
            <th>Process</th>
            <th>Failure Description</th>
            <th>Report Date</th>
            <th>Fixed Date</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($allReports as $failureReport) :
            if ($failureReport->getStatus()) {
        ?>
                <tr class="table-secondary">
                    <td><?php echo $failureReport->getId(); ?></td>
                    <td><?php echo $failureReport->getUser()->getId(); ?></td>
                    <td><?php echo $failureReport->getUser()->getFirstName() . " " . $failureReport->getUser()->getLastName(); ?></td>
                    <td><?php echo $failureReport->getEquipement()->getId(); ?></td>
                    <td><?php echo $failureReport->getEquipement()->getName(); ?></td>
                    <td><?php echo $failureReport->getEquipement()->getModel(); ?></td>
                    <td><?php echo $failureReport->getEquipement()->getProcess(); ?></td>
                    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal<?php echo $failureReport->getId();?>">
                            Description
                        </button>
                        <div class="modal fade" id="modal<?php echo $failureReport->getId();?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Description <?php echo $failureReport->getEquipement()->getName(); ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <p class="text-justify"><?php echo $failureReport->getDescription(); ?></p> 
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td><?php echo $failureReport->getReportDate(); ?></td>
                    <td><?php echo $failureReport->getFixedDate(); ?></td>
                </tr>
        <?php

            }
        endforeach; ?>

    </tbody>
</table>
