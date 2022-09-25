<?php $__env->startSection('title', __('Dashboard')); ?>

<?php $__env->startSection('content'); ?>
    <!-- main Section -->
    <div class="main-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="dash-heading mb-10">
                        <div class="row">
                            <div class="col-md-12">
                                <h2><?php echo e(__('Dashboard')); ?></h2>
                            </div>
                        </div>
                    </div>
                    <div id="tw-loader" class="tw-loader">
                        <div class="tw-ellipsis">
                            <div></div><div></div><div></div><div></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-10">
                <div class="col-md-6">
                    <div class="form-group">
                        <?php
                            $contractors = \App\Models\Company::all();
                        ?>
                        <select name="" id="contractor" class="form-control">
                            <option value="all">All</option>
                            <?php $__currentLoopData = $contractors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contractor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($contractor->id); ?>"><?php echo e($contractor->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6"></div>
                <div class="col-lg-3 mb-30">
                    <div class="tw-card">
                        <div class="tw-icon">
                            <i class="fa fa-file"></i>
                        </div>
                        <div class="tw-content">
                            <h3 id="TotalProjects"></h3>
                            <p><?php echo e(__('Total')); ?></p>
                            <p id="totalCount"></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-30">
                    <div class="tw-card">
                        <div class="tw-icon">
                            <i class="fa fa-file"></i>
                        </div>
                        <div class="tw-content">
                            <h3 id="InprogressProjects"></h3>
                            <p><?php echo e(__('Scheduled')); ?></p>
                            <p id="scheduledCount"></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-30">
                    <div class="tw-card">
                        <div class="tw-icon">
                            <i class="fa fa-file"></i>
                        </div>
                        <div class="tw-content">
                            <h3 id="TimeOut"></h3>
                            <p><?php echo e(__('Cancelled')); ?></p>
                            <p id="cancelledCount"></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-30">
                    <div class="tw-card">
                        <div class="tw-icon">
                            <i class="fa fa-file"></i>
                        </div>
                        <div class="tw-content">
                            <h3 id="CompletedProjects"></h3>
                            <p><?php echo e(__('Submitted')); ?></p>
                            <p id="submittedCount"></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 mb-30">
                    <div class="tw-card">
                        <div class="tw-icon">
                            <i class="fa fa-rocket"></i>
                        </div>
                        <div class="tw-content">
                            <h3 id="TotalTasks"></h3>
                            <p><?php echo e(__('Total Tasks')); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-30">
                    <div class="tw-card">
                        <div class="tw-icon">
                            <i class="fa fa-line-chart"></i>
                        </div>
                        <div class="tw-content">
                            <h3 id="DoingTasks"></h3>
                            <p><?php echo e(__('Doing Tasks')); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-30">
                    <div class="tw-card">
                        <div class="tw-icon">
                            <i class="fa fa-thumbs-o-down"></i>
                        </div>
                        <div class="tw-content">
                            <h3 id="TimeoutTasks"></h3>
                            <p><?php echo e(__('Timeout Tasks')); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-30">
                    <div class="tw-card">
                        <div class="tw-icon">
                            <i class="fa fa-thumbs-o-up"></i>
                        </div>
                        <div class="tw-content">
                            <h3 id="CompletedTasks"></h3>
                            <p><?php echo e(__('Completed Tasks')); ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 mb-30">
                    <div class="tw-card">
                        <div class="tw-card-header"><?php echo e(__('Projects Status')); ?></div>
                        <canvas id="pie_chart_projects"></canvas>
                    </div>
                </div>
                <div class="col-lg-6 mb-30">
                    <div class="tw-card">
                        <div class="tw-card-header"><?php echo e(__('Staffs Status')); ?></div>
                        <canvas id="pie_chart_staffs"></canvas>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 mb-30">
                    <div class="tw-card">
                        <div class="tw-card-header mb-10"><?php echo e(__('Projects List')); ?></div>
                        <div class="tw-card-body">
                            <div class="table-responsive">
                                <table id="DataTableIdProject" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th width="25%"><?php echo e(__('Project Name')); ?></th>
                                        <th width="12%"><?php echo e(__('Created By')); ?></th>
                                        <th width="18%"><?php echo e(__('Staff')); ?></th>
                                        <th width="5%"><?php echo e(__('Client')); ?></th>
                                        <th width="10%"><?php echo e(__('Start Date')); ?></th>
                                        <th width="10%"><?php echo e(__('End Date')); ?></th>
                                        <th width="10%"><?php echo e(__('Status')); ?></th>
                                        <th width="10%"><?php echo e(__('Milestones')); ?></th>
                                    </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row dnone" id="ClientGridHideShow">
                <div class="col-lg-12">
                    <div class="tw-card">
                        <div class="tw-card-header mb-10"><?php echo e(__('Client List')); ?></div>
                        <div class="tw-card-body">
                            <div class="table-responsive">
                                <table id="DataTableIdClient" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th width="31%"><?php echo e(__('Client/Country')); ?></th>
                                        <th width="31%"><?php echo e(__('E-mail/Phone')); ?></th>
                                        <th width="31%"><?php echo e(__('Social Media')); ?></th>
                                        <th width="7%"><?php echo e(__('Photos')); ?></th>
                                    </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /main Section -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <!-- Chart js -->
    <script src="<?php echo e(asset('public/assets/js/Chart.min.js')); ?>"></script>
    <!-- datatables css/js -->
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/datatables/dataTables.bootstrap4.min.css')); ?>">
    <script src="<?php echo e(asset('public/assets/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/datatables/dataTables.bootstrap4.min.js')); ?>"></script>
    <script type="text/javascript">
        var base_url = "<?php echo e(url('/')); ?>";
        var public_path = "<?php echo e(asset('public')); ?>";
        var userid = "<?php echo e(Auth::user()->id); ?>";
        var roleid = "<?php echo e(Auth::user()->role_id); ?>";
        var TEXT = [];
        TEXT['View'] = "<?php echo e(__('View')); ?>";
        TEXT['Milestones View'] = "<?php echo e(__('Milestones View')); ?>";
        $(document).ready(function() {
            let id = $('#contractor').val();
            axios.get('<?php echo e(url('contractorData')); ?>/'+id)
                .then(response => {
                    $('#totalCount').empty();
                    $('#submittedCount').empty();
                    $('#cancelledCount').empty();
                    $('#scheduledCount').empty();

                    $('#totalCount').append(response.data.total);
                    $('#submittedCount').append(response.data.submitted);
                    $('#cancelledCount').append(response.data.cancelled);
                    $('#scheduledCount').append(response.data.scheduled);
                })
        })
        $('#contractor').on("change", function() {
            let id = $('#contractor').val();
            axios.get('<?php echo e(url('contractorData')); ?>/'+id)
            .then(response => {
                $('#totalCount').empty();
                $('#submittedCount').empty();
                $('#cancelledCount').empty();
                $('#scheduledCount').empty();

                $('#totalCount').append(response.data.total);
                $('#submittedCount').append(response.data.submitted);
                $('#cancelledCount').append(response.data.cancelled);
                $('#scheduledCount').append(response.data.scheduled);
            })
        })
    </script>
    <script src="<?php echo e(asset('public/pages/dashboard.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fiverr\resources\views/home.blade.php ENDPATH**/ ?>