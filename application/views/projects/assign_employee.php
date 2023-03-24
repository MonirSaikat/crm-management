<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Add Project to employee</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= site_url() ?>">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= site_url('projects') ?>">Projects</a></li>
                    <li class="breadcrumb-item"><a href="<?= site_url('projects/assign_employee') ?>">Assign Employee</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- /.content-header -->


<div class="card">
    <div class="card-body">
        <?= form_open() ?>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="employee_id">Employee</label>
                    <select name="employee_id" id="employee_id" class="form-control select2">
                        <option>Select Employee</option>
                        <?php foreach ($employees as $emp) : ?>
                            <option value="<?= $emp->id ?>"><?= $emp->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="project_id">Project</label>
                    <select name="project_id" id="project_id" class="form-control select2">
                        <option>Select Project</option>
                        <?php foreach ($projects as $pro) : ?>
                            <option value="<?= $pro->id ?>"><?= $pro->title ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="role">As</label>
                    <select name="role[]" id="role" class="form-control select2" multiple>
                        <option>Assign As</option>
                        <?php
                        $roles = $this->db->get('project_roles')->result();
                        ?>
                        <?php foreach ($roles as $role) : ?>
                            <option value="<?= $role->id ?>"><?= $role->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Assign</button>
        </form>
    </div>
</div>


<div class="card">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Project</th>
                    <th>Employee</th>   
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item) : ?>
                    <tr>
                        <td><?= $item->project ?></td>
                        <td><?= $item->employee_roles ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>