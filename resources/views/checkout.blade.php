@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-75">
            <div class="container">
                <form action="{{route('buyNow')}}" method="post" id="checkout-form">
                    @csrf

                    <div class="row justify-content-center">

                        <div class="col-6">
                            <h3>Payment</h3>
                            <label for="card_name">Name on Card</label>
                            <input type="text" id="card_name" name="card_name" placeholder="John More Doe">
                            <label for="card_number">Credit card number</label>
                            <input type="text" id="card_number" name="card_number" placeholder="1111-2222-3333-4444">
                            <label for="exp_month">Exp Month</label>
                            <input type="text" id="exp_month" name="exp_month" placeholder="September">

                            <div class="row">
                                <div class="col-50">
                                    <label for="exp_year">Exp Year</label>
                                    <input type="text" id="exp_year" name="exp_year" placeholder="2018">
                                </div>
                                <div class="col-50">
                                    <label for="cvv">CVV</label>
                                    <input type="text" id="cvv" name="cvv" placeholder="352">
                                </div>
                            </div>
                        </div>
                       <div class="col-6">
                           <h3>Shipping</h3>
                           <div id="omniva_container2"><input type="text" name="omniva_selection_value1 "></div>

                       </div>
                        <h5>Your total: ${{$total}}</h5>


                    </div>

                    <button type="submit" class="btn btn-outline-primary check">Buy now</button>
                </form>

            </div>
        </div>


    </div>

    <script>
        var wd2 = new OmnivaWidget({

            compact_mode: true,		// Compact widget is not shown
            // If enabled only a dropdown with locations will be shown

            show_offices: false,	// Post offices will be shown
            // If disabled post offices will not be shown in the dropdown

            custom_html: false,         // Predefined HTML is activated
                                        // It is allowed to create a custom HTML                                // It will be included in the container

            id: 2,			// Will be added to the unique element ids if
            // there is a need to have more than one widget

            selection_value: '' // Preselected value. (case insensitive, will be trimmed) Can be empty or entirely omitted. Optional
        });
    </script>
@endsection
