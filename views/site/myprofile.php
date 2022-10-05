<section class="content p-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <?php

                            use app\modules\admin\models\UserDetail;

                            if (!empty($userDetail->profile_image)) { ?>
                                <img class="profile-user-img img-fluid rounded-circle img-circle" src="<?= $userDetail->profile_image ?>" alt="User profile picture">
                            <?php } else { ?>
                                <img class="profile-user-img img-fluid rounded-circle img-circle" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_640.png" alt="User profile picture">

                            <?php } ?>
                        </div>
                        <?php if (!empty($userDetail->name)) { ?>
                            <h3 class="profile-username text-center"><?= $userDetail->name ?></h3>
                        <?php } else { ?>
                            <h3 class="profile-username text-center"><?= $user->first_name ?><?= $user->last_name ?></h3>

                        <?php } ?>
                        <p class="text-muted text-center "> <?= $userDetail->occupication??'' ?></p>
                        <ul class="list-group list-group-unbordered mb-3 text-left">
                            <li class="list-group-item">
                                <b>Age</b> <a class="float-right badge badge-success"> <?php $age = UserDetail::getAge($userDetail->dob??'');
                                                                                        echo $age;
                                                                                        ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Cast</b> <a class="float-right"><?= $userDetail->getCastBadges() ?></a>
                            </li>
                            <li class="list-group-item ">
                                <b>House</b> <a class="float-right"><?= $userDetail->getHouseBadges() ?></a>
                            </li>
                        </ul>

                    </div>

                </div>



            </div>

            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-left bg-primary p-2 text-white rounded">Details:-</h5>
                        <ul class="list-unstyled text-left list-group">

                            <div class="row">
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                    <li class="list-group-item mb-2"><b>Registration Number:-</b> <?= $userDetail->register_number ?></li>
                                    <li class="list-group-item mb-2"><b>Gender:-</b> <?= $userDetail->getGenderBadges() ?></li>
                                    <li class="list-group-item mb-2"><b>Date Of Birth:-</b> <?= $userDetail->dob ?></li>
                                    <li class="list-group-item mb-2"><b>Height:-</b> <?= $userDetail->height ?></li>
                                    <li class="list-group-item mb-2"><b>Whats App Number:-</b> <?= $userDetail->whats_app_number ?></li>
                                    <li class="list-group-item mb-2"><b>Other Qualification:-</b> <?= $userDetail->other_qualification ?></li>
                                    <li class="list-group-item mb-2"><b>Monthly Income:-</b> <?= $userDetail->monthly_income ?></li>
                                    <li class="list-group-item mb-2"><b>Handicapped:-</b> <?= $userDetail->handicapped ?></li>

                                </div>

                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                    <li class="list-group-item mb-2"><b>Mrital Status:-</b> <?= $userDetail->getMatrialStatusBadges() ?></li>
                                    <li class="list-group-item mb-2"><b>Cast:-</b> <?= $userDetail->getCastBadges() ?></li>
                                    <li class="list-group-item mb-2"><b>Time Of Birth:-</b> <?= $userDetail->tob ?></li>
                                    <li class="list-group-item mb-2"><b>Complexion:-</b> <?= $userDetail->complexion ?></li>
                                    <li class="list-group-item mb-2"><b>Address:-</b> <?= $userDetail->address ?></li>
                                    <li class="list-group-item mb-2"><b>Physique:-</b> <?= $userDetail->physique ?></li>
                                    <li class="list-group-item mb-2"><b>Prefrence:-</b> <?= $userDetail->prefrence ?></li>
                                    <li class="list-group-item mb-2"><b>Disablity Discription:-</b> <?= $userDetail->disability_description ?></li>

                                </div>

                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                    <li class="list-group-item mb-2"><b>Category:-</b> <?= $userDetail->getCategoryBadges() ?></li>
                                    <li class="list-group-item mb-2"><b>Cast Gotra:-</b> <?= $userDetail->cast_gotra ?></li>
                                    <li class="list-group-item mb-2"><b>Place Of Birth:-</b> <?= $userDetail->place_of_birth ?></li>
                                    <li class="list-group-item mb-2"><b>Phone Number:-</b> <?= $userDetail->phone_number ?></li>
                                    <li class="list-group-item mb-2"><b>Qualification:-</b> <?= $userDetail->qualification ?></li>
                                    <li class="list-group-item mb-2"><b>Occupation:-</b> <?= $userDetail->occupication ?></li>
                                    <li class="list-group-item mb-2"><b>Number Of Children:-</b> <?= $userDetail->no_children ?? 'NA' ?></li>

                                </div>
                            </div>
                        </ul>

                        <h5 class="text-left bg-primary p-2 text-white rounded">Family Details:-</h5>
                        <ul class="list-unstyled text-left list-group">

                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <li class="list-group-item mb-2"><b>Father's Name:-</b> <?= $userDetail->fathers_name ?></li>
                                    <li class="list-group-item mb-2"><b>Father's Occupation:-</b> <?= $userDetail->fathers_occupation ?></li>
                                    <li class="list-group-item mb-2"><b>Father's Age</b> <?= $userDetail->fathers_age ?></li>
                                    <li class="list-group-item mb-2"><b>Father's Monthly Income:-</b> <?= $userDetail->fathers_monthly_income ?></li>


                                </div>

                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <li class="list-group-item mb-2"><b>Mother's Name:-</b> <?= $userDetail->mothers_name ?></li>
                                    <li class="list-group-item mb-2"><b>Mother's Occupation:-</b> <?= $userDetail->mothers_occupation ?></li>
                                    <li class="list-group-item mb-2"><b>Mother's Age</b> <?= $userDetail->mothers_age ?></li>
                                    <li class="list-group-item mb-2"><b>Mother's Monthly Income:-</b> <?= $userDetail->mothers_monthly_income ?></li>

                                </div>


                            </div>
                        </ul>


                        <table class="table  table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Relation:</th>
                                    <th>Name:</th>
                                    <th>Age:</th>
                                    <th>Education Qualification:</th>
                                    <th>Married:</th>
                                    <th>Occupation:</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($user->sibling)){ foreach ($user->sibling as $sib) {
                                ?>

                                    <tr>

                                        <td><?= $sib->siblingType->title ?> </td>
                                        <td><?= $sib->name ?> </td>
                                        <td><?= $sib->age ?> </td>
                                        <td><?= $sib->education_qulification ?> </td>
                                        <td><?= $sib->married ?> </td>
                                        <td><?= $sib->occupation??'' ?> </td>
                                    </tr>
                                <?php }} ?>

                            </tbody>
                        </table>



                    </div>
                </div>
            </div>

        </div>

    </div>
</section>