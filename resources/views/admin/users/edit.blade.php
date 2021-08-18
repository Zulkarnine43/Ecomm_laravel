@extends('admin.layouts.template')


@section('template')
<!-- Content Header -->
<section class="content-header">
    <h1>
        Edit User
        
        </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
        <li class="active">Edit User</li>
    </ol>
</section>
<!-- End Content Header -->
<!-- Main content -->
<div class="row">
    <div class="col-md-4">
        <section class="content">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form" action="{{ url('admin/users/'.$user->id) }}" method="post" onsubmit="return myFunction()">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $id }}">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" required/>
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ $user->email }}" required/>
                                </div>
                                <div class="form-group">
                                    <label for="">Role</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-anchor"></i></span>
                                    <select name="role_id" id="role_id" class="form-control" required/>
                                        <option value=""> Select User Role </option>
                                        @foreach($roles as $key => $role)
                                        <option value="{{$role->role_id}}">{{$role->display_name}}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" autocomplete="OFF" />
                                    @if($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="">Confirm Password</label>
                                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" autocomplete="OFF"/>
                                    @if($errors->has('confirm_password'))
                                        <span class="text-danger">{{ $errors->first('confirm_password')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="submit" id="submit" class="btn btn-success" value="Update"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Main Content -->
    </div>
</div>
<script type="text/javascript">
function myFunction() {
    var password = document.getElementById("password").value;
    var confirm_password = document.getElementById("confirm_password").value;

        if(password!=confirm_password){
            $('#password').val('');
            $('#confirm_password').val('');
            alert("Password does not match");
            event.preventDefault();
        }
}

$('#role_id').val({{ $user->role_id }});

</script>
@endsection