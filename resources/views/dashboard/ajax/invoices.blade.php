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
<script type="text/javascript">

    $(document).ready(function () {
        $(".invoice-item").click(function() {
            var id = $(this).data('id');
            window.location = '/dashboard/profile/invoice/' + id;
        });
    });

</script>