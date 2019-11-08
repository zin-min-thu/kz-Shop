@extends('layout')

@section('content')
<section id="cart_items">
		<div class="container">
			<div class="register-req">
				<p>Please fill this form-------</p>
			</div><!--/register-req-->
			@if (session('status'))
				<div class="alert alert-success">
					{{ session('status') }}
				</div>
			@endif
			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-12 clearfix">
						<div class="bill-to">
							<p>Shipping Details</p>
							<div class="form-one">
								<form action="{{url('save-shipping-details')}}" method="post">
									{{csrf_field()}}
									<input type="text" placeholder="Email*" name="shipping_email">
									<input type="text" placeholder="First Name *" name="shipping_first_name">
									<input type="text" placeholder="Last Name *" name="shipping_last_name">
									<input type="text" placeholder="Address *" name="shipping_address">
									<input type="text" placeholder="Mobile Number *" name="shipping_mobile_number">
                                    <input type="text" placeholder="City *" name="shipping_city">
									<button type="submit" class="btn btn-primary">Done</button>
								</form>
							</div>
						</div>
					</div>					
				</div>
			</div>
			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>
		</div>
	</section> <!--/#cart_items-->
@endsection