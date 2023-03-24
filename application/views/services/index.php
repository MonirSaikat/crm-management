<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Services</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= site_url() ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="<?= site_url('sers') ?>">sers</a></li>
                    <li class="breadcrumb-item active"><a href="<?= site_url('sers/create') ?>">Add ser</a></li>
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
                    <th>Description</th>
                    <th>Active</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $cnt = 1; ?>
                <?php foreach ($services as $ser) : ?>
                    <tr>
                        <td><?= $cnt ?></td>
                        <td><?= $ser->name ?></td>
                        <td><?= word_limiter($ser->short_desc, 10) ?></td>
                        <td>
                            <input id="service_active"  data-service-id="<?= $ser->id ?>" data-on-text="Yes" data-off-text="No" type="checkbox" name="my-checkbox" <?= $ser->is_active ? 'checked' : '' ?> data-bootstrap-switch data-off-color="danger" data-on-color="success" class="service_active" />
                        </td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="<?= site_url() . 'services/edit/' . $ser->id ?>"><i class="fa fa-pen"></i></a>
                            <a class="btn btn-danger btn-sm" href="<?= site_url() . 'services/destroy/' . $ser->id ?>"><i class="fa fa-trash"></i></a>
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
        $('.service_active').on('switchChange.bootstrapSwitch', function() {
            const service_id = $(this).data('service-id');
            $.get("services/toggle_active/" + service_id, function(data, status) {
            });
        });

    });
</script>