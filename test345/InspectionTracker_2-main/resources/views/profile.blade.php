@extends('.layouts.app')

@section('title', __('Profile'))

@section('content')
    <!-- main Section -->
    <div class="main-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="dash-heading mb-10">
                        <div class="row">
                            <div class="col-md-12">
                                <h2>{{ __('Profile') }}</h2>
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
                        <div class="card-header">Update Profile</div>
                        <div class="card-body">
                            <form id="profile-form" method="post" action="{{ url('update-profile') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="company_name"><span class="red">*</span> Name</label>
                                            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="company_name"><span class="red">*</span> Email</label>
                                            <input type="email" name="email" class="form-control" value="{{ $user->email }}" id="email" required>
                                            <small class="text-danger email_alert"></small>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="company_name"> Password</label>
                                            <input type="password" name="password" class="form-control" placeholder="*****">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="company_name"> Image</label>
                                            <input type="file" name="img" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" id="valid_email" value="1">
                                <input type="hidden" id="id" value="{{ $user->id }}" name="id">
                            </form>
                        </div>
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
            } else if(message === 'updated') {
                Toast.fire({
                    icon: 'success',
                    title: 'Updated successfully'
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
                let id = $('#id').val();
                axios.get('{{ url('checkUserEmail') }}/'+email+'/'+id)
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
                $('#profile-form').submit();
            }
        })
    </script>
@endpush
