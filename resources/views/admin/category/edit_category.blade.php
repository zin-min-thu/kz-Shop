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
        <a href="#">Update Category</a>
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
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Update Category</h2>
        </div>
        <div class="box-content">
            <form class="form-horizontal" action="{{url('/update-category/'.$category->category_id)}}" method="post">
                {{csrf_field()}}
              <fieldset>
                <div class="control-group">
                  <label class="control-label" for="category-name">Category Name</label>
                  <div class="controls">
                    <input type="text" class="input-xlarge" name="category_name" value="{{$category->category_name}}">
                  </div>
                </div>
                <div class="control-group hidden-phone">
                  <label class="control-label" for="category-description">Category Description</label>
                  <div class="controls">
                    <textarea class="cleditor" name="category_description" rows="3">{{$category->category_description}}</textarea>
                  </div>
                </div>
                <div class="form-actions">
                  <button type="submit" class="btn btn-primary">Update Category</button>
                  <button type="reset" class="btn">Cancel</button>
                </div>
              </fieldset>
            </form>

        </div>
    </div><!--/span-->

</div><!--/row-->
@endsection