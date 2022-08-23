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
                        <form role="form" method="post" action="{{URL::to('/save-job')}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tiêu đề công việc</label>
                            <input type="text" data-validation="length" data-validation-length="min3" data-validation-error-msg="Làm ơn điền ít nhất 3 kí tự " class="form-control" name="job_title" id="exampleInputEmail1" placeholder="Tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Deadline</label>
                            <input type="date" data-validation="length" data-validation-length="min10" data-validation-error-msg="Làm ơn điền số tiền" class="form-control" name="job_deadline" id="exampleInputEmail1" placeholder="Tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả công việc</label>
                            <textarea style="resize: none" rows="5" class="form-control" id="ckeditor1" name="job_desc" placeholder="Mô tả danh mục"></textarea>
                        </div>
                        <div class="form-group">
                        <label for="exampleInputPassword1">Tình trạng hoàn thành</label>
                            <select name="job_status" class="form-control input-sm m-bot15">
                                <option value="0">Đã hoàn thành</option>
                                <option value="1">Chưa hoàn thành</option>
                            </select>
                        </div>
                        <button type="submit" name="add_product" class="btn btn-primaryinfo">Thêm công việc</button>
                    </form>
                    </div>

                </div>
            </section>
    </div>
</div>
@endsection