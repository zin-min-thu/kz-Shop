@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="{{URL::to('/dashboard')}}">Home</a>
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="{{URL::to('/all-category')}}">All Category</a></li>
</ul>
@if(session('message'))
    <div class='alert alert-success'>{{session('message')}}</div>
    {{Session::put('message', null)}}
@endif
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>List Category</h2>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
              <thead>
                  <tr>
                      <th>#</th>
                      <th>Category Name</th>
                      <th>Description</th>
                      <th>Status</th>
                      <th>Actions</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{$category->category_id}}</td>
                    <td class="center">{{$category->category_name}}</td>
                    <td class="center">{{$category->category_description}}</td>
                    <td class="center">
                        @if($category->publication_status == 1)
                            <span class="label label-success">Active</span>
                        @else
                         <span class="label label-danger">Unactive</span>
                        @endif
                    </td>
                    <td class="center">
                        @if($category->publication_status == 1)
                            <a class="btn btn-danger" title="Click to Unactive" href="{{url('/unactive-category/'.$category->category_id)}}">
                                <i class="halflings-icon white thumbs-down"></i>
                            </a>
                        @else
                            <a class="btn btn-success" title="Click to Active" href="{{url('/active-category/'.$category->category_id)}}">
                                <i class="halflings-icon white thumbs-up"></i>
                            </a>
                        @endif
                        <a class="btn btn-info" href="{{url('/edit-category/'.$category->category_id)}}">
                            <i class="halflings-icon white edit"></i>
                        </a>
                        <a class="btn btn-danger" href="{{url('/delete-category/'.$category->category_id)}}" id="delete">
                            <i class="halflings-icon white trash"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
              </tbody>
          </table>
        </div>
    </div><!--/span-->

</div><!--/row-->
@endsection
