
<!doctype html>
<html lang="en">
<head>
    <?php
        $settings = \App\Models\Setting::find(1)
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $__env->yieldContent('title'); ?> | <?php echo e($settings->title); ?></title>
    <meta name="description" content="">
    <link rel="shortcut icon" href="<?php echo e(url('public/storage/uploads')."/".$settings->favicon); ?>" type="image/x-icon">
    <link rel="icon" href="<?php echo e(url('public/storage/uploads')."/".$settings->favicon); ?>" type="image/x-icon">
    <!-- General CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/font-awesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/jquery.mCustomScrollbar.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/chosen/bootstrap-chosen.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/jquery.gritter.min.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('assets/bootstrap-datetimepicker/bootstrap-fonticon.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/global.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    <!-- Theme color changes in Global Setting -->
    <style>
        .btn-danger {
            color: white !important;
        }

        .checkbox_input:hover, .checkbox_input:focus {
            -webkit-appearance: auto;
        }
    </style>
</head>
<body id="tw-content">
<!--Top Navbar-->
<header class="be-header">
    <a id="sidebarCollapse" class="btn-sh" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
    <ul class="top-navbar">





        <li>
            <span class="user_info"><?php echo e(auth()->user()->name); ?><br><?php echo e(auth()->user()->email); ?></span>
            <div class="profile-img"><img src="<?php echo e(url('public/storage/uploads').'/'.\Illuminate\Support\Facades\Auth::user()->img); ?>"></div>
            <ul class="sub-navbar">
                <li><a href="<?php echo e(url('profile')); ?>">Edit Profile</a></li>
                <li>
                    <a href="<?php echo e(url('logout')); ?>"
                       onclick="event.preventDefault();
									 document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                        <?php echo csrf_field(); ?>
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</header>
<!--/Top Navbar/-->

<!-- left sidebar -->
<div class="left-sidebar">
    <div class="logo">
        <a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(url('public/storage/uploads')."/".$settings->logo); ?>"></a>
    </div>
    <ul class="left-main-menu">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
            <li><a href="<?php echo e(url('/')); ?>"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>
            <li id="is_project"><a href="<?php echo e(url('admin/application')); ?>"><i class="fa fa-list"></i><span>Applications</span></a></li>
            <li><a href="<?php echo e(url('admin/company')); ?>"><i class="fa fa-users"></i><span>Contractor</span></a></li>
            <li><a href="<?php echo e(url('admin/contractor-staff')); ?>"><i class="fa fa-users"></i><span>Contractor<br>Staffs</span></a></li>
            <li><a href="<?php echo e(url('admin/floorplan')); ?>"><i class="fa fa-building"></i><span>Floor Plan</span></a></li>
            <li><a href="<?php echo e(url('admin/staff')); ?>"><i class="fa fa-users"></i><span>Staff</span></a></li>
            <li><a href="<?php echo e(url('admin/document')); ?>"><i class="fa fa-file"></i><span>Document</span></a></li>
            <li><a href="<?php echo e(url('admin/audit')); ?>"><i class="fa fa-chart-bar"></i><span>Audit</span></a></li>
            <li><a href="<?php echo e(url('admin/email-templates')); ?>"><i class="fa fa-envelope"></i><span>Email Templates</span></a></li>
            <li><a href="<?php echo e(url('admin/settings')); ?>"><i class="fa fa-cogs"></i><span>Settings</span></a></li>
        <?php elseif (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('inspector')): ?>
            <li id="is_project"><a href="<?php echo e(url('inspector/application')); ?>"><i class="fa fa-list"></i><span>Applications</span></a></li>
            <li><a href="<?php echo e(url('inspector/contractor-staff')); ?>"><i class="fa fa-users"></i><span>Contractor<br>Staffs</span></a></li>
            <li><a href="<?php echo e(url('inspector/floorplan')); ?>"><i class="fa fa-building"></i><span>Floor Plan</span></a></li>
            <li><a href="<?php echo e(url('inspector/document')); ?>"><i class="fa fa-file"></i><span>Document</span></a></li>
        <?php elseif (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('company')): ?>
            <li><a href="<?php echo e(url('contractor/application')); ?>"><i class="fa fa-list"></i><span>Application</span></a></li>
            <li><a href="<?php echo e(url('contractor/floorplan')); ?>"><i class="fa fa-building"></i><span>Floor Plan</span></a></li>
            <li><a href="<?php echo e(url('contractor/document')); ?>"><i class="fa fa-file"></i><span>Document</span></a></li>
        <?php endif; ?>
    </ul>
</div>
<!-- /left sidebar -->
<!-- main Section -->
<?php echo $__env->yieldContent('content'); ?>
<!-- /main Section -->


<!-- General JS Scripts -->
<script src="<?php echo e(asset('assets/js/jquery-3.5.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/jquery-ui.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/jquery.popupoverlay.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/jquery.gritter.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/parsley.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/jquery.mCustomScrollbar.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/chosen.jquery.min.js')); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.11.3/b-2.1.1/b-colvis-2.1.1/b-html5-2.1.1/b-print-2.1.1/r-2.2.9/datatables.min.css"/>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.11.3/b-2.1.1/b-colvis-2.1.1/b-html5-2.1.1/b-print-2.1.1/r-2.2.9/datatables.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- tw_main js -->
<script src="<?php echo e(asset('assets/js/tw_main.js')); ?>"></script>
<div class="custom-popup light width-100 dnone" id="lightCustomModal">
    <div class="padding-md">
        <h4 class="m-top-none">This is alert message</h4>
    </div>
    <div class="text-center">
        <a href="javascript:void(0);" class="btn green-btn lightCustomModal_close mr-10" onClick="onConfirm()">Confirm</a>
        <a href="javascript:void(0);" class="btn danger-btn lightCustomModal_close">Cancel</a>
    </div>
</div>
<a href="#lightCustomModal" class="btn btn-warning btn-small lightCustomModal_open dnone">Edit</a>
<!-- Chart js -->
<script src="<?php echo e(asset('assets/js/Chart.min.js')); ?>"></script>
<!-- datatables css/js -->












<script src="<?php echo e(asset('pages/dashboard.js')); ?>"></script>
<script>
    $(document).ready(function () {
        $('.hd-select2').select2();
        $('.hd-datepicker').datepicker({
            autoclose: true,
            orientation: 'bottom'
        });

        axios.get('<?php echo e(url('callQueue')); ?>')
        .then(response => {
            console.log(response.data)
        })
    })
</script>
<?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\fiverr\resources\views//layouts/app.blade.php ENDPATH**/ ?>