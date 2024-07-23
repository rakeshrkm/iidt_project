<html>
  <head>
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet"> --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payments details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
      body {
        text-align: center;
        padding: 40px 0;
       
      }
        h1 {
          color: #88B04B;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-weight: 900;
          font-size: 40px;
          margin-bottom: 10px;
        }
        p {
          color: #404F5E;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size:20px;
          margin: 0;
        }
      i {
        color: #9ABC66;
        font-size: 50px;
        line-height: 100px;
        margin-left:-15px;
      }
      .badrequest{
   
        color: #9ABC66;
        font-size: 50px;
        line-height: 100px;
        margin-left:0px
  
      }
      .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
        border: 1px solid;
      }

      .success{
        border-radius:200px; height:100px; width:100px; background: #F8FAF5; margin:0 auto;
      }

      .danger{
        border-radius:200px; height:100px; width:100px; background: #F8FAF5; margin:0 auto;
      }

      tr,td{
        border:1px solid;
      }
    </style>
  </head>
    <body>
      <div class="card">

        @if($payments->payment_status == 'SUCCESS')
        {{-- <div class="success" style="border: 1px solid red">
          <img src="public/assets/images/38991083.jpg">
        </div> --}}
          <h1>Success</h1> 
          <p>Your payment has been successfully Done.</p>
          <p>Your details is given below :</p>
          <div class="mt-3">
            <table class="table table-bordered">
              <tr>
                <th>Amount</th>
                <td>{{ ucfirst($payments->amount) }}</td>
              </tr>
    
              <tr>
                <th>Name</th>
                <td>{{ ucfirst($payments->name) }}</td>
              </tr>
              <tr>
                <th>Email</th>
                <td>{{ ucfirst($payments->email) }}</td>
              </tr>
              <tr>
                <th>Mobile</th>
                <td>{{ ucfirst($payments->mobile) }}</td>
              </tr>
              <tr>
                <th>Order Id</th>
                <td>{{ ucfirst($payments->order_id)}}</td>
              </tr>
              <tr>
                <th>Customer Id</th>
                <td>{{ ucfirst($payments->payment_gateway_order_id) }}</td>
              </tr>
            </table>
          </div>
        @else
          <div class="danger text-danger">
            <p class="checkmark text-danger badrequest" >x</p>
          </div>
          <h1 class="text-danger">{{$payments->status}}</h1> 
          {{-- <p class="text-danger">{{ $responseData->error_info->fields[0]->reason }}</p>
          {{-- <p class="text-danger">{{ $responseData->error_message }}</p> --}}
          {{-- <p class="text-danger">{{ $responseData->error_code }}</p> --}} --
          <p class="text-danger">Please try with valid data</p>
        @endif
        <a href="{{route('home')}}" class="btn btn-dark mt-2">Go to home </a>
      </div>
    </body>
</html>