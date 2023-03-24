<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Payroll</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="<?= site_url('payroll') ?>">Payroll</a></li>
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
                    <th>Employee</th>
                    <th>Amount</th>
                    <th>Month</th>
                    <th>Pay Date</th>
                    <th>Advanced</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $cnt = 1; ?>
                <?php foreach ($payroll as $pay) : ?>
                    <tr>
                        <td><?= $cnt ?></td>
                        <td><?= $pay->employee ?></td>
                        <td><?= $pay->amount ?></td>
                        <td><?= $pay->month ?></td>
                        <td><?= date('d/m/Y', strtotime($pay->created_at)) ?></td>
                        <td>
                            <?php if ($pay->is_advanced) : ?>
                                <span class="badge bg-success">Yes</span>
                            <?php else : ?>
                                <span class="badge bg-danger">No</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="<?= site_url() . 'payroll/edit/' . $pay->id ?>"><i class="fa fa-pen"></i></a>
                            <a class="btn btn-danger btn-sm" href="<?= site_url() . 'payroll/destroy/' . $pay->id ?>"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>

                    <?php $cnt++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>