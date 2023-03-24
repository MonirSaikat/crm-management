<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Customers</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= site_url() ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="<?= site_url('customers') ?>">Cucstomers</a></li>
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
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Due</th>
                    <th>Active</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $cnt = 1; ?>
                <?php foreach ($customers as $cus) : ?>
                    <tr>
                        <td><?= $cnt ?></td>
                        <td><?= $cus->name ?></td>
                        <td><?= $cus->phone ?></td>
                        <td><?= $cus->email ?></td>
                        <td><?= $cus->address ?></td>
                        <td><?= $cus->due ?></td>
                        <td>
                            <input data-customer-id="<?= $cus->id ?>" data-on-text="Yes" data-off-text="No" type="checkbox" name="my-checkbox" <?= $cus->is_active ? 'checked' : '' ?> data-bootstrap-switch data-off-color="danger" data-on-color="success" class="customer_active" />
                        </td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="<?= site_url() . 'customers/edit/' . $cus->id ?>"><i class="fa fa-pen"></i></a>
                            <a class="btn btn-danger btn-sm" href="<?= site_url() . 'customers/destroy/' . $cus->id ?>"><i class="fa fa-trash"></i></a>
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