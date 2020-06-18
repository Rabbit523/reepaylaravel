@if ($cards->count())
    @foreach($cards as $card)
        <div class="dashboard-list">
            <div class="dashboard-message contact-2 bdr clearfix">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        {{ $card->card_type }}
                        {{ $card->masked_card }}
                        {{ $card->exp_date }}
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
                    {{ __('You currently have no cards registered') }}
                </div>
            </div>
        </div>
    </div>
@endif
