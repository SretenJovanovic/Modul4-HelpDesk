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
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        
        if (!$allReports || $allReports == null || $allReports[0] == 'There are no reports') { ?>
            <tr class="table-secondary">
                <td colspan="10">There are no reports in database.</td>
            </tr>
            <?php
        } else {
            foreach ($allReports as $index => $failureReport) :
            ?>
                <tr class="table-secondary">
                    <td class="bg-dark text-white"><?php echo $index += ($current_page * 8) - 7; ?></td>
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
                    <td><?php echo $failureReport->getReportDate();
                        ?></td>
                    <td><?php echo ($failureReport->getStatus()) ?  "<span class='text-success'>Fixed</span>" : "<span class='text-danger'>In progress</span>"; ?></td>
                </tr>

        <?php
            endforeach;
        }


        ?>

    </tbody>
</table>

<!--  PAGINATION -->
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <?php
        if ($current_page && $current_page == 1) {
        ?>
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Previous</a>
            </li>
        <?php
        } else {
        ?>
            <li class="page-item">
                <a class="page-link" href="home.php?type=operator&page=<?php echo $current_page - 1 ?>">Previous</a>
            </li>
        <?php
        }
        ?>

        <?php
        for ($i = 1; $i <= $number_of_pages; $i++) {
        ?>
            <li class="page-item <?php echo (isset($_GET['page']) && $_GET['page'] == $i) ?  'active' : ''; ?>"><a class="page-link" href="home.php?type=operator&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
        <?php
        }
        ?>
        <?php
        if ($current_page && ($current_page >= $number_of_pages)) {
        ?>
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Next</a>
            </li>
        <?php
        } else {
        ?>
            <li class="page-item">
                <a class="page-link" href="home.php?type=operator&page=<?php echo $current_page + 1 ?>">Next</a>
            </li>
        <?php
        }
        ?>
    </ul>
</nav>