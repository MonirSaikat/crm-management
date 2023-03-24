<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Projects</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= site_url() ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="<?= site_url('customers') ?>">Projects</a></li>
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
                    <th>Title</th>
                    <th>Customer</th>
                    <th>Price</th>
                    <th>Paid</th>
                    <th>Due</th>
                    <th>Start</th>
                    <th>Deadline</th>
                    <th>Active</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $cnt = 1; ?>
                <?php foreach ($projects as $pro) : ?>
                    <tr>
                        <td><?= $cnt ?></td>
                        <td><?= $pro->title ?></td>
                        <td><?= $pro->customer ?></td>
                        <td><?= $pro->price ?></td>
                        <td><?= $pro->paid ?></td>
                        <td><?= $pro->price - $pro->paid ?></td>
                        <td><?= $pro->start_date ?></td>
                        <td><?= $pro->deadline_date ?></td>
                        <td>
                            <input data-customer-id="<?= $pro->id ?>" data-on-text="Yes" data-off-text="No" type="checkbox" name="my-checkbox" <?= $pro->is_active ? 'checked' : '' ?> data-bootstrap-switch data-off-color="danger" data-on-color="success" class="customer_active" />
                        </td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="<?= site_url() . 'projects/edit/' . $pro->id ?>"><i class="fa fa-pen"></i></a>
                            <a class="btn btn-danger btn-sm" href="<?= site_url() . 'projects/destroy/' . $pro->id ?>"><i class="fa fa-trash"></i></a>
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
        $('.customer_active').on('switchChange.bootstrapSwitch', function() {
            const customer_id = $(this).data('customer-id');

            $.get("customers/toggle_active/" + customer_id, function(data, status) {});
        });
    });
</script>