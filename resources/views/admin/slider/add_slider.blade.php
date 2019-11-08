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
        <a href="{{URL::to('/add-slider')}}">Add Slider</a>
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
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Slider</h2>
        </div>
        <div class="box-content">
            <form class="form-horizontal" action="{{url('/save-slider')}}" method="post" enctype='multipart/form-data'>
                {{csrf_field()}}
              <fieldset>
                <div class="control-group">
                    <label class="control-label">Image</label>
                    <div class="controls">
                        <input type="file" name="slider_image">
                    </div>
				</div>
                <div class="control-group">
                  <label class="control-label" for="slider-publication-status">Publication Status</label>
                  <div class="controls">
                    <input type="checkbox" class="input-xlarge" name="publication_status" value="1">
                  </div>
                </div>
                <div class="form-actions">
                  <button type="submit" class="btn btn-primary">Add Slider</button>
                  <button type="reset" class="btn">Cancel</button>
                </div>
              </fieldset>
            </form>

        </div>
    </div><!--/span-->

</div><!--/row-->
@endsection