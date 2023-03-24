<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Add Project</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= site_url() ?> ">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= site_url('projects') ?> ">Projects</a></li>
                    <li class="breadcrumb-item active"><a href="#">Add project</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        Add new Project
    </div>
    <div class="card-body">
        <?= form_open() ?>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control <?= form_error('title') ? 'is-invalid' : '' ?>" id="title" placeholder="Enter title">
                    <?php if (form_error('title')) : ?>
                        <small class="text-danger"><?= form_error('title') ?></small>
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-md-4">
                <label for="customer_id">Customer</label>
                <select name="customer_id" id="customer_id" class="form-control select2">
                    <option value="">Select Customer</option>

                    <?php foreach ($customers as $cus) : ?>
                        <option value="<?= $cus->id ?>"><?= $cus->name ?></option>
                    <?php endforeach; ?>
                </select>
                <?php if (form_error('customer_id')) : ?>
                    <small class=" text-danger"><?= form_error('customer_id') ?></small>
                <?php endif; ?>
            </div>


            <div class="col-md-4">
                <label for="technologies">Technologies</label>
                <select name="technologies[]" id="technologies" class="form-control select2 multiselect" multiple>
                    <option value="">Select Customer</option>
                    <?php
                    $techs = ['react', 'laravel', 'php', 'codeigniter', 'react-native'];
                    ?>
                    <?php foreach ($techs as $tech) : ?>
                        <option value="<?= $tech ?>"><?= $tech ?></option>
                    <?php endforeach; ?>
                </select>
                <?php if (form_error('technologies')) : ?>
                    <small class=" text-danger"><?= form_error('technologies') ?></small>
                <?php endif; ?>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" name="price" class="form-control <?= form_error('price') ? 'is-invalid' : '' ?>" id="price" placeholder="Enter price">
                    <?php if (form_error('price')) : ?>
                        <small class="text-danger"><?= form_error('price') ?></small>
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="start_date">Start Date</label>
                    <input type="date" name="start_date" class="form-control <?= form_error('start_date') ? 'is-invalid' : '' ?>" id="start_date" placeholder="Enter start_date">
                    <?php if (form_error('start_date')) : ?>
                        <small class="text-danger"><?= form_error('start_date') ?></small>
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="deadline_date">Deadline Date</label>
                    <input type="date" name="deadline_date" class="form-control <?= form_error('deadline_date') ? 'is-invalid' : '' ?>" id="deadline_date" placeholder="Enter deadline_date">
                    <?php if (form_error('deadline_date')) : ?>
                        <small class="text-danger"><?= form_error('deadline_date') ?></small>
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-md-12">
                <label for="details">Project Details</label>
                <textarea name="details" id="summernote" cols="30" rows="30" style="min-height: 400px"></textarea>
            </div>
        </div>

        <button class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
</div>