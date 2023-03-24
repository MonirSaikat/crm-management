<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Customer</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= site_url() ?> ">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= site_url('services') ?> ">Services</a></li>
                    <li class="breadcrumb-item active"><a href="#">Add Service</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        Add new Customer
    </div>
    <div class="card-body">
        <?= form_open() ?>
        <input type="hidden" name="id" value="<?= $customer->id ?>">

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" value="<?= $customer->name ?>" name="name" class="form-control <?= form_error('name') ? 'is-invalid' : '' ?>" id="name" placeholder="Enter name">
                    <?php if (form_open('name')) : ?>
                        <small class="text-danger"><?= form_error('name') ?></small>
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" value="<?= $customer->email ?>" name="email" class="form-control <?= form_error('email') ? 'is-invalid' : '' ?>" id="email" placeholder="Enter email">
                    <?php if (form_open('email')) : ?>
                        <small class="text-danger"><?= form_error('email') ?></small>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" value="<?= $customer->phone ?>" name="phone" class="form-control <?= form_error('phone') ? 'is-invalid' : '' ?>" id="phone" placeholder="Enter phone">
                    <?php if (form_open('phone')) : ?>
                        <small class="text-danger"><?= form_error('phone') ?></small>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" value="<?= $customer->address ?>" name="address" class="form-control <?= form_error('address') ? 'is-invalid' : '' ?>" id="address" placeholder="Enter address">
                    <?php if (form_open('address')) : ?>
                        <small class="text-danger"><?= form_error('address') ?></small>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <button class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
</div>