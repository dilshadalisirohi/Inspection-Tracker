@extends('.layouts.app')

@section('title', __('Update Contractor User'))

@section('content')
    <!-- main Section -->
    <div class="main-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="dash-heading mb-10">
                        <div class="row">
                            <div class="col-md-12">
                                <h2>{{ __('Contractor') }}</h2>
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
                    <form method="post" action="{{ url('update-company-user') }}">
                        @csrf
                        <div class="card">
                            <div class="card-header">Update Contractor Staff</div>
                            <div class="card-body">

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
                                            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="company_name"> Phone</label>
                                            <input type="number" name="phone" class="form-control" id="phone" value="{{ $user->phone }}" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="company_name"><span class="red">*</span> Contractor</label>
                                            <select name="company_id" class="form-control chosen-select" id="company_id">
                                                @foreach($companies as $company)
                                                    <option value="{{ $company->id }}"@if($user->company_id == $company->id) selected @endif>{{ $company->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="company_name">Password</label>
                                            <input type="text" name="password" class="form-control">
                                            <small class="invalid-feedback d-block">Insert Value if want to change password</small>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="company_name"><span class="red">*</span> Status</label>
                                            <select name="status" class="form-control chosen-select" id="status">
                                                <option value="1" @if($user->status == '1') selected @endif>Active</option>
                                                <option value="0" @if($user->company_id == '0') selected @endif>Inactive</option>
                                            </select>
                                        </div>
                                    </div>

                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                </div>

                            </div>
                            <div class="card-footer">
                                <button id="submit-form" type="submit" class="btn btn-success mr-10">Save</button>
                            </div>
                        </div>
                    </form>
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
            $('#company_id').val('{{ $user->company_id }}').trigger("change");
            $('#status').val('{{ $user->status }}').trigger("change");
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
    </script>
@endpush
