@extends('layout')

@section('content')
<section id="cart_items">
	<div class="container col-sm-12">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li class="active">Payment</li>
			</ol>
		</div>
		<div class="table-responsive cart_info">
			<table class="table table-condensed">
				<thead>
					<tr class="cart_menu">
						<td class="image">Image</td>
						<td class="description">Name</td>
						<td class="price">Price</td>
						<td class="quantity">Quantity</td>
						<td class="total">Total</td>
						<td>Action</td>
					</tr>
				</thead>
				<tbody>
					@foreach($contents as $content)
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{URL::to($content->options->image)}}" style="width: 80px; height: 80px;" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$content->name}}</a></h4>
							</td>
							<td class="cart_price">
								<p> {{$content->price}} Kyats</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<form action="{{url('update-to-cart')}}" method="post">
										{{csrf_field()}}
										<input type="hidden" name="rowId" value="{{$content->rowId}}">
										<input class="cart_quantity_input" type="text" name="qty" value="{{$content->qty}}" autocomplete="off" size="2">
										<input type="submit" class="btn btn-sm btn-default" value="Update">
									</form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{$content->total}}</p>
							</td>
							<td class="cart_delete">
								<a title="Click to remove from cart" class="cart_quantity_delete" href="{{url('delete-to-cart/'.$content->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		{{--2c2p to create new account--}}
		<span style="font-size: 12px; color: gray;" class="text-muted">Select Payment Type Here</span>
		<form action="{{url('order-place')}}" class="form-inline" method="post">
			{{csrf_field()}}
			<div class="input-group">
			<select name="payment_method" id="pay-rule" class="form-control">
				<option selected disabled>select a payment</option>
				<option value="hand_cash">Hand Cash</option>
				<option value="debit_cash">Debit Cash</option>
				<option value="paypal">Paypal</option>
			</select>
			<input type="submit" value="Done" class="btn btn-info">
			</div>
		</form>
	</div>
</section> <!--/#cart_items-->
@endsection
