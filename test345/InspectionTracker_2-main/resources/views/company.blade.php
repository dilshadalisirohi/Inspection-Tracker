@extends('.layouts.app')

@section('title', __('Company'))

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
                <div class="col-lg-12 mb-30">
                    <div class="tw-card">
                        <div class="tw-card-header mb-10 d-flex justify-content-between">
                            Contractor List
                            <div>
                                <a class="btn btn-primary" href="{{ url('admin/add-company') }}"><i class="fas fa-plus"></i> Add Company</a>
                                <a class="btn btn-info" href="{{ url('admin/add-company-user') }}"><i class="fas fa-user"></i> Add User</a>
                            </div>
                        </div>
                        <div class="tw-card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="company-table">
                                    <thead>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Options</th>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
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

            $('#company-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: '{!! route('getCompanies') !!}',
                dom: '<"row mt-4 top"<"col-md-3"l><"col-md-6 text-center"B><"col-md-3"f>>rtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ],
                columns: [
                    { data: 'id', name: 'id' },
                    // { data: 'name', name: 'name' },
                    { data: 'name', name: 'name' },
                    { data: 'action', name: 'action', orderable: false },
                ],
                columnDefs: [
                    { "width": "33%", "targets": 0 },
                    { "width": "33%", "targets": 1 },
                    { "width": "34%", "targets": 2 },
                ],
                order: [[0, 'asc']]
            });
        })
    </script>
@endpush
