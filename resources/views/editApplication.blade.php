@extends('.layouts.app')

@section('title', __('Edit Application'))

@section('content')
    <style>
        .checkbox_input:hover {
            -webkit-appearance: auto !important;
        }

        .checkbox_input:focus {
            -webkit-appearance: auto !important;
        }

        .sign_img {
            display: block;
            max-height: 100px;
        }

        img.edit_photo {
            height: 150px;
            margin-top: 10px;
            margin-bottom: 5px;
        }

        .autocomplete-items {
            position: absolute;
            background: white;
            border: 1px solid rgba(0, 0, 0, 0.1);
            padding: 10px;
            right: 15px;
            left: 15px;
            z-index: 10000;
        }

        .autocomplete-items div {
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        @if (\Illuminate\Support\Facades\Auth::user()->role_id == 1).contractor {
            pointer-events: none !important;
        }

        @endif
    </style>
    <!-- main Section -->
    <div class="main-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="dash-heading mb-10">
                        <div class="row">
                            <div class="col-md-12">
                                <h2>{{ __('Application') }}</h2>
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
                <div class="col-lg-12 mb-30">
                    <form method="post" action="{{ url('update-application') }}" enctype="multipart/form-data"
                        id="applicationForm" data-parsley-validate>
                        @csrf
                        <input type="hidden" name="id" id="id" value="{{ $application->id }}">
                        <div class="card mb-10">
                            <div class="card-header">Required Documents</div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="company_name"> Document Name</label>
                                            <input type="text" name="document_names1" class="form-control"
                                                value="{{ $application->document_1 }}"
                                                @if (\Illuminate\Support\Facades\Auth::user()->role_id == 3) readonly @endif>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Document</label><br>
                                            @if ($application->document_file_1)
                                                <a target="_blank"
                                                    href="{{ url('public/storage/uploads/' . $application->document_file_1) }}">{{ $application->document_file_1 }}</a>
                                                @if (\Illuminate\Support\Facades\Auth::user()->role_id == 2)
                                                    <a class="text-danger mr-1"
                                                        onclick="return confirm('Are you sure to delete?')" title="Delete"
                                                        href="{{ url('admin/document-delete1/' . $application->id) }}">
                                                        <i class="fas fa-trash" style="padding-left:10px"></i></a>
                                                @elseif(\Illuminate\Support\Facades\Auth::user()->role_id == 1)
                                                    <a class="text-danger mr-1"
                                                        onclick="return confirm('Are you sure to delete?')" title="Delete"
                                                        href="{{ url('contractor/document-delete1/' . $application->id) }} ">
                                                        <i class="fas fa-trash" style="padding-left:10px"></i></a>
                                                @endif
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="company_name"> Document Attachment</label>
                                            <input type="file" name="document_files1" class="form-control"
                                                @if (\Illuminate\Support\Facades\Auth::user()->role_id == 3) readonly @endif>

                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="company_name"> Document Name</label>
                                            <input type="text" name="document_names6" class="form-control"
                                                value="{{ $application->document_6 }}"
                                                @if (\Illuminate\Support\Facades\Auth::user()->role_id == 3) readonly @endif>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Document</label><br>
                                            @if ($application->document_file_6)
                                                <a target="_blank"
                                                    href="{{ url('public/storage/uploads/' . $application->document_file_6) }}">{{ $application->document_file_6 }}</a>
                                                @if (\Illuminate\Support\Facades\Auth::user()->role_id == 2)
                                                    <a class="text-danger mr-1"
                                                        onclick="return confirm('Are you sure to delete?')" title="Delete"
                                                        href="{{ url('admin/document-delete6/' . $application->id) }}">
                                                        <i class="fas fa-trash" style="padding-left:10px"></i></a>
                                                @elseif(\Illuminate\Support\Facades\Auth::user()->role_id == 1)
                                                    <a class="text-danger mr-1"
                                                        onclick="return confirm('Are you sure to delete?')" title="Delete"
                                                        href="{{ url('contractor/document-delete6/' . $application->id) }} ">
                                                        <i class="fas fa-trash" style="padding-left:10px"></i></a>
                                                @endif

                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="company_name"> Document Attachment</label>
                                            <input type="file" name="document_files6" class="form-control"
                                                @if (\Illuminate\Support\Facades\Auth::user()->role_id == 3) readonly @endif>

                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input type="text" name="document_names2" class="form-control"
                                                value="{{ $application->document_2 }}"
                                                @if (\Illuminate\Support\Facades\Auth::user()->role_id == 3) readonly @endif>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            @if ($application->document_file_2)
                                                <a target="_blank"
                                                    href="{{ url('public/storage/uploads/' . $application->document_file_2) }}">{{ $application->document_file_2 }}</a>
                                                @if (\Illuminate\Support\Facades\Auth::user()->role_id == 2)
                                                    <a class="text-danger mr-1"
                                                        onclick="return confirm('Are you sure to delete?')" title="Delete"
                                                        href="{{ url('admin/document-delete2/' . $application->id) }}">
                                                        <i class="fas fa-trash" style="padding-left:10px"></i></a>
                                                @elseif(\Illuminate\Support\Facades\Auth::user()->role_id == 1)
                                                    <a class="text-danger mr-1"
                                                        onclick="return confirm('Are you sure to delete?')" title="Delete"
                                                        href="{{ url('contractor/document-delete2/' . $application->id) }} ">
                                                        <i class="fas fa-trash" style="padding-left:10px"></i></a>
                                                @endif
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input type="file" name="document_files2" class="form-control"
                                                @if (\Illuminate\Support\Facades\Auth::user()->role_id == 3) readonly @endif>

                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input type="text" name="document_names3" class="form-control"
                                                value="{{ $application->document_3 }}"
                                                @if (\Illuminate\Support\Facades\Auth::user()->role_id == 3) readonly @endif>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            @if ($application->document_file_3)
                                                <a target="_blank"
                                                    href="{{ url('public/storage/uploads/' . $application->document_file_3) }}">{{ $application->document_file_3 }}</a>
                                                @if (\Illuminate\Support\Facades\Auth::user()->role_id == 2)
                                                    <a class="text-danger mr-1"
                                                        onclick="return confirm('Are you sure to delete?')" title="Delete"
                                                        href="{{ url('admin/document-delete3/' . $application->id) }}">
                                                        <i class="fas fa-trash" style="padding-left:20px"></i></a>
                                                @elseif(\Illuminate\Support\Facades\Auth::user()->role_id == 1)
                                                    <a class="text-danger mr-1"
                                                        onclick="return confirm('Are you sure to delete?')" title="Delete"
                                                        href="{{ url('contractor/document-delete3/' . $application->id) }} ">
                                                        <i class="fas fa-trash" style="padding-left:20px"></i></a>
                                                @endif
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input type="file" name="document_files3" class="form-control"
                                                @if (\Illuminate\Support\Facades\Auth::user()->role_id == 3) readonly @endif>

                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input type="text" name="document_names4" class="form-control"
                                                value="{{ $application->document_4 }}"
                                                @if (\Illuminate\Support\Facades\Auth::user()->role_id == 3) readonly @endif>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            @if ($application->document_file_4)
                                                <a target="_blank"
                                                    href="{{ url('public/storage/uploads/' . $application->document_file_4) }}">{{ $application->document_file_4 }}</a>
                                                @if (\Illuminate\Support\Facades\Auth::user()->role_id == 2)
                                                    <a class="text-danger mr-1"
                                                        onclick="return confirm('Are you sure to delete?')" title="Delete"
                                                        href="{{ url('admin/document-delete4/' . $application->id) }}">
                                                        <i class="fas fa-trash" style="padding-left:20px"></i></a>
                                                @elseif(\Illuminate\Support\Facades\Auth::user()->role_id == 1)
                                                    <a class="text-danger mr-1"
                                                        onclick="return confirm('Are you sure to delete?')" title="Delete"
                                                        href="{{ url('contractor/document-delete4/' . $application->id) }} ">
                                                        <i class="fas fa-trash" style="padding-left:20px"></i></a>
                                                @endif
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input type="file" name="document_files4" class="form-control"
                                                @if (\Illuminate\Support\Facades\Auth::user()->role_id == 3) readonly @endif>

                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input type="text" name="document_names5" class="form-control"
                                                value="{{ $application->document_5 }}"
                                                @if (\Illuminate\Support\Facades\Auth::user()->role_id == 3) readonly @endif>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            @if ($application->document_file_5)
                                                <a target="_blank"
                                                    href="{{ url('public/storage/uploads/' . $application->document_file_5) }}">{{ $application->document_file_5 }}</a>
                                                @if (\Illuminate\Support\Facades\Auth::user()->role_id == 2)
                                                    <a class="text-danger mr-1"
                                                        onclick="return confirm('Are you sure to delete?')" title="Delete"
                                                        href="{{ url('admin/document-delete5/' . $application->id) }}">
                                                        <i class="fas fa-trash" style="padding-left:20px"></i></a>
                                                @elseif(\Illuminate\Support\Facades\Auth::user()->role_id == 1)
                                                    <a class="text-danger mr-1"
                                                        onclick="return confirm('Are you sure to delete?')" title="Delete"
                                                        href="{{ url('contractor/document-delete5/' . $application->id) }} ">
                                                        <i class="fas fa-trash" style="padding-left:20px"></i></a>
                                                @endif

                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input type="file" name="document_files5" class="form-control"
                                                @if (\Illuminate\Support\Facades\Auth::user()->role_id == 3) readonly @endif>

                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input type="text" name="document_names7" class="form-control"
                                                value="{{ $application->document_7 }}"
                                                @if (\Illuminate\Support\Facades\Auth::user()->role_id == 3) readonly @endif>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            @if ($application->document_file_7)
                                                <a target="_blank"
                                                    href="{{ url('public/storage/uploads/' . $application->document_file_7) }}">{{ $application->document_file_7 }}</a>
                                                @if (\Illuminate\Support\Facades\Auth::user()->role_id == 2)
                                                    <a class="text-danger mr-1"
                                                        onclick="return confirm('Are you sure to delete?')" title="Delete"
                                                        href="{{ url('admin/document-delete7/' . $application->id) }}">
                                                        <i class="fas fa-trash" style="padding-left:20px"></i></a>
                                                @elseif(\Illuminate\Support\Facades\Auth::user()->role_id == 1)
                                                    <a class="text-danger mr-1"
                                                        onclick="return confirm('Are you sure to delete?')" title="Delete"
                                                        href="{{ url('contractor/document-delete7/' . $application->id) }} ">
                                                        <i class="fas fa-trash" style="padding-left:20px"></i></a>
                                                @endif

                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input type="file" name="document_files7" class="form-control"
                                                @if (\Illuminate\Support\Facades\Auth::user()->role_id == 3) readonly @endif>

                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input type="text" name="document_names8" class="form-control"
                                                value="{{ $application->document_8 }}"
                                                @if (\Illuminate\Support\Facades\Auth::user()->role_id == 3) readonly @endif>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            @if ($application->document_file_8)
                                                <a target="_blank"
                                                    href="{{ url('public/storage/uploads/' . $application->document_file_8) }}">{{ $application->document_file_8 }}</a>
                                                @if (\Illuminate\Support\Facades\Auth::user()->role_id == 2)
                                                    <a class="text-danger mr-1"
                                                        onclick="return confirm('Are you sure to delete?')" title="Delete"
                                                        href="{{ url('admin/document-delete8/' . $application->id) }}">
                                                        <i class="fas fa-trash" style="padding-left:20px"></i></a>
                                                @elseif(\Illuminate\Support\Facades\Auth::user()->role_id == 1)
                                                    <a class="text-danger mr-1"
                                                        onclick="return confirm('Are you sure to delete?')" title="Delete"
                                                        href="{{ url('contractor/document-delete8/' . $application->id) }} ">
                                                        <i class="fas fa-trash" style="padding-left:20px"></i></a>
                                                @endif

                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input type="file" name="document_files8" class="form-control"
                                                @if (\Illuminate\Support\Facades\Auth::user()->role_id == 3) readonly @endif>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card mb-10">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="company_name"><span class="red">*</span> HRIQ ID</label>
                                            <input type="text" name="hriq_id" class="form-control"
                                                value="{{ $application->hriq_id }}"
                                                @if (\Illuminate\Support\Facades\Auth::user()->role_id == 3) readonly @endif required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="company_name" style="display: block"> Submitted to GLO</label>
                                            <input type="checkbox" name="submitted_glo" class="checkbox_input"
                                                value="yes" @if (\Illuminate\Support\Facades\Auth::user()->role_id == 3) readonly @endif
                                                @if ($application->submitted_glo == 'yes') checked @endif>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="company_name" style="display: block"> Date of GLO
                                                Submission</label>
                                            <input type="text" name="date_glo_submission"
                                                class="form-control hd-datepicker"
                                                value="{{ $application->date_glo_submission }}"
                                                @if (\Illuminate\Support\Facades\Auth::user()->role_id == 3) readonly @endif>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-10">
                            <div class="card-header">Applicant Details</div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="company_name"><span class="red">*</span> Application ID</label>
                                            <input type="text" name="application_id" class="form-control"
                                                value="{{ $application->id }}" readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="company_name"><span class="red">*</span> Name</label>
                                            <input type="text" name="applicant_name" class="form-control"
                                                value="{{ $application->applicant_name }}" required
                                                @if (\Illuminate\Support\Facades\Auth::user()->role_id == 3) readonly @endif>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="company_name"> Full Address</label>
                                            <div class="autocomplete-container" id="autocomplete-container"></div>
                                            {{-- <input type="text" name="applicant_street_address" class="form-control" value="{{ $application->applicant_address }}" @if (\Illuminate\Support\Facades\Auth::user()->role_id == 3) readonly @endif> --}}
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="company_name"> City</label>
                                            <input type="text" name="applicant_city" class="form-control"
                                                value="{{ $application->applicant_city }}"
                                                @if (\Illuminate\Support\Facades\Auth::user()->role_id == 3) readonly @endif>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="company_name"> County</label>
                                            <input type="text" name="applicant_county" class="form-control"
                                                value="{{ $application->applicant_county }}"
                                                @if (\Illuminate\Support\Facades\Auth::user()->role_id == 3) readonly @endif>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="card mb-10">
                            <div class="card-header">Requester Details</div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="company_name"><span class="red">*</span> Name</label>
                                            <input type="text" name="requester_name" class="form-control"
                                                value="{{ $application->requester_name }}" required
                                                @if (\Illuminate\Support\Facades\Auth::user()->role_id == 3) readonly @endif>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="company_name"><span class="red">*</span> Email</label>
                                            <input type="email" name="requester_email_1" class="form-control"
                                                value="{{ $application->requester_email }}" required
                                                @if (\Illuminate\Support\Facades\Auth::user()->role_id == 3) readonly @endif>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="company_name"> Phone</label>
                                            <input type="number" name="requester_phone" maxlength="10"
                                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                class="form-control" value="{{ $application->requester_phone }}"
                                                @if (\Illuminate\Support\Facades\Auth::user()->role_id == 3)
                                            readonly
                                            @endif maxlength="10"
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="company_name"><span class="red">*</span> Company</label>
                                            <input type="text" name="company" class="form-control"
                                                value="{{ $application->company }}" required
                                                @if (\Illuminate\Support\Facades\Auth::user()->role_id == 3) readonly @endif>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="company_name"><span class="red">*</span> Requested Date</label>
                                            <input type="text" name="requested_date"
                                                class="form-control hd-datepicker"
                                                value="{{ $application->requested_date }}"
                                                @if (\Illuminate\Support\Facades\Auth::user()->role_id == 3 ||
                                                    \Illuminate\Support\Facades\Auth::user()->role_id == 1) style="pointer-events: none;" @endif>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="company_name"><span class="red">*</span> Requested Time</label>
                                            <input type="text" class="form-control timepicker" name="requested_time"
                                                value="{{ $application->requested_time }}"
                                                @if (\Illuminate\Support\Facades\Auth::user()->role_id == 3 ||
                                                    \Illuminate\Support\Facades\Auth::user()->role_id == 1) style="pointer-events: none;" @endif>
                                            {{-- <select name="requested_time" class="form-control " id="" @if (\Illuminate\Support\Facades\Auth::user()->role_id == 3) style="pointer-events: none" @endif> --}}
                                            {{-- <option value="AM" @if ($application->requested_time == 'AM') selected @endif>AM</option> --}}
                                            {{-- <option value="PM" @if ($application->requested_time == 'PM') selected @endif>PM</option> --}}
                                            {{-- <option value="No Preference"@if ($application->requested_time == 'No Preference') selected @endif>No Preference</option> --}}
                                            {{-- </select> --}}
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="company_name"><span class="red">*</span> Construction
                                                Type</label>
                                            <select name="construction_type" class="form-control " id=""
                                                @if (\Illuminate\Support\Facades\Auth::user()->role_id == 3) style="pointer-events: none" @endif>
                                                <option value="Recon" @if ($application->construction_type == 'Recon') selected @endif>
                                                    Recon</option>
                                                <option value="Repair" @if ($application->construction_type == 'Repair') selected @endif>
                                                    Repair</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="company_name"><span class="red">*</span> Inspection
                                                Type</label>
                                            <select name="inspection_type" class="form-control " id="inspection_type"
                                                @if (\Illuminate\Support\Facades\Auth::user()->role_id == 3) style="pointer-events: none" @endif>
                                                <option value="50%" @if ($application->inspection_type == '50%') selected @endif>
                                                    50%</option>
                                                <option value="100%" @if ($application->inspection_type == '100%') selected @endif>
                                                    100%</option>
                                                <option value="REHAB" @if ($application->inspection_type == 'REHAB') selected @endif>
                                                    REHAB</option>
                                                @if ($application->previous_application_id)
                                                    <option value="TREC" selected>TREC</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="company_name"><span class="red">*</span> Floor Plan</label>
                                            <select name="floor_plan" class="form-control " id=""
                                                @if (\Illuminate\Support\Facades\Auth::user()->role_id == 3) style="pointer-events: none" @endif>
                                                @foreach ($floorplans as $floorplan)
                                                    <option value="{{ $floorplan->id }}"
                                                        @if ($application->floor_plan == $floorplan->id) selected @endif>
                                                        {{ $floorplan->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="company_name"><span class="red">*</span> Region</label>
                                            <select name="region" class="form-control " id=""
                                                @if (\Illuminate\Support\Facades\Auth::user()->role_id == 3) style="pointer-events: none" @endif>
                                                <option value="HGAC" @if ($application->region == 'HGAC') selected @endif>
                                                    HGAC</option>
                                                <option value="HGAC-E" @if ($application->region == 'HGAC-E') selected @endif>
                                                    HGAC-E</option>
                                                <option value="DET" @if ($application->region == 'DET') selected @endif>
                                                    DET</option>
                                                <option value="DETCOG" @if ($application->region == 'DETCOG') selected @endif>
                                                    DETCOG</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card mb-10">
                            <div class="card-header">On-Site Supervisor Details</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="company_name"><span class="red">*</span> Name</label>
                                            <input type="text" name="onsite_supervisor_name" class="form-control"
                                                value="{{ $application->supervisor_name }}" required
                                                @if (\Illuminate\Support\Facades\Auth::user()->role_id == 3) readonly @endif>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="company_name"><span class="red">*</span> Email</label>
                                            <input type="email" name="onsite_supervisor_email" class="form-control"
                                                value="{{ $application->supervisor_email }}" required
                                                @if (\Illuminate\Support\Facades\Auth::user()->role_id == 3) readonly @endif>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="company_name"> Phone</label>
                                            <input type="text" name="onsite_supervisor_phone" maxlength="10"
                                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                class="form-control" value="{{ $application->supervisor_phone }}"
                                                @if (\Illuminate\Support\Facades\Auth::user()->role_id == 3)
                                            readonly
                                            @endif>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card mb-10">
                            <div class="card-header">Inspection Info</div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="company_name"> Inspector Assigned</label>
                                            <select name="inspector_assigned" class="form-control" id=""
                                                @if (\Illuminate\Support\Facades\Auth::user()->role_id == 1 ||
                                                    \Illuminate\Support\Facades\Auth::user()->role_id == 3) disabled @endif>
                                                <option value="">Please Select</option>
                                                @foreach ($inspectors as $inspection)
                                                    <option value="{{ $inspection->id }}"
                                                        @if ($application->inspector_id == $inspection->id) selected @endif>
                                                        {{ $inspection->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="company_name"> Inspection Status</label>
                                            <select name="inspection_status" class="form-control contractor"
                                                id="">
                                                <option value="">Please Select</option>
                                                <option value="Pending"
                                                    @if ($application->inspection_status == 'Pending') selected @endif>Pending</option>
                                                <option value="Scheduled"
                                                    @if ($application->inspection_status == 'Scheduled') selected @endif>Scheduled</option>
                                                <option value="Submitted"
                                                    @if ($application->inspection_status == 'Submitted') selected @endif>Submitted</option>
                                                <option value="Canceled"
                                                    @if ($application->inspection_status == 'Canceled') selected @endif>Canceled</option>
                                                <option value="Inspected"
                                                    @if ($application->inspection_status == 'Inspected') selected @endif>Inspected</option>
                                                <option value="Pass" @if ($application->inspection_status == 'Pass') selected @endif>
                                                    Pass</option>
                                                <option value="Pass-Re-Inspection"
                                                    @if ($application->inspection_status == 'Pass-Re-Inspection') selected @endif>Pass-Re-Inspection
                                                </option>
                                                <option value="Deficiencies Pending"
                                                    @if ($application->inspection_status == 'Deficiencies Pending') selected @endif>Deficiencies Pending
                                                </option>
                                                <option value="Deficiencies Complete"
                                                    @if ($application->inspection_status == 'Deficiencies Complete') selected @endif>Deficiencies
                                                    Complete</option>
                                                <option value="Submitted Pending Green Tags"
                                                    @if ($application->inspection_status == 'Submitted Pending Green Tags') selected @endif>Submitted Pending
                                                    Green Tags</option>
                                                <option value="Submitted Pending COO"
                                                    @if ($application->inspection_status == 'Submitted Pending COO') selected @endif>Submitted Pending
                                                    COO</option>
                                                <option value="Inspected Pending Green Tags"
                                                    @if ($application->inspection_status == 'Inspected Pending Green Tags') selected @endif>Inspected Pending
                                                    Green Tags</option>
                                                <option value="Inspected Pending COO"
                                                    @if ($application->inspection_status == 'Inspected Pending COO') selected @endif>Inspected Pending
                                                    COO</option>
                                                <option value="Ready for SS"
                                                    @if ($application->inspection_status == 'Ready for SS') selected @endif>Ready for SS
                                                </option>
                                                <option value="Signature/Documents Needed"
                                                    @if ($application->inspection_status == 'Signature/Documents Needed') selected @endif>Signature/Documents
                                                    Needed</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="company_name"> Scheduled Inspection Date</label>
                                            <input type="text" name="scheduled_inspection_date"
                                                class="form-control hd-datepicker"
                                                value="{{ $application->scheduled_inspection_date }}"
                                                @if (\Illuminate\Support\Facades\Auth::user()->role_id == 1 ||
                                                    \Illuminate\Support\Facades\Auth::user()->role_id == 0) style="pointer-events: none" @endif>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="company_name"> Scheduled Inspection Time</label>
                                            <div class="d-flex">
                                                <input type="text" name="scheduled_inspection_time"
                                                    class="form-control timepicker"
                                                    value="{{ $application->scheduled_inspection_time }}"
                                                    @if (\Illuminate\Support\Facades\Auth::user()->role_id == 1 ||
                                                        \Illuminate\Support\Facades\Auth::user()->role_id == 0) style="pointer-events: none" @endif>
                                                {{-- <select name="scheduled_inspection_time2" class="form-control contractor" id=""> --}}
                                                {{-- <option value="AM">AM</option> --}}
                                                {{-- <option value="PM">PM</option> --}}
                                                {{-- </select> --}}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="company_name"> Comments</label>
                                            {{-- @if (\Illuminate\Support\Facades\Auth::user()->role_id == 1 || \Illuminate\Support\Facades\Auth::user()->role_id == 0) readonly @endif --}}
                                            <textarea name="comments" class="form-control" id="comment_input" id="" cols="30" rows="5">{{ $application->comments }}</textarea>
                                            <input type="file" class="form-control comment_attachment"
                                                name="comment_attachment">
                                        </div>
                                        <script></script>
                                        <div class="commentsDiv">
                                            @foreach ($comments as $comment)
                                                @php
                                                    $user = \App\Models\User::find($comment->user_id);
                                                @endphp
                                                <div class="commentDiv">
                                                    <div class="commentTop">
                                                        <img src="{{ isset($user->name) && $user->img ? url('public/storage/uploads') . '/' . $user->img : 'https://freesvg.org/img/abstract-user-flat-4.png' }}"
                                                            alt="" width="30px">
                                                        <div style="margin-left: 10px">
                                                            <p
                                                                style="margin-bottom: 0px; line-height: 15px; font-size: 12px;">
                                                                {{ isset($user->name) ? $user->name : 'Custom' }}</p>
                                                            <p
                                                                style="margin-bottom: 0px; line-height: 15px; font-size: 12px;">
                                                                {{ date('Y-m-d H:i:s', strtotime($comment->created_at)) }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="commentBody">
                                                        {{ $comment->comments }} <br>
                                                        @if ($comment->attachment)
                                                            <a class="mt-1"
                                                                href="{{ url('public/storage/uploads') . '/' . $comment->attachment }}">{{ $comment->attachment }}</a>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="card mb-10 pRehab_div">
                            @php
                                $general_inspections = [];
                                $exterior_inspections = [];
                                $interior_inspections = [];
                                $electrical_inspections = [];
                                $accessibility_inspections = [];
                                if ($all_Rehab != '') {
                                    $general_inspections = explode('_', $all_Rehab->general_inspection);
                                    $exterior_inspections = explode('_', $all_Rehab->exterior_inspection);
                                    $interior_inspections = explode('_', $all_Rehab->interior_inspection);
                                    $electrical_inspections = explode('_', $all_Rehab->electrical_inspection);
                                    $accessibility_inspections = explode('_', $all_Rehab->accessibility_inspection);
                                }
                            @endphp
                            <div class="card-body">
                                <div class="row">
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="pills-R1-tab" data-toggle="pill"
                                                href="#pills-R1" role="tab" aria-controls="pills-1"
                                                aria-selected="true">Print</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="pills-R2-tab" data-toggle="pill" href="#pills-R2"
                                                role="tab" aria-controls="pills-2" aria-selected="false">General
                                                Inspection</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="pills-R11-tab" data-toggle="pill" href="#pills-R11"
                                                role="tab" aria-controls="pills-11" aria-selected="false">Exterior
                                                Inspection</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="pills-R3-tab" data-toggle="pill" href="#pills-R3"
                                                role="tab" aria-controls="pills-3" aria-selected="false">Interior
                                                Inspection</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="pills-R4-tab" data-toggle="pill" href="#pills-R4"
                                                role="tab" aria-controls="pills-4" aria-selected="false">Electrical
                                                Inspection</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="pills-R5-tab" data-toggle="pill" href="#pills-R5"
                                                role="tab" aria-controls="pills-5"
                                                aria-selected="false">Accessibility Inspection</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="pills-R7-tab" data-toggle="pill" href="#pills-R7"
                                                role="tab" aria-controls="pills-7" aria-selected="false">Photos</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="pills-R8-tab" data-toggle="pill" href="#pills-R8"
                                                role="tab" aria-controls="pills-8"
                                                aria-selected="false">Deficiencies</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="pills-R9-tab" data-toggle="pill" href="#pills-R9"
                                                role="tab" aria-controls="pills-9" aria-selected="false">Notes &
                                                Info</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="pills-R10-tab" data-toggle="pill" href="#pills-R10"
                                                role="tab" aria-controls="pills-10"
                                                aria-selected="false">Corrections</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="pills-tabContent" style="width: 100% !important;">
                                        <div class="tab-pane fade show active" id="pills-R1" role="tabpanel"
                                            aria-labelledby="pills-R1-tab">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="checkbox" class="mr-1 checkbox_input contractor"
                                                            name="cancellation_request_R" value="yes"
                                                            @if ($all_Rehab != '' && $all_Rehab->cancellation_request == 'yes') checked @endif
                                                            @if (\Illuminate\Support\Facades\Auth::user()->role_id == 1) readonly @endif><label
                                                            for="">Cancellation Request</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Date Inspected</label>
                                                        <input type="text"
                                                            class="form-control contractor hd-datepicker contractor"
                                                            name="date_inspected_R"
                                                            value="@if ($all_Rehab != '') {{ $all_Rehab->date_inspected }} @endif"
                                                            @if (\Illuminate\Support\Facades\Auth::user()->role_id == 1) readonly @endif>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Inspector</label>
                                                        <input type="text" class="form-control contractor"
                                                            name="inspector_R"
                                                            value="@if ($all_Rehab != '') {{ $all_Rehab->inspector }} @endif"
                                                            @if (\Illuminate\Support\Facades\Auth::user()->role_id == 1) readonly @endif>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Inspector Email</label>
                                                        <input type="text" class="form-control contractor"
                                                            name="inspector_email_R"
                                                            value="@if ($all_Rehab != '') {{ $all_Rehab->inspector_email }} @endif"
                                                            @if (\Illuminate\Support\Facades\Auth::user()->role_id == 1) readonly @endif>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Superintendent</label>
                                                        <input type="text" class="form-control contractor"
                                                            name="superintendent_R"
                                                            value="@if ($all_Rehab != '') {{ $all_Rehab->superintendent }} @endif"
                                                            @if (\Illuminate\Support\Facades\Auth::user()->role_id == 1) readonly @endif>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Superintendent Email</label>
                                                        <input type="text" class="form-control contractor"
                                                            name="superintendent_email_R"
                                                            value="@if ($all_Rehab != '') {{ $all_Rehab->superintendent_email }} @endif"
                                                            @if (\Illuminate\Support\Facades\Auth::user()->role_id == 1) readonly @endif>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Requester Email</label>
                                                        <input type="text" class="form-control contractor"
                                                            name="requester_email_R"
                                                            value="@if ($all_Rehab != '') {{ $all_Rehab->requester_email }} @endif"
                                                            @if (\Illuminate\Support\Facades\Auth::user()->role_id == 1) readonly @endif>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Superintendent Phone</label>
                                                        <input type="text" class="form-control contractor"
                                                            maxlength="10"
                                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                            name="superintendent_phone_R"
                                                            value="@if ($all_Rehab != '')
{{ $all_Rehab->superintendent_phone }}
@endif"
                                                            @if (\Illuminate\Support\Facades\Auth::user()->role_id == 1)
                                                        readonly
                                                        @endif>
                                                    </div>
                                                </div>

                                                <div class="col-md-8"></div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Document Spawn</label><br>
                                                        @if ($all_Rehab != '' && $all_Rehab->document_spawn)


                                                            @if (\Illuminate\Support\Facades\Auth::user()->role_id == 2)
                                                                <a href="{{ url('admin/generatepdfr/' . $application->id) }}"
                                                                    target="_blank">{{ $all_Rehab->document_spawn }}</a>
                                                            @elseif (\Illuminate\Support\Facades\Auth::user()->role_id == 3)
                                                                <a href="{{ url('inspector/generatepdfr/' . $application->id) }}"
                                                                    target="_blank">{{ $all_Rehab->document_spawn }}</a>
                                                            @elseif (\Illuminate\Support\Facades\Auth::user()->role_id == 4)
                                                                <a href="{{ url('viewer/generatepdfr/' . $application->id) }}"
                                                                    target="_blank">{{ $all_Rehab->document_spawn }}</a>
                                                            @elseif (\Illuminate\Support\Facades\Auth::user()->role_id == 1)
                                                                <a href="{{ url('contractor/generatepdfr/' . $application->id) }}"
                                                                    target="_blank">{{ $all_Rehab->document_spawn }}</a>
                                                            @endif

                                                        @endif
                                                        {{-- <input type="file" class="form-control contractor" name="document_spawn" value="@if ($all_100 != '') {{ $all_100->document_spawn }} @endif" @if (\Illuminate\Support\Facades\Auth::user()->role_id == 1) readonly @endif> --}}
                                                        {{-- <img src="@if ($all_100 != '') {{ url('public/storage/uploads/'.$all_100->document_spawn) }} @endif" class="edit_photo" alt=""> --}}
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Inspection Document Creation
                                                            Date</label>
                                                        <input type="text" class="form-control contractor"
                                                            name="document_creation_date_R"
                                                            value="@if ($all_Rehab != '') {{ $all_Rehab->document_creation_date }} @endif"
                                                            readonly>
                                                    </div>
                                                </div>

                                                <div
                                                    class="col-md-5 @if ($all_Rehab != '' && $all_Rehab->inspection_sign == null) d-flex align-items-center @endif">
                                                    <button class="btn btn-success contractor inspectorSignOff"
                                                        @if ($all_Rehab != '' && $all_Rehab->inspection_sign != null) style="pointer-events: none" @endif>Inspector
                                                        Sign Off</button>
                                                    <img src="{{ $all_Rehab != '' ? url('public/storage/uploads/' . $all_Rehab->inspection_sign) : '' }}"
                                                        class="sign_img" alt="">
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Inspection Sign-Off Date</label>
                                                        <input type="text"
                                                            class="form-control contractor hd-datepicker"
                                                            name="inspection_sign_off_date_R"
                                                            value="@if ($all_Rehab != '') {{ $all_Rehab->inspection_sign_off_date }} @endif"
                                                            @if (\Illuminate\Support\Facades\Auth::user()->role_id == 1) readonly @endif>
                                                    </div>
                                                </div>

                                                <div class="col-md-3"></div>

                                                <div
                                                    class="col-md-5 @if ($all_Rehab != '' && $all_Rehab->homeowner_sign == null) d-flex align-items-center @endif">
                                                    <button class="btn btn-warning contractor homeownerSignOff"
                                                        @if ($all_Rehab != '' && $all_Rehab->homeowner_sign != null) style="pointer-events: none" @endif>Homeowner
                                                        Sign Off</button>
                                                    <img src="{{ $all_Rehab != '' ? url('public/storage/uploads/' . $all_Rehab->homeowner_sign) : '' }}"
                                                        class="sign_img" alt="">
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Homeowner Sign-Off Date</label>
                                                        <input type="text"
                                                            class="form-control contractor hd-datepicker"
                                                            name="homeowner_sign_off_date_R"
                                                            value="@if ($all_Rehab != '') {{ $all_Rehab->homeowner_sign_off_date }} @endif"
                                                            @if (\Illuminate\Support\Facades\Auth::user()->role_id == 1) readonly @endif>
                                                    </div>
                                                </div>

                                                <div class="col-md-3"></div>

                                                <div
                                                    class="col-md-5 @if ($all_Rehab != '' && $all_Rehab->superintendent_sign == null) d-flex align-items-center @endif">
                                                    <button class="btn btn-primary contractor superintendentSignOff"
                                                        @if ($all_Rehab != '' && $all_Rehab->superintendent_sign != null) style="pointer-events: none" @endif>Superintendent
                                                        Sign Off</button>
                                                    <img src="{{ $all_Rehab != '' ? url('public/storage/uploads/' . $all_Rehab->superintendent_sign) : '' }}"
                                                        class="sign_img" alt="">
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Superintendent Sign-off Date</label>
                                                        <input type="text"
                                                            class="form-control contractor hd-datepicker"
                                                            name="superintendent_sign_off_date_R"
                                                            value="@if ($all_Rehab != '') {{ $all_Rehab->superintendent_sign_off_date }} @endif"
                                                            @if (\Illuminate\Support\Facades\Auth::user()->role_id == 1) readonly @endif>
                                                    </div>
                                                </div>

                                                {{-- <div class="col-md-3"></div> --}}

                                                {{-- <div class="col-md-4"> --}}
                                                {{-- <div class="form-group"> --}}
                                                {{-- <label for="">Document Name</label> --}}
                                                {{-- <input type="text" class="form-control contractor" name="document_name" value="@if ($all_100 != '') {{ $all_100->document_name }} @endif" @if (\Illuminate\Support\Facades\Auth::user()->role_id == 1) readonly @endif> --}}
                                                {{-- </div> --}}
                                                {{-- </div> --}}

                                                {{-- <div class="col-md-8"></div> --}}

                                                {{-- <div class="col-md-6"> --}}
                                                {{-- <div class="form-group"> --}}
                                                {{-- <label for="">Inspector formula signature</label> --}}
                                                {{-- <input type="text" class="form-control contractor" name="inspector_formula_sign" value="@if ($all_100 != '') {{ $all_100->inspector_formula_sign }} @endif" @if (\Illuminate\Support\Facades\Auth::user()->role_id == 1) readonly @endif> --}}
                                                {{-- </div> --}}
                                                {{-- </div> --}}

                                                {{-- <div class="col-md-6"> --}}
                                                {{-- <div class="form-group"> --}}
                                                {{-- <label for="">Superintendent formula signature</label> --}}
                                                {{-- <input type="text" class="form-control contractor" name="superintendent_formula_sign" value="@if ($all_100 != '') {{ $all_100->superintendent_formula_sign }} @endif" @if (\Illuminate\Support\Facades\Auth::user()->role_id == 1) readonly @endif> --}}
                                                {{-- </div> --}}
                                                {{-- </div> --}}

                                                <div class="col-md-12"></div>

                                                <div class="col-md-6">
                                                    <a class="btn btn-success"
                                                        href="@if (\Illuminate\Support\Facades\Auth::user()->role_id == 2) {{ url('admin/generatepdfr/' . $application->id) }}@else{{ url('inspector/generatepdfr/' . $application->id) }} @endif">Print</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-R2" role="tabpanel"
                                            aria-labelledby="pills-R2-tab">
                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">All in-scope work (on form 11.17) is
                                                        performed satisfactorily.</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="gR_i_1" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($general_inspections) > 0 && $general_inspections[0] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($general_inspections) > 0 && $general_inspections[0] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($general_inspections) > 0 && $general_inspections[0] == 'No') selected @endif>
                                                            No</option>
                                                        <option
                                                            value="NOS"@if (count($general_inspections) > 0 && $general_inspections[0] == 'NOS') selected @endif>
                                                            NOS</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Building permit and green tags in
                                                        place
                                                        and visible.</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="gR_i_2" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($general_inspections) > 0 && $general_inspections[1] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($general_inspections) > 0 && $general_inspections[1] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($general_inspections) > 0 && $general_inspections[1] == 'No') selected @endif>
                                                            No</option>
                                                        <option
                                                            value="NOS"@if (count($general_inspections) > 0 && $general_inspections[1] == 'NOS') selected @endif>
                                                            NOS</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Exterior door locks properly
                                                        adjusted,
                                                        deadbolt fully extends into jamb.</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="gR_i_3" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($general_inspections) > 0 && $general_inspections[2] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($general_inspections) > 0 && $general_inspections[2] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($general_inspections) > 0 && $general_inspections[2] == 'No') selected @endif>
                                                            No</option>
                                                        <option
                                                            value="NOS"@if (count($general_inspections) > 0 && $general_inspections[2] == 'NOS') selected @endif>
                                                            NOS</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Top surface of gripping handrails at
                                                        34-38 inches vertically above walking surfaces, stair noses, and
                                                        ramp surfaces (if applicable).</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="gR_i_4" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($general_inspections) > 0 && $general_inspections[3] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($general_inspections) > 0 && $general_inspections[3] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($general_inspections) > 0 && $general_inspections[3] == 'No') selected @endif>
                                                            No</option>
                                                        <option
                                                            value="NOS"@if (count($general_inspections) > 0 && $general_inspections[3] == 'NOS') selected @endif>
                                                            NOS</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Maximum 4-inch opening on all
                                                        balusters/rail supports (if applicable). Not missing required
                                                        balusters.</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="gR_i_5" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($general_inspections) > 0 && $general_inspections[4] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($general_inspections) > 0 && $general_inspections[4] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($general_inspections) > 0 && $general_inspections[4] == 'No') selected @endif>
                                                            No</option>
                                                        <option
                                                            value="NOS"@if (count($general_inspections) > 0 && $general_inspections[4] == 'NOS') selected @endif>
                                                            NOS</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">All weatherproofing installed at
                                                        exterior
                                                        doors.</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="gR_i_6" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($general_inspections) > 0 && $general_inspections[5] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($general_inspections) > 0 && $general_inspections[5] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($general_inspections) > 0 && $general_inspections[5] == 'No') selected @endif>
                                                            No</option>
                                                        <option
                                                            value="NOS"@if (count($general_inspections) > 0 && $general_inspections[5] == 'NOS') selected @endif>
                                                            NOS</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Roof complete including drip edge,
                                                        all
                                                        vent boots/caps, shingles straight & level.</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="gR_i_7" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($general_inspections) > 0 && $general_inspections[6] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($general_inspections) > 0 && $general_inspections[6] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($general_inspections) > 0 && $general_inspections[6] == 'No') selected @endif>
                                                            No</option>
                                                        <option
                                                            value="NOS"@if (count($general_inspections) > 0 && $general_inspections[6] == 'NOS') selected @endif>
                                                            NOS</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Inside of home is free from
                                                        construction
                                                        debris, swept and clean.</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="gR_i_8" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($general_inspections) > 0 && $general_inspections[7] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($general_inspections) > 0 && $general_inspections[7] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($general_inspections) > 0 && $general_inspections[7] == 'No') selected @endif>
                                                            No</option>
                                                        <option
                                                            value="NOS"@if (count($general_inspections) > 0 && $general_inspections[7] == 'NOS') selected @endif>
                                                            NOS</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Exterior free of trash and
                                                        construction
                                                        materials.</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="gR_i_9" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($general_inspections) > 0 && $general_inspections[8] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($general_inspections) > 0 && $general_inspections[8] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($general_inspections) > 0 && $general_inspections[8] == 'No') selected @endif>
                                                            No</option>
                                                        <option
                                                            value="NOS"@if (count($general_inspections) > 0 && $general_inspections[8] == 'NOS') selected @endif>
                                                            NOS</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-R11" role="tabpanel"
                                            aria-labelledby="pills-R11-tab">
                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">House numbers in place, visible.</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="eR_i_1" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($exterior_inspections) > 0 && $exterior_inspections[0] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($exterior_inspections) > 0 && $exterior_inspections[0] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($exterior_inspections) > 0 && $exterior_inspections[0] == 'No') selected @endif>
                                                            No</option>
                                                        <option
                                                            value="NOS"@if (count($exterior_inspections) > 0 && $exterior_inspections[0] == 'NOS') selected @endif>
                                                            NOS</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">All piping/drain lines secured to
                                                        home
                                                        and exposed pipes insulated.</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="eR_i_2" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($exterior_inspections) > 0 && $exterior_inspections[1] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($exterior_inspections) > 0 && $exterior_inspections[1] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($exterior_inspections) > 0 && $exterior_inspections[1] == 'No') selected @endif>
                                                            No</option>
                                                        <option
                                                            value="NOS"@if (count($exterior_inspections) > 0 && $exterior_inspections[1] == 'NOS') selected @endif>
                                                            NOS</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Appropriate water main cut-off
                                                        exists,
                                                        accessible.</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="eR_i_3" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($exterior_inspections) > 0 && $exterior_inspections[2] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($exterior_inspections) > 0 && $exterior_inspections[2] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($exterior_inspections) > 0 && $exterior_inspections[2] == 'No') selected @endif>
                                                            No</option>
                                                        <option
                                                            value="NOS"@if (count($exterior_inspections) > 0 && $exterior_inspections[2] == 'No') selected @endif>
                                                            NOS</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Check electrostatic grounding of gas
                                                        lines.</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="eR_i_4" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($exterior_inspections) > 0 && $exterior_inspections[3] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($exterior_inspections) > 0 && $exterior_inspections[3] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($exterior_inspections) > 0 && $exterior_inspections[3] == 'No') selected @endif>
                                                            No</option>
                                                        <option
                                                            value="NOS"@if (count($exterior_inspections) > 0 && $exterior_inspections[3] == 'NOS') selected @endif>
                                                            NOS</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">All flatwork (driveway, walks, etc.)
                                                        free
                                                        of tripping hazards (if not replace).</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="eR_i_5" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($exterior_inspections) > 0 && $exterior_inspections[4] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($exterior_inspections) > 0 && $exterior_inspections[4] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($exterior_inspections) > 0 && $exterior_inspections[4] == 'No') selected @endif>
                                                            No</option>
                                                        <option
                                                            value="NOS"@if (count($exterior_inspections) > 0 && $exterior_inspections[4] == 'NOS') selected @endif>
                                                            NOS</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Siding free of bowing, loose pieces,
                                                        cracks, dents or chips.</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="eR_i_6" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($exterior_inspections) > 0 && $exterior_inspections[5] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($exterior_inspections) > 0 && $exterior_inspections[5] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($exterior_inspections) > 0 && $exterior_inspections[5] == 'No') selected @endif>
                                                            No</option>
                                                        <option
                                                            value="NOS"@if (count($exterior_inspections) > 0 && $exterior_inspections[5] == 'NOS') selected @endif>
                                                            NOS</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Verify minimum ½ inch expansion gap
                                                        between siding and porch floor, and between siding and ramp.</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="eR_i_7" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($exterior_inspections) > 0 && $exterior_inspections[6] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($exterior_inspections) > 0 && $exterior_inspections[6] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($exterior_inspections) > 0 && $exterior_inspections[6] == 'No') selected @endif>
                                                            No</option>
                                                        <option
                                                            value="NOS"@if (count($exterior_inspections) > 0 && $exterior_inspections[6] == 'NOS') selected @endif>
                                                            NOS</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">All exposed surfaces painted, and
                                                        exterior paint complete without visible defects (from 6 feet
                                                        away).
                                                    </p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="eR_i_8" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($exterior_inspections) > 0 && $exterior_inspections[7] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($exterior_inspections) > 0 && $exterior_inspections[7] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($exterior_inspections) > 0 && $exterior_inspections[7] == 'No') selected @endif>
                                                            No</option>
                                                        <option
                                                            value="NOS"@if (count($exterior_inspections) > 0 && $exterior_inspections[7] == 'NOS') selected @endif>
                                                            NOS</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Silicone caulk present at exterior
                                                        door
                                                        sills and windows. Exterior penetrations are weatherproofed.</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="eR_i_9" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($exterior_inspections) > 0 && $exterior_inspections[8] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($exterior_inspections) > 0 && $exterior_inspections[8] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($exterior_inspections) > 0 && $exterior_inspections[8] == 'No') selected @endif>
                                                            No</option>
                                                        <option
                                                            value="NOS"@if (count($exterior_inspections) > 0 && $exterior_inspections[8] == 'NOS') selected @endif>
                                                            NOS</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Existing gutters, splash blocks,
                                                        water
                                                        diverters, not damaged or detatched.</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="eR_i_10" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($exterior_inspections) > 0 && $exterior_inspections[9] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($exterior_inspections) > 0 && $exterior_inspections[9] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($exterior_inspections) > 0 && $exterior_inspections[9] == 'No') selected @endif>
                                                            No</option>
                                                        <option
                                                            value="NOS"@if (count($exterior_inspections) > 0 && $exterior_inspections[9] == 'NOS') selected @endif>
                                                            NOS</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-R3" role="tabpanel"
                                            aria-labelledby="pills-R3-tab">
                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Switches, receptacles, circuit
                                                        breakers &
                                                        thermostat are functional.</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="iR_i_1" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[0] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[0] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[0] == 'No') selected @endif>
                                                            No</option>
                                                        <option
                                                            value="NOS"@if (count($interior_inspections) > 0 && $interior_inspections[0] == 'NOS') selected @endif>
                                                            NOS</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">All switch and receptacle plates
                                                        level,
                                                        flush, and without defects.</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="iR_i_2" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[1] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[1] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[1] == 'No') selected @endif>
                                                            No</option>
                                                        <option
                                                            value="NOS"@if (count($interior_inspections) > 0 && $interior_inspections[1] == 'NOS') selected @endif>
                                                            NOS</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Walls and drywall are visually free
                                                        of
                                                        blemishes.</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="iR_i_3" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[2] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[2] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[2] == 'No') selected @endif>
                                                            No</option>
                                                        <option
                                                            value="NOS"@if (count($interior_inspections) > 0 && $interior_inspections[2] == 'NOS') selected @endif>
                                                            NOS</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Verify all base trim is properly
                                                        installed.</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="iR_i_4" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[3] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[3] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[3] == 'No') selected @endif>
                                                            No</option>
                                                        <option
                                                            value="NOS"@if (count($interior_inspections) > 0 && $interior_inspections[3] == 'NOS') selected @endif>
                                                            NOS</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Smoke/CO detectors installed in
                                                        proper
                                                        locations and operational.</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="iR_i_5" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[4] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[4] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[4] == 'No') selected @endif>
                                                            No</option>
                                                        <option
                                                            value="NOS"@if (count($interior_inspections) > 0 && $interior_inspections[4] == 'NOS') selected @endif>
                                                            NOS</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Paint coverage is acceptable, free
                                                        from
                                                        flaws visible from 6 feet away.</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="iR_i_6" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[5] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[5] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[5] == 'No') selected @endif>
                                                            No</option>
                                                        <option
                                                            value="NOS"@if (count($interior_inspections) > 0 && $interior_inspections[5] == 'NOS') selected @endif>
                                                            NOS</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Carpet is properly installed, not
                                                        missing
                                                        sections.</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="iR_i_7" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[6] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[6] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[6] == 'No') selected @endif>
                                                            No</option>
                                                        <option
                                                            value="NOS"@if (count($interior_inspections) > 0 && $interior_inspections[6] == 'NOS') selected @endif>
                                                            NOS</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Check vinyl flooring for
                                                        deficiencies
                                                        such as peeling/lifting, visible gaps/seams, ridges/depressions,
                                                        or
                                                        overall poor workmanship.</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="iR_i_8" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[7] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[7] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[7] == 'No') selected @endif>
                                                            No</option>
                                                        <option
                                                            value="NOS"@if (count($interior_inspections) > 0 && $interior_inspections[7] == 'NOS') selected @endif>
                                                            NOS</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Check for Hot-Cold faucet & controls
                                                        reversal in all showers, tubs, and sinks.</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="iR_i_9" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[8] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[8] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[8] == 'No') selected @endif>
                                                            No</option>
                                                        <option
                                                            value="NOS"@if (count($interior_inspections) > 0 && $interior_inspections[8] == 'NOS') selected @endif>
                                                            NOS</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Check for leaks in supply and drain
                                                        lines
                                                        under sinks.</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="iR_i_10" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[9] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[9] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[9] == 'No') selected @endif>
                                                            No</option>
                                                        <option
                                                            value="NOS"@if (count($interior_inspections) > 0 && $interior_inspections[9] == 'NOS') selected @endif>
                                                            NOS</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Toilets flush properly and are
                                                        firmly
                                                        seated in place (no movement).</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="iR_i_11" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[10] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[10] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[10] == 'No') selected @endif>
                                                            No</option>
                                                        <option
                                                            value="NOS"@if (count($interior_inspections) > 0 && $interior_inspections[10] == 'NOS') selected @endif>
                                                            NOS</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">AC & Heat — check for cold and hot
                                                        air
                                                        movement; system in good working order. Check thermostat
                                                        functions.
                                                    </p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="iR_i_12" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[11] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[11] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[11] == 'No') selected @endif>
                                                            No</option>
                                                        <option
                                                            value="NOS"@if (count($interior_inspections) > 0 && $interior_inspections[11] == 'NOS') selected @endif>
                                                            NOS</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">AC filter in place; filter panel
                                                        removable.</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="iR_i_13" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[12] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[12] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[12] == 'No') selected @endif>
                                                            No</option>
                                                        <option
                                                            value="NOS"@if (count($interior_inspections) > 0 && $interior_inspections[12] == 'NOS') selected @endif>
                                                            NOS</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">AC registers properly installed (no
                                                        gaps, all screws) and level.</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="iR_i_14" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[13] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[13] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[13] == 'No') selected @endif>
                                                            No</option>
                                                        <option
                                                            value="NOS"@if (count($interior_inspections) > 0 && $interior_inspections[13] == 'NOS') selected @endif>
                                                            NOS</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Septic system installed and
                                                        operational
                                                        (if applicable).</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="iR_i_15" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[14] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[14] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[14] == 'No') selected @endif>
                                                            No</option>
                                                        <option
                                                            value="NOS"@if (count($interior_inspections) > 0 && $interior_inspections[14] == 'NOS') selected @endif>
                                                            NOS</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Well water system installed and
                                                        operational (if applicable).</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="iR_i_16" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[15] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[15] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[15] == 'No') selected @endif>
                                                            No</option>
                                                        <option
                                                            value="NOS"@if (count($interior_inspections) > 0 && $interior_inspections[15] == 'NOS') selected @endif>
                                                            NOS</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Hot water heater installed,
                                                        operational.
                                                    </p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="iR_i_17" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[16] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[16] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[16] == 'No') selected @endif>
                                                            No</option>
                                                        <option
                                                            value="NOS"@if (count($interior_inspections) > 0 && $interior_inspections[16] == 'NOS') selected @endif>
                                                            NOS</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Appliances installed, operational.
                                                    </p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="iR_i_18" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[17] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[17] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[17] == 'No') selected @endif>
                                                            No</option>
                                                        <option
                                                            value="NOS"@if (count($interior_inspections) > 0 && $interior_inspections[17] == 'NOS') selected @endif>
                                                            NOS</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Anti-tip device installed for the
                                                        stove/oven range.</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="iR_i_19" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[18] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[18] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[18] == 'No') selected @endif>
                                                            No</option>
                                                        <option
                                                            value="NOS"@if (count($interior_inspections) > 0 && $interior_inspections[18] == 'NOS') selected @endif>
                                                            NOS</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Insulation stop at attic access.</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="iR_i_20" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[19] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[19] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[19] == 'No') selected @endif>
                                                            No</option>
                                                        <option
                                                            value="NOS"@if (count($interior_inspections) > 0 && $interior_inspections[19] == 'NOS') selected @endif>
                                                            NOS</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Attic insulation is installed
                                                        properly.
                                                    </p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="iR_i_21" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[20] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[20] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[20] == 'No') selected @endif>
                                                            No</option>
                                                        <option
                                                            value="NOS"@if (count($interior_inspections) > 0 && $interior_inspections[20] == 'NOS') selected @endif>
                                                            NOS</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Attic access door insulated and
                                                        closes
                                                        properly.</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="iR_i_22" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[21] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[21] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[21] == 'No') selected @endif>
                                                            No</option>
                                                        <option
                                                            value="NOS"@if (count($interior_inspections) > 0 && $interior_inspections[21] == 'NOS') selected @endif>
                                                            NOS</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Windows & doors are operable (all
                                                        locks
                                                        & hardware operate smoothly).</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="iR_i_23" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[22] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[22] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[22] == 'No') selected @endif>
                                                            No</option>
                                                        <option
                                                            value="NOS"@if (count($interior_inspections) > 0 && $interior_inspections[22] == 'NOS') selected @endif>
                                                            NOS</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">All window screens installed, NOT
                                                        excessively torn or missing.</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="iR_i_24" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[23] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[23] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[23] == 'No') selected @endif>
                                                            No</option>
                                                        <option
                                                            value="NOS"@if (count($interior_inspections) > 0 && $interior_inspections[23] == 'NOS') selected @endif>
                                                            NOS</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-R4" role="tabpanel"
                                            aria-labelledby="pills-R4-tab">
                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Air Conditioner breaker properly
                                                        sized.
                                                    </p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="elR_i_1" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($electrical_inspections) > 0 && $electrical_inspections[0] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($electrical_inspections) > 0 && $electrical_inspections[0] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($electrical_inspections) > 0 && $electrical_inspections[0] == 'No') selected @endif>
                                                            No</option>
                                                        <option
                                                            value="NOS"@if (count($electrical_inspections) > 0 && $electrical_inspections[0] == 'NOS') selected @endif>
                                                            NOS</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">All exhaust fans and ceiling fans
                                                        are
                                                        operational, no excessive noise or vibration.</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="elR_i_2" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($electrical_inspections) > 0 && $electrical_inspections[1] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($electrical_inspections) > 0 && $electrical_inspections[1] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($electrical_inspections) > 0 && $electrical_inspections[1] == 'No') selected @endif>
                                                            No</option>
                                                        <option
                                                            value="NOS"@if (count($electrical_inspections) > 0 && $electrical_inspections[1] == 'NOS') selected @endif>
                                                            NOS</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">AC Condenser location ok, and
                                                        operable
                                                    </p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="elR_i_3" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($electrical_inspections) > 0 && $electrical_inspections[2] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($electrical_inspections) > 0 && $electrical_inspections[2] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($electrical_inspections) > 0 && $electrical_inspections[2] == 'No') selected @endif>
                                                            No</option>
                                                        <option
                                                            value="NOS"@if (count($electrical_inspections) > 0 && $electrical_inspections[2] == 'NOS') selected @endif>
                                                            NOS</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Aluminum wiring is NOT visually
                                                        apparent.</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="elR_i_4" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($electrical_inspections) > 0 && $electrical_inspections[3] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($electrical_inspections) > 0 && $electrical_inspections[3] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($electrical_inspections) > 0 && $electrical_inspections[3] == 'No') selected @endif>
                                                            No</option>
                                                        <option
                                                            value="NOS"@if (count($electrical_inspections) > 0 && $electrical_inspections[3] == 'NOS') selected @endif>
                                                            NOS</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Check that all required GFCI
                                                        circuits
                                                        are present and operating properly.</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="elR_i_5" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($electrical_inspections) > 0 && $electrical_inspections[4] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($electrical_inspections) > 0 && $electrical_inspections[4] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($electrical_inspections) > 0 && $electrical_inspections[4] == 'No') selected @endif>
                                                            No</option>
                                                        <option
                                                            value="NOS"@if (count($electrical_inspections) > 0 && $electrical_inspections[4] == 'NOS') selected @endif>
                                                            NOS</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Check that all required AFCI
                                                        circuits
                                                        are present and operating properly.</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="elR_i_6" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($electrical_inspections) > 0 && $electrical_inspections[5] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($electrical_inspections) > 0 && $electrical_inspections[5] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($electrical_inspections) > 0 && $electrical_inspections[5] == 'No') selected @endif>
                                                            No</option>
                                                        <option
                                                            value="NOS"@if (count($electrical_inspections) > 0 && $electrical_inspections[5] == 'NOS') selected @endif>
                                                            NOS</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">All circuit breakers clearly
                                                        labeled.
                                                    </p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="elR_i_7" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($electrical_inspections) > 0 && $electrical_inspections[6] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($electrical_inspections) > 0 && $electrical_inspections[6] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($electrical_inspections) > 0 && $electrical_inspections[6] == 'No') selected @endif>
                                                            No</option>
                                                        <option
                                                            value="NOS"@if (count($electrical_inspections) > 0 && $electrical_inspections[6] == 'NOS') selected @endif>
                                                            NOS</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Check ground and polarity of all
                                                        receptacles that are reasonably accessible.</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="elR_i_8" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($electrical_inspections) > 0 && $electrical_inspections[7] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($electrical_inspections) > 0 && $electrical_inspections[7] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($electrical_inspections) > 0 && $electrical_inspections[7] == 'No') selected @endif>
                                                            No</option>
                                                        <option
                                                            value="NOS"@if (count($electrical_inspections) > 0 && $electrical_inspections[7] == 'NOS') selected @endif>
                                                            NOS</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                        </div>
                                        <div class="tab-pane fade" id="pills-R5" role="tabpanel"
                                            aria-labelledby="pills-R5-tab">
                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">If lift present, ensure it is
                                                        operable,
                                                        and lift gates fasten securely</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="aR_i_1" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($accessibility_inspections) > 0 && $accessibility_inspections[0] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($accessibility_inspections) > 0 && $accessibility_inspections[0] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($accessibility_inspections) > 0 && $accessibility_inspections[0] == 'No') selected @endif>
                                                            No</option>
                                                        <option
                                                            value="NOS"@if (count($accessibility_inspections) > 0 && $accessibility_inspections[0] == 'NOS') selected @endif>
                                                            NOS</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Walk-in shower</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="aR_i_2" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($accessibility_inspections) > 0 && $accessibility_inspections[1] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($accessibility_inspections) > 0 && $accessibility_inspections[1] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($accessibility_inspections) > 0 && $accessibility_inspections[1] == 'No') selected @endif>
                                                            No</option>
                                                        <option
                                                            value="NOS"@if (count($accessibility_inspections) > 0 && $accessibility_inspections[1] == 'NOS') selected @endif>
                                                            NOS</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Grab bars installed properly</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="aR_i_3" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($accessibility_inspections) > 0 && $accessibility_inspections[2] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($accessibility_inspections) > 0 && $accessibility_inspections[2] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($accessibility_inspections) > 0 && $accessibility_inspections[2] == 'No') selected @endif>
                                                            No</option>
                                                        <option
                                                            value="NOS"@if (count($accessibility_inspections) > 0 && $accessibility_inspections[2] == 'NOS') selected @endif>
                                                            NOS</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Toilets exactly at 18 inches (on
                                                        center)
                                                        from finished side wall</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="aR_i_4" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($accessibility_inspections) > 0 && $accessibility_inspections[3] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($accessibility_inspections) > 0 && $accessibility_inspections[3] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($accessibility_inspections) > 0 && $accessibility_inspections[3] == 'No') selected @endif>
                                                            No</option>
                                                        <option
                                                            value="NOS"@if (count($accessibility_inspections) > 0 && $accessibility_inspections[3] == 'NOS') selected @endif>
                                                            NOS</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Toilet seat height is 17–19 inches
                                                        from
                                                        floor</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="aR_i_5" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($accessibility_inspections) > 0 && $accessibility_inspections[4] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($accessibility_inspections) > 0 && $accessibility_inspections[4] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($accessibility_inspections) > 0 && $accessibility_inspections[4] == 'No') selected @endif>
                                                            No</option>
                                                        <option
                                                            value="NOS"@if (count($accessibility_inspections) > 0 && $accessibility_inspections[4] == 'NOS') selected @endif>
                                                            NOS</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-6" role="tabpanel"
                                            aria-labelledby="pills-6-tab">...</div>
                                        <div class="tab-pane fade" id="pills-R7" role="tabpanel"
                                            aria-labelledby="pills-R7-tab">
                                            <div class="row">
                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_1_R" name="photo_1_R"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_1) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_2_R" name="photo_2_R"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_2) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_3_R" name="photo_3_R"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_3) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_4_R" name="photo_4_R"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_4) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_5_R" name="photo_5_R"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_5) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_6_R" name="photo_6_R"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_6) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_7_R" name="photo_7_R"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_7) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_8" name="photo_8"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_8) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_9_R" name="photo_9_R"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_9) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_10_R" name="photo_10_R"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_10) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_11_R" name="photo_11_R"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_11) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_12_R" name="photo_12_R"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_12) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_13_R" name="photo_13_R"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_13) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_14_R" name="photo_14_R"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_14) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_15_R" name="photo_15_R"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_15) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_16_R" name="photo_16_R"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_16) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_17_R" name="photo_17_R"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_17) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_18_R" name="photo_18_R"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_18) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_19_R" name="photo_19_R"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_19) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_20_R" name="photo_20_R"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_20) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_21_R" name="photo_21_R"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_21) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_22_R" name="photo_22_R"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_22) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_23_R" name="photo_23_R"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_23) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_24_R" name="photo_24_R"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_24) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_25_R" name="photo_25_R"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_25) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_26_R" name="photo_26_R"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_26) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_27_R" name="photo_27_R"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_27) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_28_R" name="photo_28_R"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_28) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_29_R" name="photo_29_R"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_29) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_30_R" name="photo_30_R"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_30) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-R8" role="tabpanel"
                                            aria-labelledby="pills-R8-tab">
                                            <div class="row p-3">
                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 1</label>
                                                    <input type="text" class="form-control contractor"
                                                        name="deficiency_1_R"
                                                        value="{{ $deficiency != '' ? $deficiency->deficiency_1 : '' }}">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 1</label>
                                                    <input type="file" class="form-control contractor"
                                                        name="deficiency_photo_1_R">
                                                    <img src="{{ $deficiency != '' ? url('public/storage/uploads/' . $deficiency->deficiency_photo_1) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 2</label>
                                                    <input type="text" class="form-control contractor"
                                                        name="deficiency_2_R"
                                                        value="{{ $deficiency != '' ? $deficiency->deficiency_2 : '' }}">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 2</label>
                                                    <input type="file" class="form-control contractor"
                                                        name="deficiency_photo_2_R">
                                                    <img src="{{ $deficiency != '' ? url('public/storage/uploads/' . $deficiency->deficiency_photo_2) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 3</label>
                                                    <input type="text" class="form-control contractor"
                                                        name="deficiency_3_R"
                                                        value="{{ $deficiency != '' ? $deficiency->deficiency_3 : '' }}">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 3</label>
                                                    <input type="file" class="form-control contractor"
                                                        name="deficiency_photo_3_R">
                                                    <img src="{{ $deficiency != '' ? url('public/storage/uploads/' . $deficiency->deficiency_photo_3) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 4</label>
                                                    <input type="text" class="form-control contractor"
                                                        name="deficiency_4_R"
                                                        value="{{ $deficiency != '' ? $deficiency->deficiency_4 : '' }}">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 4</label>
                                                    <input type="file" class="form-control contractor"
                                                        name="deficiency_photo_4_R">
                                                    <img src="{{ $deficiency != '' ? url('public/storage/uploads/' . $deficiency->deficiency_photo_4) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 5</label>
                                                    <input type="text" class="form-control contractor"
                                                        name="deficiency_5_R"
                                                        value="{{ $deficiency != '' ? $deficiency->deficiency_5 : '' }}">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 5</label>
                                                    <input type="file" class="form-control contractor"
                                                        name="deficiency_photo_5_R">
                                                    <img src="{{ $deficiency != '' ? url('public/storage/uploads/' . $deficiency->deficiency_photo_5) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 6</label>
                                                    <input type="text" class="form-control contractor"
                                                        name="deficiency_6_R"
                                                        value="{{ $deficiency != '' ? $deficiency->deficiency_6 : '' }}">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 6</label>
                                                    <input type="file" class="form-control contractor"
                                                        name="deficiency_photo_6_R">
                                                    <img src="{{ $deficiency != '' ? url('public/storage/uploads/' . $deficiency->deficiency_photo_6) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 7</label>
                                                    <input type="text" class="form-control contractor"
                                                        name="deficiency_7_R"
                                                        value="{{ $deficiency != '' ? $deficiency->deficiency_7 : '' }}">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 7</label>
                                                    <input type="file" class="form-control contractor"
                                                        name="deficiency_photo_7_R">
                                                    <img src="{{ $deficiency != '' ? url('public/storage/uploads/' . $deficiency->deficiency_photo_7) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 8</label>
                                                    <input type="text" class="form-control contractor"
                                                        name="deficiency_8_R"
                                                        value="{{ $deficiency != '' ? $deficiency->deficiency_8 : '' }}">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 8</label>
                                                    <input type="file" class="form-control contractor"
                                                        name="deficiency_photo_8_R">
                                                    <img src="{{ $deficiency != '' ? url('public/storage/uploads/' . $deficiency->deficiency_photo_8) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 9</label>
                                                    <input type="text" class="form-control contractor"
                                                        name="deficiency_9_R"
                                                        value="{{ $deficiency != '' ? $deficiency->deficiency_9 : '' }}">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 9</label>
                                                    <input type="file" class="form-control contractor"
                                                        name="deficiency_photo_9_R">
                                                    <img src="{{ $deficiency != '' ? url('public/storage/uploads/' . $deficiency->deficiency_photo_9) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 10</label>
                                                    <input type="text" class="form-control contractor"
                                                        name="deficiency_10_R"
                                                        value="{{ $deficiency != '' ? $deficiency->deficiency_10 : '' }}">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 10</label>
                                                    <input type="file" class="form-control contractor"
                                                        name="deficiency_photo_10_R">
                                                    <img src="{{ $deficiency != '' ? url('public/storage/uploads/' . $deficiency->deficiency_photo_10) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 11</label>
                                                    <input type="text" class="form-control contractor"
                                                        name="deficiency_11_R"
                                                        value="{{ $deficiency != '' ? $deficiency->deficiency_11 : '' }}">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 11</label>
                                                    <input type="file" class="form-control contractor"
                                                        name="deficiency_photo_11_R">
                                                    <img src="{{ $deficiency != '' ? url('public/storage/uploads/' . $deficiency->deficiency_photo_11) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 12</label>
                                                    <input type="text" class="form-control contractor"
                                                        name="deficiency_12_R"
                                                        value="{{ $deficiency != '' ? $deficiency->deficiency_12 : '' }}">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 12</label>
                                                    <input type="file" class="form-control contractor"
                                                        name="deficiency_photo_12_R">
                                                    <img src="{{ $deficiency != '' ? url('public/storage/uploads/' . $deficiency->deficiency_photo_12) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 13</label>
                                                    <input type="text" class="form-control contractor"
                                                        name="deficiency_13_R"
                                                        value="{{ $deficiency != '' ? $deficiency->deficiency_13 : '' }}">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 13</label>
                                                    <input type="file" class="form-control contractor"
                                                        name="deficiency_photo_13_R">
                                                    <img src="{{ $deficiency != '' ? url('public/storage/uploads/' . $deficiency->deficiency_photo_13) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-R9" role="tabpanel"
                                            aria-labelledby="pills-R9-tab">
                                            <div class="">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Additional Information 1</label>
                                                        <input type="text" class="form-control contractor"
                                                            name="additional_information_1_R"
                                                            value="{{ $all_Rehab != '' ? $all_Rehab->additional_information_1 : '' }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Additional Information 2</label>
                                                        <input type="text" class="form-control contractor"
                                                            name="additional_information_2_R"
                                                            value="{{ $all_Rehab != '' ? $all_Rehab->additional_information_2 : '' }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Additional Information 3</label>
                                                        <input type="text" class="form-control contractor"
                                                            name="additional_information_3_R"
                                                            value="{{ $all_Rehab != '' ? $all_Rehab->additional_information_3 : '' }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Additional Information 4</label>
                                                        <input type="text" class="form-control contractor"
                                                            name="additional_information_4"
                                                            value="{{ $all_Rehab != '' ? $all_Rehab->additional_information_4 : '' }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Additional Notes</label>
                                                        <input type="text" class="form-control contractor"
                                                            name="additional_notes_R"
                                                            value="{{ $all_Rehab != '' ? $all_Rehab->additional_notes : '' }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Address Text</label>
                                                        <input type="text" class="form-control contractor"
                                                            name="address_text_R"
                                                            value="{{ $all_Rehab != '' ? $all_Rehab->address_text : '' }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-R10" role="tabpanel"
                                            aria-labelledby="pills-R10-tab">
                                            <div class="form-group">
                                                <label for="">Attachment 1</label>
                                                <input type="file" class="form-control contractor"
                                                    name="attachment_1_R">
                                                @if ($all_Rehab != '' && $all_Rehab->attachment_1)
                                                    <a href="{{ url('public/storage/uploads') . '/' . $all_Rehab->attachment_1 }}"
                                                        target="_blank">{{ $all_Rehab->attachment_1 }}</a>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label for="">iCal Text</label>
                                                <input type="text" class="form-control contractor"
                                                    name="ical_text_R"
                                                    value="{{ $all_Rehab != '' ? $all_Rehab->ical_text : '' }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="">Contractor-Builder Name</label>
                                                <input type="text" class="form-control contractor"
                                                    name="contractor_builder_name_R"
                                                    value="{{ $all_Rehab != '' ? $all_Rehab->contractor_builder_name : '' }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="">Thumb 1</label>
                                                <input type="file" class="form-control contractor"
                                                    name="thumb_1_R">
                                                @if ($all_Rehab != '' && $all_Rehab->thumb_1)
                                                    <a href="{{ url('public/storage/uploads') . '/' . $all_Rehab->thumb_1 }}"
                                                        target="_blank">{{ $all_Rehab->thumb_1 }}</a>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label for="">Notify GLO</label>
                                                <input type="text" class="form-control contractor"
                                                    name="notify_glo_R"
                                                    value="{{ $all_Rehab != '' ? $all_Rehab->notify_glo : '' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-10 p100_div">
                            @php
                                $general_inspections = [];
                                $exterior_inspections = [];
                                $interior_inspections = [];
                                $electrical_inspections = [];
                                $accessibility_inspections = [];
                                if ($all_100 != '') {
                                    $general_inspections = explode('_', $all_100->general_inspection);
                                    $exterior_inspections = explode('_', $all_100->exterior_inspection);
                                    $interior_inspections = explode('_', $all_100->interior_inspection);
                                    $electrical_inspections = explode('_', $all_100->electrical_inspection);
                                    $accessibility_inspections = explode('_', $all_100->accessibility_inspection);
                                }
                            @endphp
                            <div class="card-body">
                                <div class="row">
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="pills-1-tab" data-toggle="pill"
                                                href="#pills-1" role="tab" aria-controls="pills-1"
                                                aria-selected="true">Print</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="pills-2-tab" data-toggle="pill" href="#pills-2"
                                                role="tab" aria-controls="pills-2" aria-selected="false">General
                                                Inspection</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="pills-11-tab" data-toggle="pill"
                                                href="#pills-11" role="tab" aria-controls="pills-11"
                                                aria-selected="false">Exterior Inspection</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="pills-3-tab" data-toggle="pill" href="#pills-3"
                                                role="tab" aria-controls="pills-3" aria-selected="false">Interior
                                                Inspection</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="pills-4-tab" data-toggle="pill" href="#pills-4"
                                                role="tab" aria-controls="pills-4"
                                                aria-selected="false">Electrical Inspection</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="pills-5-tab" data-toggle="pill" href="#pills-5"
                                                role="tab" aria-controls="pills-5"
                                                aria-selected="false">Accessibility Inspection</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="pills-7-tab" data-toggle="pill" href="#pills-7"
                                                role="tab" aria-controls="pills-7"
                                                aria-selected="false">Photos</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="pills-8-tab" data-toggle="pill" href="#pills-8"
                                                role="tab" aria-controls="pills-8"
                                                aria-selected="false">Deficiencies</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="pills-9-tab" data-toggle="pill" href="#pills-9"
                                                role="tab" aria-controls="pills-9" aria-selected="false">Notes &
                                                Info</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="pills-10-tab" data-toggle="pill"
                                                href="#pills-10" role="tab" aria-controls="pills-10"
                                                aria-selected="false">Corrections</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="pills-tabContent" style="width: 100% !important;">
                                        <div class="tab-pane fade show active" id="pills-1" role="tabpanel"
                                            aria-labelledby="pills-1-tab">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="checkbox" class="mr-1 checkbox_input contractor"
                                                            name="cancellation_request" value="yes"
                                                            @if ($all_100 != '' && $all_100->cancellation_request == 'yes') checked @endif
                                                            @if (\Illuminate\Support\Facades\Auth::user()->role_id == 1) readonly @endif><label
                                                            for="">Cancellation Request</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Date Inspected</label>
                                                        <input type="text"
                                                            class="form-control contractor hd-datepicker contractor"
                                                            name="date_inspected"
                                                            value="@if ($all_100 != '') {{ $all_100->date_inspected }} @endif"
                                                            @if (\Illuminate\Support\Facades\Auth::user()->role_id == 1) readonly @endif>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Inspector</label>
                                                        <input type="text" class="form-control contractor"
                                                            name="inspector"
                                                            value="@if ($all_100 != '') {{ $all_100->inspector }} @endif"
                                                            @if (\Illuminate\Support\Facades\Auth::user()->role_id == 1) readonly @endif>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Inspector Email</label>
                                                        <input type="text" class="form-control contractor"
                                                            name="inspector_email"
                                                            value="@if ($all_100 != '') {{ $all_100->inspector_email }} @endif"
                                                            @if (\Illuminate\Support\Facades\Auth::user()->role_id == 1) readonly @endif>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Superintendent</label>
                                                        <input type="text" class="form-control contractor"
                                                            name="superintendent"
                                                            value="@if ($all_100 != '') {{ $all_100->superintendent }} @endif"
                                                            @if (\Illuminate\Support\Facades\Auth::user()->role_id == 1) readonly @endif>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Superintendent Email</label>
                                                        <input type="text" class="form-control contractor"
                                                            name="superintendent_email"
                                                            value="@if ($all_100 != '') {{ $all_100->superintendent_email }} @endif"
                                                            @if (\Illuminate\Support\Facades\Auth::user()->role_id == 1) readonly @endif>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Requester Email</label>
                                                        <input type="text" class="form-control contractor"
                                                            name="requester_email"
                                                            value="@if ($all_100 != '') {{ $all_100->requester_email }} @endif"
                                                            @if (\Illuminate\Support\Facades\Auth::user()->role_id == 1) readonly @endif>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Superintendent Phone</label>
                                                        <input type="text" class="form-control contractor"
                                                            maxlength="10"
                                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                            name="superintendent_phone"
                                                            value="@if ($all_100 != '')
{{ $all_100->superintendent_phone }}
@endif"
                                                            @if (\Illuminate\Support\Facades\Auth::user()->role_id == 1)
                                                        readonly
                                                        @endif>
                                                    </div>
                                                </div>

                                                <div class="col-md-8"></div>




                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Document Spawn</label><br>
                                                        @if ($all_100 != '' && $all_100->document_spawn)




                                                            @if (\Illuminate\Support\Facades\Auth::user()->role_id == 2)
                                                                <a href="{{ url('admin/generatepdfs/' . $application->id) }}"
                                                                    target="_blank">{{ $all_100->document_spawn }}</a>
                                                            @elseif (\Illuminate\Support\Facades\Auth::user()->role_id == 3)
                                                                <a href="{{ url('inspector/generatepdfs/' . $application->id) }}"
                                                                    target="_blank">{{ $all_100->document_spawn }}</a>
                                                            @elseif (\Illuminate\Support\Facades\Auth::user()->role_id == 4)
                                                                <a href="{{ url('viewer/generatepdfs/' . $application->id) }}"
                                                                    target="_blank">{{ $all_100->document_spawn }}</a>
                                                            @elseif (\Illuminate\Support\Facades\Auth::user()->role_id == 1)
                                                                <a href="{{ url('contractor/generatepdfs/' . $application->id) }}"
                                                                    target="_blank">{{ $all_100->document_spawn }}</a>
                                                            @endif
                                                        @endif
                                                        {{-- <input type="file" class="form-control contractor" name="document_spawn" value="@if ($all_100 != '') {{ $all_100->document_spawn }} @endif" @if (\Illuminate\Support\Facades\Auth::user()->role_id == 1) readonly @endif> --}}
                                                        {{-- <img src="@if ($all_100 != '') {{ url('public/storage/uploads/'.$all_100->document_spawn) }} @endif" class="edit_photo" alt=""> --}}
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Inspection Document Creation
                                                            Date</label>
                                                        <input type="text" class="form-control contractor"
                                                            name="document_creation_date"
                                                            value="@if ($all_100 != '') {{ $all_100->document_creation_date }} @endif"
                                                            readonly>
                                                    </div>
                                                </div>

                                                <div
                                                    class="col-md-5 @if ($all_100 != '' && $all_100->inspection_sign == null) d-flex align-items-center @endif">
                                                    <button class="btn btn-success contractor inspectorSignOff"
                                                        @if ($all_100 != '' && $all_100->inspection_sign != null) style="pointer-events: none" @endif>Inspector
                                                        Sign Off</button>
                                                    <img src="{{ $all_100 != '' ? url('public/storage/uploads/' . $all_100->inspection_sign) : '' }}"
                                                        class="sign_img" alt="">
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Inspection Sign-Off Date</label>
                                                        <input type="text"
                                                            class="form-control contractor hd-datepicker"
                                                            name="inspection_sign_off_date"
                                                            value="@if ($all_100 != '') {{ $all_100->inspection_sign_off_date }} @endif"
                                                            @if (\Illuminate\Support\Facades\Auth::user()->role_id == 1) readonly @endif>
                                                    </div>
                                                </div>

                                                <div class="col-md-3"></div>

                                                <div
                                                    class="col-md-5 @if ($all_100 != '' && $all_100->homeowner_sign == null) d-flex align-items-center @endif">
                                                    <button class="btn btn-warning contractor homeownerSignOff"
                                                        @if ($all_100 != '' && $all_100->homeowner_sign != null) style="pointer-events: none" @endif>Homeowner
                                                        Sign Off</button>
                                                    <img src="{{ $all_100 != '' ? url('public/storage/uploads/' . $all_100->homeowner_sign) : '' }}"
                                                        class="sign_img" alt="">
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Homeowner Sign-Off Date</label>
                                                        <input type="text"
                                                            class="form-control contractor hd-datepicker"
                                                            name="homeowner_sign_off_date"
                                                            value="@if ($all_100 != '') {{ $all_100->homeowner_sign_off_date }} @endif"
                                                            @if (\Illuminate\Support\Facades\Auth::user()->role_id == 1) readonly @endif>
                                                    </div>
                                                </div>

                                                <div class="col-md-3"></div>

                                                <div
                                                    class="col-md-5 @if ($all_100 != '' && $all_100->superintendent_sign == null) d-flex align-items-center @endif">
                                                    <button class="btn btn-primary contractor superintendentSignOff"
                                                        @if ($all_100 != '' && $all_100->superintendent_sign != null) style="pointer-events: none" @endif>Superintendent
                                                        Sign Off</button>
                                                    <img src="{{ $all_100 != '' ? url('public/storage/uploads/' . $all_100->superintendent_sign) : '' }}"
                                                        class="sign_img" alt="">
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Superintendent Sign-off Date</label>
                                                        <input type="text"
                                                            class="form-control contractor hd-datepicker"
                                                            name="superintendent_sign_off_date"
                                                            value="@if ($all_100 != '') {{ $all_100->superintendent_sign_off_date }} @endif"
                                                            @if (\Illuminate\Support\Facades\Auth::user()->role_id == 1) readonly @endif>
                                                    </div>
                                                </div>

                                                {{-- <div class="col-md-3"></div> --}}

                                                {{-- <div class="col-md-4"> --}}
                                                {{-- <div class="form-group"> --}}
                                                {{-- <label for="">Document Name</label> --}}
                                                {{-- <input type="text" class="form-control contractor" name="document_name" value="@if ($all_100 != '') {{ $all_100->document_name }} @endif" @if (\Illuminate\Support\Facades\Auth::user()->role_id == 1) readonly @endif> --}}
                                                {{-- </div> --}}
                                                {{-- </div> --}}

                                                {{-- <div class="col-md-8"></div> --}}

                                                {{-- <div class="col-md-6"> --}}
                                                {{-- <div class="form-group"> --}}
                                                {{-- <label for="">Inspector formula signature</label> --}}
                                                {{-- <input type="text" class="form-control contractor" name="inspector_formula_sign" value="@if ($all_100 != '') {{ $all_100->inspector_formula_sign }} @endif" @if (\Illuminate\Support\Facades\Auth::user()->role_id == 1) readonly @endif> --}}
                                                {{-- </div> --}}
                                                {{-- </div> --}}

                                                {{-- <div class="col-md-6"> --}}
                                                {{-- <div class="form-group"> --}}
                                                {{-- <label for="">Superintendent formula signature</label> --}}
                                                {{-- <input type="text" class="form-control contractor" name="superintendent_formula_sign" value="@if ($all_100 != '') {{ $all_100->superintendent_formula_sign }} @endif" @if (\Illuminate\Support\Facades\Auth::user()->role_id == 1) readonly @endif> --}}
                                                {{-- </div> --}}
                                                {{-- </div> --}}

                                                <div class="col-md-12"></div>

                                                <div class="col-md-6">
                                                    <a class="btn btn-success"
                                                        href="@if (\Illuminate\Support\Facades\Auth::user()->role_id == 2) {{ url('admin/generatepdfs/' . $application->id) }}@else{{ url('inspector/generatepdfs/' . $application->id) }} @endif">Print</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-2" role="tabpanel"
                                            aria-labelledby="pills-2-tab">


                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">House numbers installed</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g_i_2" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($general_inspections) > 0 && $general_inspections[1] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($general_inspections) > 0 && $general_inspections[1] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($general_inspections) > 0 && $general_inspections[1] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Driveway pad is size 14’ x 20.’
                                                        Connection to street 9’ wide, where applicable</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g_i_3" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($general_inspections) > 0 && $general_inspections[2] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($general_inspections) > 0 && $general_inspections[2] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($general_inspections) > 0 && $general_inspections[2] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">All flatwork (driveway, walks, etc.)
                                                        level, not cracked/damaged/irregular, pitting, spalling,
                                                        expansion joints present.</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g_i_1" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($general_inspections) > 0 && $general_inspections[0] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($general_inspections) > 0 && $general_inspections[0] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($general_inspections) > 0 && $general_inspections[0] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>





                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Peepholes on all exterior doors</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g_i_4" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($general_inspections) > 0 && $general_inspections[3] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($general_inspections) > 0 && $general_inspections[3] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($general_inspections) > 0 && $general_inspections[3] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Exterior door locks properly
                                                        adjusted,
                                                        deadbolt fully extends into jamb</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g_i_15" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($general_inspections) > 0 && $general_inspections[14] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($general_inspections) > 0 && $general_inspections[14] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($general_inspections) > 0 && $general_inspections[14] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">No-step entrance serviced by ramp
                                                        (if
                                                        applicable) slope is 1:12 w/ two (2) grip rails</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g_i_7" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($general_inspections) > 0 && $general_inspections[6] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($general_inspections) > 0 && $general_inspections[6] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($general_inspections) > 0 && $general_inspections[6] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Top of grip rails at consistent height,
                                                        34-38 inches vertically above walking
                                                        surfaces, stair noses, and ramp surfaces. (ADA 2010, 504.4).</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g_i_8" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($general_inspections) > 0 && $general_inspections[7] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($general_inspections) > 0 && $general_inspections[7] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($general_inspections) > 0 && $general_inspections[7] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Maximum 4-inch opening on all
                                                        balusters/rail supports (if applicable)</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g_i_9" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($general_inspections) > 0 && $general_inspections[8] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($general_inspections) > 0 && $general_inspections[8] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($general_inspections) > 0 && $general_inspections[8] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>





                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Accessible route present from street
                                                        to
                                                        one entrance door</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g_i_5" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($general_inspections) > 0 && $general_inspections[4] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($general_inspections) > 0 && $general_inspections[4] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($general_inspections) > 0 && $general_inspections[4] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">At least one (1) entrance door, with
                                                        standard 36” door</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g_i_6" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($general_inspections) > 0 && $general_inspections[5] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($general_inspections) > 0 && $general_inspections[5] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($general_inspections) > 0 && $general_inspections[5] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Exterior free of trash and
                                                        construction
                                                        materials</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g_i_22" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($general_inspections) > 0 && $general_inspections[21] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($general_inspections) > 0 && $general_inspections[21] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($general_inspections) > 0 && $general_inspections[21] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Foundation cables properly stressed
                                                        and
                                                        secured (if applicable)</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g_i_21" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($general_inspections) > 0 && $general_inspections[20] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($general_inspections) > 0 && $general_inspections[20] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($general_inspections) > 0 && $general_inspections[20] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Porch/decks and ramps
                                                        cleaned/pressure
                                                        washed</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g_i_23" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($general_inspections) > 0 && $general_inspections[22] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($general_inspections) > 0 && $general_inspections[22] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($general_inspections) > 0 && $general_inspections[22] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Hallways at least 36” wide, level &
                                                        ramped/beveled changes at each door</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g_i_14" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($general_inspections) > 0 && $general_inspections[13] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($general_inspections) > 0 && $general_inspections[13] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($general_inspections) > 0 && $general_inspections[13] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Roof complete including drip edge,
                                                        all
                                                        vent boots/caps, shingles straight & level</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g_i_19" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($general_inspections) > 0 && $general_inspections[18] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($general_inspections) > 0 && $general_inspections[18] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($general_inspections) > 0 && $general_inspections[18] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">All weatherproofing installed at
                                                        exterior doors</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g_i_18" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($general_inspections) > 0 && $general_inspections[17] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($general_inspections) > 0 && $general_inspections[17] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($general_inspections) > 0 && $general_inspections[17] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>




                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Building permit, Certificate of
                                                        Occupancy, Elevation Certificate and Inspection green tags on
                                                        site
                                                        and visible.</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g_i_10" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($general_inspections) > 0 && $general_inspections[9] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($general_inspections) > 0 && $general_inspections[9] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($general_inspections) > 0 && $general_inspections[9] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Termite treatment complete with
                                                        certificate on hand</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g_i_11" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($general_inspections) > 0 && $general_inspections[10] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($general_inspections) > 0 && $general_inspections[10] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($general_inspections) > 0 && $general_inspections[10] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Green Standards Certification
                                                        certificate complete and on hand</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g_i_12" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($general_inspections) > 0 && $general_inspections[11] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($general_inspections) > 0 && $general_inspections[11] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($general_inspections) > 0 && $general_inspections[11] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>
























                                        </div>
                                        <div class="tab-pane fade" id="pills-11" role="tabpanel"
                                            aria-labelledby="pills-11-tab">
                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">All piping/drain lines secured to
                                                        home
                                                        and exposed pipes insulated</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="e_i_1" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($exterior_inspections) > 0 && $exterior_inspections[0] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($exterior_inspections) > 0 && $exterior_inspections[0] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($exterior_inspections) > 0 && $exterior_inspections[0] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Appropriate water main cut-off
                                                        exists
                                                    </p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="e_i_2" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($exterior_inspections) > 0 && $exterior_inspections[1] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($exterior_inspections) > 0 && $exterior_inspections[1] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($exterior_inspections) > 0 && $exterior_inspections[1] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>



                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Hardie plank installed under house,
                                                        painted (elevated homes where applicable).</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="e_i_4" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($exterior_inspections) > 0 && $exterior_inspections[3] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($exterior_inspections) > 0 && $exterior_inspections[3] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($exterior_inspections) > 0 && $exterior_inspections[3] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Two (2) hose bibs with vacuum
                                                        breakers
                                                        (anti-syphon devices) near front and back.</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="e_i_5" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($exterior_inspections) > 0 && $exterior_inspections[4] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($exterior_inspections) > 0 && $exterior_inspections[4] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($exterior_inspections) > 0 && $exterior_inspections[4] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Check electrostatic grounding of gas
                                                        lines</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="e_i_3" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($exterior_inspections) > 0 && $exterior_inspections[2] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($exterior_inspections) > 0 && $exterior_inspections[2] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($exterior_inspections) > 0 && $exterior_inspections[2] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>


                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">All siding is free of deficiencies.
                                                        Note
                                                        any cracked, dented, bowed, or chipped</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="e_i_7" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($exterior_inspections) > 0 && $exterior_inspections[6] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($exterior_inspections) > 0 && $exterior_inspections[6] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($exterior_inspections) > 0 && $exterior_inspections[6] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">All exposed surfaces painted, and
                                                        exterior paint complete without visible defects (from 6 feet
                                                        away)
                                                    </p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="e_i_8" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($exterior_inspections) > 0 && $exterior_inspections[7] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($exterior_inspections) > 0 && $exterior_inspections[7] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($exterior_inspections) > 0 && $exterior_inspections[7] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Silicone caulk present at exterior
                                                        door
                                                        sills and windows. All exterior penetrations are weatherproofed
                                                    </p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="e_i_9" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($exterior_inspections) > 0 && $exterior_inspections[8] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($exterior_inspections) > 0 && $exterior_inspections[8] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($exterior_inspections) > 0 && $exterior_inspections[8] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">All screens installed, not
                                                        damaged/torn
                                                    </p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="e_i_10" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($exterior_inspections) > 0 && $exterior_inspections[9] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($exterior_inspections) > 0 && $exterior_inspections[9] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($exterior_inspections) > 0 && $exterior_inspections[9] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">All roof jacks painted to match</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="e_i_11" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($exterior_inspections) > 0 && $exterior_inspections[10] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($exterior_inspections) > 0 && $exterior_inspections[10] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($exterior_inspections) > 0 && $exterior_inspections[10] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Gutters, splash blocks, water
                                                        diverters,
                                                        etc., are in place</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="e_i_12" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($exterior_inspections) > 0 && $exterior_inspections[11] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($exterior_inspections) > 0 && $exterior_inspections[11] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($exterior_inspections) > 0 && $exterior_inspections[11] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Finish grade at foundation provides
                                                        positive drainage away from the structure, starting at a min of
                                                        6”
                                                        below finish floor at slab on grade or a min of 6” below pier
                                                        footings for elevated floor</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="e_i_13" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($exterior_inspections) > 0 && $exterior_inspections[12] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($exterior_inspections) > 0 && $exterior_inspections[12] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($exterior_inspections) > 0 && $exterior_inspections[12] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Trees trimmed at least 3 feet from
                                                        the
                                                        structure/roof, and Sod is in required area</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="e_i_14" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($exterior_inspections) > 0 && $exterior_inspections[13] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($exterior_inspections) > 0 && $exterior_inspections[13] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($exterior_inspections) > 0 && $exterior_inspections[13] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>




                                        </div>
                                        <div class="tab-pane fade" id="pills-3" role="tabpanel"
                                            aria-labelledby="pills-3-tab">



                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Inside of home is free from debris
                                                        and
                                                        swept(frml)</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_5" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[4] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[4] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[4] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Operable switches, circuit breakers
                                                        &
                                                        thermostat no higher than 48” above floor</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_6" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[5] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[5] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[5] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">All switches and receptacles
                                                        properly
                                                        installed and operable; switch plates level, flush, and without
                                                        defects. Each receptacle/plug is at least 15” above the floor
                                                    </p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_7" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[6] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[6] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[6] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Wall and ceiling sheetrock is free
                                                        of
                                                        deficiencies; ridges, bubbling, cracking at tape joints, corners
                                                        and
                                                        lines are straight</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_8" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[7] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[7] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[7] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Verify all base is matching profile.
                                                        Base appears to be straight; a bow in the base is a visual cue
                                                        drywall is bowed</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_9" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[8] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[8] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[8] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Ensure cabinets are straight and line up
                                                        with the walls properly.</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_12" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[11] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[11] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[11] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Smoke/CO2 detectors installed in
                                                        proper
                                                        locations and operational</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_10" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[9] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[9] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[9] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Ensure paint coverage is acceptable,
                                                        free from flaws visible from 6 feet away</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_11" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[10] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[10] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[10] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>



                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Ensure interior doors are at least
                                                        standard 32” door, unless the door provides access only to
                                                        closet of
                                                        less than 15 square feet in area</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_13" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[12] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[12] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[12] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Check vinyl flooring for
                                                        deficiencies
                                                        such as peeling/lifting, visible gaps/seams, ridges/depressions,
                                                        or
                                                        overall poor workmanship</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_14" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[13] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[13] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[13] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Ceramic/porcelain tile – all joints
                                                        perpendicular & parallel to walls. Installed around outlets,
                                                        fixtures, pipes/fittings so that plates, escutcheons, and collar
                                                        overlap cuts</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_15" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[14] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[14] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[14] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Check for Hot-Cold control reversal
                                                        in
                                                        all showers, tubs, and sinks</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_16" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[15] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[15] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[15] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Check for leaks in supply and drain
                                                        lines under sinks</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_17" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[16] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[16] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[16] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Toilets flush properly and are
                                                        firmly
                                                        seated in place (no movement)</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_18" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[17] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[17] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[17] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">AC & Heat - check for cold and hot
                                                        air
                                                        movement; system in good working order; check thermostat
                                                        functions
                                                    </p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_19" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[18] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[18] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[18] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">AC filter in place; filter panel
                                                        easily
                                                        removable</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_20" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[19] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[19] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[19] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">AC registers properly installed (no
                                                        gaps, all screws) and level</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_21" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[20] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[20] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[20] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Septic system installed and
                                                        operational
                                                        (if applicable)</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_22" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[21] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[21] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[21] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Well water system installed and
                                                        operational (if applicable)</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_23" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[22] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[22] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[22] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Water heater installed, operational.
                                                        (If
                                                        located on main floor in construction plans, must be in
                                                        designated
                                                        and properly ventilated closet.)</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_24" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[23] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[23] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[23] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Appliances installed, operational
                                                    </p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_25" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[24] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[24] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[24] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Anti-tip device installed for the
                                                        stove/oven range</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_26" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[25] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[25] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[25] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>








                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Washing machine outlet box, ice
                                                        maker
                                                        outlet box, dryer vent box (or trim) present</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_31" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[30] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[30] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[30] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>



                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Attic - Verify insulation installed,
                                                        stop, and access door insulation are present</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_33" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[32] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[32] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[32] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Windows & doors operate smoothly
                                                        (hinge
                                                        screws installed, locks & hardware)</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_34" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[33] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[33] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[33] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>


                                        </div>
                                        <div class="tab-pane fade" id="pills-4" role="tabpanel"
                                            aria-labelledby="pills-4-tab">
                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Air Conditioner breaker properly
                                                        sized
                                                    </p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="el_i_1" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($electrical_inspections) > 0 && $electrical_inspections[0] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($electrical_inspections) > 0 && $electrical_inspections[0] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($electrical_inspections) > 0 && $electrical_inspections[0] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">All exhaust fans and ceiling fans
                                                        are
                                                        operational, no excessive noise or vibration</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="el_i_2" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($electrical_inspections) > 0 && $electrical_inspections[1] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($electrical_inspections) > 0 && $electrical_inspections[1] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($electrical_inspections) > 0 && $electrical_inspections[1] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>



                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">AC Condenser location on concrete
                                                        pad or
                                                        deck. Water diverter over AC unit</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="el_i_4" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($electrical_inspections) > 0 && $electrical_inspections[3] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($electrical_inspections) > 0 && $electrical_inspections[3] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($electrical_inspections) > 0 && $electrical_inspections[3] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>



                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Breaker box located on 1st floor,
                                                        operational parts no higher than 48” from floor</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="el_i_6" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($electrical_inspections) > 0 && $electrical_inspections[5] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($electrical_inspections) > 0 && $electrical_inspections[5] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($electrical_inspections) > 0 && $electrical_inspections[5] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Check that all required GFCI
                                                        circuits
                                                        are present and operating properly</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="el_i_7" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($electrical_inspections) > 0 && $electrical_inspections[6] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($electrical_inspections) > 0 && $electrical_inspections[6] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($electrical_inspections) > 0 && $electrical_inspections[6] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Check that all required AFCI
                                                        circuits
                                                        are present and operating properly</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="el_i_8" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($electrical_inspections) > 0 && $electrical_inspections[7] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($electrical_inspections) > 0 && $electrical_inspections[7] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($electrical_inspections) > 0 && $electrical_inspections[7] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">All circuit breakers clearly labeled
                                                    </p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="el_i_9" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($electrical_inspections) > 0 && $electrical_inspections[8] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($electrical_inspections) > 0 && $electrical_inspections[8] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($electrical_inspections) > 0 && $electrical_inspections[8] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Check ground and polarity of all
                                                        receptacles</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="el_i_10" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($electrical_inspections) > 0 && $electrical_inspections[9] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($electrical_inspections) > 0 && $electrical_inspections[9] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($electrical_inspections) > 0 && $electrical_inspections[9] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>


                                        </div>
                                        <div class="tab-pane fade" id="pills-5" role="tabpanel"
                                            aria-labelledby="pills-5-tab">
                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">If lift present, ensure it is
                                                        operable,
                                                        and lift gates fasten securely</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="a_i_1" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($accessibility_inspections) > 0 && $accessibility_inspections[0] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($accessibility_inspections) > 0 && $accessibility_inspections[0] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($accessibility_inspections) > 0 && $accessibility_inspections[0] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Walk-in shower</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="a_i_2" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($accessibility_inspections) > 0 && $accessibility_inspections[1] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($accessibility_inspections) > 0 && $accessibility_inspections[1] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($accessibility_inspections) > 0 && $accessibility_inspections[1] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Grab bars installed properly</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="a_i_3" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($accessibility_inspections) > 0 && $accessibility_inspections[2] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($accessibility_inspections) > 0 && $accessibility_inspections[2] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($accessibility_inspections) > 0 && $accessibility_inspections[2] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Toilets exactly at 18 inches (on
                                                        center)
                                                        from finished side wall</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="a_i_4" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($accessibility_inspections) > 0 && $accessibility_inspections[3] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($accessibility_inspections) > 0 && $accessibility_inspections[3] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($accessibility_inspections) > 0 && $accessibility_inspections[3] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Toilet seat height is 17–19 inches
                                                        from
                                                        floor</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="a_i_5" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($accessibility_inspections) > 0 && $accessibility_inspections[4] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($accessibility_inspections) > 0 && $accessibility_inspections[4] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($accessibility_inspections) > 0 && $accessibility_inspections[4] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>


                                        </div>
                                        <div class="tab-pane fade" id="pills-6" role="tabpanel"
                                            aria-labelledby="pills-6-tab">...</div>
                                        <div class="tab-pane fade" id="pills-7" role="tabpanel"
                                            aria-labelledby="pills-7-tab">
                                            <div class="row">
                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_1" name="photo_1"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_1) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_2" name="photo_2"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_2) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_3" name="photo_3"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_3) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_4" name="photo_4"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_4) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_5" name="photo_5"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_5) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_6" name="photo_6"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_6) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_7" name="photo_7"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_7) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_8" name="photo_8"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_8) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_9" name="photo_9"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_9) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_10" name="photo_10"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_10) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_11" name="photo_11"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_11) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_12" name="photo_12"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_12) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_13" name="photo_13"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_13) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_14" name="photo_14"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_14) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_15" name="photo_15"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_15) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_16" name="photo_16"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_16) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_17" name="photo_17"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_17) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_18" name="photo_18"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_18) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_19" name="photo_19"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_19) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_20" name="photo_20"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_20) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_21" name="photo_21"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_21) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_22" name="photo_22"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_22) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_23" name="photo_23"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_23) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_24" name="photo_24"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_24) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_25" name="photo_25"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_25) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_26" name="photo_26"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_26) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_27" name="photo_27"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_27) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_28" name="photo_28"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_28) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_29" name="photo_29"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_29) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_30" name="photo_30"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_30) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-8" role="tabpanel"
                                            aria-labelledby="pills-8-tab">
                                            <div class="row p-3">
                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 1</label>
                                                    <input type="text" class="form-control contractor"
                                                        name="deficiency_1"
                                                        value="{{ $deficiency != '' ? $deficiency->deficiency_1 : '' }}">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 1</label>
                                                    <input type="file" class="form-control contractor"
                                                        name="deficiency_photo_1">
                                                    <img src="{{ $deficiency != '' ? url('public/storage/uploads/' . $deficiency->deficiency_photo_1) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 2</label>
                                                    <input type="text" class="form-control contractor"
                                                        name="deficiency_2"
                                                        value="{{ $deficiency != '' ? $deficiency->deficiency_2 : '' }}">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 2</label>
                                                    <input type="file" class="form-control contractor"
                                                        name="deficiency_photo_2">
                                                    <img src="{{ $deficiency != '' ? url('public/storage/uploads/' . $deficiency->deficiency_photo_2) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 3</label>
                                                    <input type="text" class="form-control contractor"
                                                        name="deficiency_3"
                                                        value="{{ $deficiency != '' ? $deficiency->deficiency_3 : '' }}">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 3</label>
                                                    <input type="file" class="form-control contractor"
                                                        name="deficiency_photo_3">
                                                    <img src="{{ $deficiency != '' ? url('public/storage/uploads/' . $deficiency->deficiency_photo_3) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 4</label>
                                                    <input type="text" class="form-control contractor"
                                                        name="deficiency_4"
                                                        value="{{ $deficiency != '' ? $deficiency->deficiency_4 : '' }}">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 4</label>
                                                    <input type="file" class="form-control contractor"
                                                        name="deficiency_photo_4">
                                                    <img src="{{ $deficiency != '' ? url('public/storage/uploads/' . $deficiency->deficiency_photo_4) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 5</label>
                                                    <input type="text" class="form-control contractor"
                                                        name="deficiency_5"
                                                        value="{{ $deficiency != '' ? $deficiency->deficiency_5 : '' }}">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 5</label>
                                                    <input type="file" class="form-control contractor"
                                                        name="deficiency_photo_5">
                                                    <img src="{{ $deficiency != '' ? url('public/storage/uploads/' . $deficiency->deficiency_photo_5) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 6</label>
                                                    <input type="text" class="form-control contractor"
                                                        name="deficiency_6"
                                                        value="{{ $deficiency != '' ? $deficiency->deficiency_6 : '' }}">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 6</label>
                                                    <input type="file" class="form-control contractor"
                                                        name="deficiency_photo_6">
                                                    <img src="{{ $deficiency != '' ? url('public/storage/uploads/' . $deficiency->deficiency_photo_6) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 7</label>
                                                    <input type="text" class="form-control contractor"
                                                        name="deficiency_7"
                                                        value="{{ $deficiency != '' ? $deficiency->deficiency_7 : '' }}">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 7</label>
                                                    <input type="file" class="form-control contractor"
                                                        name="deficiency_photo_7">
                                                    <img src="{{ $deficiency != '' ? url('public/storage/uploads/' . $deficiency->deficiency_photo_7) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 8</label>
                                                    <input type="text" class="form-control contractor"
                                                        name="deficiency_8"
                                                        value="{{ $deficiency != '' ? $deficiency->deficiency_8 : '' }}">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 8</label>
                                                    <input type="file" class="form-control contractor"
                                                        name="deficiency_photo_8">
                                                    <img src="{{ $deficiency != '' ? url('public/storage/uploads/' . $deficiency->deficiency_photo_8) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 9</label>
                                                    <input type="text" class="form-control contractor"
                                                        name="deficiency_9"
                                                        value="{{ $deficiency != '' ? $deficiency->deficiency_9 : '' }}">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 9</label>
                                                    <input type="file" class="form-control contractor"
                                                        name="deficiency_photo_9">
                                                    <img src="{{ $deficiency != '' ? url('public/storage/uploads/' . $deficiency->deficiency_photo_9) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 10</label>
                                                    <input type="text" class="form-control contractor"
                                                        name="deficiency_10"
                                                        value="{{ $deficiency != '' ? $deficiency->deficiency_10 : '' }}">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 10</label>
                                                    <input type="file" class="form-control contractor"
                                                        name="deficiency_photo_10">
                                                    <img src="{{ $deficiency != '' ? url('public/storage/uploads/' . $deficiency->deficiency_photo_10) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 11</label>
                                                    <input type="text" class="form-control contractor"
                                                        name="deficiency_11"
                                                        value="{{ $deficiency != '' ? $deficiency->deficiency_11 : '' }}">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 11</label>
                                                    <input type="file" class="form-control contractor"
                                                        name="deficiency_photo_11">
                                                    <img src="{{ $deficiency != '' ? url('public/storage/uploads/' . $deficiency->deficiency_photo_11) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 12</label>
                                                    <input type="text" class="form-control contractor"
                                                        name="deficiency_12"
                                                        value="{{ $deficiency != '' ? $deficiency->deficiency_12 : '' }}">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 12</label>
                                                    <input type="file" class="form-control contractor"
                                                        name="deficiency_photo_12">
                                                    <img src="{{ $deficiency != '' ? url('public/storage/uploads/' . $deficiency->deficiency_photo_12) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 13</label>
                                                    <input type="text" class="form-control contractor"
                                                        name="deficiency_13"
                                                        value="{{ $deficiency != '' ? $deficiency->deficiency_13 : '' }}">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 13</label>
                                                    <input type="file" class="form-control contractor"
                                                        name="deficiency_photo_13">
                                                    <img src="{{ $deficiency != '' ? url('public/storage/uploads/' . $deficiency->deficiency_photo_13) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-9" role="tabpanel"
                                            aria-labelledby="pills-9-tab">
                                            <div class="">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Additional Information 1</label>
                                                        <input type="text" class="form-control contractor"
                                                            name="additional_information_1"
                                                            value="{{ $all_100 != '' ? $all_100->additional_information_1 : '' }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Additional Information 2</label>
                                                        <input type="text" class="form-control contractor"
                                                            name="additional_information_2"
                                                            value="{{ $all_100 != '' ? $all_100->additional_information_2 : '' }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Additional Information 3</label>
                                                        <input type="text" class="form-control contractor"
                                                            name="additional_information_3"
                                                            value="{{ $all_100 != '' ? $all_100->additional_information_3 : '' }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Additional Information 4</label>
                                                        <input type="text" class="form-control contractor"
                                                            name="additional_information_4"
                                                            value="{{ $all_100 != '' ? $all_100->additional_information_4 : '' }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Additional Notes</label>
                                                        <input type="text" class="form-control contractor"
                                                            name="additional_notes"
                                                            value="{{ $all_100 != '' ? $all_100->additional_notes : '' }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Address Text</label>
                                                        <input type="text" class="form-control contractor"
                                                            name="address_text"
                                                            value="{{ $all_100 != '' ? $all_100->address_text : '' }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-10" role="tabpanel"
                                            aria-labelledby="pills-10-tab">
                                            <div class="form-group">
                                                <label for="">Attachment 1</label>
                                                <input type="file" class="form-control contractor"
                                                    name="attachment_1">
                                                @if ($all_100 != '' && $all_100->attachment_1)
                                                    <a href="{{ url('public/storage/uploads') . '/' . $all_100->attachment_1 }}"
                                                        target="_blank">{{ $all_100->attachment_1 }}</a>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label for="">iCal Text</label>
                                                <input type="text" class="form-control contractor" name="ical_text"
                                                    value="{{ $all_100 != '' ? $all_100->ical_text : '' }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="">Contractor-Builder Name</label>
                                                <input type="text" class="form-control contractor"
                                                    name="contractor_builder_name"
                                                    value="{{ $all_100 != '' ? $all_100->contractor_builder_name : '' }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="">Thumb 1</label>
                                                <input type="file" class="form-control contractor" name="thumb_1">
                                                @if ($all_100 != '' && $all_100->thumb_1)
                                                    <a href="{{ url('public/storage/uploads') . '/' . $all_100->thumb_1 }}"
                                                        target="_blank">{{ $all_100->thumb_1 }}</a>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label for="">Notify GLO</label>
                                                <input type="text" class="form-control contractor"
                                                    name="notify_glo"
                                                    value="{{ $all_100 != '' ? $all_100->notify_glo : '' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-10 p50_div">
                            @php
                                $general_inspections = [];
                                $exterior_inspections = [];
                                $interior_inspections = [];
                                $window_door_inspections = [];
                                $roof_attic_inspections = [];
                                if ($all_50 != '') {
                                    $general_inspections = explode('_', $all_50->general_inspection);
                                    $exterior_inspections = explode('_', $all_50->exterior_inspection);
                                    $interior_inspections = explode('_', $all_50->interior_inspection);
                                    $window_door_inspections = explode('_', $all_50->window_door_inspection);
                                    $roof_attic_inspections = explode('_', $all_50->roof_attic_inspection);
                                }
                                
                            @endphp

                            <div class="card-body">
                                <div class="row">
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="pills-51-tab" data-toggle="pill"
                                                href="#pills-51" role="tab" aria-controls="pills-51"
                                                aria-selected="true">Print</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="pills-52-tab" data-toggle="pill"
                                                href="#pills-52" role="tab" aria-controls="pills-52"
                                                aria-selected="false">General Inspection</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="pills-511-tab" data-toggle="pill"
                                                href="#pills-511" role="tab" aria-controls="pills-511"
                                                aria-selected="false">Exterior Inspection</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="pills-53-tab" data-toggle="pill"
                                                href="#pills-53" role="tab" aria-controls="pills-53"
                                                aria-selected="false">Interior Inspection</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="pills-54-tab" data-toggle="pill"
                                                href="#pills-54" role="tab" aria-controls="pills-54"
                                                aria-selected="false">Windows and Doors</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="pills-56-tab" data-toggle="pill"
                                                href="#pills-56" role="tab" aria-controls="pills-56"
                                                aria-selected="false">Roof/Attic</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="pills-57-tab" data-toggle="pill"
                                                href="#pills-57" role="tab" aria-controls="pills-57"
                                                aria-selected="false">Photos</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="pills-58-tab" data-toggle="pill"
                                                href="#pills-58" role="tab" aria-controls="pills-58"
                                                aria-selected="false">Deficiencies</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="pills-59-tab" data-toggle="pill"
                                                href="#pills-59" role="tab" aria-controls="pills-59"
                                                aria-selected="false">Notes & Info</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="pills-510-tab" data-toggle="pill"
                                                href="#pills-510" role="tab" aria-controls="pills-510"
                                                aria-selected="false">Corrections</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="pills-tabContent" style="width: 100% !important;">
                                        <div class="tab-pane fade show active" id="pills-51" role="tabpanel"
                                            aria-labelledby="pills-51-tab">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="checkbox" class="mr-1 checkbox_input contractor"
                                                            name="cancellation_request_5"
                                                            @if ($all_50 != '' && $all_50->cancellation_request == 'yes') checked @endif
                                                            @if (\Illuminate\Support\Facades\Auth::user()->role_id == 1) readonly @endif><label
                                                            for="">Cancellation Request</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Date Inspected</label>
                                                        <input type="text"
                                                            class="form-control hd-datepicker contractor"
                                                            name="date_inspected_5"
                                                            value="@if ($all_50 != '') {{ $all_50->date_inspected }} @endif"
                                                            @if (\Illuminate\Support\Facades\Auth::user()->role_id == 1) readonly @endif>
                                                    </div>
                                                </div>

                                                @if ($application->inspector_id && $all_50 != '')
                                                    <?php
                                                    $all_50->inspector = \App\Models\User::find($application->inspector_id)->name;
                                                    $all_50->inspector_email = \App\Models\User::find($application->inspector_id)->email;
                                                    ?>
                                                @endif
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Inspector</label>
                                                        <input type="text" class="form-control contractor"
                                                            name="inspector_5"
                                                            value="@if ($all_50 != '') {{ $all_50->inspector }} @endif"
                                                            @if (\Illuminate\Support\Facades\Auth::user()->role_id == 1) readonly @endif>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Inspector Email</label>
                                                        <input type="text" class="form-control contractor"
                                                            name="inspector_email_5"
                                                            value="@if ($all_50 != '') {{ $all_50->inspector_email }} @endif"
                                                            @if (\Illuminate\Support\Facades\Auth::user()->role_id == 1) readonly @endif>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Superintendent</label>
                                                        <input type="text" class="form-control contractor"
                                                            name="superintendent_5"
                                                            value="@if ($all_50 != '') {{ $all_50->superintendent }} @endif"
                                                            @if (\Illuminate\Support\Facades\Auth::user()->role_id == 1) readonly @endif>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Superintendent Email</label>
                                                        <input type="text" class="form-control contractor"
                                                            name="superintendent_email_5"
                                                            value="@if ($all_50 != '') {{ $all_50->superintendent_email }} @endif"
                                                            @if (\Illuminate\Support\Facades\Auth::user()->role_id == 1) readonly @endif>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Requester Email</label>
                                                        <input type="text" class="form-control contractor"
                                                            name="requester_email_5"
                                                            value="@if ($all_50 != '') {{ $all_50->requester_email }} @endif"
                                                            @if (\Illuminate\Support\Facades\Auth::user()->role_id == 1) readonly @endif>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Superintendent Phone</label>
                                                        <input type="text" class="form-control contractor"
                                                            maxlength="10"
                                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                            name="superintendent_phone_5"
                                                            value="@if ($all_50 != '')
{{ $all_50->superintendent_phone }}
@endif"
                                                            @if (\Illuminate\Support\Facades\Auth::user()->role_id == 1)
                                                        readonly
                                                        @endif>
                                                    </div>
                                                </div>

                                                <div class="col-md-8"></div>

                                                <div class="col-md-6">








                                                    <div class="form-group">
                                                        <label for="">Document Spawn</label><br>
                                                        @if ($all_50 != '' && $all_50->document_spawn)

                                                            @if (\Illuminate\Support\Facades\Auth::user()->role_id == 2)
                                                                <a href="{{ url('admin/generatepdf/' . $application->id) }}"
                                                                    target="_blank">{{ $all_50->document_spawn }}</a>
                                                            @elseif (\Illuminate\Support\Facades\Auth::user()->role_id == 3)
                                                                <a href="{{ url('inspector/generatepdf/' . $application->id) }}"
                                                                    target="_blank">{{ $all_50->document_spawn }}</a>
                                                            @elseif (\Illuminate\Support\Facades\Auth::user()->role_id == 4)
                                                                <a href="{{ url('viewer/generatepdf/' . $application->id) }}"
                                                                    target="_blank">{{ $all_50->document_spawn }}</a>
                                                            @elseif (\Illuminate\Support\Facades\Auth::user()->role_id == 1)
                                                                <a href="{{ url('contractor/generatepdf/' . $application->id) }}"
                                                                    target="_blank">{{ $all_50->document_spawn }}</a>
                                                            @endif

                                                        @endif
                                                        {{-- <input type="file" class="form-control contractor" name="document_spawn" value="@if ($all_50 != '') {{ $all_50->document_spawn }} @endif" @if (\Illuminate\Support\Facades\Auth::user()->role_id == 1) readonly @endif> --}}
                                                        {{-- <img src="@if ($all_50 != '') {{ url('public/storage/uploads/'.$all_50->document_spawn) }} @endif" class="edit_photo" alt=""> --}}
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Inspection Document Creation
                                                            Date</label>
                                                        <input type="text" class="form-control contractor"
                                                            name="document_creation_date_5"
                                                            value="@if ($all_50 != '') {{ $all_50->document_creation_date }} @endif"
                                                            readonly>
                                                    </div>
                                                </div>

                                                <div
                                                    class="col-md-5 @if ($all_50 != '' && $all_50->inspection_sign == null) d-flex align-items-center @endif">
                                                    <button class="btn btn-success contractor inspectorSignOff"
                                                        @if ($all_50 != '' && $all_50->inspection_sign != null) style="pointer-events: none" @endif>Inspector
                                                        Sign Off</button>
                                                    <img src="{{ $all_50 != '' ? url('public/storage/uploads/' . $all_50->inspection_sign) : '' }}"
                                                        class="sign_img" alt="">
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Inspection Sign-Off Date</label>
                                                        <input type="text"
                                                            class="form-control hd-datepicker contractor"
                                                            name="inspection_sign_off_date_5"
                                                            value="@if ($all_50 != '') {{ $all_50->inspection_sign_off_date }} @endif"
                                                            @if (\Illuminate\Support\Facades\Auth::user()->role_id == 1) readonly @endif>
                                                    </div>
                                                </div>

                                                <div class="col-md-3"></div>

                                                <div
                                                    class="col-md-5 @if ($all_50 != '' && $all_50->homeowner_sign == null) d-flex align-items-center @endif">
                                                    <button class="btn btn-warning contractor homeownerSignOff"
                                                        @if ($all_50 != '' && $all_50->homeowner_sign != null) style="pointer-events: none" @endif>Homeowner
                                                        Sign Off</button>
                                                    <img src="{{ $all_50 != '' ? url('public/storage/uploads/' . $all_50->homeowner_sign) : '' }}"
                                                        class="sign_img" alt="">
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Homeowner Sign-Off Date</label>
                                                        <input type="text"
                                                            class="form-control hd-datepicker contractor"
                                                            name="homeowner_sign_off_date_5"
                                                            value="@if ($all_50 != '') {{ $all_50->homeowner_sign_off_date }} @endif"
                                                            @if (\Illuminate\Support\Facades\Auth::user()->role_id == 1) readonly @endif>
                                                    </div>
                                                </div>

                                                <div class="col-md-3"></div>

                                                <div
                                                    class="col-md-5 @if ($all_50 != '' && $all_50->superintendent_sign == null) d-flex align-items-center @endif">
                                                    <button class="btn btn-primary contractor superintendentSignOff"
                                                        @if ($all_50 != '' && $all_50->superintendent_sign != null) style="pointer-events: none" @endif>Superintendent
                                                        Sign Off</button>
                                                    <img src="{{ $all_50 != '' ? url('public/storage/uploads/' . $all_50->superintendent_sign) : '' }}"
                                                        class="sign_img" alt="">
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Superintendent Sign-off Date</label>
                                                        <input type="text"
                                                            class="form-control hd-datepicker contractor"
                                                            name="superintendent_sign_off_date_5"
                                                            value="@if ($all_50 != '') {{ $all_50->superintendent_sign_off_date }} @endif"
                                                            @if (\Illuminate\Support\Facades\Auth::user()->role_id == 1) readonly @endif>
                                                    </div>
                                                </div>

                                                {{-- <div class="col-md-3"></div> --}}

                                                {{-- <div class="col-md-4"> --}}
                                                {{-- <div class="form-group"> --}}
                                                {{-- <label for="">Document Name</label> --}}
                                                {{-- <input type="text" class="form-control contractor" name="document_name_5" value="@if ($all_50 != '') {{ $all_50->document_name }} @endif" @if (\Illuminate\Support\Facades\Auth::user()->role_id == 1) readonly @endif> --}}
                                                {{-- </div> --}}
                                                {{-- </div> --}}

                                                {{-- <div class="col-md-8"></div> --}}

                                                {{-- <div class="col-md-6"> --}}
                                                {{-- <div class="form-group"> --}}
                                                {{-- <label for="">Inspector formula signature</label> --}}
                                                {{-- <input type="text" class="form-control contractor" name="inspector_formula_sign_5"> --}}
                                                {{-- </div> --}}
                                                {{-- </div> --}}

                                                {{-- <div class="col-md-6"> --}}
                                                {{-- <div class="form-group"> --}}
                                                {{-- <label for="">Superintendent formula signature</label> --}}
                                                {{-- <input type="text" class="form-control contractor" name="superintendent_formula_sign_5"> --}}
                                                {{-- </div> --}}
                                                {{-- </div> --}}

                                                <div class="col-md-12"></div>

                                                <div class="col-md-6">
                                                    <a class="btn btn-success"
                                                        href="@if (\Illuminate\Support\Facades\Auth::user()->role_id == 2) {{ url('admin/generatepdf/' . $application->id) }}@else{{ url('inspector/generatepdf/' . $application->id) }} @endif">Print</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-52" role="tabpanel"
                                            aria-labelledby="pills-52-tab">
                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Confirm which Green Standard applies
                                                    </p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g5_i_1" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="Energy Star"@if (count($general_inspections) > 0 && $general_inspections[0] == 'Energy Star') selected @endif>
                                                            Energy Star</option>
                                                        <option
                                                            value="Green Building"@if (count($general_inspections) > 0 && $general_inspections[0] == 'Green Building') selected @endif>
                                                            Green Building</option>
                                                        {{-- <option value="N/A"@if (count($general_inspections) > 0 && $general_inspections[0] == 'N/A') selected @endif>N/A</option> --}}
                                                        {{-- <option value="Yes"@if (count($general_inspections) > 0 && $general_inspections[0] == 'Yes') selected @endif>Yes</option> --}}
                                                        {{-- <option value="No"@if (count($general_inspections) > 0 && $general_inspections[0] == 'No') selected @endif>No</option> --}}
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Resilient roof photos verified: 1)
                                                        Taped
                                                        decking seams 2) Button cap nails used</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g5_i_2" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($general_inspections) > 0 && $general_inspections[1] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($general_inspections) > 0 && $general_inspections[1] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($general_inspections) > 0 && $general_inspections[1] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Building permit, Elevation
                                                        Certificate,
                                                        Inspection green tags visible</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g5_i_3" class="form-control contractor"
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($general_inspections) > 0 && $general_inspections[2] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($general_inspections) > 0 && $general_inspections[2] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($general_inspections) > 0 && $general_inspections[2] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Confirm foundation municipal tag and
                                                        engineer’s report is issued (with the plans) and available (if
                                                        applicable)</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g5_i_4" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($general_inspections) > 0 && $general_inspections[3] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($general_inspections) > 0 && $general_inspections[3] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($general_inspections) > 0 && $general_inspections[3] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Verify it’s framed according to
                                                        plans,
                                                        correct number of rooms, bathrooms, windows and double check
                                                        elevation (option selection), roof, etc</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g5_i_5" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($general_inspections) > 0 && $general_inspections[4] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($general_inspections) > 0 && $general_inspections[4] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($general_inspections) > 0 && $general_inspections[4] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">At least one 36-inch entrance door
                                                        on an
                                                        accessible route served by no-step entrance or ramp</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g5_i_6" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($general_inspections) > 0 && $general_inspections[5] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($general_inspections) > 0 && $general_inspections[5] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($general_inspections) > 0 && $general_inspections[5] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Check finished slab surface
                                                        complete/plumbing entry points patched and cured</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g5_i_7" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($general_inspections) > 0 && $general_inspections[6] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($general_inspections) > 0 && $general_inspections[6] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($general_inspections) > 0 && $general_inspections[6] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">No subfloor areas of unevenness
                                                        exceeding 3/8 inch per 36 inches</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g5_i_8" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($general_inspections) > 0 && $general_inspections[7] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($general_inspections) > 0 && $general_inspections[7] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($general_inspections) > 0 && $general_inspections[7] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Confirm rough opening for interior
                                                        passage doors will accommodate a 32-inch door, unless the door
                                                        provides access only to closet of less than 15 sq. ft. in area
                                                    </p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g5_i_9" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($general_inspections) > 0 && $general_inspections[8] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($general_inspections) > 0 && $general_inspections[8] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($general_inspections) > 0 && $general_inspections[8] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Each hallway has a width of at least
                                                        36
                                                        inches and is level</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g5_i_10" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($general_inspections) > 0 && $general_inspections[9] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($general_inspections) > 0 && $general_inspections[9] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($general_inspections) > 0 && $general_inspections[9] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Anchor bolts, washer, nuts, all
                                                        tightened (if applicable)</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g5_i_11" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($general_inspections) > 0 && $general_inspections[10] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($general_inspections) > 0 && $general_inspections[10] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($general_inspections) > 0 && $general_inspections[10] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">2x6 joist hangers are installed at
                                                        attic/all areas, with appropriate number of nails</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g5_i_12" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($general_inspections) > 0 && $general_inspections[11] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($general_inspections) > 0 && $general_inspections[11] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($general_inspections) > 0 && $general_inspections[11] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Check AC drain installed and
                                                        visually
                                                        clear of debris</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g5_i_13" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($general_inspections) > 0 && $general_inspections[12] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($general_inspections) > 0 && $general_inspections[12] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($general_inspections) > 0 && $general_inspections[12] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Gas and electric meter location
                                                        reasonably near home</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g5_i_14" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($general_inspections) > 0 && $general_inspections[13] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($general_inspections) > 0 && $general_inspections[13] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($general_inspections) > 0 && $general_inspections[13] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>



                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Poly spray foam at slab and roof
                                                        baffles
                                                        done as required</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g5_i_16" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($general_inspections) > 0 && $general_inspections[15] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($general_inspections) > 0 && $general_inspections[15] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($general_inspections) > 0 && $general_inspections[15] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">All trade nail guards in place</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g5_i_17" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($general_inspections) > 0 && $general_inspections[16] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($general_inspections) > 0 && $general_inspections[16] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($general_inspections) > 0 && $general_inspections[16] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Framing is free from irregularities
                                                        such
                                                        as excessive mud, mildew, knots or flaws notching or scabbing,
                                                        or
                                                        overall damage. Note unusual nail patterns/usage</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g5_i_18" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($general_inspections) > 0 && $general_inspections[17] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($general_inspections) > 0 && $general_inspections[17] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($general_inspections) > 0 && $general_inspections[17] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Inside of home is free from debris
                                                        and
                                                        swept</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g5_i_19" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($general_inspections) > 0 && $general_inspections[18] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($general_inspections) > 0 && $general_inspections[18] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($general_inspections) > 0 && $general_inspections[18] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">All trash is picked up and placed in
                                                        trash area/dumpster</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g5_i_20" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($general_inspections) > 0 && $general_inspections[19] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($general_inspections) > 0 && $general_inspections[19] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($general_inspections) > 0 && $general_inspections[19] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>


                                        </div>
                                        <div class="tab-pane fade" id="pills-511" role="tabpanel"
                                            aria-labelledby="pills-511-tab">
                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Exterior walls are plumb and
                                                        straight
                                                        (no bows)</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="e5_i_1" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($exterior_inspections) > 0 && $exterior_inspections[0] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($exterior_inspections) > 0 && $exterior_inspections[0] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($exterior_inspections) > 0 && $exterior_inspections[0] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Lap Siding: 'HZ10' Hardie Plank, 6
                                                        1/4",
                                                        smooth or textured finish, pre-primed. (Installed measurement 5”
                                                        visible)</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="e5_i_2" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($exterior_inspections) > 0 && $exterior_inspections[1] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($exterior_inspections) > 0 && $exterior_inspections[1] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($exterior_inspections) > 0 && $exterior_inspections[1] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">All siding is free of deficiencies.
                                                        Note
                                                        any cracked, dented, bowed, or chipped siding that requires
                                                        replacement</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="e5_i_3" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($exterior_inspections) > 0 && $exterior_inspections[2] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($exterior_inspections) > 0 && $exterior_inspections[2] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($exterior_inspections) > 0 && $exterior_inspections[2] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">All butt-joints are less than 1/8
                                                        inch,
                                                        both siding and trim</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="e5_i_4" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($exterior_inspections) > 0 && $exterior_inspections[3] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($exterior_inspections) > 0 && $exterior_inspections[3] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($exterior_inspections) > 0 && $exterior_inspections[3] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Use trim nails on 1x4 Hardie trim
                                                        (siding)</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="e5_i_5" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($exterior_inspections) > 0 && $exterior_inspections[4] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($exterior_inspections) > 0 && $exterior_inspections[4] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($exterior_inspections) > 0 && $exterior_inspections[4] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">All roof jacks installed</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="e5_i_6" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($exterior_inspections) > 0 && $exterior_inspections[5] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($exterior_inspections) > 0 && $exterior_inspections[5] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($exterior_inspections) > 0 && $exterior_inspections[5] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Every door and window location and
                                                        size
                                                        are confirmed</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="e5_i_7" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($exterior_inspections) > 0 && $exterior_inspections[6] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($exterior_inspections) > 0 && $exterior_inspections[6] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($exterior_inspections) > 0 && $exterior_inspections[6] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Window and door openings are plumb
                                                    </p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="e5_i_8" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($exterior_inspections) > 0 && $exterior_inspections[7] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($exterior_inspections) > 0 && $exterior_inspections[7] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($exterior_inspections) > 0 && $exterior_inspections[7] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Sheathing on the house is cut tight,
                                                        straight, without gaps or holes, and nailed per plan
                                                        specifications
                                                    </p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="e5_i_9" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($exterior_inspections) > 0 && $exterior_inspections[8] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($exterior_inspections) > 0 && $exterior_inspections[8] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($exterior_inspections) > 0 && $exterior_inspections[8] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Two exterior hose bibs (front/back).
                                                    </p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="e5_i_10" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($exterior_inspections) > 0 && $exterior_inspections[9] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($exterior_inspections) > 0 && $exterior_inspections[9] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($exterior_inspections) > 0 && $exterior_inspections[9] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Verify minimum ½ inch expansion gap:
                                                        between siding and porch floor, and between ramp and siding</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="e5_i_11" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($exterior_inspections) > 0 && $exterior_inspections[10] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($exterior_inspections) > 0 && $exterior_inspections[10] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($exterior_inspections) > 0 && $exterior_inspections[10] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>


                                        </div>
                                        <div class="tab-pane fade" id="pills-53" role="tabpanel"
                                            aria-labelledby="pills-53-tab">
                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Each bathroom is reinforced with
                                                        blocking for potential grab bar installation as required.
                                                        (32-38''
                                                        High Minimum, ADA 2010)</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i5_i_1" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[0] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[0] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[0] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Verify water source located on a
                                                        short
                                                        wall, control is on either a long or short wall of roll-in
                                                        shower
                                                        when a permanent seat is present (if applicable) ADA 2010</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i5_i_2" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[1] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[1] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[1] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Check plan on sizes of ceiling
                                                        joists
                                                        and rafters. Check doubles around openings</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i5_i_3" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[2] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[2] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[2] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Studs are installed at 16 inches on
                                                        center</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i5_i_4" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[3] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[3] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[3] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>



                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Check windstorm clips are present
                                                    </p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i5_i_6" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[5] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[5] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[5] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">All receptacles (electric outlets)
                                                        at
                                                        least 15 inches above floor</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i5_i_7" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[6] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[6] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[6] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Light switches, fan switches and
                                                        thermostat no higher than 48 inches from floor</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i5_i_8" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[7] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[7] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[7] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Each breaker box is located not
                                                        higher
                                                        than 48 inches above the floor inside the building on the first
                                                        floor in the utility room or garage; unless the applicable
                                                        building
                                                        code or codes do not prescribe another location for the breaker
                                                        boxes</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i5_i_9" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[8] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[8] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[8] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Check all electrical clears door
                                                        casings, and that it is not behind door swing</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i5_i_10" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[9] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[9] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[9] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Smoke detector and carbon monoxide
                                                        detector locations wired</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i5_i_11" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[10] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[10] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[10] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">All walls and corners are plumb</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i5_i_12" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[11] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[11] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[11] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Toilets at 17-19 inches on center
                                                        from
                                                        side wall</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i5_i_13" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[12] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[12] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[12] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Space is provided on both sides of
                                                        doors
                                                        for casing</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i5_i_14" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($interior_inspections) > 0 && $interior_inspections[13] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($interior_inspections) > 0 && $interior_inspections[13] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($interior_inspections) > 0 && $interior_inspections[13] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>



                                        </div>
                                        <div class="tab-pane fade" id="pills-54" role="tabpanel"
                                            aria-labelledby="pills-54-tab">
                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Verify windows are compliant with
                                                        windstorm/Green Standard requirements</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="wd5_i_1" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($window_door_inspections) > 0 && $window_door_inspections[0] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($window_door_inspections) > 0 && $window_door_inspections[0] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($window_door_inspections) > 0 && $window_door_inspections[0] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Door and window headers are sized
                                                        properly, load-bearing and non load-bearing</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="wd5_i_2" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($window_door_inspections) > 0 && $window_door_inspections[1] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($window_door_inspections) > 0 && $window_door_inspections[1] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($window_door_inspections) > 0 && $window_door_inspections[1] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">House wrap is installed in all
                                                        window
                                                        and door openings prior to installation of windows/doors</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="wd5_i_3" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($window_door_inspections) > 0 && $window_door_inspections[2] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($window_door_inspections) > 0 && $window_door_inspections[2] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($window_door_inspections) > 0 && $window_door_inspections[2] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>


                                        </div>
                                        {{-- <div class="tab-pane fade" id="pills-55" role="tabpanel" aria-labelledby="pills-55-tab"> --}}
                                        {{-- <div class="row mb-2"> --}}
                                        {{-- <div class="col-md-3 text-right"> --}}
                                        {{-- <p class="font-weight-bolder">If lift present, ensure it is operable, and lift gates fasten securely</p> --}}
                                        {{-- </div> --}}
                                        {{-- <div class="col-md-2"> --}}
                                        {{-- <select name="a_i_1" class="form-control contractor " id=""> --}}
                                        {{-- <option value="N/A"@if (count($general_inspections) > 0 && $general_inspections[0] == 'N/A') selected @endif>N/A</option> --}}
                                        {{-- <option value="Yes"@if (count($general_inspections) > 0 && $general_inspections[0] == 'Yes') selected @endif>Yes</option> --}}
                                        {{-- <option value="No"@if (count($general_inspections) > 0 && $general_inspections[0] == 'No') selected @endif>No</option> --}}
                                        {{-- </select> --}}
                                        {{-- </div> --}}
                                        {{-- <div class="col-md-7"></div> --}}
                                        {{-- </div> --}}

                                        {{-- <div class="row mb-2"> --}}
                                        {{-- <div class="col-md-3 text-right"> --}}
                                        {{-- <p class="font-weight-bolder">Walk-in shower</p> --}}
                                        {{-- </div> --}}
                                        {{-- <div class="col-md-2"> --}}
                                        {{-- <select name="a_i_2" class="form-control contractor " id=""> --}}
                                        {{-- <option value="N/A"@if (count($general_inspections) > 0 && $general_inspections[0] == 'N/A') selected @endif>N/A</option> --}}
                                        {{-- <option value="Yes"@if (count($general_inspections) > 0 && $general_inspections[0] == 'Yes') selected @endif>Yes</option> --}}
                                        {{-- <option value="No"@if (count($general_inspections) > 0 && $general_inspections[0] == 'No') selected @endif>No</option> --}}
                                        {{-- </select> --}}
                                        {{-- </div> --}}
                                        {{-- <div class="col-md-7"></div> --}}
                                        {{-- </div> --}}

                                        {{-- <div class="row mb-2"> --}}
                                        {{-- <div class="col-md-3 text-right"> --}}
                                        {{-- <p class="font-weight-bolder">Grab bars installed properly</p> --}}
                                        {{-- </div> --}}
                                        {{-- <div class="col-md-2"> --}}
                                        {{-- <select name="a_i_3" class="form-control contractor " id=""> --}}
                                        {{-- <option value="N/A"@if (count($general_inspections) > 0 && $general_inspections[0] == 'N/A') selected @endif>N/A</option> --}}
                                        {{-- <option value="Yes"@if (count($general_inspections) > 0 && $general_inspections[0] == 'Yes') selected @endif>Yes</option> --}}
                                        {{-- <option value="No"@if (count($general_inspections) > 0 && $general_inspections[0] == 'No') selected @endif>No</option> --}}
                                        {{-- </select> --}}
                                        {{-- </div> --}}
                                        {{-- <div class="col-md-7"></div> --}}
                                        {{-- </div> --}}

                                        {{-- <div class="row mb-2"> --}}
                                        {{-- <div class="col-md-3 text-right"> --}}
                                        {{-- <p class="font-weight-bolder">Toilets exactly at 18 inches (on center) from finished side wall</p> --}}
                                        {{-- </div> --}}
                                        {{-- <div class="col-md-2"> --}}
                                        {{-- <select name="a_i_4" class="form-control contractor " id=""> --}}
                                        {{-- <option value="N/A"@if (count($general_inspections) > 0 && $general_inspections[0] == 'N/A') selected @endif>N/A</option> --}}
                                        {{-- <option value="Yes"@if (count($general_inspections) > 0 && $general_inspections[0] == 'Yes') selected @endif>Yes</option> --}}
                                        {{-- <option value="No"@if (count($general_inspections) > 0 && $general_inspections[0] == 'No') selected @endif>No</option> --}}
                                        {{-- </select> --}}
                                        {{-- </div> --}}
                                        {{-- <div class="col-md-7"></div> --}}
                                        {{-- </div> --}}

                                        {{-- <div class="row mb-2"> --}}
                                        {{-- <div class="col-md-3 text-right"> --}}
                                        {{-- <p class="font-weight-bolder">Toilet seat height is 17–19 inches from floor</p> --}}
                                        {{-- </div> --}}
                                        {{-- <div class="col-md-2"> --}}
                                        {{-- <select name="a_i_5" class="form-control contractor " id=""> --}}
                                        {{-- <option value="N/A"@if (count($general_inspections) > 0 && $general_inspections[0] == 'N/A') selected @endif>N/A</option> --}}
                                        {{-- <option value="Yes"@if (count($general_inspections) > 0 && $general_inspections[0] == 'Yes') selected @endif>Yes</option> --}}
                                        {{-- <option value="No"@if (count($general_inspections) > 0 && $general_inspections[0] == 'No') selected @endif>No</option> --}}
                                        {{-- </select> --}}
                                        {{-- </div> --}}
                                        {{-- <div class="col-md-7"></div> --}}
                                        {{-- </div> --}}

                                        {{-- <div class="row mb-2"> --}}
                                        {{-- <div class="col-md-3 text-right"> --}}
                                        {{-- <p class="font-weight-bolder">Inspector Observation Remarks3</p> --}}
                                        {{-- </div> --}}
                                        {{-- <div class="col-md-2"> --}}
                                        {{-- <select name="a_i_6" class="form-control contractor " id=""> --}}
                                        {{-- <option value="N/A"@if (count($general_inspections) > 0 && $general_inspections[0] == 'N/A') selected @endif>N/A</option> --}}
                                        {{-- <option value="Yes"@if (count($general_inspections) > 0 && $general_inspections[0] == 'Yes') selected @endif>Yes</option> --}}
                                        {{-- <option value="No"@if (count($general_inspections) > 0 && $general_inspections[0] == 'No') selected @endif>No</option> --}}
                                        {{-- </select> --}}
                                        {{-- </div> --}}
                                        {{-- <div class="col-md-7"></div> --}}
                                        {{-- </div> --}}
                                        {{-- </div> --}}
                                        <div class="tab-pane fade" id="pills-56" role="tabpanel"
                                            aria-labelledby="pills-56-tab">
                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">HVAC ductwork in place properly
                                                        installed, no gaps or openings</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="ra5_i_1" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($roof_attic_inspections) > 0 && $roof_attic_inspections[0] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($roof_attic_inspections) > 0 && $roof_attic_inspections[0] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($roof_attic_inspections) > 0 && $roof_attic_inspections[0] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">AC intakes/returns are on the main
                                                        floor
                                                    </p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="ra5_i_2" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($roof_attic_inspections) > 0 && $roof_attic_inspections[1] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($roof_attic_inspections) > 0 && $roof_attic_inspections[1] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($roof_attic_inspections) > 0 && $roof_attic_inspections[1] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">All windstorm/fortified
                                                        appurtenances
                                                        are in place</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="ra5_i_3" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($roof_attic_inspections) > 0 && $roof_attic_inspections[2] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($roof_attic_inspections) > 0 && $roof_attic_inspections[2] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($roof_attic_inspections) > 0 && $roof_attic_inspections[2] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>



                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Roof decking is installed with small
                                                        gap
                                                        1/16–1/8 inch on all end joints</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="ra5_i_5" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($roof_attic_inspections) > 0 && $roof_attic_inspections[4] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($roof_attic_inspections) > 0 && $roof_attic_inspections[4] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($roof_attic_inspections) > 0 && $roof_attic_inspections[4] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Roof sheathing is flat, no valleys
                                                        or
                                                        high places. Radiant barrier installed</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="ra5_i_6" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($roof_attic_inspections) > 0 && $roof_attic_inspections[5] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($roof_attic_inspections) > 0 && $roof_attic_inspections[5] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($roof_attic_inspections) > 0 && $roof_attic_inspections[5] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>



                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Roof sheathing is nailed per plan and
                                                        windstorm requirements</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="ra5_i_8" class="form-control contractor "
                                                        id="">
                                                        <option
                                                            value="N/A"@if (count($roof_attic_inspections) > 0 && $roof_attic_inspections[7] == 'N/A') selected @endif>
                                                            N/A</option>
                                                        <option
                                                            value="Yes"@if (count($roof_attic_inspections) > 0 && $roof_attic_inspections[7] == 'Yes') selected @endif>
                                                            Yes</option>
                                                        <option
                                                            value="No"@if (count($roof_attic_inspections) > 0 && $roof_attic_inspections[7] == 'No') selected @endif>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>




                                        </div>
                                        <div class="tab-pane fade" id="pills-57" role="tabpanel"
                                            aria-labelledby="pills-57-tab">
                                            <div class="row">
                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_1" name="photo_1_5"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_1) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_2" name="photo_2_5"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_2) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_3" name="photo_3_5"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_3) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_4" name="photo_4_5"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_4) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_5" name="photo_5_5"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_5) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_6" name="photo_6_5"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_6) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_7" name="photo_7_5"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_7) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_8" name="photo_8_5"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_8) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_9" name="photo_9_5"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_9) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_10" name="photo_10_5"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_10) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_11" name="photo_11_5"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_11) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_12" name="photo_12_5"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_12) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_13" name="photo_13_5"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_13) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_14" name="photo_14_5"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_14) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_15" name="photo_15_5"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_15) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_16" name="photo_16_5"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_16) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_17" name="photo_17_5"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_17) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_18" name="photo_18_5"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_18) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_19" name="photo_19_5"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_19) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_20" name="photo_20_5"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_20) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_21" name="photo_21_5"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_21) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_22" name="photo_22_5"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_22) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_23" name="photo_23_5"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_23) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_24" name="photo_24_5"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_24) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_25" name="photo_25_5"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_25) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_26" name="photo_26_5"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_26) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_27" name="photo_27_5"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_27) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_28" name="photo_28_5"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_28) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_29" name="photo_29_5"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_29) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_30" name="photo_30_5"
                                                        class="form-control contractor">
                                                    <img src="{{ $photo != '' ? url('public/storage/uploads/' . $photo->photo_30) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-58" role="tabpanel"
                                            aria-labelledby="pills-58-tab">
                                            <div class="row p-3">
                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 1</label>
                                                    <input type="text" class="form-control contractor"
                                                        name="deficiency_1_5"
                                                        value="{{ $deficiency != '' ? $deficiency->deficiency_1 : '' }}">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 1</label>
                                                    <input type="file" class="form-control contractor"
                                                        name="deficiency_photo_1_5">
                                                    <img src="{{ $deficiency != '' ? url('public/storage/uploads/' . $deficiency->deficiency_photo_1) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 2</label>
                                                    <input type="text" class="form-control contractor"
                                                        name="deficiency_2_5"
                                                        value="{{ $deficiency != '' ? $deficiency->deficiency_2 : '' }}">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 2</label>
                                                    <input type="file" class="form-control contractor"
                                                        name="deficiency_photo_2_5">
                                                    <img src="{{ $deficiency != '' ? url('public/storage/uploads/' . $deficiency->deficiency_photo_2) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 3</label>
                                                    <input type="text" class="form-control contractor"
                                                        name="deficiency_3_5"
                                                        value="{{ $deficiency != '' ? $deficiency->deficiency_3 : '' }}">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 3</label>
                                                    <input type="file" class="form-control contractor"
                                                        name="deficiency_photo_3_5">
                                                    <img src="{{ $deficiency != '' ? url('public/storage/uploads/' . $deficiency->deficiency_photo_3) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 4</label>
                                                    <input type="text" class="form-control contractor"
                                                        name="deficiency_4_5"
                                                        value="{{ $deficiency != '' ? $deficiency->deficiency_4 : '' }}">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 4</label>
                                                    <input type="file" class="form-control contractor"
                                                        name="deficiency_photo_4_5">
                                                    <img src="{{ $deficiency != '' ? url('public/storage/uploads/' . $deficiency->deficiency_photo_4) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 5</label>
                                                    <input type="text" class="form-control contractor"
                                                        name="deficiency_5_5"
                                                        value="{{ $deficiency != '' ? $deficiency->deficiency_5 : '' }}">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 5</label>
                                                    <input type="file" class="form-control contractor"
                                                        name="deficiency_photo_5_5">
                                                    <img src="{{ $deficiency != '' ? url('public/storage/uploads/' . $deficiency->deficiency_photo_5) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 6</label>
                                                    <input type="text" class="form-control contractor"
                                                        name="deficiency_6_5"
                                                        value="{{ $deficiency != '' ? $deficiency->deficiency_6 : '' }}">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 6</label>
                                                    <input type="file" class="form-control contractor"
                                                        name="deficiency_photo_6_5">
                                                    <img src="{{ $deficiency != '' ? url('public/storage/uploads/' . $deficiency->deficiency_photo_6) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 7</label>
                                                    <input type="text" class="form-control contractor"
                                                        name="deficiency_7_5"
                                                        value="{{ $deficiency != '' ? $deficiency->deficiency_7 : '' }}">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 7</label>
                                                    <input type="file" class="form-control contractor"
                                                        name="deficiency_photo_7_5">
                                                    <img src="{{ $deficiency != '' ? url('public/storage/uploads/' . $deficiency->deficiency_photo_7) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 8</label>
                                                    <input type="text" class="form-control contractor"
                                                        name="deficiency_8_5"
                                                        value="{{ $deficiency != '' ? $deficiency->deficiency_8 : '' }}">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 8</label>
                                                    <input type="file" class="form-control contractor"
                                                        name="deficiency_photo_8_5">
                                                    <img src="{{ $deficiency != '' ? url('public/storage/uploads/' . $deficiency->deficiency_photo_8) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 9</label>
                                                    <input type="text" class="form-control contractor"
                                                        name="deficiency_9_5"
                                                        value="{{ $deficiency != '' ? $deficiency->deficiency_9 : '' }}">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 9</label>
                                                    <input type="file" class="form-control contractor"
                                                        name="deficiency_photo_9_5">
                                                    <img src="{{ $deficiency != '' ? url('public/storage/uploads/' . $deficiency->deficiency_photo_9) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 10</label>
                                                    <input type="text" class="form-control contractor"
                                                        name="deficiency_10_5"
                                                        value="{{ $deficiency != '' ? $deficiency->deficiency_10 : '' }}">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 10</label>
                                                    <input type="file" class="form-control contractor"
                                                        name="deficiency_photo_10_5">
                                                    <img src="{{ $deficiency != '' ? url('public/storage/uploads/' . $deficiency->deficiency_photo_10) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 11</label>
                                                    <input type="text" class="form-control contractor"
                                                        name="deficiency_11_5"
                                                        value="{{ $deficiency != '' ? $deficiency->deficiency_11 : '' }}">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 11</label>
                                                    <input type="file" class="form-control contractor"
                                                        name="deficiency_photo_11_5">
                                                    <img src="{{ $deficiency != '' ? url('public/storage/uploads/' . $deficiency->deficiency_photo_11) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 12</label>
                                                    <input type="text" class="form-control contractor"
                                                        name="deficiency_12_5"
                                                        value="{{ $deficiency != '' ? $deficiency->deficiency_12 : '' }}">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 12</label>
                                                    <input type="file" class="form-control contractor"
                                                        name="deficiency_photo_12_5">
                                                    <img src="{{ $deficiency != '' ? url('public/storage/uploads/' . $deficiency->deficiency_photo_12) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 13</label>
                                                    <input type="text" class="form-control contractor"
                                                        name="deficiency_13_5"
                                                        value="{{ $deficiency != '' ? $deficiency->deficiency_13 : '' }}">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 13</label>
                                                    <input type="file" class="form-control contractor"
                                                        name="deficiency_photo_13_5">
                                                    <img src="{{ $deficiency != '' ? url('public/storage/uploads/' . $deficiency->deficiency_photo_13) : '' }}"
                                                        alt="" class="edit_photo">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-59" role="tabpanel"
                                            aria-labelledby="pills-59-tab">
                                            <div class="">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Additional Information 1</label>
                                                        <input type="text" class="form-control contractor"
                                                            name="additional_information_1_5"
                                                            value="{{ $all_50 != '' ? $all_50->additional_information_1 : '' }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Additional Information 2</label>
                                                        <input type="text" class="form-control contractor"
                                                            name="additional_information_2_5"
                                                            value="{{ $all_50 != '' ? $all_50->additional_information_2 : '' }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Additional Information 3</label>
                                                        <input type="text" class="form-control contractor"
                                                            name="additional_information_3_5"
                                                            value="{{ $all_50 != '' ? $all_50->additional_information_3 : '' }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Additional Information 4</label>
                                                        <input type="text" class="form-control contractor"
                                                            name="additional_information_4_5"
                                                            value="{{ $all_50 != '' ? $all_50->additional_information_4 : '' }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Additional Notes</label>
                                                        <input type="text" class="form-control contractor"
                                                            name="additional_notes_5"
                                                            value="{{ $all_50 != '' ? $all_50->additional_notes : '' }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Address Text</label>
                                                        <input type="text" class="form-control contractor"
                                                            name="address_text_5"
                                                            value="{{ $all_50 != '' ? $all_50->address_text : '' }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-510" role="tabpanel"
                                            aria-labelledby="pills-510-tab">
                                            <div class="form-group">
                                                <label for="">Attachment 1</label>
                                                <input type="file" class="form-control contractor"
                                                    name="attachment_1_5">
                                                @if ($all_50 != '' && $all_50->attachment_1)
                                                    <a href="{{ url('public/storage/uploads') . '/' . $all_50->attachment_1 }}"
                                                        target="_blank">{{ $all_50->attachment_1 }}</a>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label for="">iCal Text</label>
                                                <input type="text" class="form-control contractor"
                                                    name="ical_text_5"
                                                    value="{{ $all_50 != '' ? $all_50->ical_text : '' }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="">Contractor-Builder Name</label>
                                                <input type="text" class="form-control contractor"
                                                    name="contractor_builder_name_5"
                                                    value="{{ $all_50 != '' ? $all_50->contractor_builder_name : '' }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="">Thumb 1</label>
                                                <input type="file" class="form-control contractor"
                                                    name="thumb_1_5">
                                                @if ($all_50 != '' && $all_50->thumb_1)
                                                    <a href="{{ url('public/storage/uploads') . '/' . $all_50->thumb_1 }}"
                                                        target="_blank">{{ $all_50->thumb_1 }}</a>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label for="">Notify GLO</label>
                                                <input type="text" class="form-control contractor"
                                                    name="notify_glo_5"
                                                    value="{{ $all_50 != '' ? $all_50->notify_glo : '' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="submitType" name="submitType">
                        <div class="text-center">
                            <button type="submit" class="btn btn-warning mr-2 appBtn" data-id="saveClose"
                                style="width: 200px">Save and Close</button>
                            <button type="submit" class="btn btn-primary mr-2 appBtn " data-id="saveContinue"
                                style="width: 200px">Save and Continue</button>
                            <button type="submit" class="btn btn-success appBtn " data-id="savePrint"
                                style="width: 200px">Save and Print</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="inspectorSign">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Inspector Signature</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{-- <canvas id="signature" width="450" height="150" style="border: 1px solid #ddd;"></canvas> --}}
                    {{-- <br> --}}
                    {{-- <button id="clear-signature">Clear</button> --}}
                    <label class="" for="">Signature:</label>
                    <br />
                    <canvas id="canvas1" width="300" height="150" style="border:1px solid #000000;"></canvas>
                    {{-- <div id="sig" ></div> --}}
                    <br />
                    <button id="clear" class="btn btn-danger btn-sm mt-1">Clear Signature</button>
                    <textarea id="signature64" name="signed" style="display: none"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary saveInspectorSign">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="homeownerSign">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Homeowner Signature</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{-- <canvas id="signature" width="450" height="150" style="border: 1px solid #ddd;"></canvas> --}}
                    {{-- <br> --}}
                    {{-- <button id="clear-signature">Clear</button> --}}
                    <label class="" for="">Signature:</label>
                    <br />
                    <canvas id="canvas2" width="300" height="150" style="border:1px solid #000000;"></canvas>
                    {{-- <div id="sig1" ></div> --}}
                    <br />
                    <button id="clear1" class="btn btn-danger btn-sm mt-1">Clear Signature</button>
                    <textarea id="signature641" name="signed" style="display: none"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary saveHomeownerSign">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="superintendentSign">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Superintendent Signature</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{-- <canvas id="signature" width="450" height="150" style="border: 1px solid #ddd;"></canvas> --}}
                    {{-- <br> --}}
                    {{-- <button id="clear-signature">Clear</button> --}}
                    <label class="" for="">Signature:</label>
                    <br />
                    <canvas id="canvas3" width="300" height="150" style="border:1px solid #000000;"></canvas>
                    {{-- <div id="sig2" ></div> --}}
                    <br />
                    <button id="clear2" class="btn btn-danger btn-sm mt-1">Clear Signature</button>
                    <textarea id="signature642" name="signed" style="display: none"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary saveSuperintendentSign">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>



    @if (session()->has('message'))
        <input type="hidden" id="message" value="{!! session('message') !!}">
    @endif
    <!-- /main Section -->
@endsection
@push('scripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js">
    </script>

    <script src="{{ asset('assets/js/jquery.signature.min.js') }}"></script>

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jquery.signature.css') }}">

    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
    <script src="http://parsleyjs.org/dist/parsley.js"></script>
    <script>
        $(function() {
            const canvas1 = document.querySelector("#canvas1");
            const signaturePad1 = new SignaturePad(canvas1);

            const canvas2 = document.querySelector("#canvas2");
            const signaturePad2 = new SignaturePad(canvas2);

            const canvas3 = document.querySelector("#canvas3");
            const signaturePad3 = new SignaturePad(canvas3);

            $('.saveInspectorSign').on("click", function(e) {
                e.preventDefault();
                let id = $('#id').val();
                let formdata = new FormData();
                formdata.append('signed', signaturePad1.toDataURL())
                formdata.append('id', id)
                formdata.append('type', 'inspector')
                axios.post('{{ url('uploadSign') }}', formdata)
                    .then(response => {
                        document.querySelector('input[name="inspection_sign_off_date"]').value =
                            '{{ date('m/d/Y') }}';
                        document.querySelector('input[name="inspection_sign_off_date_5"]').value =
                            '{{ date('m/d/Y') }}';
                        $('#inspectorSign').modal('hide');
                    })
            })

            $('.saveHomeownerSign').on("click", function(e) {
                e.preventDefault();
                let id = $('#id').val();
                let formdata = new FormData();
                formdata.append('signed', signaturePad2.toDataURL())
                formdata.append('id', id)
                formdata.append('type', 'homeowner')
                axios.post('{{ url('uploadSign') }}', formdata)
                    .then(response => {
                        document.querySelector('input[name="homeowner_sign_off_date"]').value =
                            '{{ date('m/d/Y') }}';
                        document.querySelector('input[name="homeowner_sign_off_date_5"]').value =
                            '{{ date('m/d/Y') }}';
                        $('#homeownerSign').modal('hide');
                    })
            })

            $('.saveSuperintendentSign').on("click", function(e) {
                e.preventDefault();
                let id = $('#id').val();
                let formdata = new FormData();
                formdata.append('signed', signaturePad3.toDataURL())
                formdata.append('id', id)
                formdata.append('type', 'superintendent')
                axios.post('{{ url('uploadSign') }}', formdata)
                    .then(response => {
                        document.querySelector('input[name="superintendent_sign_off_date"]').value =
                            '{{ date('m/d/Y') }}';
                        document.querySelector('input[name="superintendent_sign_off_date_5"]').value =
                            '{{ date('m/d/Y') }}';
                        $('#superintendentSign').modal('hide');
                    })
            })

            $('#clear').click(function(e) {
                e.preventDefault();
                // sig.signature('clear');
                // $("#signature64").val('');
                signaturePad1.clear();
                let id = $('#id').val();
                let formdata = new FormData();
                formdata.append('id', id)
                formdata.append('type', 'inspector')
                axios.post('{{ url('removeSign') }}', formdata)
                    .then(response => {
                        document.querySelector('input[name="inspection_sign_off_date"]').value = '';
                        document.querySelector('input[name="inspection_sign_off_date_5"]').value = '';
                        $('#inspectorSign').modal('hide');
                    })
            });

            $('#clear1').click(function(e) {
                e.preventDefault();
                // sig1.signature('clear');
                // $("#signature641").val('');
                signaturePad2.clear();
                let id = $('#id').val();
                let formdata = new FormData();
                formdata.append('id', id)
                formdata.append('type', 'homeowner')
                axios.post('{{ url('removeSign') }}', formdata)
                    .then(response => {
                        document.querySelector('input[name="homeowner_sign_off_date"]').value = '';
                        document.querySelector('input[name="homeowner_sign_off_date_5"]').value = '';
                        $('#homeownerSign').modal('hide');
                    })
            });

            $('#clear2').click(function(e) {
                e.preventDefault();
                // sig2.signature('clear');
                // $("#signature642").val('');
                signaturePad3.clear();
                let id = $('#id').val();
                let formdata = new FormData();
                formdata.append('id', id)
                formdata.append('type', 'superintendent')
                axios.post('{{ url('removeSign') }}', formdata)
                    .then(response => {
                        document.querySelector('input[name="superintendent_sign_off_date"]').value = '';
                        document.querySelector('input[name="superintendent_sign_off_date_5"]').value =
                            '';
                        $('#superintendentSign').modal('hide');
                    })
            });
        })
        $('.appBtn').on("click", function(e) {
            e.preventDefault();
            let val = $(this).data("id");
            $('#submitType').val(val);
            if (val == 'savePrint') {
                setTimeout(function() {
                    window.location.replace('{{ url('/') }}');
                }, 5000);
            }
            $('#applicationForm').submit();
        })

        let check = 0;
        $(function() {
            function addressAutocomplete(containerElement, callback, options) {
                // create container for input element
                const inputContainerElement = document.createElement("div");
                inputContainerElement.setAttribute("class", "input-container");
                containerElement.appendChild(inputContainerElement);

                // create input element
                const inputElement = document.createElement("input");
                inputElement.setAttribute("type", "text");
                inputElement.classList.add("form-control");
                inputElement.setAttribute("id", "auto-address");
                inputElement.setAttribute("name", "applicant_street_address");
                inputElement.setAttribute("placeholder", options.placeholder);
                if (check == 0) {
                    inputElement.setAttribute("value", '{{ $application->applicant_address }}')
                    check++;
                }
                inputContainerElement.appendChild(inputElement);

                setTimeout(function addressAutocomplete(containerElement, callback, options) {

                    const MIN_ADDRESS_LENGTH = 3;
                    const DEBOUNCE_DELAY = 300;
                    let currentTimeout = 100;
                    let currentPromiseReject;
                    let promise;
                    /* Process a user input: */
                    let inputElement = document.getElementById('auto-address');
                    inputElement.addEventListener("input", function(e) {
                        const currentValue = this.value;

                        // Cancel previous timeout
                        if (currentTimeout) {
                            clearTimeout(currentTimeout);
                        }

                        // Cancel previous request promise
                        if (currentPromiseReject) {
                            currentPromiseReject({
                                canceled: true
                            });
                        }

                        // Skip empty or short address strings
                        if (!currentValue || currentValue.length < MIN_ADDRESS_LENGTH) {
                            return false;
                        }

                        /* Call the Address Autocomplete API with a delay */
                        currentTimeout = setTimeout(() => {
                            currentTimeout = null;

                            /* Create a new promise and send geocoding request */
                            const promise = new Promise((resolve, reject) => {
                                currentPromiseReject = reject;

                                // Get an API Key on https://myprojects.geoapify.com
                                const apiKey = "90b19e245a5e4ac8a5784e0f2dd7f9c4";

                                var url =
                                    `https://api.geoapify.com/v1/geocode/autocomplete?text=${encodeURIComponent(currentValue)}&format=json&limit=5&filter=countrycode:us&apiKey=${apiKey}`;

                                fetch(url)
                                    .then(response => {
                                        currentPromiseReject = null;

                                        // check if the call was successful
                                        if (response.ok) {
                                            response.json().then(data =>
                                                resolve(data));
                                        } else {
                                            response.json().then(data => reject(
                                                data));
                                        }
                                    });
                            });

                            promise.then((data) => {
                                /*create a DIV element that will contain the items (values):*/
                                $('.autocomplete-items').remove();
                                const autocompleteItemsElement = document
                                    .createElement("div");
                                autocompleteItemsElement.setAttribute("class",
                                    "autocomplete-items");
                                inputContainerElement.appendChild(
                                    autocompleteItemsElement);

                                /* For each item in the results */
                                data.results.forEach((result, index) => {
                                    /* Create a DIV element for each element: */
                                    const itemElement = document
                                        .createElement("div");
                                    /* Set formatted address as item value */
                                    itemElement.innerHTML = result
                                        .formatted;
                                    autocompleteItemsElement.appendChild(
                                        itemElement);
                                });
                                // here we get address suggestions

                                $('.autocomplete-items div').on("click",
                                    function() {
                                        $('#auto-address').val($(this).text())
                                        $('.autocomplete-items').remove();
                                        console.log($(this).text())
                                    })

                                console.log(data);
                            }, (err) => {
                                if (!err.canceled) {
                                    console.log(err);
                                }
                            });
                        }, DEBOUNCE_DELAY);
                    });

                    function closeDropDownList() {
                        var autocompleteItemsElement = inputContainerElement.querySelector(
                            ".autocomplete-items");
                        if (autocompleteItemsElement) {
                            inputContainerElement.removeChild(autocompleteItemsElement);
                        }
                    }
                }, 1000)
            }

            addressAutocomplete(document.getElementById("autocomplete-container"), (data) => {
                console.log("Selected option: ");
                console.log(data);
            }, {
                placeholder: "Enter an address here"
            });


        })

        $('.inspectorSignOff').on("click", function(e) {
            e.preventDefault();
            $('#inspectorSign').modal();
        })

        {{-- $('.saveInspectorSign').on("click", function (e) { --}}
        {{-- e.preventDefault(); --}}
        {{-- let id = $('#id').val(); --}}
        {{-- let formdata = new FormData(); --}}
        {{-- formdata.append('signed', $('#signature64').val()) --}}
        {{-- formdata.append('id', id) --}}
        {{-- formdata.append('type', 'inspector') --}}
        {{-- axios.post('{{ url('uploadSign') }}', formdata) --}}
        {{-- .then(response => { --}}
        {{-- document.querySelector('input[name="inspection_sign_off_date"]').value = '{{ date('m/d/Y') }}'; --}}
        {{-- document.querySelector('input[name="inspection_sign_off_date_5"]').value = '{{ date('m/d/Y') }}'; --}}
        {{-- $('#inspectorSign').modal('hide'); --}}
        {{-- }) --}}
        {{-- }) --}}

        $('.homeownerSignOff').on("click", function(e) {
            e.preventDefault();
            $('#homeownerSign').modal();
        })

        {{-- $('.saveHomeownerSign').on("click", function (e) { --}}
        {{-- e.preventDefault(); --}}
        {{-- let id = $('#id').val(); --}}
        {{-- let formdata = new FormData(); --}}
        {{-- formdata.append('signed', $('#signature641').val()) --}}
        {{-- formdata.append('id', id) --}}
        {{-- formdata.append('type', 'homeowner') --}}
        {{-- axios.post('{{ url('uploadSign') }}', formdata) --}}
        {{-- .then(response => { --}}
        {{-- document.querySelector('input[name="homeowner_sign_off_date"]').value = '{{ date('m/d/Y') }}'; --}}
        {{-- document.querySelector('input[name="homeowner_sign_off_date_5"]').value = '{{ date('m/d/Y') }}'; --}}
        {{-- $('#homeownerSign').modal('hide'); --}}
        {{-- }) --}}
        {{-- }) --}}

        $('.superintendentSignOff').on("click", function(e) {
            e.preventDefault();
            $('#superintendentSign').modal();
        })

        {{-- $('.saveSuperintendentSign').on("click", function (e) { --}}
        {{-- e.preventDefault(); --}}
        {{-- let id = $('#id').val(); --}}
        {{-- let formdata = new FormData(); --}}
        {{-- formdata.append('signed', $('#signature642').val()) --}}
        {{-- formdata.append('id', id) --}}
        {{-- formdata.append('type', 'superintendent') --}}
        {{-- axios.post('{{ url('uploadSign') }}', formdata) --}}
        {{-- .then(response => { --}}
        {{-- document.querySelector('input[name="superintendent_sign_off_date"]').value = '{{ date('m/d/Y') }}'; --}}
        {{-- document.querySelector('input[name="superintendent_sign_off_date_5"]').value = '{{ date('m/d/Y') }}'; --}}
        {{-- $('#superintendentSign').modal('hide'); --}}
        {{-- }) --}}
        {{-- }) --}}

        $(document).ready(function() {
            // var canvas = document.getElementById("signature");
            // var signaturePad = new SignaturePad(canvas);
            //
            // $('#clear-signature').on('click', function(){
            //     signaturePad.clear();
            // });
            //
            //

            {{-- let sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'}); --}}
            {{-- $('#clear').click(function(e) { --}}
            {{-- e.preventDefault(); --}}
            {{-- sig.signature('clear'); --}}
            {{-- $("#signature64").val(''); --}}
            {{-- let id = $('#id').val(); --}}
            {{-- let formdata = new FormData(); --}}
            {{-- formdata.append('id', id) --}}
            {{-- formdata.append('type', 'inspector') --}}
            {{-- axios.post('{{ url('removeSign') }}', formdata) --}}
            {{-- .then(response => { --}}
            {{-- document.querySelector('input[name="inspection_sign_off_date"]').value = ''; --}}
            {{-- document.querySelector('input[name="inspection_sign_off_date_5"]').value = ''; --}}
            {{-- $('#inspectorSign').modal('hide'); --}}
            {{-- }) --}}
            {{-- }); --}}

            {{-- let sig1 = $('#sig1').signature({syncField: '#signature641', syncFormat: 'PNG'}); --}}
            {{-- $('#clear1').click(function(e) { --}}
            {{-- e.preventDefault(); --}}
            {{-- sig1.signature('clear'); --}}
            {{-- $("#signature641").val(''); --}}
            {{-- let id = $('#id').val(); --}}
            {{-- let formdata = new FormData(); --}}
            {{-- formdata.append('id', id) --}}
            {{-- formdata.append('type', 'homeowner') --}}
            {{-- axios.post('{{ url('removeSign') }}', formdata) --}}
            {{-- .then(response => { --}}
            {{-- document.querySelector('input[name="homeowner_sign_off_date"]').value = ''; --}}
            {{-- document.querySelector('input[name="homeowner_sign_off_date_5"]').value = ''; --}}
            {{-- $('#homeownerSign').modal('hide'); --}}
            {{-- }) --}}
            {{-- }); --}}

            {{-- let sig2 = $('#sig2').signature({syncField: '#signature642', syncFormat: 'PNG'}); --}}
            {{-- $('#clear2').click(function(e) { --}}
            {{-- e.preventDefault(); --}}
            {{-- sig2.signature('clear'); --}}
            {{-- $("#signature642").val(''); --}}
            {{-- let id = $('#id').val(); --}}
            {{-- let formdata = new FormData(); --}}
            {{-- formdata.append('id', id) --}}
            {{-- formdata.append('type', 'superintendent') --}}
            {{-- axios.post('{{ url('removeSign') }}', formdata) --}}
            {{-- .then(response => { --}}
            {{-- document.querySelector('input[name="superintendent_sign_off_date"]').value = ''; --}}
            {{-- document.querySelector('input[name="superintendent_sign_off_date_5"]').value = ''; --}}
            {{-- $('#superintendentSign').modal('hide'); --}}
            {{-- }) --}}
            {{-- }); --}}


            if ($('#inspection_type').val() == "50%") {
                $('.p100_div').css("display", "none")
                $('.pRehab_div').css("display", "none")
                $('.p50_div').css("display", 'block')
            } else if ($('#inspection_type').val() == "REHAB") {
                $('.pRehab_div').css("display", "block")
                $('.p100_div').css("display", "none")
                $('.p50_div').css("display", 'none')
            } else {
                $('.p100_div').css("display", "block")
                $('.pRehab_div').css("display", "none")
                $('.p50_div').css("display", 'none')
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
            if (message === 'application_updated') {
                Toast.fire({
                    icon: 'success',
                    title: 'Application updated successfully'
                })
            } else if (message == 'failed') {
                Toast.fire({
                    icon: 'error',
                    title: 'Failed. Try again'
                })
            }
        })

        $('#inspection_type').on("change", function() {
            if ($('#inspection_type').val() == "50%") {
                $('.p100_div').css("display", "none")
                $('.pRehab_div').css("display", "none")
                $('.p50_div').css("display", 'block')
            } else if ($('#inspection_type').val() == "REHAB") {
                $('.pRehab_div').css("display", "block")
                $('.p100_div').css("display", "none")
                $('.p50_div').css("display", 'none')
            } else {
                $('.p100_div').css("display", "block")
                $('.pRehab_div').css("display", "none")
                $('.p50_div').css("display", 'none')
            }
        })

        {{ date_default_timezone_set('America/Chicago') }}
        $('.timepicker').timepicker({
            timeFormat: 'h:mm p',
            interval: 60,
            minTime: '6:00am',
            maxTime: '8:00pm',
            startTime: '6:00am',
            dynamic: false,
            dropdown: true,
            scrollbar: true
        });
    </script>
@endpush
