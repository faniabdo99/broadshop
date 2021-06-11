<div class="col-lg-3 col-12">
    <div class="user-profile-sidebar mb-5">
        <img src="{{auth()->user()->ProfileImage}}" alt="{{auth()->user()->name}}">
        <h2>
            {{auth()->user()->name}}
            <span>{{auth()->user()->email}}</span>
        </h2>
        <ul class="mt-4">
            <li><a href="{{route('user.getProfile')}}"><i class="fas fa-user"></i> My Profile</a></li>
            <li><a href="{{route('user.getOrders')}}"><i class="fas fa-shopping-cart"></i> My Orders</a></li>
            <li><a href="{{route('user.getEditProfile')}}"><i class="fas fa-edit"></i> Edit Profile</a></li>
            <li><a href="{{route('user.getEditPassword')}}"><i class="fas fa-lock"></i> Change Password</a></li>
            <li><a href="{{route('user.signout')}}"><i class="fas fa-sign-out-alt"></i> Signout</a></li>
        </ul>
    </div>
</div>