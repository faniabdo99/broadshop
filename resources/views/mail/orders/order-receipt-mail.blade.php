@component('mail::message')
# Your Order Receipt From Broadshop
<p>Thank you for your order at UK Fashion Shop, Please find the order information below</p><br>
<p><b>Order Serial Number:</b> {{$EmailData->serial_number}}</p>
<p><b>Order Total: </b> {{$EmailData->total.getCurrency()['symbole']}}</p>
<p><b>Payment Method: </b> {{$EmailData->PaymentMethodText}}</p><br>
<h3>Your Order:</h3>
<table>
    <thead>
        <th>Product</th>
        <th>Quanitity</th>
        <th>Price</th>
        <th>Total</th>
    </thead>
    <tbody>
        @forelse($EmailData->Items() as $Item)
        @empty
        <tr>
            <td>{{$Item->Product->title}}</td>
            <td>{{$Item->qty}}</td>
            <td>{{$Item->Product->price}}</td>
            <td>{{($Item->Product->price * $Item->qty)}}</td>
        </tr>
        @endforelse
    </tbody>
</table>
<p>if you already have an account, you can view your orders from your account page at Broadshop.</p>
@component('mail::button', ['url' => 'https://broadshop.be'])
    Broadshop.be
@endcomponent

Thank You,<br>
Broadshop
@endcomponent
