<?php $__env->startSection('title', __('Update Staff')); ?>

<?php $__env->startSection('content'); ?>
    <!-- main Section -->
    <div class="main-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="dash-heading mb-10">
                        <div class="row">
                            <div class="col-md-12">
                                <h2><?php echo e(__('Staff')); ?></h2>
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
                <div class="col-lg-8 mb-30">
                    <div class="card">
                        <div class="card-header">Update Staff</div>
                        <div class="card-body">
                            <form id="staff-form" method="post" action="<?php echo e(url('update-staff')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="company_name"><span class="red">*</span> Staff Name</label>
                                            <input type="text" name="name" class="form-control" value="<?php echo e($user->name); ?>" required>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="company_name"><span class="red">*</span> Staff Email</label>
                                            <input type="email" name="email" class="form-control" value="<?php echo e($user->email); ?>" id="email" required>
                                            <small class="text-danger email_alert"></small>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="company_name"><span class="red">*</span> Role</label>
                                            <select name="role" id="role" class="form-control chosen-select">
                                                <option value="3">Inspector</option>
                                                <option value="2">Admin</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="company_name"><span class="red">*</span> Status</label>
                                            <select name="status" id="status" class="form-control chosen-select">
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <input type="hidden" id="valid_email" value="1">
                        <input type="hidden" name="id" id="id" value="<?php echo e($user->id); ?>">
                        <div class="card-footer">
                            <button id="submit-form" class="btn btn-success mr-10">Save</button>
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
        $(document).ready(function () {
            $('#role').val('<?php echo e($user->role_id); ?>').trigger("change")
            $('#status').val('<?php echo e($user->status); ?>').trigger("change")
            let message = $('#message').val();
            if(message === 'success') {
                Toast.fire({
                    icon: 'success',
                    title: 'Added successfully'
                })
            } else if(message == 'failed') {
                Toast.fire({
                    icon: 'error',
                    title: 'Failed. Try again'
                })
            }
        })

        $('#email').on('keypress', function () {
            setTimeout(function () {
                let email = $('#email').val();
                let id = $('#id').val();
                axios.get('<?php echo e(url('checkUserEmail')); ?>/'+email+'/'+id)
                    .then(response => {
                        console.log(response)
                        if(response.data == 'taken') {
                            $('.email_alert').empty()
                            $('.email_alert').append('Email already taken.')
                            $('#valid_email').val(0)
                        } else {
                            $('.email_alert').empty()
                            $('#valid_email').val(1)
                        }
                    })
            }, 10)
        })

        $('#submit-form').on("click", function () {
            if($('#valid_email').val() == 1) {
                $('#staff-form').submit();
            }
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fiverr\resources\views/editStaff.blade.php ENDPATH**/ ?>