<?php
use Illuminate\Support\Facades\Cookie;
use App\Models\Cart;
use Carbon\Carbon;
function getShippingValue($OrderTotal = null){
  if($OrderTotal){
    if($OrderTotal > 50){
      return 0;
    }else{
      return 0;
    }
  }else{
    return 0;
  }
}
function getUserId(){
  if(auth()->check()){
    return auth()->user()->id;
  }else{
    if(Cookie::has('guest_id')){
    }else{
      Cookie::queue(Cookie::make('guest_id', md5(rand(1,500))));
    }
    //Get the cookie value
    return Cookie::get('guest_id');
  }
}
function userCart(){
  return Cart::where('user_id' , getUserId())->where('status' , 'active')->whereDate('created_at' , Carbon::today())->get();
}
function userCartTotal(){
  $Total = 0;
  foreach(userCart() as $Single){
    $Total += $Single->TotalPrice;
  }
  return $Total;
}
function formatPrice($amount){
  return  sprintf("%.2f",$amount);
}
function getCountryNameFromISO($ISO = null){
  if($ISO){
    $CountrCodeName= [
      "GB" =>' United Kingdom',"GE" => "Georgia",
      "AL" => 'Albania',"AD" => 'Andorra',
      "AT" => 'Austria',"BY" => 'Belarus',
      "BE" => 'Belgium',"BA" => 'Bosnia and Herzegovina',
      "BG" => 'Bulgaria',"HR" => 'Croatia',
      "CY" => 'Cyprus',"CZ" => 'Czech Republic',
      "FR" => 'France',"GI" => 'Gibraltar',
      "DE" => 'Germany',"GR" => 'Greece',
      "VA" => 'Holy See (Vatican City State)',"HU" => 'Hungary',
      "IT" => 'Italy',"LI" => 'Liechtenstein',
      "LU" => 'Luxembourg',"MK" => 'Macedonia',
      "MT" => 'Malta',"MD" => 'Moldova',
      "MC" => 'Monaco',"ME" => 'Montenegro',"NL" => 'Netherlands',"PL" => 'Poland',"PT" => 'Portugal',"RO" => 'Romania',"SM" => 'San Marino',"RS" => 'Serbia',"SK" => 'Slovakia',"SI" => 'Slovenia',"ES" => "Spain","UA" => "Ukraine","DK" => "Denmark","EE" => "Estonia","FO" => "Faroe Islands","FI" => "Finland","GL" => "Greenland","IS" => "Iceland","IE" => "Ireland","LV" => "Latvia","LT" => "Lithuania","NO" => "Norway","SJ" => "Svalbard and Jan Mayen Islands","SE" => "Sweden","CH" => "Switzerland","TR" => "Turkey"];
    return $CountrCodeName[$ISO];
  }else{
    return null;
  }

}
function getCurrency(){
  if(session()->has('currency')){
    if(session()->get('currency') == 'EUR'){
      $CurrencySymbole = '€';
      $CurrencyCode = 'EUR';
    }elseif(session()->get('currency') == 'GBP'){
      $CurrencySymbole = '£';
      $CurrencyCode = 'GBP';
    }
  }else{
    $CurrencySymbole = '€';
    $CurrencyCode = 'EUR';
  }
  return ['symbole' => $CurrencySymbole,'code' => $CurrencyCode];
}
function convertCurrency($amount , $from , $to){
  //Check Old Data
  if($to == 'EUR'){
    return $amount;
  }
  if(Cookie::get('exchange_rate')){
    return sprintf("%.2f",$amount * Cookie::get('exchange_rate'));
  }else{
    $client = new GuzzleHttp\Client();
    $res = $client->get('http://data.fixer.io/api/latest?access_key=c7e1f33c4184fbb2083a1ae5364f9da6&base='.$from.'&symbols='.$to);
    if($res->getStatusCode() != 200){
      return "Error !" . $res->getStatusCode();
    }
    $ResponseAsArray = json_decode($res->getBody(), true);
    cookie()->queue(cookie()->make('exchange_rate', $ResponseAsArray['rates']['GBP'] , 60));
    return sprintf("%.2f",$amount *  $ResponseAsArray['rates']['GBP']);
  }
}
function changeDateFormate($date,$date_format){
    return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format($date_format);
}
function productImagePath($image_name){
    return public_path('images/products/'.$image_name);
}
function getPaymentMethods($PickUpStore = null , $order_payment = null){
  if($PickUpStore == 'yes'){
    $PaymentMethods = App\Payment_Method::where('code_name' ,'!=' , 'paymentoncollection')->latest()->get();
  }else{
    $PaymentMethods = App\Payment_Method::latest()->get();
  }
  foreach($PaymentMethods as $Single){
    $PercentagFee = ($Single->percentage_fee == 1) ? '-' : $Single->percentage_fee;
    $FixedFee = ($Single->fixed_fee == 0) ? '-' : $Single->fixed_fee;
    echo '<option'; ?> <?php if($order_payment == $Single->code_name){echo 'selected';} echo' value="'.$Single->code_name.'">'.$Single->name.' ('.$PercentagFee.'%) + ('.$FixedFee.'€)</option>';
  }
}
