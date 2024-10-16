@extends('admin.layout.main')

@section('title', 'Edit User Admin')

@section('content')
    <div class="row">
        <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4>User Data</h4>
                </div>
                <form action="{{ route('user-admin.update', $user->id) }}" method="POST">
                  @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Admin</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                            <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-envelope"></i>
                                </div>
                            </div>
                            <input type="text" name="email" value="{{ $user->email }}" class="form-control phone-number">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Nomor Hp</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-phone"></i>
                                </div>
                            </div>
                            <input type="text" name="phone" value="{{ $user->phone }}" class="form-control phone-number">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </div>
                            </div>
                            <input type="password" name="password" class="form-control pwstrength" data-indicator="pwindicator">
                        </div>
                        <div id="pwindicator" class="pwindicator">
                            <div class="bar"></div>
                            <div class="label"></div>
                        </div>
                    </div>
                </div>
            <div>
                <div class="card-footer">
                    <button class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection