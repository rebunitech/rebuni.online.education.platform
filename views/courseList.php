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
                            <a href="/addcourse" class="btn btn-sm btn-success">Add Course</a>
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
                            <th scope="col" class="sort" data-sort="name">Title</th>
                            <th scope="col" class="sort" data-sort="budget">Description</th>
                            <th scope="col" class="sort" data-sort="budget">Price</th>
                            <th scope="col" class="sort" data-sort="status">Date create</th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        <?php $i = 1;
                        foreach ($model->loadCourses() as $course) : ?>
                            <tr>
                                <td>
                                    <?php echo $i++; ?>
                                </td>
                                <td>
                                    <?php echo $course['title']; ?>
                                </td>
                                <td>
                                    <?php echo $course['description']; ?>
                                </td>
                                <td>
                                    <?php echo $course['price']; ?>
                                </td>
                                <td>
                                    <?php echo $course['date_create']; ?>
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