<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ClientsController extends Controller
{
    protected function listClient(Request $request){
        
        $listData=DB::select("CALL `list_clientsandpayments`();");
        return  response()->json(["state"=>true,'data' => $listData],200);    
             
                
     }
    protected function registerClient(Request $request){
             if(!$request->has("name")){
                 return response()->json(['state'=>false,  "stateRequest"=>false,"message" => 'Se requiere de name.'],200)->header('Content-Type', 'application/json; charset=UTF-8');
              }
              if(!$request->has("email")){
                 return response()->json(['state'=>false,  "stateRequest"=>false,"message" => 'Se requiere de email.'],200)->header('Content-Type', 'application/json; charset=UTF-8');
              }
              if(!$request->has("dob")){
                 return response()->json(['state'=>false,  "stateRequest"=>false,"message" => 'Se requiere de dob.'],200)->header('Content-Type', 'application/json; charset=UTF-8');
              }
              if(!$request->has("firstName")){
                 return response()->json(['state'=>false,  "stateRequest"=>false,"message" => 'Se requiere de firstname.'],200)->header('Content-Type', 'application/json; charset=UTF-8');
              }
              if(!$request->has("lastName")){
                return response()->json(['state'=>false,  "stateRequest"=>false,"message" => 'Se requiere de lastname.'],200)->header('Content-Type', 'application/json; charset=UTF-8');
              }
              if(!$request->has("phone")){
                return response()->json(['state'=>false,  "stateRequest"=>false,"message" => 'Se requiere de phone.'],200)->header('Content-Type', 'application/json; charset=UTF-8');
              }
              try {

               $name=$request->get("name");
               $email=$request->get("email");
               $detailData=$request->get("detailData");
               $dob=$request->get("dob");
               $firstname=$request->get("firstName");
               $lastname=$request->get("lastName");
               $phone=$request->get("phone");
               if($name=="" || is_null($name)){
                 return response()->json(['state'=>false,  "stateRequest"=>false,"message" => 'El name es requerido.'],200)->header('Content-Type', 'application/json; charset=UTF-8');
               }
              
               if($email=="" || is_null($email)){
                  return response()->json(['state'=>false,  "stateRequest"=>false,"message" => 'El email es requerido.'],200)->header('Content-Type', 'application/json; charset=UTF-8');
               }
               if($dob=="" || is_null($dob)){
                 return response()->json(['state'=>false,  "stateRequest"=>false,"message" => 'El dob es requerido.'],200)->header('Content-Type', 'application/json; charset=UTF-8');
              }
              if($firstname=="" || is_null($firstname)){
                 return response()->json(['state'=>false,  "stateRequest"=>false,"message" => 'El firstname es requerido.'],200)->header('Content-Type', 'application/json; charset=UTF-8');
              }
              if($lastname=="" || is_null($lastname)){
                 return response()->json(['state'=>false,  "stateRequest"=>false,"message" => 'El lastname es requerido.'],200)->header('Content-Type', 'application/json; charset=UTF-8');
              }
              if($phone=="" || is_null($phone)){
                 return response()->json(['state'=>false,  "stateRequest"=>false,"message" => 'El phone es requerido.'],200)->header('Content-Type', 'application/json; charset=UTF-8');
              }
              $sqlData=" SET @p1='05-04-1996'; SET @p2='reqname'; SET @p3='reqname'; SET @p4='reqname'; SET @p5='reqname'; CALL `insertclient`('ariesjua@gmail.com', @p1, @p2, @p3, @p4, @p5);";
              $dataResponse=DB::select($sqlData);
              return  response()->json(["state"=>$dataResponse[0]->state,'message' => $dataResponse[0]->message],200);
             
             } catch (\Exception $e) {
               //  return $e->getMessage();
             }
           
                
     }
}
