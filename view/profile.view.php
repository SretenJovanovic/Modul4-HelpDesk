<form action="#" method="post" id="editProfileForm">
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                    <span class="font-weight-bold">
                        <?php
                        echo $_SESSION['loggedUser']->getUsername();
                        ?>
                    </span>
                    <span class="text-black-50">
                        <?php
                        echo $_SESSION['loggedUser']->getEmail();
                        ?>
                    </span>
                </div>
            </div>
            <div class="col-md-8 bg-dark text-white border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">My Profile</h4>
                    </div>
                    <div class="row mt-2">
                        <input type="hidden" name="userId" id="profileId" value="<?php
                                                                                    echo $_SESSION['loggedUser']->getId();
                                                                                    ?>">
                        <input type="hidden" name="type" value="<?php
                                                                echo $_SESSION['loggedUser']->getType();
                                                                ?>">
                        <div class="col-md-12"><label class="labels">Username</label><input type="text" name="username" class="form-control" value="<?php echo $_SESSION['loggedUser']->getUsername(); ?>"></div>

                        <div class="col-md-6"><label class="labels">First Name</label><input type="text" name="firstName" class="form-control" value="<?php echo $_SESSION['loggedUser']->getFirstName(); ?>">
                        </div>
                        <div class="col-md-6"><label class="labels">Last Name</label><input type="text" name="lastName" class="form-control" value="<?php echo $_SESSION['loggedUser']->getLastName(); ?>"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Email ID</label><input type="email" name="email" class="form-control" value="<?php echo $_SESSION['loggedUser']->getEmail(); ?>"></div>
                        <div class="col-md-8"><label class="labels">Phone Number</label><input type="text" name="phone" class="form-control" value="0<?php echo $_SESSION['loggedUser']->getPhoneNumber(); ?>"></div>
                        <div class="col-md-4"><label class="labels">Age</label><input type="text" name="age" class="form-control" value="<?php echo $_SESSION['loggedUser']->getAge(); ?>"></div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6"><label class="labels">Password</label><input name="password" type="password" class="form-control"></div>
                        <div class="col-md-6"><label class="labels">Password Repeat</label><input name="passwordRepeat" type="password" class="form-control"></div>
                    </div>
                    <div class="mt-5 text-center">
                        <button class="btn btn-primary profile-button" type="submit">Save Profile</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>