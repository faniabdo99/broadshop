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
                <img width="170" height="100" src="/public/img/logo.png" />
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
                <h4>GLOBALE TRADING</h4>
                <p class="mb-0">CHAUSSÉE DE JETTE 324</p>
                <p class="mb-0">1081 KOEKELBERG</p>
                <p class="mb-0">België</p>
                <p class="mb-0">BE0827774244</p>
                <p class="mb-0">+32 52 20 10 18</p>
                <p class="mb-0">www.ukfashionshop.be</p>
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
                        <td style="color:#333;padding:10px;font-weight:bold;">Total Weight</td>
                        <td style="color:#333;padding:10px;font-weight:bold;">Total Price</td>
                        <td style="color:#333;padding:10px;font-weight:bold;">Tax Rat</td>
                    </tr>
                    <tbody>
                        @foreach ($TheOrder->Items() as $Item)
                        <tr>
                            <td class="item-name">{{$Item->Product->title}}</td>
                            <td>{{formatPrice($Item->Product->price)}} €</td>
                            <td>{{$Item->qty}}</td>
                            <td>{{$Item->qty * $Item->Product->weight}} KG</td>
                            <td>{{formatPrice($Item->qty * $Item->Product->price)}} €</td>
                            <td>{{$Item->Product->tax_rate * 100}}%</td>
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
                            <td style="color:#333;padding:10px;font-weight:bold;">Discounts</td>
                            <td style="color:#333;padding:10px;font-weight:bold;">Shipping Cost</td>
                            <td style="color:#333;padding:10px;font-weight:bold;">Tax Excluded</td>
                            <td style="color:#333;padding:10px;font-weight:bold;">Tax</td>
                        </tr>
                        <tr>
                            <td>120.00€</td>
                            <td>{{formatPrice($TheOrder->totalShipping)}} €</td>
                            <td>{{formatPrice($TheOrder->total)}} €</td>
                            <td>{{formatPrice($TheOrder->total_tax)}} €</td>
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
          <div class="row">
            <div class="col-12 mt-5" style="width: 100%;">
                <p><b class="text-dark">GENERAL</b><br>
                    Art.1 These terms and conditions apply to any sale agreement by a visitor to this site, hereinafter
                    "customer", concluded with Broadshop,
                    GLOBALE TRADING private company with limited liability. Company number: BE0827774244. These terms
                    and conditions take precedence over all
                    other terms and conditions of the customer. Additional conditions are excluded from the customer,
                    unless the prior, written and expressly
                    accepted by us.
                </p>
                <p><b class="text-dark">ORDER</b><br>
                    Art.2 An agreement is validly established by the electronic transmission of the order by clicking
                    the hyperlink "agreement for this order", or by
                    sending an email which implies an order.
                </p>
                <p><b class="text-dark">LIABILITY</b><br>
                    Art.3 Despite our model contracts are carefully edited by us, it is possible that, because of the
                    nature of the product, a standard contract
                    purchased by you not completely meet your needs or is not specifically tailored to your situation.
                    In this case we disclaim any liability to us and
                    please note that you bear full responsibility for the use of these model contracts.
                </p>
                <p><b class="text-dark">RIGHT OF WITHDRAWAL</b><br>
                    Art.4 The nature of the model sold contracts follows that they can not be returned so you according
                    to Art. 80 §4, 2 ° Act does not on commercial
                    and consumer information about a withdrawal. Each sale-purchase is from the conclusion of the
                    agreement final and not subject to any reflection
                    period.
                </p>
                <p><b class="text-dark">PAYMENT</b><br>
                    Art.5 Payment is always done electronically via credit card or bank transfer. Each order is payable
                    immediately at the time of concluding the
                    contract. When paying by bank transfer you will receive the ordered products only after receipt of
                    the sum due.
                    <br>
                    <b style="margin-right:40px;">BENEFICIARY</b> Globale trading<br>
                    <b style="margin-right:40px;">IBAN</b> BE76 1431 0026 8395<br>
                    <b style="margin-right:40px;">BIC</b> GEBABEBB<br>
                </p>
                <p><b class="text-dark">IMPLEMENTATION</b><br>
                    Art.6 The implementation of the agreement normally occurs almost immediately after payment via
                    credit card or confirmation of payment by bank
                    transfer or Paypal. But any delay in the implementation where appropriate, draw no right to
                    compensation. In case of payment by bank transfer,
                    the delivery of the ordered products within five working days after crediting our account. In this
                    case, any delay in the execution not entitled to
                    compensation.
                </p>
                <p><b class="text-dark">DISPUTES</b><br>
                    Art.7 Any disputes arising from this agreement are governed by Belgian law. For all disputes arising
                    from this agreement, the Court of the District
                    of Oudenaarde jurisdiction.
                </p>
                <p><b class="text-dark">BINDING</b><br>
                    Art.8 At each electronic order products customer specifically states its agreement with these terms
                    and conditions by checking the checkbox "I
                    agree". An electronic order without these is its agreement, subject to deceit, technically
                    impossible that these conditions are still binding on the
                    part of the customer.
                </p>
                @if($TheInvoice->customer_desc)
                  <p><b class="text-dark">ADDITIONAL NOTES</b><br>
                      {{$TheInvoice->customer_desc}}
                  </p>
                @endif
            </div>
          </div>

</body>
</html>
