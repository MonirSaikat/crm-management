<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Add Employee</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= site_url() ?>">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= site_url('employees') ?>">Employees</a></li>
                    <li class="breadcrumb-item active"><a href="<?= site_url('employees/create') ?>">Add Employee</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Add new employee</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <?= form_open_multipart() ?>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Name *</label>
                    <input type="text" class="form-control <?= form_error('name') ? 'is-invalid' : '' ?>" id="name" name="name" placeholder="Enter name">
                    <?php if (form_error('name')) : ?>
                        <small class="text-danger"><?= form_error('name') ?></small>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="phone">Phone *</label>
                    <input type="text" class="form-control <?= form_error('phone') ? 'is-invalid' : '' ?>" id="phone" name="phone" placeholder="Enter phone">
                    <?php if (form_error('phone')) : ?>
                        <small class="text-danger"><?= form_error('phone') ?></small>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="text" class="form-control <?= form_error('email') ? 'is-invalid' : '' ?>" id="email" name="email" placeholder="Enter email">
                    <?php if (form_error('email')) : ?>
                        <small class="text-danger"><?= form_error('email') ?></small>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="salary">Salary *</label>
                    <input type="number" class="form-control <?= form_error('salary') ? 'is-invalid' : '' ?>" id="salary" name="salary" placeholder="Enter salary">
                    <?php if (form_error('salary')) : ?>
                        <small class="text-danger"><?= form_error('salary') ?></small>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="designation_id">Designation *</label>
                    <select name="designation_id" id="designation_id" class="form-control select2 <?= form_error('designation_id') ? 'is-invalid' : '' ?>">
                        <option value="">Select Designation</option>
                        <?php foreach ($designations as $des) : ?>
                            <option value="<?= $des->id ?>"><?= $des->name ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php if (form_error('designation_id')) : ?>
                        <small class="text-danger"><?= form_error('designation_id') ?></small>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-6">
                <label for="joining_date">Joining Date</label>
                <div class="input-group date" id="joining_date" data-target-input="nearest">
                    <input type="text" name="join_date" class="form-control <?= form_error('join_date') ? 'is-invalid' : '' ?> datetimepicker-input" placeholder="Select date" data-target="#joining_date" />
                    <div class="input-group-append" data-target="#joining_date" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
                <?php if (form_error('join_date')) : ?>
                    <small class="text-danger"><?= form_error('join_date') ?></small>
                <?php endif; ?>
            </div>
            <div class="col-md-6">
                <label for="image">Image</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="image" id="image">
                    <label class="custom-file-label" for="image">Upload employee image</label>
                </div>
            </div>
        </div>


    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </form>
</div>


<script>
    $('#joining_date').datetimepicker({
        format: 'L'
    })
</script>