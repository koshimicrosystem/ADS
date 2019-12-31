@extends('layouts.home')
@section('title','DashBoard')

@section('meta')
    
@endsection
@section('style1')
    
@endsection
@section('style2')
    
@endsection
@section('script1')
    
@endsection
@section('script2')
    
@endsection
@section('body')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4 class="m-0 text-dark">Dashboard v2</h4>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v2</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <router-view></router-view>
    </div>
    <!--/. container-fluid -->
  </section>
@endsection