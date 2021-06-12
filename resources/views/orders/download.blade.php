<html>
<head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css2?family=Mulish&family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{url('public/css')}}/print.css">
    <style>
        body{
            font-family: 'Poppins' , sans-serif;
            font-size: 0.8em;
        }
        .full-width-container{
            width: 100%;
            margin-bottom: 20px;
        }
        .half-width{
            width: 50%;
            display: block;
            float: left;
        }
        .table{
            border:1px solid #ccc;
            width: 100%;
        }
        .mb-0{
            margin-bottom: 0 !important;
            margin-top: 0 !important;
        }
        td{
            border: 0.5px solid #ccc;
            padding:5px;
            text-align: center;
        }
        td.item-name{
          text-align: left;
        }
        .invoice-data td{
          text-align: left;
        }
    </style>
</head>

<body>
        <div class="full-width-container">
            <div class="half-width">
                <img width="170" height="100" src="/public/images/logo3.png" />
            </div>
            <div class="half-width">
                <table class="table border invoice-data" cellspacing="0">
                    <tbody>
                        <tr class="bg-secondary text-white">
                            <td>Invoice:</td>
                            <td>{{$TheInvoice->invoice_prefix . $TheInvoice->id}}</td>
                        </tr>
                        <tr>
                            <td>Date:</td>
                            <td>{{$TheInvoice->created_at->format('Y-m-d')}}</td>
                        </tr>
                        <tr>
                            <td>Customer:</td>
                            <td>{{$TheInvoice->customer_name}}</td>
                        </tr>
                        <tr>
                            <td>Order Reference:</td>
                            <td>{{$TheInvoice->order_serial_number}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="full-width-container smaller-font">
            <div class="half-width">
                <h4>Broadshop</h4>
                <p class="mb-0">Lange beeldekensstraat 103</p>
                <p class="mb-0">Antwerpen 2060</p>
                <p class="mb-0">België</p>
                <p class="mb-0">BE0827774244</p>
                <p class="mb-0">+32 488 19 88 10</p>
                <p class="mb-0">broadshop.be</p>
            </div>
            <div class="half-width">
                <h4>{{$TheInvoice->customer_name}}</h4>
                <p class="mb-0">{{$TheInvoice->address}}</p>
                <p class="mb-0">{{$TheInvoice->city}}</p>
                <p class="mb-0">{{getCountryNameFromISO($TheInvoice->country)}}</p>
                <p class="mb-0">{{$TheInvoice->vat_number}}</p>
                <p class="mb-0">{{$TheInvoice->phone_number}}</p>
                <p class="mb-0">{{$TheInvoice->email}}</p>
            </div>
        </div>
        <div class="row mt-5" style="height:1200px;">
            <div class="col-12 mb-5">
                <table class="table" cellspacing="0">
                    <tr class="table-head">
                        <td style="color:#333;padding:10px;font-weight:bold;">Item</td>
                        <td style="color:#333;padding:10px;font-weight:bold;">Unit Price</td>
                        <td style="color:#333;padding:10px;font-weight:bold;">Amount</td>
                        <td style="color:#333;padding:10px;font-weight:bold;">Total Price</td>
                    </tr>
                    <tbody>
                        @foreach ($TheOrder->Items() as $Item)
                        <tr>
                            <td class="item-name">{{$Item->Product->title}}</td>
                            <td>{{formatPrice($Item->Product->price)}} €</td>
                            <td>{{$Item->qty}}</td>
                            <td>{{formatPrice($Item->qty * $Item->Product->price)}} €</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <br>
            <h4>Invoice Summary:</h4>
            <div style="width: 70%;display:block;float:left;">
                <table class="table border" cellspacing="0">
                    <tbody>
                        <tr>
                            <td style="color:#333;padding:10px;font-weight:bold;">Shipping Cost</td>
                            <td style="color:#333;padding:10px;font-weight:bold;">Tax Excluded</td>
                            <td style="color:#333;padding:10px;font-weight:bold;">Tax</td>
                        </tr>
                        <tr>
                            <td>{{formatPrice($TheOrder->totalShipping)}} €</td>
                            <td>{{formatPrice($TheOrder->total)}} €</td>
                            <td>{{formatPrice(($TheOrder->total * 0.21))}} €</td>
                        </tr>
                    </tbody>
                </table>
                <br>
                @if($TheInvoice->due_date)
                <p class="mb-0">Due Date : {{$TheInvoice->due_date->format('d-m-Y')}}</p>
                @endif
                <p>The customer agrees to the terms and conditions on page 2 of this invoice.</p>
            </div>
            <div style="width:25%;display:block;float: right;">
                @if($TheOrder->is_paid == 'paid' || $TheInvoice->is_paid)
                <h2 class="mb-0" style="color:#4ec74e;">Paid</h2>
                <p class="mb-0">{{$TheInvoice->payment_method_data['name']}}</p>
                @else
                <h2 class="mb-0" style="color:#a53131;">Not Paid</h2>
                @endif
                <div class="border p-2">Total : {{formatPrice($TheOrder->final_total)}} €</div>
            </div>
        </div>
</body>
</html>
