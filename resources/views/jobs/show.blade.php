<?php 
$page=new App\Page;
$page->title="Job";
$page->subtitle="Show Job";
?>
@extends('layouts.app')
@section('content')
   
 <div class="container-fluid">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">{{$job->title}}</h3>
          </div> <!-- /.card-body -->
          <div class="card-body">
            <p>{{$job->detail}}
            </p>
            <strong></strong>
            <div>
              Required Skill :<a href="#">  </a><br>
             Job Type :<a href="#"> </a><br>
              Job Category :<a href="#"> </a><br>
             Budget  :<a href="#"> </a><br>
             Employer  :<a href="#"> {{$employer->name}}</a>  <br>


            </div>
          </div><!-- /.card-body -->
          <div class="card-footer">
          <a href="/jobapplication" class="btn btn-default">Apply This Job</a>
          
          </div>
        </div>
      </div>
  
  @endsection