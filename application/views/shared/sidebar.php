<?php
$admin = $this->session->userdata('role') == 1;
?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url() ?>" class="brand-link">
        <img src="<?= base_url() ?>asset/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url() ?>asset/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= $this->session->userdata('name') ?> </a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="<?= site_url() ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <?php if ($admin) : ?>
                    <li class="nav-item  <?= $this->uri->segment(1) === 'customers' ? 'menu-open' : '' ?>">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-list"></i>
                            <p>
                                Customers
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= site_url('customers') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Customer List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('customers/create') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add Customer</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item  <?= $this->uri->segment(1) === 'employees' ? 'menu-open' : '' ?>">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-list"></i>
                            <p>
                                Employees
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= site_url('employees') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Employee List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('employees/create') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add Employee</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item  <?= $this->uri->segment(1) === 'payroll' ? 'menu-open' : '' ?>">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-list"></i>
                            <p>
                                Payroll
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= site_url('payroll') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Payroll List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('payroll/create') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add Payroll</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item  <?= $this->uri->segment(1) === 'projects' ? 'menu-open' : '' ?>">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-list"></i>
                            <p>
                                Projects
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= site_url('projects') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Project List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('projects/create') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add Project</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('projects/assign_employee') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Assign Employee</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item  <?= $this->uri->segment(1) === 'services' ? 'menu-open' : '' ?>">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-list"></i>
                            <p>
                                Services
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= site_url('services') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Service List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('services/create') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add Service</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>

                <li class="nav-item">
                    <a href="<?= site_url('settings') ?>" class="nav-link">
                        <i class="nav-icon fa fa-cog"></i>
                        <p>
                            Setting
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<script>
    jQuery(function($) {
        // alert(1);
        const url = window.location.protocol + '//' + window.location.hostname + window.location.pathname;
        $(`a[href="${url}"]`).addClass('active');
    });
</script>