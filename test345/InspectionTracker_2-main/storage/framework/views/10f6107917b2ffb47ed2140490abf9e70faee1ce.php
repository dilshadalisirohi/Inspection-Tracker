<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>">

    <style>
        /**
        Set the margins of the page to 0, so the footer and the header
        can be of the full height and width !
        **/
        @page  {
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

                <img src="<?php echo e(asset('assets/images/pdflogo.jpg')); ?>" alt=""
                    style="width:100px; margin-left: 75px; margin-top: 6px; ">
            </div>
            <div class="columnh">

                <div class="header_text">
                    <p style="font-family:Times New Roman; font-size:90.25%;  font-weight: bold;  margin-right: 110px; margin-top:6;
                                    ">Texas General Land Office<br>
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
                <p style="font-family:Times New Roman; font-size: 70.25%;  font-weight: bold;  margin-left: 82px; margin-top: 65px;
              ">Form 11.03 - Final Inspection Checklist</p>
            </div>
            <div class="column">
                <p style="font-family:Times New Roman; font-size: 70.25%;  font-weight: bold;  margin-left: 75px; margin-top: 65px;
                      "> <?php echo e(Form::label('title', date('F Y'))); ?></p>
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
                    <?php echo e($report_glo); ?></td>
                <td><b>Contract No. and/or WO:</b><br> <?php echo e($report_contact); ?></td>
            </tr>
            <tr>
                <td><b>Applicant Name:</b> <?php echo e($applicant_name); ?></td>
                <td><b>Co-Applicant Name:</b>
                </td>
            </tr>
            <tr>
                <td colspan="2">Physical Address: <?php echo e($applicant_address); ?></td>
            </tr>
            <tr>
                <td><b>Building Contractor Name: <?php echo e($contractor_name); ?><b></td>
                <td><b>Floor Plan: <?php echo e($floorplan); ?></b>
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
            <tr>
                <td style="text-align:center;  width: 15%; "><?php echo e($result_1); ?></td>
                <td>(REHAB) All in-scope work (on form 11.17) is performed satisfactorily</td>
            </tr>
            <tr>
                <td style="text-align:center; "><?php echo e($result_2); ?></td>
                <td>House numbers installed</td>
            </tr>
            <tr>
                <td style="text-align:center; "><?php echo e($result_3); ?></td>
                <td>Driveway pad is size 14’ x 20.’ Connection to street 9’ wide, where applicable</td>
            </tr>
            <tr>
                <td style="text-align:center; "><?php echo e($result_4); ?></td>
                <td>Peepholes on all exterior doors</td>
            </tr>
            <tr>
                <td style="text-align:center; "><?php echo e($result_5); ?></td>
                <td>Accessible route present from street to one entrance door</td>
            </tr>
            <tr>
                <td style="text-align:center; "><?php echo e($result_6); ?></td>
                <td>At least one (1) entrance door, with standard 36” door</td>
            </tr>
            <tr>
                <td style="text-align:center; "><?php echo e($result_7); ?></td>
                <td>No-step entrance serviced by ramp (if applicable) slope is 1:12 w/ two (2) grip rails</td>
            </tr>
            <tr>
                <td style="text-align:center; "><?php echo e($result_8); ?></td>
                <td>Top surface of gripping handrails at consistent height, 34-38 inches vertically above walking
                    surfaces, stair noses, and ramp surfaces. (ADA 2010, 504.4)s</td>
            </tr>
            <tr>
                <td style="text-align:center; "><?php echo e($result_9); ?></td>
                <td>Maximum 4-inch opening on all balusters/rail supports (if applicable)</td>
            </tr>
            <tr>
                <td style="text-align:center; "><?php echo e($result_10); ?></td>
                <td>Building permit, Certificate of Occupancy, Elevation Certificate and Inspection green tags on site
                    and visible</td>
            </tr>
            <tr>
                <td style="text-align:center; "><?php echo e($result_11); ?></td>
                <td>Termite treatment complete with certificate on hand</td>
            </tr>
            <tr>
                <td style="text-align:center; "><?php echo e($result_12); ?></td>
                <td>Green Standards Certification certificate complete and on hand</td>
            </tr>
            <tr>
                <td style="text-align:center; "><?php echo e($result_13); ?></td>
                <td>Accessible route throughout home</td>
            </tr>
            <tr>
                <td style="text-align:center; "><?php echo e($result_14); ?></td>
                <td>Hallways at least 36” wide, level & ramped/beveled changes at each door</td>
            </tr>
            <tr>
                <td style="text-align:center; "><?php echo e($result_15); ?></td>
                <td>Exterior door locks properly adjusted, deadbolt fully extends into jamb</td>
            </tr>
            <tr>
                <td style="text-align:center; "><?php echo e($result_16); ?></td>
                <td>36-inch height on stair handrails (measured at front of stair nose)</td>
            </tr>
            <tr>
                <td style="text-align:center; "><?php echo e($result_17); ?></td>
                <td>Maximum 4-inch opening on all balusters/rail supports (if applicable)</td>
            </tr>
            <tr>
                <td style="text-align:center; "><?php echo e($result_18); ?></td>
                <td>All weatherproofing installed at exterior doors</td>
            </tr>
            <tr>
                <td style="text-align:center; "><?php echo e($result_19); ?></td>
                <td>Roof complete including drip edge, all vent boots/caps, shingles straight & level</td>
            </tr>
            <tr>
                <td style="text-align:center; "><?php echo e($result_20); ?></td>
                <td>Inside of home is free from debris, swept and clean</td>
            </tr>
            <tr>
                <td style="text-align:center; "><?php echo e($result_21); ?></td>
                <td>Foundation cables properly stressed and secured (if applicable)</td>
            </tr>

            <tr>
                <td style="text-align:center; "><?php echo e($result_22); ?></td>
                <td>Exterior free of trash and construction materials</td>
            </tr>
            <tr>
                <td style="text-align:center; "><?php echo e($result_23); ?></td>
                <td>Porch/decks and ramps cleaned/pressure washed</td>
            </tr>
            <tr>
                <td style="text-align:center; "><?php echo e($result_24); ?></td>
                <td>Inspector Observation Remarks1</td>
            </tr>

        </table>



        <table style="width:100%">
            <tr>
                <th colspan="2" style="text-align:center; ">Exterior Inspection</th>

            </tr>
            <tr>
                <td style="text-align:center;  width: 15%; "><?php echo e($ex_ins_1); ?></td>
                <td>All piping/drain lines secured to home and exposed pipes insulated</td>
            </tr>
            <tr>
                <td style="text-align:center; "><?php echo e($ex_ins_2); ?></td>
                <td>Appropriate water main cut-off exists</td>
            </tr>
            <tr>
                <td style="text-align:center; "><?php echo e($ex_ins_3); ?></td>
                <td>Check electrostatic grounding of gas lines</td>
            </tr>
            <tr>
                <td style="text-align:center; "><?php echo e($ex_ins_4); ?></td>
                <td>Hardie plank installed under house, painted (elevated homes where applicable).</td>
            </tr>
            <tr>
                <td style="text-align:center; "><?php echo e($ex_ins_5); ?></td>
                <td>Two (2) hose bibs with vacuum breakers (anti-syphon devices) near front and back.</td>
            </tr>
            <tr>
                <td style="text-align:center; "><?php echo e($ex_ins_6); ?></td>
                <td>All flatwork (driveway, walks, etc.) level, not cracked/damaged/irregular, pitting, spalling,
                    expansion joints present</td>
            </tr>
            <tr>
                <td style="text-align:center; "><?php echo e($ex_ins_7); ?></td>
                <td>All siding is free of deficiencies. Note any cracked, dented, bowed, or chipped</td>
            </tr>
            <tr>
                <td style="text-align:center; "><?php echo e($ex_ins_8); ?></td>
                <td>All exposed surfaces painted, and exterior paint complete without visible defects (from 6 feet away)
                </td>
            </tr>
            <tr>
                <td style="text-align:center; "><?php echo e($ex_ins_9); ?></td>
                <td>Silicone caulk present at exterior door sills and windows. All exterior penetrations are
                    weatherproofed</td>
            </tr>
            <tr>
                <td style="text-align:center; "><?php echo e($ex_ins_10); ?></td>
                <td>All screens installed, not damaged/torn</td>
            </tr>
            <tr>
                <td style="text-align:center; "><?php echo e($ex_ins_11); ?></td>
                <td>All roof jacks painted to match</td>
            </tr>
            <tr>
                <td style="text-align:center; "><?php echo e($ex_ins_12); ?></td>
                <td>Gutters, splash blocks, water diverters, etc., are in place</td>
            </tr>
            <tr>
                <td style="text-align:center; "><?php echo e($ex_ins_13); ?></td>
                <td>Finish grade at foundation provides positive drainage away from the structure, starting at a min of
                    6” below finish floor at slab on grade or a min of 6” below pier footings for elevated floor</td>
            </tr>
            <tr>
                <td style="text-align:center; "><?php echo e($ex_ins_14); ?></td>
                <td>Trees trimmed at least 3 feet from the structure/roof, and Sod is in required area</td>
            </tr>
            <tr>
                <td style="text-align:center; "><?php echo e($ex_ins_15); ?></td>
                <td>Existing gutters, splash blocks, water diverters, not damaged or detached</td>
            </tr>
            <tr>
                <td style="text-align:center; "><?php echo e($ex_ins_16); ?></td>
                <td>Inspector Observation Remarks2</td>
            </tr>
            <tr>
                <td style="text-align:center; "><?php echo e($ex_ins_17); ?></td>
                <td>Appropriate water main cut-off exists</td>
            </tr>

        </table>

        <table style="width:100%">
            <tr>
                <th colspan="2" style="text-align:center; ">Interior Inspection</th>

            </tr>
            <tr>
                <td style='text-align:center; '><?php echo e($in_ins_1); ?></td>
                <td>ReHab-Switches, receptacles, circuit breakers & thermostat are functional</td>
            </tr>
            <tr>
                <td style='text-align:center; '><?php echo e($in_ins_2); ?></td>
                <td>ReHab-All switch and receptacle plates level, flush, and without defects</td>
            </tr>
            <tr>
                <td style='text-align:center; '><?php echo e($in_ins_3); ?></td>
                <td>ReHab-Walls and drywall are visually free of blemishes</td>
            </tr>
            <tr>
                <td style='text-align:center; '><?php echo e($in_ins_4); ?></td>
                <td>ReHab-Verify all base trim is properly installed</td>
            </tr>
            <tr>
                <td style='text-align:center; '><?php echo e($in_ins_5); ?></td>
                <td>Inside of home is free from debris and swept(frml)</td>
            </tr>
            <tr>
                <td style='text-align:center; '><?php echo e($in_ins_6); ?></td>
                <td>Operable switches, circuit breakers & thermostat no higher than 48” above floor</td>
            </tr>
            <tr>
                <td style='text-align:center; '><?php echo e($in_ins_7); ?></td>
                <td>All switches and receptacles properly installed and operable; switch plates level, flush, and
                    without defects. Each receptacle/plug is at least 15” above the floor</td>
            </tr>
            <tr>
                <td style='text-align:center; '><?php echo e($in_ins_8); ?></td>
                <td>Wall and ceiling sheetrock is free of deficiencies; ridges, bubbling, cracking at tape joints,
                    corners and lines are straight</td>
            </tr>
            <tr>
                <td style='text-align:center; '><?php echo e($in_ins_9); ?></td>
                <td>Verify all base is matching profile. Base appears to be straight; a bow in the base is a visual cue
                    drywall is bowed</td>
            </tr>
            <tr>
                <td style='text-align:center; '><?php echo e($in_ins_10); ?></td>
                <td>Smoke/CO2 detectors installed in proper locations and operational</td>
            </tr>
            <tr>
                <td style='text-align:center; '><?php echo e($in_ins_11); ?></td>
                <td>Ensure paint coverage is acceptable, free from flaws visible from 6 feet away</td>
            </tr>
            <tr>
                <td style='text-align:center; '><?php echo e($in_ins_12); ?></td>
                <td>ReHab-Carpet is properly installed, not missing sections</td>
            </tr>
            <tr>
                <td style='text-align:center; '><?php echo e($in_ins_13); ?></td>
                <td>Ensure interior doors are at least standard 32” door, unless the door provides access only to closet
                    of less than 15 square feet in area</td>
            </tr>
            <tr>
                <td style='text-align:center; '><?php echo e($in_ins_14); ?></td>
                <td>Check vinyl flooring for deficiencies such as peeling/lifting, visible gaps/seams,
                    ridges/depressions, or overall poor workmanship</td>
            </tr>
            <tr>
                <td style='text-align:center; '><?php echo e($in_ins_15); ?></td>
                <td>Ceramic/porcelain tile – all joints perpendicular & parallel to walls. Installed around outlets,
                    fixtures, pipes/fittings so that plates, escutcheons, and collar overlap cuts</td>
            </tr>
            <tr>
                <td style='text-align:center; '><?php echo e($in_ins_16); ?></td>
                <td>Check for Hot-Cold control reversal in all showers, tubs, and sinks</td>
            </tr>
            <tr>
                <td style='text-align:center; '><?php echo e($in_ins_17); ?></td>
                <td>Check for leaks in supply and drain lines under sinks</td>
            </tr>
            <tr>
                <td style='text-align:center; '><?php echo e($in_ins_18); ?></td>
                <td>Toilets flush properly and are firmly seated in place (no movement)</td>
            </tr>
            <tr>
                <td style='text-align:center; '><?php echo e($in_ins_19); ?></td>
                <td>AC & Heat - check for cold and hot air movement; system in good working order; check thermostat
                    functions</td>
            </tr>
            <tr>
                <td style='text-align:center; '><?php echo e($in_ins_20); ?></td>
                <td>AC filter in place; filter panel easily removable</td>
            </tr>
            <tr>
                <td style='text-align:center; '><?php echo e($in_ins_21); ?></td>
                <td>AC registers properly installed (no gaps, all screws) and level</td>
            </tr>
            <tr>
                <td style='text-align:center; '><?php echo e($in_ins_22); ?></td>
                <td>Septic system installed and operational (if applicable)</td>
            </tr>
            <tr>
                <td style='text-align:center; '><?php echo e($in_ins_23); ?></td>
                <td>Well water system installed and operational (if applicable)</td>
            </tr>
            <tr>
                <td style='text-align:center; '><?php echo e($in_ins_24); ?></td>
                <td>Water heater installed, operational. (If located on main floor in construction plans, must be in
                    designated and properly ventilated closet.)</td>
            </tr>
            <tr>
                <td style='text-align:center; '><?php echo e($in_ins_25); ?></td>
                <td>Appliances installed, operational</td>
            </tr>
            <tr>
                <td style='text-align:center; '><?php echo e($in_ins_26); ?></td>
                <td>Anti-tip device installed for the stove/oven range</td>
            </tr>
            <tr>
                <td style='text-align:center; '><?php echo e($in_ins_27); ?></td>
                <td>ReHab-Attic insulation is installed properly</td>
            </tr>
            <tr>
                <td style='text-align:center; '><?php echo e($in_ins_28); ?></td>
                <td>ReHab-Attic access door insulated and closes properly</td>
            </tr>
            <tr>
                <td style='text-align:center; '><?php echo e($in_ins_29); ?></td>
                <td>ReHab-All window screens installed, NOT excessively torn or missing</td>
            </tr>
            <tr>
                <td style='text-align:center; '><?php echo e($in_ins_30); ?></td>
                <td>ReHab-Insulation stop at attic access</td>
            </tr>
            <tr>
                <td style='text-align:center; '><?php echo e($in_ins_31); ?></td>
                <td>Washing machine outlet box, ice maker outlet box, dryer vent box (or trim) present</td>
            </tr>
            <tr>
                <td style='text-align:center; '><?php echo e($in_ins_32); ?></td>
                <td>Region</td>
            </tr>
            <tr>
                <td style='text-align:center; '><?php echo e($in_ins_33); ?></td>
                <td>Attic - Verify insulation installed, stop, and access door insulation are present</td>
            </tr>
            <tr>
                <td style='text-align:center; '><?php echo e($in_ins_34); ?></td>
                <td>Windows & doors operate smoothly (hinge screws installed, locks & hardware)</td>
            </tr>
            <tr>
                <td style='text-align:center; '><?php echo e($in_ins_35); ?></td>
                <td>Ensure cabinets are straight and line up with the walls properly</td>
            </tr>

        </table>
        <table style="width:100%">
            <tr>
                <th colspan="2" style="text-align:center; ">Electrical Inspection</th>

            </tr>
            <tr>
                <td style='text-align:center; '><?php echo e($el_ins_1); ?></td>
                <td>Air Conditioner breaker properly sized</td>
            </tr>
            <tr>
                <td style='text-align:center; '><?php echo e($el_ins_2); ?></td>
                <td>All exhaust fans and ceiling fans are operational, no excessive noise or vibration</td>
            </tr>
            <tr>
                <td style='text-align:center; '><?php echo e($el_ins_3); ?></td>
                <td>ReHab-AC Condenser location ok, and operable</td>
            </tr>
            <tr>
                <td style='text-align:center; '><?php echo e($el_ins_4); ?></td>
                <td>AC Condenser location on concrete pad or deck. Water diverter over AC unit</td>
            </tr>
            <tr>
                <td style='text-align:center; '><?php echo e($el_ins_5); ?></td>
                <td>ReHab-Aluminum wiring is NOT visually apparent. (If aluminum wiring, check "NO"</td>
            </tr>
            <tr>
                <td style='text-align:center; '><?php echo e($el_ins_6); ?></td>
                <td>Breaker box located on 1st floor, operational parts no higher than 48” from floor</td>
            </tr>
            <tr>
                <td style='text-align:center; '><?php echo e($el_ins_7); ?></td>
                <td>Check that all required GFCI circuits are present and operating properly</td>
            </tr>
            <tr>
                <td style='text-align:center; '><?php echo e($el_ins_8); ?></td>
                <td>Check that all required AFCI circuits are present and operating properly</td>
            </tr>
            <tr>
                <td style='text-align:center; '><?php echo e($el_ins_9); ?></td>
                <td>All circuit breakers clearly labeled</td>
            </tr>
            <tr>
                <td style='text-align:center; '><?php echo e($el_ins_10); ?></td>
                <td>Check ground and polarity of all receptacles</td>
            </tr>
            <tr>
                <td style='text-align:center; '><?php echo e($el_ins_11); ?></td>
                <td>Electrical Observation Remarks</td>
            </tr>



        </table>

        <table style="width:100%">
            <tr>
                <th colspan="2" style="text-align:center; ">Accessibility Inspection (when applicable)</th>

            </tr>
            <tr>
                <td style='text-align:center; '><?php echo e($ac_ins_1); ?></td>
                <td>If lift present, ensure it is operable, and lift gates fasten securely</td>
            </tr>
            <tr>
                <td style='text-align:center; '><?php echo e($ac_ins_2); ?></td>
                <td>Walk-in showers</td>
            </tr>
            <tr>
                <td style='text-align:center; '><?php echo e($ac_ins_3); ?></td>
                <td>Grab bars installed properly</td>
            </tr>
            <tr>
                <td style='text-align:center; '><?php echo e($ac_ins_4); ?></td>
                <td>Toilets exactly at 18 inches (on center) from finished side wall</td>
            </tr>
            <tr>
                <td style='text-align:center; '><?php echo e($ac_ins_5); ?></td>
                <td>Toilet seat height is 17–19 inches from floor</td>
            </tr>
            <tr>
                <td style='text-align:center; '><?php echo e($ac_ins_6); ?></td>
                <td>Inspector Observation Remarks3</td>
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
                <td><b>Inspector Printed Name:&nbsp;</b><?php echo e($inspector_name); ?></td>
                <td rowspan="2"><b>Date:</b><?php echo e($in_signdate); ?></td>

            </tr>
            <tr>
                <td><b>Inspector Signature: </b><img src="<?php echo e(url('public/storage/uploads/' . $in_sign)); ?>"
                        class="sign" alt=" "></td>
            </tr>
            <tr>
                <td><b>Superintendent Printed Name:&nbsp;</b><?php echo e($superintendent); ?></td>
                <td rowspan="2"><b>Date:</b><?php echo e($sup_signdate); ?></td>

            </tr>
            <tr>
                <td><b>Superintendent Signature: </b><img src="<?php echo e(url('public/storage/uploads/' . $sup_sign)); ?>"
                        class="sign" alt=" "></td>
            </tr>


            <tr>
                <td><b>Applicant Printed Name:&nbsp;</b><?php echo e($applicant_name); ?></td>
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

        <img src="<?php echo e(url('public/storage/uploads/' . $photo_1)); ?>" class="photos" alt=" "><br>
        <img src="<?php echo e(url('public/storage/uploads/' . $photo_2)); ?>" class="photos" alt=" "><br>
        <div style="page-break-before:always;"> </div>
        <img src="<?php echo e(url('public/storage/uploads/' . $photo_3)); ?>" class="photos" alt=" "><br>
        <img src="<?php echo e(url('public/storage/uploads/' . $photo_4)); ?>" class="photos" alt=" "><br>
        <div style="page-break-before:always;"> </div>
        <img src="<?php echo e(url('public/storage/uploads/' . $photo_5)); ?>" class="photos" alt=" "><br>
        <img src="<?php echo e(url('public/storage/uploads/' . $photo_6)); ?>" class="photos" alt=" "><br>
        <div style="page-break-before:always;"> </div>
        <img src="<?php echo e(url('public/storage/uploads/' . $photo_7)); ?>" class="photos" alt=" "><br>
        <img src="<?php echo e(url('public/storage/uploads/' . $photo_8)); ?>" class="photos" alt=" "><br>
        <div style="page-break-before:always;"> </div>
        <img src="<?php echo e(url('public/storage/uploads/' . $photo_9)); ?>" class="photos" alt=" "><br>
        <img src="<?php echo e(url('public/storage/uploads/' . $photo_10)); ?>" class="photos" alt=" "><br>
        <div style="page-break-before:always;"> </div>
        <img src="<?php echo e(url('public/storage/uploads/' . $photo_11)); ?>" class="photos" alt=" "><br>
        <img src="<?php echo e(url('public/storage/uploads/' . $photo_12)); ?>" class="photos" alt=" "><br>
        <div style="page-break-before:always;"> </div>
        <img src="<?php echo e(url('public/storage/uploads/' . $photo_13)); ?>" class="photos" alt=" "><br>
        <img src="<?php echo e(url('public/storage/uploads/' . $photo_14)); ?>" class="photos" alt=" "><br>
        <div style="page-break-before:always;"> </div>
        <img src="<?php echo e(url('public/storage/uploads/' . $photo_15)); ?>" class="photos" alt=" "><br>
        <img src="<?php echo e(url('public/storage/uploads/' . $photo_16)); ?>" class="photos" alt=" "><br>
        <div style="page-break-before:always;"> </div>
        <img src="<?php echo e(url('public/storage/uploads/' . $photo_17)); ?>" class="photos" alt=" "><br>
        <img src="<?php echo e(url('public/storage/uploads/' . $photo_18)); ?>" class="photos" alt=" "><br>
        <div style="page-break-before:always;"> </div>
        <img src="<?php echo e(url('public/storage/uploads/' . $photo_19)); ?>" class="photos" alt=" "><br>
        <img src="<?php echo e(url('public/storage/uploads/' . $photo_20)); ?>" class="photos" alt=" "><br>
        <div style="page-break-before:always;"> </div>
        <img src="<?php echo e(url('public/storage/uploads/' . $photo_21)); ?>" class="photos" alt=" "><br>
        <img src="<?php echo e(url('public/storage/uploads/' . $photo_22)); ?>" class="photos" alt=" "><br>
        <div style="page-break-before:always;"> </div>
        <img src="<?php echo e(url('public/storage/uploads/' . $photo_23)); ?>" class="photos" alt=" "><br>
        <img src="<?php echo e(url('public/storage/uploads/' . $photo_24)); ?>" class="photos" alt=" "><br>
        <div style="page-break-before:always;"> </div>
        <img src="<?php echo e(url('public/storage/uploads/' . $photo_25)); ?>" class="photos" alt=" "><br>
        <img src="<?php echo e(url('public/storage/uploads/' . $photo_26)); ?>" class="photos" alt=" "><br>
        <div style="page-break-before:always;"> </div>
        <img src="<?php echo e(url('public/storage/uploads/' . $photo_27)); ?>" class="photos" alt=" "><br>
        <img src="<?php echo e(url('public/storage/uploads/' . $photo_28)); ?>" class="photos" alt=" "><br>
        <div style="page-break-before:always;"> </div>
        <img src="<?php echo e(url('public/storage/uploads/' . $photo_29)); ?>" class="photos" alt=" "><br>
        <img src="<?php echo e(url('public/storage/uploads/' . $photo_30)); ?>" class="photos" alt=" "><br>
        <div style="page-break-before:always;"> </div>
        <h3 style="text-align: center;  font-family: Times New Roman; ">Deficiencies</h3>
        <img src="<?php echo e(url('public/storage/uploads/' . $deficiency_photo_1)); ?>" class="photos" alt=" "><br>
        <img src="<?php echo e(url('public/storage/uploads/' . $deficiency_photo_2)); ?>" class="photos" alt=" "><br>
        <div style="page-break-before:always;"> </div>
        <img src="<?php echo e(url('public/storage/uploads/' . $deficiency_photo_3)); ?>" class="photos" alt=" "><br>
        <img src="<?php echo e(url('public/storage/uploads/' . $deficiency_photo_4)); ?>" class="photos" alt=" "><br>
        <div style="page-break-before:always;"> </div>
        <img src="<?php echo e(url('public/storage/uploads/' . $deficiency_photo_5)); ?>" class="photos" alt=" "><br>
        <img src="<?php echo e(url('public/storage/uploads/' . $deficiency_photo_6)); ?>" class="photos" alt=" "><br>
        <div style="page-break-before:always;"> </div>
        <img src="<?php echo e(url('public/storage/uploads/' . $deficiency_photo_7)); ?>" class="photos" alt=" "><br>
        <img src="<?php echo e(url('public/storage/uploads/' . $deficiency_photo_8)); ?>" class="photos" alt=" "><br>
        <div style="page-break-before:always;"> </div>
        <img src="<?php echo e(url('public/storage/uploads/' . $deficiency_photo_9)); ?>" class="photos" alt=" "><br>
        <img src="<?php echo e(url('public/storage/uploads/' . $deficiency_photo_10)); ?>" class="photos" alt=" "><br>
        <div style="page-break-before:always;"> </div>
        <img src="<?php echo e(url('public/storage/uploads/' . $deficiency_photo_11)); ?>" class="photos" alt=" "><br>
        <img src="<?php echo e(url('public/storage/uploads/' . $deficiency_photo_12)); ?>" class="photos" alt=" "><br>
        <div style="page-break-before:always;"> </div>
        <img src="<?php echo e(url('public/storage/uploads/' . $deficiency_photo_13)); ?>" class="photos" alt=" "><br>





    </main>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\fiverr\resources\views/status100pdf.blade.php ENDPATH**/ ?>