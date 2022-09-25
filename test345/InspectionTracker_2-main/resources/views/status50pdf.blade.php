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
        }

        th {
            font-size: 17px;
            background-color: #404040;
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
                    style="width:100px; margin-left: 75px; margin-top: 6px; ">
            </div>
            <div class="columnh">

                <div class="header_text">
                    <p style="font-family:Times New Roman; font-size:90.25%;  font-weight: bold;  margin-right: 110px; margin-top:6;
                                    ">Texas General Land Office<br>
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
                <p style="font-family:Times New Roman; font-size: 70.25%;  font-weight: bold;  margin-left: 82px; margin-top: 65px;
              ">Form 11.10 - Progress Inspection Checklist</p>
            </div>
            <div class="column">
                <p style="font-family:Times New Roman; font-size: 70.25%;  font-weight: bold;  margin-left: 75px; margin-top: 65px;
                      "> {{ Form::label('title', date('F Y')) }}</p>
            </div>
            <div class="column">
                <p style="font-family:Times New Roman; font-size: 70.25%;  font-weight: bold; margin-top: 65px;
                " class="page_no">

                </p>
            </div>
        </div>


        <p
            style="font-family:Times New Roman; font-size: 60.25%;  font-style: italic;  margin-left: 72px; margin-top: -30px">
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
                <td colspan="2" style="text-align:center; "><i><u><b>**Must be Completed Immediately Prior to Insulation
                                and Drywall**</b></u></i></td>
            </tr>
        </table>
        <table style="width:100%">
            <tr>
                <th colspan="2" style="text-align:center; ">General Inspection</th>

            </tr>
            <tr>
                <td style="text-align:center;  width: 15%; ">{{ $result_1 }}</td>
                <td>Confirm which Green Standard applies</td>
            </tr>
            <tr>
                <td style="text-align:center; ">{{ $result_2 }}</td>
                <td>Resilient roof photos verified: 1) Taped decking seams 2) Button cap nails used</td>
            </tr>
            <tr>
                <td style="text-align:center; ">{{ $result_3 }}</td>
                <td>Building permit, Elevation Certificate, Inspection green tags visible</td>
            </tr>
            <tr>
                <td style="text-align:center; ">{{ $result_4 }}</td>
                <td>Confirm foundation municipal tag and engineer’s report is issued (with the plans) and available (if
                    applicable)</td>
            </tr>
            <tr>
                <td style="text-align:center; ">{{ $result_5 }}</td>
                <td>Verify it’s framed according to plans, correct number of rooms, bathrooms, windows and double check
                    elevation (option selection), roof, etc</td>
            </tr>
            <tr>
                <td style="text-align:center; ">{{ $result_6 }}</td>
                <td>At least one 36-inch entrance door on an accessible route served by no-step entrance or ramp</td>
            </tr>
            <tr>
                <td style="text-align:center; ">{{ $result_7 }}</td>
                <td>Check finished slab surface complete/plumbing entry points patched and cured</td>
            </tr>
            <tr>
                <td style="text-align:center; ">{{ $result_8 }}</td>
                <td>No subfloor areas of unevenness exceeding 3/8 inch per 36 inches</td>
            </tr>
            <tr>
                <td style="text-align:center; ">{{ $result_9 }}</td>
                <td>Confirm rough opening for interior passage doors will accommodate a 32-inch door, unless the door
                    provides access only to closet of less than 15 sq. ft. in area</td>
            </tr>
            <tr>
                <td style="text-align:center; ">{{ $result_10 }}</td>
                <td>Each hallway has a width of at least 36 inches and is level</td>
            </tr>
            <tr>
                <td style="text-align:center; ">{{ $result_11 }}</td>
                <td>Anchor bolts, washer, nuts, all tightened (if applicable)</td>
            </tr>
            <tr>
                <td style="text-align:center; ">{{ $result_12 }}</td>
                <td>2x6 joist hangers are installed at attic/all areas, with appropriate number of nails</td>
            </tr>
            <tr>
                <td style="text-align:center; ">{{ $result_13 }}</td>
                <td>Check AC drain installed and visually clear of debris</td>
            </tr>
            <tr>
                <td style="text-align:center; ">{{ $result_14 }}</td>
                <td>Gas and electric meter location reasonably near home</td>
            </tr>
            <tr>
                <td style="text-align:center; ">{{ $result_15 }}</td>
                <td>Fur downs per plan</td>
            </tr>
            <tr>
                <td style="text-align:center; ">{{ $result_16 }}</td>
                <td>Poly spray foam at slab and roof baffles done as required</td>
            </tr>
            <tr>
                <td style="text-align:center; ">{{ $result_17 }}</td>
                <td>All trade nail guards in place</td>
            </tr>
            <tr>
                <td style="text-align:center; ">{{ $result_18 }}</td>
                <td>Framing is free from irregularities such as excessive mud, mildew, knots or flaws notching or
                    scabbing, or overall damage. Note unusual nail patterns/usage</td>
            </tr>
            <tr>
                <td style="text-align:center; ">{{ $result_19 }}</td>
                <td>Inside of home is free from debris and swept</td>
            </tr>
            <tr>
                <td style="text-align:center; ">{{ $result_20 }}</td>
                <td>All trash is picked up and placed in trash area/dumpster</td>
            </tr>
            <tr>
                <td style="text-align:center; ">{{ $result_21 }}</td>
                <td>General Inspector Observation Remarks:</td>
            </tr>


        </table>
        <div style="page-break-before:always;"> </div>
        <table style="width:100%">
            <tr>
                <th colspan="2" style="text-align:center; ">Interior Inspection</th>

            </tr>
            <tr>
                <td style="text-align:center;  width: 15%;">{{ $interior_ins1 }}</td>
                <td>Each bathroom is reinforced with blocking for potential grab bar installation as required. (32-38''
                    High Minimum, ADA 2010)</td>
            </tr>
            <tr>
                <td style="text-align:center; ">{{ $interior_ins2 }}</td>
                <td>Verify water source located on a short wall, control is on either a long or short wall of roll-in
                    shower when a permanent seat is present (if applicable) ADA 2010</td>
            </tr>
            <tr>
                <td style="text-align:center; ">{{ $interior_ins3 }}</td>
                <td>Check plan on sizes of ceiling joists and rafters. Check doubles around openings</td>
            </tr>
            <tr>
                <td style="text-align:center; ">{{ $interior_ins4 }}</td>
                <td>Studs are installed at 16 inches on center</td>
            </tr>
            <tr>
                <td style="text-align:center; ">{{ $interior_ins5 }}</td>
                <td>Door and window headers are sized to scale, load-bearing and non-load-bearing</td>
            </tr>
            <tr>
                <td style="text-align:center; ">{{ $interior_ins6 }}</td>
                <td>Check windstorm clips are present</td>
            </tr>
            <tr>
                <td style="text-align:center; ">{{ $interior_ins7 }}</td>
                <td>All receptacles (electric outlets) at least 15 inches above floor</td>
            </tr>
            <tr>
                <td style="text-align:center; ">{{ $interior_ins8 }}</td>
                <td>Light switches, fan switches and thermostat no higher than 48 inches from floor</td>
            </tr>
            <tr>
                <td style="text-align:center; ">{{ $interior_ins9 }}</td>
                <td>Each breaker box is located not higher than 48 inches above the floor inside the building on the
                    first floor in the utility room or garage; unless the applicable building code or codes do not
                    prescribe another location for the breaker boxes</td>
            </tr>
            <tr>
                <td style="text-align:center; ">{{ $interior_ins10 }}</td>
                <td>Check all electrical clears door casings, and that it is not behind door swing</td>
            </tr>
            <tr>
                <td style="text-align:center; ">{{ $interior_ins11 }}</td>
                <td>Smoke detector and carbon monoxide detector locations wired</td>
            </tr>
            <tr>
                <td style="text-align:center; ">{{ $interior_ins12 }}</td>
                <td>All walls and corners are plumb</td>
            </tr>
            <tr>
                <td style="text-align:center; ">{{ $interior_ins13 }}</td>
                <td>Toilets at 17-19 inches on center from side wall</td>
            </tr>
            <tr>
                <td style="text-align:center; ">{{ $interior_ins14 }}</td>
                <td>Space is provided on both sides of doors for casing</td>
            </tr>
            <tr>
                <td style="text-align:center; ">{{ $interior_ins15 }}</td>
                <td>Inspector Observation Remarks</td>
            </tr>

        </table>
        <table style="width:100%">
            <tr>
                <th colspan="2" style="text-align:center; ">Windows and Doors</th>

            </tr>
            <tr>
                <td style="text-align:center;  width: 15%;">{{ $win_doors1 }}</td>
                <td>Verify windows are compliant with windstorm/Green Standard requirements</td>
            </tr>
            <tr>
                <td style="text-align:center; ">{{ $win_doors2 }}</td>
                <td>Door and window headers are sized properly, load-bearing and non load-bearing</td>
            </tr>
            <tr>
                <td style="text-align:center; ">{{ $win_doors3 }}</td>
                <td>House wrap is installed in all window and door openings prior to installation of windows/doors</td>
            </tr>
            <tr>
                <td style="text-align:center; ">{{ $win_doors4 }}</td>
                <td>Windows Doors Inspector Observation Remarks</td>
            </tr>
        </table>
        <table style="width:100%">
            <tr>
                <th colspan="2" style="text-align:center; ">Exterior Inspection</th>

            </tr>
            <tr>
                <td style="text-align:center;  width: 15%;">{{ $exterior_ins1 }}</td>
                <td>Exterior walls are plumb and straight (no bows)</td>
            </tr>
            <tr>
                <td style="text-align:center;">{{ $exterior_ins2 }}</td>
                <td>Lap Siding: 'HZ10' Hardie Plank, 6 1/4", smooth or textured finish, pre-primed. (Installed
                    measurement 5” visible)</td>
            </tr>
            <tr>
                <td style="text-align:center; ">{{ $exterior_ins3 }}</td>
                <td>All siding is free of deficiencies. Note any cracked, dented, bowed, or chipped siding that requires
                    replacement</td>
            </tr>
            <tr>
                <td style="text-align:center; ">{{ $exterior_ins4 }}</td>
                <td>All butt-joints are less than 1/8 inch, both siding and trim</td>
            </tr>
            <tr>
                <td style="text-align:center; ">{{ $exterior_ins5 }}</td>
                <td>Use trim nails on 1x4 Hardie trim (siding)</td>
            </tr>
            <tr>
                <td style="text-align:center; ">{{ $exterior_ins6 }}</td>
                <td>All roof jacks installed</td>

            </tr>

            <tr>

                <td style="text-align:center; ">{{ $exterior_ins7 }}</td>
                <td>Every door and window location and size are confirmed</td>
            </tr>
            <tr>
                <td style="text-align:center; ">{{ $exterior_ins8 }}</td>
                <td>Window and door openings are plumb</td>
            </tr>
            <tr>
                <td style="text-align:center; ">{{ $exterior_ins9 }}</td>
                <td>Sheathing on the house is cut tight, straight, without gaps or holes, and nailed per plan
                    specifications</td>
            </tr>
            <tr>
                <td style="text-align:center; ">{{ $exterior_ins10 }}</td>
                <td>Two exterior hose bibs (front/back).</td>
            </tr>
            <tr>
                <td style="text-align:center; ">{{ $exterior_ins11 }}</td>
                <td>Verify minimum ½ inch expansion gap: between siding and porch floor, and between ramp and siding
                </td>
            </tr>
            <tr>
                <td style="text-align:center; ">{{ $exterior_ins12 }}</td>
                <td>Exterior Inspection Observation Remarks:</td>
            </tr>

        </table>

        <table style="width:100%">
            <tr>
                <th colspan="2" style="text-align:center; ">Roof/Attic</th>

            </tr>
            <tr>
                <td style="text-align:center;  width: 15%;">{{ $roof_ins1 }}</td>
                <td>HVAC ductwork in place properly installed, no gaps or openings</td>
            </tr>
            <tr>
                <td style="text-align:center;">{{ $roof_ins2 }}</td>
                <td>AC intakes/returns are on the main floor</td>
            </tr>
            <tr>
                <td style="text-align:center; ">{{ $roof_ins3 }}</td>
                <td>All windstorm/fortified appurtenances are in place</td>
            </tr>
            <tr>
                <td style="text-align:center; ">{{ $roof_ins4 }}</td>
                <td>Roof sheathing is flat, no valleys or high places</td>
            </tr>
            <tr>
                <td style="text-align:center; ">{{ $roof_ins5 }}</td>
                <td>Roof decking is installed with small gap 1/16–1/8 inch on all end joints</td>
            </tr>
            <tr>
                <td style="text-align:center; ">{{ $roof_ins6 }}</td>
                <td>Roof sheathing is flat, no valleys or high places. Radiant barrier installed</td>

            </tr>

            <tr>

                <td style="text-align:center; ">{{ $roof_ins7 }}</td>
                <td>Double check elevation on all 4 sides (with floor plans)</td>
            </tr>
            <tr>
                <td style="text-align:center; ">{{ $roof_ins8 }}</td>
                <td>All roof jacks installed</td>
            </tr>
            <tr>
                <td style="text-align:center; ">{{ $roof_ins9 }}</td>
                <td>Roof/Attic Inspector Observation Remarks</td>
            </tr>
            <tr>
                <td style="text-align:center; ">{{ $roof_ins10 }}</td>
                <td>Inspector Observation Remarks 4</td>
            </tr>

        </table>
        <table style="width:100%">
            <tr>
                <th colspan="2" style="text-align:center; ">Signatures</th>
            </tr>
            <tr>

                <td colspan="2">
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


        </table>
        <p style="font-family:Times New Roman; font-size: 70%;  font-weight:bold  margin-left: 72px;">**Based upon
            IRC 2012, ADA 2010, HUD Housing Quality Standards and CDR Design Standards</p>
        <div style="page-break-before:always;"> </div>
        <img src="{{ url('public/storage/uploads/' . $photo_1) }}" class="photos" alt=" "><br>
        <img src="{{ url('public/storage/uploads/' . $photo_2) }}" class="photos" alt=" "><br>
        <div style="page-break-before:always;"> </div>
        <img src="{{ url('public/storage/uploads/' . $photo_3) }}" class="photos" alt=" "><br>
        <img src="{{ url('public/storage/uploads/' . $photo_4) }}" class="photos" alt=" "><br>
        <div style="page-break-before:always;"> </div>
        <img src="{{ url('public/storage/uploads/' . $photo_5) }}" class="photos" alt=" "><br>
        <img src="{{ url('public/storage/uploads/' . $photo_6) }}" class="photos" alt=" "><br>
        <div style="page-break-before:always;"> </div>
        <img src="{{ url('public/storage/uploads/' . $photo_7) }}" class="photos" alt=" "><br>
        <img src="{{ url('public/storage/uploads/' . $photo_8) }}" class="photos" alt=" "><br>
        <div style="page-break-before:always;"> </div>
        <img src="{{ url('public/storage/uploads/' . $photo_9) }}" class="photos" alt=" "><br>
        <img src="{{ url('public/storage/uploads/' . $photo_10) }}" class="photos" alt=" "><br>
        <div style="page-break-before:always;"> </div>
        <img src="{{ url('public/storage/uploads/' . $photo_11) }}" class="photos" alt=" "><br>
        <img src="{{ url('public/storage/uploads/' . $photo_12) }}" class="photos" alt=" "><br>
        <div style="page-break-before:always;"> </div>
        <img src="{{ url('public/storage/uploads/' . $photo_13) }}" class="photos" alt=" "><br>
        <img src="{{ url('public/storage/uploads/' . $photo_14) }}" class="photos" alt=" "><br>
        <div style="page-break-before:always;"> </div>
        <img src="{{ url('public/storage/uploads/' . $photo_15) }}" class="photos" alt=" "><br>
        <img src="{{ url('public/storage/uploads/' . $photo_16) }}" class="photos" alt=" "><br>
        <div style="page-break-before:always;"> </div>
        <img src="{{ url('public/storage/uploads/' . $photo_17) }}" class="photos" alt=" "><br>
        <img src="{{ url('public/storage/uploads/' . $photo_18) }}" class="photos" alt=" "><br>
        <div style="page-break-before:always;"> </div>
        <img src="{{ url('public/storage/uploads/' . $photo_19) }}" class="photos" alt=" "><br>
        <img src="{{ url('public/storage/uploads/' . $photo_20) }}" class="photos" alt=" "><br>
        <div style="page-break-before:always;"> </div>
        <img src="{{ url('public/storage/uploads/' . $photo_21) }}" class="photos" alt=" "><br>
        <img src="{{ url('public/storage/uploads/' . $photo_22) }}" class="photos" alt=" "><br>
        <div style="page-break-before:always;"> </div>
        <img src="{{ url('public/storage/uploads/' . $photo_23) }}" class="photos" alt=" "><br>
        <img src="{{ url('public/storage/uploads/' . $photo_24) }}" class="photos" alt=" "><br>
        <div style="page-break-before:always;"> </div>
        <img src="{{ url('public/storage/uploads/' . $photo_25) }}" class="photos" alt=" "><br>
        <img src="{{ url('public/storage/uploads/' . $photo_26) }}" class="photos" alt=" "><br>
        <div style="page-break-before:always;"> </div>
        <img src="{{ url('public/storage/uploads/' . $photo_27) }}" class="photos" alt=" "><br>
        <img src="{{ url('public/storage/uploads/' . $photo_28) }}" class="photos" alt=" "><br>
        <div style="page-break-before:always;"> </div>
        <img src="{{ url('public/storage/uploads/' . $photo_29) }}" class="photos" alt=" "><br>
        <img src="{{ url('public/storage/uploads/' . $photo_30) }}" class="photos" alt=" "><br>
        <div style="page-break-before:always;"> </div>
        <h3 style="text-align: center;  font-family: Times New Roman; ">Deficiencies</h3>
        <img src="{{ url('public/storage/uploads/' . $deficiency_photo_1) }}" class="photos" alt=" "><br>
        <img src="{{ url('public/storage/uploads/' . $deficiency_photo_2) }}" class="photos" alt=" "><br>
        <div style="page-break-before:always;"> </div>
        <img src="{{ url('public/storage/uploads/' . $deficiency_photo_3) }}" class="photos" alt=" "><br>
        <img src="{{ url('public/storage/uploads/' . $deficiency_photo_4) }}" class="photos" alt=" "><br>
        <div style="page-break-before:always;"> </div>
        <img src="{{ url('public/storage/uploads/' . $deficiency_photo_5) }}" class="photos" alt=" "><br>
        <img src="{{ url('public/storage/uploads/' . $deficiency_photo_6) }}" class="photos" alt=" "><br>
        <div style="page-break-before:always;"> </div>
        <img src="{{ url('public/storage/uploads/' . $deficiency_photo_7) }}" class="photos" alt=" "><br>
        <img src="{{ url('public/storage/uploads/' . $deficiency_photo_8) }}" class="photos" alt=" "><br>
        <div style="page-break-before:always;"> </div>
        <img src="{{ url('public/storage/uploads/' . $deficiency_photo_9) }}" class="photos" alt=" "><br>
        <img src="{{ url('public/storage/uploads/' . $deficiency_photo_10) }}" class="photos" alt=" "><br>
        <div style="page-break-before:always;"> </div>
        <img src="{{ url('public/storage/uploads/' . $deficiency_photo_11) }}" class="photos" alt=" "><br>
        <img src="{{ url('public/storage/uploads/' . $deficiency_photo_12) }}" class="photos" alt=" "><br>
        <div style="page-break-before:always;"> </div>
        <img src="{{ url('public/storage/uploads/' . $deficiency_photo_13) }}" class="photos" alt=" "><br>



    </main>
</body>

</html>
