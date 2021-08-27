<div class="container-fluid bg-primary p-5">
    <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0 ml-5">Hello, <?php echo $model->first_name; ?></h6>
        </div>
    </div>
    <div class="header-body">
        <!-- Card stats -->
        <div class="row">
            <div class="col-xl-3 col-md-6 p-2">
                <div class="card card-stats">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Courses</h5>
                                <span class="h2 font-weight-bold mb-0"><?php echo $model->courses ? count($model->courses) : 0; ?></span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                    <i class="ni ni-books"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 p-2">
                <div class="card card-stats">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Followers</h5>
                                <span class="h2 font-weight-bold mb-0"><?php echo $model->followers ? count($model->followers) : 0; ?></span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                    <i class="ni ni-single-02"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 p-2">
                <div class="card card-stats">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Schools</h5>
                                <span class="h2 font-weight-bold mb-0"><?php echo $model->schools ? count($model->schools) : 0; ?></span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                    <i class="ni ni-box-2"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 p-2">
                <div class="card card-stats">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Requests</h5>
                                <span class="h2 font-weight-bold mb-0"><?php echo $model->join_requests ? count($model->join_requests) : 0; ?></span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                    <i class="ni ni-box-2"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-1">
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Your join request </h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="/addrequest" class="btn btn-sm btn-success">Request join</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" class="sort" data-sort="name">No</th>
                            <th scope="col" class="sort" data-sort="name">School</th>
                            <th scope="col" class="sort" data-sort="budget">Status</th>
                            <th scope="col" class="sort" data-sort="status">Data requested</th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        <?php $i = 1; foreach ($model->join_requests as $join_request) : ?>
                            <tr>
                                <td>
                                    <?php echo $i++; ?>
                                </td>
                                <td>
                                    <?php echo $join_request['name'] ?>
                                </td>
                                <td>
                                    <?php if ($join_request['status'] == 0) : ?>
                                        PENDING
                                    <?php elseif ($join_request['status'] == 1) : ?>
                                        ACCEPTED
                                    <?php else : ?>
                                        DENIED
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php echo $join_request['date_requests']; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>