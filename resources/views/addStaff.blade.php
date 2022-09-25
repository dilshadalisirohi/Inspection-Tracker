@extends('.layouts.app')

@section('title', __('Add Staff'))

@section('content')
    <!-- main Section -->
    <div class="main-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="dash-heading mb-10">
                        <div class="row">
                            <div class="col-md-12">
                                <h2>{{ __('Staff') }}</h2>
                            </div>
                        </div>
                    </div>
                    <div id="tw-loader" class="tw-loader">
                        <div class="tw-ellipsis">
                            <div></div><div></div><div></div><div></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-10">
                <div class="col-lg-8 mb-30">
                        <div class="card">
                            <div class="card-header">Create Staff</div>
                            <div class="card-body">
                                <form id="staff-form" method="post" action="{{ url('create-staff') }}">
                                    @csrf
                                    <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="company_name"><span class="red">*</span> Staff Name</label>
                                            <input type="text" name="name" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="company_name"><span class="red">*</span> Staff Email</label>
                                            <input type="email" name="email" class="form-control" id="email" required>
                                            <small class="text-danger email_alert"></small>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="company_name"><span class="red">*</span> Role</label>
                                            <select name="role" id="" class="form-control chosen-select">
                                                <option value="3">Inspector</option>
                                                <option value="2">Admin</option>
                                                <option value="4">Viewer</option>
                                            </select>
                                        </div>
                                    </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="company_name"><span class="red">*</span> Password</label>
                                                <input type="text" name="password" class="form-control" id="password" required>
                                            </div>
                                        </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="company_name"><span class="red">*</span> Status</label>
                                            <select name="status" id="" class="form-control chosen-select">
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                            <input type="hidden" id="valid_email">
                            <div class="card-footer">
                                <button id="submit-form" class="btn btn-success mr-10">Save</button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

    @if(session()->has('message'))
        <input type="hidden" id="message" value="{!! session('message') !!}">
    @endif
    <!-- /main Section -->
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            let message = $('#message').val();
            if(message === 'success') {
                Toast.fire({
                    icon: 'success',
                    title: 'Added successfully'
                })
            } else if(message == 'failed') {
                Toast.fire({
                    icon: 'error',
                    title: 'Failed. Try again'
                })
            }
        })

        $('#email').on('keypress', function () {
            setTimeout(function () {
                let email = $('#email').val();
                axios.get('{{ url('checkEmail') }}/'+email)
                    .then(response => {
                        console.log(response)
                        if(response.data == 'taken') {
                            $('.email_alert').empty()
                            $('.email_alert').append('Email already taken.')
                            $('#valid_email').val(0)
                        } else {
                            $('.email_alert').empty()
                            $('#valid_email').val(1)
                        }
                    })
            }, 10)
        })

        $('#submit-form').on("click", function () {
            if($('#valid_email').val() == 1) {
                $('#staff-form').submit();
            }
        })
    </script>
@endpush
