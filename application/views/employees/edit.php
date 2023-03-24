<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit employee</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= site_url() ?>">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= site_url('employees') ?>">Employees</a></li>
                    <li class="breadcrumb-item active"><a href="<?= site_url('employees/create') ?>">Edit Employee</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>


<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Edit employee</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <?= form_open() ?>
    <div class="card-body">
        <input type="hidden" value="<?= $employee->id ?>" name="id">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Name *</label>
                    <input type="text" class="form-control" id="name" required name="name" placeholder="Enter name" value="<?= $employee->name ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="phone">Phone *</label>
                    <input type="text" class="form-control" id="phone" required name="phone" placeholder="Enter phone" value="<?= $employee->phone ?>">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter email" value="<?= $employee->email ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="salary">Salary *</label>
                    <input type="number" class="form-control" id="salary" name="salary" required placeholder="Enter salary" value="<?= $employee->salary ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="designation_id">Designation *</label>
                    <select name="designation_id" id="designation_id" class="form-control">
                        <?php foreach ($designations as $des) : ?>
                            <option <?= $des->id === $employee->designation_id ? 'selected' : '' ?> value="<?= $des->id ?>"><?= $des->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="join_date">Join date</label>
                    <input type="date" class="form-control" id="join_date" name="join_date" value="<?= date('Y-m-d', strtotime($employee->join_date)) ?>">
                </div>
            </div>
        </div>


    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
    </form>
</div>