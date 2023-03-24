<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Settings</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= site_url() ?> ">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="#">Settings</a></li>
                </ol>
            </div>
        </div>
    </div>
</div> 

<div class="row">
    <div class="col-md-6">

        <div class="card">
            <div class="card-header">
                Update Password
            </div>
            <div class="card-body">
                <?= form_open(site_url('settings/update_password')) ?>
                <div class="form-group">
                    <label for="old_password">Old Password</label>
                    <input type="password" name="old_password" class="form-control <?= form_error('old_password') ? 'is-invalid' : '' ?>" id="old_password" placeholder="Enter old password">
                    <?php if (form_open('old_password')) : ?>
                        <small class="text-danger"><?= form_error('old_password') ?></small>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" name="password" class="form-control <?= form_error('password') ? 'is-invalid' : '' ?>" id="password" placeholder="Enter old password">
                    <?php if (form_open('password')) : ?>
                        <small class="text-danger"><?= form_error('password') ?></small>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control <?= form_error('confirm_password') ? 'is-invalid' : '' ?>" id="confirm_password" placeholder="Enter old password">
                    <?php if (form_open('confirm_password')) : ?>
                        <small class="text-danger"><?= form_error('confirm_password') ?></small>
                    <?php endif; ?>
                </div>

                <button class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>