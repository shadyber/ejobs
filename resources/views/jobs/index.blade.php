<?php 
$page=new App\Page;
$page->title="Job";
$page->subtitle="All Job";
?>
@extends('layouts.app')
@section('content')
 
            {{ $jobs->links() }}
            <hr>
            <div class="row">
       @foreach($jobs as $job) 
  <!-- Default box -->
     <div class="col-md-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{$job->title}}</h5>
               <p class="card-text">  <span>
<img src="/storage/avatars/1_avatar1588323839.jpg" width="128" alt=""></span>
               
                {{$job->detail}}
                </p>

                <a href="/jobs/{{$job->id}}" class="card-link">Show</a>
                <a href="#" class="card-link">Apply</a>
              </div>
            </div>

            
          </div>
      <!-- /.card -->
 
   @endforeach

   </div>
<hr>
            {{ $jobs->links() }}
  @endsection