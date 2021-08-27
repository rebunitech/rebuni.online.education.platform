<?php use app\core\form\Form; use app\core\form\Field; ?>
<div class="header pb-4 d-flex align-items-center bg-dark" style="min-height: 100px; background-size: cover; background-position: center top;">
    <!-- Mask -->
    <span class="mask bg-gradient-default opacity-8"></span>
    <!-- Header container -->
    <div class="container-fluid d-flex align-items-center">
        <div class="row">
        </div>
    </div>
</div>

<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-7 order-xl-1 mx-auto">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Add Course </h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?php $form = Form::begin("", "post"); ?>
                    <h6 class="heading-small text-muted mb-4">User information</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-md-12">
                                <?php echo $form->field($model, 'title'); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="is_paid" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Is paid</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <?php echo $form->field($model, 'price', Field::TYPE_DECIMAL); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <?php echo $form->field($model, 'description', Field::TYPE_TEXTAREA); ?>
                            </div>
                        </div>
                        <div class="row"><button class="btn btn-primary m-4 mx-auto" type="submit">Add Course</button></div>
                    </div>
                    <?php $form = Form::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>