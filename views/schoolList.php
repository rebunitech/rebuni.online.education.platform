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
                        
                    </div>
                </div>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" class="sort" data-sort="name">No</th>
                            <th scope="col" class="sort" data-sort="name">Name</th>
                            <th scope="col" class="sort" data-sort="budget">Email</th>
                            <th scope="col" class="sort" data-sort="status">Phone number</th>
                            <th scope="col" class="sort" data-sort="status">Action</th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        <?php $i = 1; foreach ($model->openSchoolList() as $school) : ?>
                            <tr>
                                <td>
                                    <?php echo $i++; ?>
                                </td>
                                <td>
                                    <?php echo $school['name']; ?>
                                </td>
                                <td>
                                    <?php echo $school['email']; ?>
                                </td>
                                <td>
                                    <?php echo $school['phone_number']; ?>
                                </td>
                                <td>
                                    <a href="/addrequest?schoolID=<?php echo $school['user_fk']; ?>" class="btn btn-sm btn-success">Send request</a>
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