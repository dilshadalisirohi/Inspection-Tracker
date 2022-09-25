@extends('.layouts.app')

@section('title', __('Settings'))

@section('content')
    <!-- main Section -->
    <div class="main-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="dash-heading mb-10">
                        <div class="row">
                            <div class="col-md-12">
                                <h2>{{ __('System Settings') }}</h2>
                            </div>
                        </div>
                    </div>
                    <div id="tw-loader" class="tw-loader">
                        <div class="tw-ellipsis">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-10">
                <div class="col-lg-8 mb-30">
                    <div class="card">
                        <div class="card-header">Settings</div>
                        <div class="card-body">
                            <form id="company-staff-form" method="post" action="{{ url('update-settings') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="company_name"><span class="red">*</span> Title</label>
                                            <input type="text" name="title" class="form-control" required
                                                value="{{ $settings->title }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="company_name"> Logo</label>
                                            <input type="file" name="logo" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="company_name"> Favicon</label>
                                            <input type="file" name="favicon" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button id="submit-form" type="submit" class="btn btn-success mr-10">Update</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="col-lg-8 mb-30">
                    <div class="card mb-10">
                        {{-- <div class="card-header">Required Documents</div> --}}
                        <div class="card-body">
                            <form action="{{ url('updateEmailSettings') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Host</label>
                                    <input type="text" data-email-setting="host"
                                        class="form-control @error('host') is-invalid @enderror"
                                        placeholder="Email Email Host" name="host" value="{{ $data['host'] }}" required>
                                    @error('host')
                                        <span class="invalid-feedback" role="alert" style="display: block;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Port</label>
                                    <input type="text" data-email-setting="port"
                                        class="form-control @error('port') is-invalid @enderror"
                                        placeholder="Email Email Port Number" name="port" value="{{ $data['port'] }}"
                                        required>
                                    @error('port')
                                        <span class="invalid-feedback" role="alert" style="display: block;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Username</label>
                                    <input type="text" data-email-setting="username"
                                        class="form-control @error('username') is-invalid @enderror"
                                        placeholder="Enter Email Username" name="username" value="{{ $data['username'] }}"
                                        required>
                                    @error('username')
                                        <span class="invalid-feedback" role="alert" style="display: block;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Password</label>
                                    <input type="text" data-email-setting="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        placeholder="Enter Email Password" name="password"
                                        value="{{ $data['password'] }}" required>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert" style="display: block;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Encryption</label>
                                    <select data-email-setting="encryption"
                                        class="hd-select form-control @error('encryption') is-invalid @enderror"
                                        name="encryption" required>
                                        <option value="ssl" @if ($data['encryption'] == 'ssl') selected @endif>SSL</option>
                                        <option value="tls" @if ($data['encryption'] == 'tls') selected @endif>TLS</option>
                                    </select>
                                    @error('encryption')
                                        <span class="invalid-feedback" role="alert" style="display: block;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mail From Address</label>
                                    <input type="text" data-email-setting="address"
                                        class="form-control @error('address') is-invalid @enderror"
                                        placeholder="Enter Mail From Address" name="address"
                                        value="{{ $data['address'] }}" required>
                                    @error('address')
                                        <span class="invalid-feedback" role="alert" style="display: block;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mail From Name</label>
                                    <input type="text" data-email-setting="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="{{ __('system.enter') . ' ' . __('system.email') . ' ' . __('system.from') . ' ' . __('system.name') }}"
                                        name="name" value="{{ $data['name'] }}" required>
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
                {{--  --}}


                <div class="col-lg-8 mb-30">
                    <div class="card mb-10">
                        {{-- <div class="card-header">Required Documents</div> --}}
                        <div class="card-header">Report fields</div>
                        <div class="card-body">
                            <form id="company-staff-form" method="post" action="{{ url('updateReportSettings') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="examplereportfield1">GLO'S s Designated Representative</label>
                                    <input type="text" class="form-control"
                                        placeholder="GLO'S s Designated Representative" name="report_glo"
                                        value="{{ $settings->report_glo }}" required>


                                </div>

                                <div class="form-group">
                                    <label for="examplereportfield2">Contract No</label>
                                    <input type="text" class="form-control " value="{{ $settings->report_contact }}"
                                        placeholder="Contact" name="report_contact" required>

                                </div>



                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            {{--  --}}







        </div>
    </div>
    </div>

    @if (session()->has('message'))
        <input type="hidden" id="message" value="{!! session('message') !!}">
    @endif
    <!-- /main Section -->
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            let message = $('#message').val();
            if (message === 'updated') {
                Toast.fire({
                    icon: 'success',
                    title: 'Settings Updated successfully'
                })
            } else if (message == 'failed') {
                Toast.fire({
                    icon: 'error',
                    title: 'Failed. Try again'
                })
            }
        })
    </script>
@endpush
