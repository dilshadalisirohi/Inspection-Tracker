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
            font-size: 13px;
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
                        style="font-family:Times New Roman; font-size:90.25%;  font-weight: bold;  margin-right: 100px; margin-top:15;
                                    ">
                        Texas General Land Office<br>
                        Community Development and Revitalization<br>
                        REHAB Final Inspection Checklist Form 11.03-R </p>
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
                    Form 11.03-R - Progress Inspection Checklist</p>
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
            style="font-family:Times New Roman; color:black; font-size: 60.25%;  font-style: italic;  margin-left: 72px; margin-top: -12px">
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
                <td><b>Subrecipient or State Representative’s Name: </b>
                    {{ $report_glo }}</td>
                <td><b>Contract No. and/or WO:</b><br> {{ $report_contact }}</td>
            </tr>
            <tr>
                <td><b>Applicant Name:</b> {{ $applicant_name }}</td>
                <td><b>Co-Applicant Name:</b>
                </td>
            </tr>
            <tr>
                <td colspan="2"><b>Physical Address:</b> {{ $applicant_address }}</td>
            </tr>
            <tr>
                <td><b>Building Contractor Name: {{ $contractor_name }} </b></td>
                <td><b>Floor Plan: {{ $floorplan }}</b>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:center; "><i><u><b>**Must be Completed Immediately Prior TREC
                                Inspection**</b></u></i>
                    <br> <b>Instructions:</b> Check Yes, No, or N/A; in addition, check items that are deficiencies that
                    were NOT
                    included in the Builder’s
                    Original Scope on the 11.17 Form or Change Orders. These are not Builder’s Deficiencies (will not be
                    reflected on the Builder
                    Scoring). NOS= “Not on Scope)

                </td>
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
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td><b>All in-scope work (on form 11.17) is performed satisfactorily.</b></td>
                    }

                    {{-- NO --}}
                @elseif ($result_1 == 'No')
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td><b>All in-scope work (on form 11.17) is performed satisfactorily.</b></td>

                    }

                    {{-- N/A --}}
                @elseif ($result_1 == 'N/A')
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td><b>All in-scope work (on form 11.17) is performed satisfactorily.</b></td>

                    }

                    {{-- NOS --}}
                @elseif ($result_1 == 'NOS')
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        NOS
                    </td>
                    <td><b>All in-scope work (on form 11.17) is performed satisfactorily.</b></td>

                    }
                @endif












            </tr>
            <tr>
                @if ($result_2 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center;"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Building permit and green tags in place and visible.</td>
                    }

                    {{-- NO --}}
                @elseif ($result_2 == 'No')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Building permit and green tags in place and visible.</td>

                    }

                    {{-- N/A --}}
                @elseif ($result_2 == 'N/A')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Building permit and green tags in place and visible.</td>

                    }

                    {{-- NOS --}}
                @elseif ($result_2 == 'NOS')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        NOS
                    </td>
                    <td>Building permit and green tags in place and visible.</td>

                    }
                @endif








            </tr>
            <tr>
                @if ($result_3 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center;"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Exterior door locks properly adjusted, deadbolt fully extends into jamb.</td>
                    }

                    {{-- NO --}}
                @elseif ($result_3 == 'No')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Exterior door locks properly adjusted, deadbolt fully extends into jamb.</td>

                    }

                    {{-- N/A --}}
                @elseif ($result_3 == 'N/A')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Exterior door locks properly adjusted, deadbolt fully extends into jamb.</td>

                    }

                    {{-- NOS --}}
                @elseif ($result_3 == 'NOS')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        NOS
                    </td>
                    <td>Exterior door locks properly adjusted, deadbolt fully extends into jamb.</td>
                    }
                @endif
            </tr>
            <tr>
                @if ($result_4 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center;"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Top surface of gripping handrails at 34-38 inches vertically above walking
                        surfaces, stair noses, and ramp surfaces (if applicable).</td>
                    }

                    {{-- NO --}}
                @elseif ($result_4 == 'No')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Top surface of gripping handrails at 34-38 inches vertically above walking
                        surfaces, stair noses, and ramp surfaces (if applicable).</td>

                    }

                    {{-- N/A --}}
                @elseif ($result_4 == 'N/A')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Top surface of gripping handrails at 34-38 inches vertically above walking
                        surfaces, stair noses, and ramp surfaces (if applicable).</td>

                    }

                    {{-- NOS --}}
                @elseif ($result_4 == 'NOS')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        NOS
                    </td>
                    <td>Top surface of gripping handrails at 34-38 inches vertically above walking
                        surfaces, stair noses, and ramp surfaces (if applicable).</td>

                    }
                @endif




            </tr>
            <tr>
                @if ($result_5 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center;"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Maximum 4-inch opening on all balusters/rail supports (if applicable). Not
                        missing required balusters.</td>

                    }

                    {{-- NO --}}
                @elseif ($result_5 == 'No')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Maximum 4-inch opening on all balusters/rail supports (if applicable). Not
                        missing required balusters.</td>


                    }

                    {{-- N/A --}}
                @elseif ($result_5 == 'N/A')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Maximum 4-inch opening on all balusters/rail supports (if applicable). Not
                        missing required balusters.</td>


                    }

                    {{-- NOS --}}
                @elseif ($result_5 == 'NOS')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        NOS
                    </td>
                    <td>Maximum 4-inch opening on all balusters/rail supports (if applicable). Not
                        missing required balusters.</td>


                    }
                @endif

            </tr>
            <tr>
                @if ($result_6 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center;"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>All weatherproofing installed at exterior doors.</td>

                    }

                    {{-- NO --}}
                @elseif ($result_6 == 'No')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>All weatherproofing installed at exterior doors.</td>


                    }

                    {{-- N/A --}}
                @elseif ($result_6 == 'N/A')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>All weatherproofing installed at exterior doors.</td>


                    }

                    {{-- NOS --}}
                @elseif ($result_6 == 'NOS')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        NOS
                    </td>
                    <td>All weatherproofing installed at exterior doors.</td>


                    }
                @endif

            </tr>
            <tr>
                @if ($result_7 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center;"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Roof complete including drip edge, all vent boots/caps, shingles straight &
                        level.</td>

                    }

                    {{-- NO --}}
                @elseif ($result_7 == 'No')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Roof complete including drip edge, all vent boots/caps, shingles straight &
                        level.</td>


                    }

                    {{-- N/A --}}
                @elseif ($result_7 == 'N/A')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Roof complete including drip edge, all vent boots/caps, shingles straight &
                        level.</td>


                    }

                    {{-- NOS --}}
                @elseif ($result_7 == 'NOS')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        NOS
                    </td>
                    <td>Roof complete including drip edge, all vent boots/caps, shingles straight &
                        level.</td>


                    }
                @endif


            </tr>
            <tr>
                @if ($result_8 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center;"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Inside of home is free from construction debris, swept and clean.</td>

                    }

                    {{-- NO --}}
                @elseif ($result_8 == 'No')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Inside of home is free from construction debris, swept and clean.</td>


                    }

                    {{-- N/A --}}
                @elseif ($result_8 == 'N/A')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Inside of home is free from construction debris, swept and clean.</td>


                    }

                    {{-- NOS --}}
                @elseif ($result_8 == 'NOS')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        NOS
                    </td>
                    <td>Inside of home is free from construction debris, swept and clean.</td>


                    }
                @endif

            </tr>
            <tr>
                @if ($result_9 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center;"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Exterior free of trash and construction materials.</td>

                    }

                    {{-- NO --}}
                @elseif ($result_9 == 'No')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Exterior free of trash and construction materials.</td>


                    }

                    {{-- N/A --}}
                @elseif ($result_9 == 'N/A')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Exterior free of trash and construction materials.</td>


                    }

                    {{-- NOS --}}
                @elseif ($result_9 == 'NOS')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        NOS
                    </td>
                    <td>Exterior free of trash and construction materials.</td>


                    }
                @endif

            </tr>
            <tr>


                <td colspan="2"
                    style="text-align:left; height:50px; vertical-align: top;
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
                    {{-- Yes --}}
                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>House numbers in place, visible.</td>
                    }

                    {{-- NO --}}
                @elseif ($exterior_ins1 == 'No')
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>House numbers in place, visible.</td>

                    }

                    {{-- N/A --}}
                @elseif ($exterior_ins1 == 'N/A')
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>House numbers in place, visible.</td>

                    }

                    {{-- NOS --}}
                @elseif ($exterior_ins1 == 'NOS')
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        NOS
                    </td>
                    <td>House numbers in place, visible.</td>

                    }
                @endif

            </tr>
            <tr>

                @if ($exterior_ins2 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center;"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>All piping/drain lines secured to home and exposed pipes insulated.</td>

                    }

                    {{-- NO --}}
                @elseif ($exterior_ins2 == 'No')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>All piping/drain lines secured to home and exposed pipes insulated.</td>


                    }

                    {{-- N/A --}}
                @elseif ($exterior_ins2 == 'N/A')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>All piping/drain lines secured to home and exposed pipes insulated.</td>


                    }

                    {{-- NOS --}}
                @elseif ($exterior_ins2 == 'NOS')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        NOS
                    </td>
                    <td>All piping/drain lines secured to home and exposed pipes insulated.</td>


                    }
                @endif

            </tr>

            <tr>

                @if ($exterior_ins3 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center;"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Appropriate water main cut-off exists, accessible.</td>

                    }

                    {{-- NO --}}
                @elseif ($exterior_ins3 == 'No')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Appropriate water main cut-off exists, accessible.</td>


                    }

                    {{-- N/A --}}
                @elseif ($exterior_ins3 == 'N/A')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Appropriate water main cut-off exists, accessible.</td>


                    }

                    {{-- NOS --}}
                @elseif ($exterior_ins3 == 'NOS')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        NOS
                    </td>
                    <td>Appropriate water main cut-off exists, accessible.</td>


                    }
                @endif

            </tr>
            <tr>
                @if ($exterior_ins4 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center;"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Check electrostatic grounding of gas lines.</td>

                    }

                    {{-- NO --}}
                @elseif ($exterior_ins4 == 'No')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Check electrostatic grounding of gas lines.</td>


                    }

                    {{-- N/A --}}
                @elseif ($exterior_ins4 == 'N/A')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Check electrostatic grounding of gas lines.</td>


                    }

                    {{-- NOS --}}
                @elseif ($exterior_ins4 == 'NOS')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        NOS
                    </td>
                    <td>Check electrostatic grounding of gas lines.</td>


                    }
                @endif
            </tr>
            <tr>
                @if ($exterior_ins5 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center;"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>All flatwork (driveway, walks, etc.) free of tripping hazards (if not replace).</td>

                    }

                    {{-- NO --}}
                @elseif ($exterior_ins5 == 'No')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>All flatwork (driveway, walks, etc.) free of tripping hazards (if not replace).</td>


                    }

                    {{-- N/A --}}
                @elseif ($exterior_ins5 == 'N/A')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>All flatwork (driveway, walks, etc.) free of tripping hazards (if not replace).</td>


                    }

                    {{-- NOS --}}
                @elseif ($exterior_ins5 == 'NOS')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        NOS
                    </td>
                    <td>All flatwork (driveway, walks, etc.) free of tripping hazards (if not replace).</td>


                    }
                @endif
            </tr>
            <tr>
                @if ($exterior_ins6 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center;"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Siding free of bowing, loose pieces, cracks, dents or chips.</td>

                    }

                    {{-- NO --}}
                @elseif ($exterior_ins6 == 'No')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Siding free of bowing, loose pieces, cracks, dents or chips.</td>


                    }

                    {{-- N/A --}}
                @elseif ($exterior_ins6 == 'N/A')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Siding free of bowing, loose pieces, cracks, dents or chips.</td>


                    }

                    {{-- NOS --}}
                @elseif ($exterior_ins6 == 'NOS')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        NOS
                    </td>
                    <td>Siding free of bowing, loose pieces, cracks, dents or chips.</td>


                    }
                @endif

            </tr>

            <tr>

                @if ($exterior_ins7 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center;"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Verify minimum ½ inch expansion gap between siding and porch floor, and between siding and ramp.
                    </td>

                    }

                    {{-- NO --}}
                @elseif ($exterior_ins7 == 'No')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Verify minimum ½ inch expansion gap between siding and porch floor, and between siding and ramp.
                    </td>


                    }

                    {{-- N/A --}}
                @elseif ($exterior_ins7 == 'N/A')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Verify minimum ½ inch expansion gap between siding and porch floor, and between siding and ramp.
                    </td>


                    }

                    {{-- NOS --}}
                @elseif ($exterior_ins7 == 'NOS')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        NOS
                    </td>
                    <td>Verify minimum ½ inch expansion gap between siding and porch floor, and between siding and ramp.
                    </td>


                    }
                @endif

            </tr>
            <tr>
                @if ($exterior_ins8 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center;"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>All exposed surfaces painted, and exterior paint complete without visible defects (from 6 feet
                        away). </td>

                    }

                    {{-- NO --}}
                @elseif ($exterior_ins8 == 'No')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>All exposed surfaces painted, and exterior paint complete without visible defects (from 6 feet
                        away).</td>


                    }

                    {{-- N/A --}}
                @elseif ($exterior_ins8 == 'N/A')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>All exposed surfaces painted, and exterior paint complete without visible defects (from 6 feet
                        away). </td>


                    }

                    {{-- NOS --}}
                @elseif ($exterior_ins8 == 'NOS')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        NOS
                    </td>
                    <td>All exposed surfaces painted, and exterior paint complete without visible defects (from 6 feet
                        away).</td>


                    }
                @endif

            </tr>
            <tr>
                @if ($exterior_ins9 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center;"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Silicone caulk present at exterior door sills and windows. Exterior penetrations are
                        weatherproofed.</td>

                    }

                    {{-- NO --}}
                @elseif ($exterior_ins9 == 'No')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Silicone caulk present at exterior door sills and windows. Exterior penetrations are
                        weatherproofed.</td>


                    }

                    {{-- N/A --}}
                @elseif ($exterior_ins9 == 'N/A')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Silicone caulk present at exterior door sills and windows. Exterior penetrations are
                        weatherproofed.</td>


                    }

                    {{-- NOS --}}
                @elseif ($exterior_ins9 == 'NOS')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        NOS
                    </td>
                    <td>Silicone caulk present at exterior door sills and windows. Exterior penetrations are
                        weatherproofed.</td>


                    }
                @endif
            </tr>
            <tr>
                @if ($exterior_ins10 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center;"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Existing gutters, splash blocks, water diverters, not damaged or detatched.</td>

                    }

                    {{-- NO --}}
                @elseif ($exterior_ins10 == 'No')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Existing gutters, splash blocks, water diverters, not damaged or detatched.</td>


                    }

                    {{-- N/A --}}
                @elseif ($exterior_ins10 == 'N/A')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Existing gutters, splash blocks, water diverters, not damaged or detatched.</td>


                    }

                    {{-- NOS --}}
                @elseif ($exterior_ins10 == 'NOS')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        NOS
                    </td>
                    <td>Existing gutters, splash blocks, water diverters, not damaged or detatched.</td>


                    }
                @endif
            </tr>

            <tr>
                <td colspan="2"
                    style="text-align:left; height:50px; vertical-align: top;
                text-align: left; ">
                    <b>Inspector Observation Remarks:</b>

                </td>
            </tr>

        </table>
        <div style="page-break-before:always;"> </div>
        <table style="width:100%">
            <tr>
                <th colspan="2" style="text-align:center; ">Interior Inspection</th>

            </tr>
            <tr>

                @if ($interior_ins1 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Switches, receptacles, circuit breakers & thermostat are functional.</td>
                    }

                    {{-- NO --}}
                @elseif ($interior_ins1 == 'No')
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Switches, receptacles, circuit breakers & thermostat are functional.</td>

                    }

                    {{-- N/A --}}
                @elseif ($interior_ins1 == 'N/A')
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Switches, receptacles, circuit breakers & thermostat are functional.</td>

                    }

                    {{-- NOS --}}
                @elseif ($interior_ins1 == 'NOS')
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        NOS
                    </td>
                    <td>Switches, receptacles, circuit breakers & thermostat are functional.</td>

                    }
                @endif

            </tr>
            <tr>

                @if ($interior_ins2 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center;"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>All switch and receptacle plates level, flush, and without defects.</td>

                    }

                    {{-- NO --}}
                @elseif ($interior_ins2 == 'No')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>All switch and receptacle plates level, flush, and without defects.</td>


                    }

                    {{-- N/A --}}
                @elseif ($interior_ins2 == 'N/A')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>All switch and receptacle plates level, flush, and without defects.</td>


                    }

                    {{-- NOS --}}
                @elseif ($interior_ins2 == 'NOS')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        NOS
                    </td>
                    <td>All switch and receptacle plates level, flush, and without defects.</td>


                    }
                @endif

            </tr>

            <tr>

                @if ($interior_ins3 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center;"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Walls and drywall are visually free of blemishes.</td>

                    }

                    {{-- NO --}}
                @elseif ($interior_ins3 == 'No')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Walls and drywall are visually free of blemishes.</td>


                    }

                    {{-- N/A --}}
                @elseif ($interior_ins3 == 'N/A')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Walls and drywall are visually free of blemishes.</td>


                    }

                    {{-- NOS --}}
                @elseif ($interior_ins3 == 'NOS')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        NOS
                    </td>
                    <td>Walls and drywall are visually free of blemishes.</td>


                    }
                @endif

            </tr>
            <tr>
                @if ($interior_ins4 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center;"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Verify all base trim is properly installed.</td>

                    }

                    {{-- NO --}}
                @elseif ($interior_ins4 == 'No')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Verify all base trim is properly installed.</td>


                    }

                    {{-- N/A --}}
                @elseif ($interior_ins4 == 'N/A')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Verify all base trim is properly installed.</td>


                    }

                    {{-- NOS --}}
                @elseif ($interior_ins4 == 'NOS')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        NOS
                    </td>
                    <td>Verify all base trim is properly installed.</td>


                    }
                @endif
            </tr>
            <tr>
                @if ($interior_ins5 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center;"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Smoke/CO detectors installed in proper locations and operational.</td>

                    }

                    {{-- NO --}}
                @elseif ($interior_ins5 == 'No')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Smoke/CO detectors installed in proper locations and operational.</td>


                    }

                    {{-- N/A --}}
                @elseif ($interior_ins5 == 'N/A')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Smoke/CO detectors installed in proper locations and operational.</td>


                    }

                    {{-- NOS --}}
                @elseif ($interior_ins5 == 'NOS')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        NOS
                    </td>
                    <td>Smoke/CO detectors installed in proper locations and operational.</td>


                    }
                @endif
            </tr>
            <tr>
                @if ($interior_ins6 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center;"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Paint coverage is acceptable, free from flaws visible from 6 feet away.</td>

                    }

                    {{-- NO --}}
                @elseif ($interior_ins6 == 'No')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Paint coverage is acceptable, free from flaws visible from 6 feet away.</td>


                    }

                    {{-- N/A --}}
                @elseif ($interior_ins6 == 'N/A')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Paint coverage is acceptable, free from flaws visible from 6 feet away.</td>


                    }

                    {{-- NOS --}}
                @elseif ($interior_ins6 == 'NOS')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        NOS
                    </td>
                    <td>Paint coverage is acceptable, free from flaws visible from 6 feet away.</td>


                    }
                @endif

            </tr>

            <tr>

                @if ($interior_ins7 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center;"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Carpet is properly installed, not missing sections.</td>

                    }

                    {{-- NO --}}
                @elseif ($interior_ins7 == 'No')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Carpet is properly installed, not missing sections. </td>


                    }

                    {{-- N/A --}}
                @elseif ($interior_ins7 == 'N/A')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Carpet is properly installed, not missing sections.</td>


                    }

                    {{-- NOS --}}
                @elseif ($interior_ins7 == 'NOS')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        NOS
                    </td>
                    <td>Carpet is properly installed, not missing sections.
                    </td>


                    }
                @endif

            </tr>
            <tr>
                @if ($interior_ins8 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center;"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Check vinyl flooring for deficiencies such as peeling/lifting, visible gaps/seams,
                        ridges/depressions, or overall poor workmanship. </td>

                    }

                    {{-- NO --}}
                @elseif ($interior_ins8 == 'No')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Check vinyl flooring for deficiencies such as peeling/lifting, visible gaps/seams,
                        ridges/depressions, or overall poor workmanship.</td>


                    }

                    {{-- N/A --}}
                @elseif ($interior_ins8 == 'N/A')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Check vinyl flooring for deficiencies such as peeling/lifting, visible gaps/seams,
                        ridges/depressions, or overall poor workmanship. </td>


                    }

                    {{-- NOS --}}
                @elseif ($interior_ins8 == 'NOS')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        NOS
                    </td>
                    <td>Check vinyl flooring for deficiencies such as peeling/lifting, visible gaps/seams,
                        ridges/depressions, or overall poor workmanship.</td>


                    }
                @endif

            </tr>
            <tr>
                @if ($interior_ins9 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center;"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Check for Hot-Cold faucet & controls reversal in all showers, tubs, and sinks.</td>

                    }

                    {{-- NO --}}
                @elseif ($interior_ins9 == 'No')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Check for Hot-Cold faucet & controls reversal in all showers, tubs, and sinks.</td>


                    }

                    {{-- N/A --}}
                @elseif ($interior_ins9 == 'N/A')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Check for Hot-Cold faucet & controls reversal in all showers, tubs, and sinks.</td>


                    }

                    {{-- NOS --}}
                @elseif ($interior_ins9 == 'NOS')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        NOS
                    </td>
                    <td>Check for Hot-Cold faucet & controls reversal in all showers, tubs, and sinks.</td>


                    }
                @endif
            </tr>
            <tr>
                @if ($interior_ins10 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center;"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Check for leaks in supply and drain lines under sinks.</td>

                    }

                    {{-- NO --}}
                @elseif ($interior_ins10 == 'No')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Check for leaks in supply and drain lines under sinks.</td>


                    }

                    {{-- N/A --}}
                @elseif ($interior_ins10 == 'N/A')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Check for leaks in supply and drain lines under sinks.</td>


                    }

                    {{-- NOS --}}
                @elseif ($interior_ins10 == 'NOS')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        NOS
                    </td>
                    <td>Check for leaks in supply and drain lines under sinks.</td>


                    }
                @endif
            </tr>
            <tr>
                @if ($interior_ins11 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center;"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Toilets flush properly and are firmly seated in place (no movement).</td>

                    }

                    {{-- NO --}}
                @elseif ($interior_ins11 == 'No')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Toilets flush properly and are firmly seated in place (no movement).</td>


                    }

                    {{-- N/A --}}
                @elseif ($interior_ins11 == 'N/A')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Toilets flush properly and are firmly seated in place (no movement).</td>


                    }

                    {{-- NOS --}}
                @elseif ($interior_ins11 == 'NOS')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        NOS
                    </td>
                    <td>Toilets flush properly and are firmly seated in place (no movement).</td>


                    }
                @endif
            </tr>
            <tr>
                @if ($interior_ins12 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center;"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>AC & Heat — check for cold and hot air movement; system in good working order. Check thermostat
                        functions.</td>

                    }

                    {{-- NO --}}
                @elseif ($interior_ins12 == 'No')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>AC & Heat — check for cold and hot air movement; system in good working order. Check thermostat
                        functions.</td>


                    }

                    {{-- N/A --}}
                @elseif ($interior_ins12 == 'N/A')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>AC & Heat — check for cold and hot air movement; system in good working order. Check thermostat
                        functions.</td>


                    }

                    {{-- NOS --}}
                @elseif ($interior_ins12 == 'NOS')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        NOS
                    </td>
                    <td>AC & Heat — check for cold and hot air movement; system in good working order. Check thermostat
                        functions.</td>


                    }
                @endif
            </tr>
            <tr>
                @if ($interior_ins13 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center;"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>AC filter in place; filter panel removable.</td>

                    }

                    {{-- NO --}}
                @elseif ($interior_ins13 == 'No')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>AC filter in place; filter panel removable.</td>


                    }

                    {{-- N/A --}}
                @elseif ($interior_ins13 == 'N/A')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>AC filter in place; filter panel removable.</td>


                    }

                    {{-- NOS --}}
                @elseif ($interior_ins13 == 'NOS')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        NOS
                    </td>
                    <td>AC filter in place; filter panel removable.</td>


                    }
                @endif
            </tr>

            <tr>
                @if ($interior_ins14 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center;"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>AC registers properly installed (no gaps, all screws) and level.</td>

                    }

                    {{-- NO --}}
                @elseif ($interior_ins14 == 'No')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>AC registers properly installed (no gaps, all screws) and level.</td>


                    }

                    {{-- N/A --}}
                @elseif ($interior_ins14 == 'N/A')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>AC registers properly installed (no gaps, all screws) and level.</td>


                    }

                    {{-- NOS --}}
                @elseif ($interior_ins14 == 'NOS')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        NOS
                    </td>
                    <td>AC registers properly installed (no gaps, all screws) and level.</td>


                    }
                @endif
            </tr>
            <tr>
                @if ($interior_ins15 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center;"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Septic system installed and operational (if applicable).</td>

                    }

                    {{-- NO --}}
                @elseif ($interior_ins15 == 'No')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Septic system installed and operational (if applicable).</td>


                    }

                    {{-- N/A --}}
                @elseif ($interior_ins15 == 'N/A')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Septic system installed and operational (if applicable).</td>


                    }

                    {{-- NOS --}}
                @elseif ($interior_ins15 == 'NOS')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        NOS
                    </td>
                    <td>Septic system installed and operational (if applicable).</td>


                    }
                @endif
            </tr>
            <tr>
                @if ($interior_ins16 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center;"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Well water system installed and operational (if applicable).</td>

                    }

                    {{-- NO --}}
                @elseif ($interior_ins16 == 'No')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Well water system installed and operational (if applicable).</td>


                    }

                    {{-- N/A --}}
                @elseif ($interior_ins16 == 'N/A')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Well water system installed and operational (if applicable).</td>


                    }

                    {{-- NOS --}}
                @elseif ($interior_ins16 == 'NOS')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        NOS
                    </td>
                    <td>Well water system installed and operational (if applicable).</td>


                    }
                @endif
            </tr>
            <tr>
                @if ($interior_ins17 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center;"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Hot water heater installed, operational.</td>

                    }

                    {{-- NO --}}
                @elseif ($interior_ins17 == 'No')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Hot water heater installed, operational.</td>


                    }

                    {{-- N/A --}}
                @elseif ($interior_ins17 == 'N/A')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Hot water heater installed, operational.</td>


                    }

                    {{-- NOS --}}
                @elseif ($interior_ins17 == 'NOS')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        NOS
                    </td>
                    <td>Hot water heater installed, operational.</td>


                    }
                @endif
            </tr>

            <tr>
                @if ($interior_ins18 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center;"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Appliances installed, operational.</td>

                    }

                    {{-- NO --}}
                @elseif ($interior_ins18 == 'No')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Appliances installed, operational.</td>


                    }

                    {{-- N/A --}}
                @elseif ($interior_ins18 == 'N/A')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Appliances installed, operational.</td>


                    }

                    {{-- NOS --}}
                @elseif ($interior_ins18 == 'NOS')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        NOS
                    </td>
                    <td>Appliances installed, operational.</td>


                    }
                @endif
            </tr>

            <tr>
                @if ($interior_ins19 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center;"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Anti-tip device installed for the stove/oven range.</td>

                    }

                    {{-- NO --}}
                @elseif ($interior_ins19 == 'No')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Anti-tip device installed for the stove/oven range.</td>


                    }

                    {{-- N/A --}}
                @elseif ($interior_ins19 == 'N/A')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Anti-tip device installed for the stove/oven range.</td>


                    }

                    {{-- NOS --}}
                @elseif ($interior_ins19 == 'NOS')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        NOS
                    </td>
                    <td>Anti-tip device installed for the stove/oven range.</td>


                    }
                @endif
            </tr>

            <tr>
                @if ($interior_ins20 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center;"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Insulation stop at attic access.</td>

                    }

                    {{-- NO --}}
                @elseif ($interior_ins20 == 'No')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Insulation stop at attic access.</td>


                    }

                    {{-- N/A --}}
                @elseif ($interior_ins20 == 'N/A')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Insulation stop at attic access.</td>


                    }

                    {{-- NOS --}}
                @elseif ($interior_ins20 == 'NOS')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        NOS
                    </td>
                    <td>Insulation stop at attic access.</td>


                    }
                @endif
            </tr>


            <tr>
                @if ($interior_ins21 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center;"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Attic insulation is installed properly.</td>

                    }

                    {{-- NO --}}
                @elseif ($interior_ins21 == 'No')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Attic insulation is installed properly.</td>


                    }

                    {{-- N/A --}}
                @elseif ($interior_ins21 == 'N/A')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Attic insulation is installed properly.</td>


                    }

                    {{-- NOS --}}
                @elseif ($interior_ins21 == 'NOS')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        NOS
                    </td>
                    <td>Attic insulation is installed properly.</td>


                    }
                @endif
            </tr>

            <tr>
                @if ($interior_ins22 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center;"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Attic access door insulated and closes properly.</td>

                    }

                    {{-- NO --}}
                @elseif ($interior_ins22 == 'No')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Attic access door insulated and closes properly.</td>


                    }

                    {{-- N/A --}}
                @elseif ($interior_ins22 == 'N/A')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Attic access door insulated and closes properly.</td>


                    }

                    {{-- NOS --}}
                @elseif ($interior_ins22 == 'NOS')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        NOS
                    </td>
                    <td>Attic access door insulated and closes properly.</td>


                    }
                @endif
            </tr>

            <tr>
                @if ($interior_ins23 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center;"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Windows & doors are operable (all locks & hardware operate smoothly).</td>

                    }

                    {{-- NO --}}
                @elseif ($interior_ins23 == 'No')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Windows & doors are operable (all locks & hardware operate smoothly).</td>


                    }

                    {{-- N/A --}}
                @elseif ($interior_ins23 == 'N/A')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Windows & doors are operable (all locks & hardware operate smoothly).</td>


                    }

                    {{-- NOS --}}
                @elseif ($interior_ins23 == 'NOS')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        NOS
                    </td>
                    <td>Windows & doors are operable (all locks & hardware operate smoothly).</td>


                    }
                @endif
            </tr>


            <tr>
                @if ($interior_ins24 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center;"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>All window screens installed, NOT excessively torn or missing.</td>

                    }

                    {{-- NO --}}
                @elseif ($interior_ins24 == 'No')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>All window screens installed, NOT excessively torn or missing.</td>


                    }

                    {{-- N/A --}}
                @elseif ($interior_ins24 == 'N/A')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>All window screens installed, NOT excessively torn or missing.</td>


                    }

                    {{-- NOS --}}
                @elseif ($interior_ins24 == 'NOS')
                    {
                    <td style="text-align:center;">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        NOS
                    </td>
                    <td>All window screens installed, NOT excessively torn or missing.</td>


                    }
                @endif
            </tr>

            <tr>
                <td colspan="2"
                    style="text-align:left; height:50px; vertical-align: top;
                    text-align: left; ">
                    <b>Inspector Observation Remarks:</b>

                </td>
            </tr>

        </table>
        <table style="width:100%">
            <tr>
                <th colspan="2" style="text-align:center; ">Electrical Inspection</th>

            </tr>
            <tr>
                @if ($el_ins_1 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Air Conditioner breaker properly sized.</td>
                    }

                    {{-- NO --}}
                @elseif ($el_ins_1 == 'No')
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Air Conditioner breaker properly sized.</td>

                    }

                    {{-- N/A --}}
                @elseif ($el_ins_1 == 'N/A')
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Air Conditioner breaker properly sized.</td>

                    }

                    {{-- NOS --}}
                @elseif ($el_ins_1 == 'NOS')
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        NOS
                    </td>
                    <td>Air Conditioner breaker properly sized.</td>

                    }
                @endif
            </tr>


            <tr>
                @if ($el_ins_2 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>All exhaust fans and ceiling fans are operational, no excessive noise or vibration.</td>
                    }

                    {{-- NO --}}
                @elseif ($el_ins_2 == 'No')
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>All exhaust fans and ceiling fans are operational, no excessive noise or vibration.</td>

                    }

                    {{-- N/A --}}
                @elseif ($el_ins_2 == 'N/A')
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>All exhaust fans and ceiling fans are operational, no excessive noise or vibration.</td>

                    }

                    {{-- NOS --}}
                @elseif ($el_ins_2 == 'NOS')
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        NOS
                    </td>
                    <td>All exhaust fans and ceiling fans are operational, no excessive noise or vibration.</td>

                    }
                @endif
            </tr>

            <tr>
                @if ($el_ins_3 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>AC Condenser location ok, and operable.</td>
                    }

                    {{-- NO --}}
                @elseif ($el_ins_3 == 'No')
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>AC Condenser location ok, and operable.</td>

                    }

                    {{-- N/A --}}
                @elseif ($el_ins_3 == 'N/A')
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>AC Condenser location ok, and operable.</td>

                    }

                    {{-- NOS --}}
                @elseif ($el_ins_3 == 'NOS')
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        NOS
                    </td>
                    <td>AC Condenser location ok, and operable.</td>

                    }
                @endif
            </tr>
            <tr>
                @if ($el_ins_4 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Aluminum wiring is NOT visually apparent. <i>(If aluminum wiring, check “No”)</i></td>
                    }

                    {{-- NO --}}
                @elseif ($el_ins_4 == 'No')
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Aluminum wiring is NOT visually apparent. <i>(If aluminum wiring, check “No”)</i></td>

                    }

                    {{-- N/A --}}
                @elseif ($el_ins_4 == 'N/A')
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Aluminum wiring is NOT visually apparent. <i>(If aluminum wiring, check “No”)</i></td>

                    }

                    {{-- NOS --}}
                @elseif ($el_ins_4 == 'NOS')
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        NOS
                    </td>
                    <td>Aluminum wiring is NOT visually apparent. <i>(If aluminum wiring, check “No”)</i></td>

                    }
                @endif
            </tr>
            <tr>
                @if ($el_ins_5 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Check that all required GFCI circuits are present and operating properly.</td>
                    }

                    {{-- NO --}}
                @elseif ($el_ins_5 == 'No')
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Check that all required GFCI circuits are present and operating properly.</td>

                    }

                    {{-- N/A --}}
                @elseif ($el_ins_5 == 'N/A')
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Check that all required GFCI circuits are present and operating properly.</td>

                    }

                    {{-- NOS --}}
                @elseif ($el_ins_5 == 'NOS')
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        NOS
                    </td>
                    <td>Check that all required GFCI circuits are present and operating properly.</td>

                    }
                @endif
            </tr>

            <tr>
                @if ($el_ins_6 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Check that all required AFCI circuits are present and operating properly.</td>
                    }

                    {{-- NO --}}
                @elseif ($el_ins_6 == 'No')
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Check that all required AFCI circuits are present and operating properly.</td>

                    }

                    {{-- N/A --}}
                @elseif ($el_ins_6 == 'N/A')
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Check that all required AFCI circuits are present and operating properly.</td>

                    }

                    {{-- NOS --}}
                @elseif ($el_ins_6 == 'NOS')
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        NOS
                    </td>
                    <td>Check that all required AFCI circuits are present and operating properly.</td>

                    }
                @endif
            </tr>


            <tr>
                @if ($el_ins_7 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>All circuit breakers clearly labeled.</td>
                    }

                    {{-- NO --}}
                @elseif ($el_ins_7 == 'No')
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>All circuit breakers clearly labeled.</td>

                    }

                    {{-- N/A --}}
                @elseif ($el_ins_7 == 'N/A')
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>All circuit breakers clearly labeled.</td>

                    }

                    {{-- NOS --}}
                @elseif ($el_ins_7 == 'NOS')
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        NOS
                    </td>
                    <td>All circuit breakers clearly labeled.</td>

                    }
                @endif
            </tr>



            <tr>
                @if ($el_ins_8 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Check ground and polarity of all receptacles that are reasonably accessible.</td>
                    }

                    {{-- NO --}}
                @elseif ($el_ins_8 == 'No')
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Check ground and polarity of all receptacles that are reasonably accessible.</td>

                    }

                    {{-- N/A --}}
                @elseif ($el_ins_8 == 'N/A')
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Check ground and polarity of all receptacles that are reasonably accessible.</td>

                    }

                    {{-- NOS --}}
                @elseif ($el_ins_8 == 'NOS')
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        NOS
                    </td>
                    <td>Check ground and polarity of all receptacles that are reasonably accessible.</td>

                    }
                @endif
            </tr>


            <tr>

                <td colspan="2"
                    style="text-align:left; height:50px; vertical-align: top;
                        text-align: left; ">
                    <b>Inspector Observation Remarks:</b>

                </td>

            </tr>


        </table>

        <table style="width:100%">
            <tr>
                <th colspan="2" style="text-align:center; ">Accessibility Inspection (when applicable)</th>

            </tr>
            <tr>
                @if ($ac_ins_1 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>If lift present, ensure it is operable, and lift gates fasten securely.</td>
                    }

                    {{-- NO --}}
                @elseif ($ac_ins_1 == 'No')
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>If lift present, ensure it is operable, and lift gates fasten securely.</td>

                    }

                    {{-- N/A --}}
                @elseif ($ac_ins_1 == 'N/A')
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>If lift present, ensure it is operable, and lift gates fasten securely.</td>

                    }

                    {{-- NOS --}}
                @elseif ($ac_ins_1 == 'NOS')
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        NOS
                    </td>
                    <td>If lift present, ensure it is operable, and lift gates fasten securely.</td>

                    }
                @endif
            </tr>
            <tr>
                @if ($ac_ins_2 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Walk-in shower.</td>
                    }

                    {{-- NO --}}
                @elseif ($ac_ins_2 == 'No')
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Walk-in shower.</td>

                    }

                    {{-- N/A --}}
                @elseif ($ac_ins_2 == 'N/A')
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Walk-in shower.</td>

                    }

                    {{-- NOS --}}
                @elseif ($ac_ins_2 == 'NOS')
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        NOS
                    </td>
                    <td>Walk-in shower.</td>

                    }
                @endif
            </tr>

            <tr>
                @if ($ac_ins_3 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Grab bars installed properly.</td>
                    }

                    {{-- NO --}}
                @elseif ($ac_ins_3 == 'No')
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Grab bars installed properly.</td>

                    }

                    {{-- N/A --}}
                @elseif ($ac_ins_3 == 'N/A')
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Grab bars installed properly.</td>

                    }

                    {{-- NOS --}}
                @elseif ($ac_ins_3 == 'NOS')
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        NOS
                    </td>
                    <td>Grab bars installed properly.</td>

                    }
                @endif
            </tr>

            <tr>
                @if ($ac_ins_4 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Toilets exactly at 18 inches (on center) from finished side wall.</td>
                    }

                    {{-- NO --}}
                @elseif ($ac_ins_4 == 'No')
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Toilets exactly at 18 inches (on center) from finished side wall.</td>

                    }

                    {{-- N/A --}}
                @elseif ($ac_ins_4 == 'N/A')
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Toilets exactly at 18 inches (on center) from finished side wall.</td>

                    }

                    {{-- NOS --}}
                @elseif ($ac_ins_4 == 'NOS')
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        NOS
                    </td>
                    <td>Toilets exactly at 18 inches (on center) from finished side wall.</td>

                    }
                @endif
            </tr>

            <tr>
                @if ($ac_ins_5 == 'Yes')
                    {
                    {{-- Yes --}}
                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Toilet seat height is 17–19 inches from floor.</td>
                    }

                    {{-- NO --}}
                @elseif ($ac_ins_5 == 'No')
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Toilet seat height is 17–19 inches from floor.</td>

                    }

                    {{-- N/A --}}
                @elseif ($ac_ins_5 == 'N/A')
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        NOS
                    </td>
                    <td>Toilet seat height is 17–19 inches from floor.</td>

                    }

                    {{-- NOS --}}
                @elseif ($ac_ins_5 == 'NOS')
                    {
                    <td style="text-align:center; width:28%">
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        No

                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">
                        </span>
                        N/A
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 4px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x
                        </span>
                        NOS
                    </td>
                    <td>Toilet seat height is 17–19 inches from floor.</td>

                    }
                @endif
            </tr>

            <tr>

                <td colspan="2"
                    style="text-align:left; height:50px; vertical-align: top;
                text-align: left; ">
                    <b>Inspector Observation Remarks:</b>

                </td>

            </tr>


        </table>
        <table style="width:100%">
            <tr>
                <th colspan="2" style="text-align:center; ">Signatures</th>
            </tr>
            <tr>

                <td colspan="2">
                    <p>Under penalties of perjury, I certify that the information presented in this document is true and
                        accurate to the best of
                        my knowledge and belief. I further understand that providing false representations herein
                        constitutes an act of fraud.
                        False, misleading or incomplete information may result in my ineligibility to participate in
                        Programs that will accept
                        this document.</p>
                    <p><b>Warning: Any person who knowingly makes a false claim or statement to HUD may be subject to
                            civil or
                            criminal penalties under 18 U.S.C. 287, 1001 and 31 U.S.C. 3729</b></p>
                </td>
            </tr>

            </tr>
            <tr>
                <td><b>Inspector Printed Name:&nbsp;</b>{{ $inspector_name }}</td>
                <td rowspan="2"><b>Date:</b>{{ $in_signdate }}</td>

            </tr>
            <tr>
                <td><b>Inspector Signature: </b><img src="{{ url('public/storage/uploads/' . $in_sign) }}"
                        class="sign" alt=" "></td>
            </tr>
            <tr>
                <td><b>Superintendent Printed Name:&nbsp;</b>{{ $superintendent }}</td>
                <td rowspan="2"><b>Date:</b>{{ $sup_signdate }}</td>

            </tr>
            <tr>
                <td><b>Superintendent Signature: </b><img src="{{ url('public/storage/uploads/' . $sup_sign) }}"
                        class="sign" alt=" "></td>
            </tr>


            <tr>
                <td><b>Applicant Printed Name:&nbsp;</b>{{ $applicant_name }}</td>
                <td rowspan="2"><b>Date:</b></td>

            </tr>
            <tr>
                <td><b>Applicant Signature: </b></td>
            </tr>
            <tr>
                <td><b>Co-Applicant Printed Name:&nbsp;</b></td>
                <td rowspan="2"><b>Date:</b></td>

            </tr>
            <tr>
                <td><b>Co-Applicant Signature: </b></td>
            </tr>

        </table>
        <p style="font-family:Times New Roman; font-size: 70%;  font-weight:bold  margin-left: 72px;">**Based upon
            IRC 2012, ADA 2010, HUD Housing Quality Standards and CDR Design Standards</p>
        <div style="page-break-before:always;"> </div>
        <p style="font-family:Times New Roman; font-size:15px;  font-weight:bold">List any additional items that are
            deficiencies
            that were NOT included in the Builder’s Original Scope
            (items
            not on the 11.17 From or Change Orders) that should be addressed, researched or followed up. These are
            NOT Builder’s Deficiencies (not to be reflected on the Builder Scoring).</p>



        <table width="100%" style="border: 1px solid black">
            <tr>
                <td colspan="3">
                    <p style="font-family:Times New Roman; font-size:15px;  font-weight:bold">Additional Inspector
                        Observations & Remarks:</p>
                </td>
            </tr>
            <tr style="height:10px !important;">

                <td colspan="3">&nbsp;</td>
            </tr>
            <tr style="height:10px !important;">

                <td colspan="3">&nbsp;</td>

            </tr>
            <tr style="height:10px !important;">

                <td colspan="3">&nbsp;</td>

            </tr>
            <tr style="height:10px !important;">

                <td colspan="3">&nbsp;</td>

            </tr>
            <tr style="height:10px !important;">

                <td colspan="3">&nbsp;</td>

            </tr>
            <tr style="height:10px !important;">

                <td colspan="3">&nbsp;</td>

            </tr>
            <tr style="height:10px !important;">

                <td colspan="3">&nbsp;</td>

            </tr>
            <tr style="height:10px !important;">

                <td colspan="3">&nbsp;</td>

            </tr>
            <tr style="height:10px !important;">

                <td colspan="3">&nbsp;</td>

            </tr>
            <tr style="height:10px !important;">

                <td colspan="3">&nbsp;</td>

            </tr>
            <tr style="height:10px !important;">

                <td colspan="3">&nbsp;</td>

            </tr>
            <tr style="height:10px !important;">

                <td colspan="3">&nbsp;</td>

            </tr>
            <tr style="height:10px !important;">

                <td colspan="3">&nbsp;</td>

            </tr>
            <tr style="height:10px !important;">

                <td colspan="3">&nbsp;</td>

            </tr>
            <tr style="height:10px !important;">

                <td colspan="3">&nbsp;</td>

            </tr>
            <tr style="height:10px !important;">

                <td colspan="3">&nbsp;</td>

            </tr>
            <tr style="height:10px !important;">

                <td colspan="3">&nbsp;</td>

            </tr>
            <tr style="height:10px !important;">

                <td colspan="3">&nbsp;</td>

            </tr>
            <tr style="height:10px !important;">

                <td colspan="3">&nbsp;</td>

            </tr>
            <tr style="height:10px !important;">

                <td colspan="3">&nbsp;</td>

            </tr>
            <tr style="height:10px !important;">

                <td colspan="3">&nbsp;</td>

            </tr>
            <tr style="height:10px !important;">

                <td colspan="3">&nbsp;</td>

            </tr>
        </table>













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
            <img src="{{ url('public/storage/uploads/' . $deficiency_photo_1) }}" class="photos"
                alt=" "><br>
        @endif
        @if ($deficiency_photo_2 != null)
            <img src="{{ url('public/storage/uploads/' . $deficiency_photo_2) }}" class="photos"
                alt=" "><br>
            {{-- <div style="page-break-before:always;"> </div> --}}
        @endif
        @if ($deficiency_photo_3 != null)
            <img src="{{ url('public/storage/uploads/' . $deficiency_photo_3) }}" class="photos"
                alt=" "><br>
            {{-- <div style="page-break-before:always;"> </div> --}}
        @endif
        @if ($deficiency_photo_4 != null)
            <img src="{{ url('public/storage/uploads/' . $deficiency_photo_4) }}" class="photos"
                alt=" "><br>
            {{-- <div style="page-break-before:always;"> </div> --}}
        @endif
        @if ($deficiency_photo_5 != null)
            <img src="{{ url('public/storage/uploads/' . $deficiency_photo_5) }}" class="photos"
                alt=" "><br>
            {{-- <div style="page-break-before:always;"> </div> --}}
        @endif
        @if ($deficiency_photo_6 != null)
            <img src="{{ url('public/storage/uploads/' . $deficiency_photo_6) }}" class="photos"
                alt=" "><br>
            {{-- <div style="page-break-before:always;"> </div> --}}
        @endif
        @if ($deficiency_photo_7 != null)
            <img src="{{ url('public/storage/uploads/' . $deficiency_photo_7) }}" class="photos"
                alt=" "><br>
            {{-- <div style="page-break-before:always;"> </div> --}}
        @endif
        @if ($deficiency_photo_8 != null)
            <img src="{{ url('public/storage/uploads/' . $deficiency_photo_8) }}" class="photos"
                alt=" "><br>
            {{-- <div style="page-break-before:always;"> </div> --}}
        @endif
        @if ($deficiency_photo_9 != null)
            <img src="{{ url('public/storage/uploads/' . $deficiency_photo_9) }}" class="photos"
                alt=" "><br>
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
