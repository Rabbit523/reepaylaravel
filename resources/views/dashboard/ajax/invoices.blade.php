@if (count($invoices))
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Amount</th>
            <th scope="col">Amount_ex_vat</th>
            <th scope="col">Amount_vat</th>
            <th scope="col">Currency</th>
            <th scope="col">Created</th>
            <th scope="col">Settled</th>
        </tr>
        </thead>
        <tbody>
        @foreach($invoices as $key => $invoice)
            <tr data-id="{{ $invoice['id'] }}" class="invoice-item">
                <td>{{$key+1}}</td>
                <td>{{$invoice['amount']}}</td>
                <td>{{$invoice['amount_ex_vat']}}</td>
                <td>{{$invoice['amount_vat']}}</td>
                <td>{{$invoice['currency']}}</td>
                <td>{{$invoice['created']}}</td>
                <td>{{$invoice['settled']}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@else
    <div class="dashboard-list">
        <div class="dashboard-message contact-2 bdr clearfix">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    {{ __('You currently have no active invoice') }}
                </div>
            </div>
        </div>
    </div>
@endif
<div class="modal fade" id="invoice-modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Detail Invoice</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tr>
                        <td>ID</td>
                        <td id="invoice_id"></td>
                    </tr>
                    <tr>
                        <td>Text</td>
                        <td id="invoice_text"></td>
                    </tr>
                    <tr>
                        <td>Amount</td>
                        <td id="invoice_amount"></td>
                    </tr>
                    <tr>
                        <td>Amount_ex_vat</td>
                        <td id="invoice_amount_ex_vat"></td>
                    </tr>
                    <tr>
                        <td>Amount_vat</td>
                        <td id="invoice_amount_vat"></td>
                    </tr>
                    <tr>
                        <td>Qunatity</td>
                        <td id="invoice_quantity"></td>
                    </tr>
                    <tr>
                        <td>Plan</td>
                        <td id="invoice_plan_id"></td>
                    </tr>
                    <tr>
                        <td>State</td>
                        <td id="invoice_state"></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

    $(document).ready(function () {
        var invoices = @json($invoices);
        $(".invoice-item").click(function() {
            var id = $(this).data('id');
            invoices.forEach((item) => {
                if (item.id = id) {
                    console.log(item);
                    $("#invoice_id").html(item.id);
                    $("#invoice_text").html(item.order_lines[0]['ordertext']);
                    $("#invoice_amount").html(item.amount);
                    $("#invoice_amount_ex_vat").html(item.amount_ex_vat);
                    $("#invoice_amount_vat").html(item.amount_vat);
                    $("#invoice_quantity").html(1);
                    $("#invoice_plan_id").html(item.plan);
                    $("#invoice_state").html(item.state);
                    $("#invoice-modal").modal("show");
                }
            });
            /*
            $.ajax({
                method: 'GET',
                url: '{{ route('ajax/getInvoice') }}',
                data: {id},
                success: function (data) {
                    console.log(data);
                }
            });
            */
        });
    });

</script>