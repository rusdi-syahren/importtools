<?php

namespace App\Http\Controllers;


use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class SymptomateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list_risk_factor = ['p_7', 'p_8', 'p_9', 'p_28', 'p_264', 'p_10'];
        return view('symptomate.index', $data = ['list_risk_factor' => $list_risk_factor]);
    }

    public function symptomateList(Request $request)
    {

        $age = $request->get('age') != null ? $request->get('age') : 30;
        $apiURL = 'https://api.infermedica.com/v3/symptoms';
        $postInput = [
            'age.value' => $age,
        ];

        $headers = [
            'App-Id' => 'f6665053',
            'App-Key' => '0a0b8795c8a15ee7a446387b9bfab86e',
            'Model' => 'infermedica-id-klinisia'

        ];

        $response = Http::withHeaders($headers)->get($apiURL, $postInput);

        // $statusCode = $response->status();
        $responseBody = collect(json_decode($response->getBody(), true))->pluck('name', 'id');

        return $responseBody->toJson();
    }

    public function symptomeFilter(Request $request)
    {

        $age = $request->get('age') != null ? $request->get('age') : array('value' => 30);
        $evidence = collect($request->get('evidence') != null ? $request->get('evidence') : [])->where('source', 'initial')->pluck('id');
        $listdirasakan = collect($request->get('evidence') != null ? $request->get('evidence') : [])->where('choice_id', 'present')->where('source', '')->pluck('id');
        $listtdkdirasakan = collect($request->get('evidence') != null ? $request->get('evidence') : [])->where('choice_id', 'absent')->pluck('id');
        $listdilewati = collect($request->get('evidence') != null ? $request->get('evidence') : [])->where('choice_id', 'unknown')->pluck('id');;


        $apiURL = 'https://api.infermedica.com/v3/symptoms';
        $postInput = [
            'age.value' => $age,
        ];

        $headers = [
            'App-Id' => 'f6665053',
            'App-Key' => '0a0b8795c8a15ee7a446387b9bfab86e',
            'Model' => 'infermedica-id-klinisia'
        ];

        $response = Http::withHeaders($headers)->get($apiURL, $postInput);

        $gejala = collect(json_decode($response->getBody(), true))->whereIn('id', $evidence)->pluck('name');
        $dirasakan = collect(json_decode($response->getBody(), true))->whereIn('id', $listdirasakan)->pluck('name');
        $tidakdirasakan = collect(json_decode($response->getBody(), true))->whereIn('id', $listtdkdirasakan)->pluck('name');
        $dilewati = collect(json_decode($response->getBody(), true))->whereIn('id', $listdilewati)->pluck('name');

        $all_array = [];
        $all_array['gejala'] = $gejala;
        $all_array['dirasakan'] = $dirasakan;
        $all_array['tidakdirasakan'] = $tidakdirasakan;

        $all_array['dilewati'] = $dilewati;

        return collect($all_array)->toJson();
    }

    public function riskFactorList(Request $request)
    {

        $list_risk_factor = ['p_7', 'p_8', 'p_9', 'p_28', 'p_264', 'p_10'];
        $age = $request->get('age') != null ? $request->get('age') : 30;
        $apiURL = 'https://api.infermedica.com/v3/risk_factors';
        $postInput = [
            'age.value' => $age,
        ];

        $headers = [
            'App-Id' => 'f6665053',
            'App-Key' => '0a0b8795c8a15ee7a446387b9bfab86e',
            'Model' => 'infermedica-id-klinisia'

        ];

        $response = Http::withHeaders($headers)->get($apiURL, $postInput);

        // $statusCode = $response->status();
        $responseBody = collect(json_decode($response->getBody(), true))->whereIn('id', $list_risk_factor)->pluck('name', 'id');

        return $responseBody->toJson();
    }

    public function suggestList(Request $request)
    {

        $gender = $request->get('gender') != null ? $request->get('gender') : 'male';
        $age = $request->get('age') != null ? $request->get('age') : array('value' => 30);
        $evidence = $request->get('evidence') != null ? $request->get('evidence') : [];

        $apiURL = 'https://api.infermedica.com/v3/suggest';
        $postInput = [
            'sex' => $gender,
            'age' => $age,
            "suggest_method" => "symptoms",
            'evidence' => $evidence,

        ];

        $headers = [
            'App-Id' => 'f6665053',
            'App-Key' => '0a0b8795c8a15ee7a446387b9bfab86e',
            'Content-Type' => 'application/json',
            'Model' => 'infermedica-id-klinisia'
        ];

        $response = Http::withHeaders($headers)->post($apiURL, $postInput);

        $responseBody = json_decode($response->getBody(), true);


        return $responseBody;
    }
    public function locationriskFactorList(Request $request)
    {

        $list_locationRiskFactors = ['p_15', 'p_20', 'p_21', 'p_16', 'p_17', 'p_18', 'p_14', 'p_19', 'p_22', 'p_13', 'p_236'];
        $age = $request->get('age') != null ? $request->get('age') : 30;
        $apiURL = 'https://api.infermedica.com/v3/risk_factors';
        $postInput = [
            'age.value' => $age,
        ];

        $headers = [
            'App-Id' => 'f6665053',
            'App-Key' => '0a0b8795c8a15ee7a446387b9bfab86e',
            'Model' => 'infermedica-id-klinisia'

        ];

        $response = Http::withHeaders($headers)->get($apiURL, $postInput);

        // $statusCode = $response->status();
        $responseBody = collect(json_decode($response->getBody(), true))->whereIn('id', $list_locationRiskFactors)->pluck('name', 'id');

        return $responseBody->toJson();
    }


    public function interview(Request $request)
    {

        $gender = $request->get('gender') != null ? $request->get('gender') : 'male';
        $age = $request->get('age') != null ? $request->get('age') : array('value' => 30);
        $evidence = $request->get('evidence') != null ? $request->get('evidence') : [];

        $apiURL = 'https://api.infermedica.com/v3/diagnosis';
        $postInput = [
            'sex' => $gender,
            'age' => $age,
            'evidence' => $evidence
        ];

        $headers = [
            'App-Id' => 'f6665053',
            'App-Key' => '0a0b8795c8a15ee7a446387b9bfab86e',
            'Content-Type' => 'application/json',
            'Model' => 'infermedica-id-klinisia'
        ];

        $response = Http::withHeaders($headers)->post($apiURL, $postInput);

        $responseBody = json_decode($response->getBody(), true);

        return $responseBody;
    }

    public function rekomendasi(Request $request)
    {

        $gender = $request->get('gender') != null ? $request->get('gender') : 'male';
        $age = $request->get('age') != null ? $request->get('age') : array('value' => 30);
        $evidence = $request->get('evidence') != null ? $request->get('evidence') : [];

        $apiURL = 'https://api.infermedica.com/v3/recommend_specialist';
        $postInput = [
            'sex' => $gender,
            'age' => $age,
            'evidence' => $evidence
        ];

        $headers = [
            'App-Id' => 'f6665053',
            'App-Key' => '0a0b8795c8a15ee7a446387b9bfab86e',
            'Content-Type' => 'application/json',
            'Model' => 'infermedica-id-klinisia'
        ];

        $response = Http::withHeaders($headers)->post($apiURL, $postInput);

        $responseBody = json_decode($response->getBody(), true);

        return $responseBody;
    }
}
