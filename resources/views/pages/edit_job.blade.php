@extends('layout')
@section('content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm sản phẩm
                </header>
                <div class="panel-body">
                <?php
                    $message = Session::get('message');
                    if($message){
                        echo '<span class="text-alert">',$message,'</span>';
                        Session::put('message',null);
                    }
                ?>
                    <div class="position-center">
                        <form role="form" method="post" action="{{URL::to('/update-job/'.$old_data['job_title'])}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tiêu đề công việc</label>
                            <input type="text" data-validation="length" data-validation-length="min3" data-validation-error-msg="Làm ơn điền ít nhất 3 kí tự " class="form-control" name="job_title" id="exampleInputEmail1" value="{{$old_data['job_title']}}" placeholder="Tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Deadline</label>
                            <input type="date" data-validation="length" data-validation-length="min10" data-validation-error-msg="Làm ơn điền số tiền" class="form-control" name="job_deadline" id="exampleInputEmail1" value="{{$old_data['job_deadline']}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả công việc</label>
                            <textarea style="resize: none" rows="5" class="form-control" id="ckeditor1" name="job_desc" placeholder="Mô tả danh mục">{{$old_data['job_desc']}}</textarea>
                        </div>
                        <button type="submit" name="update_job" class="btn btn-primaryinfo">Update công việc</button>
                    </form>
                    </div>

                </div>
            </section>
    </div>
</div>
@endsection