@extends('layouts.backend.app')

@section('title', 'Announced Ward Result')

@section('content')

<div class="modal fade left" id="addAnnouncedWardResModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-md modal-right" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-sun-o" aria-hidden="true"> Ad</i>d New Announced Ward Result</h5>
                <button type="button" class="btn btn-dark float-right close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form class="needs-validation" novalidate="" action="{{ URL::to('/AnnouncedWardResult-store') }}" method="post">
                @csrf
                <div class="modal-body">

                    <div class="col-md-12 mt-4">
                        <div class="form-group">
                            <label for="ward_name">Ward</label>
                            <select name="ward_name" class="form-control" required>
                                <option value="">Select Ward</option>
                                @foreach ($wards as $ward)
                                    <option value="{{ $ward->id }}">{{ $ward->ward_name }}</option>
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
            <h1>Announced Ward Result</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Modules</a></div>
                <div class="breadcrumb-item">Uc King</div>
            </div>
        </div>
    </section>

        <div class="section-body">

            <a href="#" style="float: right" class="btn btn-primary" data-toggle="modal" data-target="#addAnnouncedWardResModal">Create Anounced Ward Res</a>
            <br/>
            <br/>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Announced Ward Result</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped v_center" id="table-2">
                                    <thead>
                                        <tr>
                                            {{-- <th></th> --}}
                                            <th>ID</th>
                                            <th>Ward</th>
                                            <th>Part</th>
                                            <th>Announced LGA Result</th>
                                            <th>Entered By</th>
                                            <th>Ip Address</th>
                                            <th style="text-align: center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($AnnouncedWardResults as $key => $AnnouncedWardResult)
                                            <tr>
                                                {{-- <th class="text-center">
                                                    <i class="fas fa-th"></i>
                                                </th> --}}
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $AnnouncedWardResult->ward_name }}</td>
                                                <td>{{ $AnnouncedWardResult->party_name }}</td>
                                                <td>{{ $AnnouncedWardResult->party_score }}</td>
                                                <td>{{ $AnnouncedWardResult->entered_by_user }}</td>
                                                <td>{{ $AnnouncedWardResult->user_ip_address }}</td>
                                                <td style="text-align: center">
                                                    <div class="btn-group">
                                                        <a href="#" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#editAnnouncedWardRes{{ $AnnouncedWardResult->id }}"><i class="fa fa-edit"></i> Edit</a>
                                                        <a href="#" class="btn btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#deleteAnnouncedWardRes{{ $AnnouncedWardResult->id }}"><i class="fa fa-trash"></i> Delete</a>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- MODAL FOR EDITING AND UPDATING A LGA -->

                                            <div class="modal fade left" id="editAnnouncedWardRes{{ $AnnouncedWardResult->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-notify modal-md modal-right" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-sun-o" aria-hidden="true"> Ed</i>it Announced Ward Res</h5>
                                                            <button type="button" class="btn btn-dark float-right close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            {{--  {{ $AnnouncedWardResult->id }}  --}}
                                                        </div>

                                                        <form class="needs-validation" novalidate="" action="{{ url('/AnnouncedWardResult-update', $AnnouncedWardResult->id) }}" method="post">
                                                            @csrf
                                                            @method('put')
                                                            <div class="modal-body">

                                                                <div class="col-md-12 mt-4">
                                                                    <div class="form-group">
                                                                        <label for="ward_name">Ward</label>
                                                                        <select name="ward_name" class="form-control" required>
                                                                            <option value="">Select Ward</option>
                                                                            @foreach ($wards as $ward)
                                                                                <option {{ $ward->id == $AnnouncedWardResult->ward_id ? 'selected' : '' }} value="{{ $ward->id }}">{{ $ward->ward_name }}</option>
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
                                                                                <option {{ $party->id == $AnnouncedWardResult->party_id ? 'selected' : '' }} value="{{ $party->id }}">{{ $party->party_name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="party_score">Party Score</label>
                                                                        <input type="number" class="form-control" name="party_score" value="{{ $AnnouncedWardResult->party_score }}" required="">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="entered_by_user">Entered By</label>
                                                                        <input type="text" class="form-control" name="entered_by_user" value="{{ $AnnouncedWardResult->entered_by_user }}" required="">
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

                                            <div class="modal fade left" id="deleteAnnouncedWardRes{{ $AnnouncedWardResult->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-notify modal-md modal-right" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-sun-o" aria-hidden="true"> De</i>lete Announced Ward Res</h5>
                                                            <button type="button" class="btn btn-dark float-right close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            {{--  {{ $AnnouncedWardResult->id }}  --}}
                                                        </div>

                                                        <div class="modal-body">
                                                            <form action="{{ URL::to('/AnnouncedWardResult-delete', $AnnouncedWardResult->id) }}" method="post">
                                                                @csrf
                                                                @method('delete')
                                                                
                                                                <p> Are You Sure You Want To Delete {{ $AnnouncedWardResult->party_score }} ?</p>
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


