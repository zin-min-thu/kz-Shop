@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="{{URL::to('/dashboard')}}">Home</a>
        <i class="icon-angle-right"></i>
    </li>
    <li>
        <i class="icon-edit"></i>
        <a href="{{URL::to('/add-product')}}">Add Product</a>
    </li>
</ul>
@if(session('message'))
    <div class="alert alert-danger">
        <span>{{session('message')}}</span>
    </div>
    {{Session::put('message', null)}}
@endif
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product</h2>
        </div>
        <div class="box-content">
            <form class="form-horizontal" action="{{url('/save-product')}}" method="post" enctype='multipart/form-data'>
                {{csrf_field()}}
              <fieldset>
                <div class="control-group">
                  <label class="control-label" for="product-name" placeholder="product name">Product Name</label>
                  <div class="controls">
                    <input type="text" class="input-xlarge" name="product_name">
                  </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="selectError3">Product Category</label>
                    <div class="controls">
                        <select id="selectError3" name="category_id">
                            <?php $all_category = DB::table('tbl_category')->get();
                            foreach($all_category as $category) {
                                ?>
                            <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                            <?php }?>
                        </select>
                    </div>
				        </div>
                <div class="control-group">
                    <label class="control-label" for="selectError3">Manufacture Name</label>
                    <div class="controls">
                        <select id="selectError3" name="manufacture_id">
                            <?php $all_manufacture = DB::table('tbl_manufacture')->get();
                                foreach($all_manufacture as $manufacture) {
                            ?>
                                <option value="{{$manufacture->manufacture_id}}">{{$manufacture->manufacture_name}}</option>
                            <?php }?>
                        </select>
                    </div>
				        </div>
                <div class="control-group hidden-phone">
                  <label class="control-label" for="product-short-description">Product Short Description</label>
                  <div class="controls">
                    <textarea class="cleditor" name="product_short_description" rows="3"></textarea>
                  </div>
                </div>
                <div class="control-group hidden-phone">
                  <label class="control-label" for="product-long-description">Product Long Description</label>
                  <div class="controls">
                    <textarea class="cleditor" name="product_long_description" rows="3"></textarea>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="product-name" placeholder="product price">Product Price</label>
                  <div class="controls">
                    <input type="text" class="input-xlarge" name="product_price">
                  </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Image</label>
                    <div class="controls">
                        <input type="file" name="product_image">
                    </div>
				        </div>
                <div class="control-group">
                  <label class="control-label" for="product-name" placeholder="product size">Product Size</label>
                  <div class="controls">
                    <input type="text" class="input-xlarge" name="product_size">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="product-name" placeholder="product color">Product Color</label>
                  <div class="controls">
                    <input type="text" class="input-xlarge" name="product_color">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="product-publication-status">Publication Status</label>
                  <div class="controls">
                    <input type="checkbox" class="input-xlarge" name="publication_status" value="1">
                  </div>
                </div>
                <div class="form-actions">
                  <button type="submit" class="btn btn-primary">Add Product</button>
                  <button type="reset" class="btn">Cancel</button>
                </div>
              </fieldset>
            </form>

        </div>
    </div><!--/span-->

</div><!--/row-->
@endsection