@extends('.layouts.app')

@section('title', __('Email Settings'))

@section('content')
    <style>
        .checkbox_input:hover {
            -webkit-appearance: auto !important;
        }

        .checkbox_input:focus {
            -webkit-appearance: auto !important;
        }

        .btn {
            color: black;
        }
    </style>
    <!-- main Section -->
    <div class="main-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="dash-heading mb-10">
                        <div class="row">
                            <div class="col-md-12">
                                <h2>{{ __('Email Settings') }}</h2>
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
                <div class="col-lg-12 mb-30">
                    <div class="card mb-10">
                        {{--                        <div class="card-header">Required Documents</div>--}}
                        <div class="card-body">
                            <form action="{{ url('updateEmailSettings') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Port</label>
                                    <input type="text" data-email-setting="port" class="form-control @error('port') is-invalid @enderror" placeholder="Email Email Port Number" name="port" value="{{ $data['port'] }}" required>
                                    @error('port')
                                    <span class="invalid-feedback" role="alert" style="display: block;">
                                                    <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Username</label>
                                    <input type="text" data-email-setting="username" class="form-control @error('username') is-invalid @enderror" placeholder="Enter Email Username" name="username" value="{{ $data['username'] }}" required>
                                    @error('username')
                                    <span class="invalid-feedback" role="alert" style="display: block;">
                                                    <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Password</label>
                                    <input type="text" data-email-setting="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Email Password" name="password" value="{{ $data['password'] }}" required>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert" style="display: block;">
                                                    <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Encryption</label>
                                    <select data-email-setting="encryption" class="hd-select form-control @error('encryption') is-invalid @enderror" name="encryption" required>
                                        <option value="ssl" @if($data['encryption'] == 'ssl' ) selected @endif>SSL</option>
                                        <option value="tls" @if($data['encryption'] == 'tls' ) selected @endif>TLS</option>
                                    </select>
                                    @error('encryption')
                                    <span class="invalid-feedback" role="alert" style="display: block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mail From Address</label>
                                    <input type="text" data-email-setting="address" class="form-control @error('address') is-invalid @enderror" placeholder="Enter Mail From Address" name="address" value="{{ $data['address'] }}" required>
                                    @error('address')
                                    <span class="invalid-feedback" role="alert" style="display: block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ __('system.mail')." ".__('system.from')." ".__('system.name') }}</label>
                                    <input type="text" data-email-setting="name" class="form-control @error('name') is-invalid @enderror" placeholder="{{ __('system.enter')." ".__('system.email')." ".__('system.from')." ".__('system.name') }}" name="name" value="{{ $data['name'] }}" required>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert" style="display: block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                    <span class="invalid-feedback" role="alert" style="display: block;">
                                                <strong id="hd-email-setting-name"></strong>
                                            </span>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            </form>
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
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $('#type').on("change", function () {
            let id = $('#type').val();
            if(id == 1) {
                $('.suggestions').empty();
                $('.suggestions').append('applicant_name, applicant_address, applicant_city, applicant_county,' +
                    ' requester_name, requester_email, requester_phone, company,' +
                    ' supervisor_name, supervisor_email, supervisor_phone' +
                    ' construction_type, floor_plan, region' +
                    ' created_time');
            } else if(id == 2) {
                $('.suggestions').empty();
                $('.suggestions').append('applicant_name, applicant_address, applicant_city, applicant_county,' +
                    ' requester_name, requester_email, requester_phone, company,' +
                    ' supervisor_name, supervisor_email, supervisor_phone' +
                    ' construction_type, floor_plan, region, updated_by, update_time');
            }
        })

        $(document).ready(function() {
            let id = $('#type').val();
            if(id == 1) {
                $('.suggestions').empty();
                $('.suggestions').append('applicant_name, applicant_address, applicant_city, applicant_county,' +
                    ' requester_name, requester_email, requester_phone, company,' +
                    ' supervisor_name, supervisor_email, supervisor_phone' +
                    ' construction_type, floor_plan, region' +
                    ' created_time');
            } else if(id == 2) {
                $('.suggestions').empty();
                $('.suggestions').append('applicant_name, applicant_address, applicant_city, applicant_county,' +
                    ' requester_name, requester_email, requester_phone, company,' +
                    ' supervisor_name, supervisor_email, supervisor_phone' +
                    ' construction_type, floor_plan, region, updated_by, update_time');
            }


            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
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
            $('#summernote').summernote({
                height: 250
            });

            $('#type').on("change", function () {
                setTimeout(function () {
                    let id = $('#type').val();
                    axios.get('{{ url('getEmailTemplateById') }}/'+id)
                        .then(response => {
                            $('.subject').val(response.data.subject)
                            $('#summernote').summernote('code', response.data.template);
                        })
                }, 100)
            })
            //$('#summernote').summernote('code', {{ $types[0]->template }});
        });
    </script>
@endpush
