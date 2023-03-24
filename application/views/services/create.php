<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Add Service</h1>
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
        Add new service
    </div>
    <div class="card-body">
        <?= form_open() ?>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control <?= form_error('name') ? 'is-invalid' : '' ?>" id="name" placeholder="Enter name">
            <?php if (form_open('name')) : ?>
                <small class="text-danger"><?= form_error('name') ?></small>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="short_desc">Short details</label>
            <textarea name="short_desc" class="form-control <?= form_error('short_desc') ? 'is-invalid' : '' ?>" id="short_desc" placeholder="Enter a short description"></textarea>
            <?php if (form_open('short_desc')) : ?>
                <small class="text-danger"><?= form_error('short_desc') ?></small>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="summernote">Details</label>
            <textarea id="summernote" name="details" class="form-control <?= form_error('details') ? 'is-invalid' : '' ?>"></textarea>
            <?php if (form_open('details')) : ?>
                <small class="text-danger"><?= form_error('details') ?></small>
            <?php endif; ?>
        </div>

        <button class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
</div>