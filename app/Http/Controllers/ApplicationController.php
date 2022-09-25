<?php

namespace App\Http\Controllers;
use Exception;
//use Illuminate\Database\QueryException;
use App\Models\Comment;
use App\Models\StatusRehab;
use iio\libmergepdf\Merger;
use LynX39\LaraPdfMerger\Facades\PdfMerger;

use App\Jobs\CreateApplicationJob;
use App\Jobs\InspectorAssignJob;
use App\Jobs\StatusChangeJob;
use App\Jobs\UpdateApplicationJob;
use App\Models\Application;
use App\Models\Auditor;
use App\Models\Company;
use App\Models\Deficiency;
use App\Models\Document;
use App\Models\FloorPlan;
use App\Models\Photo;
use App\Models\Dpdf;
use App\Models\Role;
use App\Models\Setting;
use App\Models\Status100;
use App\Models\Status50;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

use Image;
use File;

class ApplicationController extends Controller
{
    public function generatepdfr($id)
    {
        $application = Application::find($id);
        $flr_id = $application->floor_plan;
        $floorplan = FloorPlan::find($flr_id);

        $company_id = $application->company_id;
        $buider_name  = Company::find($company_id);



        foreach (Setting::where('id', 1)->get() as $report)
        {
            $report_glo = $report->report_glo;
            $report_contact = $report->report_contact;
        }



        $gis = StatusRehab::where('application_id', $id)
            ->get('general_inspection');
        $result = explode("_", $gis);
        for($i=1;$i<=9;$i++){
            $result[$i]=str_replace('\\', '' , $result[$i]);
        }


        $ex_ins = StatusRehab::where('application_id', $id)
            ->get('exterior_inspection');
        $exterior_ins = explode("_",$ex_ins);
        for($i=1;$i<=10;$i++){
            $exterior_ins[$i]=str_replace('\\', '' ,   $exterior_ins[$i]);

        }

        $i_ins = StatusRehab::where('application_id', $id)
            ->get('interior_inspection');
        $interior_ins = explode("_", $i_ins);
        for($i=1;$i<=24;$i++){
            $interior_ins[$i]=str_replace('\\', '' ,  $interior_ins[$i]);

        }

        $el_is = StatusRehab::where('application_id', $id)
            ->get('electrical_inspection');
        $el_ins = explode("_", $el_is);
        for($i=1;$i<=8;$i++){
            $el_ins[$i]=str_replace('\\', '' ,    $el_ins[$i]);
        }



        $ac_is = StatusRehab::where('application_id', $id)
            ->get('accessibility_inspection');
        $ac_ins = explode("_", $ac_is);
        for($i=1;$i<=5;$i++){
            $ac_ins[$i]=str_replace('\\', '' ,     $ac_ins[$i]);
        }


        foreach (StatusRehab::where('application_id', $id)
                     ->get() as $status50) {
            $in_name = $status50->inspector;
            $superintendent = $status50->superintendent;
            $in_sign = $status50->inspection_sign;
            $sup_sign =  $status50->superintendent_sign;
            $in_signdate = $status50->inspection_sign_off_date;
            $sup_signdate =  $status50->superintendent_sign_off_date;

        }
        foreach (Photo::where('application_id', $id)->where('type', 'Rehab')
                     ->get() as $photo50) {
            $photo_1=$photo50->photo_1;
            $photo_2=$photo50->photo_2;
            $photo_3=$photo50->photo_3;
            $photo_4=$photo50->photo_4;
            $photo_5=$photo50->photo_5;
            $photo_6=$photo50->photo_6;
            $photo_7=$photo50->photo_7;
            $photo_8=$photo50->photo_8;
            $photo_9=$photo50->photo_9;
            $photo_10=$photo50->photo_10;
            $photo_11=$photo50->photo_11;
            $photo_12=$photo50->photo_12;
            $photo_13=$photo50->photo_13;
            $photo_14=$photo50->photo_14;
            $photo_15=$photo50->photo_15;
            $photo_16=$photo50->photo_16;
            $photo_17=$photo50->photo_17;
            $photo_18=$photo50->photo_18;
            $photo_19=$photo50->photo_19;
            $photo_20=$photo50->photo_20;
            $photo_21=$photo50->photo_21;
            $photo_22=$photo50->photo_22;
            $photo_23=$photo50->photo_23;
            $photo_24=$photo50->photo_24;
            $photo_25=$photo50->photo_25;
            $photo_26=$photo50->photo_26;
            $photo_27=$photo50->photo_27;
            $photo_28=$photo50->photo_28;
            $photo_29=$photo50->photo_29;
            $photo_30=$photo50->photo_30;


        }
        //  dd($photo_20);
        foreach (Deficiency::where('application_id', $id)->where('type', 'Rehab')
                     ->get() as $deficiency) {
            $deficiency_photo_1 = $deficiency->deficiency_photo_1;
            $deficiency_photo_2 = $deficiency->deficiency_photo_2;
            $deficiency_photo_3 = $deficiency->deficiency_photo_3;
            $deficiency_photo_4 = $deficiency->deficiency_photo_4;
            $deficiency_photo_5 = $deficiency->deficiency_photo_5;
            $deficiency_photo_6 = $deficiency->deficiency_photo_6;
            $deficiency_photo_7 = $deficiency->deficiency_photo_7;
            $deficiency_photo_8 = $deficiency->deficiency_photo_8;
            $deficiency_photo_9 = $deficiency->deficiency_photo_9;
            $deficiency_photo_10= $deficiency->deficiency_photo_10;
            $deficiency_photo_11 =$deficiency->deficiency_photo_11;
            $deficiency_photo_12 =$deficiency->deficiency_photo_12;
            $deficiency_photo_13=$deficiency->deficiency_photo_13;

        }










        $data = [
            'applicant_name' => $application->applicant_name ,
            'applicant_address' => $application->applicant_address,
            'contractor_name' =>isset($buider_name->name) ? $buider_name->name : "",
            'floorplan' => $floorplan->name,
            'report_glo' => $report_glo,
            'report_contact' => $report_contact,
            //General inspection
            'result_1'=>str_replace('inspection":"', '' , $result[1]),
            'result_2'=>$result[2],
            'result_3'=>$result[3],
            'result_4'=>$result[4],
            'result_5'=>$result[5],
            'result_6'=>$result[6],
            'result_7'=>$result[7],
            'result_8'=>$result[8],
            'result_9'=>  str_replace('"}]', '' , $result[9]),
            //ExteriorIns code-----------------------------
            'exterior_ins1'=>str_replace('inspection":"', '' , $exterior_ins[1]),
            'exterior_ins2'=>$exterior_ins[2],
            'exterior_ins3'=>$exterior_ins[3],
            'exterior_ins4'=>$exterior_ins[4],
            'exterior_ins5'=>$exterior_ins[5],
            'exterior_ins6'=>$exterior_ins[6],
            'exterior_ins7'=>$exterior_ins[7],
            'exterior_ins8'=>$exterior_ins[8],
            'exterior_ins9'=>$exterior_ins[9],
            'exterior_ins10'=>str_replace('"}]', '' ,$exterior_ins[10]),
            //I code-----------------------------
            'interior_ins1'=>str_replace('inspection":"', '' , $interior_ins[1]),
            'interior_ins2'=>$interior_ins[2],
            'interior_ins3'=>$interior_ins[3],
            'interior_ins4'=>$interior_ins[4],
            'interior_ins5'=>$interior_ins[5],
            'interior_ins6'=>$interior_ins[6],
            'interior_ins7'=>$interior_ins[7],
            'interior_ins8'=>$interior_ins[8],
            'interior_ins9'=>$interior_ins[9],
            'interior_ins10'=>$interior_ins[10],
            'interior_ins11'=>$interior_ins[11],
            'interior_ins12'=>$interior_ins[12],
            'interior_ins13'=>$interior_ins[13],
            'interior_ins14'=>$interior_ins[14],
            'interior_ins15'=>$interior_ins[15],
            'interior_ins16'=>$interior_ins[16],
            'interior_ins17'=>$interior_ins[17],
            'interior_ins18'=>$interior_ins[18],
            'interior_ins19'=>$interior_ins[19],
            'interior_ins20'=>$interior_ins[20],
            'interior_ins21'=>$interior_ins[21],
            'interior_ins22'=>$interior_ins[22],
            'interior_ins23'=>$interior_ins[23],
            'interior_ins24'=> str_replace('"}]', '' ,$interior_ins[24]),

            //Electrical code------------------------------
            'el_ins_1'=>str_replace('inspection":"', '' ,$el_ins[1]),
            'el_ins_2'=>$el_ins[2],
            'el_ins_3'=>$el_ins[3],
            'el_ins_4'=>$el_ins[4],
            'el_ins_5'=>$el_ins[5],
            'el_ins_6'=>$el_ins[6],
            'el_ins_7'=>$el_ins[7],
            'el_ins_8'=>str_replace('"}]', '' ,$el_ins[8]),
            //Acc code-----------------------------
            'ac_ins_1'=>str_replace('inspection":"', '' ,$ac_ins[1]),
            'ac_ins_2'=>$ac_ins[2],
            'ac_ins_3'=>$ac_ins[3],
            'ac_ins_4'=>$ac_ins[4],
            'ac_ins_5'=>str_replace('"}]', '' ,$ac_ins[5]),
            //signature code------------------------------
            'inspector_name'=>  $in_name,
            'superintendent' =>$superintendent,
            'in_sign'       =>$in_sign,
            'sup_sign' =>$sup_sign,
            'in_signdate' => $in_signdate,
            'sup_signdate' => $sup_signdate,
            //photo code-----------------------------
            'photo_1'=>$photo_1,
            'photo_2'=>$photo_2,
            'photo_3'=>$photo_3,
            'photo_4'=>$photo_4,
            'photo_5'=>$photo_5,
            'photo_6'=>$photo_6,
            'photo_7'=>$photo_7,
            'photo_8'=>$photo_8,
            'photo_9'=>$photo_9,
            'photo_10'=>$photo_10,
            'photo_11'=>$photo_11,
            'photo_12'=>$photo_12,
            'photo_13'=>$photo_13,
            'photo_14'=>$photo_14,
            'photo_15'=>$photo_15,
            'photo_16'=>$photo_16,
            'photo_17'=>$photo_17,
            'photo_18'=>$photo_18,
            'photo_19'=>$photo_19,
            'photo_20'=>$photo_20,
            'photo_21'=>$photo_21,
            'photo_22'=>$photo_22,
            'photo_23'=>$photo_23,
            'photo_24'=>$photo_24,
            'photo_25'=>$photo_25,
            'photo_26'=>$photo_26,
            'photo_27'=>$photo_27,
            'photo_28'=>$photo_28,
            'photo_29'=>$photo_29,
            'photo_30'=>$photo_30,
            //Deficeincy code------------------------------
            'deficiency_photo_1'=>$deficiency_photo_1,
            'deficiency_photo_2'=>$deficiency_photo_2,
            'deficiency_photo_3'=>$deficiency_photo_3,
            'deficiency_photo_4'=>$deficiency_photo_4,
            'deficiency_photo_5'=>$deficiency_photo_5,
            'deficiency_photo_6'=>$deficiency_photo_6,
            'deficiency_photo_7'=>$deficiency_photo_7,
            'deficiency_photo_8'=>$deficiency_photo_8,
            'deficiency_photo_9'=>$deficiency_photo_9,
            'deficiency_photo_10'=>$deficiency_photo_10,
            'deficiency_photo_11'=>$deficiency_photo_11,
            'deficiency_photo_12'=>$deficiency_photo_12,
            'deficiency_photo_13'=>$deficiency_photo_13,



        ];







        $path = public_path('pdf_status_Rehab/');

        $fileName =  $application->applicant_name.'_11-03_Rehab_Final_Inspection'.time(). '.' . 'pdf' ;
        $fileNameDownload =  $application->applicant_name.'_11-03_Final_Inspection'. '.' . 'pdf' ;
        //added $fileNameDownload for new name  ---------------New changes 25-2-2022

        $result = DB::table('dpdfs')->insert([
            'application_id'     =>   $id,
            'file'   =>   $fileName,
            'application_type' => 'Rehab'
        ]);


        if($application->document_file_1==null){
            $application->document_file_1 = 'empty.pdf';
        }
        if($application->document_file_2==null){
            $application->document_file_2 = 'empty.pdf';
        }
        if($application->document_file_3==null){
            $application->document_file_3 = 'empty.pdf';
        }
        if($application->document_file_4==null){
            $application->document_file_4 = 'empty.pdf';
        }
        if($application->document_file_5==null){
            $application->document_file_5 = 'empty.pdf';
        }
        if($application->document_file_6==null){
            $application->document_file_6 = 'empty.pdf';
        }
        if($application->document_file_7==null){
            $application->document_file_7 = 'empty.pdf';
        }
        if($application->document_file_8==null){
            $application->document_file_8 = 'empty.pdf';
        }
        if($result) {
            $pdf = PDF::loadView('statusRehabpdf',$data);
            $pdf->save($path . '/' . $fileName);
            $pdf = PDFMerger::init();
            $pdf->addPDF($path  . $fileName, 'all');
            $pdf->addPDF(storage_path('app/public/uploads/') .  $application->document_file_1, 'all');
            $pdf->addPDF(storage_path('app/public/uploads/')  . $application->document_file_2, 'all');
            $pdf->addPDF(storage_path('app/public/uploads/')  . $application->document_file_3, 'all');
            $pdf->addPDF(storage_path('app/public/uploads/' ) . $application->document_file_4, 'all');
            $pdf->addPDF(storage_path('app/public/uploads/') . $application->document_file_5, 'all');
            $pdf->addPDF(storage_path('app/public/uploads/') . $application->document_file_6, 'all');
            $pdf->addPDF(storage_path('app/public/uploads/') . $application->document_file_7, 'all');
            $pdf->addPDF(storage_path('app/public/uploads/') . $application->document_file_8, 'all');
            $pdf->merge();
            $pdf->save($application->applicant_name.'_11-03_Rehab_Final_Inspection'. '.' . 'pdf', "download");

            StatusRehab::where('application_id', $id)->update([
                'document_spawn' => $fileName,
                'document_creation_date' => date('m/d/Y'),
            ]);

            return Redirect::back();

        }



        else {
            session()->flash('message', 'failed');
            return  Redirect::back();
        }
    }

    public function generatepdfs($id)
    {

        $application = Application::find($id);
        $flr_id = $application->floor_plan;
        $floorplan = FloorPlan::find($flr_id);

        $company_id = $application->company_id;
        $buider_name  = Company::find($company_id);



        foreach (Setting::where('id', 1)->get() as $report)
        {
            $report_glo = $report->report_glo;
            $report_contact = $report->report_contact;
        }
//N/A---------------------------------------------------------------Status100 - New changes 25-2-2022

        $gis = Status100::where('application_id', $id)
            ->get('general_inspection');
        $result = explode("_", $gis);
        for($i=1;$i<=24;$i++){
            $result[$i]=str_replace('\\', '' , $result[$i]);


        }


        $eis = Status100::where('application_id', $id)
            ->get('exterior_inspection');
        $ex_ins = explode("_", $eis);
        for($i=1;$i<=17;$i++){
            $ex_ins[$i]=str_replace('\\', '' ,  $ex_ins[$i]);
        }

        $iis = Status100::where('application_id', $id)
            ->get('interior_inspection');
        $in_ins = explode("_", $iis);
        for($i=1;$i<=35;$i++){
            $in_ins[$i]=str_replace('\\', '' ,   $in_ins[$i]);

        }

        $el_is = Status100::where('application_id', $id)
            ->get('electrical_inspection');
        $el_ins = explode("_", $el_is);
        for($i=1;$i<=11;$i++){
            $el_ins[$i]=str_replace('\\', '' ,    $el_ins[$i]);
        }



        $ac_is = Status100::where('application_id', $id)
            ->get('accessibility_inspection');
        $ac_ins = explode("_", $ac_is);
        for($i=1;$i<=6;$i++){
            $ac_ins[$i]=str_replace('\\', '' ,     $ac_ins[$i]);
        }
        //-------------------------------------------------End N/A New changes 25-2-2022

        foreach (Status100::where('application_id', $id)
                     ->get() as $status50) {
            $in_name = $status50->inspector;
            $superintendent = $status50->superintendent;
            $in_sign = $status50->inspection_sign;
            $sup_sign =  $status50->superintendent_sign;
            $in_signdate = $status50->inspection_sign_off_date;
            $sup_signdate =  $status50->superintendent_sign_off_date;

        }
        foreach (Photo::where('application_id', $id)->where('type', '100%')
                     ->get() as $photo50) {
            $photo_1=$photo50->photo_1;
            $photo_2=$photo50->photo_2;
            $photo_3=$photo50->photo_3;
            $photo_4=$photo50->photo_4;
            $photo_5=$photo50->photo_5;
            $photo_6=$photo50->photo_6;
            $photo_7=$photo50->photo_7;
            $photo_8=$photo50->photo_8;
            $photo_9=$photo50->photo_9;
            $photo_10=$photo50->photo_10;
            $photo_11=$photo50->photo_11;
            $photo_12=$photo50->photo_12;
            $photo_13=$photo50->photo_13;
            $photo_14=$photo50->photo_14;
            $photo_15=$photo50->photo_15;
            $photo_16=$photo50->photo_16;
            $photo_17=$photo50->photo_17;
            $photo_18=$photo50->photo_18;
            $photo_19=$photo50->photo_19;
            $photo_20=$photo50->photo_20;
            $photo_21=$photo50->photo_21;
            $photo_22=$photo50->photo_22;
            $photo_23=$photo50->photo_23;
            $photo_24=$photo50->photo_24;
            $photo_25=$photo50->photo_25;
            $photo_26=$photo50->photo_26;
            $photo_27=$photo50->photo_27;
            $photo_28=$photo50->photo_28;
            $photo_29=$photo50->photo_29;
            $photo_30=$photo50->photo_30;


        }
        //  dd($photo_20);
        foreach (Deficiency::where('application_id', $id)->where('type', '100%')
                     ->get() as $deficiency) {
            $deficiency_photo_1 = $deficiency->deficiency_photo_1;
            $deficiency_photo_2 = $deficiency->deficiency_photo_2;
            $deficiency_photo_3 = $deficiency->deficiency_photo_3;
            $deficiency_photo_4 = $deficiency->deficiency_photo_4;
            $deficiency_photo_5 = $deficiency->deficiency_photo_5;
            $deficiency_photo_6 = $deficiency->deficiency_photo_6;
            $deficiency_photo_7 = $deficiency->deficiency_photo_7;
            $deficiency_photo_8 = $deficiency->deficiency_photo_8;
            $deficiency_photo_9 = $deficiency->deficiency_photo_9;
            $deficiency_photo_10= $deficiency->deficiency_photo_10;
            $deficiency_photo_11 =$deficiency->deficiency_photo_11;
            $deficiency_photo_12 =$deficiency->deficiency_photo_12;
            $deficiency_photo_13=$deficiency->deficiency_photo_13;

        }










        $data = [
            'applicant_name' => $application->applicant_name ,
            'applicant_address' => $application->applicant_address,
            'contractor_name' => isset($buider_name->name) ? $buider_name->name : "",
            'floorplan' => $floorplan->name,
            'report_glo' => $report_glo,
            'report_contact' => $report_contact,
            //General inspection
            'result_1'=>str_replace('inspection":"', '' , $result[1]),
            'result_2'=>$result[2],
            'result_3'=>$result[3],
            'result_4'=>$result[4],
            'result_5'=>$result[5],
            'result_6'=>$result[6],
            'result_7'=>$result[7],
            'result_8'=>$result[8],
            'result_9'=>$result[9],
            'result_10'=>$result[10],
            'result_11'=>$result[11],
            'result_12'=>$result[12],
            'result_13'=>$result[13],
            'result_14'=>$result[14],
            'result_15'=>$result[15],
            'result_16'=>$result[16],
            'result_17'=>$result[17],
            'result_18'=>$result[18],
            'result_19'=>$result[19],
            'result_20'=>$result[20],
            'result_21'=>$result[21],
            'result_22'=>$result[22],
            'result_23'=>$result[23],
            'result_24'=>  str_replace('"}]', '' , $result[24]),
            //ExteriorIns code-----------------------------
            'ex_ins_1' =>str_replace('inspection":"', '' , $ex_ins[1]),
            'ex_ins_2' =>$ex_ins[2],
            'ex_ins_3' =>$ex_ins[3],
            'ex_ins_4' =>$ex_ins[4],
            'ex_ins_5' =>$ex_ins[5],
            'ex_ins_6' =>$ex_ins[6],
            'ex_ins_7' =>$ex_ins[7],
            'ex_ins_8' =>$ex_ins[8],
            'ex_ins_9' =>$ex_ins[9],
            'ex_ins_10' =>$ex_ins[10],
            'ex_ins_11' =>$ex_ins[11],
            'ex_ins_12' =>$ex_ins[12],
            'ex_ins_13' =>$ex_ins[13],
            'ex_ins_14' =>$ex_ins[14],
            'ex_ins_15' =>$ex_ins[15],
            'ex_ins_16' =>$ex_ins[16],
            'ex_ins_17' =>  str_replace('"}]', '' , $ex_ins[17]),
            //I code-----------------------------
            'in_ins_1' =>str_replace('inspection":"', '' , $in_ins[1]),
            'in_ins_2' => $in_ins[2],
            'in_ins_3' =>$in_ins[3],
            'in_ins_4'=>$in_ins[4],
            'in_ins_5'=>$in_ins[5],
            'in_ins_6'=>$in_ins[6],
            'in_ins_7'=>$in_ins[7],
            'in_ins_8'=>$in_ins[8],
            'in_ins_9'=>$in_ins[9],
            'in_ins_10'=>$in_ins[10],
            'in_ins_11'=>$in_ins[11],
            'in_ins_12'=>$in_ins[12],
            'in_ins_13'=>$in_ins[13],
            'in_ins_14'=>$in_ins[14],
            'in_ins_15'=>$in_ins[15],
            'in_ins_16'=>$in_ins[16],
            'in_ins_17'=>$in_ins[17],
            'in_ins_18'=>$in_ins[18],
            'in_ins_19'=>$in_ins[19],
            'in_ins_20'=>$in_ins[20],
            'in_ins_21'=>$in_ins[21],
            'in_ins_22'=>$in_ins[22],
            'in_ins_23'=>$in_ins[23],
            'in_ins_24'=>$in_ins[24],
            'in_ins_25'=>$in_ins[25],
            'in_ins_26'=>$in_ins[26],
            'in_ins_27'=>$in_ins[27],
            'in_ins_28'=>$in_ins[28],
            'in_ins_29'=>$in_ins[29],
            'in_ins_30'=>$in_ins[30],
            'in_ins_31'=>$in_ins[31],
            'in_ins_32'=>$in_ins[32],
            'in_ins_33'=>$in_ins[33],
            'in_ins_34'=>$in_ins[34],
            'in_ins_35' => str_replace('"}]', '' ,$in_ins[35]),
//Electrical code------------------------------
            'el_ins_1'=>str_replace('inspection":"', '' ,$el_ins[1]),
            'el_ins_2'=>$el_ins[2],
            'el_ins_3'=>$el_ins[3],
            'el_ins_4'=>$el_ins[4],
            'el_ins_5'=>$el_ins[5],
            'el_ins_6'=>$el_ins[6],
            'el_ins_7'=>$el_ins[7],
            'el_ins_8'=>$el_ins[8],
            'el_ins_9'=>$el_ins[9],
            'el_ins_10'=>$el_ins[10],
            'el_ins_11'=>str_replace('"}]', '' ,$el_ins[11]),
//Acc code-----------------------------
            'ac_ins_1'=>str_replace('inspection":"', '' ,$ac_ins[1]),
            'ac_ins_2'=>$ac_ins[2],
            'ac_ins_3'=>$ac_ins[3],
            'ac_ins_4'=>$ac_ins[4],
            'ac_ins_5'=>$ac_ins[5],
            'ac_ins_6'=>str_replace('"}]', '' ,$ac_ins[6]),
//signature code------------------------------
            'inspector_name'=>  $in_name,
            'superintendent' =>$superintendent,
            'in_sign'       =>$in_sign,
            'sup_sign' =>$sup_sign,
            'in_signdate' => $in_signdate,
            'sup_signdate' => $sup_signdate,
//photo code-----------------------------
            'photo_1'=>$photo_1,
            'photo_2'=>$photo_2,
            'photo_3'=>$photo_3,
            'photo_4'=>$photo_4,
            'photo_5'=>$photo_5,
            'photo_6'=>$photo_6,
            'photo_7'=>$photo_7,
            'photo_8'=>$photo_8,
            'photo_9'=>$photo_9,
            'photo_10'=>$photo_10,
            'photo_11'=>$photo_11,
            'photo_12'=>$photo_12,
            'photo_13'=>$photo_13,
            'photo_14'=>$photo_14,
            'photo_15'=>$photo_15,
            'photo_16'=>$photo_16,
            'photo_17'=>$photo_17,
            'photo_18'=>$photo_18,
            'photo_19'=>$photo_19,
            'photo_20'=>$photo_20,
            'photo_21'=>$photo_21,
            'photo_22'=>$photo_22,
            'photo_23'=>$photo_23,
            'photo_24'=>$photo_24,
            'photo_25'=>$photo_25,
            'photo_26'=>$photo_26,
            'photo_27'=>$photo_27,
            'photo_28'=>$photo_28,
            'photo_29'=>$photo_29,
            'photo_30'=>$photo_30,
//Deficeincy code------------------------------
            'deficiency_photo_1'=>$deficiency_photo_1,
            'deficiency_photo_2'=>$deficiency_photo_2,
            'deficiency_photo_3'=>$deficiency_photo_3,
            'deficiency_photo_4'=>$deficiency_photo_4,
            'deficiency_photo_5'=>$deficiency_photo_5,
            'deficiency_photo_6'=>$deficiency_photo_6,
            'deficiency_photo_7'=>$deficiency_photo_7,
            'deficiency_photo_8'=>$deficiency_photo_8,
            'deficiency_photo_9'=>$deficiency_photo_9,
            'deficiency_photo_10'=>$deficiency_photo_10,
            'deficiency_photo_11'=>$deficiency_photo_11,
            'deficiency_photo_12'=>$deficiency_photo_12,
            'deficiency_photo_13'=>$deficiency_photo_13,



        ];







        $path = public_path('pdf_status_100/');
        $fileName =  $application->applicant_name.'_11-03_Final_Inspection'.time(). '.' . 'pdf' ;
        $fileNameDownload =  $application->applicant_name.'_11-03_Final_Inspection'. '.' . 'pdf' ;
        //added $fileNameDownload for new name  ---------------New changes 25-2-2022

        $result = DB::table('dpdfs')->insert([
            'application_id'     =>   $id,
            'file'   =>   $fileName,
            'application_type' => '100%'
        ]);
        //added new changes ------------- 12-03-2022
        if($application->document_file_1==null){
            $application->document_file_1 = 'empty.pdf';
        }
        if($application->document_file_2==null){
            $application->document_file_2 = 'empty.pdf';
        }
        if($application->document_file_3==null){
            $application->document_file_3 = 'empty.pdf';
        }
        if($application->document_file_4==null){
            $application->document_file_4 = 'empty.pdf';
        }
        if($application->document_file_5==null){
            $application->document_file_5 = 'empty.pdf';
        }
        if($application->document_file_6==null){
            $application->document_file_6 = 'empty.pdf';
        }
        if($application->document_file_7==null){
            $application->document_file_7 = 'empty.pdf';
        }
        if($application->document_file_8==null){
            $application->document_file_8 = 'empty.pdf';
        }
        if($result) {
            $pdf = PDF::loadView('status100pdf',$data);
            $pdf->save($path . '/' . $fileName);
            $pdf = PDFMerger::init();
            $pdf ->addPDF($path  . $fileName, 'all');
            $pdf ->addPDF(storage_path('app/public/uploads/') .  $application->document_file_1, 'all');
            $pdf ->addPDF(storage_path('app/public/uploads/')  . $application->document_file_2, 'all');
            $pdf ->addPDF(storage_path('app/public/uploads/')  . $application->document_file_3, 'all');
            $pdf ->addPDF(storage_path('app/public/uploads/' ) . $application->document_file_4, 'all');
            $pdf ->addPDF(storage_path('app/public/uploads/') . $application->document_file_5, 'all');
            $pdf ->addPDF(storage_path('app/public/uploads/') . $application->document_file_6, 'all');
            $pdf ->addPDF(storage_path('app/public/uploads/') . $application->document_file_7, 'all');
            $pdf ->addPDF(storage_path('app/public/uploads/') . $application->document_file_8, 'all');
            $pdf->merge();
            $pdf->save(  $application->applicant_name.'_11-03_Final_Inspection'. '.' . 'pdf', "download");

            Status100::where('application_id', $id)->update([
                'document_spawn' => $fileName,
                'document_creation_date' => date('m/d/Y'),
            ]);

            return Redirect::back();

        }

        else {
            session()->flash('message', 'failed');
            return  Redirect::back();
        }










        // return $pdf->download($fileName);
    }

    public function generatepdf( $id)
    {
        $application = Application::find($id);

        $flr_id = $application->floor_plan;
        $floorplan = FloorPlan::find($flr_id);

        $company_id = $application->company_id;
        $buider_name  = Company::find($company_id);




        foreach (Setting::where('id', 1)->get() as $report)
        {
            $report_glo = $report->report_glo;
            $report_contact = $report->report_contact;
        }

//N/A---------------------------------------------------------------Status50 New changes 25-2-2022
        $gis = Status50::where('application_id', $id)
            ->get('general_inspection');
        $result = explode("_", $gis);
        for($i=2;$i<=21;$i++){
            $result[$i]=str_replace('\\', '' , $result[$i]);
          

        }



        $i_ins = Status50::where('application_id', $id)
            ->get('interior_inspection');
        $interior_ins = explode("_", $i_ins);
        for($i=1;$i<=15;$i++){
            $interior_ins[$i]=str_replace('\\', '' ,  $interior_ins[$i]);

        }


        $win_d =Status50::where('application_id', $id)
            ->get('window_door_inspection');

        $win_doors = explode("_", $win_d);
        for($i=2;$i<=5;$i++){
            $win_doors[$i]=str_replace('\\', '' ,  $win_doors[$i]);

        }


        $ex_ins =  Status50::where('application_id', $id)
            ->get('exterior_inspection');
        $exterior_ins = explode("_",$ex_ins);
        for($i=1;$i<=12;$i++){
            $exterior_ins[$i]=str_replace('\\', '' ,   $exterior_ins[$i]);

        }

        $rf_ins =  Status50::where('application_id', $id)
            ->get('roof_attic_inspection');
        $roof_ins = explode("_", $rf_ins);
        for($i=2;$i<=11;$i++){
            $roof_ins[$i]=str_replace('\\', '' ,    $roof_ins [$i]);
        }
//---------------------------------------------------------------------------------End N/A New changes 25-2-2022

        foreach (Status50::where('application_id', $id)
                     ->get() as $status50) {
            $in_name = $status50->inspector;
            $superintendent = $status50->superintendent;
            $in_sign = $status50->inspection_sign;
            $sup_sign =  $status50->superintendent_sign;
            $in_signdate = $status50->inspection_sign_off_date;
            $sup_signdate =  $status50->superintendent_sign_off_date;

        }

        foreach (Photo::where('application_id', $id)->where('type', '50%')
                     ->get() as $photo50) {
            $photo_1=$photo50->photo_1;
            $photo_2=$photo50->photo_2;
            $photo_3=$photo50->photo_3;
            $photo_4=$photo50->photo_4;
            $photo_5=$photo50->photo_5;
            $photo_6=$photo50->photo_6;
            $photo_7=$photo50->photo_7;
            $photo_8=$photo50->photo_8;
            $photo_9=$photo50->photo_9;
            $photo_10=$photo50->photo_10;
            $photo_11=$photo50->photo_11;
            $photo_12=$photo50->photo_12;
            $photo_13=$photo50->photo_13;
            $photo_14=$photo50->photo_14;
            $photo_15=$photo50->photo_15;
            $photo_16=$photo50->photo_16;
            $photo_17=$photo50->photo_17;
            $photo_18=$photo50->photo_18;
            $photo_19=$photo50->photo_19;
            $photo_20=$photo50->photo_20;
            $photo_21=$photo50->photo_21;
            $photo_22=$photo50->photo_22;
            $photo_23=$photo50->photo_23;
            $photo_24=$photo50->photo_24;
            $photo_25=$photo50->photo_25;
            $photo_26=$photo50->photo_26;
            $photo_27=$photo50->photo_27;
            $photo_28=$photo50->photo_28;
            $photo_29=$photo50->photo_29;
            $photo_30=$photo50->photo_30;


        }
        // dd($photo_2);
        foreach (Deficiency::where('application_id', $id)->where('type', '50%')
                     ->get() as $deficiency) {
            $deficiency_photo_1 = $deficiency->deficiency_photo_1;
            $deficiency_photo_2 = $deficiency->deficiency_photo_2;
            $deficiency_photo_3 = $deficiency->deficiency_photo_3;
            $deficiency_photo_4 = $deficiency->deficiency_photo_4;
            $deficiency_photo_5 = $deficiency->deficiency_photo_5;
            $deficiency_photo_6 = $deficiency->deficiency_photo_6;
            $deficiency_photo_7 = $deficiency->deficiency_photo_7;
            $deficiency_photo_8 = $deficiency->deficiency_photo_8;
            $deficiency_photo_9 = $deficiency->deficiency_photo_9;
            $deficiency_photo_10= $deficiency->deficiency_photo_10;
            $deficiency_photo_11 =$deficiency->deficiency_photo_11;
            $deficiency_photo_12 =$deficiency->deficiency_photo_12;
            $deficiency_photo_13=$deficiency->deficiency_photo_13;

        }

//dd($deficiency_photo_2);





        $data = [
            'applicant_name' => $application->applicant_name ,
            'applicant_address' => $application->applicant_address,
            'contractor_name' =>isset($buider_name->name) ? $buider_name->name : "",
            'floorplan' => $floorplan->name,
            'report_glo' => $report_glo,
            'report_contact' => $report_contact,
            'result_1'=>str_replace('inspection":"', '' , $result[1]),
            'result_2'=>$result[2],
            'result_3'=>$result[3],
            'result_4'=>$result[4],
            'result_5'=>$result[5],
            'result_6'=>$result[6],
            'result_7'=>$result[7],
            'result_8'=>$result[8],
            'result_9'=>$result[9],
            'result_10'=>$result[10],
            'result_11'=>$result[11],
            'result_12'=>$result[12],
            'result_13'=>$result[13],
            'result_14'=>$result[14],
            'result_15'=>$result[15],
            'result_16'=>$result[16],
            'result_17'=>$result[17],
            'result_18'=>$result[18],
            'result_19'=>$result[19],
            'result_20'=>$result[20],
            'result_21'=>  str_replace('"}]', '' , $result[21]),
            //Interiror code---------------------------------------------------
            'interior_ins1'=>str_replace('inspection":"', '' , $interior_ins[1]),
            'interior_ins2'=>$interior_ins[2],
            'interior_ins3'=>$interior_ins[3],
            'interior_ins4'=>$interior_ins[4],
            'interior_ins5'=>$interior_ins[5],
            'interior_ins6'=>$interior_ins[6],
            'interior_ins7'=>$interior_ins[7],
            'interior_ins8'=>$interior_ins[8],
            'interior_ins9'=>$interior_ins[9],
            'interior_ins10'=>$interior_ins[10],
            'interior_ins11'=>$interior_ins[11],
            'interior_ins12'=>$interior_ins[12],
            'interior_ins13'=>$interior_ins[13],
            'interior_ins14'=>$interior_ins[14],
            'interior_ins15'=> str_replace('"}]', '' ,$interior_ins[15]),
            //Window_doors code------------------------------------------------
            'win_doors1' =>str_replace('inspection":"', '' , $win_doors[2]),
            'win_doors2'=> $win_doors[3],
            'win_doors3'=> $win_doors[4],
            'win_doors4'=>  str_replace('"}]', '' ,$win_doors[5]),
            //ExteriorIns code-----------------------------------------------------------------------------
            'exterior_ins1'=>str_replace('inspection":"', '' , $exterior_ins[1]),
            'exterior_ins2'=>$exterior_ins[2],
            'exterior_ins3'=>$exterior_ins[3],
            'exterior_ins4'=>$exterior_ins[4],
            'exterior_ins5'=>$exterior_ins[5],
            'exterior_ins6'=>$exterior_ins[6],
            'exterior_ins7'=>$exterior_ins[7],
            'exterior_ins8'=>$exterior_ins[8],
            'exterior_ins9'=>$exterior_ins[9],
            'exterior_ins10'=>$exterior_ins[10],
            'exterior_ins11'=>$exterior_ins[11],
            'exterior_ins12'=>str_replace('"}]', '' ,$exterior_ins[12]),
            //RoofIns code---------------------------------------------------------------------------------
            'roof_ins1'=> str_replace('inspection":"', '' , $roof_ins[2]),
            'roof_ins2'=> $roof_ins[3],
            'roof_ins3'=> $roof_ins[4],
            'roof_ins4'=> $roof_ins[5],
            'roof_ins5'=> $roof_ins[6],
            'roof_ins6'=> $roof_ins[7],
            'roof_ins7'=> $roof_ins[8],
            'roof_ins8'=> $roof_ins[9],
            'roof_ins9'=> $roof_ins[10],
            'roof_ins10'=> str_replace('"}]', '' ,$roof_ins[11]),
            //signature code--------------------------------------------------------------------------------
            'inspector_name'=>  $in_name,
            'superintendent' =>$superintendent,
            'in_sign'       =>$in_sign,
            'sup_sign' =>$sup_sign,
            'in_signdate' => $in_signdate,
            'sup_signdate' => $sup_signdate,
            //Photos code ................................................................................................................................
            'photo_1'=>$photo_1,
            'photo_2'=>$photo_2,
            'photo_3'=>$photo_3,
            'photo_4'=>$photo_4,
            'photo_5'=>$photo_5,
            'photo_6'=>$photo_6,
            'photo_7'=>$photo_7,
            'photo_8'=>$photo_8,
            'photo_9'=>$photo_9,
            'photo_10'=>$photo_10,
            'photo_11'=>$photo_11,
            'photo_12'=>$photo_12,
            'photo_13'=>$photo_13,
            'photo_14'=>$photo_14,
            'photo_15'=>$photo_15,
            'photo_16'=>$photo_16,
            'photo_17'=>$photo_17,
            'photo_18'=>$photo_18,
            'photo_19'=>$photo_19,
            'photo_20'=>$photo_20,
            'photo_21'=>$photo_21,
            'photo_22'=>$photo_22,
            'photo_23'=>$photo_23,
            'photo_24'=>$photo_24,
            'photo_25'=>$photo_25,
            'photo_26'=>$photo_26,
            'photo_27'=>$photo_27,
            'photo_28'=>$photo_28,
            'photo_29'=>$photo_29,
            'photo_30'=>$photo_30,
//Deficeincy code------------------------------
            'deficiency_photo_1'=>$deficiency_photo_1,
            'deficiency_photo_2'=>$deficiency_photo_2,
            'deficiency_photo_3'=>$deficiency_photo_3,
            'deficiency_photo_4'=>$deficiency_photo_4,
            'deficiency_photo_5'=>$deficiency_photo_5,
            'deficiency_photo_6'=>$deficiency_photo_6,
            'deficiency_photo_7'=>$deficiency_photo_7,
            'deficiency_photo_8'=>$deficiency_photo_8,
            'deficiency_photo_9'=>$deficiency_photo_9,
            'deficiency_photo_10'=>$deficiency_photo_10,
            'deficiency_photo_11'=>$deficiency_photo_11,
            'deficiency_photo_12'=>$deficiency_photo_12,
            'deficiency_photo_13'=>$deficiency_photo_13,
        ];
        $path = public_path('pdf_status_50/');
        $fileName =  $application->applicant_name.'_11-10_Progress_Inspection'.time(). '.' . 'pdf' ;
        $fileNameDownload =  $application->applicant_name.'_11-10_Progress_Inspection'. '.' . 'pdf' ;
        //added $fileNameDownload for new name  ---------------New changes 25-2-2022



        $result = DB::table('dpdfs')->insert([
            'application_id'     =>   $id,
            'file'   =>   $fileName,
            'application_type' => '50%'
        ]);

        //added new changes ------------- 12-03-2022

        if($application->document_file_1==null){
            $application->document_file_1 = 'empty.pdf';
        }
        if($application->document_file_2==null){
            $application->document_file_2 = 'empty.pdf';
        }

        if($application->document_file_3==null){
            $application->document_file_3 = 'empty.pdf';
        }
        if($application->document_file_4==null){
            $application->document_file_4 = 'empty.pdf';
        }
        if($application->document_file_5==null){
            $application->document_file_5 = 'empty.pdf';
        }
        if($application->document_file_6==null){
            $application->document_file_6 = 'empty.pdf';
        }
        if($application->document_file_7==null){
            $application->document_file_7 = 'empty.pdf';
        }
        if($application->document_file_8==null){
            $application->document_file_8 = 'empty.pdf';
        }


        if($result) {
            //added new changes ------------- 05-03-2022
            $pdf = PDF::loadView('status50pdf',$data);
            $pdf->save($path . '/' . $fileName);



            $pdf = PDFMerger::init();
            //$pdf ->addPDF(public_path('storage/uploads/') .  $application->document_file_1, 'all');
            $pdf ->addPDF($path  . $fileName, 'all');
            $pdf ->addPDF(storage_path('app/public/uploads/') .  $application->document_file_1, 'all');
            $pdf ->addPDF(storage_path('app/public/uploads/')  . $application->document_file_2, 'all');
            $pdf ->addPDF(storage_path('app/public/uploads/')  . $application->document_file_3, 'all');
            $pdf ->addPDF(storage_path('app/public/uploads/' ) . $application->document_file_4, 'all');
            $pdf ->addPDF(storage_path('app/public/uploads/') . $application->document_file_5, 'all');
            $pdf ->addPDF(storage_path('app/public/uploads/') . $application->document_file_6, 'all');
            $pdf ->addPDF(storage_path('app/public/uploads/') . $application->document_file_7, 'all');
            $pdf ->addPDF(storage_path('app/public/uploads/') . $application->document_file_8, 'all');
            $pdf->merge();
            $pdf->save( $application->applicant_name.'_11-10_Progress_Inspection'. '.' . 'pdf', "download");

            Status50::where('application_id', $id)->update([
                'document_spawn' => $fileName,
                'document_creation_date' => date('m/d/Y'),
            ]);

            return Redirect::back();

        }

        else {
            session()->flash('message', 'failed');
            return  Redirect::back();
        }








        //  $pdf = PDFMerger::init();


        //    $pdf ->addPDF(public_path($application->document_file_1), 'all');
        //    $pdf ->addPDF(public_path($application->document_file_2), 'all');
        //    $pdf ->addPDF(public_path($application->document_file_3), 'all');
        //    $pdf ->addPDF(public_path($application->document_file_4), 'all');
        //    $pdf ->addPDF(public_path($application->document_file_5), 'all');
        //    $pdf ->addPDF(public_path($application->document_file_6), 'all');
        //    $pdf->merge('file', public_path('/upload/created.pdf'), 'P');



        // $pdfMerger = PDFMerger::init();








        // $application->document_1;







    }



    function __construct() {
        date_default_timezone_set('America/Chicago');
    }

    function index() {
        $inspectors = User::where('role_id', 3)->get();
        $contructors = Company::all();
        return view('application', [
            'inspectors' => $inspectors,
            'contructors' => $contructors
        ]);
    }

    function getApplications() {
        $construction_type = $_GET['construction_type'];
        $inspection_status = $_GET['inspection_status'];
        $inspection_type = $_GET['inspection_type'];
        $inspector = $_GET['inspector'];
        $constructor = $_GET['contractor'];

        $inspection_type == '50' ? $inspection_type = '50%' : $inspection_type = $inspection_type;
        $inspection_type == '100' ? $inspection_type = '100%' : $inspection_type = $inspection_type;

        if (Auth::user()->role_id == 2 || Auth::user()->role_id == 4) {
            if($construction_type && $inspection_status && $inspection_type
            && $inspector && $constructor) {
                $applications = Application::where([
                    ['construction_type', $construction_type],
                    ['inspection_type', $inspection_type],
                    ['inspection_status', $inspection_status],
                    ['inspector_id', $inspector],
                    ['company_id', $constructor],
                ])->get();
            } else if($construction_type && $inspection_status && $inspection_type
                && $inspector) {
                $applications = Application::where([
                    ['construction_type', $construction_type],
                    ['inspection_type', $inspection_type],
                    ['inspection_status', $inspection_status],
                    ['inspector_id', $inspector]
                ])->get();
            } else if($construction_type && $inspection_status && $inspection_type
                 && $constructor) {
                $applications = Application::where([
                    ['construction_type', $construction_type],
                    ['inspection_type', $inspection_type],
                    ['inspection_status', $inspection_status],
                    ['company_id', $constructor],
                ])->get();
            } else if($construction_type && $inspection_type && $inspector && $constructor) {
                $applications = Application::where([
                    ['construction_type', $construction_type],
                    ['inspection_type', $inspection_type],
                    ['inspector_id', $inspector],
                    ['company_id', $constructor],
                ])->get();
            } else if($inspection_status && $inspection_type && $inspector && $constructor) {
                $applications = Application::where([
                    ['inspection_type', $inspection_type],
                    ['inspection_status', $inspection_status],
                    ['inspector_id', $inspector],
                    ['company_id', $constructor],
                ])->get();
            } else if($construction_type && $inspection_status && $inspection_type) {
                $applications = Application::where([
                    ['construction_type', $construction_type],
                    ['inspection_type', $inspection_type],
                    ['inspection_status', $inspection_status],
                ])->get();
            } else if($construction_type && $inspection_status && $inspector) {
                $applications = Application::where([
                    ['construction_type', $construction_type],
                    ['inspection_status', $inspection_status],
                    ['inspector_id', $inspector],
                ])->get();
            } else if($construction_type && $inspection_status && $constructor) {
                $applications = Application::where([
                    ['construction_type', $construction_type],
                    ['inspection_status', $inspection_status],
                    ['company_id', $constructor],
                ])->get();
            } else if($construction_type && $inspection_type && $inspector) {
                $applications = Application::where([
                    ['construction_type', $construction_type],
                    ['inspection_type', $inspection_type],
                    ['inspector_id', $inspector],
                ])->get();
            } else if($construction_type && $inspection_type && $constructor) {
                $applications = Application::where([
                    ['construction_type', $construction_type],
                    ['inspection_type', $inspection_type],
                    ['company_id', $constructor],
                ])->get();
            } else if($inspection_status && $inspection_type && $inspector) {
                $applications = Application::where([
                    ['inspection_type', $inspection_type],
                    ['inspection_status', $inspection_status],
                    ['inspector_id', $inspector],
                ])->get();
            } else if($inspection_status && $inspection_type && $constructor) {
                $applications = Application::where([
                    ['inspection_type', $inspection_type],
                    ['inspection_status', $inspection_status],
                    ['company_id', $constructor],
                ])->get();
            } else if($construction_type && $inspection_status) {
                $applications = Application::where([
                    ['construction_type', $construction_type],
                    ['inspection_status', $inspection_status],
                ])->get();
            } else if($construction_type && $inspection_type) {
                $applications = Application::where([
                    ['construction_type', $construction_type],
                    ['inspection_type', $inspection_type],
                ])->get();
            } else if($construction_type && $inspector) {
                $applications = Application::where([
                    ['construction_type', $construction_type],
                    ['inspector_id', $inspector],
                ])->get();
            } else if($construction_type && $constructor) {
                $applications = Application::where([
                    ['construction_type', $construction_type],
                    ['company_id', $constructor],
                ])->get();
            } else if($inspection_status && $inspection_type) {
                $applications = Application::where([
                    ['inspection_type', $inspection_type],
                    ['inspection_status', $inspection_status],
                ])->get();
            } else if($inspection_status && $inspector) {
                $applications = Application::where([
                    ['inspection_status', $inspection_status],
                    ['inspector_id', $inspector],
                ])->get();
            } else if($inspection_status && $constructor) {
                $applications = Application::where([
                    ['inspection_status', $inspection_status],
                    ['company_id', $constructor],
                ])->get();
            } else if($inspection_type && $inspector) {
                $applications = Application::where([
                    ['inspection_type', $inspection_type],
                    ['inspector_id', $inspector],
                ])->get();
            } else if($inspection_type && $constructor) {
                $applications = Application::where([
                    ['inspection_type', $inspection_type],
                    ['company_id', $constructor],
                ])->get();
            } else if($construction_type) {
                $applications = Application::where([
                    ['construction_type', $construction_type],
                ])->get();
            } else if($inspection_status) {
                $applications = Application::where([
                    ['inspection_status', $inspection_status],
                ])->get();
            } else if($inspection_type) {
                $applications = Application::where([
                    ['inspection_type', $inspection_type],
                ])->get();
            } else if($inspector) {
                $applications = Application::where([
                    ['inspector_id', $inspector],
                ])->get();
            } else if($constructor) {
                $applications = Application::where([
                    ['company_id', $constructor],
                ])->get();
            } else {
                $applications = Application::all();
            }
        } else if (Auth::user()->role_id == 3) {
            if($construction_type && $inspection_status && $inspection_type && $constructor) {
                $applications = Application::where([
                    ['construction_type', $construction_type],
                    ['inspection_type', $inspection_type],
                    ['inspection_status', $inspection_status],
                    ['inspector_id', Auth::user()->id],
                    ['company_id', $constructor],
                ])->get();
            } else if($construction_type && $inspection_status && $inspection_type) {
                $applications = Application::where([
                    ['construction_type', $construction_type],
                    ['inspection_type', $inspection_type],
                    ['inspection_status', $inspection_status],
                    ['inspector_id', Auth::user()->id]
                ])->get();
            } else if($construction_type && $inspection_type && $constructor) {
                $applications = Application::where([
                    ['construction_type', $construction_type],
                    ['inspection_type', $inspection_type],
                    ['inspector_id', Auth::user()->id],
                    ['company_id', $constructor],
                ])->get();
            } else if($inspection_status && $inspection_type && $constructor) {
                $applications = Application::where([
                    ['inspection_type', $inspection_type],
                    ['inspection_status', $inspection_status],
                    ['inspector_id', Auth::user()->id],
                    ['company_id', $constructor],
                ])->get();
            } else if($construction_type && $inspection_status) {
                $applications = Application::where([
                    ['construction_type', $construction_type],
                    ['inspection_status', $inspection_status],
                    ['inspector_id', Auth::user()->id],
                ])->get();
            } else if($construction_type && $inspection_type) {
                $applications = Application::where([
                    ['construction_type', $construction_type],
                    ['inspection_type', $inspection_type],
                    ['inspector_id', Auth::user()->id],
                ])->get();
            } else if($construction_type && $constructor) {
                $applications = Application::where([
                    ['construction_type', $construction_type],
                    ['inspector_id', Auth::user()->id],
                    ['company_id', $constructor],
                ])->get();
            } else if($inspection_status && $inspection_type) {
                $applications = Application::where([
                    ['inspection_type', $inspection_type],
                    ['inspection_status', $inspection_status],
                    ['inspector_id', Auth::user()->id],
                ])->get();
            } else if($inspection_status && $constructor) {
                $applications = Application::where([
                    ['inspection_status', $inspection_status],
                    ['inspector_id', Auth::user()->id],
                    ['company_id', $constructor],
                ])->get();
            } else if($inspection_type && $constructor) {
                $applications = Application::where([
                    ['inspection_type', $inspection_type],
                    ['inspector_id', Auth::user()->id],
                    ['company_id', $constructor],
                ])->get();
            } else if($construction_type) {
                $applications = Application::where([
                    ['construction_type', $construction_type],
                    ['inspector_id', Auth::user()->id],
                ])->get();
            } else if($inspection_status) {
                $applications = Application::where([
                    ['inspection_status', $inspection_status],
                    ['inspector_id', Auth::user()->id],
                ])->get();
            } else if($inspection_type) {
                $applications = Application::where([
                    ['inspection_type', $inspection_type],
                    ['inspector_id', Auth::user()->id],
                ])->get();
            } else if($constructor) {
                $applications = Application::where([
                    ['inspector_id', Auth::user()->id],
                    ['company_id', $constructor],
                ])->get();
            } else {
                $applications = Application::where('inspector_id', Auth::user()->id)->get();
            }
        } else {
            if($construction_type && $inspection_status && $inspection_type && $inspector) {
                $applications = Application::where([
                    ['construction_type', $construction_type],
                    ['inspection_type', $inspection_type],
                    ['inspection_status', $inspection_status],
                    ['inspector_id', $inspector],
                    ['company_id', Auth::user()->company_id],
                ])->get();
            } else if($construction_type && $inspection_status && $inspection_type) {
                $applications = Application::where([
                    ['construction_type', $construction_type],
                    ['inspection_type', $inspection_type],
                    ['inspection_status', $inspection_status],
                    ['company_id', Auth::user()->company_id],
                ])->get();
            } else if($construction_type && $inspection_type && $inspector) {
                $applications = Application::where([
                    ['construction_type', $construction_type],
                    ['inspection_type', $inspection_type],
                    ['inspector_id', $inspector],
                    ['company_id', Auth::user()->company_id],
                ])->get();
            } else if($inspection_status && $inspection_type && $inspector) {
                $applications = Application::where([
                    ['inspection_type', $inspection_type],
                    ['inspection_status', $inspection_status],
                    ['inspector_id', $inspector],
                    ['company_id', Auth::user()->company_id],
                ])->get();
            } else if($construction_type && $inspection_status && $inspection_type) {
                $applications = Application::where([
                    ['construction_type', $construction_type],
                    ['inspection_type', $inspection_type],
                    ['inspection_status', $inspection_status],
                    ['company_id', Auth::user()->company_id],
                ])->get();
            } else if($construction_type && $inspection_status && $inspector) {
                $applications = Application::where([
                    ['construction_type', $construction_type],
                    ['inspection_status', $inspection_status],
                    ['inspector_id', $inspector],
                    ['company_id', Auth::user()->company_id],
                ])->get();
            } else if($construction_type && $inspection_type && $inspector) {
                $applications = Application::where([
                    ['construction_type', $construction_type],
                    ['inspection_type', $inspection_type],
                    ['inspector_id', $inspector],
                    ['company_id', Auth::user()->company_id],
                ])->get();
            } else if($inspection_status && $inspection_type && $inspector) {
                $applications = Application::where([
                    ['inspection_type', $inspection_type],
                    ['inspection_status', $inspection_status],
                    ['inspector_id', $inspector],
                    ['company_id', Auth::user()->company_id],
                ])->get();
            } else if($construction_type && $inspection_status) {
                $applications = Application::where([
                    ['construction_type', $construction_type],
                    ['inspection_status', $inspection_status],
                    ['company_id', Auth::user()->company_id],
                ])->get();
            } else if($construction_type && $inspection_type) {
                $applications = Application::where([
                    ['construction_type', $construction_type],
                    ['inspection_type', $inspection_type],
                    ['company_id', Auth::user()->company_id],
                ])->get();
            } else if($construction_type && $inspector) {
                $applications = Application::where([
                    ['construction_type', $construction_type],
                    ['inspector_id', $inspector],
                    ['company_id', Auth::user()->company_id],
                ])->get();
            } else if($inspection_status && $inspection_type) {
                $applications = Application::where([
                    ['inspection_type', $inspection_type],
                    ['inspection_status', $inspection_status],
                    ['company_id', Auth::user()->company_id],
                ])->get();
            } else if($inspection_status && $inspector) {
                $applications = Application::where([
                    ['inspection_status', $inspection_status],
                    ['inspector_id', $inspector],
                    ['company_id', Auth::user()->company_id],
                ])->get();
            } else if($inspection_type && $inspector) {
                $applications = Application::where([
                    ['inspection_type', $inspection_type],
                    ['inspector_id', $inspector],
                    ['company_id', Auth::user()->company_id],
                ])->get();
            } else if($construction_type) {
                $applications = Application::where([
                    ['construction_type', $construction_type],
                    ['company_id', Auth::user()->company_id],
                ])->get();
            } else if($inspection_status) {
                $applications = Application::where([
                    ['inspection_status', $inspection_status],
                    ['company_id', Auth::user()->company_id],
                ])->get();
            } else if($inspection_type) {
                $applications = Application::where([
                    ['inspection_type', $inspection_type],
                    ['company_id', Auth::user()->company_id],
                ])->get();
            } else if($inspector) {
                $applications = Application::where([
                    ['inspector_id', $inspector],
                    ['company_id', Auth::user()->company_id],
                ])->get();
            } else {
                $applications = Application::where('company_id', Auth::user()->company_id)->get();
            }
        }

        $applicationArray = [];

        foreach ($applications as $value) {
            $applicationData = array(
                'id' => $value->id,
                'document_1' => $value->document_1,
                'document_file_1' => $value->document_file_1,
                'document_2' => $value->document_2,
                'document_file_2' => $value->document_file_2,
                'document_3' => $value->document_3,
                'document_file_3' => $value->document_file_3,
                'document_4' => $value->document_4,
                'document_file_4' => $value->document_file_4,
                'document_5' => $value->document_5,
                'document_file_5' => $value->document_file_5,
                'hriq_id' => $value->hriq_id,
                'submitted_glo' => $value->submitted_glo,
                'date_glo_submission' => $value->date_glo_submission,
                'application_id' => $value->application_id,
                'applicant_name' => $value->applicant_name,
                'applicant_address1' => $value->applicant_address,
                'applicant_city' => $value->applicant_city,
                'applicant_county' => $value->applicant_county,
                'requester_id' => $value->requester_id,
                'requester_name' => $value->requester_name,
                'requester_email' => $value->requester_email,
                'requester_phone' => $value->requester_phone,
                'company' => $value->company,
                'requested_date' => $value->requested_date,
                'requested_time' => $value->requested_time,
                'construction_type' => $value->construction_type,
                'floor_plan' => FloorPlan::find($value->floor_plan) ? FloorPlan::find($value->floor_plan)->name : $value->floor_plan,
                'inspection_type' => $value->inspection_type,
                'inspection_status' => $value->inspection_status,
                'region' => $value->region,
                'supervisor_name' => $value->supervisor_name,
                'supervisor_phone' => $value->supervisor_phone,
            );

            array_push($applicationArray, $applicationData);
        }

        return DataTables::of($applicationArray)
            ->addColumn('action', function($applicationArray) {
                $role = '';
                // $cnfrm ='Are you sure to delete?';
                if(Auth::user()->role_id == 1) {
                    $role = 'contractor';

                    return '<a class="editCompany mr-1" href="'.url($role.'/edit-application').'/'.$applicationArray['id'].'" data-id="'.$applicationArray['id'].'"><i class="fas fa-edit"></i></a>
                <a class="text-warning mr-1" href="'.url($role.'/view-application').'/'.$applicationArray['id'].'" data-id="'.$applicationArray['id'].'"><i class="fas fa-eye"></i></a>';
                } else if(Auth::user()->role_id == 2) {
                    $role = 'admin';
                    return '<a class="editCompany mr-1" href="'.url($role.'/edit-application').'/'.$applicationArray['id'].'" data-id="'.$applicationArray['id'].'"><i class="fas fa-edit"></i></a>
                <a class="text-warning mr-1" href="'.url($role.'/view-application').'/'.$applicationArray['id'].'" data-id="'.$applicationArray['id'].'"><i class="fas fa-eye"></i></a>

                <a class="text-danger mr-1"  title="Delete"  href="'.url($role.'/delete-application').'/'.$applicationArray['id'].'" data-id="'.$applicationArray['id'].'" onclick="confirmation()" ><i class="fas fa-trash"></i></a>';
                } else if(Auth::user()->role_id == 4) {
                    return '<a class="text-warning mr-1" href="'.url($role.'/view-application').'/'.$applicationArray['id'].'" data-id="'.$applicationArray['id'].'"><i class="fas fa-eye"></i></a>';
                } else {
                    $role = 'inspector';
                    return '<a class="editCompany mr-1" href="'.url($role.'/edit-application').'/'.$applicationArray['id'].'" data-id="'.$applicationArray['id'].'"><i class="fas fa-edit"></i></a>
                <a class="text-warning mr-1" href="'.url($role.'/view-application').'/'.$applicationArray['id'].'" data-id="'.$applicationArray['id'].'"><i class="fas fa-eye"></i></a>';
                }
            })
            ->addColumn('applicant_address', function($applicationArray) {
                return '<a href="https://maps.google.com/?q='.$applicationArray['applicant_address1'].'" target="_blank">'.$applicationArray['applicant_address1'].'</a>';
            })
            ->rawColumns(['action', 'applicant_address'])
            ->make(true);
    }

    function addApplicationView() {
        $floorplans = FloorPlan::all();
        $inspectors = User::where('role_id', 3)->get();
        return view('addApplication', [
            'floorplans' => $floorplans,
            'inspectors' => $inspectors
        ]);
    }

    function editApplicationView($id) {
        $application = Application::find($id);
        $comments = Comment::where('application_id', $id)->orderBy('id', 'DESC')->get();
        $floorplans = FloorPlan::all();
        $inspectors = User::where('role_id', 3)->get();
        $all_50 = "";
        $all_100 = "";
        $all_Rehab = "";
        $deficiency = "";
        $photo = "";
        $inspector_details = $application->inspector_id ? User::find($application->inspector_id) : "NONE";
        $requester_email = $application->requester_id ? User::find($application->requester_id)->email : $application->requester_email;
        Status50::where('application_id', $id)->update([
            'date_inspected' => $application->scheduled_inspection_date,
            'inspector' => $inspector_details == "NONE" ? null : $inspector_details->name,
            'inspector_email' => $inspector_details == "NONE" ? null : $inspector_details->email,
            'requester_email' => $requester_email,
            'superintendent' => $application->supervisor_name,
            'superintendent_email' => $application->supervisor_email,
            'superintendent_phone' => $application->supervisor_phone,
        ]);

        Status100::where('application_id', $id)->update([
            'date_inspected' => $application->scheduled_inspection_date,
            'inspector' => $inspector_details == "NONE" ? null : $inspector_details->name,
            'inspector_email' => $inspector_details == "NONE" ? null : $inspector_details->email,
            'requester_email' => $requester_email,
            'superintendent' => $application->supervisor_name,
            'superintendent_email' => $application->supervisor_email,
            'superintendent_phone' => $application->supervisor_phone,
        ]);

        if(count(StatusRehab::where('application_id', $application->id)->get()) > 0) {
            StatusRehab::where('application_id', $id)->update([
                'date_inspected' => $application->scheduled_inspection_date,
                'inspector' => $inspector_details == "NONE" ? null : $inspector_details->name,
                'inspector_email' => $inspector_details == "NONE" ? null : $inspector_details->email,
                'requester_email' => $requester_email,
                'superintendent' => $application->supervisor_name,
                'superintendent_email' => $application->supervisor_email,
                'superintendent_phone' => $application->supervisor_phone,
            ]);
        }
        if ($application->inspection_type == '50%') {
            $all_50s = Status50::where('application_id', $application->id)->get();
            if(count($all_50s) > 0) {
//                Status50::where('id', $all_50s[0]->id)->update([
//                    ''
//                ]);
                $all_50 = Status50::find($all_50s[0]->id);
            }
            $photo = Photo::where([
                ['application_id', $application->id],
                ['type', '50%']
            ])->get();

            if(count($photo) == 1) {
                $photo = Photo::find($photo[0]->id);
            } else {
                $photo = "";
            }

            $deficiency = Deficiency::where([
                ['application_id', $application->id],
                ['type', '50%']
            ])->get();

            if(count($deficiency) == 1) {
                $deficiency = Deficiency::find($deficiency[0]->id);
            } else {
                $deficiency = "";
            }
        }
        else if ($application->inspection_type == 'REHAB') {
            $all_Rehabs = StatusRehab::where('application_id', $application->id)->get();
            if(count($all_Rehabs) > 0) {
                $all_Rehab = StatusRehab::find($all_Rehabs[0]->id);
            }
            $photo = Photo::where([
                ['application_id', $application->id],
                ['type', 'Rehab']
            ])->get();

            if(count($photo) == 1) {
                $photo = Photo::find($photo[0]->id);
            } else {
                $photo = "";
            }

            $deficiency = Deficiency::where([
                ['application_id', $application->id],
                ['type', 'Rehab']
            ])->get();

            if(count($deficiency) == 1) {
                $deficiency = Deficiency::find($deficiency[0]->id);
            } else {
                $deficiency = "";
            }
        }
        else {
            $all_100s = Status100::where('application_id', $application->id)->get();
            if(count($all_100s) > 0) {
                $all_100 = Status100::find($all_100s[0]->id);
            }

            $photo = Photo::where([
                ['application_id', $application->id],
                ['type', '100%']
            ])->get();

            if(count($photo) == 1) {
                $photo = Photo::find($photo[0]->id);
            } else {
                $photo = "";
            }

            $deficiency = Deficiency::where([
                ['application_id', $application->id],
                ['type', '100%']
            ])->get();

            if(count($deficiency) == 1) {
                $deficiency = Deficiency::find($deficiency[0]->id);
            } else {
                $deficiency = "";
            }
        }
        return view('editApplication', [
            'application' => $application,
            'floorplans' => $floorplans,
            'inspectors' => $inspectors,
            'all_50' => $all_50,
            'all_100' => $all_100,
            'all_Rehab' => $all_Rehab,
            'photo' => $photo,
            'deficiency' => $deficiency,
            'comments' => $comments
        ]);
    }
function delete_doc1($id){
        $path = storage_path('app/public/uploads/');
        $app_photos = Application::find($id);
      if($app_photos->document_file_1!==null)
      {
              unlink($path.$app_photos->document_file_1);
              Application::where('id', $id)->update([
                'document_file_1' => null,
                'document_1' => null,
            ]);
            return Redirect::back();
      }
      else{
        return Redirect::back();
      }

}

function delete_doc2($id){
    $path = storage_path('app/public/uploads/');
    $app_photos = Application::find($id);
  if($app_photos->document_file_2!==null)
  {
          unlink($path.$app_photos->document_file_2);
          Application::where('id', $id)->update([
            'document_file_2' => null,
            'document_2' => null,
        ]);
        return Redirect::back();
  }
  else{
    return Redirect::back();
  }

}

function delete_doc3($id){
    $path = storage_path('app/public/uploads/');
    $app_photos = Application::find($id);
  if($app_photos->document_file_3!==null)
  {
          unlink($path.$app_photos->document_file_3);
          Application::where('id', $id)->update([
            'document_file_3' => null,
            'document_3' => null,
        ]);
        return Redirect::back();
  }
  else{
    return Redirect::back();
  }

}
function delete_doc4($id){
    $path = storage_path('app/public/uploads/');
    $app_photos = Application::find($id);
  if($app_photos->document_file_4!==null)
  {
          unlink($path.$app_photos->document_file_4);
          Application::where('id', $id)->update([
            'document_file_4' => null,
            'document_4' => null,
        ]);
        return Redirect::back();
  }
  else{
    return Redirect::back();
  }

}

function delete_doc5($id){
    $path = storage_path('app/public/uploads/');
    $app_photos = Application::find($id);
  if($app_photos->document_file_5!==null)
  {
          unlink($path.$app_photos->document_file_5);
          Application::where('id', $id)->update([
            'document_file_5' => null,
            'document_5' => null,
        ]);
        return Redirect::back();
  }
  else{
    return Redirect::back();
  }

}

function delete_doc6($id){
    $path = storage_path('app/public/uploads/');
    $app_photos = Application::find($id);
  if($app_photos->document_file_6!==null)
  {
          unlink($path.$app_photos->document_file_6);
          Application::where('id', $id)->update([
            'document_file_6' => null,
            'document_6' => null,
        ]);
        return Redirect::back();
  }
  else{
    return Redirect::back();
  }

}

function delete_doc7($id){
    $path = storage_path('app/public/uploads/');
    $app_photos = Application::find($id);
  if($app_photos->document_file_7!==null)
  {
          unlink($path.$app_photos->document_file_7);
          Application::where('id', $id)->update([
            'document_file_7' => null,
            'document_7' => null,
        ]);
        return Redirect::back();
  }
  else{
    return Redirect::back();
  }

}

function delete_doc8($id){
    $path = storage_path('app/public/uploads/');
    $app_photos = Application::find($id);
  if($app_photos->document_file_8!==null)
  {
          unlink($path.$app_photos->document_file_8);
          Application::where('id', $id)->update([
            'document_file_8' => null,
            'document_8' => null,
        ]);
        return Redirect::back();
  }
  else{
    return Redirect::back();
  }

}




    function deleteApplicationView($id) {








       $path = storage_path('app/public/uploads/');
       $app_photos = Application::find($id);
       $def_photos = Deficiency::where("application_id",$app_photos->id)->where('type','Rehab')->get();
       $def_photosf = Deficiency::where("application_id",$app_photos->id)->where('type','50%')->get();
       $def_photosh = Deficiency::where("application_id",$app_photos->id)->where('type','100%')->get();

       $photos_30R = Photo::where("application_id",$app_photos->id)->where('type','Rehab')->get();
       $photos_30F = Photo::where("application_id",$app_photos->id)->where('type','50%')->get();
       $photos_30H = Photo::where("application_id",$app_photos->id)->where('type','100%')->get();

//must include library
if($app_photos->document_file_1!==null)
{
        unlink($path.$app_photos->document_file_1);
}
if($app_photos->document_file_2!==null)
{
        unlink($path.$app_photos->document_file_2);
}
if($app_photos->document_file_3!==null)
{
        unlink($path.$app_photos->document_file_3);
}
if($app_photos->document_file_4!==null)
{
        unlink($path.$app_photos->document_file_4);
}
if($app_photos->document_file_5!==null)
{
        unlink($path.$app_photos->document_file_5);
}
if($app_photos->document_file_6!==null)
{
        unlink($path.$app_photos->document_file_6);
}
if($app_photos->document_file_7!==null)
{
        unlink($path.$app_photos->document_file_7);
}
if($app_photos->document_file_8!==null)
{
        unlink($path.$app_photos->document_file_8);
}

         Application::where("id", $id)->delete();
////////////////////


 foreach ($def_photos as $def_pics) {
    if($def_pics->deficiency_photo_1!=null)
    {
        unlink($path.$def_pics->deficiency_photo_1);
    }
    if($def_pics->deficiency_photo_2!=null)
    {
        unlink($path.$def_pics->deficiency_photo_2);
    }
    if($def_pics->deficiency_photo_3!=null)
    {
        unlink($path.$def_pics->deficiency_photo_3);
    }
    if($def_pics->deficiency_photo_4!=null)
    {
        unlink($path.$def_pics->deficiency_photo_4);
    }
    if($def_pics->deficiency_photo_5!=null)
    {
        unlink($path.$def_pics->deficiency_photo_5);
    }
    if($def_pics->deficiency_photo_6!=null)
    {
        unlink($path.$def_pics->deficiency_photo_6);
    }
    if($def_pics->deficiency_photo_7!=null)
    {
        unlink($path.$def_pics->deficiency_photo_7);
    }
    if($def_pics->deficiency_photo_8!=null)
    {
        unlink($path.$def_pics->deficiency_photo_8);
    }
    if($def_pics->deficiency_photo_9!=null)
    {
        unlink($path.$def_pics->deficiency_photo_9);
    }
    if($def_pics->deficiency_photo_10!=null)
    {
        unlink($path.$def_pics->deficiency_photo_10);
    }
    if($def_pics->deficiency_photo_11!=null)
    {
        unlink($path.$def_pics->deficiency_photo_11);
    }
    if($def_pics->deficiency_photo_12!=null)
    {
        unlink($path.$def_pics->deficiency_photo_12);
    }
    if($def_pics->deficiency_photo_13!=null)
    {
        unlink($path.$def_pics->deficiency_photo_13);
    }

     }
     //////////////
     foreach ($def_photosh as $def_pics) {
        if($def_pics->deficiency_photo_1!=null)
        {
            unlink($path.$def_pics->deficiency_photo_1);
        }
        if($def_pics->deficiency_photo_2!=null)
        {
            unlink($path.$def_pics->deficiency_photo_2);
        }
        if($def_pics->deficiency_photo_3!=null)
        {
            unlink($path.$def_pics->deficiency_photo_3);
        }
        if($def_pics->deficiency_photo_4!=null)
        {
            unlink($path.$def_pics->deficiency_photo_4);
        }
        if($def_pics->deficiency_photo_5!=null)
        {
            unlink($path.$def_pics->deficiency_photo_5);
        }
        if($def_pics->deficiency_photo_6!=null)
        {
            unlink($path.$def_pics->deficiency_photo_6);
        }
        if($def_pics->deficiency_photo_7!=null)
        {
            unlink($path.$def_pics->deficiency_photo_7);
        }
        if($def_pics->deficiency_photo_8!=null)
        {
            unlink($path.$def_pics->deficiency_photo_8);
        }
        if($def_pics->deficiency_photo_9!=null)
        {
            unlink($path.$def_pics->deficiency_photo_9);
        }
        if($def_pics->deficiency_photo_10!=null)
        {
            unlink($path.$def_pics->deficiency_photo_10);
        }
        if($def_pics->deficiency_photo_11!=null)
        {
            unlink($path.$def_pics->deficiency_photo_11);
        }
        if($def_pics->deficiency_photo_12!=null)
        {
            unlink($path.$def_pics->deficiency_photo_12);
        }
        if($def_pics->deficiency_photo_13!=null)
        {
            unlink($path.$def_pics->deficiency_photo_13);
        }

         }
//////////////
foreach ($def_photosf as $def_pics) {
    if($def_pics->deficiency_photo_1!=null)
    {
        unlink($path.$def_pics->deficiency_photo_1);
    }
    if($def_pics->deficiency_photo_2!=null)
    {
        unlink($path.$def_pics->deficiency_photo_2);
    }
    if($def_pics->deficiency_photo_3!=null)
    {
        unlink($path.$def_pics->deficiency_photo_3);
    }
    if($def_pics->deficiency_photo_4!=null)
    {
        unlink($path.$def_pics->deficiency_photo_4);
    }
    if($def_pics->deficiency_photo_5!=null)
    {
        unlink($path.$def_pics->deficiency_photo_5);
    }
    if($def_pics->deficiency_photo_6!=null)
    {
        unlink($path.$def_pics->deficiency_photo_6);
    }
    if($def_pics->deficiency_photo_7!=null)
    {
        unlink($path.$def_pics->deficiency_photo_7);
    }
    if($def_pics->deficiency_photo_8!=null)
    {
        unlink($path.$def_pics->deficiency_photo_8);
    }
    if($def_pics->deficiency_photo_9!=null)
    {
        unlink($path.$def_pics->deficiency_photo_9);
    }
    if($def_pics->deficiency_photo_10!=null)
    {
        unlink($path.$def_pics->deficiency_photo_10);
    }
    if($def_pics->deficiency_photo_11!=null)
    {
        unlink($path.$def_pics->deficiency_photo_11);
    }
    if($def_pics->deficiency_photo_12!=null)
    {
        unlink($path.$def_pics->deficiency_photo_12);
    }
    if($def_pics->deficiency_photo_13!=null)
    {
        unlink($path.$def_pics->deficiency_photo_13);
    }

     }

//////////////////////////
foreach ($photos_30R  as $main_pics) {
    if($main_pics->photo_1!=null)
    {
        unlink($path.$main_pics->photo_1);
    }
    if($main_pics->photo_2!=null)
    {
        unlink($path.$main_pics->photo_2);
    }
    if($main_pics->photo_3!=null)
    {
        unlink($path.$main_pics->photo_3);
    }
    if($main_pics->photo_4!=null)
    {
        unlink($path.$main_pics->photo_4);
    }
    if($main_pics->photo_5!=null)
    {
        unlink($path.$main_pics->photo_5);
    }
    if($main_pics->photo_6!=null)
    {
        unlink($path.$main_pics->photo_6);
    }
    if($main_pics->photo_7!=null)
    {
        unlink($path.$main_pics->photo_7);
    }
    if($main_pics->photo_8!=null)
    {
        unlink($path.$main_pics->photo_8);
    }
    if($main_pics->photo_9!=null)
    {
        unlink($path.$main_pics->photo_9);
    }
    if($main_pics->photo_10!=null)
    {
        unlink($path.$main_pics->photo_10);
    }
    if($main_pics->photo_11!=null)
    {
        unlink($path.$main_pics->photo_12);
    }
    if($main_pics->photo_13!=null)
    {
        unlink($path.$main_pics->photo_13);
    }
    if($main_pics->photo_14!=null)
    {
        unlink($path.$main_pics->photo_14);
    }
    if($main_pics->photo_15!=null)
    {
        unlink($path.$main_pics->photo_15);
    }
    if($main_pics->photo_16!=null)
    {
        unlink($path.$main_pics->photo_16);
    }
    if($main_pics->photo_17!=null)
    {
        unlink($path.$main_pics->photo_17);
    }
    if($main_pics->photo_18!=null)
    {
        unlink($path.$main_pics->photo_18);
    }
    if($main_pics->photo_19!=null)
    {
        unlink($path.$main_pics->photo_19);
    }
    if($main_pics->photo_20!=null)
    {
        unlink($path.$main_pics->photo_20);
    }
    if($main_pics->photo_21!=null)
    {
        unlink($path.$main_pics->photo_21);
    }
    if($main_pics->photo_22!=null)
    {
        unlink($path.$main_pics->photo_22);
    }
    if($main_pics->photo_23!=null)
    {
        unlink($path.$main_pics->photo_23);
    }
    if($main_pics->photo_24!=null)
    {
        unlink($path.$main_pics->photo_24);
    }
    if($main_pics->photo_25!=null)
    {
        unlink($path.$main_pics->photo_25);
    }
    if($main_pics->photo_26!=null)
    {
        unlink($path.$main_pics->photo_26);
    }
    if($main_pics->photo_27!=null)
    {
        unlink($path.$main_pics->photo_27);
    }
    if($main_pics->photo_28!=null)
    {
        unlink($path.$main_pics->photo_28);
    }
    if($main_pics->photo_29!=null)
    {
        unlink($path.$main_pics->photo_29);
    }
    if($main_pics->photo_30!=null)
    {
        unlink($path.$main_pics->photo_30);
    }
}
////////////////
foreach ($photos_30F  as $main_pics) {
    if($main_pics->photo_1!=null)
    {
        unlink($path.$main_pics->photo_1);
    }
    if($main_pics->photo_2!=null)
    {
        unlink($path.$main_pics->photo_2);
    }
    if($main_pics->photo_3!=null)
    {
        unlink($path.$main_pics->photo_3);
    }
    if($main_pics->photo_4!=null)
    {
        unlink($path.$main_pics->photo_4);
    }
    if($main_pics->photo_5!=null)
    {
        unlink($path.$main_pics->photo_5);
    }
    if($main_pics->photo_6!=null)
    {
        unlink($path.$main_pics->photo_6);
    }
    if($main_pics->photo_7!=null)
    {
        unlink($path.$main_pics->photo_7);
    }
    if($main_pics->photo_8!=null)
    {
        unlink($path.$main_pics->photo_8);
    }
    if($main_pics->photo_9!=null)
    {
        unlink($path.$main_pics->photo_9);
    }
    if($main_pics->photo_10!=null)
    {
        unlink($path.$main_pics->photo_10);
    }
    if($main_pics->photo_11!=null)
    {
        unlink($path.$main_pics->photo_12);
    }
    if($main_pics->photo_13!=null)
    {
        unlink($path.$main_pics->photo_13);
    }
    if($main_pics->photo_14!=null)
    {
        unlink($path.$main_pics->photo_14);
    }
    if($main_pics->photo_15!=null)
    {
        unlink($path.$main_pics->photo_15);
    }
    if($main_pics->photo_16!=null)
    {
        unlink($path.$main_pics->photo_16);
    }
    if($main_pics->photo_17!=null)
    {
        unlink($path.$main_pics->photo_17);
    }
    if($main_pics->photo_18!=null)
    {
        unlink($path.$main_pics->photo_18);
    }
    if($main_pics->photo_19!=null)
    {
        unlink($path.$main_pics->photo_19);
    }
    if($main_pics->photo_20!=null)
    {
        unlink($path.$main_pics->photo_20);
    }
    if($main_pics->photo_21!=null)
    {
        unlink($path.$main_pics->photo_21);
    }
    if($main_pics->photo_22!=null)
    {
        unlink($path.$main_pics->photo_22);
    }
    if($main_pics->photo_23!=null)
    {
        unlink($path.$main_pics->photo_23);
    }
    if($main_pics->photo_24!=null)
    {
        unlink($path.$main_pics->photo_24);
    }
    if($main_pics->photo_25!=null)
    {
        unlink($path.$main_pics->photo_25);
    }
    if($main_pics->photo_26!=null)
    {
        unlink($path.$main_pics->photo_26);
    }
    if($main_pics->photo_27!=null)
    {
        unlink($path.$main_pics->photo_27);
    }
    if($main_pics->photo_28!=null)
    {
        unlink($path.$main_pics->photo_28);
    }
    if($main_pics->photo_29!=null)
    {
        unlink($path.$main_pics->photo_29);
    }
    if($main_pics->photo_30!=null)
    {
        unlink($path.$main_pics->photo_30);
    }
}
///////////////
foreach ($photos_30H  as $main_pics) {
    if($main_pics->photo_1!=null)
    {
        unlink($path.$main_pics->photo_1);
    }
    if($main_pics->photo_2!=null)
    {
        unlink($path.$main_pics->photo_2);
    }
    if($main_pics->photo_3!=null)
    {
        unlink($path.$main_pics->photo_3);
    }
    if($main_pics->photo_4!=null)
    {
        unlink($path.$main_pics->photo_4);
    }
    if($main_pics->photo_5!=null)
    {
        unlink($path.$main_pics->photo_5);
    }
    if($main_pics->photo_6!=null)
    {
        unlink($path.$main_pics->photo_6);
    }
    if($main_pics->photo_7!=null)
    {
        unlink($path.$main_pics->photo_7);
    }
    if($main_pics->photo_8!=null)
    {
        unlink($path.$main_pics->photo_8);
    }
    if($main_pics->photo_9!=null)
    {
        unlink($path.$main_pics->photo_9);
    }
    if($main_pics->photo_10!=null)
    {
        unlink($path.$main_pics->photo_10);
    }
    if($main_pics->photo_11!=null)
    {
        unlink($path.$main_pics->photo_12);
    }
    if($main_pics->photo_13!=null)
    {
        unlink($path.$main_pics->photo_13);
    }
    if($main_pics->photo_14!=null)
    {
        unlink($path.$main_pics->photo_14);
    }
    if($main_pics->photo_15!=null)
    {
        unlink($path.$main_pics->photo_15);
    }
    if($main_pics->photo_16!=null)
    {
        unlink($path.$main_pics->photo_16);
    }
    if($main_pics->photo_17!=null)
    {
        unlink($path.$main_pics->photo_17);
    }
    if($main_pics->photo_18!=null)
    {
        unlink($path.$main_pics->photo_18);
    }
    if($main_pics->photo_19!=null)
    {
        unlink($path.$main_pics->photo_19);
    }
    if($main_pics->photo_20!=null)
    {
        unlink($path.$main_pics->photo_20);
    }
    if($main_pics->photo_21!=null)
    {
        unlink($path.$main_pics->photo_21);
    }
    if($main_pics->photo_22!=null)
    {
        unlink($path.$main_pics->photo_22);
    }
    if($main_pics->photo_23!=null)
    {
        unlink($path.$main_pics->photo_23);
    }
    if($main_pics->photo_24!=null)
    {
        unlink($path.$main_pics->photo_24);
    }
    if($main_pics->photo_25!=null)
    {
        unlink($path.$main_pics->photo_25);
    }
    if($main_pics->photo_26!=null)
    {
        unlink($path.$main_pics->photo_26);
    }
    if($main_pics->photo_27!=null)
    {
        unlink($path.$main_pics->photo_27);
    }
    if($main_pics->photo_28!=null)
    {
        unlink($path.$main_pics->photo_28);
    }
    if($main_pics->photo_29!=null)
    {
        unlink($path.$main_pics->photo_29);
    }
    if($main_pics->photo_30!=null)
    {
        unlink($path.$main_pics->photo_30);
    }
}



    Deficiency::where("application_id", $id)->delete();
    Comment::where('application_id', $id)->delete();
    Photo::where('application_id', $id)->delete();






        return redirect()->back();
    }
    function viewApplicationView($id) {
//        $application = Application::find($id);
//        $floorplans = FloorPlan::all();
//        $inspectors = User::where('role_id', 3)->get();
//        $all_50 = "";
//        $all_100 = "";
//        $deficiency = "";
//        $photo = "";















        $application = Application::find($id);
        $comments = Comment::where('application_id', $id)->orderBy('id', 'DESC')->get();
        $floorplans = FloorPlan::all();
        $inspectors = User::where('role_id', 3)->get();
        $all_50 = "";
        $all_100 = "";
        $all_Rehab = "";
        $deficiency = "";
        $photo = "";
        $inspector_details = $application->inspector_id ? User::find($application->inspector_id) : "NONE";
        $requester_email = $application->requester_id ? User::find($application->requester_id)->email : $application->requester_email;
        Status50::where('application_id', $id)->update([
            'date_inspected' => $application->scheduled_inspection_date,
            'inspector' => $inspector_details == "NONE" ? null : $inspector_details->name,
            'inspector_email' => $inspector_details == "NONE" ? null : $inspector_details->email,
            'requester_email' => $requester_email,
            'superintendent' => $application->supervisor_name,
            'superintendent_email' => $application->supervisor_email,
            'superintendent_phone' => $application->supervisor_phone,
        ]);

        Status100::where('application_id', $id)->update([
            'date_inspected' => $application->scheduled_inspection_date,
            'inspector' => $inspector_details == "NONE" ? null : $inspector_details->name,
            'inspector_email' => $inspector_details == "NONE" ? null : $inspector_details->email,
            'requester_email' => $requester_email,
            'superintendent' => $application->supervisor_name,
            'superintendent_email' => $application->supervisor_email,
            'superintendent_phone' => $application->supervisor_phone,
        ]);

        if(count(StatusRehab::where('application_id', $application->id)->get()) > 0) {
            StatusRehab::where('application_id', $id)->update([
                'date_inspected' => $application->scheduled_inspection_date,
                'inspector' => $inspector_details == "NONE" ? null : $inspector_details->name,
                'inspector_email' => $inspector_details == "NONE" ? null : $inspector_details->email,
                'requester_email' => $requester_email,
                'superintendent' => $application->supervisor_name,
                'superintendent_email' => $application->supervisor_email,
                'superintendent_phone' => $application->supervisor_phone,
            ]);
        }

        if ($application->inspection_type == '50%') {
            $all_50s = Status50::where('application_id', $application->id)->get();
            if(count($all_50s) > 0) {
//                Status50::where('id', $all_50s[0]->id)->update([
//                    ''
//                ]);
                $all_50 = Status50::find($all_50s[0]->id);
            }
            $photo = Photo::where([
                ['application_id', $application->id],
                ['type', '50%']
            ])->get();

            if(count($photo) == 1) {
                $photo = Photo::find($photo[0]->id);
            } else {
                $photo = "";
            }

            $deficiency = Deficiency::where([
                ['application_id', $application->id],
                ['type', '50%']
            ])->get();

            if(count($deficiency) == 1) {
                $deficiency = Deficiency::find($deficiency[0]->id);
            } else {
                $deficiency = "";
            }
        }
        else if ($application->inspection_type == 'REHAB') {
            $all_Rehabs = StatusRehab::where('application_id', $application->id)->get();
            if(count($all_Rehabs) > 0) {
                $all_Rehab = StatusRehab::find($all_Rehabs[0]->id);
            }
            $photo = Photo::where([
                ['application_id', $application->id],
                ['type', 'Rehab']
            ])->get();

            if(count($photo) == 1) {
                $photo = Photo::find($photo[0]->id);
            } else {
                $photo = "";
            }

            $deficiency = Deficiency::where([
                ['application_id', $application->id],
                ['type', 'Rehab']
            ])->get();

            if(count($deficiency) == 1) {
                $deficiency = Deficiency::find($deficiency[0]->id);
            } else {
                $deficiency = "";
            }
        }
        else {
            $all_100s = Status100::where('application_id', $application->id)->get();
            if(count($all_100s) > 0) {
                $all_100 = Status100::find($all_100s[0]->id);
            }

            $photo = Photo::where([
                ['application_id', $application->id],
                ['type', '100%']
            ])->get();

            if(count($photo) == 1) {
                $photo = Photo::find($photo[0]->id);
            } else {
                $photo = "";
            }

            $deficiency = Deficiency::where([
                ['application_id', $application->id],
                ['type', '100%']
            ])->get();

            if(count($deficiency) == 1) {
                $deficiency = Deficiency::find($deficiency[0]->id);
            } else {
                $deficiency = "";
            }
        }

//        if ($application->inspection_type == '50%') {
//            $all_50s = Status50::where('application_id', $application->id)->get();
//            if(count($all_50s) > 0) {
//                $all_50 = Status50::find($all_50s[0]->id);
//            }
//            $photo = Photo::where([
//                ['application_id', $application->id],
//                ['type', '50%']
//            ])->get();
//
//            if(count($photo) == 1) {
//                $photo = Photo::find($photo[0]->id);
//            } else {
//                $photo = "";
//            }
//
//            $deficiency = Deficiency::where([
//                ['application_id', $application->id],
//                ['type', '50%']
//            ])->get();
//
//            if(count($deficiency) == 1) {
//                $deficiency = Deficiency::find($deficiency[0]->id);
//            } else {
//                $deficiency = "";
//            }
//        }
//        else {
//            $all_100s = Status100::where('application_id', $application->id)->get();
//            if(count($all_100s) > 0) {
//                $all_100 = Status100::find($all_100s[0]->id);
//            }
//
//            $photo = Photo::where([
//                ['application_id', $application->id],
//                ['type', '50%']
//            ])->get();
//
//            if(count($photo) == 1) {
//                $photo = Photo::find($photo[0]->id);
//            } else {
//                $photo = "";
//            }
//
//            $deficiency = Deficiency::where([
//                ['application_id', $application->id],
//                ['type', '50%']
//            ])->get();
//
//            if(count($deficiency) == 1) {
//                $deficiency = Deficiency::find($deficiency[0]->id);
//            } else {
//                $deficiency = "";
//            }
//        }
//        $comments = Comment::where('application_id', $id)->orderBy('id', 'DESC')->get();
        return view('viewApplication', [
            'application' => $application,
            'floorplans' => $floorplans,
            'inspectors' => $inspectors,
            'all_50' => $all_50,
            'all_100' => $all_100,
            'all_Rehab' => $all_Rehab,
            'photo' => $photo,
            'deficiency' => $deficiency,
            'comments' => $comments
        ]);
    }

    function createApplication(Request $request) {

        $document_1 = null;
        $document_2 = null;
        $document_3 = null;
        $document_4 = null;
        $document_5 = null;
        $document_6 = null;
        $document_7 = null;
        $document_8 = null;
        $document_file_1 = null;
        $document_file_2 = null;
        $document_file_3 = null;
        $document_file_4 = null;
        $document_file_5 = null;
        $document_file_6 = null;
        $document_file_7 = null;
        $document_file_8 = null;
        if(Auth::user()->role_id == 1) {
            $company_id = Auth::user()->company_id;
        } else {
            $company = User::where('email', $request->input('requester_email_1'))->get();
            if(count($company) > 1) {
                $company_id = $company[0]->company_id;
            } else {
                $company_id = null;
            }
        }

        $application = Application::create([
            'company_id' => $company_id,
            'document_1' => $document_1,
            'document_file_1' => $document_file_1,
            'document_2' => $document_2,
            'document_file_2' => $document_file_2,
            'document_3' => $document_3,
            'document_file_3' => $document_file_3,
            'document_4' => $document_4,
            'document_file_4' => $document_file_4,
            'document_5' => $document_5,
            'document_file_5' => $document_file_5,
            'document_6' => $document_6,
            'document_file_6' => $document_file_6,
            'document_7' => $document_7,
            'document_file_7' => $document_file_7,
            'document_8' => $document_8,
            'document_file_8' => $document_file_8,
            'hriq_id' => $request->input('hriq_id'),
            'submitted_glo' => $request->input('submitted_to_glo'),
            'date_glo_submission' => $request->input('date_glo_submission'),
            'applicant_name' => $request->input('applicant_name'),
            'applicant_address' => $request->input('applicant_street_address'),
            'applicant_city' => $request->input('applicant_city'),
            'applicant_county' => $request->input('applicant_county'),
            'requester_id' => Auth::user()->id,
            'requester_name' => $request->input('requester_name'),
            'requester_email' => $request->input('requester_email_1'),
            'requester_phone' => $request->input('requester_phone'),
            'company' => $request->input('company'),
            'requested_date' => $request->input('requested_date'),
            'requested_time' => $request->input('requested_time'),
            'construction_type' => $request->input('construction_type'),
            'floor_plan' => $request->input('floor_plan'),
            'inspection_type' => $request->input('inspection_type'),
            'region' => $request->input('region'),
            'supervisor_name' => $request->input('onsite_supervisor_name'),
            'supervisor_email' => $request->input('onsite_supervisor_email'),
            'supervisor_phone' => $request->input('onsite_supervisor_phone'),
        ]);

            $id = $application['id'];
            $hriq_id= $application['hriq_id'];

        if ($request->hasFile('document_files1')) {
            if($request->input('document_names1')) {

                $extension = $request->file('document_files1')->getClientMimeType();

                if($extension == 'image/jpeg' || $extension == 'image/png'){
                    $document_1 = $request->input('document_names1');
                   $photoName =  $this->imageConvertAsPdf($request->file('document_files1'),$id);



                }
                else{
                    $document_1 = $request->input('document_names1');
                    $photoNames = $request->document_files1->storeAs('public/uploads',$hriq_id."_".$id."_". $request->document_files1->getClientOriginalName());

                    $photoName = str_replace($hriq_id."_".$id."_" , '',   $photoNames);

                }

               $document_file_1 = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName);

            }
        }

        if ($request->hasFile('document_files2')) {
            if($request->input('document_names2')) {

                $extension = $request->file('document_files2')->getClientMimeType();

                if($extension == 'image/jpeg' || $extension == 'image/png'){
                    $document_2 = $request->input('document_names2');
                    $photoName = $this->imageConvertAsPdf($request->file('document_files2'),$id);
                }
                else{

                    $document_2 = $request->input('document_names2');
                    $photoNames = $request->document_files2->storeAs('public/uploads',  $hriq_id."_".$id."_".$request->document_files2->getClientOriginalName());
                    $photoName = str_replace($hriq_id."_".$id."_" , '',   $photoNames);
                }

                $document_file_2 = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName);
            }
        }

        if ($request->hasFile('document_files3')) {
            if($request->input('document_names3')) {

                $extension = $request->file('document_files3')->getClientMimeType();

                if($extension == 'image/jpeg' || $extension == 'image/png'){
                    $document_3 = $request->input('document_names3');
                    $photoName = $this->imageConvertAsPdf($request->file('document_files3'),$id);
                }
                else{

                    $document_3 = $request->input('document_names3');
                    $photoNames = $request->document_files3->storeAs('public/uploads',  $request->input('hriq_id')."_".$id."_".$request->document_files3->getClientOriginalName());
                    $photoName = str_replace($request->input('hriq_id')."_".$id."_" , '',   $photoNames);
                }

                $document_file_3 = str_replace('public/uploads/', '', $request->input('hriq_id')."_".$id."_". $photoName);
            }
        }

        if ($request->hasFile('document_files4')) {
            if($request->input('document_names4')) {

                $extension = $request->file('document_files4')->getClientMimeType();

                if($extension == 'image/jpeg' || $extension == 'image/png'){
                    $document_4 = $request->input('document_names4');
                    $photoName = $this->imageConvertAsPdf($request->file('document_files4'),$id);
                }else{
                    $document_4 = $request->input('document_names4');
                    $photoNames = $request->document_files4->storeAs('public/uploads', $request->input('hriq_id')."_".$id."_".$request->document_files4->getClientOriginalName());
                    $photoName = str_replace($request->input('hriq_id')."_".$id."_" , '',   $photoNames);
                }

                $document_file_4 = str_replace('public/uploads/', '',  $request->input('hriq_id')."_".$id."_". $photoName);
            }
        }

        if ($request->hasFile('document_files5')) {
            if($request->input('document_names5')) {

                $extension = $request->file('document_files5')->getClientMimeType();

                if($extension == 'image/jpeg' || $extension == 'image/png'){
                    $document_5 = $request->input('document_names5');
                    $photoName = $this->imageConvertAsPdf($request->file('document_files5'),$id);
                }else{
                    $document_5 = $request->input('document_names5');
                    $photoNames = $request->document_files5->storeAs('public/uploads',$request->input('hriq_id')."_".$id."_". $request->document_files5->getClientOriginalName());
                    $photoName = str_replace($request->input('hriq_id')."_".$id."_" , '',   $photoNames);
                }

                $document_file_5 = str_replace('public/uploads/', '', $request->input('hriq_id')."_".$id."_". $photoName);
            }
        }

        if ($request->hasFile('document_files6')) {
            if($request->input('document_names6')) {

                $extension = $request->file('document_files6')->getClientMimeType();

                if($extension == 'image/jpeg' || $extension == 'image/png'){
                    $document_6 = $request->input('document_names6');
                    $photoName = $this->imageConvertAsPdf($request->file('document_files6'),$id);
                }else{
                    $document_6 = $request->input('document_names6');
                    $photoNames = $request->document_files6->storeAs('public/uploads',$request->input('hriq_id')."_".$id."_". $request->document_files6->getClientOriginalName());
                    $photoName = str_replace($request->input('hriq_id')."_".$id."_" , '',   $photoNames);
                }

                $document_file_6 = str_replace('public/uploads/', '',  $request->input('hriq_id')."_".$id."_". $photoName);
            }
        }

        if ($request->hasFile('document_files7')) {
            if($request->input('document_names7')) {

                $extension = $request->file('document_files7')->getClientMimeType();

                if($extension == 'image/jpeg' || $extension == 'image/png'){
                    $document_7 = $request->input('document_names7');
                    $photoName = $this->imageConvertAsPdf($request->file('document_files7'),$id);
                }else{
                    $document_7 = $request->input('document_names7');
                    $photoNames = $request->document_files7->storeAs('public/uploads', $request->input('hriq_id')."_".$id."_". $request->document_files7->getClientOriginalName());
                    $photoName = str_replace($request->input('hriq_id')."_".$id."_" , '',   $photoNames);
                }

                $document_file_7 = str_replace('public/uploads/', '', $request->input('hriq_id')."_".$id."_". $photoName);
            }
        }

        if ($request->hasFile('document_files8')) {
            if($request->input('document_names8')) {

                $extension = $request->file('document_files8')->getClientMimeType();

                if($extension == 'image/jpeg' || $extension == 'image/png'){
                    $document_8 = $request->input('document_names8');
                    $photoName = $this->imageConvertAsPdf($request->file('document_files8'),$id);
                }else{
                  $document_8 = $request->input('document_names8');
                  $photoNames = $request->document_files8->storeAs('public/uploads',$request->input('hriq_id')."_".$id."_". $request->document_files8->getClientOriginalName());
                  $photoName = str_replace($request->input('hriq_id')."_".$id."_" , '',   $photoNames);
                }

                $document_file_8 = str_replace('public/uploads/', '',  $request->input('hriq_id')."_".$id."_". $photoName);
            }
        }

        Application::where('id', $id)->update([
            'document_1' => $document_1,
            'document_file_1' => $document_file_1,
            'document_2' => $document_2,
            'document_file_2' => $document_file_2,
            'document_3' => $document_3,
            'document_file_3' => $document_file_3,
            'document_4' => $document_4,
            'document_file_4' => $document_file_4,
            'document_5' => $document_5,
            'document_file_5' => $document_file_5,
            'document_6' => $document_6,
            'document_file_6' => $document_file_6,
            'document_7' => $document_7,
            'document_file_7' => $document_file_7,
            'document_8' => $document_8,
            'document_file_8' => $document_file_8,
        ]);
























        if(trim($request->input("comments")) || $request->hasFile('comment_attachment')) {
            $comment_attachment = null;
            if ($request->hasFile('comment_attachment')) {
                $comment_attachment = $request->input('comment_attachment');
                $photoName = $request->comment_attachment->storeAs('public/uploads', date('YmdHis').$request->comment_attachment->getClientOriginalName());
                $comment_attachment = str_replace('public/uploads/', '', $photoName);
            }

            Comment::create([
                'application_id' => $application['id'],
                'user_id' => Auth::user()->id,
                'comments' => $request->input("comments"),
                'datetime' => date('Y-m-d H:i:s'),
                'attachment' => $comment_attachment
            ]);
        }

        if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2) {
            Status50::create([
                'application_id' => $application['id'],
                'superintendent' => $request->input('onsite_supervisor_name'),
                'superintendent_email' => $request->input('onsite_supervisor_email'),
                'requester_email' => $request->input('requester_email_1'),
                'superintendent_phone' => $request->input('onsite_supervisor_phone'),
                'general_inspection' => 'N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A',
                'exterior_inspection' => 'N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A',
                'interior_inspection' => 'N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A',
                'window_door_inspection' => 'N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A',
                'roof_attic_inspection' => 'N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A',

            ]);

            Status100::create([
                'application_id' => $application['id'],
                'superintendent' => $request->input('onsite_supervisor_name'),
                'superintendent_email' => $request->input('onsite_supervisor_email'),
                'requester_email' => $request->input('requester_email_1'),
                'superintendent_phone' => $request->input('onsite_supervisor_phone'),
                'general_inspection' => 'N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A',
                'exterior_inspection' => 'N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A',
                'interior_inspection' => 'N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A',
                'electrical_inspection' => 'N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A',
                'accessibility_inspection' => 'N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A',
            ]);

            StatusRehab::create([
                'application_id' => $application['id'],
                'superintendent' => $request->input('onsite_supervisor_name'),
                'superintendent_email' => $request->input('onsite_supervisor_email'),
                'requester_email' => $request->input('requester_email_1'),
                'superintendent_phone' => $request->input('onsite_supervisor_phone'),
                'general_inspection' => 'N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A',
                'exterior_inspection' => 'N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A',
                'interior_inspection' => 'N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A',
                'electrical_inspection' => 'N/A_N/A_N/A_N/A_N/A_N/A_N/A_N/A',
                'accessibility_inspection' => 'N/A_N/A_N/A_N/A_N/A',
            ]);


////////////////

$photos[0] = null;
$photos[1] = null;
$photos[2] = null;
$photos[3] = null;
$photos[4] = null;
$photos[5] = null;
$photos[6] = null;
$photos[7] = null;
$photos[8] = null;
$photos[9] = null;
$photos[10] = null;
$photos[11] = null;
$photos[12] = null;
$photos[13] = null;
$photos[14] = null;
$photos[15] = null;
$photos[16] = null;
$photos[17] = null;
$photos[18] = null;
$photos[19] = null;
$photos[20] = null;
$photos[21] = null;
$photos[22] = null;
$photos[23] = null;
$photos[24] = null;
$photos[25] = null;
$photos[26] = null;
$photos[27] = null;
$photos[28] = null;
$photos[29] = null;



            if ($request->hasFile('photo_1_5')) {

                $photoName = $this->resizeAndSave($request->photo_1_5,$id);
                $photos[0] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName);

            }
            if ($request->hasFile('photo_2_5')){$photoName = $this->resizeAndSave($request->photo_2_5,$id);$photos[1] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
            if ($request->hasFile('photo_3_5')){$photoName = $this->resizeAndSave($request->photo_3_5,$id);$photos[2] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
            if ($request->hasFile('photo_4_5')){$photoName = $this->resizeAndSave($request->photo_4_5,$id);$photos[3] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
            if ($request->hasFile('photo_5_5')){$photoName = $this->resizeAndSave($request->photo_5_5,$id);$photos[4] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
            if ($request->hasFile('photo_6_5')){$photoName = $this->resizeAndSave($request->photo_6_5,$id);$photos[5] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
            if ($request->hasFile('photo_7_5')){$photoName = $this->resizeAndSave($request->photo_7_5,$id);$photos[6] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
            if ($request->hasFile('photo_8_5')){$photoName = $this->resizeAndSave($request->photo_8_5,$id);$photos[7] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
            if ($request->hasFile('photo_9_5')){$photoName = $this->resizeAndSave($request->photo_9_5,$id);$photos[8] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
            if ($request->hasFile('photo_10_5')){$photoName = $this->resizeAndSave($request->photo_10_5,$id);$photos[9] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
            if ($request->hasFile('photo_11_5')){$photoName = $this->resizeAndSave($request->photo_11_5,$id);$photos[10] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
            if ($request->hasFile('photo_12_5')){$photoName = $this->resizeAndSave($request->photo_12_5,$id);$photos[11] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
            if ($request->hasFile('photo_13_5')){$photoName = $this->resizeAndSave($request->photo_13_5,$id);$photos[12] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
            if ($request->hasFile('photo_14_5')){$photoName = $this->resizeAndSave($request->photo_14_5,$id);$photos[13] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
            if ($request->hasFile('photo_15_5')){$photoName = $this->resizeAndSave($request->photo_15_5,$id);$photos[14] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
            if ($request->hasFile('photo_16_5')){$photoName = $this->resizeAndSave($request->photo_16_5,$id);$photos[15] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
            if ($request->hasFile('photo_17_5')){$photoName = $this->resizeAndSave($request->photo_17_5,$id);$photos[16] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
            if ($request->hasFile('photo_18_5')){$photoName = $this->resizeAndSave($request->photo_18_5,$id);$photos[17] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
            if ($request->hasFile('photo_19_5')){$photoName = $this->resizeAndSave($request->photo_19_5,$id);$photos[18] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
            if ($request->hasFile('photo_20_5')){$photoName = $this->resizeAndSave($request->photo_20_5,$id);$photos[19] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
            if ($request->hasFile('photo_21_5')){$photoName = $this->resizeAndSave($request->photo_21_5,$id);$photos[20] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
            if ($request->hasFile('photo_22_5')){$photoName = $this->resizeAndSave($request->photo_22_5,$id);$photos[21] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
            if ($request->hasFile('photo_23_5')){$photoName = $this->resizeAndSave($request->photo_23_5,$id);$photos[22] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
            if ($request->hasFile('photo_24_5')){$photoName = $this->resizeAndSave($request->photo_24_5,$id);$photos[23] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
            if ($request->hasFile('photo_25_5')){$photoName = $this->resizeAndSave($request->photo_25_5,$id);$photos[24] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
            if ($request->hasFile('photo_26_5')){$photoName = $this->resizeAndSave($request->photo_26_5,$id);$photos[25] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
            if ($request->hasFile('photo_27_5')){$photoName = $this->resizeAndSave($request->photo_27_5,$id);$photos[26] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
            if ($request->hasFile('photo_28_5')){$photoName = $this->resizeAndSave($request->photo_28_5,$id);$photos[27] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
            if ($request->hasFile('photo_29_5')){$photoName = $this->resizeAndSave($request->photo_29_5,$id);$photos[28] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
            if ($request->hasFile('photo_30_5')){$photoName = $this->resizeAndSave($request->photo_30_5,$id);$photos[29] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }



            Photo::create([
                'application_id' => $application['id'],
                'type' => '50%',
                'photo_1' => $photos[0],
                'photo_2' => $photos[1],
                    'photo_3' => $photos[2],
                    'photo_4' => $photos[3],
                    'photo_5' => $photos[4],
                    'photo_6' => $photos[5],
                    'photo_7' => $photos[6],
                    'photo_8' => $photos[7],
                    'photo_9' => $photos[8],
                    'photo_10' => $photos[9],
                    'photo_11' => $photos[10],
                    'photo_12' => $photos[11],
                    'photo_13' => $photos[12],
                    'photo_14' => $photos[13],
                    'photo_15' => $photos[14],
                    'photo_16' => $photos[15],
                    'photo_17' => $photos[16],
                    'photo_18' => $photos[17],
                    'photo_19' => $photos[18],
                    'photo_20' => $photos[19],
                    'photo_21' => $photos[20],
                    'photo_22' => $photos[21],
                    'photo_23' => $photos[22],
                    'photo_24' => $photos[23],
                    'photo_25' => $photos[24],
                    'photo_26' => $photos[25],
                    'photo_27' => $photos[26],
                    'photo_28' => $photos[27],
                    'photo_29' => $photos[28],
                    'photo_30' => $photos[29]
            ]);

//////////////
if ($request->hasFile('photo_1')){$photoName = $this->resizeAndSave($request->photo_1,$id);$photos[0] = str_replace('public/uploads/', ' ', $hriq_id."_".$id."_". $photoName); }
if ($request->hasFile('photo_2')){$photoName = $this->resizeAndSave($request->photo_2,$id);$photos[1] = str_replace('public/uploads/', ' ', $hriq_id."_".$id."_". $photoName); }
if ($request->hasFile('photo_3')){$photoName = $this->resizeAndSave($request->photo_3,$id);$photos[2] = str_replace('public/uploads/', ' ', $hriq_id."_".$id."_". $photoName); }
if ($request->hasFile('photo_4')){$photoName = $this->resizeAndSave($request->photo_4,$id);$photos[3] = str_replace('public/uploads/', ' ', $hriq_id."_".$id."_". $photoName); }
if ($request->hasFile('photo_5')){$photoName = $this->resizeAndSave($request->photo_5,$id);$photos[4] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
if ($request->hasFile('photo_6')){$photoName = $this->resizeAndSave($request->photo_6,$id);$photos[5] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
if ($request->hasFile('photo_7')){$photoName = $this->resizeAndSave($request->photo_7,$id);$photos[6] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
if ($request->hasFile('photo_8')){$photoName = $this->resizeAndSave($request->photo_8,$id);$photos[7] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
if ($request->hasFile('photo_9')){$photoName = $this->resizeAndSave($request->photo_9,$id);$photos[8] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
if ($request->hasFile('photo_10')){$photoName = $this->resizeAndSave($request->photo_10,$id);$photos[9] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
if ($request->hasFile('photo_11')){$photoName = $this->resizeAndSave($request->photo_11,$id);$photos[10] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
if ($request->hasFile('photo_12')){$photoName = $this->resizeAndSave($request->photo_12,$id);$photos[11] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
if ($request->hasFile('photo_13')){$photoName = $this->resizeAndSave($request->photo_13,$id);$photos[12] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
if ($request->hasFile('photo_14')){$photoName = $this->resizeAndSave($request->photo_14,$id);$photos[13] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
if ($request->hasFile('photo_15')){$photoName = $this->resizeAndSave($request->photo_15,$id);$photos[14] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
if ($request->hasFile('photo_16')){$photoName = $this->resizeAndSave($request->photo_16,$id);$photos[15] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
if ($request->hasFile('photo_17')){$photoName = $this->resizeAndSave($request->photo_17,$id);$photos[16] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
if ($request->hasFile('photo_18')){$photoName = $this->resizeAndSave($request->photo_18,$id);$photos[17] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
if ($request->hasFile('photo_19')){$photoName = $this->resizeAndSave($request->photo_19,$id);$photos[18] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
if ($request->hasFile('photo_20')){$photoName = $this->resizeAndSave($request->photo_20,$id);$photos[19] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
if ($request->hasFile('photo_21')){$photoName = $this->resizeAndSave($request->photo_21,$id);$photos[20] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
if ($request->hasFile('photo_22')){$photoName = $this->resizeAndSave($request->photo_22,$id);$photos[21] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
if ($request->hasFile('photo_23')){$photoName = $this->resizeAndSave($request->photo_23,$id);$photos[22] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
if ($request->hasFile('photo_24')){$photoName = $this->resizeAndSave($request->photo_24,$id);$photos[23] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
if ($request->hasFile('photo_25')){$photoName = $this->resizeAndSave($request->photo_25,$id);$photos[24] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
if ($request->hasFile('photo_26')){$photoName = $this->resizeAndSave($request->photo_26,$id);$photos[25] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
if ($request->hasFile('photo_27')){$photoName = $this->resizeAndSave($request->photo_27,$id);$photos[26] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
if ($request->hasFile('photo_28')){$photoName = $this->resizeAndSave($request->photo_28,$id);$photos[27] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
if ($request->hasFile('photo_29')){$photoName = $this->resizeAndSave($request->photo_29,$id);$photos[28] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
if ($request->hasFile('photo_30')){$photoName = $this->resizeAndSave($request->photo_30,$id);$photos[29] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }






            Photo::create([
                'application_id' => $application['id'],
                'type' => '100%',
                'photo_1' => $photos[0],
                'photo_2' => $photos[1],
                    'photo_3' => $photos[2],
                    'photo_4' => $photos[3],
                    'photo_5' => $photos[4],
                    'photo_6' => $photos[5],
                    'photo_7' => $photos[6],
                    'photo_8' => $photos[7],
                    'photo_9' => $photos[8],
                    'photo_10' => $photos[9],
                    'photo_11' => $photos[10],
                    'photo_12' => $photos[11],
                    'photo_13' => $photos[12],
                    'photo_14' => $photos[13],
                    'photo_15' => $photos[14],
                    'photo_16' => $photos[15],
                    'photo_17' => $photos[16],
                    'photo_18' => $photos[17],
                    'photo_19' => $photos[18],
                    'photo_20' => $photos[19],
                    'photo_21' => $photos[20],
                    'photo_22' => $photos[21],
                    'photo_23' => $photos[22],
                    'photo_24' => $photos[23],
                    'photo_25' => $photos[24],
                    'photo_26' => $photos[25],
                    'photo_27' => $photos[26],
                    'photo_28' => $photos[27],
                    'photo_29' => $photos[28],
                    'photo_30' => $photos[29]
            ]);





///////////////////




///////////
if ($request->hasFile('photo_1_R')){$photoName = $this->resizeAndSave($request->photo_1_R,$id);$photos[0] = str_replace('public/uploads/', ' ', $hriq_id."_".$id."_". $photoName); }
if ($request->hasFile('photo_2_R')){$photoName = $this->resizeAndSave($request->photo_2_R,$id);$photos[1] = str_replace('public/uploads/', ' ', $hriq_id."_".$id."_". $photoName); }
if ($request->hasFile('photo_3_R')){$photoName = $this->resizeAndSave($request->photo_3_R,$id);$photos[2] = str_replace('public/uploads/', ' ', $hriq_id."_".$id."_". $photoName); }
if ($request->hasFile('photo_4_R')){$photoName = $this->resizeAndSave($request->photo_4_R,$id);$photos[3] = str_replace('public/uploads/', ' ', $hriq_id."_".$id."_". $photoName); }
if ($request->hasFile('photo_5_R')){$photoName = $this->resizeAndSave($request->photo_5_R,$id);$photos[4] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
if ($request->hasFile('photo_6_R')){$photoName = $this->resizeAndSave($request->photo_6_R,$id);$photos[5] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
if ($request->hasFile('photo_7_R')){$photoName = $this->resizeAndSave($request->photo_7_R,$id);$photos[6] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
if ($request->hasFile('photo_8_R')){$photoName = $this->resizeAndSave($request->photo_8_R,$id);$photos[7] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
if ($request->hasFile('photo_9_R')){$photoName = $this->resizeAndSave($request->photo_9_R,$id);$photos[8] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
if ($request->hasFile('photo_10_R')){$photoName = $this->resizeAndSave($request->photo_10_R,$id);$photos[9] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
if ($request->hasFile('photo_11_R')){$photoName = $this->resizeAndSave($request->photo_11_R,$id);$photos[10] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
if ($request->hasFile('photo_12_R')){$photoName = $this->resizeAndSave($request->photo_12_R,$id);$photos[11] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
if ($request->hasFile('photo_13_R')){$photoName = $this->resizeAndSave($request->photo_13_R,$id);$photos[12] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
if ($request->hasFile('photo_14_R')){$photoName = $this->resizeAndSave($request->photo_14_R,$id);$photos[13] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
if ($request->hasFile('photo_15_R')){$photoName = $this->resizeAndSave($request->photo_15_R,$id);$photos[14] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
if ($request->hasFile('photo_16_R')){$photoName = $this->resizeAndSave($request->photo_16_R,$id);$photos[15] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
if ($request->hasFile('photo_17_R')){$photoName = $this->resizeAndSave($request->photo_17_R,$id);$photos[16] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
if ($request->hasFile('photo_18_R')){$photoName = $this->resizeAndSave($request->photo_18_R,$id);$photos[17] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
if ($request->hasFile('photo_19_R')){$photoName = $this->resizeAndSave($request->photo_19_R,$id);$photos[18] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
if ($request->hasFile('photo_20_R')){$photoName = $this->resizeAndSave($request->photo_20_R,$id);$photos[19] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
if ($request->hasFile('photo_21_R')){$photoName = $this->resizeAndSave($request->photo_21_R,$id);$photos[20] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
if ($request->hasFile('photo_22_R')){$photoName = $this->resizeAndSave($request->photo_22_R,$id);$photos[21] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
if ($request->hasFile('photo_23_R')){$photoName = $this->resizeAndSave($request->photo_23_R,$id);$photos[22] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
if ($request->hasFile('photo_24_R')){$photoName = $this->resizeAndSave($request->photo_24_R,$id);$photos[23] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
if ($request->hasFile('photo_25_R')){$photoName = $this->resizeAndSave($request->photo_25_R,$id);$photos[24] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
if ($request->hasFile('photo_26_R')){$photoName = $this->resizeAndSave($request->photo_26_R,$id);$photos[25] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
if ($request->hasFile('photo_27_R')){$photoName = $this->resizeAndSave($request->photo_27_R,$id);$photos[26] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
if ($request->hasFile('photo_28_R')){$photoName = $this->resizeAndSave($request->photo_28_R,$id);$photos[27] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
if ($request->hasFile('photo_29_R')){$photoName = $this->resizeAndSave($request->photo_29_R,$id);$photos[28] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }
if ($request->hasFile('photo_30_R')){$photoName = $this->resizeAndSave($request->photo_30_R,$id);$photos[29] = str_replace('public/uploads/', '', $hriq_id."_".$id."_". $photoName); }




            Photo::create([
                'application_id' => $application['id'],
                'type' => 'Rehab',
                'photo_1' => $photos[0],
                'photo_2' => $photos[1],
                    'photo_3' => $photos[2],
                    'photo_4' => $photos[3],
                    'photo_5' => $photos[4],
                    'photo_6' => $photos[5],
                    'photo_7' => $photos[6],
                    'photo_8' => $photos[7],
                    'photo_9' => $photos[8],
                    'photo_10' => $photos[9],
                    'photo_11' => $photos[10],
                    'photo_12' => $photos[11],
                    'photo_13' => $photos[12],
                    'photo_14' => $photos[13],
                    'photo_15' => $photos[14],
                    'photo_16' => $photos[15],
                    'photo_17' => $photos[16],
                    'photo_18' => $photos[17],
                    'photo_19' => $photos[18],
                    'photo_20' => $photos[19],
                    'photo_21' => $photos[20],
                    'photo_22' => $photos[21],
                    'photo_23' => $photos[22],
                    'photo_24' => $photos[23],
                    'photo_25' => $photos[24],
                    'photo_26' => $photos[25],
                    'photo_27' => $photos[26],
                    'photo_28' => $photos[27],
                    'photo_29' => $photos[28],
                    'photo_30' => $photos[29]
            ]);

////////




















            Deficiency::create([
                'application_id' => $application['id'],
                'type' => '50%'
            ]);

            Deficiency::create([
                'application_id' => $application['id'],
                'type' => '100%'
            ]);

            Deficiency::create([
                'application_id' => $application['id'],
                'type' => 'Rehab'
            ]);
        }

        Auditor::create([
            'user_id' => Auth::user()->id,
            'notification' => '<a href="'.url('admin/view-application/'.$application['id']).'">HRIQ ID '.$application['hriq_id'].'</a> New Application Created',
            'date' => strtotime(date('Y-m-d H:i:s')),
            'status' => 'unseen'
        ]);


        $admins = User::where([
            ['role_id', 2],
            ['status', 1]
        ])->get();


        foreach ($admins as $admin) {
            dispatch(new CreateApplicationJob($admin->email, $application['id']));
        }












//New changes 20-06-2022
       session()->flash('message', 'application_created');
       $submitType = $request->input('submitType');
       if($submitType == 'saveClose') {
           return Redirect::to('/');
       } else if($submitType == 'saveContinue') {
           if(Auth::user()->role_id == 1) {
               return Redirect::to('contractor/edit-application/'.$application['id']);
           } else if(Auth::user()->role_id == 2) {
               return Redirect::to('admin/edit-application/'.$application['id']);
           } else {
               return Redirect::to('inspector/edit-application/'.$application['id']);
           }
       } else if($submitType == 'savePrint') {
           if($request->input('inspection_type') == '50%') {
               $this->generatepdf($application['id']);
               return Redirect::to('/');
           } else if($request->input('inspection_type') == '100%') {
            $this->generatepdfs($application['id']);
            return Redirect::to('/');
           }
           else if($request->input('inspection_type') == '') {

            return Redirect::to('/');
           }
           else {
               $this->generatepdfr($application['id']);
               return Redirect::to('/');
           }
       }
//        if(Auth::user()->role_id == 1) {
//            return Redirect::to('contractor/application');
//        } else if(Auth::user()->role_id == 2) {
//            return Redirect::to('admin/application');
//        } else {
//            return Redirect::to('inspector/application');
//        }

}
///////////////////////////////////new www
    function updateApplication(Request $request) {
        $id = $request->input('id');
        $old_data = Application::find($id);

        $inspectorChangeEmail = 0;
        $statusChangeEmail = 0;

        Status50::where('application_id', $id)->update([
            'superintendent' => $request->input('onsite_supervisor_name'),
            'superintendent_email' => $request->input('onsite_supervisor_email'),
            'requester_email' => $request->input('requester_email_1'),
            'superintendent_phone' => $request->input('onsite_supervisor_phone')
        ]);

        Status100::where('application_id', $id)->update([
            'superintendent' => $request->input('onsite_supervisor_name'),
            'superintendent_email' => $request->input('onsite_supervisor_email'),
            'requester_email' => $request->input('requester_email_1'),
            'superintendent_phone' => $request->input('onsite_supervisor_phone')
        ]);

        if(count(StatusRehab::where('application_id', $id)->get()) > 0) {
            StatusRehab::where('application_id', $id)->update([
                'superintendent' => $request->input('onsite_supervisor_name'),
                'superintendent_email' => $request->input('onsite_supervisor_email'),
                'requester_email' => $request->input('requester_email_1'),
                'superintendent_phone' => $request->input('onsite_supervisor_phone')
            ]);
        }

        if(Auth::user()->role_id == 1) {
            $document_1 = $old_data->document_1;
            $document_2 = $old_data->document_2;
            $document_3 = $old_data->document_3;
            $document_4 = $old_data->document_4;
            $document_5 = $old_data->document_5;
            $document_6 = $old_data->document_6;
            $document_7 = $old_data->document_7;
            $document_8 = $old_data->document_8;
            $document_file_1 = $old_data->document_file_1;
            $document_file_2 = $old_data->document_file_2;
            $document_file_3 = $old_data->document_file_3;
            $document_file_4 = $old_data->document_file_4;
            $document_file_5 = $old_data->document_file_5;
            $document_file_6 = $old_data->document_file_6;
            $document_file_7 = $old_data->document_file_7;
            $document_file_8 = $old_data->document_file_8;

            if($old_data->document_file_1 != null) {
                $document_1 = $request->input('document_names1');
            }

            if($old_data->document_file_2 != null) {
                $document_2 = $request->input('document_names2');
            }

            if($old_data->document_file_3 != null) {
                $document_3 = $request->input('document_names3');
            }

            if($old_data->document_file_4 != null) {
                $document_4 = $request->input('document_names4');
            }

            if($old_data->document_file_5 != null) {
                $document_5 = $request->input('document_names5');
            }

            if($old_data->document_file_6 != null) {
                $document_6 = $request->input('document_names6');
            }

            if($old_data->document_file_7 != null) {
                $document_7 = $request->input('document_names7');
            }

            if($old_data->document_file_8 != null) {
                $document_8 = $request->input('document_names8');
            }
            $doc_name = Application::find($id);
//////////////////////////////////////////////
if ($request->hasFile('document_files1')) {
    if($request->input('document_names1')) {

        $extension = $request->file('document_files1')->getClientMimeType();

        if($extension == 'image/jpeg' || $extension == 'image/png'){
            $document_1 = $request->input('document_names1');
           $photoName =  $this->imageConvertAsPdf($request->file('document_files1'),$id);


        }
        else{
            $document_1 = $request->input('document_names1');
            $photoNames = $request->document_files1->storeAs('public/uploads',  $doc_name->hriq_id."_".$doc_name->id."_". $request->document_files1->getClientOriginalName());

            $photoName = str_replace($doc_name->hriq_id."_".$doc_name->id."_" , '',   $photoNames);

        }

       $document_file_1 = str_replace('public/uploads/', '',  $doc_name->hriq_id."_".$doc_name->id."_". $photoName);

    }
}

if ($request->hasFile('document_files2')) {
    if($request->input('document_names2')) {

        $extension = $request->file('document_files2')->getClientMimeType();

        if($extension == 'image/jpeg' || $extension == 'image/png'){
            $document_2 = $request->input('document_names2');
            $photoName = $this->imageConvertAsPdf($request->file('document_files2'),$id);
        }
        else{

            $document_2 = $request->input('document_names2');
            $photoNames = $request->document_files2->storeAs('public/uploads',  $doc_name->hriq_id."_".$doc_name->id."_".$request->document_files2->getClientOriginalName());
            $photoName = str_replace($doc_name->hriq_id."_".$doc_name->id."_" , '',   $photoNames);
        }

        $document_file_2 = str_replace('public/uploads/', '',  $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
    }
}

if ($request->hasFile('document_files3')) {
    if($request->input('document_names3')) {

        $extension = $request->file('document_files3')->getClientMimeType();

        if($extension == 'image/jpeg' || $extension == 'image/png'){
            $document_3 = $request->input('document_names3');
            $photoName = $this->imageConvertAsPdf($request->file('document_files3'),$id);
        }
        else{

            $document_3 = $request->input('document_names3');
            $photoNames = $request->document_files3->storeAs('public/uploads',  $doc_name->hriq_id."_".$doc_name->id."_".$request->document_files3->getClientOriginalName());
            $photoName = str_replace($doc_name->hriq_id."_".$doc_name->id."_" , '',   $photoNames);
        }

        $document_file_3 = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
    }
}

if ($request->hasFile('document_files4')) {
    if($request->input('document_names4')) {

        $extension = $request->file('document_files4')->getClientMimeType();

        if($extension == 'image/jpeg' || $extension == 'image/png'){
            $document_4 = $request->input('document_names4');
            $photoName = $this->imageConvertAsPdf($request->file('document_files4'),$id);
        }else{
            $document_4 = $request->input('document_names4');
            $photoNames = $request->document_files4->storeAs('public/uploads', $doc_name->hriq_id."_".$doc_name->id."_".$request->document_files4->getClientOriginalName());
            $photoName = str_replace($doc_name->hriq_id."_".$doc_name->id."_" , '',   $photoNames);
        }

        $document_file_4 = str_replace('public/uploads/', '',  $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
    }
}

if ($request->hasFile('document_files5')) {
    if($request->input('document_names5')) {

        $extension = $request->file('document_files5')->getClientMimeType();

        if($extension == 'image/jpeg' || $extension == 'image/png'){
            $document_5 = $request->input('document_names5');
            $photoName = $this->imageConvertAsPdf($request->file('document_files5'),$id);
        }else{
            $document_5 = $request->input('document_names5');
            $photoNames = $request->document_files5->storeAs('public/uploads',$doc_name->hriq_id."_".$doc_name->id."_". $request->document_files5->getClientOriginalName());
            $photoName = str_replace($doc_name->hriq_id."_".$doc_name->id."_" , '',   $photoNames);
        }

        $document_file_5 = str_replace('public/uploads/', '',  $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
    }
}

if ($request->hasFile('document_files6')) {
    if($request->input('document_names6')) {

        $extension = $request->file('document_files6')->getClientMimeType();

        if($extension == 'image/jpeg' || $extension == 'image/png'){
            $document_6 = $request->input('document_names6');
            $photoName = $this->imageConvertAsPdf($request->file('document_files6'),$id);
        }else{
            $document_6 = $request->input('document_names6');
            $photoNames = $request->document_files6->storeAs('public/uploads',$doc_name->hriq_id."_".$doc_name->id."_". $request->document_files6->getClientOriginalName());
            $photoName = str_replace($doc_name->hriq_id."_".$doc_name->id."_" , '',   $photoNames);
        }

        $document_file_6 = str_replace('public/uploads/', '',  $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
    }
}

if ($request->hasFile('document_files7')) {
    if($request->input('document_names7')) {

        $extension = $request->file('document_files7')->getClientMimeType();

        if($extension == 'image/jpeg' || $extension == 'image/png'){
            $document_7 = $request->input('document_names7');
            $photoName = $this->imageConvertAsPdf($request->file('document_files7'),$id);
        }else{
            $document_7 = $request->input('document_names7');
            $photoNames = $request->document_files7->storeAs('public/uploads', $doc_name->hriq_id."_".$doc_name->id."_". $request->document_files7->getClientOriginalName());
            $photoName = str_replace($doc_name->hriq_id."_".$doc_name->id."_" , '',   $photoNames);
        }

        $document_file_7 = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
    }
}

if ($request->hasFile('document_files8')) {
    if($request->input('document_names8')) {

        $extension = $request->file('document_files8')->getClientMimeType();

        if($extension == 'image/jpeg' || $extension == 'image/png'){
            $document_8 = $request->input('document_names8');
            $photoName = $this->imageConvertAsPdf($request->file('document_files8'),$id);
        }else{
          $document_8 = $request->input('document_names8');
          $photoNames = $request->document_files8->storeAs('public/uploads',$doc_name->hriq_id."_".$doc_name->id."_". $request->document_files8->getClientOriginalName());
          $photoName = str_replace($doc_name->hriq_id."_".$doc_name->id."_" , '',   $photoNames);
        }

        $document_file_8 = str_replace('public/uploads/', '',  $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
    }
}

//////////////////////
            $application = Application::where('id', $id)->update([
                'document_1' => $document_1,
                'document_file_1' => $document_file_1,
                'document_2' => $document_2,
                'document_file_2' => $document_file_2,
                'document_3' => $document_3,
                'document_file_3' => $document_file_3,
                'document_4' => $document_4,
                'document_file_4' => $document_file_4,
                'document_5' => $document_5,
                'document_file_5' => $document_file_5,
                'document_6' => $document_6,
                'document_file_6' => $document_file_6,
                'document_7' => $document_7,
                'document_file_7' => $document_file_7,
                'document_8' => $document_8,
                'document_file_8' => $document_file_8,
                'hriq_id' => $request->input('hriq_id'),
                'submitted_glo' => $request->input('submitted_to_glo'),
                'date_glo_submission' => $request->input('date_glo_submission'),
                'applicant_name' => $request->input('applicant_name'),
                'applicant_address' => $request->input('applicant_street_address'),
                'applicant_city' => $request->input('applicant_city'),
                'applicant_county' => $request->input('applicant_county'),
                'requested_date' => $request->input('requested_date'),
                'requested_time' => $request->input('requested_time'),
                'construction_type' => $request->input('construction_type'),
                'floor_plan' => $request->input('floor_plan'),
                'inspection_type' => $request->input('inspection_type'),
                'region' => $request->input('region'),
                'requester_name' => $request->input('requester_name'),
                'requester_email' => $request->input('requester_email_1'),
                'requester_phone' => $request->input('requester_phone'),
                'supervisor_name' => $request->input('onsite_supervisor_name'),
                'supervisor_email' => $request->input('onsite_supervisor_email'),
                'supervisor_phone' => $request->input('onsite_supervisor_phone'),
            ]);
        }
        else if (Auth::user()->role_id == 2) {
            $document_1 = $old_data->document_1;
            $document_2 = $old_data->document_2;
            $document_3 = $old_data->document_3;
            $document_4 = $old_data->document_4;
            $document_5 = $old_data->document_5;
            $document_6 = $old_data->document_6;
            $document_7 = $old_data->document_8;
            $document_8 = $old_data->document_8;
            $document_file_1 = $old_data->document_file_1;
            $document_file_2 = $old_data->document_file_2;
            $document_file_3 = $old_data->document_file_3;
            $document_file_4 = $old_data->document_file_4;
            $document_file_5 = $old_data->document_file_5;
            $document_file_6 = $old_data->document_file_6;
            $document_file_7 = $old_data->document_file_7;
            $document_file_8 = $old_data->document_file_8;

            if($old_data->document_file_1 != null) {
                $document_1 = $request->input('document_names1');
            }

            if($old_data->document_file_2 != null) {
                $document_2 = $request->input('document_names2');
            }

            if($old_data->document_file_3 != null) {
                $document_3 = $request->input('document_names3');
            }

            if($old_data->document_file_4 != null) {
                $document_4 = $request->input('document_names4');
            }

            if($old_data->document_file_5 != null) {
                $document_5 = $request->input('document_names5');
            }

            if($old_data->document_file_6 != null) {
                $document_6 = $request->input('document_names6');
            }

            if($old_data->document_file_7 != null) {
                $document_7 = $request->input('document_names7');
            }

            if($old_data->document_file_8 != null) {
                $document_8 = $request->input('document_names8');
            }

            $doc_name = Application::find($id);
            if ($request->hasFile('document_files1')) {
                if($request->input('document_names1')) {

                    $extension = $request->file('document_files1')->getClientMimeType();

                    if($extension == 'image/jpeg' || $extension == 'image/png'){
                        $document_1 = $request->input('document_names1');
                       $photoName =  $this->imageConvertAsPdf($request->file('document_files1'),$id);


                    }
                    else{
                        $document_1 = $request->input('document_names1');
                        $photoNames = $request->document_files1->storeAs('public/uploads',  $doc_name->hriq_id."_".$doc_name->id."_". $request->document_files1->getClientOriginalName());

                        $photoName = str_replace($doc_name->hriq_id."_".$doc_name->id."_" , '',   $photoNames);

                    }

                   $document_file_1 = str_replace('public/uploads/', '',  $doc_name->hriq_id."_".$doc_name->id."_". $photoName);

                }
            }

            if ($request->hasFile('document_files2')) {
                if($request->input('document_names2')) {

                    $extension = $request->file('document_files2')->getClientMimeType();

                    if($extension == 'image/jpeg' || $extension == 'image/png'){
                        $document_2 = $request->input('document_names2');
                        $photoName = $this->imageConvertAsPdf($request->file('document_files2'),$id);
                    }
                    else{

                        $document_2 = $request->input('document_names2');
                        $photoNames = $request->document_files2->storeAs('public/uploads',  $doc_name->hriq_id."_".$doc_name->id."_".$request->document_files2->getClientOriginalName());
                        $photoName = str_replace($doc_name->hriq_id."_".$doc_name->id."_" , '',   $photoNames);
                    }

                    $document_file_2 = str_replace('public/uploads/', '',  $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                }
            }

            if ($request->hasFile('document_files3')) {
                if($request->input('document_names3')) {

                    $extension = $request->file('document_files3')->getClientMimeType();

                    if($extension == 'image/jpeg' || $extension == 'image/png'){
                        $document_3 = $request->input('document_names3');
                        $photoName = $this->imageConvertAsPdf($request->file('document_files3'),$id);
                    }
                    else{

                        $document_3 = $request->input('document_names3');
                        $photoNames = $request->document_files3->storeAs('public/uploads',  $doc_name->hriq_id."_".$doc_name->id."_".$request->document_files3->getClientOriginalName());
                        $photoName = str_replace($doc_name->hriq_id."_".$doc_name->id."_" , '',   $photoNames);
                    }

                    $document_file_3 = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                }
            }

            if ($request->hasFile('document_files4')) {
                if($request->input('document_names4')) {

                    $extension = $request->file('document_files4')->getClientMimeType();

                    if($extension == 'image/jpeg' || $extension == 'image/png'){
                        $document_4 = $request->input('document_names4');
                        $photoName = $this->imageConvertAsPdf($request->file('document_files4'),$id);
                    }else{
                        $document_4 = $request->input('document_names4');
                        $photoNames = $request->document_files4->storeAs('public/uploads', $doc_name->hriq_id."_".$doc_name->id."_".$request->document_files4->getClientOriginalName());
                        $photoName = str_replace($doc_name->hriq_id."_".$doc_name->id."_" , '',   $photoNames);
                    }

                    $document_file_4 = str_replace('public/uploads/', '',  $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                }
            }

            if ($request->hasFile('document_files5')) {
                if($request->input('document_names5')) {

                    $extension = $request->file('document_files5')->getClientMimeType();

                    if($extension == 'image/jpeg' || $extension == 'image/png'){
                        $document_5 = $request->input('document_names5');
                        $photoName = $this->imageConvertAsPdf($request->file('document_files5'),$id);
                    }else{
                        $document_5 = $request->input('document_names5');
                        $photoNames = $request->document_files5->storeAs('public/uploads',$doc_name->hriq_id."_".$doc_name->id."_". $request->document_files5->getClientOriginalName());
                        $photoName = str_replace($doc_name->hriq_id."_".$doc_name->id."_" , '',   $photoNames);
                    }

                    $document_file_5 = str_replace('public/uploads/', '',  $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                }
            }

            if ($request->hasFile('document_files6')) {
                if($request->input('document_names6')) {

                    $extension = $request->file('document_files6')->getClientMimeType();

                    if($extension == 'image/jpeg' || $extension == 'image/png'){
                        $document_6 = $request->input('document_names6');
                        $photoName = $this->imageConvertAsPdf($request->file('document_files6'),$id);
                    }else{
                        $document_6 = $request->input('document_names6');
                        $photoNames = $request->document_files6->storeAs('public/uploads',$doc_name->hriq_id."_".$doc_name->id."_". $request->document_files6->getClientOriginalName());
                        $photoName = str_replace($doc_name->hriq_id."_".$doc_name->id."_" , '',   $photoNames);
                    }

                    $document_file_6 = str_replace('public/uploads/', '',  $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                }
            }

            if ($request->hasFile('document_files7')) {
                if($request->input('document_names7')) {

                    $extension = $request->file('document_files7')->getClientMimeType();

                    if($extension == 'image/jpeg' || $extension == 'image/png'){
                        $document_7 = $request->input('document_names7');
                        $photoName = $this->imageConvertAsPdf($request->file('document_files7'),$id);
                    }else{
                        $document_7 = $request->input('document_names7');
                        $photoNames = $request->document_files7->storeAs('public/uploads', $doc_name->hriq_id."_".$doc_name->id."_". $request->document_files7->getClientOriginalName());
                        $photoName = str_replace($doc_name->hriq_id."_".$doc_name->id."_" , '',   $photoNames);
                    }

                    $document_file_7 = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                }
            }

            if ($request->hasFile('document_files8')) {
                if($request->input('document_names8')) {

                    $extension = $request->file('document_files8')->getClientMimeType();

                    if($extension == 'image/jpeg' || $extension == 'image/png'){
                        $document_8 = $request->input('document_names8');
                        $photoName = $this->imageConvertAsPdf($request->file('document_files8'),$id);
                    }else{
                      $document_8 = $request->input('document_names8');
                      $photoNames = $request->document_files8->storeAs('public/uploads',$doc_name->hriq_id."_".$doc_name->id."_". $request->document_files8->getClientOriginalName());
                      $photoName = str_replace($doc_name->hriq_id."_".$doc_name->id."_" , '',   $photoNames);
                    }

                    $document_file_8 = str_replace('public/uploads/', '',  $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                }
            }


            Application::where('id', $id)->update([
                'document_1' => $document_1,
                'document_file_1' => $document_file_1,
                'document_2' => $document_2,
                'document_file_2' => $document_file_2,
                'document_3' => $document_3,
                'document_file_3' => $document_file_3,
                'document_4' => $document_4,
                'document_file_4' => $document_file_4,
                'document_5' => $document_5,
                'document_file_5' => $document_file_5,
                'document_6' => $document_6,
                'document_file_6' => $document_file_6,
                'document_7' => $document_7,
                'document_file_7' => $document_file_7,
                'document_8' => $document_8,
                'document_file_8' => $document_file_8
            ]);

            if($request->input('inspector_assigned')) {
                Application::where('id', $id)->update([
                    'inspector_id' => $request->input('inspector_assigned')
                ]);

                $inspectorDetails = User::find($request->input('inspector_assigned'));

                if($inspectorDetails) {
                    if(Application::find($id)->previous_application_id == null) {
                        Status50::where('application_id', $id)->update([
                            'inspector_id' => $request->input('inspector_assigned'),
                            'inspector' => $inspectorDetails->name,
                            'inspector_email' => $inspectorDetails->email
                        ]);

                        $tempstatus = Status50::where('application_id', $id)->get();
                        $tempStatus = Status50::find($tempstatus[0]->id);
                        $tempStatus->inspector = $inspectorDetails->name;
                        $tempStatus->inspector = $inspectorDetails->email;

                        if(count(StatusRehab::where('application_id', $id)->get()) > 0) {
                            //echo $inspectorDetails->name;
                            StatusRehab::where('application_id', $id)->update([
                                'inspector_id' => $request->input('inspector_assigned'),
                                'inspector' => $inspectorDetails->name,
                                'inspector_email' => $inspectorDetails->email
                            ]);
                        }

                        if(count(StatusRehab::where('application_id', $id)->get()) > 0) {
                            StatusRehab::where('application_id', $id)->update([
                                'inspector_id' => $request->input('inspector_assigned'),
                                'inspector' => $inspectorDetails->name,
                                'inspector_email' => $inspectorDetails->email
                            ]);
                        }

                        Status100::where('application_id', $id)->update([
                            'inspector_id' => $request->input('inspector_assigned'),
                            'inspector' => $inspectorDetails->name,
                            'inspector_email' => $inspectorDetails->email
                        ]);

                        Status50::where('application_id', $id)->update([
                            'inspector_id' => $request->input('inspector_assigned'),
                            'inspector' => $inspectorDetails->name,
                            'inspector_email' => $inspectorDetails->email
                        ]);
                    } else {
                        Status100::where('application_id', $id)->update([
                            'inspector_id' => $request->input('inspector_assigned'),
                            'inspector' => $inspectorDetails->name,
                            'inspector_email' => $inspectorDetails->email
                        ]);
                    }
                }

                if($old_data->inspector_id != $request->input('inspector_assigned')) {
                    $admins = User::where([
                        ['role_id', 2],
                        ['status', 1]
                    ])->get();
                    foreach ($admins as $admin) {
                        dispatch(new InspectorAssignJob(Auth::user()->id, $admin->email, $id));
                    }

                    $inspector_email = User::find($request->input('inspector_assigned'));
                    if($inspector_email->status == 1) {
                        $inspector_email = $inspector_email->email;
                        dispatch(new InspectorAssignJob(Auth::user()->id, $inspector_email, $id));

                        $inspectorChangeEmail = 1;
                    }

                }
            }

        }
        else if (Auth::user()->role_id == 3) {
            $application = Application::where('id', $id)->update([
                'hriq_id' => $request->input('hriq_id'),
                'submitted_glo' => $request->input('submitted_to_glo'),
                'date_glo_submission' => $request->input('date_glo_submission'),
                'applicant_name' => $request->input('applicant_name'),
                'applicant_address' => $request->input('applicant_street_address'),
                'applicant_city' => $request->input('applicant_city'),
                'applicant_county' => $request->input('applicant_county'),
                'requested_date' => $request->input('requested_date'),
                'requested_time' => $request->input('requested_time'),
                'construction_type' => $request->input('construction_type'),
                'floor_plan' => $request->input('floor_plan'),
                'inspection_type' => $request->input('inspection_type'),
                'region' => $request->input('region'),
                'supervisor_name' => $request->input('onsite_supervisor_name'),
                'supervisor_phone' => $request->input('onsite_supervisor_phone'),
                'inspection_status' => $request->input('inspection_status'),
                'scheduled_inspection_date' => $request->input('scheduled_inspection_date'),
                'scheduled_inspection_time' => $request->input('scheduled_inspection_time'),
                'comments' => $request->input('comments')
            ]);
        }

        if(Auth::user()->role_id != 1) {
            if($request->input('inspection_type') == '50%') {
                $oldPhoto = Photo::where([
                    ['application_id', $id],
                    ['type', '50%']
                ])->get();
                $photos[0] = $oldPhoto[0]->photo_1;
                $photos[1] = $oldPhoto[0]->photo_2;
                $photos[2] = $oldPhoto[0]->photo_3;
                $photos[3] = $oldPhoto[0]->photo_4;
                $photos[4] = $oldPhoto[0]->photo_5;
                $photos[5] = $oldPhoto[0]->photo_6;
                $photos[6] = $oldPhoto[0]->photo_7;
                $photos[7] = $oldPhoto[0]->photo_8;
                $photos[8] = $oldPhoto[0]->photo_9;
                $photos[9] = $oldPhoto[0]->photo_10;
                $photos[10] = $oldPhoto[0]->photo_11;
                $photos[11] = $oldPhoto[0]->photo_12;
                $photos[12] = $oldPhoto[0]->photo_13;
                $photos[13] = $oldPhoto[0]->photo_14;
                $photos[14] = $oldPhoto[0]->photo_15;
                $photos[15] = $oldPhoto[0]->photo_16;
                $photos[16] = $oldPhoto[0]->photo_17;
                $photos[17] = $oldPhoto[0]->photo_18;
                $photos[18] = $oldPhoto[0]->photo_19;
                $photos[19] = $oldPhoto[0]->photo_20;
                $photos[20] = $oldPhoto[0]->photo_21;
                $photos[21] = $oldPhoto[0]->photo_22;
                $photos[22] = $oldPhoto[0]->photo_23;
                $photos[23] = $oldPhoto[0]->photo_24;
                $photos[24] = $oldPhoto[0]->photo_25;
                $photos[25] = $oldPhoto[0]->photo_26;
                $photos[26] = $oldPhoto[0]->photo_27;
                $photos[27] = $oldPhoto[0]->photo_28;
                $photos[28] = $oldPhoto[0]->photo_29;
                $photos[29] = $oldPhoto[0]->photo_30;
                    $doc_name = Application::find($id);
                if ($request->hasFile('photo_1_5')) {

                    $photoName = $this->resizeAndSave($request->photo_1_5,$id);
                    $photos[0] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);

                }
                if ($request->hasFile('photo_2_5')) {

                    $photoName =$this->resizeAndSave($request->photo_2_5,$id);
                    $photos[1] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                }
                if ($request->hasFile('photo_3_5')) {

                    $photoName =$this->resizeAndSave($request->photo_3_5,$id);
                    $photos[2] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                }
                if ($request->hasFile('photo_4_5')) {

                    $photoName =$this->resizeAndSave($request->photo_4_5,$id);
                    $photos[3] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                }
                if ($request->hasFile('photo_5_5')) {

                    $photoName =$this->resizeAndSave($request->photo_5_5,$id);
                    $photos[4] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                }
                if ($request->hasFile('photo_6_5')) {

                    $photoName =$this->resizeAndSave($request->photo_6_5,$id);
                    $photos[5] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                }
                if ($request->hasFile('photo_7_5')) {

                    $photoName =$this->resizeAndSave($request->photo_7_5,$id);
                    $photos[6] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                }
                if ($request->hasFile('photo_8_5')) {

                    $photoName =$this->resizeAndSave($request->photo_8_5,$id);
                    $photos[7] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                }
                if ($request->hasFile('photo_9_5')) {

                    $photoName =$this->resizeAndSave($request->photo_9_5,$id);
                    $photos[8] = str_replace('public/uploads/', '',  $doc_name->hriq_id."_".$doc_name->id."_".$photoName);
                }
                if ($request->hasFile('photo_10_5')) {

                    $photoName =$this->resizeAndSave($request->photo_10_5,$id);
                    $photos[9] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                }
                if ($request->hasFile('photo_11_5')) {

                    $photoName =$this->resizeAndSave($request->photo_11_5,$id);
                    $photos[10] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                }
                if ($request->hasFile('photo_12_5')) {

                    $photoName =$this->resizeAndSave($request->photo_12_5,$id);
                    $photos[11] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                }
                if ($request->hasFile('photo_13_5')) {

                    $photoName =$this->resizeAndSave($request->photo_13_5,$id);
                    $photos[12] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                }
                if ($request->hasFile('photo_14_5')) {

                    $photoName =$this->resizeAndSave($request->photo_14_5,$id);
                    $photos[13] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                }
                if ($request->hasFile('photo_15_5')) {

                    $photoName =$this->resizeAndSave($request->photo_15_5,$id);
                    $photos[14] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                }
                if ($request->hasFile('photo_16_5')) {

                    $photoName =$this->resizeAndSave($request->photo_16_5,$id);
                    $photos[15] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                }
                if ($request->hasFile('photo_17_5')) {

                    $photoName =$this->resizeAndSave($request->photo_17_5,$id);
                    $photos[16] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                }
                if ($request->hasFile('photo_18_5')) {

                    $photoName =$this->resizeAndSave($request->photo_18_5,$id);
                    $photos[17] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                }
                if ($request->hasFile('photo_19_5')) {

                    $photoName = $this->resizeAndSave($request->photo_19_5,$id);
                    $photos[18] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                }
                if ($request->hasFile('photo_20_5')) {

                    $photoName =$this->resizeAndSave($request->photo_20_5,$id);
                    $photos[19] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                }
                if ($request->hasFile('photo_21_5')) {

                    $photoName =$this->resizeAndSave($request->photo_21_5,$id);
                    $photos[20] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                }
                if ($request->hasFile('photo_22_5')) {

                    $photoName =$this->resizeAndSave($request->photo_22_5,$id);
                    $photos[21] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                }
                if ($request->hasFile('photo_23_5')) {

                    $photoName =$this->resizeAndSave($request->photo_23_5,$id);
                    $photos[22] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                }
                if ($request->hasFile('photo_24_5')) {

                    $photoName =$this->resizeAndSave($request->photo_24_5,$id);
                    $photos[23] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                }
                if ($request->hasFile('photo_25_5')) {

                    $photoName =$this->resizeAndSave($request->photo_25_5,$id);
                    $photos[24] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                }
                if ($request->hasFile('photo_26_5')) {

                    $photoName =$this->resizeAndSave($request->photo_26_5,$id);
                    $photos[25] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                }
                if ($request->hasFile('photo_27_5')) {

                    $photoName =$this->resizeAndSave($request->photo_27_5,$id);
                    $photos[26] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                }
                if ($request->hasFile('photo_28_5')) {

                    $photoName =$this->resizeAndSave($request->photo_28_5,$id);
                    $photos[27] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                }
                if ($request->hasFile('photo_29_5')) {

                    $photoName =$this->resizeAndSave($request->photo_29_5,$id);
                    $photos[28] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                }
                if ($request->hasFile('photo_30_5')) {

                    $photoName =$this->resizeAndSave($request->photo_30_5,$id);
                    $photos[29] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                }

                $oldDeficiency = Deficiency::where([
                    ['application_id', $id],
                    ['type', '50%']
                ])->get();
                $deficiencies[0] = $oldDeficiency[0]->deficiency_1;
                $deficiencies[1] = $oldDeficiency[0]->deficiency_2;
                $deficiencies[2] = $oldDeficiency[0]->deficiency_3;
                $deficiencies[3] = $oldDeficiency[0]->deficiency_4;
                $deficiencies[4] = $oldDeficiency[0]->deficiency_5;
                $deficiencies[5] = $oldDeficiency[0]->deficiency_6;
                $deficiencies[6] = $oldDeficiency[0]->deficiency_7;
                $deficiencies[7] = $oldDeficiency[0]->deficiency_8;
                $deficiencies[8] = $oldDeficiency[0]->deficiency_9;
                $deficiencies[9] = $oldDeficiency[0]->deficiency_10;
                $deficiencies[10] = $oldDeficiency[0]->deficiency_11;
                $deficiencies[11] = $oldDeficiency[0]->deficiency_12;
                $deficiencies[12] = $oldDeficiency[0]->deficiency_13;

                $deficiency_photos[0] = $oldDeficiency[0]->deficiency_photo_1;
                $deficiency_photos[1] = $oldDeficiency[0]->deficiency_photo_2;
                $deficiency_photos[2] = $oldDeficiency[0]->deficiency_photo_3;
                $deficiency_photos[3] = $oldDeficiency[0]->deficiency_photo_4;
                $deficiency_photos[4] = $oldDeficiency[0]->deficiency_photo_5;
                $deficiency_photos[5] = $oldDeficiency[0]->deficiency_photo_6;
                $deficiency_photos[6] = $oldDeficiency[0]->deficiency_photo_7;
                $deficiency_photos[7] = $oldDeficiency[0]->deficiency_photo_8;
                $deficiency_photos[8] = $oldDeficiency[0]->deficiency_photo_9;
                $deficiency_photos[9] = $oldDeficiency[0]->deficiency_photo_10;
                $deficiency_photos[10] = $oldDeficiency[0]->deficiency_photo_11;
                $deficiency_photos[11] = $oldDeficiency[0]->deficiency_photo_12;
                $deficiency_photos[12] = $oldDeficiency[0]->deficiency_photo_13;
                    $def_name = Application::find($id);
                if ($request->hasFile('deficiency_photo_1_5')) {
                    if($request->input('deficiency_1_5')) {
                        $deficiencies[0] = $request->input('deficiency_1_5');
                        $photoName = $request->deficiency_photo_1_5->storeAs('public/uploads',  $def_name->hriq_id."_".$def_name->id."_".$request->deficiency_photo_1_5->getClientOriginalName());
                        $deficiency_photos[0] = str_replace('public/uploads/', '', $photoName);
                    }
                }
                if ($request->hasFile('deficiency_photo_2_5')) {
                    if($request->input('deficiency_2_5')) {
                        $deficiencies[1] = $request->input('deficiency_2_5');
                        $photoName = $request->deficiency_photo_2_5->storeAs('public/uploads',  $def_name->hriq_id."_".$def_name->id."_".$request->deficiency_photo_2_5->getClientOriginalName());
                        $deficiency_photos[1] = str_replace('public/uploads/', '', $photoName);
                    }
                }
                if ($request->hasFile('deficiency_photo_3_5')) {
                    if($request->input('deficiency_3_5')) {
                        $deficiencies[2] = $request->input('deficiency_3_5');
                        $photoName = $request->deficiency_photo_3_5->storeAs('public/uploads', $def_name->hriq_id."_".$def_name->id."_". $request->deficiency_photo_3_5->getClientOriginalName());
                        $deficiency_photos[2] = str_replace('public/uploads/', '', $photoName);
                    }
                }
                if ($request->hasFile('deficiency_photo_4_5')) {
                    if($request->input('deficiency_4_5')) {
                        $deficiencies[3] = $request->input('deficiency_4_5');
                        $photoName = $request->deficiency_photo_4_5->storeAs('public/uploads',  $def_name->hriq_id."_".$def_name->id."_".$request->deficiency_photo_4_5->getClientOriginalName());
                        $deficiency_photos[3] = str_replace('public/uploads/', '', $photoName);
                    }
                }
                if ($request->hasFile('deficiency_photo_5_5')) {
                    if($request->input('deficiency_5_5')) {
                        $deficiencies[4] = $request->input('deficiency_5_5');
                        $photoName = $request->deficiency_photo_5_5->storeAs('public/uploads', $def_name->hriq_id."_".$def_name->id."_". $request->deficiency_photo_5_5->getClientOriginalName());
                        $deficiency_photos[4] = str_replace('public/uploads/', '', $photoName);
                    }
                }
                if ($request->hasFile('deficiency_photo_6_5')) {
                    if($request->input('deficiency_6_5')) {
                        $deficiencies[5] = $request->input('deficiency_6_5');
                        $photoName = $request->deficiency_photo_6_5->storeAs('public/uploads',  $def_name->hriq_id."_".$def_name->id."_".$request->deficiency_photo_6_5->getClientOriginalName());
                        $deficiency_photos[5] = str_replace('public/uploads/', '', $photoName);
                    }
                }
                if ($request->hasFile('deficiency_photo_7_5')) {
                    if($request->input('deficiency_7_5')) {
                        $deficiencies[6] = $request->input('deficiency_7_5');
                        $photoName = $request->deficiency_photo_7_5->storeAs('public/uploads', $def_name->hriq_id."_".$def_name->id."_". $request->deficiency_photo_7_5->getClientOriginalName());
                        $deficiency_photos[6] = str_replace('public/uploads/', '', $photoName);
                    }
                }
                if ($request->hasFile('deficiency_photo_8_5')) {
                    if($request->input('deficiency_8_5')) {
                        $deficiencies[7] = $request->input('deficiency_8_5');
                        $photoName = $request->deficiency_photo_8_5->storeAs('public/uploads',  $def_name->hriq_id."_".$def_name->id."_".$request->deficiency_photo_8_5->getClientOriginalName());
                        $deficiency_photos[7] = str_replace('public/uploads/', '', $photoName);
                    }
                }
                if ($request->hasFile('deficiency_photo_9_5')) {
                    if($request->input('deficiency_9_5')) {
                        $deficiencies[8] = $request->input('deficiency_9_5');
                        $photoName = $request->deficiency_photo_9_5->storeAs('public/uploads', $def_name->hriq_id."_".$def_name->id."_". $request->deficiency_photo_9_5->getClientOriginalName());
                        $deficiency_photos[8] = str_replace('public/uploads/', '', $photoName);
                    }
                }
                if ($request->hasFile('deficiency_photo_10_5')) {
                    if($request->input('deficiency_10_5')) {
                        $deficiencies[9] = $request->input('deficiency_10_5');
                        $photoName = $request->deficiency_photo_10_5->storeAs('public/uploads', $def_name->hriq_id."_".$def_name->id."_". $request->deficiency_photo_10_5->getClientOriginalName());
                        $deficiency_photos[9] = str_replace('public/uploads/', '', $photoName);
                    }
                }
                if ($request->hasFile('deficiency_photo_11_5')) {
                    if($request->input('deficiency_11_5')) {
                        $deficiencies[10] = $request->input('deficiency_11_5');
                        $photoName = $request->deficiency_photo_11_5->storeAs('public/uploads', $def_name->hriq_id."_".$def_name->id."_". $request->deficiency_photo_11_5->getClientOriginalName());
                        $deficiency_photos[10] = str_replace('public/uploads/', '', $photoName);
                    }
                }
                if ($request->hasFile('deficiency_photo_12_5')) {
                    if($request->input('deficiency_12_5')) {
                        $deficiencies[11] = $request->input('deficiency_12_5');
                        $photoName = $request->deficiency_photo_12_5->storeAs('public/uploads',  $def_name->hriq_id."_".$def_name->id."_".$request->deficiency_photo_12_5->getClientOriginalName());
                        $deficiency_photos[11] = str_replace('public/uploads/', '', $photoName);
                    }
                }
                if ($request->hasFile('deficiency_photo_13_5')) {
                    if($request->input('deficiency_13_5')) {
                        $deficiencies[12] = $request->input('deficiency_13_5');
                        $photoName = $request->deficiency_photo_13_5->storeAs('public/uploads',  $def_name->hriq_id."_".$def_name->id."_".$request->deficiency_photo_13_5->getClientOriginalName());
                        $deficiency_photos[12] = str_replace('public/uploads/', '', $photoName);
                    }
                }

                $oldData50 = Status50::where('application_id', $id)->get();
                $oldData50 = Status50::find($oldData50[0]->id);
                $attachment_1 = $oldData50->attachment_1;
                $thumb_1 = $oldData50->thumb_1;
                $document_spawn = $oldData50->document_spawn;
                if ($request->hasFile('attachment_1_5')) {
                    $photoName = $request->attachment_1_5->storeAs('public/uploads', $request->attachment_1_5->getClientOriginalName());
                    $attachment_1 = str_replace('public/uploads/', '', $photoName);
                }

                if ($request->hasFile('thumb_1_5')) {
                    $photoName = $request->thumb_1_5->storeAs('public/uploads', $request->thumb_1_5->getClientOriginalName());
                    $thumb_1 = str_replace('public/uploads/', '', $photoName);
                }

                if ($request->hasFile('document_spawn_5')) {
                    $photoName = $request->document_spawn_5->storeAs('public/uploads', $request->document_spawn_5->getClientOriginalName());
                    $document_spawn = str_replace('public/uploads/', '', $photoName);
                }

                Status50::where('application_id', $id)->update([
                    'application_id' => $id,
                    'cancellation_request' => $request->input('cancellation_request_5'),
                    'date_inspected' => $request->input('date_inspected_5'),
                    'inspector' => $request->input('inspector_5'),
                    'inspector_email' => $request->input('inspector_email_5'),
                    'superintendent' => $request->input('superintendent_5'),
                    'superintendent_email' => $request->input('superintendent_email_5'),
                    'requester_email' => $request->input('requester_email_5'),
                    'superintendent_phone' => $request->input('superintendent_phone_5'),
                    'document_spawn' => $document_spawn,
                    'document_creation_date' => $request->input('document_creation_date_5'),
                    'inspection_sign_off_date' => $request->input('inspection_sign_off_date_5'),
                    'homeowner_sign_off_date' => $request->input('homeowner_sign_off_date_5'),
                    'superintendent_sign_off_date' => $request->input('superintendent_sign_off_date_5'),
                    'document_name' => $request->input('document_name_5'),
                    'inspector_formula_sign' => $request->input('inspector_formula_sign_5'),
                    'superintendent_formula_sign' => $request->input('superintendent_formula_sign_5'),
                    'general_inspection' => $request->input('g5_i_1') ."_". $request->input('g5_i_2')."_".$request->input('g5_i_3')."_".$request->input('g5_i_4')."_".$request->input('g5_i_5')."_".$request->input('g5_i_6')."_".$request->input('g5_i_7')."_".$request->input('g5_i_8')."_".$request->input('g5_i_9')."_".$request->input('g5_i_10')."_".$request->input('g5_i_11')."_".$request->input('g5_i_12')."_".$request->input('g5_i_13')."_".$request->input('g5_i_14')."_".$request->input('g5_i_15')."_".$request->input('g5_i_16')."_".$request->input('g5_i_17')."_".$request->input('g5_i_18')."_".$request->input('g5_i_19')."_".$request->input('g5_i_20')."_".$request->input('g5_i_21'),
                    'exterior_inspection' => $request->input('e5_i_1')."_".$request->input('e5_i_2')."_".$request->input('e5_i_3')."_".$request->input('e5_i_4')."_".$request->input('e5_i_5')."_".$request->input('e5_i_6')."_".$request->input('e5_i_7')."_".$request->input('e5_i_8')."_".$request->input('e5_i_9')."_".$request->input('e5_i_10')."_".$request->input('e5_i_11')."_".$request->input('e5_i_12'),
                    'interior_inspection' => $request->input('i5_i_1')."_".$request->input('i5_i_2')."_".$request->input('i5_i_3')."_".$request->input('i5_i_4')."_".$request->input('i5_i_5')."_".$request->input('i5_i_6')."_".$request->input('i5_i_7')."_".$request->input('i5_i_8')."_".$request->input('i5_i_9')."_".$request->input('i5_i_10')."_".$request->input('i5_i_11')."_".$request->input('i5_i_12')."_".$request->input('i5_i_13')."_".$request->input('i5_i_14')."_".$request->input('i5_i_15'),
                    'window_door_inspection' => $request->input('wd5_i_1')."_".$request->input('wd5_i_2')."_".$request->input('wd5_i_3')."_".$request->input('wd5_i_4'),
                    'roof_attic_inspection' => $request->input('ra5_i_1')."_".$request->input('ra5_i_2')."_".$request->input('ra5_i_3')."_".$request->input('ra5_i_4')."_".$request->input('ra5_i_5')."_".$request->input('ra5_i_6')."_".$request->input('ra5_i_7')."_".$request->input('ra5_i_8')."_".$request->input('ra5_i_9')."_".$request->input('ra5_i_10'),
                    'additional_information_1' => $request->input('additional_information_1_5'),
                    'additional_information_2' => $request->input('additional_information_2_5'),
                    'additional_information_3' => $request->input('additional_information_3_5'),
                    'additional_information_4' => $request->input('additional_information_4_5'),
                    'additional_notes' => $request->input('additional_notes_5'),
                    'address_text' => $request->input('address_text_5'),
                    'attachment_1' => $attachment_1,
                    'ical_text' => $request->input('ical_text_5'),
                    'contractor_builder_name' => $request->input('contractor_builder_name_5'),
                    'thumb_1' => $thumb_1,
                    'notify_glo' => $request->input('notify_glo_5'),
                ]);

                Photo::where([
                    ['application_id', $id],
                    ['type', '50%']
                ])->update([
                    'photo_1' => $photos[0],
                    'photo_2' => $photos[1],
                    'photo_3' => $photos[2],
                    'photo_4' => $photos[3],
                    'photo_5' => $photos[4],
                    'photo_6' => $photos[5],
                    'photo_7' => $photos[6],
                    'photo_8' => $photos[7],
                    'photo_9' => $photos[8],
                    'photo_10' => $photos[9],
                    'photo_11' => $photos[10],
                    'photo_12' => $photos[11],
                    'photo_13' => $photos[12],
                    'photo_14' => $photos[13],
                    'photo_15' => $photos[14],
                    'photo_16' => $photos[15],
                    'photo_17' => $photos[16],
                    'photo_18' => $photos[17],
                    'photo_19' => $photos[18],
                    'photo_20' => $photos[19],
                    'photo_21' => $photos[20],
                    'photo_22' => $photos[21],
                    'photo_23' => $photos[22],
                    'photo_24' => $photos[23],
                    'photo_25' => $photos[24],
                    'photo_26' => $photos[25],
                    'photo_27' => $photos[26],
                    'photo_28' => $photos[27],
                    'photo_29' => $photos[28],
                    'photo_30' => $photos[29]
                ]);

                Deficiency::where([
                    ['application_id', $id],
                    ['type', '50%']
                ])->update([
                    'deficiency_1' => $deficiencies[0],
                    'deficiency_photo_1' => $deficiency_photos[0],
                    'deficiency_2' => $deficiencies[1],
                    'deficiency_photo_2' => $deficiency_photos[1],
                    'deficiency_3' => $deficiencies[2],
                    'deficiency_photo_3' => $deficiency_photos[2],
                    'deficiency_4' => $deficiencies[3],
                    'deficiency_photo_4' => $deficiency_photos[3],
                    'deficiency_5' => $deficiencies[4],
                    'deficiency_photo_5' => $deficiency_photos[4],
                    'deficiency_6' => $deficiencies[5],
                    'deficiency_photo_6' => $deficiency_photos[5],
                    'deficiency_7' => $deficiencies[6],
                    'deficiency_photo_7' => $deficiency_photos[6],
                    'deficiency_8' => $deficiencies[7],
                    'deficiency_photo_8' => $deficiency_photos[7],
                    'deficiency_9' => $deficiencies[8],
                    'deficiency_photo_9' => $deficiency_photos[8],
                    'deficiency_10' => $deficiencies[9],
                    'deficiency_photo_10' => $deficiency_photos[9],
                    'deficiency_11' => $deficiencies[10],
                    'deficiency_photo_11' => $deficiency_photos[10],
                    'deficiency_12' => $deficiencies[11],
                    'deficiency_photo_12' => $deficiency_photos[11],
                    'deficiency_13' => $deficiencies[12],
                    'deficiency_photo_13' => $deficiency_photos[12],
                ]);
            }
            else if($request->input('inspection_type') == 'REHAB') {
                $oldPhoto = Photo::where([
                    ['application_id', $id],
                    ['type', 'Rehab']
                ])->get();
                $photos[0] = $oldPhoto[0]->photo_1;
                $photos[1] = $oldPhoto[0]->photo_2;
                $photos[2] = $oldPhoto[0]->photo_3;
                $photos[3] = $oldPhoto[0]->photo_4;
                $photos[4] = $oldPhoto[0]->photo_5;
                $photos[5] = $oldPhoto[0]->photo_6;
                $photos[6] = $oldPhoto[0]->photo_7;
                $photos[7] = $oldPhoto[0]->photo_8;
                $photos[8] = $oldPhoto[0]->photo_9;
                $photos[9] = $oldPhoto[0]->photo_10;
                $photos[10] = $oldPhoto[0]->photo_11;
                $photos[11] = $oldPhoto[0]->photo_12;
                $photos[12] = $oldPhoto[0]->photo_13;
                $photos[13] = $oldPhoto[0]->photo_14;
                $photos[14] = $oldPhoto[0]->photo_15;
                $photos[15] = $oldPhoto[0]->photo_16;
                $photos[16] = $oldPhoto[0]->photo_17;
                $photos[17] = $oldPhoto[0]->photo_18;
                $photos[18] = $oldPhoto[0]->photo_19;
                $photos[19] = $oldPhoto[0]->photo_20;
                $photos[20] = $oldPhoto[0]->photo_21;
                $photos[21] = $oldPhoto[0]->photo_22;
                $photos[22] = $oldPhoto[0]->photo_23;
                $photos[23] = $oldPhoto[0]->photo_24;
                $photos[24] = $oldPhoto[0]->photo_25;
                $photos[25] = $oldPhoto[0]->photo_26;
                $photos[26] = $oldPhoto[0]->photo_27;
                $photos[27] = $oldPhoto[0]->photo_28;
                $photos[28] = $oldPhoto[0]->photo_29;
                $photos[29] = $oldPhoto[0]->photo_30;
                    $doc_name = Application::find($id);
                    if ($request->hasFile('photo_1_R')) {

                        $photoName = $this->resizeAndSave($request->photo_1_R,$id);
                        $photos[0] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);

                    }
                    if ($request->hasFile('photo_2_R')) {

                        $photoName =$this->resizeAndSave($request->photo_2_R,$id);
                        $photos[1] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                    }
                    if ($request->hasFile('photo_3_R')) {

                        $photoName =$this->resizeAndSave($request->photo_3_R,$id);
                        $photos[2] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                    }
                    if ($request->hasFile('photo_4_R')) {

                        $photoName =$this->resizeAndSave($request->photo_4_R,$id);
                        $photos[3] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                    }
                    if ($request->hasFile('photo_5_R')) {

                        $photoName =$this->resizeAndSave($request->photo_5_R,$id);
                        $photos[4] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                    }
                    if ($request->hasFile('photo_6_R')) {

                        $photoName =$this->resizeAndSave($request->photo_6_R,$id);
                        $photos[5] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                    }
                    if ($request->hasFile('photo_7_R')) {

                        $photoName =$this->resizeAndSave($request->photo_7_R,$id);
                        $photos[6] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                    }
                    if ($request->hasFile('photo_8_R')) {

                        $photoName =$this->resizeAndSave($request->photo_8_R,$id);
                        $photos[7] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                    }
                    if ($request->hasFile('photo_9_R')) {

                        $photoName =$this->resizeAndSave($request->photo_9_R,$id);
                        $photos[8] = str_replace('public/uploads/', '',  $doc_name->hriq_id."_".$doc_name->id."_".$photoName);
                    }
                    if ($request->hasFile('photo_10_R')) {

                        $photoName =$this->resizeAndSave($request->photo_10_R,$id);
                        $photos[9] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                    }
                    if ($request->hasFile('photo_11_R')) {

                        $photoName =$this->resizeAndSave($request->photo_11_R,$id);
                        $photos[10] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                    }
                    if ($request->hasFile('photo_12_R')) {

                        $photoName =$this->resizeAndSave($request->photo_12_R,$id);
                        $photos[11] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                    }
                    if ($request->hasFile('photo_13_R')) {

                        $photoName =$this->resizeAndSave($request->photo_13_R,$id);
                        $photos[12] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                    }
                    if ($request->hasFile('photo_14_R')) {

                        $photoName =$this->resizeAndSave($request->photo_14_R,$id);
                        $photos[13] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                    }
                    if ($request->hasFile('photo_15_R')) {

                        $photoName =$this->resizeAndSave($request->photo_15_R,$id);
                        $photos[14] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                    }
                    if ($request->hasFile('photo_16_R')) {

                        $photoName =$this->resizeAndSave($request->photo_16_R,$id);
                        $photos[15] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                    }
                    if ($request->hasFile('photo_17_R')) {

                        $photoName =$this->resizeAndSave($request->photo_17_R,$id);
                        $photos[16] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                    }
                    if ($request->hasFile('photo_18_R')) {

                        $photoName =$this->resizeAndSave($request->photo_18_R,$id);
                        $photos[17] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                    }
                    if ($request->hasFile('photo_19_R')) {

                        $photoName = $this->resizeAndSave($request->photo_19_R,$id);
                        $photos[18] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                    }
                    if ($request->hasFile('photo_20_R')) {

                        $photoName =$this->resizeAndSave($request->photo_20_R,$id);
                        $photos[19] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                    }
                    if ($request->hasFile('photo_21_R')) {

                        $photoName =$this->resizeAndSave($request->photo_21_R,$id);
                        $photos[20] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                    }
                    if ($request->hasFile('photo_22_R')) {

                        $photoName =$this->resizeAndSave($request->photo_22_R,$id);
                        $photos[21] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                    }
                    if ($request->hasFile('photo_23_R')) {

                        $photoName =$this->resizeAndSave($request->photo_23_R,$id);
                        $photos[22] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                    }
                    if ($request->hasFile('photo_24_R')) {

                        $photoName =$this->resizeAndSave($request->photo_24_R,$id);
                        $photos[23] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                    }
                    if ($request->hasFile('photo_25_R')) {

                        $photoName =$this->resizeAndSave($request->photo_25_R,$id);
                        $photos[24] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                    }
                    if ($request->hasFile('photo_26_R')) {

                        $photoName =$this->resizeAndSave($request->photo_26_R,$id);
                        $photos[25] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                    }
                    if ($request->hasFile('photo_27_R')) {

                        $photoName =$this->resizeAndSave($request->photo_27_R,$id);
                        $photos[26] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                    }
                    if ($request->hasFile('photo_28_R')) {

                        $photoName =$this->resizeAndSave($request->photo_28_R,$id);
                        $photos[27] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                    }
                    if ($request->hasFile('photo_29_R')) {

                        $photoName =$this->resizeAndSave($request->photo_29_R,$id);
                        $photos[28] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                    }
                    if ($request->hasFile('photo_30_R')) {

                        $photoName =$this->resizeAndSave($request->photo_30_R,$id);
                        $photos[29] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                    }



                $oldDeficiency = Deficiency::where([
                    ['application_id', $id],
                    ['type', 'Rehab']
                ])->get();
                $deficiencies[0] = $oldDeficiency[0]->deficiency_1;
                $deficiencies[1] = $oldDeficiency[0]->deficiency_2;
                $deficiencies[2] = $oldDeficiency[0]->deficiency_3;
                $deficiencies[3] = $oldDeficiency[0]->deficiency_4;
                $deficiencies[4] = $oldDeficiency[0]->deficiency_5;
                $deficiencies[5] = $oldDeficiency[0]->deficiency_6;
                $deficiencies[6] = $oldDeficiency[0]->deficiency_7;
                $deficiencies[7] = $oldDeficiency[0]->deficiency_8;
                $deficiencies[8] = $oldDeficiency[0]->deficiency_9;
                $deficiencies[9] = $oldDeficiency[0]->deficiency_10;
                $deficiencies[10] = $oldDeficiency[0]->deficiency_11;
                $deficiencies[11] = $oldDeficiency[0]->deficiency_12;
                $deficiencies[12] = $oldDeficiency[0]->deficiency_13;

                $deficiency_photos[0] = $oldDeficiency[0]->deficiency_photo_1;
                $deficiency_photos[1] = $oldDeficiency[0]->deficiency_photo_2;
                $deficiency_photos[2] = $oldDeficiency[0]->deficiency_photo_3;
                $deficiency_photos[3] = $oldDeficiency[0]->deficiency_photo_4;
                $deficiency_photos[4] = $oldDeficiency[0]->deficiency_photo_5;
                $deficiency_photos[5] = $oldDeficiency[0]->deficiency_photo_6;
                $deficiency_photos[6] = $oldDeficiency[0]->deficiency_photo_7;
                $deficiency_photos[7] = $oldDeficiency[0]->deficiency_photo_8;
                $deficiency_photos[8] = $oldDeficiency[0]->deficiency_photo_9;
                $deficiency_photos[9] = $oldDeficiency[0]->deficiency_photo_10;
                $deficiency_photos[10] = $oldDeficiency[0]->deficiency_photo_11;
                $deficiency_photos[11] = $oldDeficiency[0]->deficiency_photo_12;
                $deficiency_photos[12] = $oldDeficiency[0]->deficiency_photo_13;

                $def_name = Application::Find($id);

                if ($request->hasFile('deficiency_photo_1_R')) {
                    if($request->input('deficiency_1_R')) {
                        $deficiencies[0] = $request->input('deficiency_1_R');
                        $photoName = $request->deficiency_photo_1_R->storeAs('public/uploads', $def_name->hriq_id."_".$def_name->id."_". $request->deficiency_photo_1_R->getClientOriginalName());
                        $deficiency_photos[0] = str_replace('public/uploads/', '', $photoName);
                    }
                }
                if ($request->hasFile('deficiency_photo_2_R')) {
                    if($request->input('deficiency_2_R')) {
                        $deficiencies[1] = $request->input('deficiency_2_R');
                        $photoName = $request->deficiency_photo_2_R->storeAs('public/uploads', $def_name->hriq_id."_".$def_name->id."_".$request->deficiency_photo_2_R->getClientOriginalName());
                        $deficiency_photos[1] = str_replace('public/uploads/', '', $photoName);
                    }
                }
                if ($request->hasFile('deficiency_photo_3_R')) {
                    if($request->input('deficiency_3_R')) {
                        $deficiencies[2] = $request->input('deficiency_3_R');
                        $photoName = $request->deficiency_photo_3_R->storeAs('public/uploads',$def_name->hriq_id."_".$def_name->id."_". $request->deficiency_photo_3_R->getClientOriginalName());
                        $deficiency_photos[2] = str_replace('public/uploads/', '', $photoName);
                    }
                }
                if ($request->hasFile('deficiency_photo_4_R')) {
                    if($request->input('deficiency_4_R')) {
                        $deficiencies[3] = $request->input('deficiency_4_R');
                        $photoName = $request->deficiency_photo_4_R->storeAs('public/uploads',$def_name->hriq_id."_".$def_name->id."_". $request->deficiency_photo_4_R->getClientOriginalName());
                        $deficiency_photos[3] = str_replace('public/uploads/', '', $photoName);
                    }
                }
                if ($request->hasFile('deficiency_photo_5_R')) {
                    if($request->input('deficiency_5_R')) {
                        $deficiencies[4] = $request->input('deficiency_5_R');
                        $photoName = $request->deficiency_photo_5_R->storeAs('public/uploads', $def_name->hriq_id."_".$def_name->id."_".$request->deficiency_photo_5_R->getClientOriginalName());
                        $deficiency_photos[4] = str_replace('public/uploads/', '', $photoName);
                    }
                }
                if ($request->hasFile('deficiency_photo_6_R')) {
                    if($request->input('deficiency_6_R')) {
                        $deficiencies[5] = $request->input('deficiency_6_R');
                        $photoName = $request->deficiency_photo_6_R->storeAs('public/uploads', $def_name->hriq_id."_".$def_name->id."_".$request->deficiency_photo_6_R->getClientOriginalName());
                        $deficiency_photos[5] = str_replace('public/uploads/', '', $photoName);
                    }
                }
                if ($request->hasFile('deficiency_photo_7_R')) {
                    if($request->input('deficiency_7_R')) {
                        $deficiencies[6] = $request->input('deficiency_7_R');
                        $photoName = $request->deficiency_photo_7_R->storeAs('public/uploads', $def_name->hriq_id."_".$def_name->id."_".$request->deficiency_photo_7_R->getClientOriginalName());
                        $deficiency_photos[6] = str_replace('public/uploads/', '', $photoName);
                    }
                }
                if ($request->hasFile('deficiency_photo_8_R')) {
                    if($request->input('deficiency_8_R')) {
                        $deficiencies[7] = $request->input('deficiency_8_R');
                        $photoName = $request->deficiency_photo_8_R->storeAs('public/uploads', $def_name->hriq_id."_".$def_name->id."_".$request->deficiency_photo_8_R->getClientOriginalName());
                        $deficiency_photos[7] = str_replace('public/uploads/', '', $photoName);
                    }
                }
                if ($request->hasFile('deficiency_photo_9_R')) {
                    if($request->input('deficiency_9_R')) {
                        $deficiencies[8] = $request->input('deficiency_9_R');
                        $photoName = $request->deficiency_photo_9_R->storeAs('public/uploads',$def_name->hriq_id."_".$def_name->id."_". $request->deficiency_photo_9_R->getClientOriginalName());
                        $deficiency_photos[8] = str_replace('public/uploads/', '', $photoName);
                    }
                }
                if ($request->hasFile('deficiency_photo_10_R')) {
                    if($request->input('deficiency_10_R')) {
                        $deficiencies[9] = $request->input('deficiency_10_R');
                        $photoName = $request->deficiency_photo_10_R->storeAs('public/uploads',$def_name->hriq_id."_".$def_name->id."_". $request->deficiency_photo_10_R->getClientOriginalName());
                        $deficiency_photos[9] = str_replace('public/uploads/', '', $photoName);
                    }
                }
                if ($request->hasFile('deficiency_photo_11_R')) {
                    if($request->input('deficiency_11_R')) {
                        $deficiencies[10] = $request->input('deficiency_11_R');
                        $photoName = $request->deficiency_photo_11_R->storeAs('public/uploads', $def_name->hriq_id."_".$def_name->id."_".$request->deficiency_photo_11_R->getClientOriginalName());
                        $deficiency_photos[10] = str_replace('public/uploads/', '', $photoName);
                    }
                }
                if ($request->hasFile('deficiency_photo_12_R')) {
                    if($request->input('deficiency_12_R')) {
                        $deficiencies[11] = $request->input('deficiency_12_R');
                        $photoName = $request->deficiency_photo_12_R->storeAs('public/uploads', $def_name->hriq_id."_".$def_name->id."_".$request->deficiency_photo_12_R->getClientOriginalName());
                        $deficiency_photos[11] = str_replace('public/uploads/', '', $photoName);
                    }
                }
                if ($request->hasFile('deficiency_photo_13_R')) {
                    if($request->input('deficiency_13_R')) {
                        $deficiencies[12] = $request->input('deficiency_13_R');
                        $photoName = $request->deficiency_photo_13_R->storeAs('public/uploads',$def_name->hriq_id."_".$def_name->id."_". $request->deficiency_photo_13_R->getClientOriginalName());
                        $deficiency_photos[12] = str_replace('public/uploads/', '', $photoName);
                    }
                }

                $oldDataRehab = StatusRehab::where('application_id', $id)->get();
                $oldDataRehab = StatusRehab::find($oldDataRehab[0]->id);
                $attachment_1 = $oldDataRehab->attachment_1;
                $thumb_1 = $oldDataRehab->thumb_1;
                $document_spawn = $oldDataRehab->document_spawn;
                if ($request->hasFile('attachment_1_R')) {
                    $photoName = $request->attachment_1_R->storeAs('public/uploads', $request->attachment_1_R->getClientOriginalName());
                    $attachment_1 = str_replace('public/uploads/', '', $photoName);
                }

                if ($request->hasFile('thumb_1_R')) {
                    $photoName = $request->thumb_1_R->storeAs('public/uploads', $request->thumb_1_R->getClientOriginalName());
                    $thumb_1 = str_replace('public/uploads/', '', $photoName);
                }

                if ($request->hasFile('document_spawn_R')) {
                    $photoName = $request->document_spawn_R->storeAs('public/uploads', $request->document_spawn_R->getClientOriginalName());
                    $document_spawn = str_replace('public/uploads/', '', $photoName);
                }

                StatusRehab::where('application_id', $id)->update([
                    'application_id' => $id,
                    'cancellation_request' => $request->input('cancellation_request_R'),
                    'date_inspected' => $request->input('date_inspected_R'),
                    'inspector' => $request->input('inspector_R'),
                    'inspector_email' => $request->input('inspector_email_R'),
                    'superintendent' => $request->input('superintendent_R'),
                    'superintendent_email' => $request->input('superintendent_email_R'),
                    'requester_email' => $request->input('requester_email_R'),
                    'superintendent_phone' => $request->input('superintendent_phone_R'),
                    'document_spawn' => $document_spawn,
                    'document_creation_date' => $request->input('document_creation_date_R'),
                    'inspection_sign_off_date' => $request->input('inspection_sign_off_date_R'),
                    'homeowner_sign_off_date' => $request->input('homeowner_sign_off_date_R'),
                    'superintendent_sign_off_date' => $request->input('superintendent_sign_off_date_R'),
                    'document_name' => $request->input('document_name_R'),
                    'inspector_formula_sign' => $request->input('inspector_formula_sign_R'),
                    'superintendent_formula_sign' => $request->input('superintendent_formula_sign_R'),
                    'general_inspection' => $request->input('gR_i_1') ."_". $request->input('gR_i_2')."_".$request->input('gR_i_3')."_".$request->input('gR_i_4')."_".$request->input('gR_i_5')."_".$request->input('gR_i_6')."_".$request->input('gR_i_7')."_".$request->input('gR_i_8')."_".$request->input('gR_i_9'),
                    'exterior_inspection' => $request->input('eR_i_1')."_".$request->input('eR_i_2')."_".$request->input('eR_i_3')."_".$request->input('eR_i_4')."_".$request->input('eR_i_5')."_".$request->input('eR_i_6')."_".$request->input('eR_i_7')."_".$request->input('eR_i_8')."_".$request->input('eR_i_9')."_".$request->input('eR_i_10'),
                    'interior_inspection' => $request->input('iR_i_1')."_".$request->input('iR_i_2')."_".$request->input('iR_i_3')."_".$request->input('iR_i_4')."_".$request->input('iR_i_5')."_".$request->input('iR_i_6')."_".$request->input('iR_i_7')."_".$request->input('iR_i_8')."_".$request->input('iR_i_9')."_".$request->input('iR_i_10')."_".$request->input('iR_i_11')."_".$request->input('iR_i_12')."_".$request->input('iR_i_13')."_".$request->input('iR_i_14')."_".$request->input('iR_i_15')."_".$request->input('iR_i_16')."_".$request->input('iR_i_17')."_".$request->input('iR_i_18')."_".$request->input('iR_i_19')."_".$request->input('iR_i_20')."_".$request->input('iR_i_21')."_".$request->input('iR_i_22')."_".$request->input('iR_i_23')."_".$request->input('iR_i_24'),
                    'electrical_inspection' => $request->input('elR_i_1')."_".$request->input('elR_i_2')."_".$request->input('elR_i_3')."_".$request->input('elR_i_4')."_".$request->input('elR_i_5')."_".$request->input('elR_i_6')."_".$request->input('elR_i_7')."_".$request->input('elR_i_8'),
                    'accessibility_inspection' => $request->input('aR_i_1')."_".$request->input('aR_i_2')."_".$request->input('aR_i_3')."_".$request->input('aR_i_4')."_".$request->input('aR_i_5'),
                    'additional_information_1' => $request->input('additional_information_1_R'),
                    'additional_information_2' => $request->input('additional_information_2_R'),
                    'additional_information_3' => $request->input('additional_information_3_R'),
                    'additional_information_4' => $request->input('additional_information_4_R'),
                    'additional_notes' => $request->input('additional_notes_R'),
                    'address_text' => $request->input('address_text_R'),
                    'attachment_1' => $attachment_1,
                    'ical_text' => $request->input('ical_text_R'),
                    'contractor_builder_name' => $request->input('contractor_builder_name_R'),
                    'thumb_1' => $thumb_1,
                    'notify_glo' => $request->input('notify_glo_R'),
                ]);

                Photo::where([
                    ['application_id', $id],
                    ['type', 'Rehab']
                ])->update([
                    'photo_1' => $photos[0],
                    'photo_2' => $photos[1],
                    'photo_3' => $photos[2],
                    'photo_4' => $photos[3],
                    'photo_5' => $photos[4],
                    'photo_6' => $photos[5],
                    'photo_7' => $photos[6],
                    'photo_8' => $photos[7],
                    'photo_9' => $photos[8],
                    'photo_10' => $photos[9],
                    'photo_11' => $photos[10],
                    'photo_12' => $photos[11],
                    'photo_13' => $photos[12],
                    'photo_14' => $photos[13],
                    'photo_15' => $photos[14],
                    'photo_16' => $photos[15],
                    'photo_17' => $photos[16],
                    'photo_18' => $photos[17],
                    'photo_19' => $photos[18],
                    'photo_20' => $photos[19],
                    'photo_21' => $photos[20],
                    'photo_22' => $photos[21],
                    'photo_23' => $photos[22],
                    'photo_24' => $photos[23],
                    'photo_25' => $photos[24],
                    'photo_26' => $photos[25],
                    'photo_27' => $photos[26],
                    'photo_28' => $photos[27],
                    'photo_29' => $photos[28],
                    'photo_30' => $photos[29]
                ]);

                Deficiency::where([
                    ['application_id', $id],
                    ['type', 'Rehab']
                ])->update([
                    'deficiency_1' => $deficiencies[0],
                    'deficiency_photo_1' => $deficiency_photos[0],
                    'deficiency_2' => $deficiencies[1],
                    'deficiency_photo_2' => $deficiency_photos[1],
                    'deficiency_3' => $deficiencies[2],
                    'deficiency_photo_3' => $deficiency_photos[2],
                    'deficiency_4' => $deficiencies[3],
                    'deficiency_photo_4' => $deficiency_photos[3],
                    'deficiency_5' => $deficiencies[4],
                    'deficiency_photo_5' => $deficiency_photos[4],
                    'deficiency_6' => $deficiencies[5],
                    'deficiency_photo_6' => $deficiency_photos[5],
                    'deficiency_7' => $deficiencies[6],
                    'deficiency_photo_7' => $deficiency_photos[6],
                    'deficiency_8' => $deficiencies[7],
                    'deficiency_photo_8' => $deficiency_photos[7],
                    'deficiency_9' => $deficiencies[8],
                    'deficiency_photo_9' => $deficiency_photos[8],
                    'deficiency_10' => $deficiencies[9],
                    'deficiency_photo_10' => $deficiency_photos[9],
                    'deficiency_11' => $deficiencies[10],
                    'deficiency_photo_11' => $deficiency_photos[10],
                    'deficiency_12' => $deficiencies[11],
                    'deficiency_photo_12' => $deficiency_photos[11],
                    'deficiency_13' => $deficiencies[12],
                    'deficiency_photo_13' => $deficiency_photos[12],
                ]);
            }
            else {
                $oldPhoto = Photo::where([
                    ['application_id', $id],
                    ['type', '100%']
                ])->get();
                $photos[0] = $oldPhoto[0]->photo_1;
                $photos[1] = $oldPhoto[0]->photo_2;
                $photos[2] = $oldPhoto[0]->photo_3;
                $photos[3] = $oldPhoto[0]->photo_4;
                $photos[4] = $oldPhoto[0]->photo_5;
                $photos[5] = $oldPhoto[0]->photo_6;
                $photos[6] = $oldPhoto[0]->photo_7;
                $photos[7] = $oldPhoto[0]->photo_8;
                $photos[8] = $oldPhoto[0]->photo_9;
                $photos[9] = $oldPhoto[0]->photo_10;
                $photos[10] = $oldPhoto[0]->photo_11;
                $photos[11] = $oldPhoto[0]->photo_12;
                $photos[12] = $oldPhoto[0]->photo_13;
                $photos[13] = $oldPhoto[0]->photo_14;
                $photos[14] = $oldPhoto[0]->photo_15;
                $photos[15] = $oldPhoto[0]->photo_16;
                $photos[16] = $oldPhoto[0]->photo_17;
                $photos[17] = $oldPhoto[0]->photo_18;
                $photos[18] = $oldPhoto[0]->photo_19;
                $photos[19] = $oldPhoto[0]->photo_20;
                $photos[20] = $oldPhoto[0]->photo_21;
                $photos[21] = $oldPhoto[0]->photo_22;
                $photos[22] = $oldPhoto[0]->photo_23;
                $photos[23] = $oldPhoto[0]->photo_24;
                $photos[24] = $oldPhoto[0]->photo_25;
                $photos[25] = $oldPhoto[0]->photo_26;
                $photos[26] = $oldPhoto[0]->photo_27;
                $photos[27] = $oldPhoto[0]->photo_28;
                $photos[28] = $oldPhoto[0]->photo_29;
                $photos[29] = $oldPhoto[0]->photo_30;
                    $doc_name = Application::find($id);
                    if ($request->hasFile('photo_1')) {

                        $photoName = $this->resizeAndSave($request->photo_1,$id);
                        $photos[0] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);

                    }
                    if ($request->hasFile('photo_2')) {

                        $photoName =$this->resizeAndSave($request->photo_2,$id);
                        $photos[1] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                    }
                    if ($request->hasFile('photo_3')) {

                        $photoName =$this->resizeAndSave($request->photo_3,$id);
                        $photos[2] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                    }
                    if ($request->hasFile('photo_4')) {

                        $photoName =$this->resizeAndSave($request->photo_4,$id);
                        $photos[3] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                    }
                    if ($request->hasFile('photo_5')) {

                        $photoName =$this->resizeAndSave($request->photo_5,$id);
                        $photos[4] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                    }
                    if ($request->hasFile('photo_6')) {

                        $photoName =$this->resizeAndSave($request->photo_6,$id);
                        $photos[5] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                    }
                    if ($request->hasFile('photo_7')) {

                        $photoName =$this->resizeAndSave($request->photo_7,$id);
                        $photos[6] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                    }
                    if ($request->hasFile('photo_8')) {

                        $photoName =$this->resizeAndSave($request->photo_8,$id);
                        $photos[7] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                    }
                    if ($request->hasFile('photo_9')) {

                        $photoName =$this->resizeAndSave($request->photo_9,$id);
                        $photos[8] = str_replace('public/uploads/', '',  $doc_name->hriq_id."_".$doc_name->id."_".$photoName);
                    }
                    if ($request->hasFile('photo_10')) {

                        $photoName =$this->resizeAndSave($request->photo_10,$id);
                        $photos[9] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                    }
                    if ($request->hasFile('photo_11')) {

                        $photoName =$this->resizeAndSave($request->photo_11,$id);
                        $photos[10] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                    }
                    if ($request->hasFile('photo_12')) {

                        $photoName =$this->resizeAndSave($request->photo_12,$id);
                        $photos[11] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                    }
                    if ($request->hasFile('photo_13')) {

                        $photoName =$this->resizeAndSave($request->photo_13,$id);
                        $photos[12] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                    }
                    if ($request->hasFile('photo_14')) {

                        $photoName =$this->resizeAndSave($request->photo_14,$id);
                        $photos[13] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                    }
                    if ($request->hasFile('photo_15')) {

                        $photoName =$this->resizeAndSave($request->photo_15,$id);
                        $photos[14] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                    }
                    if ($request->hasFile('photo_16')) {

                        $photoName =$this->resizeAndSave($request->photo_16,$id);
                        $photos[15] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                    }
                    if ($request->hasFile('photo_17')) {

                        $photoName =$this->resizeAndSave($request->photo_17,$id);
                        $photos[16] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                    }
                    if ($request->hasFile('photo_18')) {

                        $photoName =$this->resizeAndSave($request->photo_18,$id);
                        $photos[17] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                    }
                    if ($request->hasFile('photo_19')) {

                        $photoName = $this->resizeAndSave($request->photo_19,$id);
                        $photos[18] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                    }
                    if ($request->hasFile('photo_20')) {

                        $photoName =$this->resizeAndSave($request->photo_20,$id);
                        $photos[19] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                    }
                    if ($request->hasFile('photo_21')) {

                        $photoName =$this->resizeAndSave($request->photo_21,$id);
                        $photos[20] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                    }
                    if ($request->hasFile('photo_22')) {

                        $photoName =$this->resizeAndSave($request->photo_22,$id);
                        $photos[21] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                    }
                    if ($request->hasFile('photo_23')) {

                        $photoName =$this->resizeAndSave($request->photo_23,$id);
                        $photos[22] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                    }
                    if ($request->hasFile('photo_24')) {

                        $photoName =$this->resizeAndSave($request->photo_24,$id);
                        $photos[23] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                    }
                    if ($request->hasFile('photo_25')) {

                        $photoName =$this->resizeAndSave($request->photo_25,$id);
                        $photos[24] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                    }
                    if ($request->hasFile('photo_26')) {

                        $photoName =$this->resizeAndSave($request->photo_26,$id);
                        $photos[25] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                    }
                    if ($request->hasFile('photo_27')) {

                        $photoName =$this->resizeAndSave($request->photo_27,$id);
                        $photos[26] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                    }
                    if ($request->hasFile('photo_28')) {

                        $photoName =$this->resizeAndSave($request->photo_28,$id);
                        $photos[27] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                    }
                    if ($request->hasFile('photo_29')) {

                        $photoName =$this->resizeAndSave($request->photo_29,$id);
                        $photos[28] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                    }
                    if ($request->hasFile('photo_30')) {

                        $photoName =$this->resizeAndSave($request->photo_30,$id);
                        $photos[29] = str_replace('public/uploads/', '', $doc_name->hriq_id."_".$doc_name->id."_". $photoName);
                    }


                $oldDeficiency = Deficiency::where([
                    ['application_id', $id],
                    ['type', '100%']
                ])->get();
                $deficiencies[0] = $oldDeficiency[0]->deficiency_1;
                $deficiencies[1] = $oldDeficiency[0]->deficiency_2;
                $deficiencies[2] = $oldDeficiency[0]->deficiency_3;
                $deficiencies[3] = $oldDeficiency[0]->deficiency_4;
                $deficiencies[4] = $oldDeficiency[0]->deficiency_5;
                $deficiencies[5] = $oldDeficiency[0]->deficiency_6;
                $deficiencies[6] = $oldDeficiency[0]->deficiency_7;
                $deficiencies[7] = $oldDeficiency[0]->deficiency_8;
                $deficiencies[8] = $oldDeficiency[0]->deficiency_9;
                $deficiencies[9] = $oldDeficiency[0]->deficiency_10;
                $deficiencies[10] = $oldDeficiency[0]->deficiency_11;
                $deficiencies[11] = $oldDeficiency[0]->deficiency_12;
                $deficiencies[12] = $oldDeficiency[0]->deficiency_13;

                $deficiency_photos[0] = $oldDeficiency[0]->deficiency_photo_1;
                $deficiency_photos[1] = $oldDeficiency[0]->deficiency_photo_2;
                $deficiency_photos[2] = $oldDeficiency[0]->deficiency_photo_3;
                $deficiency_photos[3] = $oldDeficiency[0]->deficiency_photo_4;
                $deficiency_photos[4] = $oldDeficiency[0]->deficiency_photo_5;
                $deficiency_photos[5] = $oldDeficiency[0]->deficiency_photo_6;
                $deficiency_photos[6] = $oldDeficiency[0]->deficiency_photo_7;
                $deficiency_photos[7] = $oldDeficiency[0]->deficiency_photo_8;
                $deficiency_photos[8] = $oldDeficiency[0]->deficiency_photo_9;
                $deficiency_photos[9] = $oldDeficiency[0]->deficiency_photo_10;
                $deficiency_photos[10] = $oldDeficiency[0]->deficiency_photo_11;
                $deficiency_photos[11] = $oldDeficiency[0]->deficiency_photo_12;
                $deficiency_photos[12] = $oldDeficiency[0]->deficiency_photo_13;
                $def_name = Application::find($id);
                if ($request->hasFile('deficiency_photo_1')) {
                    if($request->input('deficiency_1')) {
                        $deficiencies[0] = $request->input('deficiency_1');
                        $photoName = $request->deficiency_photo_1->storeAs('public/uploads', $def_name->hriq_id."_".$def_name->id."_". $request->deficiency_photo_1->getClientOriginalName());
                        $deficiency_photos[0] = str_replace('public/uploads/', '', $photoName);
                    }
                }
                if ($request->hasFile('deficiency_photo_2')) {
                    if($request->input('deficiency_2')) {
                        $deficiencies[1] = $request->input('deficiency_2');
                        $photoName = $request->deficiency_photo_2->storeAs('public/uploads', $def_name->hriq_id."_".$def_name->id."_". $request->deficiency_photo_2->getClientOriginalName());
                        $deficiency_photos[1] = str_replace('public/uploads/', '', $photoName);
                    }
                }
                if ($request->hasFile('deficiency_photo_3')) {
                    if($request->input('deficiency_3')) {
                        $deficiencies[2] = $request->input('deficiency_3');
                        $photoName = $request->deficiency_photo_3->storeAs('public/uploads', $def_name->hriq_id."_".$def_name->id."_". $request->deficiency_photo_3->getClientOriginalName());
                        $deficiency_photos[2] = str_replace('public/uploads/', '', $photoName);
                    }
                }
                if ($request->hasFile('deficiency_photo_4')) {
                    if($request->input('deficiency_4')) {
                        $deficiencies[3] = $request->input('deficiency_4');
                        $photoName = $request->deficiency_photo_4->storeAs('public/uploads', $def_name->hriq_id."_".$def_name->id."_". $request->deficiency_photo_4->getClientOriginalName());
                        $deficiency_photos[3] = str_replace('public/uploads/', '', $photoName);
                    }
                }
                if ($request->hasFile('deficiency_photo_5')) {
                    if($request->input('deficiency_5')) {
                        $deficiencies[4] = $request->input('deficiency_5');
                        $photoName = $request->deficiency_photo_5->storeAs('public/uploads',  $def_name->hriq_id."_".$def_name->id."_". $request->deficiency_photo_5->getClientOriginalName());
                        $deficiency_photos[4] = str_replace('public/uploads/', '', $photoName);
                    }
                }
                if ($request->hasFile('deficiency_photo_6')) {
                    if($request->input('deficiency_6')) {
                        $deficiencies[5] = $request->input('deficiency_6');
                        $photoName = $request->deficiency_photo_6->storeAs('public/uploads',  $def_name->hriq_id."_".$def_name->id."_". $request->deficiency_photo_6->getClientOriginalName());
                        $deficiency_photos[5] = str_replace('public/uploads/', '', $photoName);
                    }
                }
                if ($request->hasFile('deficiency_photo_7')) {
                    if($request->input('deficiency_7')) {
                        $deficiencies[6] = $request->input('deficiency_7');
                        $photoName = $request->deficiency_photo_7->storeAs('public/uploads', $def_name->hriq_id."_".$def_name->id."_". $request->deficiency_photo_7->getClientOriginalName());
                        $deficiency_photos[6] = str_replace('public/uploads/', '', $photoName);
                    }
                }
                if ($request->hasFile('deficiency_photo_8')) {
                    if($request->input('deficiency_8')) {
                        $deficiencies[7] = $request->input('deficiency_8');
                        $photoName = $request->deficiency_photo_8->storeAs('public/uploads', $def_name->hriq_id."_".$def_name->id."_". $request->deficiency_photo_8->getClientOriginalName());
                        $deficiency_photos[7] = str_replace('public/uploads/', '', $photoName);
                    }
                }
                if ($request->hasFile('deficiency_photo_9')) {
                    if($request->input('deficiency_9')) {
                        $deficiencies[8] = $request->input('deficiency_9');
                        $photoName = $request->deficiency_photo_9->storeAs('public/uploads', $def_name->hriq_id."_".$def_name->id."_". $request->deficiency_photo_9->getClientOriginalName());
                        $deficiency_photos[8] = str_replace('public/uploads/', '', $photoName);
                    }
                }
                if ($request->hasFile('deficiency_photo_10')) {
                    if($request->input('deficiency_10')) {
                        $deficiencies[9] = $request->input('deficiency_10');
                        $photoName = $request->deficiency_photo_10->storeAs('public/uploads', $def_name->hriq_id."_".$def_name->id."_". $request->deficiency_photo_10->getClientOriginalName());
                        $deficiency_photos[9] = str_replace('public/uploads/', '', $photoName);
                    }
                }
                if ($request->hasFile('deficiency_photo_11')) {
                    if($request->input('deficiency_11')) {
                        $deficiencies[10] = $request->input('deficiency_11');
                        $photoName = $request->deficiency_photo_11->storeAs('public/uploads',  $def_name->hriq_id."_".$def_name->id."_".$request->deficiency_photo_11->getClientOriginalName());
                        $deficiency_photos[10] = str_replace('public/uploads/', '', $photoName);
                    }
                }
                if ($request->hasFile('deficiency_photo_12')) {
                    if($request->input('deficiency_12')) {
                        $deficiencies[11] = $request->input('deficiency_12');
                        $photoName = $request->deficiency_photo_12->storeAs('public/uploads',  $def_name->hriq_id."_".$def_name->id."_".$request->deficiency_photo_12->getClientOriginalName());
                        $deficiency_photos[11] = str_replace('public/uploads/', '', $photoName);
                    }
                }
                if ($request->hasFile('deficiency_photo_13')) {
                    if($request->input('deficiency_13')) {
                        $deficiencies[12] = $request->input('deficiency_13');
                        $photoName = $request->deficiency_photo_13->storeAs('public/uploads', $def_name->hriq_id."_".$def_name->id."_". $request->deficiency_photo_13->getClientOriginalName());
                        $deficiency_photos[12] = str_replace('public/uploads/', '', $photoName);
                    }
                }

                $oldData100 = Status100::where('application_id', $id)->get();
                $oldData100 = Status100::find($oldData100[0]->id);
                $attachment_1 = $oldData100->attachment_1;
                $thumb_1 = $oldData100->thumb_1;
                $document_spawn = $oldData100->document_spawn;
                if ($request->hasFile('attachment_1')) {
                    $photoName = $request->attachment_1->storeAs('public/uploads', $request->attachment_1->getClientOriginalName());
                    $attachment_1 = str_replace('public/uploads/', '', $photoName);
                }

                if ($request->hasFile('thumb_1')) {
                    $photoName = $request->thumb_1->storeAs('public/uploads', $request->thumb_1->getClientOriginalName());
                    $thumb_1 = str_replace('public/uploads/', '', $photoName);
                }

                if ($request->hasFile('document_spawn')) {
                    $photoName = $request->document_spawn->storeAs('public/uploads', $request->document_spawn->getClientOriginalName());
                    $document_spawn = str_replace('public/uploads/', '', $photoName);
                }
                Status100::where('application_id', $id)->update([
                    'application_id' => $id,
                    'cancellation_request' => $request->input('cancellation_request'),
                    'date_inspected' => $request->input('date_inspected'),
                    'inspector' => $request->input('inspector'),
                    'inspector_email' => $request->input('inspector_email'),
                    'superintendent' => $request->input('superintendent'),
                    'superintendent_email' => $request->input('superintendent_email'),
                    'requester_email' => $request->input('requester_email'),
                    'superintendent_phone' => $request->input('superintendent_phone'),
                    'document_spawn' => $document_spawn,
                    'document_creation_date' => $request->input('document_creation_date'),
                    'inspection_sign_off_date' => $request->input('inspection_sign_off_date'),
                    'homeowner_sign_off_date' => $request->input('homeowner_sign_off_date'),
                    'superintendent_sign_off_date' => $request->input('superintendent_sign_off_date'),
                    'document_name' => $request->input('document_name'),
                    'inspector_formula_sign' => $request->input('inspector_formula_sign'),
                    'superintendent_formula_sign' => $request->input('superintendent_formula_sign'),
                    'general_inspection' => $request->input('g_i_1') ."_". $request->input('g_i_2')."_".$request->input('g_i_3')."_".$request->input('g_i_4')."_".$request->input('g_i_5')."_".$request->input('g_i_6')."_".$request->input('g_i_7')."_".$request->input('g_i_8')."_".$request->input('g_i_9')."_".$request->input('g_i_10')."_".$request->input('g_i_11')."_".$request->input('g_i_12')."_".$request->input('g_i_13')."_".$request->input('g_i_14')."_".$request->input('g_i_15')."_".$request->input('g_i_16')."_".$request->input('g_i_17')."_".$request->input('g_i_18')."_".$request->input('g_i_19')."_".$request->input('g_i_20')."_".$request->input('g_i_21')."_".$request->input('g_i_22')."_".$request->input('g_i_23')."_".$request->input('g_i_24'),
                    'exterior_inspection' => $request->input('e_i_1')."_".$request->input('e_i_2')."_".$request->input('e_i_3')."_".$request->input('e_i_4')."_".$request->input('e_i_5')."_".$request->input('e_i_6')."_".$request->input('e_i_7')."_".$request->input('e_i_8')."_".$request->input('e_i_9')."_".$request->input('e_i_10')."_".$request->input('e_i_11')."_".$request->input('e_i_12')."_".$request->input('e_i_13')."_".$request->input('e_i_14')."_".$request->input('e_i_15')."_".$request->input('e_i_16')."_".$request->input('e_i_17'),
                    'interior_inspection' => $request->input('i_i_1')."_".$request->input('i_i_2')."_".$request->input('i_i_3')."_".$request->input('i_i_4')."_".$request->input('i_i_5')."_".$request->input('i_i_6')."_".$request->input('i_i_7')."_".$request->input('i_i_8')."_".$request->input('i_i_9')."_".$request->input('i_i_10')."_".$request->input('i_i_11')."_".$request->input('i_i_12')."_".$request->input('i_i_13')."_".$request->input('i_i_14')."_".$request->input('i_i_15')."_".$request->input('i_i_16')."_".$request->input('i_i_17')."_".$request->input('i_i_18')."_".$request->input('i_i_19')."_".$request->input('i_i_20')."_".$request->input('i_i_21')."_".$request->input('i_i_22')."_".$request->input('i_i_23')."_".$request->input('i_i_24')."_".$request->input('i_i_25')."_".$request->input('i_i_26')."_".$request->input('i_i_27')."_".$request->input('i_i_28')."_".$request->input('i_i_29')."_".$request->input('i_i_30')."_".$request->input('i_i_31')."_".$request->input('i_i_32')."_".$request->input('i_i_33')."_".$request->input('i_i_34')."_".$request->input('i_i_35'),
                    'electrical_inspection' => $request->input('el_i_1')."_".$request->input('el_i_2')."_".$request->input('el_i_3')."_".$request->input('el_i_4')."_".$request->input('el_i_5')."_".$request->input('el_i_6')."_".$request->input('el_i_7')."_".$request->input('el_i_8')."_".$request->input('el_i_9')."_".$request->input('el_i_10')."_".$request->input('el_i_11'),
                    'accessibility_inspection' => $request->input('a_i_1')."_".$request->input('a_i_2')."_".$request->input('a_i_3')."_".$request->input('a_i_4')."_".$request->input('a_i_5')."_".$request->input('a_i_6'),
                    'additional_information_1' => $request->input('additional_information_1'),
                    'additional_information_2' => $request->input('additional_information_2'),
                    'additional_information_3' => $request->input('additional_information_3'),
                    'additional_information_4' => $request->input('additional_information_4'),
                    'additional_notes' => $request->input('additional_notes'),
                    'address_text' => $request->input('address_text'),
                    'attachment_1' => $attachment_1,
                    'ical_text' => $request->input('ical_text'),
                    'contractor_builder_name' => $request->input('contractor_builder_name'),
                    'thumb_1' => $thumb_1,
                    'notify_glo' => $request->input('notify_glo'),
                ]);

                Photo::where([
                    ['application_id', $id],
                    ['type', '100%']
                ])->update([
                    'photo_1' => $photos[0],
                    'photo_2' => $photos[1],
                    'photo_3' => $photos[2],
                    'photo_4' => $photos[3],
                    'photo_5' => $photos[4],
                    'photo_6' => $photos[5],
                    'photo_7' => $photos[6],
                    'photo_8' => $photos[7],
                    'photo_9' => $photos[8],
                    'photo_10' => $photos[9],
                    'photo_11' => $photos[10],
                    'photo_12' => $photos[11],
                    'photo_13' => $photos[12],
                    'photo_14' => $photos[13],
                    'photo_15' => $photos[14],
                    'photo_16' => $photos[15],
                    'photo_17' => $photos[16],
                    'photo_18' => $photos[17],
                    'photo_19' => $photos[18],
                    'photo_20' => $photos[19],
                    'photo_21' => $photos[20],
                    'photo_22' => $photos[21],
                    'photo_23' => $photos[22],
                    'photo_24' => $photos[23],
                    'photo_25' => $photos[24],
                    'photo_26' => $photos[25],
                    'photo_27' => $photos[26],
                    'photo_28' => $photos[27],
                    'photo_29' => $photos[28],
                    'photo_30' => $photos[29]
                ]);

                Deficiency::where([
                    ['application_id', $id],
                    ['type', '100%']
                ])->update([
                    'deficiency_1' => $deficiencies[0],
                    'deficiency_photo_1' => $deficiency_photos[0],
                    'deficiency_2' => $deficiencies[1],
                    'deficiency_photo_2' => $deficiency_photos[1],
                    'deficiency_3' => $deficiencies[2],
                    'deficiency_photo_3' => $deficiency_photos[2],
                    'deficiency_4' => $deficiencies[3],
                    'deficiency_photo_4' => $deficiency_photos[3],
                    'deficiency_5' => $deficiencies[4],
                    'deficiency_photo_5' => $deficiency_photos[4],
                    'deficiency_6' => $deficiencies[5],
                    'deficiency_photo_6' => $deficiency_photos[5],
                    'deficiency_7' => $deficiencies[6],
                    'deficiency_photo_7' => $deficiency_photos[6],
                    'deficiency_8' => $deficiencies[7],
                    'deficiency_photo_8' => $deficiency_photos[7],
                    'deficiency_9' => $deficiencies[8],
                    'deficiency_photo_9' => $deficiency_photos[8],
                    'deficiency_10' => $deficiencies[9],
                    'deficiency_photo_10' => $deficiency_photos[9],
                    'deficiency_11' => $deficiencies[10],
                    'deficiency_photo_11' => $deficiency_photos[10],
                    'deficiency_12' => $deficiencies[11],
                    'deficiency_photo_12' => $deficiency_photos[11],
                    'deficiency_13' => $deficiencies[12],
                    'deficiency_photo_13' => $deficiency_photos[12],
                ]);
            }
        }

        $application = Application::where('id', $id)->update([
            'hriq_id' => $request->input('hriq_id'),
            'submitted_glo' => $request->input('submitted_to_glo'),
            'date_glo_submission' => $request->input('date_glo_submission'),
            'applicant_name' => $request->input('applicant_name'),
            'applicant_address' => $request->input('applicant_street_address'),
            'applicant_city' => $request->input('applicant_city'),
            'applicant_county' => $request->input('applicant_county'),
            'requested_date' => $request->input('requested_date'),
            'requested_time' => $request->input('requested_time'),
            'construction_type' => $request->input('construction_type'),
            'floor_plan' => $request->input('floor_plan'),
            'inspection_type' => $request->input('inspection_type'),
            'region' => $request->input('region'),
            'requester_name' => $request->input('requester_name'),
            'requester_email' => $request->input('requester_email_1'),
            'requester_phone' => $request->input('requester_phone'),
            'supervisor_name' => $request->input('onsite_supervisor_name'),
            'supervisor_email' => $request->input('onsite_supervisor_email'),
            'supervisor_phone' => $request->input('onsite_supervisor_phone'),
            //'inspector_id' => $request->input('inspector_id'),
            'inspection_status' => $request->input('inspection_status'),
            'scheduled_inspection_date' => $request->input('scheduled_inspection_date'),
            'scheduled_inspection_time' => $request->input('scheduled_inspection_time'),
            //'comments' => $request->input('comments')
        ]);

        if(trim($request->input("comments")) || $request->hasFile('comment_attachment')) {
            $comment_attachment = null;
            if ($request->hasFile('comment_attachment')) {
                $comment_attachment = $request->input('comment_attachment');
                $photoName = $request->comment_attachment->storeAs('public/uploads', date('YmdHis').$request->comment_attachment->getClientOriginalName());
                $comment_attachment = str_replace('public/uploads/', '', $photoName);
            }

            Comment::create([
                'application_id' => $id,
                'user_id' => Auth::user()->id,
                'comments' => $request->input("comments"),
                'datetime' => date('Y-m-d H:i:s'),
                'attachment' => $comment_attachment
            ]);
        }

        if($request->input('inspection_status') != $old_data->inspection_status) {
            $admins = User::where([
                ['role_id', 2],
                ['status', 1]
            ])->get();
            foreach ($admins as $admin) {
                dispatch(new StatusChangeJob(Auth::user()->id, $admin->email, $id));
            }

            if($request->input('inspector_assigned')) {
                $inspector_email = User::find($request->input('inspector_assigned'));
                if($inspector_email->status == 1) {
                    $inspector_email = $inspector_email->email;
                    dispatch(new StatusChangeJob(Auth::user()->id, $inspector_email, $id));
                }
            }

            if($old_data->requester_id != null) {
                $contractor_email = User::find($old_data->requester_id);
                if($contractor_email->status == 1) {
                    $contractor_email = $contractor_email->email;
                    dispatch(new StatusChangeJob(Auth::user()->id, $contractor_email, $id));
                }
            }

            $statusChangeEmail = 1;
        }

        Auditor::create([
            'user_id' => Auth::user()->id,
            'notification' => '<a href="'.url('admin/view-application/'.$id).'">HRIQ ID '.$request->input('hriq_id').'</a>  Application Updated',
            'date' => strtotime(date('Y-m-d H:i:s')),
            'status' => 'unseen'
        ]);

        if($inspectorChangeEmail != 1 && $statusChangeEmail != 1) {
            $admins = User::where([
                ['role_id', 2],
                ['status', 1]
            ])->get();
            foreach ($admins as $admin) {
                dispatch(new UpdateApplicationJob(Auth::user()->id, $admin->email, $id));
            }
        }

        $thisApplication = Application::find($id);
        if($request->input('inspection_status') == 'Submitted' && ($request->input('inspection_type') == '100%' ||  $request->input('inspection_type') == 'TREC'|| $request->input('inspection_type') == 'REHAB' ) && $thisApplication->previous_application_id == null) {
            $check = Application::where('previous_application_id', $id)->get();
            if(count($check) == 0) {
                $newApplication = Application::create([
                    'previous_application_id' => $id,
                    'document_1' => $thisApplication->document_1,
                    'document_file_1' => $thisApplication->document_file_1,
                    'document_2' => $thisApplication->document_2,
                    'document_file_2' => $thisApplication->document_file_2,
                    'document_3' => $thisApplication->document_3,
                    'document_file_3' => $thisApplication->document_file_3,
                    'document_4' => $thisApplication->document_4,
                    'document_file_4' => $thisApplication->document_file_4,
                    'document_5' => $thisApplication->document_5,
                    'document_file_5' => $thisApplication->document_file_5,
                    'document_6' => $thisApplication->document_6,
                    'document_file_6' => $thisApplication->document_file_6,
                    'document_7' => $thisApplication->document_7,
                    'document_file_7' => $thisApplication->document_file_7,
                    'document_8' => $thisApplication->document_8,
                    'document_file_8' => $thisApplication->document_file_8,
                    'hriq_id' => $thisApplication->hriq_id,
                    'submitted_glo' => $thisApplication->submitted_glo,
                    'date_glo_submission' => $thisApplication->date_glo_submission,
                    'application_id' => $thisApplication->application_id,
                    'applicant_name' => $thisApplication->applicant_name,
                    'applicant_address' => $thisApplication->applicant_address,
                    'applicant_city' => $thisApplication->applicant_city,
                    'applicant_county' => $thisApplication->applicant_county,
                    'requester_id' => $thisApplication->requester_id,
                    'requester_name' => $thisApplication->requester_name,
                    'requester_email' => $thisApplication->requester_email,
                    'requester_phone' => $thisApplication->requester_phone,
                    'company' => $thisApplication->company,
                    'requested_date' => $thisApplication->requested_date,
                    'requested_time' => $thisApplication->requested_time,
                    'construction_type' => $thisApplication->construction_type,
                    'floor_plan' => $thisApplication->floor_plan,
                    'inspection_type' => 'TREC',
                    'region' => $thisApplication->region,
                    'supervisor_name' => $thisApplication->supervisor_name,
                    'supervisor_email' => $thisApplication->supervisor_email,
                    'supervisor_phone' => $thisApplication->supervisor_phone,
                    //'inspector_id' => $thisApplication->inspector_id,
                    //'inspection_status' => $thisApplication->inspection_status,
                    //'scheduled_inspection_date' => $thisApplication->scheduled_inspection_date,
                    //'scheduled_inspection_time' => $thisApplication->scheduled_inspection_time,
                    'comments' => $thisApplication->comments,
                    'company_id' => $thisApplication->company_id
                ]);

                $comments = Comment::where('application_id', $id)->get();
                foreach ($comments as $comment) {
                    Comment::create([
                        'application_id' => $newApplication['id'],
                        'user_id' => $comment->user_id,
                        'comments' => $comment->comments,
                        'attachment' => $comment->attachment,
                        'datetime' => $comment->created_at,
                    ]);
                }

                $thisStatus100 = Status100::where('application_id', $id)->get();
                Status100::create([
                    'application_id' => $newApplication['id'],
                    'inspector_id' => $thisStatus100[0]->inspector_id,
                    'cancellation_request' => $thisStatus100[0]->cancellation_request,
                    'date_inspected' => $thisStatus100[0]->date_inspected,
                    'inspector' => $thisStatus100[0]->inspector,
                    'inspector_email' => $thisStatus100[0]->inspector_email,
                    'superintendent' => $thisStatus100[0]->superintendent,
                    'superintendent_email' => $thisStatus100[0]->superintendent_email,
                    'requester_email' => $thisStatus100[0]->requester_email,
                    'superintendent_phone' => $thisStatus100[0]->superintendent_phone,
                    'document_spawn' => $thisStatus100[0]->document_spawn,
                    'document_creation_date' => $thisStatus100[0]->document_creation_date,
                    'inspection_sign' => $thisStatus100[0]->inspection_sign,
                    'inspection_sign_off_date' => $thisStatus100[0]->inspection_sign_off_date,
                    'homeowner_sign' => $thisStatus100[0]->homeowner_sign,
                    'homeowner_sign_off_date' => $thisStatus100[0]->homeowner_sign_off_date,
                    'superintendent_sign' => $thisStatus100[0]->superintendent_sign,
                    'superintendent_sign_off_date' => $thisStatus100[0]->superintendent_sign_off_date,
                    'document_name' => $thisStatus100[0]->document_name,
                    'inspector_formula_sign' => $thisStatus100[0]->inspector_formula_sign,
                    'superintendent_formula_sign' => $thisStatus100[0]->superintendent_formula_sign,
                    'general_inspection' => $thisStatus100[0]->general_inspection,
                    'exterior_inspection' => $thisStatus100[0]->exterior_inspection,
                    'interior_inspection' => $thisStatus100[0]->interior_inspection,
                    'electrical_inspection' => $thisStatus100[0]->electrical_inspection,
                    'accessibility_inspection' => $thisStatus100[0]->accessibility_inspection,
                    'additional_information_1' => $thisStatus100[0]->additional_information_1,
                    'additional_information_2' => $thisStatus100[0]->additional_information_2,
                    'additional_information_3' => $thisStatus100[0]->additional_information_3,
                    'additional_information_4' => $thisStatus100[0]->additional_information_4,
                    'additional_notes' => $thisStatus100[0]->additional_notes,
                    'address_text' => $thisStatus100[0]->address_text,
                    'attachment_1' => $thisStatus100[0]->attachment_1,
                    'ical_text' => $thisStatus100[0]->ical_text,
                    'contractor_builder_name' => $thisStatus100[0]->contractor_builder_name,
                    'thumb_1' => $thisStatus100[0]->thumb_1,
                    'notify_glo' => $thisStatus100[0]->notify_glo,
                ]);

                $thisPhoto = Photo::where([
                    ['application_id', $id],
                    ['type', '100%']
                ])->get();
                Photo::create([
                    'application_id' => $newApplication['id'],
                    'type' => '100%',
                    'photo_1' => $thisPhoto[0]->photo_1,
                    'photo_2' => $thisPhoto[0]->photo_2,
                    'photo_3' => $thisPhoto[0]->photo_3,
                    'photo_4' => $thisPhoto[0]->photo_4,
                    'photo_5' => $thisPhoto[0]->photo_5,
                    'photo_6' => $thisPhoto[0]->photo_6,
                    'photo_7' => $thisPhoto[0]->photo_7,
                    'photo_8' => $thisPhoto[0]->photo_8,
                    'photo_9' => $thisPhoto[0]->photo_9,
                    'photo_10' => $thisPhoto[0]->photo_10,
                    'photo_11' => $thisPhoto[0]->photo_11,
                    'photo_12' => $thisPhoto[0]->photo_12,
                    'photo_13' => $thisPhoto[0]->photo_13,
                    'photo_14' => $thisPhoto[0]->photo_14,
                    'photo_15' => $thisPhoto[0]->photo_15,
                    'photo_16' => $thisPhoto[0]->photo_16,
                    'photo_17' => $thisPhoto[0]->photo_17,
                    'photo_18' => $thisPhoto[0]->photo_18,
                    'photo_19' => $thisPhoto[0]->photo_19,
                    'photo_20' => $thisPhoto[0]->photo_20,
                    'photo_21' => $thisPhoto[0]->photo_21,
                    'photo_22' => $thisPhoto[0]->photo_22,
                    'photo_23' => $thisPhoto[0]->photo_23,
                    'photo_24' => $thisPhoto[0]->photo_24,
                    'photo_25' => $thisPhoto[0]->photo_25,
                    'photo_26' => $thisPhoto[0]->photo_26,
                    'photo_27' => $thisPhoto[0]->photo_27,
                    'photo_28' => $thisPhoto[0]->photo_28,
                    'photo_29' => $thisPhoto[0]->photo_29,
                    'photo_30' => $thisPhoto[0]->photo_30
                ]);

                $thisDeficiency = Deficiency::where([
                    ['application_id', $id],
                    ['type', '100%']
                ])->get();
                Deficiency::create([
                    'application_id' => $newApplication['id'],
                    'type' => '100%',
                    'deficiency_1' => $thisDeficiency[0]->deficiency_1,
                    'deficiency_photo_1' => $thisDeficiency[0]->deficiency_photo_1,
                    'deficiency_2' => $thisDeficiency[0]->deficiency_2,
                    'deficiency_photo_2' => $thisDeficiency[0]->deficiency_photo_2,
                    'deficiency_3' => $thisDeficiency[0]->deficiency_3,
                    'deficiency_photo_3' => $thisDeficiency[0]->deficiency_photo_3,
                    'deficiency_4' => $thisDeficiency[0]->deficiency_4,
                    'deficiency_photo_4' => $thisDeficiency[0]->deficiency_photo_4,
                    'deficiency_5' => $thisDeficiency[0]->deficiency_5,
                    'deficiency_photo_5' => $thisDeficiency[0]->deficiency_photo_5,
                    'deficiency_6' => $thisDeficiency[0]->deficiency_6,
                    'deficiency_photo_6' => $thisDeficiency[0]->deficiency_photo_6,
                    'deficiency_7' => $thisDeficiency[0]->deficiency_7,
                    'deficiency_photo_7' => $thisDeficiency[0]->deficiency_photo_7,
                    'deficiency_8' => $thisDeficiency[0]->deficiency_8,
                    'deficiency_photo_8' => $thisDeficiency[0]->deficiency_photo_8,
                    'deficiency_9' => $thisDeficiency[0]->deficiency_9,
                    'deficiency_photo_9' => $thisDeficiency[0]->deficiency_photo_9,
                    'deficiency_10' => $thisDeficiency[0]->deficiency_10,
                    'deficiency_photo_10' => $thisDeficiency[0]->deficiency_photo_10,
                    'deficiency_11' => $thisDeficiency[0]->deficiency_11,
                    'deficiency_photo_11' => $thisDeficiency[0]->deficiency_photo_11,
                    'deficiency_12' => $thisDeficiency[0]->deficiency_12,
                    'deficiency_photo_12' => $thisDeficiency[0]->deficiency_photo_12,
                    'deficiency_13' => $thisDeficiency[0]->deficiency_13,
                    'deficiency_photo_13' => $thisDeficiency[0]->deficiency_photo_13,
                ]);
            }
            else {
                Application::where('previous_application_id', $id)->update([
                    'document_1' => $thisApplication->document_1,
                    'document_file_1' => $thisApplication->document_file_1,
                    'document_2' => $thisApplication->document_2,
                    'document_file_2' => $thisApplication->document_file_2,
                    'document_3' => $thisApplication->document_3,
                    'document_file_3' => $thisApplication->document_file_3,
                    'document_4' => $thisApplication->document_4,
                    'document_file_4' => $thisApplication->document_file_4,
                    'document_5' => $thisApplication->document_5,
                    'document_file_5' => $thisApplication->document_file_5,
                    'document_6' => $thisApplication->document_6,
                    'document_file_6' => $thisApplication->document_file_6,
                    'document_7' => $thisApplication->document_7,
                    'document_file_7' => $thisApplication->document_file_7,
                    'document_8' => $thisApplication->document_8,
                    'document_file_8' => $thisApplication->document_file_8,
                    'hriq_id' => $thisApplication->hriq_id,
                    'submitted_glo' => $thisApplication->submitted_glo,
                    'date_glo_submission' => $thisApplication->date_glo_submission,
                    'application_id' => $thisApplication->application_id,
                    'applicant_name' => $thisApplication->applicant_name,
                    'applicant_address' => $thisApplication->applicant_address,
                    'applicant_city' => $thisApplication->applicant_city,
                    'applicant_county' => $thisApplication->applicant_county,
                    'requester_id' => $thisApplication->requester_id,
                    'requester_name' => $thisApplication->requester_name,
                    'requester_email' => $thisApplication->requester_email,
                    'requester_phone' => $thisApplication->requester_phone,
                    'company' => $thisApplication->company,
                    'requested_date' => $thisApplication->requested_date,
                    'requested_time' => $thisApplication->requested_time,
                    'construction_type' => $thisApplication->construction_type,
                    'floor_plan' => $thisApplication->floor_plan,
                    'inspection_type' => "TREC",
                    'region' => $thisApplication->region,
                    'supervisor_name' => $thisApplication->supervisor_name,
                    'supervisor_email' => $thisApplication->supervisor_email,
                    'supervisor_phone' => $thisApplication->supervisor_phone,
                    'inspector_id' => $thisApplication->inspector_id,
                    'inspection_status' => $thisApplication->inspection_status,
                    'scheduled_inspection_date' => $thisApplication->scheduled_inspection_date,
                    'scheduled_inspection_time' => $thisApplication->scheduled_inspection_time,
                    'comments' => $thisApplication->comments,
                    'company_id' => $thisApplication->company_id
                ]);
            }
        }
        ///New changes 20-06-2022 --Updated Appliaction
        session()->flash('message', 'application_updated');
        $submitType = $request->input('submitType');
        if($submitType == 'saveClose') {
            return Redirect::to('/');
        } else if($submitType == 'saveContinue') {
            if(Auth::user()->role_id == 1) {
                return Redirect::to('contractor/edit-application/'.$id);
            } else if(Auth::user()->role_id == 2) {
                return Redirect::to('admin/edit-application/'.$id);
            } else {
                return Redirect::to('inspector/edit-application/'.$id);
            }
        } else if($submitType == 'savePrint') {
            if(Auth::user()->role_id == 1) {
                return Redirect::to('contractor/edit-application/'.$id);

            }
            else if(Auth::user()->role_id == 2) {
                if($request->input('inspection_type') == '50%') {
                    $this->generatepdf($id);
                }
                else if($request->input('inspection_type') == 'REHAB') {
                    $this->generatepdfr($id);
                } else {
                    $this->generatepdfs($id);
                }
            }
            else {
                return Redirect::to('inspector/edit-application/'.$id);
            }


        }
        //end code-----------------------------
    }

    private function resizeAndSave($value,$id){

        $doc_name = Application::find($id);
        $destinationPath = storage_path('app/public/uploads');

        $img = Image::make($value->getRealPath());

        $img->resize(500, 500, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$doc_name->hriq_id."_".$doc_name->id."_".$value->getClientOriginalName());

        return 'public/uploads/'.$value->getClientOriginalName();
    }

    private function imageConvertAsPdf($value,$id){
        $doc_name = Application::find($id);
            $images = File::allFiles(storage_path('app/public/tempory-image'));
            File::delete($images);

            $destinationPath = storage_path('app/public/tempory-image');

            $img = Image::make($value->getRealPath());

            $img->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$value->getClientOriginalName());

            $files = File::allFiles(storage_path('app/public/tempory-image'));
            $data = ['images' => $files];
            $pdf_load = PDF::loadView('myPDF', $data);

            Storage::disk('public')->put('uploads/'.preg_replace('/\..+$/', '', $doc_name->hriq_id."_".$doc_name->id."_". $value->getClientOriginalName()).'.pdf', $pdf_load->output());

            return 'public/uploads/'.preg_replace('/\..+$/', '', $value->getClientOriginalName()).'.pdf';

    }

    function uploadSign(Request $request) {
        $folderPath = public_path('storage/uploads/');

        $image_parts = explode(";base64,", $request->signed);

        $image_type_aux = explode("image/", $image_parts[0]);

        $image_type = $image_type_aux[1];

        $image_base64 = base64_decode($image_parts[1]);

        $file = $folderPath . uniqid() . '.'.$image_type;

        $fileName = explode('storage/uploads/', $file);
        $fileName = $fileName[1];

        file_put_contents($file, $image_base64);

        $id = $request->input('id');
        $type = $request->input('type');

        if ($type == 'inspector') {
            Status50::where('application_id', $id)->update([
                'inspection_sign' => $fileName,
                'inspection_sign_off_date' => date('m/d/Y')
            ]);

            Status100::where('application_id', $id)->update([
                'inspection_sign' => $fileName,
                'inspection_sign_off_date' => date('m/d/Y')
            ]);

            StatusRehab::where('application_id', $id)->update([
                'inspection_sign' => $fileName,
                'inspection_sign_off_date' => date('m/d/Y')
            ]);
        } else if($type == 'homeowner') {
            Status50::where('application_id', $id)->update([
                'homeowner_sign' => $fileName,
                'homeowner_sign_off_date' => date('m/d/Y')
            ]);

            Status100::where('application_id', $id)->update([
                'homeowner_sign' => $fileName,
                'homeowner_sign_off_date' => date('m/d/Y')
            ]);

            StatusRehab::where('application_id', $id)->update([
                'homeowner_sign' => $fileName,
                'homeowner_sign_off_date' => date('m/d/Y')
            ]);
        } else if($type == 'superintendent') {
            Status50::where('application_id', $id)->update([
                'superintendent_sign' => $fileName,
                'superintendent_sign_off_date' => date('m/d/Y')
            ]);

            Status100::where('application_id', $id)->update([
                'superintendent_sign' => $fileName,
                'superintendent_sign_off_date' => date('m/d/Y')
            ]);

            StatusRehab::where('application_id', $id)->update([
                'superintendent_sign' => $fileName,
                'superintendent_sign_off_date' => date('m/d/Y')
            ]);
        }

        echo json_encode('success');
    }

    function removeSign(Request $request) {
        $id = $request->input('id');
        $type = $request->input('type');

        if ($type == 'inspector') {
            Status50::where('application_id', $id)->update([
                'inspection_sign' => null,
                'inspection_sign_off_date' => null
            ]);

            Status100::where('application_id', $id)->update([
                'inspection_sign' => null,
                'inspection_sign_off_date' => null
            ]);
        } else if($type == 'homeowner') {
            Status50::where('application_id', $id)->update([
                'homeowner_sign' => null,
                'homeowner_sign_off_date' => null
            ]);

            Status100::where('application_id', $id)->update([
                'homeowner_sign' => null,
                'homeowner_sign_off_date' => null
            ]);
        } else if($type == 'superintendent') {
            Status50::where('application_id', $id)->update([
                'superintendent_sign' => null,
                'superintendent_sign_off_date' => null
            ]);

            Status100::where('application_id', $id)->update([
                'superintendent_sign' => null,
                'superintendent_sign_off_date' => null
            ]);
        }

        echo json_encode('success');
    }

    function viewUpdateApplication(Request $request) {
        $id = $request->input('id');
        $submitted_glo = $request->input('submitted_glo');
        if($submitted_glo == 'yes') {
            $date_glo_submission = date('m/d/Y');
        } else {
            $date_glo_submission = null;
        }

        Application::where('id', $id)->update([
            'submitted_glo' => $submitted_glo,
            'date_glo_submission' => $date_glo_submission,
        ]);

        if(trim($request->input("comments")) || $request->hasFile('comment_attachment')) {
            $comment_attachment = null;
            if ($request->hasFile('comment_attachment')) {
                $comment_attachment = $request->input('comment_attachment');
                $photoName = $request->comment_attachment->storeAs('public/uploads', date('YmdHis').$request->comment_attachment->getClientOriginalName());
                $comment_attachment = str_replace('public/uploads/', '', $photoName);
            }

            Comment::create([
                'application_id' => $id,
                'user_id' => Auth::user()->id,
                'comments' => $request->input("comments"),
                'datetime' => date('Y-m-d H:i:s'),
                'attachment' => $comment_attachment
            ]);
        }

        session()->flash('message', 'application_updated');
        return Redirect::to('viewer/view-application/'.$id);
    }
}




