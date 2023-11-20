@extends('website.master')

@section('title')
   Login Page
@endsection

@section('body')
<section class="checkout-wrapper section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{route('customer.login')}}" class="checkout-steps-form-style-1">
                            @csrf
                    
                                <div class="">
                                 <div class="single-form form-default">
                                     <label>Email Address</label>
                                     <div class=" form-input form">
                                         <input type="email" class="max-w-md" required name="email" placeholder="Email">
                                     </div>
                                 </div>
                                </div>
        
                                <div class="">
                                 <div class="single-form form-default">
                                     <label>Password</label>
                                     <div class=" form-input form">
                                         <input type="tel" class="w-100" name="mobile" placeholder="Password">
                                     </div>
                                 </div>
                                </div>
                                <div class="mt-3">
                                   <button type="submit" class="btn btn-primary">Login</button>    
                                </div>                               
                         </form>
                         
                    </div>
                  </div>
              
            </div>

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h2>Registration Form</h2>
                    </div>
                    <div class="card-body">
                        <section class="checkout-wrapper section" style="padding-top: 0px">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="">
                                        <div class="checkout-steps-form-style-1">
                                                 <form method="POST" action="{{ route('new.cash.order') }}">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                         <div class="single-form form-default">
                                                             <label>Full Name</label>
                                                             <div class="col-md-12 form-input form">
                                                                 <input type="text" required name="name" placeholder="Full Name">
                                                             </div>
                                                         </div>
                                                        </div>
                     
                                                        <div class="col-md-6">
                                                         <div class="single-form form-default">
                                                             <label>Email Address</label>
                                                             <div class="col-md-12 form-input form">
                                                                 <input type="email" required name="email" placeholder="Email">
                                                             </div>
                                                         </div>
                                                        </div>
                     
                                                        <div class="col-md-6">
                                                         <div class="single-form form-default">
                                                             <label>Phone Number</label>
                                                             <div class="col-md-12 form-input form">
                                                                 <input type="tel" name="mobile" placeholder="Number">
                                                             </div>
                                                         </div>
                                                        </div>
                     
                                                        <div class="col-md-12">
                                                         <div class="single-form form-default">
                                                             <label>Password</label>
                                                             <div class="col-md-12 form-input form">
                                                                 <input type="password" name="password" placeholder="password">
                                                             </div>
                                                         </div>
                                                        </div>
        
                                                      <div class="col-md-12">
                                                         <div class="single-form button">
                                                             <button type="submit" class="btn">
                                                                 Register
                                                             </button>
                                                         </div>
                                                      </div>
                                                     </div>
                                                 </form>
                                                                            
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>
@endsection