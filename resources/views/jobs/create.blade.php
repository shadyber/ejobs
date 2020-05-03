<?php 
$page=new App\Page;
$page->title="Job";
$page->subtitle="New Job";
?>
@extends('layouts.app')
@section('content')
    
<section class="content">
 <form method="POST" action="{{ route('jobs.store') }}" id="createjob" enctype="multipart/form-data">
                        @csrf
     <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">General</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Project Title</label>
                <input type="text" id="title" name="title" class="form-control" require>
                 @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
              </div>
              <div class="form-group">
                <label for="inputDescription">Project Description</label>
                <textarea id="inputDescription" class="form-control" name="detail" rows="4" require></textarea>
                 @error('detail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
              </div>
              <div class="form-group">
                <label for="inputStatus">Project Category</label>
                <select class="form-control custom-select" name="job_category" require>
                  <option selected="" disabled="">Select one</option>
                  <option value="1">Category 1</option>
                  <option value="2">Category 2</option>
                  <option value="3">Category 4</option>
                </select>
                   @error('project_category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
              </div>
              <div class="form-group">
                <label for="inputClientCompany">Skill Required</label>
                <input type="text" id="required_skill" class="form-control" name="required_skill" require> 
                @error('skill_required')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
              </div>
              <div class="form-group">
                <label for="project_type">Project Type</label>
                 <select class="form-control custom-select" name="job_type">
                  <option selected="" disabled="">Select one</option>
                  <option>Bid</option>
                  <option>Contest</option> 
                </select>
                   @error('project_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-6">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Budget</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
                            </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="budget">Estimated budget</label>
                <input type="number" id="budget" name="budget" class="form-control" require> 
                 @error('budget')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
              </div>
              <div class="form-group">
                <label for="inputSpentBudget">Project Feature</label>
                 <select class="form-control custom-select" name="job_feature">
                  <option selected="" disabled="">Select one</option>
                  <option>Basic</option>
                  <option>Premium </option>
                  <option>Guaranteed</option>
                </select>
                   @error('project_feature')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
              </div>
              <div class="form-group">
                <label for="inputEstimatedDuration">Estimated project Deadline</label>
                <input type="date" id="deadline" name="deadline" class="form-control">
                   @error('deadline')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
              </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Attachment</label>
                    <div class="input-group">
                      <div class="custom-file"> 
                        <input type="file" class="custom-file-input" id="attachment">
                        <label class="custom-file-label" for="attachment">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        
                      </div>
                    </div>
                       @error('attachment')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                  </div>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <a href="#" class="btn btn-secondary">Cancel</a>
          <input type="submit" value="Create new Porject" class="btn btn-success float-right">
        </div>
      </div>

      </form>
    </section>
  @endsection