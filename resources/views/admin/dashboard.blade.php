@extends('layouts.backend.app')

@section('title', 'Shift')

@section('content')

<!-- Start app main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Announced State Results</h4>
                        </div>
                        <div class="card-body">
                            {{ $announcedStateRes }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-newspaper"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Announced LGA Results</h4>
                        </div>
                        <div class="card-body">
                            {{ $announcedLgaRes }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-file"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Announced Ward Results</h4>
                        </div>
                        <div class="card-body">
                            {{ $announcedWardRes }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-circle"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Announced Pull Results</h4>
                        </div>
                        <div class="card-body">
                            {{ $announcedPullRes }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Statistics</h4>
                        {{-- <div class="card-header-action">
                            <button class="btn btn-sm btn-outline-secondary mr-1" id="one_month">1M</button>
                            <button class="btn btn-sm btn-outline-secondary mr-1" id="six_months">6M</button>
                            <button class="btn btn-sm btn-outline-secondary mr-1" id="one_year" class="active">1Y</button>
                            <button class="btn btn-sm btn-outline-secondary mr-1" id="ytd">YTD</button>
                            <button class="btn btn-sm btn-outline-secondary" id="all">ALL</button>
                        </div> --}}
                    </div>
                    <div class="card-body">
                        <div class="statistic-details mb-sm-4">
                            <div class="statistic-details-item">
                                <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> </span>
                                <div class="detail-value">{{ $agentName }}</div>
                                <div class="detail-name">Agent Name</div>
                            </div>
                            <div class="statistic-details-item">
                                <span class="text-muted"><span class="text-danger"><i class="fas fa-caret-down"></i></span> </span>
                                <div class="detail-value">{{ $lga }}</div>
                                <div class="detail-name">LGA</div>
                            </div>
                            <div class="statistic-details-item">
                                <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span></span>
                                <div class="detail-value">{{ $party }}</div>
                                <div class="detail-name">Party</div>
                            </div>
                            <div class="statistic-details-item">
                                <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> </span>
                                <div class="detail-value">{{ $pollingUnit }}</div>
                                <div class="detail-name">Polling Unit</div>
                            </div>
                        </div>
                        <div id="apex-timeline-chart"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
