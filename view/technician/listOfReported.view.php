<table class="table table-sm">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Report ID</th>
            <th>Operator ID</th>
            <th>Operator Name</th>
            <th>Equipement ID</th>
            <th>Equipement Name</th>
            <th>Equipement Model</th>
            <th>Process</th>
            <th>Failure Description</th>
            <th>Report Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($allReportsProgress == []) { ?>
            <td colspan='11' class="bg-light text-muted">There are no reported defects.</td>
            <?php
        } else {

            foreach ($allReportsProgress as $index => $failureReport) :

            ?>
                <tr class="table-secondary">

                    <td class="bg-dark text-white"><?php echo $index += ($currentPageProgress * 8) - 7; ?></td>
                    <td><?php echo $failureReport->getId(); ?></td>
                    <td><?php echo $failureReport->getUser()->getId(); ?></td>
                    <td><?php echo $failureReport->getUser()->getFirstName() . " " . $failureReport->getUser()->getLastName(); ?></td>
                    <td><?php echo $failureReport->getEquipement()->getId(); ?></td>
                    <td><?php echo $failureReport->getEquipement()->getName(); ?></td>
                    <td><?php echo $failureReport->getEquipement()->getModel(); ?></td>
                    <td><?php echo $failureReport->getEquipement()->getProcess(); ?></td>
                    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal<?php echo $failureReport->getId(); ?>">
                            Description
                        </button>
                        <div class="modal fade" id="modal<?php echo $failureReport->getId(); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <td>
                        <form method="POST" class="changeReportStatusForm">
                            <div class="form-check">
                                <input type="hidden" name="failureId" value="<?php echo $failureReport->getId(); ?>">
                                <button type="submit" class="btn btn-success pl-5 pr-5" name="submitFix">Fix</button>
                            </div>
                        </form>
                    </td>
                </tr>
        <?php


            endforeach;
        }; ?>

    </tbody>
</table>


<!--  PAGINATION -->
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <?php
        if ($currentPageProgress && $currentPageProgress == 1) {
        ?>
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Previous</a>
            </li>
        <?php
        } else {
        ?>
            <li class="page-item">
                <a class="page-link" href="home.php?type=technician&status=reported&pageProgress=<?php echo $currentPageProgress - 1 ?>">Previous</a>
            </li>
        <?php
        }
        ?>

        <?php
        for ($i = 1; $i <= $numberOfPagesProgress; $i++) {
        ?>
            <li class="page-item <?php echo (isset($_GET['pageProgress']) && $_GET['pageProgress'] == $i) ?  'active' : ''; ?>"><a class="page-link" href="home.php?type=technician&status=reported&pageProgress=<?php echo $i; ?>"><?php echo $i; ?></a></li>
        <?php
        }
        ?>
        <?php
        if ($currentPageProgress && ($currentPageProgress >= $numberOfPagesProgress)) {
        ?>
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Next</a>
            </li>
        <?php
        } else {
        ?>
            <li class="page-item">
                <a class="page-link" href="home.php?type=technician&status=reported&pageProgress=<?php echo $currentPageProgress + 1 ?>">Next</a>
            </li>
        <?php
        }
        ?>
    </ul>
</nav>