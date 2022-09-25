<?php $__env->startSection('title', __('Application')); ?>

<?php $__env->startSection('content'); ?>
    <!-- main Section -->
    <div class="main-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="dash-heading mb-10">
                        <div class="row">
                            <div class="col-md-12">
                                <h2><?php echo e(__('Application')); ?></h2>
                            </div>
                        </div>
                    </div>
                    <div id="tw-loader" class="tw-loader">
                        <div class="tw-ellipsis">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-10">
                <div class="col-lg-12 mb-30">
                    <div class="tw-card">
                        <div class="tw-card-header mb-10 d-flex justify-content-between">
                            All Applications
                            <div>
                                <?php if(\Illuminate\Support\Facades\Auth::user()->role_id == 1): ?>
                                    <a class="btn btn-primary" href="<?php echo e(url('contractor/add-application')); ?>"><i
                                            class="fas fa-plus"></i> Add Application</a>
                                <?php elseif(\Illuminate\Support\Facades\Auth::user()->role_id == 2): ?>
                                    <a class="btn btn-primary" href="<?php echo e(url('admin/add-application')); ?>"><i
                                            class="fas fa-plus"></i> Add Application</a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <style>
                            table tbody td {
                                min-width: 100px;
                            }

                        </style>
                        <div class="tw-card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Construction Type</label>
                                        <select name="" id="construction_type" class="form-control">
                                            <option value="">Select...</option>
                                            <option value="Recon">Recon</option>
                                            <option value="Repair">Repair</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Inspection Type</label>
                                        <select name="" id="inspection_type" class="form-control">
                                            <option value="">Select...</option>
                                            <option value="50">50%</option>
                                            <option value="100">100%</option>
                                            <option value="REHAB">REHAB</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Inspection Type</label>
                                        <select name="" id="inspection_status" class="form-control">
                                            <option value="">Select...</option>
                                            <option value="Scheduled">Scheduled</option>
                                            <option value="Submitted">Submitted</option>
                                            <option value="Canceled">Canceled</option>
                                        </select>
                                    </div>
                                </div>
                                <?php if(\Illuminate\Support\Facades\Auth::user()->role_id == 2 || \Illuminate\Support\Facades\Auth::user()->role_id == 1): ?>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Inspector</label>
                                            <select name="" id="inspector" class="form-control">
                                                <option value="">Select...</option>
                                                <?php $__currentLoopData = $inspectors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inspector): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($inspector->id); ?>"><?php echo e($inspector->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if(\Illuminate\Support\Facades\Auth::user()->role_id == 2 || \Illuminate\Support\Facades\Auth::user()->role_id == 3): ?>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Contractor</label>
                                            <select name="" id="contructor" class="form-control">
                                                <option value="">Select...</option>
                                                <?php $__currentLoopData = $contructors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contructor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($contructor->id); ?>"><?php echo e($contructor->name); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="application-table">
                                    <thead>
                                        <th>HRIQ ID</th>
                                        <th>Applicant Name</th>
                                        <th>Applicant Address</th>
                                        <th>Applicant City</th>
                                        <th>Applicant Country</th>
                                        <th>Requested Date</th>
                                        <th>Requester Name</th>
                                        <th>Requester Email</th>
                                        <th>Requester Phone</th>
                                        <th>Construction Type</th>
                                        <th>Floor Plan</th>
                                        <th>Region</th>
                                        <th>Options</th>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if(session()->has('message')): ?>
        <input type="hidden" id="message" value="<?php echo session('message'); ?>">
    <?php endif; ?>
    <!-- /main Section -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            let message = $('#message').val();
            if (message === 'application_created') {
                Toast.fire({
                    icon: 'success',
                    title: 'Applicated Created successfully'
                })
            } else if (message === 'updated') {
                Toast.fire({
                    icon: 'success',
                    title: 'Updated successfully'
                })
            } else if (message == 'failed') {
                Toast.fire({
                    icon: 'error',
                    title: 'Failed. Try again'
                })
            }

            $('#application-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: false,
                scrollX: true,
                ajax: '<?php echo route('getApplications'); ?>?construction_type=' + $('#construction_type').val() +
                    '&inspection_type=' + $('#inspection_type').val() + '&inspection_status=' + $(
                        '#inspection_status').val() + '&inspector=' + $('#inspector').val() +
                    '&contractor=' + $('#contructor').val(),
                dom: '<"row mt-4 top"<"col-md-3"l><"col-md-6 text-center"B><"col-md-3"f>>rtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ],
                columns: [{
                        data: 'hriq_id',
                        name: 'hriq_id'
                    },
                    {
                        data: 'applicant_name',
                        name: 'application_name'
                    },
                    {
                        data: 'applicant_address',
                        name: 'applicant_address'
                    },
                    {
                        data: 'applicant_city',
                        name: 'applicant_city'
                    },
                    {
                        data: 'applicant_county',
                        name: 'applicant_county'
                    },
                    {
                        data: 'requested_date',
                        name: 'requested_date'
                    },
                    {
                        data: 'requester_name',
                        name: 'requester_name'
                    },
                    {
                        data: 'requester_email',
                        name: 'requester_email'
                    },
                    {
                        data: 'requester_phone',
                        name: 'requester_phone'
                    },
                    {
                        data: 'construction_type',
                        name: 'construction_type'
                    },
                    {
                        data: 'floor_plan',
                        name: 'floor_plan'
                    },
                    {
                        data: 'region',
                        name: 'region'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false
                    },
                ],
                // columnDefs: [
                //     { "width": "33%", "targets": 0 },
                //     { "width": "33%", "targets": 1 },
                //     { "width": "34%", "targets": 2 },
                // ],
                order: [
                    [0, 'asc']
                ]
            });
        })

        $('#construction_type').on('change', function() {
            $('#application-table').DataTable().destroy().clear();
            $('#application-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: false,
                scrollX: true,
                ajax: '<?php echo route('getApplications'); ?>?construction_type=' + $('#construction_type').val() +
                    '&inspection_type=' + $('#inspection_type').val() + '&inspection_status=' + $(
                        '#inspection_status').val() + '&inspector=' + $('#inspector').val() +
                    '&contractor=' + $('#contructor').val(),
                dom: '<"row mt-4 top"<"col-md-3"l><"col-md-6 text-center"B><"col-md-3"f>>rtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ],
                columns: [{
                        data: 'hriq_id',
                        name: 'hriq_id'
                    },
                    {
                        data: 'applicant_name',
                        name: 'application_name'
                    },
                    {
                        data: 'applicant_address',
                        name: 'applicant_address'
                    },
                    {
                        data: 'applicant_city',
                        name: 'applicant_city'
                    },
                    {
                        data: 'applicant_county',
                        name: 'applicant_county'
                    },
                    {
                        data: 'requested_date',
                        name: 'requested_date'
                    },
                    {
                        data: 'requester_name',
                        name: 'requester_name'
                    },
                    {
                        data: 'requester_email',
                        name: 'requester_email'
                    },
                    {
                        data: 'requester_phone',
                        name: 'requester_phone'
                    },
                    {
                        data: 'construction_type',
                        name: 'construction_type'
                    },
                    {
                        data: 'floor_plan',
                        name: 'floor_plan'
                    },
                    {
                        data: 'region',
                        name: 'region'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false
                    },
                ],
                // columnDefs: [
                //     { "width": "33%", "targets": 0 },
                //     { "width": "33%", "targets": 1 },
                //     { "width": "34%", "targets": 2 },
                // ],
                order: [
                    [0, 'asc']
                ]
            });
        })

        $('#inspection_status').on('change', function() {
            $('#application-table').DataTable().destroy().clear();
            $('#application-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: false,
                scrollX: true,
                ajax: '<?php echo route('getApplications'); ?>?construction_type=' + $('#construction_type').val() +
                    '&inspection_type=' + $('#inspection_type').val() + '&inspection_status=' + $(
                        '#inspection_status').val() + '&inspector=' + $('#inspector').val() +
                    '&contractor=' + $('#contructor').val(),
                dom: '<"row mt-4 top"<"col-md-3"l><"col-md-6 text-center"B><"col-md-3"f>>rtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ],
                columns: [{
                        data: 'hriq_id',
                        name: 'hriq_id'
                    },
                    {
                        data: 'applicant_name',
                        name: 'application_name'
                    },
                    {
                        data: 'applicant_address',
                        name: 'applicant_address'
                    },
                    {
                        data: 'applicant_city',
                        name: 'applicant_city'
                    },
                    {
                        data: 'applicant_county',
                        name: 'applicant_county'
                    },
                    {
                        data: 'requested_date',
                        name: 'requested_date'
                    },
                    {
                        data: 'requester_name',
                        name: 'requester_name'
                    },
                    {
                        data: 'requester_email',
                        name: 'requester_email'
                    },
                    {
                        data: 'requester_phone',
                        name: 'requester_phone'
                    },
                    {
                        data: 'construction_type',
                        name: 'construction_type'
                    },
                    {
                        data: 'floor_plan',
                        name: 'floor_plan'
                    },
                    {
                        data: 'region',
                        name: 'region'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false
                    },
                ],
                // columnDefs: [
                //     { "width": "33%", "targets": 0 },
                //     { "width": "33%", "targets": 1 },
                //     { "width": "34%", "targets": 2 },
                // ],
                order: [
                    [0, 'asc']
                ]
            });
        })

        $('#inspection_type').on('change', function() {
            $('#application-table').DataTable().destroy().clear();
            $('#application-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: false,
                scrollX: true,
                ajax: '<?php echo route('getApplications'); ?>?construction_type=' + $('#construction_type').val() +
                    '&inspection_type=' + $('#inspection_type').val() + '&inspection_status=' + $(
                        '#inspection_status').val() + '&inspector=' + $('#inspector').val() +
                    '&contractor=' + $('#contructor').val(),
                dom: '<"row mt-4 top"<"col-md-3"l><"col-md-6 text-center"B><"col-md-3"f>>rtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ],
                columns: [{
                        data: 'hriq_id',
                        name: 'hriq_id'
                    },
                    {
                        data: 'applicant_name',
                        name: 'application_name'
                    },
                    {
                        data: 'applicant_address',
                        name: 'applicant_address'
                    },
                    {
                        data: 'applicant_city',
                        name: 'applicant_city'
                    },
                    {
                        data: 'applicant_county',
                        name: 'applicant_county'
                    },
                    {
                        data: 'requested_date',
                        name: 'requested_date'
                    },
                    {
                        data: 'requester_name',
                        name: 'requester_name'
                    },
                    {
                        data: 'requester_email',
                        name: 'requester_email'
                    },
                    {
                        data: 'requester_phone',
                        name: 'requester_phone'
                    },
                    {
                        data: 'construction_type',
                        name: 'construction_type'
                    },
                    {
                        data: 'floor_plan',
                        name: 'floor_plan'
                    },
                    {
                        data: 'region',
                        name: 'region'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false
                    },
                ],
                // columnDefs: [
                //     { "width": "33%", "targets": 0 },
                //     { "width": "33%", "targets": 1 },
                //     { "width": "34%", "targets": 2 },
                // ],
                order: [
                    [0, 'asc']
                ]
            });
        })

        $('#inspector').on('change', function() {
            $('#application-table').DataTable().destroy().clear();
            $('#application-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: false,
                scrollX: true,
                ajax: '<?php echo route('getApplications'); ?>?construction_type=' + $('#construction_type').val() +
                    '&inspection_type=' + $('#inspection_type').val() + '&inspection_status=' + $(
                        '#inspection_status').val() + '&inspector=' + $('#inspector').val() +
                    '&contractor=' + $('#contructor').val(),
                dom: '<"row mt-4 top"<"col-md-3"l><"col-md-6 text-center"B><"col-md-3"f>>rtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ],
                columns: [{
                        data: 'hriq_id',
                        name: 'hriq_id'
                    },
                    {
                        data: 'applicant_name',
                        name: 'application_name'
                    },
                    {
                        data: 'applicant_address',
                        name: 'applicant_address'
                    },
                    {
                        data: 'applicant_city',
                        name: 'applicant_city'
                    },
                    {
                        data: 'applicant_county',
                        name: 'applicant_county'
                    },
                    {
                        data: 'requested_date',
                        name: 'requested_date'
                    },
                    {
                        data: 'requester_name',
                        name: 'requester_name'
                    },
                    {
                        data: 'requester_email',
                        name: 'requester_email'
                    },
                    {
                        data: 'requester_phone',
                        name: 'requester_phone'
                    },
                    {
                        data: 'construction_type',
                        name: 'construction_type'
                    },
                    {
                        data: 'floor_plan',
                        name: 'floor_plan'
                    },
                    {
                        data: 'region',
                        name: 'region'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false
                    },
                ],
                // columnDefs: [
                //     { "width": "33%", "targets": 0 },
                //     { "width": "33%", "targets": 1 },
                //     { "width": "34%", "targets": 2 },
                // ],
                order: [
                    [0, 'asc']
                ]
            });
        })

        $('#contructor').on('change', function() {
            $('#application-table').DataTable().destroy().clear();
            $('#application-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: false,
                scrollX: true,
                ajax: '<?php echo route('getApplications'); ?>?construction_type=' + $('#construction_type').val() +
                    '&inspection_type=' + $('#inspection_type').val() + '&inspection_status=' + $(
                        '#inspection_status').val() + '&inspector=' + $('#inspector').val() +
                    '&contractor=' + $('#contructor').val(),
                dom: '<"row mt-4 top"<"col-md-3"l><"col-md-6 text-center"B><"col-md-3"f>>rtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ],
                columns: [{
                        data: 'hriq_id',
                        name: 'hriq_id'
                    },
                    {
                        data: 'applicant_name',
                        name: 'application_name'
                    },
                    {
                        data: 'applicant_address',
                        name: 'applicant_address'
                    },
                    {
                        data: 'applicant_city',
                        name: 'applicant_city'
                    },
                    {
                        data: 'applicant_county',
                        name: 'applicant_county'
                    },
                    {
                        data: 'requested_date',
                        name: 'requested_date'
                    },
                    {
                        data: 'requester_name',
                        name: 'requester_name'
                    },
                    {
                        data: 'requester_email',
                        name: 'requester_email'
                    },
                    {
                        data: 'requester_phone',
                        name: 'requester_phone'
                    },
                    {
                        data: 'construction_type',
                        name: 'construction_type'
                    },
                    {
                        data: 'floor_plan',
                        name: 'floor_plan'
                    },
                    {
                        data: 'region',
                        name: 'region'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false
                    },
                ],
                // columnDefs: [
                //     { "width": "33%", "targets": 0 },
                //     { "width": "33%", "targets": 1 },
                //     { "width": "34%", "targets": 2 },
                // ],
                order: [
                    [0, 'asc']
                ]
            });
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fiverr\resources\views/application.blade.php ENDPATH**/ ?>