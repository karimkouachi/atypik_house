@extends("layout")

@section('content')

<h1>Effectuer une réservation :</h1>

@if ($errors->any())
    <div>
      @foreach ($errors->all() as $error)
          <p class="alert alert-danger">{{ $error }}</p>
      @endforeach
    </div>
@endif

{!! Form::open(array('route' => ['storeReservation', $habitat->id], 'method' => 'POST', 'class' => 'form-horizontal')) !!}  
    <div class="form-group">
      {!! Form::label('date_debut_reservation', "Date de début :", ['class' => 'col-lg-2 control-label']) !!}
      <div class="col-lg-10">
        {!! Form::date('date_debut_reservation', \Carbon\Carbon::now('Europe/Paris'), ['class' => 'form-control']) !!}
      </div>
    </div>  
    <div class="form-group">
      {!! Form::label('date_fin_reservation', "Date de fin :", ['class' => 'col-lg-2 control-label']) !!}
      <div class="col-lg-10">
        {!! Form::date('date_fin_reservation', \Carbon\Carbon::now('Europe/Paris'), ['class' => 'form-control']) !!}
      </div>
    </div>  
    <div class="form-group">
      {!! Form::label('participants_reservation', "Nombre de participants :", ['class' => 'col-lg-2 control-label']) !!}
      <div class="col-lg-10">
        {!! Form::number('participants_reservation', 2, ['class' => 'form-control']) !!}
      </div>
    </div>
    {!! Form::hidden('habitat_id', $habitat->id) !!}
    
		
		<div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        {!! Form::submit('Étape : Paiement', array('class' => 'btn btn-lg btn-success pull-right')) !!}
      </div>
    </div>
{!! Form::close() !!}

<script src="https://www.paypalobjects.com/api/checkout.js"></script>

<div id="paypal-button"></div>
@endsection

@section('scripts')
    <script type="text/javascript">

      $(document).ready(function() {

        paypal.Button.render({
          env: 'sandbox',
          client: {
            sandbox: 'demo_sandbox_client_id'
          },
          style: {
            color: 'gold',   // 'gold, 'blue', 'silver', 'black'
            size:  'medium', // 'medium', 'small', 'large', 'responsive'
            shape: 'rect'    // 'rect', 'pill'
          },
          payment: function (data, actions) {
            return actions.payment.create({
              transactions: [{
                amount: {
                  total: '0.01',
                  currency: 'USD'/*,
                  details: {
                    subtotal: '30.00',
                    tax: '0.07',
                    shipping: '0.03',
                    handling_fee: '1.00',
                    shipping_discount: '-1.00',
                    insurance: '0.01'
                  }*/
                }/*,
                description: 'The payment transaction description.',
                custom: '90048630024435',
                //invoice_number: '12345', Insert a unique invoice number
                payment_options: {
                  allowed_payment_method: 'INSTANT_FUNDING_SOURCE'
                },*/
                /*item_list: {
                  items: [
                    {
                      name: 'hat',
                      description: 'Brown hat.',
                      quantity: '5',
                      price: '3',
                      tax: '0.01',
                      sku: '1',
                      currency: 'USD'
                    },
                    {
                      name: 'handbag',
                      description: 'Black handbag.',
                      quantity: '1',
                      price: '15',
                      tax: '0.02',
                      sku: 'product34',
                      currency: 'USD'
                    }
                  ],
                  shipping_address: {
                    recipient_name: 'Brian Robinson',
                    line1: '4th Floor',
                    line2: 'Unit #34',
                    city: 'San Jose',
                    country_code: 'US',
                    postal_code: '95131',
                    phone: '011862212345678',
                    state: 'CA'
                  }
                }*/
              }]/*,
              note_to_payer: 'Contact us for any questions on your order.'*/
            });
          },
          onAuthorize: function (data, actions) {
            return actions.payment.execute('/atypik_house_website/public/habitat/get_champs_categorie')
              .then(function () {
                window.alert('Thank you for your purchase!');
              });
          }
        }, '#paypal-button');


        /*paypal.Button.render({
          env: 'sandbox', // Or 'production'
          // Set up the payment:
          // 1. Add a payment callback
          payment: function(data, actions) {
            // 2. Make a request to your server
            return actions.request.post('/my-api/create-payment/')
              .then(function(res) {
                // 3. Return res.id from the response
                return res.id;
              });
          },
          // Execute the payment:
          // 1. Add an onAuthorize callback
          onAuthorize: function(data, actions) {
            // 2. Make a request to your server
            return actions.request.post('/my-api/execute-payment/', {
              paymentID: data.paymentID,
              payerID:   data.payerID
            })
              .then(function(res) {
                // 3. Show the buyer a confirmation message.
              });
          }
        }, '#paypal-button');*/


      });

    </script>
@endsection