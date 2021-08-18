@extends('frontend.layouts.master')

@section('title','Checkout')

@section('body')

<div id="container">
    <div class="container">
      <!-- Breadcrumb Start-->
      <ul class="breadcrumb">
        <li><a href=""><i class="fa fa-home"></i></a></li>
        <li><a href="">Shopping Cart</a></li>
        <li><a href="">Checkout</a></li>
      </ul>
      <!-- Breadcrumb End-->
      <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-12">
          <h1 class="title">Checkout</h1>
          <div class="row">
            <div class="col-sm-4">
              @if(Auth::user()==null)
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title"><i class="fa fa-sign-in"></i> Create an Account or Login</h4>
                </div>
                  <div class="panel-body">
                        <div class="radio">
                          <label>
                            <input type="radio" value="register" checked="checked" name="account">
                            Register Account</label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio" value="1" id="user_account" name="account">
                            Already Registered</label>
                        </div>
                  </div>
              </div>
              @else
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title"><i class="fa fa-sign-in"></i> Ready to checkout</h4>
                </div>
              </div>
              @endif

            </div>

            <form action="{{url('web/checkout')}}" method="post">
            @csrf
            <div class="col-sm-8">
             <div class="row">
              @if(Auth::user()==null)
              <div class="col-sm-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title"><i class="fa fa-user"></i> Customer Infomration</h4>
                </div>
                  <div class="panel-body">
                        <fieldset id="account">
                          <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group required">
                                <label for="input-payment-firstname" class="control-label">Name</label>
                                <input type="text" class="form-control" id="input-payment-firstname" placeholder="Name" value="" name="name" required>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group required">
                                <label for="input-payment-email" class="control-label">E-Mail</label>
                                <input type="text" class="form-control" id="input-payment-email" placeholder="E-Mail" value="" name="email" required>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group required">
                                <label for="input-payment-telephone" class="control-label">Phone Number</label>
                                <input type="text" class="form-control" id="input-payment-telephone" placeholder="Phone Number" value="" name="mobile_no" required>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group required">
                                <label for="input-payment-password" class="control-label">Password</label>
                                <input type="password" class="form-control" id="input-payment-telephone" placeholder="Password" value="" name="password" required>
                              </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group required">
                                  <label for="input-payment-address-1" class="control-label">Address</label>
                                  <textarea rows="1" class="form-control" id="address_billing" name="address_billing"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group required">
                                  <label for="input-payment-city-1" class="control-label">City</label>
                                  <input type="text" class="form-control" id="input-payment-city-1" placeholder="City" value="" name="city_billing">
                                </div>
                            </div>
                          </div>
                        </fieldset>
                      </div>
                  </div>
                 </div>
                 @endif
                 <div class="col-sm-6">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title"><i class="fa fa-credit-card"></i> Payment Method</h4>
                    </div>
                      <div class="panel-body">
                        <p>Select a payment method</p>

                        @foreach($frontend_payment_methods as $data)
                        <div class="radio">
                          <label>
                            <input type="radio" name="payment_method" value="{{$data->name}}">
                            {{$data->name}}</label>
                        </div>
                        @endforeach
                      </div>
                   </div>
                  </div>
               
                  <div class="col-sm-6"> 
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title"><i class="fa fa-pencil"></i> Add Comments About Your Order</h4>
                      </div>
                        <div class="panel-body">
                          <textarea rows="4" class="form-control" id="confirm_comment" name="comments"></textarea>
                          <br>
                          <!-- <label class="control-label" for="confirm_agree">
                            <input type="checkbox" checked="checked" value="1" required="" class="validate required" id="confirm_agree" name="confirm agree">
                            <span>I have read and agree to the <a class="agree" href="#"><b>Terms &amp; Conditions</b></a></span> </label> -->
                        </div>
                    </div>
                  </div>
                  <div class="col-sm-12">
                      <div class="buttons">
                        <div class="pull-right">
                          <input type="submit" class="btn btn-primary" id="button-confirm" value="Confirm Order">
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
            </form>
            <div class="col-sm-8">
              <div class="row">
                <!-- <div class="col-sm-6">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title"><i class="fa fa-truck"></i> Delivery Method</h4>
                    </div>
                      <div class="panel-body">
                        <p>Please select the preferred shipping method to use on this order.</p>
                        <div class="radio">
                          <label>
                            <input type="radio" checked="checked" name="Free Shipping">
                            Free Shipping - $0.00</label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio" name="Flat Shipping Rate">
                            Flat Shipping Rate - $8.00</label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio" name="Per Item Shipping Rate">
                            Per Item Shipping Rate - $150.00</label>
                        </div>
                      </div>
                  </div>
                </div> -->
                
                <!-- <div class="col-sm-12">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title"><i class="fa fa-ticket"></i> Use Coupon Code</h4>
                    </div>
                      <div class="panel-body">
                        <label for="input-coupon" class="col-sm-3 control-label">Enter coupon code</label>
                        <div class="input-group">
                          <input type="text" class="form-control" id="input-coupon" placeholder="Enter your coupon here" value="" name="coupon">
                          <span class="input-group-btn">
                          <input type="button" class="btn btn-primary" data-loading-text="Loading..." id="button-coupon" value="Apply Coupon">
                          </span></div>
                      </div>
                  </div>
                </div> -->
                <!-- <div class="col-sm-12">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title"><i class="fa fa-gift"></i> Use Gift Voucher</h4>
                    </div>
                      <div class="panel-body">
                        <label for="input-voucher" class="col-sm-3 control-label">Enter gift voucher code</label>
                        <div class="input-group">
                          <input type="text" class="form-control" id="input-voucher" placeholder="Enter your gift voucher code here" value="" name="voucher">
                          <span class="input-group-btn">
                          <input type="submit" class="btn btn-primary" data-loading-text="Loading..." id="button-voucher" value="Apply Voucher">
                          </span> </div>
                      </div>
                  </div>
                </div> -->
              </div>
            </div>
          </div>
        </div>
        <!--Middle Part End -->
      </div>
    </div>
  </div>
@endsection

@section('script')

<script>
  $("#user_account").change(function() {
    window.location.href = "{{url('/login')}}"; 
  });

  $("#shipping_address").change(function() {
      shippingAddressChangeDetector(this.checked);
  });

  function shippingAddressChangeDetector(flag){
        if(flag){
            $('.delivery-address').addClass('hidden');
        }
        else{
            $('.delivery-address').removeClass('hidden');
        }
    }
  
</script>
@endsection