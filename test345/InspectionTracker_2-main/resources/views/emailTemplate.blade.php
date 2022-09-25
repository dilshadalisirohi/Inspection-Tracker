@extends('.layouts.app')

@section('title', __('Email Template'))

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
                                <h2>{{ __('Email Template') }}</h2>
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
                            <form action="{{ url('updateEmailTemplate') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="">Email Type</label>
                                    <select name="type" id="type" class="form-control">
                                        @foreach($types as $type)
                                            <option value="{{ $type->id }}">{{ $type->type }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="">Subject</label>
                                    <input required type="text" class="form-control subject" name="subject" value="{{ $types[0]->subject }}">
                                </div>

                                <div class="form-group">
                                    <label for="">Message</label>
                                    <textarea required id="summernote" name="message" class="form-control" rows="10">{{ $types[0]->template }}</textarea>
                                    <small class="suggestions d-block font-weight-bold mt-2" style="font-size: .85rem"></small>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Submit</button>
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
            } else if(id == 3) {
                $('.suggestions').empty();
                $('.suggestions').append('applicant_name, applicant_address, applicant_city, applicant_county,' +
                    ' requester_name, requester_email, requester_phone, company,' +
                    ' supervisor_name, supervisor_email, supervisor_phone' +
                    ' construction_type, floor_plan, region, updated_by, update_time' +
                    ' inspector_name, inspector_email, inspector_phone, inspection_status');
            } else if(id == 4) {
                $('.suggestions').empty();
                $('.suggestions').append('applicant_name, applicant_address, applicant_city, applicant_county,' +
                    ' requester_name, requester_email, requester_phone, company,' +
                    ' supervisor_name, supervisor_email, supervisor_phone' +
                    ' construction_type, floor_plan, region, updated_by, update_time' +
                    ' inspector_name, inspector_email, inspector_phone');
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
            } else if(id == 3) {
                $('.suggestions').empty();
                $('.suggestions').append('applicant_name, applicant_address, applicant_city, applicant_county,' +
                    ' requester_name, requester_email, requester_phone, company,' +
                    ' supervisor_name, supervisor_email, supervisor_phone' +
                    ' construction_type, floor_plan, region, updated_by, update_time' +
                    ' inspector_name, inspector_email, inspector_phone, inspection_status');
            } else if(id == 4) {
                $('.suggestions').empty();
                $('.suggestions').append('applicant_name, applicant_address, applicant_city, applicant_county,' +
                    ' requester_name, requester_email, requester_phone, company,' +
                    ' supervisor_name, supervisor_email, supervisor_phone' +
                    ' construction_type, floor_plan, region, updated_by, update_time' +
                    ' inspector_name, inspector_email, inspector_phone');
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
