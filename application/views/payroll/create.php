<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Add Payroll</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= site_url() ?>">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= site_url('payroll') ?>">Payroll</a></li>
                    <li class="breadcrumb-item active"><a>Add Payroll</a></li>
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
                    <label for="month">Month</label>
                    <select name="month" id="month" class="form-control select2">
                        <option>Select month</option>
                        <?php foreach ($months as $month) : ?>
                            <option data-days="<?= $month->days ?>" value="<?= $month->code ?>"><?= $month->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="absent">Absent</label>
                    <input type="number" max="28" class="form-control" id="absent" name="absent">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="salary">Salary</label>
                    <input type="text" class="form-control" id="salary" readonly>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="advanced">Advanced Paid</label>
                    <input type="number" class="form-control" id="advanced" name="advanced" readonly>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="paid">Paid</label>
                    <input type="number" class="form-control" id="paid" readonly>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="total_payable">Total Payable</label>
                    <input type="number" readonly class="form-control" id="total_payable" name="total_payable">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="is_advanced">Paying Advanced</label>
                    <select name="is_advanced" id="is_advanced" class="form-control">
                        <option>Select Option</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="pay_amount">Paying Amount</label>
                    <input type="number" name="pay_amount" class="form-control" id="pay_amount">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        let emp_id, month;

        $('#employee_id').on('change', function() {
            emp_id = $(this).val();
            get_salary();
        });

        $('#month').on('change', function() {
            month = $(this).val();
            get_salary();
        });

        function update_ui() {
            let salary = parseFloat($('#salary').val() || 0);
            const advanced = parseFloat($('#advanced').val() || 0);
            const paid = parseFloat($('#paid').val() || 0);
            const absent = parseFloat($('#absent').val() || 0);
            const days = $('#month option:selected').data('days');
            let per_day_amount = salary / parseInt(days);
            let total_payable = salary;

            if (absent > 0) {
                total_payable = salary - (per_day_amount * absent)
            };

            total_payable -= advanced;
            total_payable -= paid;

            $('#total_payable').val(Math.round(total_payable));
        }

        $('#absent').on('input', () => update_ui());
        $('#pay_amount').on('input', function() {
            let total_payable = $('#total_payable').val();

            if (+$(this).val() > +total_payable) {
                alert('Amount can not be greater than payable');
                $(this).val(total_payable);
            }
        })

        function get_salary() {
            if (emp_id && month) {
                $.get('<?= base_url() ?>employees/paid_salary/' + emp_id + '/' + month, function(data, status) {
                    if (status === 'success') {
                        data = JSON.parse(data);
                        $('#paid').val(data?.amount || 0);
                        update_ui();
                    }
                });

                $.get('<?= base_url() ?>employees/salary/' + emp_id, function(data, status) {
                    if (status === 'success') {
                        data = JSON.parse(data);
                        $('#salary').val(data?.salary || 0);
                        update_ui();
                    }
                });

                // get advanced paid salary
                $.get('<?= base_url() ?>employees/advanced_salary/' + emp_id + '/' + month, function(data, status) {
                    if (status === 'success') {
                        data = JSON.parse(data);
                        console.log(data);
                        $('#advanced').val(data?.amount || 0);
                        update_ui();
                    }
                });

            }
        }


    })
</script>