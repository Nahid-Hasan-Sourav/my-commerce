@extends('website.master')

@section('tittle')
Dashboard Page
@endsection

@section('body')
<section class="checkout-wrapper section">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card card-body">
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                          Dashboard
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">Profile</a>
                        <a href="#" class="list-group-item list-group-item-action">Order</a>
                        <a href="#" class="list-group-item list-group-item-action">Account</a>
                        <a href="#" class="list-group-item list-group-item-action disabled" tabindex="-1" aria-disabled="true">Change Password</a>
                      </div>
                  </div>
            </div>

            <div class="col-md-9">
                <div class="card">          
                    <div class="card-body">
                       <h1>This is Dash Board</h1>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>
@endsection