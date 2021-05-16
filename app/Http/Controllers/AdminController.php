<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
class AdminController extends Controller{
    public function getHome(){
      $TotalProductsCount = Product::where('status' , 'Available')->count();
      $TotalOrdersCount = Order::count();
      $ThisMonthSales = Order::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)->sum('total_amount');
      $TotalUsersCount = User::count();
      $LatestOrders = Order::where('status' , 'Order received')->limit(10)->latest()->get();
      return view('admin.index' , compact('TotalProductsCount' , 'TotalUsersCount' , 'LatestOrders' , 'TotalOrdersCount' , 'ThisMonthSales'));
    }
}
