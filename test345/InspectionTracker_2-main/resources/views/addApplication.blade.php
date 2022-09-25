@extends('.layouts.app')

@section('title', __('Add Application'))

@section('content')
    <style>
        .checkbox_input:hover {
            -webkit-appearance: auto !important;
        }

        .checkbox_input:focus {
            -webkit-appearance: auto !important;
        }

        @if(\Illuminate\Support\Facades\Auth::user()->role_id == 1)
            .contractor {
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
                            <div></div><div></div><div></div><div></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-10">
                <div class="col-lg-12 mb-30">
                    <form method="post" action="{{ url('create-application') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card mb-10">
                            <div class="card-header">Required Documents</div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="company_name"> Document Name</label>
                                            <input type="text" name="document_names1" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="company_name"> Document Attachment</label>
                                            <input type="file" name="document_files1" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="company_name"> Document Name</label>
                                            <input type="text" name="document_names6" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="company_name"> Document Attachment</label>
                                            <input type="file" name="document_files6" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" name="document_names2" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="file" name="document_files2" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" name="document_names3" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="file" name="document_files3" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" name="document_names4" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="file" name="document_files4" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" name="document_names5" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="file" name="document_files5" class="form-control">
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
                                            <input type="text" name="hriq_id" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="company_name" style="display: block"> Submitted to GLO</label>
                                            <input type="checkbox" name="submitted_to_glo" class="checkbox_input" value="yes">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="company_name" style="display: block"> Date of GLO Submission</label>
                                            <input type="text" name="date_glo_submission" class="form-control hd-datepicker" placeholder="yyyy-mm-dd">
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
                                            <label for="company_name"><span class="red">*</span> Name</label>
                                            <input type="text" name="applicant_name" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="company_name"> Street Address</label>
                                            <input type="text" name="applicant_street_address" id="applicant_street_address" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="company_name"> City</label>
                                            <input type="text" name="applicant_city" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="company_name"> County</label>
                                            <input type="text" name="applicant_county" class="form-control">
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                        @php
                                    $requester_name = '';
                                    $requester_email = '';
                                    $requester_phone = '';
                                    $company = '';

                                if(\Illuminate\Support\Facades\Auth::user()->role_id == 1) {
                                    $requester = \App\Models\User::find(\Illuminate\Support\Facades\Auth::user()->id);
                                    $requester_name = $requester->name;
                                    $requester_email = $requester->email;
                                    $requester_phone = $requester->phone;
                                    $company = \App\Models\Company::find(\Illuminate\Support\Facades\Auth::user()->company_id)->name;
                                }
                        @endphp

                        <div class="card mb-10">
                            <div class="card-header">Requester Details</div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="company_name"><span class="red">*</span> Name</label>
                                            <input type="text" name="requester_name" class="form-control" value="{{ $requester_name }}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="company_name"><span class="red">*</span> Email</label>
                                            <input type="email" name="requester_email_1" class="form-control" value="{{ $requester_email }}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="company_name"><span class="red">*</span> Phone</label>
                                            <input type="number" name="requester_phone" class="form-control" value="{{ $requester_phone }}" required maxlength="10" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="company_name"><span class="red">*</span> Company</label>
                                            <input type="text" name="company" class="form-control" value="{{ $company }}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="company_name"><span class="red">*</span> Requested Date</label>
                                            <input type="text" name="requested_date" class="form-control hd-datepicker" value="{{ date('m/d/Y') }}" required @if(\Illuminate\Support\Facades\Auth::user()->role_id == 1 ||
                                            \Illuminate\Support\Facades\Auth::user()->role_id == 2 ||
                                            \Illuminate\Support\Facades\Auth::user()->role_id == 3) style="pointer-events: none;" @endif>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="company_name"><span class="red">*</span> Requested Time</label>
                                            <input type="text" class="form-control timepicker" name="requested_time" value="{{ date('h:i A') }}" @if(\Illuminate\Support\Facades\Auth::user()->role_id == 1 ||
                                            \Illuminate\Support\Facades\Auth::user()->role_id == 2 ||
                                            \Illuminate\Support\Facades\Auth::user()->role_id == 3)  style="pointer-events: none;" @endif>
                                            {{--                                            <select name="requested_time" class="form-control " id="" @if(\Illuminate\Support\Facades\Auth::user()->role_id == 3) style="pointer-events: none" @endif>--}}
                                            {{--                                                <option value="AM" @if($application->requested_time == 'AM') selected @endif>AM</option>--}}
                                            {{--                                                <option value="PM" @if($application->requested_time == 'PM') selected @endif>PM</option>--}}
                                            {{--                                                <option value="No Preference"@if($application->requested_time == 'No Preference') selected @endif>No Preference</option>--}}
                                            {{--                                            </select>--}}
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="company_name"><span class="red">*</span> Construction Type</label>
                                            <select name="construction_type" class="form-control" id="" required>
                                                <option value="">Please Select</option>
                                                <option value="Recon">Recon</option>
                                                <option value="Repair">Repair</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="company_name"><span class="red">*</span> Inspection Type</label>
                                            <select name="inspection_type" class="form-control" id="inspection_type" required>
                                                <option value="">Please Select</option>
                                                <option value="50%">50%</option>
                                                <option value="100%">100%</option>
                                                <option value="REHAB">REHAB</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="company_name"><span class="red">*</span> Floor Plan</label>
                                            <select name="floor_plan" class="form-control" id="" required>
                                                <option value="">Please Select</option>
                                                @foreach($floorplans as $floorplan)
                                                    <option value="{{ $floorplan->id }}">{{ $floorplan->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="company_name"><span class="red">*</span> Region</label>
                                            <select name="region" class="form-control" id="" required>
                                                <option value="">Please Select</option>
                                                <option value="HGAC">HGAC</option>
                                                <option value="HGAC-E">HGAC-E</option>
                                                <option value="DET">DET</option>
                                                <option value="DETCOG">DETCOG</option>
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
                                            <input type="text" name="onsite_supervisor_name" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="company_name"><span class="red">*</span> Email</label>
                                            <input type="email" name="onsite_supervisor_email" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="company_name"><span class="red">*</span> Phone</label>
                                            <input type="number" name="onsite_supervisor_phone" class="form-control" required  maxlength="10" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
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
                                            <select name="inspector_assigned" class="form-control" id="" @if(\Illuminate\Support\Facades\Auth::user()->role_id == 1 || \Illuminate\Support\Facades\Auth::user()->role_id == 3) disabled @endif>
                                                <option value="">Please Select</option>
                                                @foreach($inspectors as $inspection)
                                                    <option value="{{ $inspection->id }}">{{ $inspection->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="company_name"> Inspection Status</label>
                                            <select name="inspection_status" class="form-control contractor" id="">
                                                <option value="">Please Select</option>
                                                <option value="Scheduled">Scheduled</option>
                                                <option value="Submitted">Submitted</option>
                                                <option value="Canceled">Canceled</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="company_name"> Scheduled Inspection Date</label>
                                            <input type="text" name="scheduled_inspection_date" class="form-control hd-datepicker" @if(\Illuminate\Support\Facades\Auth::user()->role_id == 1 || \Illuminate\Support\Facades\Auth::user()->role_id == 3) style="pointer-events: none" @endif>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="company_name"> Scheduled Inspection Time</label>
                                            <div class="d-flex">
                                                <input type="text" name="scheduled_inspection_time" class="form-control timepicker2" @if(\Illuminate\Support\Facades\Auth::user()->role_id == 1 || \Illuminate\Support\Facades\Auth::user()->role_id == 3)  style="pointer-events: none" @endif>
{{--                                                <input type="text" name="scheduled_inspection_time2" class="form-control mr-2" @if(\Illuminate\Support\Facades\Auth::user()->role_id == 1 || \Illuminate\Support\Facades\Auth::user()->role_id == 3) readonly @endif>--}}
{{--                                                <select name="scheduled_inspection_time2" class="form-control contractor" id="">--}}
{{--                                                    <option value="AM">AM</option>--}}
{{--                                                    <option value="PM">PM</option>--}}
{{--                                                </select>--}}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="company_name"> Comments</label>
                                            <textarea name="comments" class="form-control" id="" cols="30" rows="10" @if(\Illuminate\Support\Facades\Auth::user()->role_id == 1 || \Illuminate\Support\Facades\Auth::user()->role_id == 3) readonly @endif></textarea>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="card mb-10 p100_div">
                            <div class="card-body">
                                <div class="row">
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="pills-1-tab" data-toggle="pill" href="#pills-1" role="tab" aria-controls="pills-1" aria-selected="true">Print</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="pills-2-tab" data-toggle="pill" href="#pills-2" role="tab" aria-controls="pills-2" aria-selected="false">General Inspection</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="pills-11-tab" data-toggle="pill" href="#pills-11" role="tab" aria-controls="pills-11" aria-selected="false">Exterior Inspection</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="pills-3-tab" data-toggle="pill" href="#pills-3" role="tab" aria-controls="pills-3" aria-selected="false">Interior Inspection</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="pills-4-tab" data-toggle="pill" href="#pills-4" role="tab" aria-controls="pills-4" aria-selected="false">Electrical Inspection</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="pills-5-tab" data-toggle="pill" href="#pills-5" role="tab" aria-controls="pills-5" aria-selected="false">Accessibility Inspection</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="pills-7-tab" data-toggle="pill" href="#pills-7" role="tab" aria-controls="pills-7" aria-selected="false">Photos</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="pills-8-tab" data-toggle="pill" href="#pills-8" role="tab" aria-controls="pills-8" aria-selected="false">Deficiencies</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="pills-9-tab" data-toggle="pill" href="#pills-9" role="tab" aria-controls="pills-9" aria-selected="false">Notes & Info</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="pills-10-tab" data-toggle="pill" href="#pills-10" role="tab" aria-controls="pills-10" aria-selected="false">Corrections</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="pills-tabContent" style="width: 100% !important;">
                                        <div class="tab-pane fade show active" id="pills-1" role="tabpanel" aria-labelledby="pills-1-tab">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="checkbox" class="mr-1 checkbox_input contractor" name="cancellation_request" @if(\Illuminate\Support\Facades\Auth::user()->role_id == 1) readonly @endif><label for="">Cancellation Request</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Date Inspected</label>
                                                        <input type="text" class="form-control contractor hd-datepicker contractor" name="date_inspected">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Inspector</label>
                                                        <input type="text" class="form-control contractor" name="inspector">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Inspector Email</label>
                                                        <input type="text" class="form-control contractor" name="inspector_email">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Superintendent</label>
                                                        <input type="text" class="form-control contractor" name="superintendent">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Superintendent Email</label>
                                                        <input type="text" class="form-control contractor" name="superintendent_email">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Requester Email</label>
                                                        <input type="text" class="form-control contractor" name="requester_email" value="{{ $requester_email }}">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Superintendent Phone</label>
                                                        <input type="number" class="form-control contractor" name="superintendent_phone" maxlength="10" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                                    </div>
                                                </div>

                                                <div class="col-md-8"></div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Document Spawn</label>
                                                        <input type="text" class="form-control contractor" name="document_spawn">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Inspection Document Creation Date</label>
                                                        <input type="text" class="form-control contractor hd-datepicker" name="document_creation_date">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Inspection Sign-Off Date</label>
                                                        <input type="text" class="form-control contractor hd-datepicker" name="inspection_sign_off_date">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Homeowner Sign-Off Date</label>
                                                        <input type="text" class="form-control contractor hd-datepicker" name="homeowner_sign_off_date">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Superintendent Sign-off Date</label>
                                                        <input type="text" class="form-control contractor hd-datepicker" name="superintendent_sign_off_date">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Document Name</label>
                                                        <input type="text" class="form-control contractor" name="document_name">
                                                    </div>
                                                </div>

                                                <div class="col-md-8"></div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Inspector formula signature</label>
                                                        <input type="text" class="form-control contractor" name="inspector_formula_sign">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Superintendent formula signature</label>
                                                        <input type="text" class="form-control contractor" name="superintendent_formula_sign">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-2" role="tabpanel" aria-labelledby="pills-2-tab">
                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">(REHAB) All in-scope work (on form 11.17) is performed satisfactorily</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g_i_1" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">House numbers installed</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g_i_2" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Driveway pad is size 14’ x 20.’ Connection to street 9’ wide, where applicable</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g_i_3" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Peepholes on all exterior doors</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g_i_4" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Accessible route present from street to one entrance door</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g_i_5" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">At least one (1) entrance door, with standard 36” door</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g_i_6" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">No-step entrance serviced by ramp (if applicable) slope is 1:12 w/ two (2) grip rails</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g_i_7" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Top surface of gripping handrails at consistent height, 34-38 inches vertically above walking surfaces, stair noses, and ramp surfaces. (ADA 2010, 504.4)s</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g_i_8" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Maximum 4-inch opening on all balusters/rail supports (if applicable)</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g_i_9" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Building permit, Certificate of Occupancy, Elevation Certificate and Inspection green tags on site and visible.</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g_i_10" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Termite treatment complete with certificate on hand</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g_i_11" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Green Standards Certification certificate complete and on hand</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g_i_12" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Accessible route throughout home</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g_i_13" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Hallways at least 36” wide, level & ramped/beveled changes at each door</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g_i_14" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Exterior door locks properly adjusted, deadbolt fully extends into jamb</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g_i_15" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">36-inch height on stair handrails (measured at front of stair nose)</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g_i_16" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Maximum 4-inch opening on all balusters/rail supports (if applicable)</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g_i_17" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">All weatherproofing installed at exterior doors</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g_i_18" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Roof complete including drip edge, all vent boots/caps, shingles straight & level</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g_i_19" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Inside of home is free from debris, swept and clean</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g_i_20" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Foundation cables properly stressed and secured (if applicable)</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g_i_21" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Exterior free of trash and construction materials</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g_i_22" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Porch/decks and ramps cleaned/pressure washed</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g_i_23" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Inspector Observation Remarks1</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g_i_24" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-11" role="tabpanel" aria-labelledby="pills-11-tab">
                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">All piping/drain lines secured to home and exposed pipes insulated</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="e_i_1" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Appropriate water main cut-off exists</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="e_i_2" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Check electrostatic grounding of gas lines</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="e_i_3" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Hardie plank installed under house, painted (elevated homes where applicable).</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="e_i_4" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Two (2) hose bibs with vacuum breakers (anti-syphon devices) near front and back.</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="e_i_5" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">All flatwork (driveway, walks, etc.) level, not cracked/damaged/irregular, pitting, spalling, expansion joints present</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="e_i_6" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">All siding is free of deficiencies. Note any cracked, dented, bowed, or chipped</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="e_i_7" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">All exposed surfaces painted, and exterior paint complete without visible defects (from 6 feet away)</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="e_i_8" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Silicone caulk present at exterior door sills and windows. All exterior penetrations are weatherproofed</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="e_i_9" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">All screens installed, not damaged/torn</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="e_i_10" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">All roof jacks painted to match</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="e_i_11" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Gutters, splash blocks, water diverters, etc., are in place</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="e_i_12" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Finish grade at foundation provides positive drainage away from the structure, starting at a min of 6” below finish floor at slab on grade or a min of 6” below pier footings for elevated floor</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="e_i_13" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Trees trimmed at least 3 feet from the structure/roof, and Sod is in required area</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="e_i_14" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Existing gutters, splash blocks, water diverters, not damaged or detached</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="e_i_15" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Inspector Observation Remarks2</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="e_i_16" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Appropriate water main cut-off exists</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="e_i_17" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-3" role="tabpanel" aria-labelledby="pills-3-tab">
                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">ReHab-Switches, receptacles, circuit breakers & thermostat are functional</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_1" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">ReHab-All switch and receptacle plates level, flush, and without defects</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_2" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">ReHab-Walls and drywall are visually free of blemishes</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_3" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">ReHab-Verify all base trim is properly installed</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_4" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Inside of home is free from debris and swept(frml)</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_5" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Operable switches, circuit breakers & thermostat no higher than 48” above floor</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_6" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">All switches and receptacles properly installed and operable; switch plates level, flush, and without defects. Each receptacle/plug is at least 15” above the floor</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_7" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Wall and ceiling sheetrock is free of deficiencies; ridges, bubbling, cracking at tape joints, corners and lines are straight</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_8" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Verify all base is matching profile. Base appears to be straight; a bow in the base is a visual cue drywall is bowed</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_9" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Smoke/CO2 detectors installed in proper locations and operational</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_10" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Ensure paint coverage is acceptable, free from flaws visible from 6 feet away</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_11" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">ReHab-Carpet is properly installed, not missing sections</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_12" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Ensure interior doors are at least standard 32” door, unless the door provides access only to closet of less than 15 square feet in area</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_13" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Check vinyl flooring for deficiencies such as peeling/lifting, visible gaps/seams, ridges/depressions, or overall poor workmanship</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_14" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Ceramic/porcelain tile – all joints perpendicular & parallel to walls. Installed around outlets, fixtures, pipes/fittings so that plates, escutcheons, and collar overlap cuts</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_15" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Check for Hot-Cold control reversal in all showers, tubs, and sinks</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_16" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Check for leaks in supply and drain lines under sinks</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_17" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Toilets flush properly and are firmly seated in place (no movement)</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_18" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">AC & Heat - check for cold and hot air movement; system in good working order; check thermostat functions</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_19" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">AC filter in place; filter panel easily removable</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_20" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">AC registers properly installed (no gaps, all screws) and level</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_21" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Septic system installed and operational (if applicable)</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_22" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Well water system installed and operational (if applicable)</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_23" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Water heater installed, operational. (If located on main floor in construction plans, must be in designated and properly ventilated closet.)</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_24" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Appliances installed, operational</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_25" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Anti-tip device installed for the stove/oven range</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_26" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">ReHab-Attic insulation is installed properly</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_27" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">ReHab-Attic access door insulated and closes properly</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_28" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">ReHab-All window screens installed, NOT excessively torn or missing</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_29" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">ReHab-Insulation stop at attic access</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_30" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Washing machine outlet box, ice maker outlet box, dryer vent box (or trim) present</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_31" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Region</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_32" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Attic - Verify insulation installed, stop, and access door insulation are present</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_33" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Windows & doors operate smoothly (hinge screws installed, locks & hardware)</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_34" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Ensure cabinets are straight and line up with the walls properly</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i_i_35" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-4" role="tabpanel" aria-labelledby="pills-4-tab">
                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Air Conditioner breaker properly sized</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="el_i_1" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">All exhaust fans and ceiling fans are operational, no excessive noise or vibration</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="el_i_2" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">ReHab-AC Condenser location ok, and operable</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="el_i_3" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">AC Condenser location on concrete pad or deck. Water diverter over AC unit</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="el_i_4" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">ReHab-Aluminum wiring is NOT visually apparent. (If aluminum wiring, check "NO"</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="el_i_5" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Breaker box located on 1st floor, operational parts no higher than 48” from floor</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="el_i_6" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Check that all required GFCI circuits are present and operating properly</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="el_i_7" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Check that all required AFCI circuits are present and operating properly</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="el_i_8" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">All circuit breakers clearly labeled</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="el_i_9" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Check ground and polarity of all receptacles</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="el_i_10" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Electrical Observation Remarks</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="el_i_11" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-5" role="tabpanel" aria-labelledby="pills-5-tab">
                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">If lift present, ensure it is operable, and lift gates fasten securely</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="a_i_1" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Walk-in shower</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="a_i_2" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Grab bars installed properly</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="a_i_3" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Toilets exactly at 18 inches (on center) from finished side wall</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="a_i_4" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Toilet seat height is 17–19 inches from floor</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="a_i_5" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Inspector Observation Remarks3</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="a_i_6" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-6" role="tabpanel" aria-labelledby="pills-6-tab">...</div>
                                        <div class="tab-pane fade" id="pills-7" role="tabpanel" aria-labelledby="pills-7-tab">
                                            <div class="row">
                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_1" name="photo_1" class="form-control contractor">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_2" name="photo_2" class="form-control contractor">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_3" name="photo_3" class="form-control contractor">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_4" name="photo_4" class="form-control contractor">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_5" name="photo_5" class="form-control contractor">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_6" name="photo_6" class="form-control contractor">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_7" name="photo_7" class="form-control contractor">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_8" name="photo_8" class="form-control contractor">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_9" name="photo_9" class="form-control contractor">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_10" name="photo_10" class="form-control contractor">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_11" name="photo_11" class="form-control contractor">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_12" name="photo_12" class="form-control contractor">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_13" name="photo_13" class="form-control contractor">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_14" name="photo_14" class="form-control contractor">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_15" name="photo_15" class="form-control contractor">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_16" name="photo_16" class="form-control contractor">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_17" name="photo_17" class="form-control contractor">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_18" name="photo_18" class="form-control contractor">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_19" name="photo_19" class="form-control contractor">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_20" name="photo_20" class="form-control contractor">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_21" name="photo_21" class="form-control contractor">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_22" name="photo_22" class="form-control contractor">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_23" name="photo_23" class="form-control contractor">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_24" name="photo_24" class="form-control contractor">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_25" name="photo_25" class="form-control contractor">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_26" name="photo_26" class="form-control contractor">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_27" name="photo_27" class="form-control contractor">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_28" name="photo_28" class="form-control contractor">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_29" name="photo_29" class="form-control contractor">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_30" name="photo_30" class="form-control contractor">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-8" role="tabpanel" aria-labelledby="pills-8-tab">
                                            <div class="row p-3">
                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 1</label>
                                                    <input type="text" class="form-control contractor" name="deficiency_1">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 1</label>
                                                    <input type="file" class="form-control contractor" name="deficiency_photo_1">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 2</label>
                                                    <input type="text" class="form-control contractor" name="deficiency_2">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 2</label>
                                                    <input type="file" class="form-control contractor" name="deficiency_photo_2">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 3</label>
                                                    <input type="text" class="form-control contractor" name="deficiency_3">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 3</label>
                                                    <input type="file" class="form-control contractor" name="deficiency_photo_3">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 4</label>
                                                    <input type="text" class="form-control contractor" name="deficiency_4">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 4</label>
                                                    <input type="file" class="form-control contractor" name="deficiency_photo_4">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 5</label>
                                                    <input type="text" class="form-control contractor" name="deficiency_5">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 5</label>
                                                    <input type="file" class="form-control contractor" name="deficiency_photo_5">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 6</label>
                                                    <input type="text" class="form-control contractor" name="deficiency_6">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 6</label>
                                                    <input type="file" class="form-control contractor" name="deficiency_photo_6">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 7</label>
                                                    <input type="text" class="form-control contractor" name="deficiency_7">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 7</label>
                                                    <input type="file" class="form-control contractor" name="deficiency_photo_7">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 8</label>
                                                    <input type="text" class="form-control contractor" name="deficiency_8">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 8</label>
                                                    <input type="file" class="form-control contractor" name="deficiency_photo_8">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 9</label>
                                                    <input type="text" class="form-control contractor" name="deficiency_9">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 9</label>
                                                    <input type="file" class="form-control contractor" name="deficiency_photo_9">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 10</label>
                                                    <input type="text" class="form-control contractor" name="deficiency_10">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 10</label>
                                                    <input type="file" class="form-control contractor" name="deficiency_photo_10">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 11</label>
                                                    <input type="text" class="form-control contractor" name="deficiency_11">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 11</label>
                                                    <input type="file" class="form-control contractor" name="deficiency_photo_11">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 12</label>
                                                    <input type="text" class="form-control contractor" name="deficiency_12">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 12</label>
                                                    <input type="file" class="form-control contractor" name="deficiency_photo_12">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 13</label>
                                                    <input type="text" class="form-control contractor" name="deficiency_13">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 13</label>
                                                    <input type="file" class="form-control contractor" name="deficiency_photo_13">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-9" role="tabpanel" aria-labelledby="pills-9-tab">
                                            <div class="">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Additional Information 1</label>
                                                        <input type="text" class="form-control contractor" name="additional_information_1">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Additional Information 2</label>
                                                        <input type="text" class="form-control contractor" name="additional_information_2">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Additional Information 3</label>
                                                        <input type="text" class="form-control contractor" name="additional_information_3">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Additional Information 4</label>
                                                        <input type="text" class="form-control contractor" name="additional_information_4">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Additional Notes</label>
                                                        <input type="text" class="form-control contractor" name="additional_notes">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Address Text</label>
                                                        <input type="text" class="form-control contractor" name="address_text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-10" role="tabpanel" aria-labelledby="pills-10-tab">
                                            <div class="form-group">
                                                <label for="">Attachment 1</label>
                                                <input type="file" class="form-control contractor" name="attachment_1">
                                            </div>

                                            <div class="form-group">
                                                <label for="">iCal Text</label>
                                                <input type="text" class="form-control contractor" name="ical_text">
                                            </div>

                                            <div class="form-group">
                                                <label for="">Contractor-Builder Name</label>
                                                <input type="text" class="form-control contractor" name="contractor_builder_name">
                                            </div>

                                            <div class="form-group">
                                                <label for="">Thumb 1</label>
                                                <input type="file" class="form-control contractor" name="thumb_1">
                                            </div>

                                            <div class="form-group">
                                                <label for="">Notify GLO</label>
                                                <input type="text" class="form-control contractor" name="notify_glo">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-10 p50_div">
                            <div class="card-body">
                                <div class="row">
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="pills-51-tab" data-toggle="pill" href="#pills-51" role="tab" aria-controls="pills-51" aria-selected="true">Print</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="pills-52-tab" data-toggle="pill" href="#pills-52" role="tab" aria-controls="pills-52" aria-selected="false">General Inspection</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="pills-511-tab" data-toggle="pill" href="#pills-511" role="tab" aria-controls="pills-511" aria-selected="false">Exterior Inspection</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="pills-53-tab" data-toggle="pill" href="#pills-53" role="tab" aria-controls="pills-53" aria-selected="false">Interior Inspection</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="pills-54-tab" data-toggle="pill" href="#pills-54" role="tab" aria-controls="pills-54" aria-selected="false">Windows and Doors</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="pills-56-tab" data-toggle="pill" href="#pills-56" role="tab" aria-controls="pills-56" aria-selected="false">Roof/Attic</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="pills-57-tab" data-toggle="pill" href="#pills-57" role="tab" aria-controls="pills-57" aria-selected="false">Photos</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="pills-58-tab" data-toggle="pill" href="#pills-58" role="tab" aria-controls="pills-58" aria-selected="false">Deficiencies</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="pills-59-tab" data-toggle="pill" href="#pills-59" role="tab" aria-controls="pills-59" aria-selected="false">Notes & Info</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="pills-510-tab" data-toggle="pill" href="#pills-510" role="tab" aria-controls="pills-510" aria-selected="false">Corrections</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="pills-tabContent" style="width: 100% !important;">
                                        <div class="tab-pane fade show active" id="pills-51" role="tabpanel" aria-labelledby="pills-51-tab">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="checkbox" class="mr-1 checkbox_input contractor" name="cancellation_request_5"><label for="">Cancellation Request</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Date Inspected</label>
                                                        <input type="text" class="form-control hd-datepicker contractor" name="date_inspected_5">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Inspector</label>
                                                        <input type="text" class="form-control contractor" name="inspector_5">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Inspector Email</label>
                                                        <input type="text" class="form-control contractor" name="inspector_email_5">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Superintendent</label>
                                                        <input type="text" class="form-control contractor" name="superintendent_5">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Superintendent Email</label>
                                                        <input type="text" class="form-control contractor" name="superintendent_email_5">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Requester Email</label>
                                                        <input type="text" class="form-control contractor" name="requester_email_5">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Superintendent Phone</label>
                                                        <input type="number" class="form-control contractor" name="superintendent_phone_5" maxlength="10" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                                    </div>
                                                </div>

                                                <div class="col-md-8"></div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Document Spawn</label>
                                                        <input type="text" class="form-control contractor" name="document_spawn_5">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Inspection Document Creation Date</label>
                                                        <input type="text" class="form-control hd-datepicker contractor" name="document_creation_date_5">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Inspection Sign-Off Date</label>
                                                        <input type="text" class="form-control hd-datepicker contractor" name="inspection_sign_off_date_5">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Homeowner Sign-Off Date</label>
                                                        <input type="text" class="form-control hd-datepicker contractor" name="homeowner_sign_off_date_5">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Superintendent Sign-off Date</label>
                                                        <input type="text" class="form-control hd-datepicker contractor" name="superintendent_sign_off_date_5">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Document Name</label>
                                                        <input type="text" class="form-control contractor" name="document_name_5">
                                                    </div>
                                                </div>

                                                <div class="col-md-8"></div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Inspector formula signature</label>
                                                        <input type="text" class="form-control contractor" name="inspector_formula_sign_5">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Superintendent formula signature</label>
                                                        <input type="text" class="form-control contractor" name="superintendent_formula_sign_5">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-52" role="tabpanel" aria-labelledby="pills-52-tab">
                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Confirm which Green Standard applies</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g5_i_1" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Resilient roof photos verified: 1) Taped decking seams 2) Button cap nails used</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g5_i_2" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Building permit, Elevation Certificate, Inspection green tags visible</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g5_i_3" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Confirm foundation municipal tag and engineer’s report is issued (with the plans) and available (if applicable)</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g5_i_4" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Verify it’s framed according to plans, correct number of rooms, bathrooms, windows and double check elevation (option selection), roof, etc</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g5_i_5" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">At least one 36-inch entrance door on an accessible route served by no-step entrance or ramp</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g5_i_6" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Check finished slab surface complete/plumbing entry points patched and cured</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g5_i_7" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">No subfloor areas of unevenness exceeding 3/8 inch per 36 inches</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g5_i_8" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Confirm rough opening for interior passage doors will accommodate a 32-inch door, unless the door provides access only to closet of less than 15 sq. ft. in area</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g5_i_9" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Each hallway has a width of at least 36 inches and is level</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g5_i_10" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Anchor bolts, washer, nuts, all tightened (if applicable)</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g5_i_11" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">2x6 joist hangers are installed at attic/all areas, with appropriate number of nails</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g5_i_12" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Check AC drain installed and visually clear of debris</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g5_i_13" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Gas and electric meter location reasonably near home</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g5_i_14" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Fur downs per plan</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g5_i_15" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Poly spray foam at slab and roof baffles done as required</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g5_i_16" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">All trade nail guards in place</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g5_i_17" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Framing is free from irregularities such as excessive mud, mildew, knots or flaws notching or scabbing, or overall damage. Note unusual nail patterns/usage</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g5_i_18" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Inside of home is free from debris and swept</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g5_i_19" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">All trash is picked up and placed in trash area/dumpster</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g5_i_20" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">General Inspector Observation Remarks:</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="g5_i_21" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-511" role="tabpanel" aria-labelledby="pills-511-tab">
                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Exterior walls are plumb and straight (no bows)</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="e5_i_1" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Lap Siding: 'HZ10' Hardie Plank, 6 1/4", smooth or textured finish, pre-primed. (Installed measurement 5” visible)</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="e5_i_2" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">All siding is free of deficiencies. Note any cracked, dented, bowed, or chipped siding that requires replacement</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="e5_i_3" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">All butt-joints are less than 1/8 inch, both siding and trim</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="e5_i_4" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Use trim nails on 1x4 Hardie trim (siding)</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="e5_i_5" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">All roof jacks installed</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="e5_i_6" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Every door and window location and size are confirmed</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="e5_i_7" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Window and door openings are plumb</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="e5_i_8" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Sheathing on the house is cut tight, straight, without gaps or holes, and nailed per plan specifications</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="e5_i_9" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Two exterior hose bibs (front/back).</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="e5_i_10" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Verify minimum ½ inch expansion gap: between siding and porch floor, and between ramp and siding</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="e5_i_11" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Exterior Inspection Observation Remarks:</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="e5_i_12" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-53" role="tabpanel" aria-labelledby="pills-53-tab">
                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Each bathroom is reinforced with blocking for potential grab bar installation as required. (32-38'' High Minimum, ADA 2010)</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i5_i_1" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Verify water source located on a short wall, control is on either a long or short wall of roll-in shower when a permanent seat is present (if applicable) ADA 2010</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i5_i_2" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Check plan on sizes of ceiling joists and rafters. Check doubles around openings</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i5_i_3" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Studs are installed at 16 inches on center</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i5_i_4" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Door and window headers are sized to scale, load-bearing and non-load-bearing</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i5_i_5" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Check windstorm clips are present</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i5_i_6" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">All receptacles (electric outlets) at least 15 inches above floor</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i5_i_7" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Light switches, fan switches and thermostat no higher than 48 inches from floor</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i5_i_8" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Each breaker box is located not higher than 48 inches above the floor inside the building on the first floor in the utility room or garage; unless the applicable building code or codes do not prescribe another location for the breaker boxes</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i5_i_9" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Check all electrical clears door casings, and that it is not behind door swing</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i5_i_10" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Smoke detector and carbon monoxide detector locations wired</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i5_i_11" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">All walls and corners are plumb</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i5_i_12" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Toilets at 17-19 inches on center from side wall</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i5_i_13" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Space is provided on both sides of doors for casing</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i5_i_14" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Inspector Observation Remarks</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="i5_i_15" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                        </div>
                                        <div class="tab-pane fade" id="pills-54" role="tabpanel" aria-labelledby="pills-54-tab">
                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Verify windows are compliant with windstorm/Green Standard requirements</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="wd5_i_1" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Door and window headers are sized properly, load-bearing and non load-bearing</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="wd5_i_2" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">House wrap is installed in all window and door openings prior to installation of windows/doors</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="wd5_i_3" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Windows Doors Inspector Observation Remarks</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="wd5_i_4" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-55" role="tabpanel" aria-labelledby="pills-55-tab">
                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">If lift present, ensure it is operable, and lift gates fasten securely</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="a_i_1" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Walk-in shower</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="a_i_2" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Grab bars installed properly</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="a_i_3" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Toilets exactly at 18 inches (on center) from finished side wall</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="a_i_4" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Toilet seat height is 17–19 inches from floor</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="a_i_5" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Inspector Observation Remarks3</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="a_i_6" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-56" role="tabpanel" aria-labelledby="pills-56-tab">
                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">HVAC ductwork in place properly installed, no gaps or openings</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="ra5_i_1" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">AC intakes/returns are on the main floor</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="ra5_i_2" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">All windstorm/fortified appurtenances are in place</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="ra5_i_3" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Roof sheathing is flat, no valleys or high places</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="ra5_i_4" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Roof decking is installed with small gap 1/16–1/8 inch on all end joints</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="ra5_i_5" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Roof sheathing is flat, no valleys or high places. Radiant barrier installed</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="ra5_i_6" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Double check elevation on all 4 sides (with floor plans)</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="ra5_i_7" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">All roof jacks installed</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="ra5_i_8" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Roof/Attic Inspector Observation Remarks</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="ra5_i_9" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-md-3 text-right">
                                                    <p class="font-weight-bolder">Inspector Observation Remarks 4</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="ra5_i_10" class="form-control contractor" id="">
                                                        <option value="N/A">N/A</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7"></div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-57" role="tabpanel" aria-labelledby="pills-57-tab">
                                            <div class="row">
                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_1" name="photo_1_5" class="form-control contractor">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_2" name="photo_2_5" class="form-control contractor">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_3" name="photo_3_5" class="form-control contractor">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_4" name="photo_4_5" class="form-control contractor">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_5" name="photo_5_5" class="form-control contractor">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_6" name="photo_6_5" class="form-control contractor">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_7" name="photo_7_5" class="form-control contractor">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_8" name="photo_8_5" class="form-control contractor">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_9" name="photo_9_5" class="form-control contractor">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_10" name="photo_10_5" class="form-control contractor">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_11" name="photo_11_5" class="form-control contractor">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_12" name="photo_12_5" class="form-control contractor">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_13" name="photo_13_5" class="form-control contractor">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_14" name="photo_14_5" class="form-control contractor">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_15" name="photo_15_5" class="form-control contractor">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_16" name="photo_16_5" class="form-control contractor">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_17" name="photo_17_5" class="form-control contractor">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_18" name="photo_18_5" class="form-control contractor">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_19" name="photo_19_5" class="form-control contractor">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_20" name="photo_20_5" class="form-control contractor">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_21" name="photo_21_5" class="form-control contractor">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_22" name="photo_22_5" class="form-control contractor">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_23" name="photo_23_5" class="form-control contractor">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_24" name="photo_24_5" class="form-control contractor">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_25" name="photo_25_5" class="form-control contractor">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_26" name="photo_26_5" class="form-control contractor">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_27" name="photo_27_5" class="form-control contractor">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_28" name="photo_28_5" class="form-control contractor">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_29" name="photo_29_5" class="form-control contractor">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <input type="file" id="photo_30" name="photo_30_5" class="form-control contractor">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-58" role="tabpanel" aria-labelledby="pills-58-tab">
                                            <div class="row p-3">
                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 1</label>
                                                    <input type="text" class="form-control contractor" name="deficiency_1_5">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 1</label>
                                                    <input type="file" class="form-control contractor" name="deficiency_photo_1_5">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 2</label>
                                                    <input type="text" class="form-control contractor" name="deficiency_2_5">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 2</label>
                                                    <input type="file" class="form-control contractor" name="deficiency_photo_2_5">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 3</label>
                                                    <input type="text" class="form-control contractor" name="deficiency_3_5">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 3</label>
                                                    <input type="file" class="form-control contractor" name="deficiency_photo_3_5">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 4</label>
                                                    <input type="text" class="form-control contractor" name="deficiency_4_5">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 4</label>
                                                    <input type="file" class="form-control contractor" name="deficiency_photo_4_5">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 5</label>
                                                    <input type="text" class="form-control contractor" name="deficiency_5_5">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 5</label>
                                                    <input type="file" class="form-control contractor" name="deficiency_photo_5_5">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 6</label>
                                                    <input type="text" class="form-control contractor" name="deficiency_6_5">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 6</label>
                                                    <input type="file" class="form-control contractor" name="deficiency_photo_6_5">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 7</label>
                                                    <input type="text" class="form-control contractor" name="deficiency_7_5">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 7</label>
                                                    <input type="file" class="form-control contractor" name="deficiency_photo_7_5">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 8</label>
                                                    <input type="text" class="form-control contractor" name="deficiency_8_5">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 8</label>
                                                    <input type="file" class="form-control contractor" name="deficiency_photo_8_5">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 9</label>
                                                    <input type="text" class="form-control contractor" name="deficiency_9_5">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 9</label>
                                                    <input type="file" class="form-control contractor" name="deficiency_photo_9_5">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 10</label>
                                                    <input type="text" class="form-control contractor" name="deficiency_10_5">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 10</label>
                                                    <input type="file" class="form-control contractor" name="deficiency_photo_10_5">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 11</label>
                                                    <input type="text" class="form-control contractor" name="deficiency_11_5">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 11</label>
                                                    <input type="file" class="form-control contractor" name="deficiency_photo_11_5">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 12</label>
                                                    <input type="text" class="form-control contractor" name="deficiency_12_5">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 13</label>
                                                    <input type="file" class="form-control contractor" name="deficiency_photo_13_5">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency 13</label>
                                                    <input type="text" class="form-control contractor" name="deficiency_13_5">
                                                </div>

                                                <div class="col-md-6 mb-1">
                                                    <label for="">Deficiency Photo 10</label>
                                                    <input type="file" class="form-control contractor" name="deficiency_photo_10_5">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-59" role="tabpanel" aria-labelledby="pills-59-tab">
                                            <div class="">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Additional Information 1</label>
                                                        <input type="text" class="form-control contractor" name="additional_information_1_5">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Additional Information 2</label>
                                                        <input type="text" class="form-control contractor" name="additional_information_2_5">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Additional Information 3</label>
                                                        <input type="text" class="form-control contractor" name="additional_information_3_5">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Additional Information 4</label>
                                                        <input type="text" class="form-control contractor" name="additional_information_4_5">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Additional Notes</label>
                                                        <input type="text" class="form-control contractor" name="additional_notes_5">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Address Text</label>
                                                        <input type="text" class="form-control contractor" name="address_text_5">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-510" role="tabpanel" aria-labelledby="pills-510-tab">
                                            <div class="form-group">
                                                <label for="">Attachment 1</label>
                                                <input type="file" class="form-control contractor" name="attachment_1_5">
                                            </div>

                                            <div class="form-group">
                                                <label for="">iCal Text</label>
                                                <input type="text" class="form-control contractor" name="ical_text_5">
                                            </div>

                                            <div class="form-group">
                                                <label for="">Contractor-Builder Name</label>
                                                <input type="text" class="form-control contractor" name="contractor_builder_name_5">
                                            </div>

                                            <div class="form-group">
                                                <label for="">Thumb 1</label>
                                                <input type="file" class="form-control contractor" name="thumb_1_5">
                                            </div>

                                            <div class="form-group">
                                                <label for="">Notify GLO</label>
                                                <input type="text" class="form-control contractor" name="notify_glo_5">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success" style="width: 200px">Submit</button>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <script>
        $(document).ready(function () {
            if($('#inspection_type').val() == "50%") {
                $('.p100_div').css("display", "none")
                $('.p50_div').css("display", 'block')
            } else {
                $('.p100_div').css("display", "block")
                $('.p50_div').css("display", 'none')
            }
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

        $('#inspection_type').on("change", function() {
            if($('#inspection_type').val() == "50%") {
                $('.p100_div').css("display", "none")
                $('.p50_div').css("display", 'block')
            } else {
                $('.p100_div').css("display", "block")
                $('.p50_div').css("display", 'none')
            }
        })

        {{ date_default_timezone_set('America/Chicago') }}
        $('.timepicker').timepicker({
            timeFormat: 'h:mm p',
            interval: 60,
            minTime: '6:00am',
            maxTime: '8:00pm',
            defaultTime: '{{ date("h:i A") }}',
            startTime: '6:00am',
            dynamic: false,
            dropdown: true,
            scrollbar: true
        });

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


    {{-- javascript code --}}
    <script src="https://maps.googleapis.com/maps/api/js?key=90b19e245a5e4ac8a5784e0f2dd7f9c4&libraries=places&callback=initAutocomplete" type="text/javascript"></script>


    <script>
        google.maps.event.addDomListener(window, 'load', initialize);

        function initialize() {
            var input = document.getElementById('applicant_street_address');
            var autocomplete = new google.maps.places.Autocomplete(input);
            autocomplete.addListener('place_changed', function() {
                var place = autocomplete.getPlace();
            });
        }
    </script>
@endpush
