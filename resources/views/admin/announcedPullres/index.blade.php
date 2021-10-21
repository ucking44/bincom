@extends('layouts.backend.app')

@section('title', 'Announced Pull Result')

@section('content')

<div class="modal fade left" id="addAnnouncedPullResModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-md modal-right" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-sun-o" aria-hidden="true"> Ad</i>d New Announced Pull Result</h5>
                <button type="button" class="btn btn-dark float-right close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form class="needs-validation" novalidate="" action="{{ URL::to('/AnnouncedPullResult-store') }}" method="post">
                @csrf
                <div class="modal-body">

                    <div class="col-md-12 mt-4">
                        <div class="form-group">
                            <label for="polling_unit_name">Pulling Unit</label>
                            <select name="polling_unit_name" class="form-control" required>
                                <option value="">Select Pulling Unit</option>
                                @foreach ($pollingUnits as $pollingUnit)
                                    <option value="{{ $pollingUnit->id }}">{{ $pollingUnit->polling_unit_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12 mt-4">
                        <div class="form-group">
                            <label for="party_name">Party</label>
                            <select name="party_name" class="form-control" required>
                                <option value="">Select Party</option>
                                @foreach ($parties as $party)
                                    <option value="{{ $party->id }}">{{ $party->party_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="party_score">Party Score</label>
                            <input type="number" name="party_score" class="form-control" id="party_score" required>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="entered_by_user">Entered By</label>
                            <input type="text" name="entered_by_user" class="form-control" id="entered_by_user" required>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="col-6 text-left">
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- ---------------------------------------------------   END OF ADD MODAL FORM --------------------------------------------- --}}


<div class="main-content">

    <section class="section">
        <div class="section-header">
            <h1>Announced Pull Result</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Modules</a></div>
                <div class="breadcrumb-item">Uc King</div>
            </div>
        </div>
    </section>

        <div class="section-body">

            <a href="#" style="float: right" class="btn btn-primary" data-toggle="modal" data-target="#addAnnouncedPullResModal">Create Anounced Pull Res</a>
            <br/>
            <br/>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Announced Pull Result</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped v_center" id="table-2">
                                    <thead>
                                        <tr>
                                            {{-- <th></th> --}}
                                            <th>ID</th>
                                            <th>Pulling Unit</th>
                                            <th>Part</th>
                                            <th>Announced LGA Result</th>
                                            <th>Entered By</th>
                                            <th>Ip Address</th>
                                            <th style="text-align: center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($AnnouncedPullResults as $key => $AnnouncedPullResult)
                                            <tr>
                                                {{-- <th class="text-center">
                                                    <i class="fas fa-th"></i>
                                                </th> --}}
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $AnnouncedPullResult->polling_unit_name }}</td>
                                                <td>{{ $AnnouncedPullResult->party_name }}</td>
                                                <td>{{ $AnnouncedPullResult->party_score }}</td>
                                                <td>{{ $AnnouncedPullResult->entered_by_user }}</td>
                                                <td>{{ $AnnouncedPullResult->user_ip_address }}</td>
                                                <td style="text-align: center">
                                                    <div class="btn-group">
                                                        <a href="#" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#editAnnouncedPullRes{{ $AnnouncedPullResult->id }}"><i class="fa fa-edit"></i> Edit</a>
                                                        <a href="#" class="btn btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#deleteAnnouncedPullRes{{ $AnnouncedPullResult->id }}"><i class="fa fa-trash"></i> Delete</a>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- MODAL FOR EDITING AND UPDATING A LGA -->

                                            <div class="modal fade left" id="editAnnouncedPullRes{{ $AnnouncedPullResult->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-notify modal-md modal-right" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-sun-o" aria-hidden="true"> Ed</i>it Announced Pull Res</h5>
                                                            <button type="button" class="btn btn-dark float-right close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            {{--  {{ $AnnouncedPullResult->id }}  --}}
                                                        </div>

                                                        <form class="needs-validation" novalidate="" action="{{ url('/AnnouncedPullResult-update', $AnnouncedPullResult->id) }}" method="post">
                                                            @csrf
                                                            @method('put')
                                                            <div class="modal-body">

                                                                <div class="col-md-12 mt-4">
                                                                    <div class="form-group">
                                                                        <label for="polling_unit_name">Pulling Unit</label>
                                                                        <select name="polling_unit_name" class="form-control" required>
                                                                            <option value="">Select Pulling Unit</option>
                                                                            @foreach ($pollingUnits as $pollingUnit)
                                                                                <option {{ $pollingUnit->id == $AnnouncedPullResult->pulling_unit_id ? 'selected' : '' }} value="{{ $pollingUnit->id }}">{{ $pollingUnit->polling_unit_name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12 mt-4">
                                                                    <div class="form-group">
                                                                        <label for="party_name">Party</label>
                                                                        <select name="party_name" class="form-control" required>
                                                                            <option value="">Select Party</option>
                                                                            @foreach ($parties as $party)
                                                                                <option {{ $party->id == $AnnouncedPullResult->party_id ? 'selected' : '' }} value="{{ $party->id }}">{{ $party->party_name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="party_score">Party Score</label>
                                                                        <input type="number" class="form-control" name="party_score" value="{{ $AnnouncedPullResult->party_score }}" required="">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="entered_by_user">Entered By</label>
                                                                        <input type="text" class="form-control" name="entered_by_user" value="{{ $AnnouncedPullResult->entered_by_user }}" required="">
                                                                    </div>
                                                                </div>

                                                                <div class="card-footer">
                                                                    <div class="col-6 text-left">
                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- MODAL FOR DELETING A LGA -->

                                            <div class="modal fade left" id="deleteAnnouncedPullRes{{ $AnnouncedPullResult->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-notify modal-md modal-right" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-sun-o" aria-hidden="true"> De</i>lete Announced Pull Res</h5>
                                                            <button type="button" class="btn btn-dark float-right close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            {{--  {{ $AnnouncedPullResult->id }}  --}}
                                                        </div>

                                                        <div class="modal-body">
                                                            <form action="{{ URL::to('/AnnouncedPullResult-delete', $AnnouncedPullResult->id) }}" method="post">
                                                                @csrf
                                                                @method('delete')
                                                                
                                                                <p> Are You Sure You Want To Delete {{ $AnnouncedPullResult->party_score }} ?</p>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-warning" data-dismiss="modal">Cancel</button>
                                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

@endsection


