@if ($subscriptions->count())
    @foreach($subscriptions as $subscription)
        <div class="dashboard-list">
            <div class="dashboard-message contact-2 bdr clearfix">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        {{ $subscription->subscription_id }}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@else
    <div class="dashboard-list">
        <div class="dashboard-message contact-2 bdr clearfix">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    {{ __('You currently have no active subscriptions') }}
                </div>
                <div class="col-lg-12 col-md-12">
                    <button id="payment-button" class="btn btn-theme btn-md">Subscribe for 239DKK</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function getSubscriptions() {
            $.ajax({
                method: 'GET',
                url: '{{ route('ajax/getSubscriptions/execute') }}',
                success: function (data) {
                    $(document).find('#ajaxSubscriptions').html(data);
                }
            });
        }

        $('#payment-button').click(function(e) {
            e.preventDefault();

            var rp = new Reepay.ModalCheckout('{{ $customerSession }}');

            console.log('{{$customerSession}}');

            rp.addEventHandler(Reepay.Event.Accept, function(data) {
                $.ajax({
                    method: 'POST',
                    url: '{{ route('ajax/customerHandler/add') }}',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'customerHandler' : data.customer,
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                    }
                });

                $.ajax({
                    method: 'POST',
                    url: '{{ route('ajax/paymentMethod/add') }}',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'paymentId' : data.payment_method,
                        'customerHandler' : data.customer
                    },
                    success: function (data) {
                        console.log(data);
                        getSubscriptions();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                    }
                });
            });
        });
    </script>
@endif
