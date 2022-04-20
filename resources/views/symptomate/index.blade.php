@extends('layouts.main')

@section('container')
    <style>
        .invalid-feedback {
            width: 100%;
            margin-top: 0.25rem;
            font-size: 80%;
            color: #dc3545;
        }

    </style>
    <div id="mainstepper" class="bs-stepper">
        <div class="bs-stepper-header" role="tablist">

            <div class="step" data-target="#test-nlf-1">
                <button type="button" class="step-trigger" role="tab" id="mainsteppertrigger1" aria-controls="test-nlf-1">
                    <span class="bs-stepper-circle">
                        <span class="fas fa-flag-checkered" aria-hidden="true"></span>
                    </span>
                    <span class="bs-stepper-label">Introduction</span>
                </button>
            </div>
            <div class="bs-stepper-line"></div>

            <div class="step" data-target="#test-nlf-2">
                <button type="button" class="step-trigger" role="tab" id="mainsteppertrigger2" aria-controls="test-nlf-2">
                    <span class="bs-stepper-circle">
                        <span class="fas fa-user" aria-hidden="true"></span>
                    </span>
                    <span class="bs-stepper-label">Patient</span>
                </button>
            </div>
            <div class="bs-stepper-line"></div>

            <div class="step" data-target="#test-nlf-3">
                <button type="button" class="step-trigger" role="tab" id="mainsteppertrigger3" aria-controls="test-nlf-3">
                    <span class="bs-stepper-circle">
                        <span class="fas fa-thermometer" aria-hidden="true"></span>
                    </span>
                    <span class="bs-stepper-label">Symptoms</span>
                </button>
            </div>
            <div class="bs-stepper-line"></div>

            <div class="step" data-target="#test-nlf-4">
                <button type="button" class="step-trigger" role="tab" id="mainsteppertrigger4" aria-controls="test-nlf-4">
                    <span class="bs-stepper-circle">
                        <span class="fas fa-map-marked" aria-hidden="true"></span>
                    </span>
                    <span class="bs-stepper-label">Regions</span>
                </button>
            </div>
            <div class="bs-stepper-line"></div>

            <div class="step" data-target="#test-nlf-5">
                <button type="button" class="step-trigger" role="tab" id="mainsteppertrigger5" aria-controls="test-nlf-5">
                    <span class="bs-stepper-circle">
                        <span class="fas fa-question" aria-hidden="true"></span>
                    </span>
                    <span class="bs-stepper-label">Interview</span>
                </button>
            </div>
            <div class="bs-stepper-line"></div>

            <div class="step" data-target="#test-nlf-6">
                <button type="button" class="step-trigger" role="tab" id="mainsteppertrigger6" aria-controls="test-nlf-6">
                    <span class="bs-stepper-circle">
                        <span class="fas fa-clipboard-check" aria-hidden="true"></span>
                    </span>
                    <span class="bs-stepper-label">Results</span>
                </button>
            </div>

        </div>

        <div class="bs-stepper-content">

            @include('symptomate.introduces')

            @include('symptomate.patient')

            @include('symptomate.symptoms')

            @include('symptomate.regions')

            @include('symptomate.interview')

            @include('symptomate.result')


        </div>
    </div>
@endsection
