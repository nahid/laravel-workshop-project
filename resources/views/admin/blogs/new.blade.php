@extends('admin.layouts.master', ['title'=>'New Blog'])
@section('content-header', 'New Blog')

@section('container')
     <div class="box">

          
            <div class="box-body pad">
                @if(count($errors->all())>0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                        <li>{{$err}}</li>
                    @endforeach
                </div>
                @endif

                @if(session('msg')=='success')
                    <div class="alert alert-success">
                        Successfully Saved
                    </div>
                @endif
              <form method="post" action="{{url('admin/blog/new')}}">
              <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control" id="title" placeholder="Enter title" name="title">
              </div>
              <div class="form-group">
                  <label for="title">Category</label>
                  <select class="form-control" name="category">
                      <option value="">Select Category</option>
                      @foreach($categories as $cat)
                          <option value="{{$cat->id}}">{{$cat->name}}</option>
                      @endforeach
                  </select>
              </div>
              <label>Blog</label>
                <textarea class="textarea" name="blog" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

            </div>

            <div class="box-footer">
                {{csrf_field()}}
                <button type="submit" class="btn btn-info pull-right">Publish</button>
              </div>
          </div>
     </form>
          @endsection
