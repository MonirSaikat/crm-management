<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Employees</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="<?= site_url('employees') ?>">Employees</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <table id="dataTable" class="table table-hover">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Phone</th>
                    <th>Designation</th>
                    <th>Salary</th>
                    <th>Active</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $cnt = 1; ?>
                <?php foreach ($employees as $employee) : ?>
                    <tr>
                        <td><?= $cnt ?></td>
                        <td><?= $employee->name ?></td>
                        <td>
                            <img src="<?= base_url('asset/img/') . $employee->image ?>" width="40" height="40" class="img-circle elevation-2" alt="User Image">
                        </td>
                        <td><?= $employee->phone ?></td>
                        <td><?= $employee->designation ?></td>
                        <td><?= $employee->salary ?></td>
                        <td>
                            <input data-employee-id="<?= $employee->id ?>" data-on-text="Yes" data-off-text="No" type="checkbox" name="my-checkbox" <?= $employee->is_active ? 'checked' : '' ?> data-bootstrap-switch data-off-color="danger" data-on-color="success" class="employee_active" />
                        </td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="<?= site_url() . 'employees/edit/' . $employee->id ?>"><i class="fa fa-pen"></i></a>
                            <a class="btn btn-danger btn-sm" href="<?= site_url() . 'employees/destroy/' . $employee->id ?>"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>

                    <?php $cnt++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(() => {
        $('.employee_active').on('switchChange.bootstrapSwitch', function() {
            const employee_id = $(this).data('employee-id');

            $.get("employees/toggle_active/" + employee_id, function(data, status) {});
        });
    });
</script>