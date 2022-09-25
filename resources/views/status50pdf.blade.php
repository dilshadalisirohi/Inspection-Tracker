<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <style>
        /**
        Set the margins of the page to 0, so the footer and the header
        can be of the full height and width !
        **/
        @page {
            margin: 0cm 0cm;
        }

        /** Define now the real margins of every page in the PDF **/
        body {
            counter-reset: section;
            margin-top: 3cm;
            margin-left: 2cm;
            margin-right: 2cm;
            margin-bottom: 2cm;
        }

        /** Define the header rules **/
        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 3cm;
        }

        /** Define the footer rules **/
        footer {
            position: fixed;
            bottom: 2cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;

        }
    </style>

    <style>
        table,
        th,
        td {
            font-size: 14px;
            border: 1px solid black;
            border-collapse: collapse;
            font-family: Times New Roman;
            padding-left: 4px;
            color: black;

        }

        th {
            font-size: 17px;
            background-color: black;
            color: white;
        }

        .column {
            float: left;
            width: 38.33%;
            padding: 5px;
            /* height: 30px; */
            /* Should be removed. Only for demonstration */
            box-sizing: border-box;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }


        .page_no::after {
            counter-increment: section;
            content: " Page  "counter(section) " ";
        }

        .columnh {
            float: left;
            width: 50%;
            padding: 1px;
            box-sizing: border-box;

        }

        div.header_text {
            text-align: right;
        }

        .sign {

            width: 120px;
        }

        .photos {
            width: 500px;
            display: block;
            margin-bottom: 1rem;
        }
    </style>
</head>

<body>
    <!-- Define header and footer blocks before your con tent -->
    <header>
        <div class="row">
            <div class="columnh">

                <img src="{{ asset('assets/images/pdflogo.jpg') }}" alt=""
                    style="width:85px; margin-left: 100px; margin-top: 12px; ">
            </div>
            <div class="columnh">

                <div class="header_text">
                    <p
                        style="font-family:Times New Roman; font-size:90.25%;  font-weight: bold;  margin-right: 110px; margin-top:6; font-color:black;
                                    ">
                        Texas General Land Office<br>
                        Community Development and Revitalization<br>
                        Form 11.10<br>
                        Progress Inspection Checklist</p>
                </div>
            </div>

        </div>


    </header>
    <footer>



        <div class="row">
            <div class="column">
                <p
                    style="font-family:Times New Roman; color:black; font-size: 70.25%;  font-weight: bold;  margin-left: 82px; margin-top: 55px;
              ">
                    Form 11.10 - Progress Inspection Checklist</p>
            </div>
            <div class="column">
                <p
                    style="font-family:Times New Roman; color:black; font-size: 70.25%;  font-weight: bold;  margin-left: 75px; margin-top: 55px;
                      ">
                    July 2022</p>
            </div>
            <div class="column">
                <p style="font-family:Times New Roman; color:black; font-size: 70.25%;  font-weight: bold; margin-top: 55px;
                "
                    class="page_no">

                </p>
            </div>
        </div>


        <p
            style="font-family:Times New Roman; font-size: 60.25%; color:black; font-style: italic;  margin-left: 72px; margin-top: -12px">
            Disclaimer: The Texas
            General Land Office has made every effort to ensure the information contained on this form
            is accurate and in compliance with the most up-to-<br>date CDBG-DR and or CDBG-MT federal rules and
            regulations,
            as
            applicable. It should be noted that the Texas General Land Office assumes no liability or<br>
            responsibility for any error or omission on this form that may result from the interim period between
            the
            publication of amended and/or revised federal rules and<br>
            regulations and the Texas General Land Office’s standard review and update schedule.</p>
    </footer>

    <!-- Wrap the content of your PDF inside a main tag -->
    <main>
        <table style="width:100%">
            <tr>
                <th colspan="2" style="text-align:center; ">Project Information</th>
            </tr>
            <tr>
                <td><b>GLO’s Designated Representative (“GDR”) Name:</b>
                    {{ $report_glo }}</td>
                <td><b>Contract No. and/or WO:</b><br> {{ $report_contact }}</td>
            </tr>
            <tr>
                <td><b>Applicant Name:</b> {{ $applicant_name }}</td>
                <td><b>Co-Applicant Name:</b>
                </td>
            </tr>
            <tr>
                <td colspan="2">Physical Address: {{ $applicant_address }}</td>
            </tr>
            <tr>
                <td><b>Building Contractor Name: {{ $contractor_name }} <b></td>
                <td><b>Floor Plan: {{ $floorplan }}</b>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:center; "><i><u><b>**Must be Completed Immediately Prior to
                                Insulation
                                and Drywall**</b></u></i></td>
            </tr>
        </table>
        <table style="width:100%">
            <tr>
                <th colspan="2" style="text-align:center; ">General Inspection</th>

            </tr>
            <tr>
                @if ($result_1 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;
                        </span>
                        N/A

                    </td>
                    <td>Confirm which Green Standard applies: {{ $result_1 }}</td>
                    }
                @elseif ($result_1 == 'No')
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;
                        </span>
                        N/A

                    </td>
                    <td>Confirm which Green Standard applies: {{ $result_1 }}</td>

                    }
                @else
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;
                        </span>
                        N/A

                    </td>
                    <td>Confirm which Green Standard applies: {{ $result_1 }}</td>

                    }
                @endif







            </tr>
            <tr>
                @if ($result_2 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A

                    </td>
                    <td>Resilient roof photos verified: 1) Taped decking seams 2) Button cap nails used.
                    </td>
                    }
                @elseif ($result_2 == 'No')
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A

                    </td>
                    <td>Resilient roof photos verified: 1) Taped decking seams 2) Button cap nails used.
                    </td>

                    }
                @else
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A

                    </td>
                    <td>Resilient roof photos verified: 1) Taped decking seams 2) Button cap nails used.
                    </td>

                    }
                @endif

            </tr>
            <tr>
                @if ($result_3 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A

                    </td>
                    <td>Building permit and green tags in place and visible.
                    </td>
                    }
                @elseif ($result_3 == 'No')
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A

                    </td>
                    <td>Building permit and green tags in place and visible.
                    </td>

                    }
                @else
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A

                    </td>
                    <td>Building permit and green tags in place and visible.
                    </td>

                    }
                @endif

            </tr>
            <tr>
                @if ($result_4 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A

                    </td>
                    <td>Confirm foundation municipal tag and engineer’s report is issued (with the plans) and
                        available (if applicable).
                    </td>
                    }
                @elseif ($result_4 == 'No')
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A

                    </td>
                    <td>Confirm foundation municipal tag and engineer’s report is issued (with the plans) and
                        available (if applicable).
                    </td>

                    }
                @else
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A

                    </td>
                    <td>Confirm foundation municipal tag and engineer’s report is issued (with the plans) and
                        available (if applicable).
                    </td>

                    }
                @endif
            </tr>
            <tr>
                @if ($result_5 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A

                    </td>
                    <td>Verify it’s framed according to plans, correct number of rooms, bathrooms, windows and double
                        check elevation (option selection), roof, etc.
                    </td>
                    }
                @elseif ($result_5 == 'No')
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A

                    </td>
                    <td>Verify it’s framed according to plans, correct number of rooms, bathrooms, windows and double
                        check elevation (option selection), roof, etc.
                    </td>

                    }
                @else
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A

                    </td>
                    <td>Verify it’s framed according to plans, correct number of rooms, bathrooms, windows and double
                        check elevation (option selection), roof, etc.
                    </td>

                    }
                @endif
            </tr>
            <tr>
                @if ($result_6 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A

                    </td>
                    <td>At least one 36-inch entrance door on an accessible route served by no-step
                        entrance or ramp.
                    </td>
                    }
                @elseif ($result_6 == 'No')
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A

                    </td>
                    <td>At least one 36-inch entrance door on an accessible route served by no-step
                        entrance or ramp.
                    </td>

                    }
                @else
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A

                    </td>
                    <td>At least one 36-inch entrance door on an accessible route served by no-step
                        entrance or ramp.
                    </td>

                    }
                @endif
            </tr>



            <tr>
                @if ($result_7 == 'Yes')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                    </td>
                    <td>Check finished slab surface complete/plumbing entry points patched and cured.</td>
                    }
                @elseif ($result_7 == 'No')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                    </td>
                    <td>Check finished slab surface complete/plumbing entry points patched and cured.</td>
                    }
                @else
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        N/A
                    </td>
                    <td>Check finished slab surface complete/plumbing entry points patched and cured.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($result_8 == 'Yes')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>No subfloor areas of unevenness exceeding 3/8 inch per 36 inches.</td>
                    }
                @elseif ($result_8 == 'No')
                    {
                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>No subfloor areas of unevenness exceeding 3/8 inch per 36 inches.</td>
                    }
                @else
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        N/A
                    </td>
                    <td>No subfloor areas of unevenness exceeding 3/8 inch per 36 inches.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($result_9 == 'Yes')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Confirm rough opening for interior passage doors will accommodate a 32-inch door, unless the
                        door provides access only to closet of less than 15 sq. ft. in area.</td>
                    }
                @elseif ($result_9 == 'No')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Confirm rough opening for interior passage doors will accommodate a 32-inch door, unless the
                        door provides access only to closet of less than 15 sq. ft. in area.</td>
                    }
                @else
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        N/A
                    </td>
                    <td>Confirm rough opening for interior passage doors will accommodate a 32-inch door, unless the
                        door provides access only to closet of less than 15 sq. ft. in area.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($result_10 == 'Yes')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Each hallway has a width of at least 36 inches and is level.</td>
                    }
                @elseif ($result_10 == 'No')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Each hallway has a width of at least 36 inches and is level.</td>
                    }
                @else
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        N/A
                    </td>
                    <td>Each hallway has a width of at least 36 inches and is level.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($result_11 == 'Yes')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Anchor bolts, washer, nuts, all tightened (if applicable).</td>
                    }
                @elseif ($result_11 == 'No')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Anchor bolts, washer, nuts, all tightened (if applicable).</td>
                    }
                @else
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        N/A
                    </td>
                    <td>Anchor bolts, washer, nuts, all tightened (if applicable).</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($result_12 == 'Yes')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>2x6 joist hangers are installed at attic/all areas, with appropriate number of nails.</td>
                    }
                @elseif ($result_12 == 'No')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>2x6 joist hangers are installed at attic/all areas, with appropriate number of nails.</td>
                    }
                @else
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        N/A
                    </td>
                    <td>2x6 joist hangers are installed at attic/all areas, with appropriate number of nails.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($result_13 == 'Yes')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Check AC drain installed and visually clear of debris.</td>
                    }
                @elseif ($result_13 == 'No')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Check AC drain installed and visually clear of debris.</td>
                    }
                @else
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        N/A
                    </td>
                    <td>Check AC drain installed and visually clear of debris.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($result_14 == 'Yes')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Gas and electric meter location reasonably near home.</td>
                    }
                @elseif ($result_14 == 'No')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Gas and electric meter location reasonably near home.</td>
                    }
                @else
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        N/A
                    </td>
                    <td>Gas and electric meter location reasonably near home.</td>
                    }
                @endif

            </tr>
            {{-- <tr>
                <td style="text-align:center; ">{{ $result_15 }}</td>
                <td>Fur downs per plan</td>
            </tr> --}}
            <tr>
                @if ($result_16 == 'Yes')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Poly spray foam at slab and roof baffles done as required.</td>
                    }
                @elseif ($result_16 == 'No')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Poly spray foam at slab and roof baffles done as required.</td>
                    }
                @else
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        N/A
                    </td>
                    <td>Poly spray foam at slab and roof baffles done as required.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($result_17 == 'Yes')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>All trade nail guards in place.</td>
                    }
                @elseif ($result_17 == 'No')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>All trade nail guards in place.</td>
                    }
                @else
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        N/A
                    </td>
                    <td>All trade nail guards in place.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($result_18 == 'Yes')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Framing is free from irregularities such as excessive mud, mildew, knots or flaws notching or
                        scabbing, or overall damage. Note unusual nail patterns/usage.</td>
                    }
                @elseif ($result_18 == 'No')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Framing is free from irregularities such as excessive mud, mildew, knots or flaws notching or
                        scabbing, or overall damage. Note unusual nail patterns/usage.</td>
                    }
                @else
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        N/A
                    </td>
                    <td>Framing is free from irregularities such as excessive mud, mildew, knots or flaws notching or
                        scabbing, or overall damage. Note unusual nail patterns/usage.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($result_19 == 'Yes')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Inside of home is free from debris and swept.</td>
                    }
                @elseif ($result_19 == 'No')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Inside of home is free from debris and swept.</td>
                    }
                @else
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        N/A
                    </td>
                    <td>Inside of home is free from debris and swept.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($result_20 == 'Yes')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>All trash is picked up and placed in trash area/dumpster.</td>
                    }
                @elseif ($result_20 == 'No')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>All trash is picked up and placed in trash area/dumpster.</td>
                    }
                @else
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        N/A
                    </td>
                    <td>All trash is picked up and placed in trash area/dumpster.</td>
                    }
                @endif

            </tr>
            <tr>


                <td colspan="2"
                    style="text-align:left; height:120px; vertical-align: top;
                text-align: left; ">
                    <b>Inspector Observation Remarks:</b>

                </td>
            </tr>



        </table>
        <div style="page-break-before:always;"> </div>
        <table style="width:100%">
            <tr>
                <th colspan="2" style="text-align:center;">Interior Inspection</th>

            </tr>
            <tr>
                @if ($interior_ins1 == 'Yes')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Each bathroom is reinforced with blocking for potential grab bar installation as required. (32-
                        38'' High Minimum, ADA 2010).</td>
                    }
                @elseif ($interior_ins1 == 'No')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Each bathroom is reinforced with blocking for potential grab bar installation as required. (32-
                        38'' High Minimum, ADA 2010).</td>
                    }
                @else
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        N/A
                    </td>
                    <td>Each bathroom is reinforced with blocking for potential grab bar installation as required. (32-
                        38'' High Minimum, ADA 2010).</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($interior_ins2 == 'Yes')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Verify water source located on a short wall, control is on either long or short wall of rollin
                        shower when a permanent seat is present (if applicable) ADA 2010.</td>
                    }
                @elseif ($interior_ins2 == 'No')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Verify water source located on a short wall, control is on either long or short wall of rollin
                        shower when a permanent seat is present (if applicable) ADA 2010.</td>
                    }
                @else
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        N/A
                    </td>
                    <td>Verify water source located on a short wall, control is on either long or short wall of rollin
                        shower when a permanent seat is present (if applicable) ADA 2010.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($interior_ins3 == 'Yes')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Check plan on sizes of ceiling joists and rafters. Check doubles around openings.</td>
                    }
                @elseif ($interior_ins3 == 'No')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Check plan on sizes of ceiling joists and rafters. Check doubles around openings.</td>
                    }
                @else
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        N/A
                    </td>
                    <td>Check plan on sizes of ceiling joists and rafters. Check doubles around openings.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($interior_ins4 == 'Yes')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Studs are installed at 16 inches on center.</td>
                    }
                @elseif ($interior_ins4 == 'No')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Studs are installed at 16 inches on center.</td>
                    }
                @else
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        N/A
                    </td>
                    <td>Studs are installed at 16 inches on center.</td>
                    }
                @endif

            </tr>
            {{-- <tr>
                <td style="text-align:center; ">{{ $interior_ins5 }}</td>
                <td>Door and window headers are sized to scale, load-bearing and non-load-bearing</td>
            </tr> --}}
            <tr>
                @if ($interior_ins6 == 'Yes')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Check windstorm clips are present.</td>
                    }
                @elseif ($interior_ins6 == 'No')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Check windstorm clips are present.</td>
                    }
                @else
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        N/A
                    </td>
                    <td>Check windstorm clips are present.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($interior_ins7 == 'Yes')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>All receptacles (electric outlets) at least 15 inches above floor.</td>
                    }
                @elseif ($interior_ins7 == 'No')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>All receptacles (electric outlets) at least 15 inches above floor.</td>
                    }
                @else
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        N/A
                    </td>
                    <td>All receptacles (electric outlets) at least 15 inches above floor.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($interior_ins8 == 'Yes')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Light switches, fan switches and thermostat no higher than 48 inches from floor.</td>
                    }
                @elseif ($interior_ins8 == 'No')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Light switches, fan switches and thermostat no higher than 48 inches from floor.</td>
                    }
                @else
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        N/A
                    </td>
                    <td>Light switches, fan switches and thermostat no higher than 48 inches from floor.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($interior_ins9 == 'Yes')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Each breaker box is located not higher than 48 inches above the floor inside the building on the
                        first floor in the utility room or garage; unless the applicable building code or codes do not
                        prescribe another location for the breaker boxes.</td>
                    }
                @elseif ($interior_ins9 == 'No')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Each breaker box is located not higher than 48 inches above the floor inside the building on the
                        first floor in the utility room or garage; unless the applicable building code or codes do not
                        prescribe another location for the breaker boxes.</td>
                    }
                @else
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        N/A
                    </td>
                    <td>Each breaker box is located not higher than 48 inches above the floor inside the building on the
                        first floor in the utility room or garage; unless the applicable building code or codes do not
                        prescribe another location for the breaker boxes.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($interior_ins10 == 'Yes')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Check all electrical clears door casings, and that it is not behind door swing.</td>
                    }
                @elseif ($interior_ins10 == 'No')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Check all electrical clears door casings, and that it is not behind door swing.</td>
                    }
                @else
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        N/A
                    </td>
                    <td>Check all electrical clears door casings, and that it is not behind door swing.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($interior_ins11 == 'Yes')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Smoke detector and carbon monoxide detector locations wired.</td>
                    }
                @elseif ($interior_ins11 == 'No')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Smoke detector and carbon monoxide detector locations wired.</td>
                    }
                @else
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        N/A
                    </td>
                    <td>Smoke detector and carbon monoxide detector locations wired.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($interior_ins12 == 'Yes')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>All walls and corners are plumb.</td>
                    }
                @elseif ($interior_ins12 == 'No')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>All walls and corners are plumb.</td>
                    }
                @else
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        N/A
                    </td>
                    <td>All walls and corners are plumb.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($interior_ins13 == 'Yes')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Toilets at 17-19 inches on center from side wall.</td>
                    }
                @elseif ($interior_ins13 == 'No')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Toilets at 17-19 inches on center from side wall.</td>
                    }
                @else
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        N/A
                    </td>
                    <td>Toilets at 17-19 inches on center from side wall.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($interior_ins14 == 'Yes')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Space is provided on both sides of doors for casing.</td>
                    }
                @elseif ($interior_ins14 == 'No')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Space is provided on both sides of doors for casing.</td>
                    }
                @else
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        N/A
                    </td>
                    <td>Space is provided on both sides of doors for casing.</td>
                    }
                @endif

            </tr>
            <tr>
                <td colspan="2"
                    style="text-align:left; height:40px; vertical-align: top;
        text-align: left; ">
                    <b>Inspector Observation Remarks:</b>

                </td>
            </tr>

        </table>
        <table style="width:100%">
            <tr>
                <th colspan="2" style="text-align:center; ">Windows and Doors</th>

            </tr>
            <tr>
                @if ($win_doors1 == 'Yes')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Verify windows are compliant with windstorm/Green Standard requirements.</td>
                    }
                @elseif ($win_doors1 == 'No')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Verify windows are compliant with windstorm/Green Standard requirements.</td>
                    }
                @else
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        N/A
                    </td>
                    <td>Verify windows are compliant with windstorm/Green Standard requirements.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($win_doors2 == 'Yes')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Door and window headers are sized properly, load-bearing and non load-bearing.</td>
                    }
                @elseif ($win_doors2 == 'No')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Door and window headers are sized properly, load-bearing and non load-bearing.</td>
                    }
                @else
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        N/A
                    </td>
                    <td>Door and window headers are sized properly, load-bearing and non load-bearing.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($win_doors3 == 'Yes')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>House wrap is installed in all window and door openings prior to installation of windows/doors.
                    </td>
                    }
                @elseif ($win_doors3 == 'No')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>House wrap is installed in all window and door openings prior to installation of windows/doors.
                    </td>
                    }
                @else
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        N/A
                    </td>
                    <td>House wrap is installed in all window and door openings prior to installation of windows/doors.
                    </td>
                    }
                @endif

            </tr>
            <tr>
                <td colspan="2"
                    style="text-align:left; height:40px; vertical-align: top;
        text-align: left; ">
                    <b>Inspector Observation Remarks:</b>

                </td>
            </tr>
        </table>
        <table style="width:100%">
            <tr>
                <th colspan="2" style="text-align:center; ">Exterior Inspection</th>

            </tr>
            <tr>
                @if ($exterior_ins1 == 'Yes')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Exterior walls are plumb and straight (no bows).</td>
                    }
                @elseif ($exterior_ins1 == 'No')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Exterior walls are plumb and straight (no bows).</td>
                    }
                @else
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        N/A
                    </td>
                    <td>Exterior walls are plumb and straight (no bows).</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($exterior_ins2 == 'Yes')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Lap Siding: 'HZ10' Hardie Plank, 6 1/4", smooth or textured finish, pre-primed. (Installed
                        measurement 5” visible).</td>
                    }
                @elseif ($exterior_ins2 == 'No')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Lap Siding: 'HZ10' Hardie Plank, 6 1/4", smooth or textured finish, pre-primed. (Installed
                        measurement 5” visible).</td>
                    }
                @else
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        N/A
                    </td>
                    <td>Lap Siding: 'HZ10' Hardie Plank, 6 1/4", smooth or textured finish, pre-primed. (Installed
                        measurement 5” visible).</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($exterior_ins3 == 'Yes')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>All siding is free of deficiencies. Note any cracked, dented, bowed, or chipped siding that
                        requires replacement.</td>
                    }
                @elseif ($exterior_ins3 == 'No')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>All siding is free of deficiencies. Note any cracked, dented, bowed, or chipped siding that
                        requires replacement.</td>
                    }
                @else
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        N/A
                    </td>
                    <td>All siding is free of deficiencies. Note any cracked, dented, bowed, or chipped siding that
                        requires replacement.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($exterior_ins4 == 'Yes')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>All butt-joints are less than 1/8 inch, both siding and trim.</td>
                    }
                @elseif ($exterior_ins4 == 'No')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>All butt-joints are less than 1/8 inch, both siding and trim.</td>
                    }
                @else
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        N/A
                    </td>
                    <td>All butt-joints are less than 1/8 inch, both siding and trim.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($exterior_ins5 == 'Yes')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Use trim nails on 1x4 Hardie trim (siding).</td>
                    }
                @elseif ($exterior_ins5 == 'No')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Use trim nails on 1x4 Hardie trim (siding).</td>
                    }
                @else
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        N/A
                    </td>
                    <td>Use trim nails on 1x4 Hardie trim (siding).</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($exterior_ins6 == 'Yes')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>All roof jacks installed.</td>
                    }
                @elseif ($exterior_ins6 == 'No')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>All roof jacks installed.</td>
                    }
                @else
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        N/A
                    </td>
                    <td>All roof jacks installed.</td>
                    }
                @endif


            </tr>

            <tr>
                @if ($exterior_ins7 == 'Yes')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Every door and window location and size are confirmed.</td>
                    }
                @elseif ($exterior_ins7 == 'No')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Every door and window location and size are confirmed.</td>
                    }
                @else
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        N/A
                    </td>
                    <td>Every door and window location and size are confirmed.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($exterior_ins8 == 'Yes')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Window and door openings are plumb.</td>
                    }
                @elseif ($exterior_ins8 == 'No')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Window and door openings are plumb.</td>
                    }
                @else
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        N/A
                    </td>
                    <td>Window and door openings are plumb.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($exterior_ins9 == 'Yes')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Sheathing on the house is cut tight, straight, without gaps or holes, and nailed per plan
                        specifications.</td>
                    }
                @elseif ($exterior_ins9 == 'No')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Sheathing on the house is cut tight, straight, without gaps or holes, and nailed per plan
                        specifications.</td>
                    }
                @else
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        N/A
                    </td>
                    <td>Sheathing on the house is cut tight, straight, without gaps or holes, and nailed per plan
                        specifications.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($exterior_ins10 == 'Yes')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Two exterior hose bibs (front/back).</td>
                    }
                @elseif ($exterior_ins10 == 'No')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Two exterior hose bibs (front/back).</td>
                    }
                @else
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        N/A
                    </td>
                    <td>Two exterior hose bibs (front/back).</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($exterior_ins11 == 'Yes')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Verify minimum ½ inch expansion gap: between siding and porch floor, and between ramp and
                        siding.
                    </td>
                    }
                @elseif ($exterior_ins11 == 'No')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Verify minimum ½ inch expansion gap: between siding and porch floor, and between ramp and
                        siding.
                    </td>
                    }
                @else
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        N/A
                    </td>
                    <td>Verify minimum ½ inch expansion gap: between siding and porch floor, and between ramp and
                        siding.
                    </td>
                    }
                @endif

            </tr>

            <tr>
                <td colspan="2"
                    style="text-align:left; height:40px; vertical-align: top;
        text-align: left; ">
                    <b>Inspector Observation Remarks:</b>

                </td>
            </tr>
        </table>

        <table style="width:100%">
            <tr>
                <th colspan="2" style="text-align:center; ">Roof/Attic</th>

            </tr>
            <tr>
                @if ($roof_ins1 == 'Yes')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>HVAC ductwork in place properly installed, no gaps or openings.</td>
                    }
                @elseif ($roof_ins1 == 'No')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>HVAC ductwork in place properly installed, no gaps or openings.</td>
                    }
                @else
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        N/A
                    </td>
                    <td>HVAC ductwork in place properly installed, no gaps or openings.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($roof_ins2 == 'Yes')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>AC intakes/returns are on the main floor.</td>
                    }
                @elseif ($roof_ins2 == 'No')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>AC intakes/returns are on the main floor.</td>
                    }
                @else
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        N/A
                    </td>
                    <td>AC intakes/returns are on the main floor.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($roof_ins3 == 'Yes')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>All windstorm/fortified appurtenances are in place.</td>
                    }
                @elseif ($roof_ins3 == 'No')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>All windstorm/fortified appurtenances are in place.</td>
                    }
                @else
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        N/A
                    </td>
                    <td>All windstorm/fortified appurtenances are in place.</td>
                    }
                @endif

            </tr>
            {{-- <tr>
                <td style="text-align:center; ">{{ $roof_ins4 }}</td>
                <td>Roof sheathing is flat, no valleys or high places</td>
            </tr> --}}

            <tr>
                @if ($roof_ins6 == 'Yes')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Roof sheathing is flat, no valleys or high places. Radiant barrier installed.</td>
                    }
                @elseif ($roof_ins6 == 'No')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Roof sheathing is flat, no valleys or high places. Radiant barrier installed.</td>
                    }
                @else
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        N/A
                    </td>
                    <td>Roof sheathing is flat, no valleys or high places. Radiant barrier installed.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($roof_ins5 == 'Yes')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Roof decking is installed with small gap 1/16–1/8 inch on all end joints.</td>
                    }
                @elseif ($roof_ins5 == 'No')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Roof decking is installed with small gap 1/16–1/8 inch on all end joints.</td>
                    }
                @else
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        N/A
                    </td>
                    <td>Roof decking is installed with small gap 1/16–1/8 inch on all end joints.</td>
                    }
                @endif


            </tr>

            <tr>

                @if ($roof_ins8 == 'Yes')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Roof sheathing is nailed per plan and windstorm requirements.</td>
                    }
                @elseif ($roof_ins8 == 'No')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>Roof sheathing is nailed per plan and windstorm requirements.</td>
                    }
                @else
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        N/A
                    </td>
                    <td>Roof sheathing is nailed per plan and windstorm requirements.</td>
                    }
                @endif

            </tr>

            <tr>
                <td colspan="2"
                    style="text-align:left; height:40px; vertical-align: top;
        text-align: left; ">
                    <b>Inspector Observation Remarks:</b>

                </td>
            </tr>

        </table>
        <table style="width:100%; ">
            <tr>
                <th colspan="2" style="text-align:center; ">Signatures</th>
            </tr>
            <tr>

                <td colspan="2" style="padding-left: 0px !important;">
                    <p>Under penalties of perjury, I certify that the information presented in this document is
                        true and accurate to the best
                        of my knowledge and belief. I further understand that providing false representations herein
                        constitutes an act of
                        fraud. False, misleading or incomplete information may result in my ineligibility to participate
                        in
                        Programs that
                        will accept this document.</p>
                    <p><b>Warning: Any person who knowingly makes a false claim or statement to HUD may be subject to
                            civil or
                            criminal penalties under 18 U.S.C. 287, 1001 and 31 U.S.C. 3729</b></p>
                </td>
            </tr>

            </tr>
            <tr>
                <td><b>Inspector Printed Name:&nbsp;</b>{{ $inspector_name }}
                </td>
                <td rowspan="2"><b>Date:</b>{{ $in_signdate }}</td>

            </tr>
            <tr>
                <td><b>Inspector Signature: </b><img style="height:100px;"
                        src="{{ url('public/storage/uploads/' . $in_sign) }}" class="sign" alt=" "></td>
            </tr>
            <tr>
                <td><b>Superintendent Printed
                        Name:&nbsp;</b>{{ $superintendent }}</td>
                <td rowspan="2"><b>Date:</b>{{ $sup_signdate }}</td>

            </tr>
            <tr>
                <td><b>Superintendent Signature: </b><img style="height:100px;"
                        src="{{ url('public/storage/uploads/' . $sup_sign) }}" class="sign" alt=" "></td>
            </tr>


        </table>
        <p style="font-family:Times New Roman; font-size: 70%;  font-weight:bold  margin-left: 72px;">**Based upon
            IRC 2012, ADA 2010, HUD Housing Quality Standards and CDR Design Standards</p>
        @if ($photo_1 != null)
            <img src="{{ url('public/storage/uploads/' . $photo_1) }}" class="photos" alt=" "><br>
        @endif
        @if ($photo_2 != null)
            <img src="{{ url('public/storage/uploads/' . $photo_2) }}" class="photos" alt=" "><br>
            {{-- <div style="page-break-before:always;"> </div> --}}
        @endif
        @if ($photo_3 != null)
            <img src="{{ url('public/storage/uploads/' . $photo_3) }}" class="photos" alt=" "><br>
            {{-- <div style="page-break-before:always;"> </div> --}}
        @endif
        @if ($photo_4 != null)
            <img src="{{ url('public/storage/uploads/' . $photo_4) }}" class="photos" alt=" "><br>
            {{-- <div style="page-break-before:always;"> </div> --}}
        @endif
        @if ($photo_5 != null)
            <img src="{{ url('public/storage/uploads/' . $photo_5) }}" class="photos" alt=" "><br>
            {{-- <div style="page-break-before:always;"> </div> --}}
        @endif
        @if ($photo_6 != null)
            <img src="{{ url('public/storage/uploads/' . $photo_6) }}" class="photos" alt=" "><br>
            {{-- <div style="page-break-before:always;"> </div> --}}
        @endif
        @if ($photo_7 != null)
            <img src="{{ url('public/storage/uploads/' . $photo_7) }}" class="photos" alt=" "><br>
            {{-- <div style="page-break-before:always;"> </div> --}}
        @endif
        @if ($photo_8 != null)
            <img src="{{ url('public/storage/uploads/' . $photo_8) }}" class="photos" alt=" "><br>
            {{-- <div style="page-break-before:always;"> </div> --}}
        @endif
        @if ($photo_9 != null)
            <img src="{{ url('public/storage/uploads/' . $photo_9) }}" class="photos" alt=" "><br>
            {{-- <div style="page-break-before:always;"> </div> --}}
        @endif
        @if ($photo_10 != null)
            <img src="{{ url('public/storage/uploads/' . $photo_10) }}" class="photos" alt=" "><br>
            {{-- <div style="page-break-before:always;"> </div> --}}
        @endif
        @if ($photo_11 != null)
            <img src="{{ url('public/storage/uploads/' . $photo_11) }}" class="photos" alt=" "><br>
            {{-- <div style="page-break-before:always;"> </div> --}}
        @endif
        @if ($photo_12 != null)
            <img src="{{ url('public/storage/uploads/' . $photo_12) }}" class="photos" alt=" "><br>
            {{-- <div style="page-break-before:always;"> </div> --}}
        @endif
        @if ($photo_13 != null)
            <img src="{{ url('public/storage/uploads/' . $photo_13) }}" class="photos" alt=" "><br>
            {{-- <div style="page-break-before:always;"> </div> --}}
        @endif
        @if ($photo_14 != null)
            <img src="{{ url('public/storage/uploads/' . $photo_14) }}" class="photos" alt=" "><br>
            {{-- <div style="page-break-before:always;"> </div> --}}
        @endif
        @if ($photo_15 != null)
            <img src="{{ url('public/storage/uploads/' . $photo_15) }}" class="photos" alt=" "><br>
            {{-- <div style="page-break-before:always;"> </div> --}}
        @endif
        @if ($photo_16 != null)
            <img src="{{ url('public/storage/uploads/' . $photo_16) }}" class="photos" alt=" "><br>
            {{-- <div style="page-break-before:always;"> </div> --}}
        @endif
        @if ($photo_17 != null)
            <img src="{{ url('public/storage/uploads/' . $photo_17) }}" class="photos" alt=" "><br>
            {{-- <div style="page-break-before:always;"> </div> --}}
        @endif
        @if ($photo_18 != null)
            <img src="{{ url('public/storage/uploads/' . $photo_18) }}" class="photos" alt=" "><br>
            {{-- <div style="page-break-before:always;"> </div> --}}
        @endif
        @if ($photo_19 != null)
            <img src="{{ url('public/storage/uploads/' . $photo_19) }}" class="photos" alt=" "><br>
            {{-- <div style="page-break-before:always;"> </div> --}}
        @endif
        @if ($photo_20 != null)
            <img src="{{ url('public/storage/uploads/' . $photo_20) }}" class="photos" alt=" "><br>
            {{-- <div style="page-break-before:always;"> </div> --}}
        @endif
        @if ($photo_21 != null)
            <img src="{{ url('public/storage/uploads/' . $photo_21) }}" class="photos" alt=" "><br>
            {{-- <div style="page-break-before:always;"> </div> --}}
        @endif
        @if ($photo_22 != null)
            <img src="{{ url('public/storage/uploads/' . $photo_22) }}" class="photos" alt=" "><br>
            {{-- <div style="page-break-before:always;"> </div> --}}
        @endif
        @if ($photo_23 != null)
            <img src="{{ url('public/storage/uploads/' . $photo_23) }}" class="photos" alt=" "><br>
            {{-- <div style="page-break-before:always;"> </div> --}}
        @endif
        @if ($photo_24 != null)
            <img src="{{ url('public/storage/uploads/' . $photo_24) }}" class="photos" alt=" "><br>
            {{-- <div style="page-break-before:always;"> </div> --}}
        @endif
        @if ($photo_25 != null)
            <img src="{{ url('public/storage/uploads/' . $photo_25) }}" class="photos" alt=" "><br>
            {{-- <div style="page-break-before:always;"> </div> --}}
        @endif
        @if ($photo_26 != null)
            <img src="{{ url('public/storage/uploads/' . $photo_26) }}" class="photos" alt=" "><br>
            {{-- <div style="page-break-before:always;"> </div> --}}
        @endif
        @if ($photo_27 != null)
            <img src="{{ url('public/storage/uploads/' . $photo_27) }}" class="photos" alt=" "><br>
            {{-- <div style="page-break-before:always;"> </div> --}}
        @endif
        @if ($photo_28 != null)
            <img src="{{ url('public/storage/uploads/' . $photo_28) }}" class="photos" alt=" "><br>
            {{-- <div style="page-break-before:always;"> </div> --}}
        @endif
        @if ($photo_29 != null)
            <img src="{{ url('public/storage/uploads/' . $photo_29) }}" class="photos" alt=" "><br>
            {{-- <div style="page-break-before:always;"> </div> --}}
        @endif
        @if ($photo_30 != null)
            <img src="{{ url('public/storage/uploads/' . $photo_30) }}" class="photos" alt=" "><br>
            {{-- <div style="page-break-before:always;"> </div> --}}
        @endif
        @if ($deficiency_photo_1 != null ||
            $deficiency_photo_2 != null ||
            $deficiency_photo_3 != null ||
            $deficiency_photo_4 != null ||
            $deficiency_photo_5 != null ||
            $deficiency_photo_6 != null ||
            $deficiency_photo_7 != null ||
            $deficiency_photo_8 != null ||
            $deficiency_photo_9 != null ||
            $deficiency_photo_10 != null ||
            $deficiency_photo_11 != null ||
            $deficiency_photo_12 != null ||
            $deficiency_photo_13 != null)
            <div style="page-break-before:always;"> </div>
            <h3 style="text-align: center;  font-family: Times New Roman; ">Deficiencies</h3>
        @endif
        @if ($deficiency_photo_1 != null)
            <img src="{{ url('public/storage/uploads/' . $deficiency_photo_1) }}" class="photos" alt=" "><br>
        @endif
        @if ($deficiency_photo_2 != null)
            <img src="{{ url('public/storage/uploads/' . $deficiency_photo_2) }}" class="photos" alt=" "><br>
            {{-- <div style="page-break-before:always;"> </div> --}}
        @endif
        @if ($deficiency_photo_3 != null)
            <img src="{{ url('public/storage/uploads/' . $deficiency_photo_3) }}" class="photos" alt=" "><br>
            {{-- <div style="page-break-before:always;"> </div> --}}
        @endif
        @if ($deficiency_photo_4 != null)
            <img src="{{ url('public/storage/uploads/' . $deficiency_photo_4) }}" class="photos" alt=" "><br>
            {{-- <div style="page-break-before:always;"> </div> --}}
        @endif
        @if ($deficiency_photo_5 != null)
            <img src="{{ url('public/storage/uploads/' . $deficiency_photo_5) }}" class="photos" alt=" "><br>
            {{-- <div style="page-break-before:always;"> </div> --}}
        @endif
        @if ($deficiency_photo_6 != null)
            <img src="{{ url('public/storage/uploads/' . $deficiency_photo_6) }}" class="photos" alt=" "><br>
            {{-- <div style="page-break-before:always;"> </div> --}}
        @endif
        @if ($deficiency_photo_7 != null)
            <img src="{{ url('public/storage/uploads/' . $deficiency_photo_7) }}" class="photos" alt=" "><br>
            {{-- <div style="page-break-before:always;"> </div> --}}
        @endif
        @if ($deficiency_photo_8 != null)
            <img src="{{ url('public/storage/uploads/' . $deficiency_photo_8) }}" class="photos" alt=" "><br>
            {{-- <div style="page-break-before:always;"> </div> --}}
        @endif
        @if ($deficiency_photo_9 != null)
            <img src="{{ url('public/storage/uploads/' . $deficiency_photo_9) }}" class="photos" alt=" "><br>
            {{-- <div style="page-break-before:always;"> </div> --}}
        @endif
        @if ($deficiency_photo_10 != null)
            <img src="{{ url('public/storage/uploads/' . $deficiency_photo_10) }}" class="photos"
                alt=" "><br>
            {{-- <div style="page-break-before:always;"> </div> --}}
        @endif
        @if ($deficiency_photo_11 != null)
            <img src="{{ url('public/storage/uploads/' . $deficiency_photo_11) }}" class="photos"
                alt=" "><br>
            {{-- <div style="page-break-before:always;"> </div> --}}
        @endif
        @if ($deficiency_photo_12 != null)
            <img src="{{ url('public/storage/uploads/' . $deficiency_photo_12) }}" class="photos"
                alt=" "><br>
            {{-- <div style="page-break-before:always;"> </div> --}}
        @endif
        @if ($deficiency_photo_13 != null)
            <img src="{{ url('public/storage/uploads/' . $deficiency_photo_13) }}" class="photos"
                alt=" "><br>
            {{-- <div style="page-break-before:always;"> </div> --}}
        @endif





    </main>
</body>

</html>
