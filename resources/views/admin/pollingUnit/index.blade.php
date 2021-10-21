@extends('layouts.backend.app')

@section('title', 'Polling Unit')

@section('content')

<div class="modal fade left" id="addPollingUnitModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-md modal-right" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-sun-o" aria-hidden="true"> Ad</i>d New Polling Unit</h5>
                <button type="button" class="btn btn-dark float-right close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form class="needs-validation" novalidate="" action="{{ URL::to('/pollingUnit-store') }}" method="post">
                @csrf
                <div class="modal-body">

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="polling_unit_name">Polling Unit</label>
                            <input type="text" name="polling_unit_name" class="form-control" id="polling_unit_name" required>
                        </div>
                    </div>

                    <div class="col-md-12 mt-4">
                        <div class="form-group">
                            <label for="lga_name">LGA</label>
                            <select name="lga_name" class="form-control" required>
                                <option value="">Select LGA</option>
                                @foreach ($lgas as $lga)
                                    <option value="{{ $lga->id }}">{{ $lga->lga_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

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

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="polling_unit_number">Polling Unit Number</label>
                            <input type="number" name="polling_unit_number" class="form-control" id="polling_unit_number" required>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="lat">Latitude</label>
                            <input type="text" name="lat" class="form-control" id="lat" required>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="long">Longitude</label>
                            <input type="text" name="long" class="form-control" id="long" required>
                        </div>
                    </div>
        
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="entered_by_user">Entered By</label>
                            <input type="text" name="entered_by_user" class="form-control" id="entered_by_user" required>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="polling_unit_description">Description</label>
                            <textarea class="form-control" name="polling_unit_description" rows="3" cols="35" required=""></textarea>
                        </div>
                    </div>

                    {{-- <div class="col-md-12">
                        <div class="form-group">
                            <label for="user_ip_address">Ip Address</label>
                            <input type="text" name="user_ip_address" class="form-control" id="user_ip_address" required>
                        </div>
                    </div> --}}

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
            <h1>Polling Unit</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Modules</a></div>
                <div class="breadcrumb-item">Uc King</div>
            </div>
        </div>
    </section>

        <div class="section-body">

            <a href="#" style="float: right" class="btn btn-primary" data-toggle="modal" data-target="#addPollingUnitModal">Create Polling Unit</a>
            <br/>
            <br/>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Polling Unit</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped v_center" id="table-2">
                                    <thead>
                                        <tr>
                                            {{-- <th></th> --}}
                                            <th>ID</th>
                                            <th>Ward</th>
                                            <th>LGA</th>
                                            <th>Polling Unit</th>
                                            <th>Polling Unit Number</th>
                                            {{-- <th>Latitude</th>
                                            <th>Longitude</th> --}}
                                            <th>Entered By</th>
                                            <th>Description</th>
                                            <th>Ip Address</th>
                                            <th style="text-align: center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pollingUnits as $key => $pollingUnit)
                                            <tr>
                                                {{-- <th class="text-center">
                                                    <i class="fas fa-th"></i>
                                                </th> --}}
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $pollingUnit->ward_name }}</td>
                                                <td>{{ $pollingUnit->lga_name }}</td>
                                                <td>{{ $pollingUnit->polling_unit_name }}</td>
                                                <td>{{ $pollingUnit->polling_unit_number }}</td>
                                                {{-- <td>{{ $pollingUnit->lat }}</td>
                                                <td>{{ $pollingUnit->long }}</td> --}}
                                                <td>{{ $pollingUnit->entered_by_user }}</td>
                                                <td>{{ $pollingUnit->polling_unit_description }}</td>
                                                <td>{{ $pollingUnit->user_ip_address }}</td>
                                                <td style="text-align: center">
                                                    <div class="btn-group">
                                                        <a href="#" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#editPollingUnit{{ $pollingUnit->id }}"><i class="fa fa-edit"></i> Edit</a>
                                                        <a href="#" class="btn btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#deleteLGA{{ $pollingUnit->id }}"><i class="fa fa-trash"></i> Delete</a>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- MODAL FOR EDITING AND UPDATING A LGA -->

                                            <div class="modal fade left" id="editPollingUnit{{ $pollingUnit->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-notify modal-md modal-right" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-sun-o" aria-hidden="true"> Ed</i>it Polling Unit</h5>
                                                            <button type="button" class="btn btn-dark float-right close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            {{--  {{ $pollingUnit->id }}  --}}
                                                        </div>

                                                        <form class="needs-validation" novalidate="" action="{{ url('/pollingUnit-update', $pollingUnit->id) }}" method="post">
                                                            @csrf
                                                            @method('put')
                                                            <div class="modal-body">

                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="polling_unit_name">Polling Unit</label>
                                                                        <input type="text" class="form-control" name="polling_unit_name" value="{{ $pollingUnit->polling_unit_name }}" required="">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12 mt-4">
                                                                    <div class="form-group">
                                                                        <label for="lga_name">LGA</label>
                                                                        <select name="lga_name" class="form-control" required>
                                                                            <option value="">Select LGA</option>
                                                                            @foreach ($lgas as $lga)
                                                                                <option {{ $lga->id == $pollingUnit->lga_id ? 'selected' : '' }} value="{{ $lga->id }}">{{ $lga->lga_name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12 mt-4">
                                                                    <div class="form-group">
                                                                        <label for="ward_name">Ward</label>
                                                                        <select name="ward_name" class="form-control" required>
                                                                            <option value="">Select Ward</option>
                                                                            @foreach ($wards as $ward)
                                                                                <option {{ $ward->id == $pollingUnit->ward_id ? 'selected' : '' }} value="{{ $ward->id }}">{{ $ward->ward_name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="polling_unit_number">Polling Unit Number</label>
                                                                        <input type="number" class="form-control" name="polling_unit_number" value="{{ $pollingUnit->polling_unit_number }}" required="">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="lat">Latitude</label>
                                                                        <input type="number" class="form-control" name="lat" value="{{ $pollingUnit->lat }}" required="">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="long">Longitude</label>
                                                                        <input type="number" class="form-control" name="long" value="{{ $pollingUnit->long }}" required="">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="entered_by_user">Entered By</label>
                                                                        <input type="text" class="form-control" name="entered_by_user" value="{{ $pollingUnit->entered_by_user }}" required="">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="polling_unit_description">Description</label>
                                                                        <textarea class="form-control" name="polling_unit_description" rows="3" cols="35" required="">{{ $pollingUnit->polling_unit_description }}</textarea>
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

                                            <div class="modal fade left" id="deleteLGA{{ $pollingUnit->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-notify modal-md modal-right" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-sun-o" aria-hidden="true"> De</i>lete Polling Unit</h5>
                                                            <button type="button" class="btn btn-dark float-right close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            {{--  {{ $pollingUnit->id }}  --}}
                                                        </div>

                                                        <div class="modal-body">
                                                            <form action="{{ URL::to('/pollingUnit-delete', $pollingUnit->id) }}" method="post">
                                                                @csrf
                                                                @method('delete')
                                                                
                                                                <p> Are You Sure You Want To Delete {{ $pollingUnit->polling_unit_name }} ?</p>
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


