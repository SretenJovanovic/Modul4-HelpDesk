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
            <th>Fixed Date</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($allReportsFixed == []) { ?>
            <td colspan='11' class="bg-light text-muted">There are no reports.</td>
            <?php
        } else {

            foreach ($allReportsFixed as $index => $failureReport) :

            ?>
                <tr class="table-secondary">
                    <td class="bg-dark text-white"><?php echo $index += ($currentPageFixed * 8) - 7; ?></td>
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
                    <td><?php echo $failureReport->getFixedDate(); ?></td>
                </tr>
        <?php

            endforeach;
        } ?>

    </tbody>
</table>


<!--  PAGINATION -->
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <?php
        if ($currentPageFixed && $currentPageFixed == 1) {
        ?>
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Previous</a>
            </li>
        <?php
        } else {
        ?>
            <li class="page-item">
                <a class="page-link" href="home.php?type=technician&status=fixed&pageFixed=<?php echo $currentPageFixed - 1 ?>">Previous</a>
            </li>
        <?php
        }
        ?>

        <?php
        for ($i = 1; $i <= $numberOfPagesFixed; $i++) {
        ?>
            <li class="page-item <?php echo (isset($_GET['pageFixed']) && $_GET['pageFixed'] == $i) ?  'active' : ''; ?>"><a class="page-link" href="home.php?type=technician&status=fixed&pageFixed=<?php echo $i; ?>"><?php echo $i; ?></a></li>
        <?php
        }
        ?>
        <?php
        if ($currentPageFixed && ($currentPageFixed >= $numberOfPagesFixed)) {
        ?>
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Next</a>
            </li>
        <?php
        } else {
        ?>
            <li class="page-item">
                <a class="page-link" href="home.php?type=technician&status=fixed&pageFixed=<?php echo $currentPageFixed + 1 ?>">Next</a>
            </li>
        <?php
        }
        ?>
    </ul>
</nav>