<?php $__env->startSection('title', __('Add Contractor')); ?>

<?php $__env->startSection('content'); ?>
    <!-- main Section -->
    <div class="main-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="dash-heading mb-10">
                        <div class="row">
                            <div class="col-md-12">
                                <h2><?php echo e(__('Contractor')); ?></h2>
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
                    <form method="post" action="<?php echo e(url('create-company')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="card">
                            <div class="card-header">Create Contractor</div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="company_name"><span class="red">*</span> Contractor Name</label>
                                            <input type="text" name="name" class="form-control" required>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <button id="submit-form" type="submit" class="btn btn-success mr-10">Save</button>
                            </div>
                        </div>
                    </form>
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
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fiverr\resources\views/addCompany.blade.php ENDPATH**/ ?>