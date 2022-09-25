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
                        style="font-family:Times New Roman; font-size:90.25%;  font-weight: bold;  margin-right: 110px; margin-top:6;
                                    ">
                        Texas General Land Office<br>
                        Community Development and Revitalization<br>
                        Form 11.03<br>
                        Final Inspection Checklist</p>
                </div>
            </div>

        </div>


    </header>
    <footer>



        <div class="row">
            <div class="column">
                <p
                    style="font-family:Times New Roman; color:black; font-size: 70.25%;  font-weight: bold;  margin-left: 82px; margin-top: 48px;
              ">
                    Form 11.03 - Final Inspection Checklist</p>
            </div>
            <div class="column">
                <p
                    style="font-family:Times New Roman; color:black; font-size: 70.25%;  font-weight: bold;  margin-left: 75px; margin-top: 48px;
                      ">
                    July 2022</p>
            </div>
            <div class="column">
                <p style="font-family:Times New Roman; color:black; font-size: 70.25%;  font-weight: bold; margin-top: 48px;
                "
                    class="page_no">

                </p>
            </div>
        </div>


        <p
            style="font-family:Times New Roman; color:black; font-size: 60.25%;  font-style: italic;  margin-left: 72px; margin-top: -20px">
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
                <td><b>Building Contractor Name: {{ $contractor_name }}<b></td>
                <td><b>Floor Plan: {{ $floorplan }}</b>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:center; "><i><u><b>**Must Be Completed Immediately Prior to TREC
                                Inspection**</b></u></i></td>
            </tr>
        </table>


        <table style="width:100%">
            <tr>
                <th colspan="2" style="text-align:center; ">General Inspection</th>

            </tr>
            {{-- <tr>
                <td style="text-align:center;  width: 15%; ">{{ $result_1 }}</td>
                <td>(REHAB) All in-scope work (on form 11.17) is performed satisfactorily</td>
            </tr> --}}
            <tr>
                @if ($result_2 == 'Yes')
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
                    <td>House numbers installed.</td>
                    }
                @elseif ($result_2 == 'No')
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
                    <td>House numbers installed.</td>
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
                    <td>House numbers installed.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($result_3 == 'Yes')
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
                    <td>Driveway pad is size 14’ x 20.’ Connection to street 9’ wide, where applicable.</td>
                    }
                @elseif ($result_3 == 'No')
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
                    <td>Driveway pad is size 14’ x 20.’ Connection to street 9’ wide, where applicable.</td>
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
                    <td>Driveway pad is size 14’ x 20.’ Connection to street 9’ wide, where applicable.</td>
                    }
                @endif

            </tr>



            <tr>
                @if ($result_1 == 'Yes')
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 3px;padding-bottom: 1px;text-align: center;">x</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>All flatwork (driveway, walks, etc.) level, not cracked/damaged/irregular, pitting, spalling,
                        expansion joints present.</td>
                    }
                @elseif ($result_1 == 'No')
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
                    <td>All flatwork (driveway, walks, etc.) level, not cracked/damaged/irregular, pitting, spalling,
                        expansion joints present.</td>
                    }
                @else
                    {

                    <td style="text-align:center; width:28%"><span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 3px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        Yes
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">x</span>
                        N/A
                    </td>
                    <td>All flatwork (driveway, walks, etc.) level, not cracked/damaged/irregular, pitting, spalling,
                        expansion joints present.</td>
                    }
                @endif
            </tr>

            <tr>
                @if ($result_4 == 'Yes')
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
                    <td>Peepholes on all exterior doors.</td>
                    }
                @elseif ($result_4 == 'No')
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
                    <td>Peepholes on all exterior doors.</td>
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
                    <td>Peepholes on all exterior doors.</td>
                    }
                @endif

            </tr>

            <tr>
                @if ($result_15 == 'Yes')
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
                    <td>Exterior door locks are properly adjusted, deadbolt fully extends into jamb.</td>
                    }
                @elseif ($result_15 == 'No')
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
                    <td>Exterior door locks are properly adjusted, deadbolt fully extends into jamb.</td>
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
                    <td>Exterior door locks are properly adjusted, deadbolt fully extends into jamb.</td>
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
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        No
                        <span
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>No-step entrance serviced by ramp (if applicable) slope is 1:12 w/ two (2) grip rails.</td>
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
                            style="border: 1px solid black;padding-top: -1px;padding-left: 5px;padding-right: 5px;padding-bottom: 1px;text-align: center;">&nbsp;</span>
                        N/A
                    </td>
                    <td>No-step entrance serviced by ramp (if applicable) slope is 1:12 w/ two (2) grip rails.</td>
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
                    <td>No-step entrance serviced by ramp (if applicable) slope is 1:12 w/ two (2) grip rails.</td>
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
                    <td>Top of grip rails at consistent height, 34-38 inches vertically above walking surfaces, stair
                        noses, and ramp surfaces. (ADA 2010, 504.4).</td>
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
                    <td>Top of grip rails at consistent height, 34-38 inches vertically above walking surfaces, stair
                        noses, and ramp surfaces. (ADA 2010, 504.4).</td>
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
                    <td>Top of grip rails at consistent height, 34-38 inches vertically above walking surfaces, stair
                        noses, and ramp surfaces. (ADA 2010, 504.4).</td>
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
                    <td>Maximum 4-inch opening on all balusters/rail supports (if applicable).</td>
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
                    <td>Maximum 4-inch opening on all balusters/rail supports (if applicable).</td>
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
                    <td>Maximum 4-inch opening on all balusters/rail supports (if applicable).</td>
                    }
                @endif

            </tr>









            <tr>
                @if ($result_5 == 'Yes')
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
                    <td>Accessible route present from street to one entrance door.</td>
                    }
                @elseif ($result_5 == 'No')
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
                    <td>Accessible route present from street to one entrance door.</td>
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
                    <td>Accessible route present from street to one entrance door.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($result_6 == 'Yes')
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
                    <td>At least one entrance door with standard 36-inch door.</td>
                    }
                @elseif ($result_6 == 'No')
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
                    <td>At least one entrance door with standard 36-inch door.</td>
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
                    <td>At least one entrance door with standard 36-inch door.</td>
                    }
                @endif

            </tr>

            <tr>
                @if ($result_22 == 'Yes')
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
                    <td>Exterior is free of trash and construction materials.</td>
                    }
                @elseif ($result_22 == 'No')
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
                    <td>Exterior is free of trash and construction materials.</td>
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
                    <td>Exterior is free of trash and construction materials.</td>
                    }
                @endif

            </tr>

            <tr>
                @if ($result_21 == 'Yes')
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
                    <td>Foundation cables properly stressed and secured (if applicable).</td>
                    }
                @elseif ($result_21 == 'No')
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
                    <td>Foundation cables properly stressed and secured (if applicable).</td>
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
                    <td>Foundation cables properly stressed and secured (if applicable).</td>
                    }
                @endif

            </tr>



            <tr>
                @if ($result_23 == 'Yes')
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
                    <td>Porch/decks and ramps cleaned/pressure washed.</td>
                    }
                @elseif ($result_23 == 'No')
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
                    <td>Porch/decks and ramps cleaned/pressure washed.</td>
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
                    <td>Porch/decks and ramps cleaned/pressure washed.</td>
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
                    <td>Hallways at least 36” wide, level & ramped/beveled changes at each door threshold.</td>
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
                    <td>Hallways at least 36” wide, level & ramped/beveled changes at each door threshold.</td>
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
                    <td>Hallways at least 36” wide, level & ramped/beveled changes at each door threshold.</td>
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
                    <td>Roof is complete with drip edge, all vent boot/caps, shingles straight and level.</td>
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
                    <td>Roof is complete with drip edge, all vent boot/caps, shingles straight and level.</td>
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
                    <td>Roof is complete with drip edge, all vent boot/caps, shingles straight and level.</td>
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
                    <td>All weatherproofing installed at exterior doors.</td>
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
                    <td>All weatherproofing installed at exterior doors.</td>
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
                    <td>All weatherproofing installed at exterior doors.</td>
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
                    <td>Building permit, Certificate of Occupancy, Elevation Certificate and Inspection green tags on
                        site and visible.</td>
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
                    <td>Building permit, Certificate of Occupancy, Elevation Certificate and Inspection green tags on
                        site and visible.</td>
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
                    <td>Building permit, Certificate of Occupancy, Elevation Certificate and Inspection green tags on
                        site and visible.</td>
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
                    <td>Termite treatment completed and certificate on hand.</td>
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
                    <td>Termite treatment completed and certificate on hand.</td>
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
                    <td>Termite treatment completed and certificate on hand.</td>
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
                    <td>Green (Energy) Standards Certificate on hand.</td>
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
                    <td>Green (Energy) Standards Certificate on hand.</td>
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
                    <td>Green (Energy) Standards Certificate on hand.</td>
                    }
                @endif

            </tr>
            {{-- <tr>
                <td style="text-align:center; ">{{ $result_13 }}</td>
                <td>Accessible route throughout home</td>
            </tr> --}}


            {{-- <tr>
                <td style="text-align:center; ">{{ $result_16 }}</td>
                <td>36-inch height on stair handrails (measured at front of stair nose)</td>
            </tr> --}}
            {{-- <tr>
                <td style="text-align:center; ">{{ $result_17 }}</td>
                <td>Maximum 4-inch opening on all balusters/rail supports (if applicable)</td>
            </tr> --}}

            {{-- <tr>
                <td style="text-align:center; ">{{ $result_20 }}</td>
                <td>Inside of home is free from debris, swept and clean</td>
            </tr> --}}




            <tr>


                <td colspan="2"
                    style="text-align:left; height:130px; vertical-align: top;
                text-align: left; ">
                    <b>Inspector Observation Remarks:</b>

                </td>
            </tr>

        </table>

        <div style="page-break-before:always;"> </div>

        <table style="width:100%">
            <tr>
                <th colspan="2" style="text-align:center; ">Exterior Inspection</th>

            </tr>
            <tr>
                @if ($ex_ins_1 == 'Yes')
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
                    <td>All piping/drain lines secured to home and exposed pipes insulated.</td>
                    }
                @elseif ($ex_ins_1 == 'No')
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
                    <td>All piping/drain lines secured to home and exposed pipes insulated.</td>
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
                    <td>All piping/drain lines secured to home and exposed pipes insulated.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($ex_ins_2 == 'Yes')
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
                    <td>Appropriate water main cut-off exists.</td>
                    }
                @elseif ($ex_ins_2 == 'No')
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
                    <td>Appropriate water main cut-off exists.</td>
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
                    <td>Appropriate water main cut-off exists.</td>
                    }
                @endif

            </tr>


            <tr>
                @if ($ex_ins_4 == 'Yes')
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
                    <td>Hardie plank installed under house, painted (elevated homes where applicable).</td>
                    }
                @elseif ($ex_ins_4 == 'No')
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
                    <td>Hardie plank installed under house, painted (elevated homes where applicable).</td>
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
                    <td>Hardie plank installed under house, painted (elevated homes where applicable).</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($ex_ins_5 == 'Yes')
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
                    <td>Two (2) hose bibs with vacuum breakers (anti-syphon devices) near front and back.</td>
                    }
                @elseif ($ex_ins_5 == 'No')
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
                    <td>Two (2) hose bibs with vacuum breakers (anti-syphon devices) near front and back.</td>
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
                    <td>Two (2) hose bibs with vacuum breakers (anti-syphon devices) near front and back.</td>
                    }
                @endif

            </tr>










            <tr>
                @if ($ex_ins_3 == 'Yes')
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
                    <td>Check electrostatic grounding of gas lines.</td>
                    }
                @elseif ($ex_ins_3 == 'No')
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
                    <td>Check electrostatic grounding of gas lines.</td>
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
                    <td>Check electrostatic grounding of gas lines.</td>
                    }
                @endif

            </tr>


            {{-- <tr>
                <td style="text-align:center; ">{{ $ex_ins_6 }}</td>
                <td>All flatwork (driveway, walks, etc.) level, not cracked/damaged/irregular, pitting, spalling,
                    expansion joints present</td>
            </tr> --}}
            <tr>
                @if ($ex_ins_7 == 'Yes')
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
                    <td>All Siding is free of blemishes. Note any cracks, dents, bows, chips or gaps.</td>
                    }
                @elseif ($ex_ins_7 == 'No')
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
                    <td>All Siding is free of blemishes. Note any cracks, dents, bows, chips or gaps.</td>
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
                    <td>All Siding is free of blemishes. Note any cracks, dents, bows, chips or gaps.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($ex_ins_8 == 'Yes')
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
                    <td>All exposed surfaces painted without visible defects (from 6 feet away).</td>
                    }
                @elseif ($ex_ins_8 == 'No')
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
                    <td>All exposed surfaces painted without visible defects (from 6 feet away).</td>
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
                    <td>All exposed surfaces painted without visible defects (from 6 feet away).</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($ex_ins_9 == 'Yes')
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
                    <td>Silicone caulk present at exterior door sills and windows. All Exterior penetrations are
                        weatherproofed.</td>
                    }
                @elseif ($ex_ins_9 == 'No')
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
                    <td>Silicone caulk present at exterior door sills and windows. All Exterior penetrations are
                        weatherproofed.</td>
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
                    <td>Silicone caulk present at exterior door sills and windows. All Exterior penetrations are
                        weatherproofed.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($ex_ins_10 == 'Yes')
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
                    <td>All screens installed, not damaged/torn.</td>
                    }
                @elseif ($ex_ins_10 == 'No')
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
                    <td>All screens installed, not damaged/torn.</td>
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
                    <td>All screens installed, not damaged/torn.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($ex_ins_11 == 'Yes')
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
                    <td>All roof jacks painted to match.</td>
                    }
                @elseif ($ex_ins_11 == 'No')
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
                    <td>All roof jacks painted to match.</td>
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
                    <td>All roof jacks painted to match.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($ex_ins_12 == 'Yes')
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
                    <td>Gutters, downspouts, diverters, and splash blocks are installed in the required areas.</td>
                    }
                @elseif ($ex_ins_12 == 'No')
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
                    <td>Gutters, downspouts, diverters, and splash blocks are installed in the required areas.</td>
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
                    <td>Gutters, downspouts, diverters, and splash blocks are installed in the required areas.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($ex_ins_13 == 'Yes')
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
                    <td>Finish grade at foundation provides positive drainage away from structure, starting at a min of
                        6” below finish floor at slab on grade or a min of 6” below pier footings for elevated floor.
                    </td>
                    }
                @elseif ($ex_ins_13 == 'No')
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
                    <td>Finish grade at foundation provides positive drainage away from structure, starting at a min of
                        6” below finish floor at slab on grade or a min of 6” below pier footings for elevated floor.
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
                    <td>Finish grade at foundation provides positive drainage away from structure, starting at a min of
                        6” below finish floor at slab on grade or a min of 6” below pier footings for elevated floor.
                    </td>
                    }
                @endif

            </tr>
            <tr>
                @if ($ex_ins_14 == 'Yes')
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
                    <td>Trees are trimmed at least 3 feet from the structure, roof, and ramp. Sod is in the required
                        area.</td>
                    }
                @elseif ($ex_ins_14 == 'No')
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
                    <td>Trees are trimmed at least 3 feet from the structure, roof, and ramp. Sod is in the required
                        area.</td>
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
                    <td>Trees are trimmed at least 3 feet from the structure, roof, and ramp. Sod is in the required
                        area.</td>
                    }
                @endif

            </tr>
            {{-- <tr>
                <td style="text-align:center; ">{{ $ex_ins_15 }}</td>
                <td>Existing gutters, splash blocks, water diverters, not damaged or detached</td>
            </tr> --}}

            {{-- <tr>
                <td style="text-align:center; ">{{ $ex_ins_17 }}</td>
                <td>Appropriate water main cut-off exists</td>
            </tr> --}}

        </table>

        <table style="width:100%">
            <tr>
                <th colspan="2" style="text-align:center; ">Interior Inspection</th>

            </tr>
            {{-- <tr>
                <td style='text-align:center; width: 15%;'>{{ $in_ins_1 }}</td>
                <td>ReHab-Switches, receptacles, circuit breakers & thermostat are functional</td>
            </tr>
            <tr>
                <td style='text-align:center; '>{{ $in_ins_2 }}</td>
                <td>ReHab-All switch and receptacle plates level, flush, and without defects</td>
            </tr>
            <tr>
                <td style='text-align:center; '>{{ $in_ins_3 }}</td>
                <td>ReHab-Walls and drywall are visually free of blemishes</td>
            </tr>
            <tr>
                <td style='text-align:center; '>{{ $in_ins_4 }}</td>
                <td>ReHab-Verify all base trim is properly installed</td>
            </tr> --}}
            <tr>
                @if ($in_ins_5 == 'Yes')
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
                    <td>Inside of home is free from debris and swept(frml).</td>
                    }
                @elseif ($in_ins_5 == 'No')
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
                    <td>Inside of home is free from debris and swept(frml).</td>
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
                    <td>Inside of home is free from debris and swept(frml).</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($in_ins_6 == 'Yes')
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
                    <td>Operable switches, circuit breakers & thermostat no higher than 48” above floor.</td>
                    }
                @elseif ($in_ins_6 == 'No')
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
                    <td>Operable switches, circuit breakers & thermostat no higher than 48” above floor.</td>
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
                    <td>Operable switches, circuit breakers & thermostat no higher than 48” above floor.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($in_ins_7 == 'Yes')
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
                    <td>All switches and receptacles properly installed and operable; switch plates level, flush, and
                        without defects. Each receptacle/plug is at least 15” above the floor.</td>
                    }
                @elseif ($in_ins_7 == 'No')
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
                    <td>All switches and receptacles properly installed and operable; switch plates level, flush, and
                        without defects. Each receptacle/plug is at least 15” above the floor.</td>
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
                    <td>All switches and receptacles properly installed and operable; switch plates level, flush, and
                        without defects. Each receptacle/plug is at least 15” above the floor.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($in_ins_8 == 'Yes')
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
                    <td>Wall and ceiling sheetrock is free of deficiencies; ridges, bubbling, cracking at tape joints,
                        corners and lines are straight.</td>
                    }
                @elseif ($in_ins_8 == 'No')
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
                    <td>Wall and ceiling sheetrock is free of deficiencies; ridges, bubbling, cracking at tape joints,
                        corners and lines are straight.</td>
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
                    <td>Wall and ceiling sheetrock is free of deficiencies; ridges, bubbling, cracking at tape joints,
                        corners and lines are straight.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($in_ins_9 == 'Yes')
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
                    <td>Verify all base trim is matching profile. Base appears to be straight; a bow in the base is a
                        visual cue drywall is bowed.</td>
                    }
                @elseif ($in_ins_9 == 'No')
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
                    <td>Verify all base trim is matching profile. Base appears to be straight; a bow in the base is a
                        visual cue drywall is bowed.</td>
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
                    <td>Verify all base trim is matching profile. Base appears to be straight; a bow in the base is a
                        visual cue drywall is bowed.</td>
                    }
                @endif


            </tr>



            <tr>
                @if ($in_ins_12 == 'Yes')
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
                    <td>Ensure cabinets are straight and line up with the walls properly.</td>
                    }
                @elseif ($in_ins_12 == 'No')
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
                    <td>Ensure cabinets are straight and line up with the walls properly.</td>
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
                    <td>Ensure cabinets are straight and line up with the walls properly.</td>
                    }
                @endif

            </tr>


            <tr>
                @if ($in_ins_10 == 'Yes')
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
                    <td>Smoke/CO detectors installed in proper locations and operational.</td>
                    }
                @elseif ($in_ins_10 == 'No')
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
                    <td>Smoke/CO detectors installed in proper locations and operational.</td>
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
                    <td>Smoke/CO detectors installed in proper locations and operational.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($in_ins_11 == 'Yes')
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
                    <td>Ensure paint coverage is acceptable, free from flaws visible from 6 feet away.</td>
                    }
                @elseif ($in_ins_11 == 'No')
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
                    <td>Ensure paint coverage is acceptable, free from flaws visible from 6 feet away.</td>
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
                    <td>Ensure paint coverage is acceptable, free from flaws visible from 6 feet away.</td>
                    }
                @endif

            </tr>

            <tr>
                @if ($in_ins_13 == 'Yes')
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
                    <td>Ensure interior doors are at least standard 32” door, unless the door provides access only to
                        closet of less than 15 square feet in area.</td>
                    }
                @elseif ($in_ins_13 == 'No')
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
                    <td>Ensure interior doors are at least standard 32” door, unless the door provides access only to
                        closet of less than 15 square feet in area.</td>
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
                    <td>Ensure interior doors are at least standard 32” door, unless the door provides access only to
                        closet of less than 15 square feet in area.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($in_ins_14 == 'Yes')
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
                    <td>Check vinyl flooring for deficiencies such as peeling/lifting, visible gaps/seams,
                        ridges/depressions, scratches, or overall poor workmanship.</td>
                    }
                @elseif ($in_ins_14 == 'No')
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
                    <td>Check vinyl flooring for deficiencies such as peeling/lifting, visible gaps/seams,
                        ridges/depressions, scratches, or overall poor workmanship.</td>
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
                    <td>Check vinyl flooring for deficiencies such as peeling/lifting, visible gaps/seams,
                        ridges/depressions, scratches, or overall poor workmanship.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($in_ins_15 == 'Yes')
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
                    <td>Ceramic/porcelain tile – all joints perpendicular & parallel to walls. Installed around outlets,
                        fixtures, pipes/fittings so that plates, escutcheons, and collars overlap cuts.</td>
                    }
                @elseif ($in_ins_15 == 'No')
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
                    <td>Ceramic/porcelain tile – all joints perpendicular & parallel to walls. Installed around outlets,
                        fixtures, pipes/fittings so that plates, escutcheons, and collars overlap cuts.</td>
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
                    <td>Ceramic/porcelain tile – all joints perpendicular & parallel to walls. Installed around outlets,
                        fixtures, pipes/fittings so that plates, escutcheons, and collars overlap cuts.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($in_ins_16 == 'Yes')
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
                    <td>Check for Hot-Cold control reversal in all showers, tubs, and sinks.</td>
                    }
                @elseif ($in_ins_16 == 'No')
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
                    <td>Check for Hot-Cold control reversal in all showers, tubs, and sinks.</td>
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
                    <td>Check for Hot-Cold control reversal in all showers, tubs, and sinks.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($in_ins_17 == 'Yes')
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
                    <td>Check for leaks in supply and drain lines under sinks.</td>
                    }
                @elseif ($in_ins_17 == 'No')
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
                    <td>Check for leaks in supply and drain lines under sinks.</td>
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
                    <td>Check for leaks in supply and drain lines under sinks.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($in_ins_18 == 'Yes')
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
                    <td>Toilets flush properly and are firmly seated in place (no movement).</td>
                    }
                @elseif ($in_ins_18 == 'No')
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
                    <td>Toilets flush properly and are firmly seated in place (no movement).</td>
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
                    <td>Toilets flush properly and are firmly seated in place (no movement).</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($in_ins_19 == 'Yes')
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
                    <td>AC & Heat; check for cold and hot air movement; system in good working order; check thermostat
                        functions.</td>
                    }
                @elseif ($in_ins_19 == 'No')
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
                    <td>AC & Heat; check for cold and hot air movement; system in good working order; check thermostat
                        functions.</td>
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
                    <td>AC & Heat; check for cold and hot air movement; system in good working order; check thermostat
                        functions.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($in_ins_20 == 'Yes')
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
                    <td>AC filter in place; filter panel easily removable.</td>
                    }
                @elseif ($in_ins_20 == 'No')
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
                    <td>AC filter in place; filter panel easily removable.</td>
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
                    <td>AC filter in place; filter panel easily removable.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($in_ins_21 == 'Yes')
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
                    <td>AC registers properly installed (no gaps, all screws) and level.</td>
                    }
                @elseif ($in_ins_21 == 'No')
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
                    <td>AC registers properly installed (no gaps, all screws) and level.</td>
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
                    <td>AC registers properly installed (no gaps, all screws) and level.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($in_ins_22 == 'Yes')
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
                    <td>Septic system installed and operational (if applicable).</td>
                    }
                @elseif ($in_ins_22 == 'No')
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
                    <td>Septic system installed and operational (if applicable).</td>
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
                    <td>Septic system installed and operational (if applicable).</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($in_ins_23 == 'Yes')
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
                    <td>Well water system installed and operational (if applicable).</td>
                    }
                @elseif ($in_ins_23 == 'No')
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
                    <td>Well water system installed and operational (if applicable).</td>
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
                    <td>Well water system installed and operational (if applicable).</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($in_ins_24 == 'Yes')
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
                    <td>Water heater installed, operational. (If located on main floor in construction plans, must be in
                        designated and properly ventilated closet).</td>
                    }
                @elseif ($in_ins_24 == 'No')
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
                    <td>Water heater installed, operational. (If located on main floor in construction plans, must be in
                        designated and properly ventilated closet).</td>
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
                    <td>Water heater installed, operational. (If located on main floor in construction plans, must be in
                        designated and properly ventilated closet).</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($in_ins_25 == 'Yes')
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
                    <td>Appliances installed, operational.</td>
                    }
                @elseif ($in_ins_25 == 'No')
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
                    <td>Appliances installed, operational.</td>
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
                    <td>Appliances installed, operational.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($in_ins_26 == 'Yes')
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
                    <td>Anti-tip device installed for the stove/oven range.</td>
                    }
                @elseif ($in_ins_26 == 'No')
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
                    <td>Anti-tip device installed for the stove/oven range.</td>
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
                    <td>Anti-tip device installed for the stove/oven range.</td>
                    }
                @endif

            </tr>
            {{-- <tr>
                <td style='text-align:center; '>{{ $in_ins_27 }}</td>
                <td>ReHab-Attic insulation is installed properly</td>
            </tr>
            <tr>
                <td style='text-align:center; '>{{ $in_ins_28 }}</td>
                <td>ReHab-Attic access door insulated and closes properly</td>
            </tr>
            <tr>
                <td style='text-align:center; '>{{ $in_ins_29 }}</td>
                <td>ReHab-All window screens installed, NOT excessively torn or missing</td>
            </tr>
            <tr>
                <td style='text-align:center; '>{{ $in_ins_30 }}</td>
                <td>ReHab-Insulation stop at attic access</td>
            </tr> --}}
            <tr>
                @if ($in_ins_31 == 'Yes')
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
                    <td>Washing machine outlet box, ice maker outlet box, dryer vent box (or trim) present.</td>
                    }
                @elseif ($in_ins_31 == 'No')
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
                    <td>Washing machine outlet box, ice maker outlet box, dryer vent box (or trim) present.</td>
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
                    <td>Washing machine outlet box, ice maker outlet box, dryer vent box (or trim) present.</td>
                    }
                @endif

            </tr>
            {{-- <tr>
                <td style='text-align:center; '>{{ $in_ins_32 }}</td>
                <td>Region</td>
            </tr> --}}
            <tr>
                @if ($in_ins_33 == 'Yes')
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
                    <td>Attic - Verify insulation installed, stop, and access door insulation are present.</td>
                    }
                @elseif ($in_ins_33 == 'No')
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
                    <td>Attic - Verify insulation installed, stop, and access door insulation are present.</td>
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
                    <td>Attic - Verify insulation installed, stop, and access door insulation are present.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($in_ins_34 == 'Yes')
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
                    <td>Windows & doors operate smoothly (hinge screws installed, locks & hardware).</td>
                    }
                @elseif ($in_ins_34 == 'No')
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
                    <td>Windows & doors operate smoothly (hinge screws installed, locks & hardware).</td>
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
                    <td>Windows & doors operate smoothly (hinge screws installed, locks & hardware).</td>
                    }
                @endif

            </tr>
            {{-- <tr>
                <td style='text-align:center; '>{{ $in_ins_35 }}</td>
                <td>Ensure cabinets are straight and line up with the walls properly</td>
            </tr> --}}
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
                    <td>Air Conditioner breaker properly sized.</td>
                    }
                @elseif ($el_ins_1 == 'No')
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
                    <td>Air Conditioner breaker properly sized.</td>
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
                    <td>Air Conditioner breaker properly sized.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($el_ins_2 == 'Yes')
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
                    <td>All exhaust fans and ceiling fans are operational, no excessive noise or vibration.</td>
                    }
                @elseif ($el_ins_2 == 'No')
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
                    <td>All exhaust fans and ceiling fans are operational, no excessive noise or vibration.</td>
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
                    <td>All exhaust fans and ceiling fans are operational, no excessive noise or vibration.</td>
                    }
                @endif

            </tr>
            {{-- <tr>
                <td style='text-align:center; '>{{ $el_ins_3 }}</td>
                <td>ReHab-AC Condenser location ok, and operable</td>
            </tr> --}}
            <tr>
                @if ($el_ins_4 == 'Yes')
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
                    <td>AC Condenser location on concrete pad or deck. Water diverter over AC unit.</td>
                    }
                @elseif ($el_ins_4 == 'No')
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
                    <td>AC Condenser location on concrete pad or deck. Water diverter over AC unit.</td>
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
                    <td>AC Condenser location on concrete pad or deck. Water diverter over AC unit.</td>
                    }
                @endif

            </tr>
            {{-- <tr>
                <td style='text-align:center; '>{{ $el_ins_5 }}</td>
                <td>ReHab-Aluminum wiring is NOT visually apparent. (If aluminum wiring, check "NO"</td>
            </tr> --}}
            <tr>
                @if ($el_ins_6 == 'Yes')
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
                    <td>Breaker box located on 1st floor, operational parts no higher than 48” from floor.</td>
                    }
                @elseif ($el_ins_6 == 'No')
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
                    <td>Breaker box located on 1st floor, operational parts no higher than 48” from floor.</td>
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
                    <td>Breaker box located on 1st floor, operational parts no higher than 48” from floor.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($el_ins_7 == 'Yes')
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
                    <td>Check that all required GFCI circuits are present and operating properly.</td>
                    }
                @elseif ($el_ins_7 == 'No')
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
                    <td>Check that all required GFCI circuits are present and operating properly.</td>
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
                    <td>Check that all required GFCI circuits are present and operating properly.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($el_ins_8 == 'Yes')
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
                    <td>Check that all required AFCI circuits are present and operating properly.</td>
                    }
                @elseif ($el_ins_8 == 'No')
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
                    <td>Check that all required AFCI circuits are present and operating properly.</td>
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
                    <td>Check that all required AFCI circuits are present and operating properly.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($el_ins_9 == 'Yes')
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
                    <td>All circuit breakers clearly labeled.</td>
                    }
                @elseif ($el_ins_9 == 'No')
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
                    <td>All circuit breakers clearly labeled.</td>
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
                    <td>All circuit breakers clearly labeled.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($el_ins_10 == 'Yes')
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
                    <td>Check ground and polarity of all receptacles.</td>
                    }
                @elseif ($el_ins_10 == 'No')
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
                    <td>Check ground and polarity of all receptacles.</td>
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
                    <td>Check ground and polarity of all receptacles.</td>
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
                    <td>If lift present, ensure it is operable, and lift gates fasten securely.</td>
                    }
                @elseif ($ac_ins_1 == 'No')
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
                    <td>If lift present, ensure it is operable, and lift gates fasten securely.</td>
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
                    <td>If lift present, ensure it is operable, and lift gates fasten securely.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($ac_ins_2 == 'Yes')
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
                    <td>Walk-in shower.</td>
                    }
                @elseif ($ac_ins_2 == 'No')
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
                    <td>Walk-in shower.</td>
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
                    <td>Walk-in shower.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($ac_ins_3 == 'Yes')
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
                    <td>Grab bars installed properly.</td>
                    }
                @elseif ($ac_ins_3 == 'No')
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
                    <td>Grab bars installed properly.</td>
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
                    <td>Grab bars installed properly.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($ac_ins_4 == 'Yes')
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
                    <td>Toilets exactly at 18 inches (on center) from finished side wall.</td>
                    }
                @elseif ($ac_ins_4 == 'No')
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
                    <td>Toilets exactly at 18 inches (on center) from finished side wall.</td>
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
                    <td>Toilets exactly at 18 inches (on center) from finished side wall.</td>
                    }
                @endif

            </tr>
            <tr>
                @if ($ac_ins_5 == 'Yes')
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
                    <td>Toilet seat height is 17–19 inches from floor.</td>
                    }
                @elseif ($ac_ins_5 == 'No')
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
                    <td>Toilet seat height is 17–19 inches from floor.</td>
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
