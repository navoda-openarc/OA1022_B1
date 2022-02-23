<div id="layoutSidenav_content">
    <main>
        <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
            <div class="container-xl px-4">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title">
                                <div class="page-header-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                </div>
                                User Profile
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="container-x1 px-4 mt-4">
            <div class="row">
                <div class="col-xl-8">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header">Account Details</div>
                        <div class="card-body">
                            <form method="POST" action="<?= base_url();?>user/process/create">
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputUsername">Username</label>
                                    <input class="form-control" id="inputUsername" name="inputUsername" type="text" placeholder="Enter your username"/>
                                </div>
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputFirstname">First Name</label>
                                        <input class="form-control" id="inputFirstname" name="inputFirstname" type="text" placeholder="John"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastname">Last Name</label>
                                        <input class="form-control" id="inputLastname" name="inputLastname" type="text" placeholder="Doe"/>
                                    </div>
                                </div>
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputPassword">Password</label>
                                        <input class="form-control" id="inputPassword" name="inputPassword" type="password" placeholder="Password"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputRePassword">Re-enter Password</label>
                                        <input class="form-control" id="inputRePassword" name="inputRePassword" type="password" placeholder="Re-Password"/>
                                    </div>
                                </div>
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputAge">Age</label>
                                        <input class="form-control" id="inputAge" name="inputAge" type="text" placeholder="Age"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputUser">User Type</label>
                                        <select class="form-control" id=inputUser" name="inputUser">
                                            <option value="0" selected>Select</option>
                                            <?php
                                                foreach ($userTypes as $userType) {
                                                    if($this->session->userdata('permissions')['create_admin'] == 0 && $userType['role_name'] == 'Administrator'){
                                                        continue;
                                                    }
                                                    echo '<option value="'. $userType['role_id'] .'">' . $userType['role_name'] . '</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <input class="btn btn-primary" type="submit" name="formSubmit" value="Create"/>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

