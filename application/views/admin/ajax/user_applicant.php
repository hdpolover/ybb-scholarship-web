<div class="row">
    <div class="col-12">
        <!-- List Striped -->
        <ul class="list-group list-group-lg">
            <li class="list-group-item p-2 active">
                <i class="bi bi-person-circle list-group-icon"></i> <span style="margin-top: -20px">Personal
                    Information</span>
            </li>
            <li class="list-group-item p-3">
                <div class="row">
                    <div class="col-sm-4 mb-2 mb-sm-0">
                        <span class="h6">Full Name</span>
                    </div>
                    <!-- End Col -->

                    <div class="col-sm-8 mb-2 mb-sm-0">
                        <span><?= $scholar->full_name;?></span>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </li>
            <li class="list-group-item p-3">
                <div class="row">
                    <div class="col-sm-4 mb-2 mb-sm-0">
                        <span class="h6">date of birth</span>
                    </div>
                    <!-- End Col -->

                    <div class="col-sm-8 mb-2 mb-sm-0">
                        <span><?= date("d F Y", strtotime($scholar->date_birth));?></span>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </li>
            <li class="list-group-item p-3">
                <div class="row">
                    <div class="col-sm-4 mb-2 mb-sm-0">
                        <span class="h6">Whatssapp Number <small class="text-success">(active)</small></span>
                    </div>
                    <!-- End Col -->

                    <div class="col-sm-8 mb-2 mb-sm-0">
                        <span>62<?= $scholar->whatsapp_number;?></span>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </li>
            <li class="list-group-item p-3">
                <div class="row">
                    <div class="col-sm-4 mb-2 mb-sm-0">
                        <span class="h6">Current Address</span>
                    </div>
                    <!-- End Col -->

                    <div class="col-sm-8 mb-2 mb-sm-0">
                        <span><?= $scholar->current_address;?></span>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </li>
            <li class="list-group-item p-3">
                <div class="row">
                    <div class="col-sm-4 mb-2 mb-sm-0">
                        <span class="h6">Field of Study</span>
                    </div>
                    <!-- End Col -->

                    <div class="col-sm-8 mb-2 mb-sm-0">
                        <span><?= $scholar->field_study;?></span>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </li>
            <li class="list-group-item p-3">
                <div class="row">
                    <div class="col-sm-4 mb-2 mb-sm-0">
                        <span class="h6">School or University</span>
                    </div>
                    <!-- End Col -->

                    <div class="col-sm-8 mb-2 mb-sm-0">
                        <span><?= $scholar->school;?></span>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </li>
            <li class="list-group-item p-3">
                <div class="row">
                    <div class="col-sm-4 mb-2 mb-sm-0">
                        <span class="h6">Current GPA</span>
                    </div>
                    <!-- End Col -->

                    <div class="col-sm-8 mb-2 mb-sm-0">
                        <span><?= $scholar->current_gpa;?></span>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </li>
            <li class="list-group-item p-3">
                <div class="row">
                    <div class="col-sm-4 mb-2 mb-sm-0">
                        <span class="h6">Semester</span>
                    </div>
                    <!-- End Col -->

                    <div class="col-sm-8 mb-2 mb-sm-0">
                        <span><?= $scholar->semester;?></span>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </li>
            <li class="list-group-item p-3">
                <div class="row">
                    <div class="col-sm-4 mb-2 mb-sm-0">
                        <span class="h6">About your self</span>
                    </div>
                    <!-- End Col -->

                    <div class="col-sm-8 mb-2 mb-sm-0">
                        <span><?= $scholar->about;?></span>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </li>
            <li class="list-group-item p-3">
                <div class="row">
                    <div class="col-sm-4 mb-2 mb-sm-0">
                        <span class="h6">biggest dream and how will to make it come true</span>
                    </div>
                    <!-- End Col -->

                    <div class="col-sm-8 mb-2 mb-sm-0">
                        <span><?= $scholar->dream_come;?></span>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </li>
            <li class="list-group-item p-3">
                <div class="row">
                    <div class="col-sm-4 mb-2 mb-sm-0">
                        <span class="h6">volunteering or organizational experiences</span>
                    </div>
                    <!-- End Col -->

                    <div class="col-sm-8 mb-2 mb-sm-0">
                        <span><?= $scholar->volunteer;?></span>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </li>
        </ul>
        <!-- End List Striped -->
    </div>
</div>
<hr>
<div class="row">
    <div class="col-12">
        <!-- List Striped -->
        <ul class="list-group list-group-lg">
            <li class="list-group-item p-2 active">
                <i class="bi bi-file-earmark-image-fill list-group-icon"></i> <span
                    style="margin-top: -20px">Files</span>
            </li>
            <li class="list-group-item p-3">
                <div class="row">
                    <div class="col-sm-9 mb-2 mb-sm-0">
                        <span class="h6">Proof that already followed our social media</span>
                    </div>
                    <!-- End Col -->

                    <div class="col-sm-3 mb-2 mb-sm-0">
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#uploadFollow"><i class="bi bi-file-earmark-image-fill"></i>
                            check file</button>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </li>
            <li class="list-group-item p-3">
                <div class="row">
                    <div class="col-sm-9 mb-2 mb-sm-0">
                        <span class="h6">Proof that already have an account on YBB Apps</span>
                    </div>
                    <!-- End Col -->

                    <div class="col-sm-3 mb-2 mb-sm-0">
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#uploadApps"><i class="bi bi-file-earmark-image-fill"></i> check
                            file</button>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </li>
            <li class="list-group-item p-3">
                <div class="row">
                    <div class="col-sm-9 mb-2 mb-sm-0">
                        <span class="h6">Proof that have subscribed YBB Youtube official account</span>
                    </div>
                    <!-- End Col -->

                    <div class="col-sm-3 mb-2 mb-sm-0">
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#uploadYoutube"><i class="bi bi-file-earmark-image-fill"></i>
                            check file</button>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </li>
            <li class="list-group-item p-3">
                <div class="row">
                    <div class="col-sm-9 mb-2 mb-sm-0">
                        <span class="h6">Proof that have joined YBB telegram official account</span>
                    </div>
                    <!-- End Col -->

                    <div class="col-sm-3 mb-2 mb-sm-0">
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#uploadTelegram"><i class="bi bi-file-earmark-image-fill"></i>
                            check file</button>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </li>
            <li class="list-group-item p-3">
                <div class="row">
                    <div class="col-sm-9 mb-2 mb-sm-0">
                        <span class="h6">Proof that have shared this information on your instagram story or
                            instagram post</span>
                    </div>
                    <!-- End Col -->

                    <div class="col-sm-3 mb-2 mb-sm-0">
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#uploadStory"><i class="bi bi-file-earmark-image-fill"></i>
                            check file</button>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </li>
            <li class="list-group-item p-3">
                <div class="row">
                    <div class="col-sm-9 mb-2 mb-sm-0">
                        <span class="h6">Proof that have tagged 5 of your friends on the post</span>
                    </div>
                    <!-- End Col -->

                    <div class="col-sm-3 mb-2 mb-sm-0">
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#uploadTags"><i class="bi bi-file-earmark-image-fill"></i> check
                            file</button>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </li>
        </ul>
        <!-- End List Striped -->
    </div>
</div>
