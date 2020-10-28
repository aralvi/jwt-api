<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">

    <title><?php echo $__env->yieldContent('title', 'Dashboard'); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('admin/fonts/feather/css/feathericon.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin/libs/fontawesome/css/all.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin/libs/DataTables/css/jquery.dataTables.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('admin/libs/DataTables/css/rowReorder.dataTables.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('admin/libs/select2/dist/css/select2.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('admin/libs/summernote/summernote-lite.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin/libs/datetimepicker-master/jquery.datetimepicker.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin/libs/datepicker-bootstrap/css/bootstrap-datepicker.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin/libs/dropzone/dropzone.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin/css/theme.min.css')); ?>" id="stylesheetLight">

    <?php echo $__env->yieldContent('style'); ?>
    <link href="<?php echo e(asset('admin/css/custom.css')); ?>" rel="stylesheet" media="all">

    <script>
        var token = '<?php echo e(csrf_token()); ?>';
        var url = '<?php echo e(url('/')); ?>';
    </script>

</head>
<body>
    <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light" id="sidebar">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <a class="navbar-brand" href="<?php echo e(url('/admin/dashboard')); ?>">
            <strong>Shop Panel</strong>
        </a>
        <div class="navbar-user d-md-none">
            <div class="dropdown">

            </div>
        </div>
        <div class="collapse navbar-collapse" id="sidebarCollapse">
            <ul class="navbar-nav">



                <li class="nav-item <?php echo e(request()->is('users') ? 'active' : ''); ?>">
                    <a class="nav-link" href="<?php echo e(url('users')); ?>">
                        <i class="fe fe-users"></i> Users
                    </a>
                </li>
                <?php if(auth()->check() && auth()->user()->hasRole('admin')): ?>
                <li class="nav-item <?php echo e(request()->is('roles') ? 'active' : ''); ?>">
                    <a class="nav-link" href="<?php echo e(url('roles')); ?>">
                        <i class="fe fe-roles"></i> Roles
                    </a>
                </li>
                <li class="nav-item <?php echo e(request()->is('permissions') ? 'active' : ''); ?>">
                    <a class="nav-link" href="<?php echo e(url('permissions')); ?>">
                        <i class="fe fe-permissions"></i> Permissions
                    </a>
                </li>
                <li class="nav-item <?php echo e(request()->is('assign-permissions') ? 'active' : ''); ?>">
                    <a class="nav-link" href="<?php echo e(url('assign-permissions')); ?>">
                        <i class="fe fe-permissions"></i>Assign Permissions
                    </a>
                </li>
<?php endif; ?>
            </ul>
            <hr>
            <ul class="navbar-nav">
                <li class="nav-item <?php echo e(request()->is('/profile') ? 'active' : ''); ?>">
                    <a class="nav-link" href="<?php echo e(url('/profile')); ?>">
                        <i class="fe fe-user"></i> Profile
                    </a>
                </li>
                <li class="nav-item <?php echo e(request()->is('/password') ? 'active' : ''); ?>">
                    <a class="nav-link" href="<?php echo e(url('/password')); ?>">
                        <i class="fe fe-edit"></i> Change Password
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('logout')); ?>"
                               onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        <i class="fe fe-logout"></i> Logout
                    </a>
                </li>
            </ul>

        </div>
    </div>
</nav>

<nav class="navbar navbar-vertical navbar-vertical-sm fixed-left navbar-expand-md " id="sidebarSmall" style="display: none"></nav>

    <div class="main-content">
        <nav class="navbar navbar-expand-md navbar-light d-none d-md-flex" id="topbar">
            <div class="container-fluid">
            <a href="<?php echo e(url('/')); ?>" target="_self" style="width: 120px; padding: 5px; text-align: center; background: #000; color: #fff; font-weight: bold; border-radius: 10px;">Go to Site</a>

                <!-- Form -->
                <form class="form-inline mr-4 d-none d-md-flex"></form>

                <!-- User -->
                <div class="navbar-user">
                    <div class="dropdown">

                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                               onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                                <?php echo e(__('Logout')); ?>

                            </a>
                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                <?php echo csrf_field(); ?>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </nav>

        <br>
        <div id="success_errror_any">
            <?php if(session('success')): ?>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-success alert-block" role="alert">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong><?php echo e(session('success')); ?></strong>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if(session('error')): ?>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-danger alert-block" role="alert">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong><?php echo e(session('error')); ?></strong>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if($errors->any()): ?>
                <div class="container-fluid">
                    <div class="alert alert-danger alert-block" role="alert">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-block hide" id="messageDiv" role="alert">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong id="message"></strong>
                    </div>
                </div>
            </div>
        </div>
        <?php echo $__env->yieldContent('content'); ?>
        <br>
        <br>
        <br>

    </div>
    

    <script src="<?php echo e(asset('admin/libs/jquery/dist/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/libs/DataTables/js/dataTables.bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/libs/DataTables/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/libs/DataTables/js/dataTables.rowReorder.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/libs/select2/dist/js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/libs/summernote/summernote-lite.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/theme.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/custom.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/libs/datetimepicker-master/build/jquery.datetimepicker.full.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/libs/datepicker-bootstrap/js/bootstrap-datepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/libs/dropzone/dropzone.js')); ?>"></script>

    <script type="text/javascript">
        $(document).ready( function () {
          $('.searchableSelectBox').select2();
          $('.searchableSelectBoxMultiple').select2();
        });
        $('#summernote').summernote({
          placeholder: 'Enter Page Content Here...',
          tabsize: 2,
          height: 100
        });
    </script>

    <?php echo $__env->yieldContent('script'); ?>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\orify\jwt-api\resources\views\layouts\admin.blade.php ENDPATH**/ ?>