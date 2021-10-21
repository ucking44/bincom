@extends('layouts.backend.app')

@section('title', 'Ward')

@section('content')

<div class="modal fade left" id="addWardModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-md modal-right" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-sun-o" aria-hidden="true"> Ad</i>d New Ward</h5>
                <button type="button" class="btn btn-dark float-right close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form class="needs-validation" novalidate="" action="{{ URL::to('/ward-store') }}" method="post">
                @csrf
                <div class="modal-body">

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="ward_name">Ward</label>
                            <input type="text" name="ward_name" class="form-control" id="ward_name" required>
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

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="entered_by_user">Entered By</label>
                            <input type="text" name="entered_by_user" class="form-control" id="entered_by_user" required>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="ward_description">Description</label>
                            <textarea class="form-control" name="ward_description" rows="3" cols="35" required=""></textarea>
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
            <h1>Ward</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Modules</a></div>
                <div class="breadcrumb-item">Uc King</div>
            </div>
        </div>
    </section>

        <div class="section-body">

            <a href="#" style="float: right" class="btn btn-primary" data-toggle="modal" data-target="#addWardModal">Create Ward</a>
            <br/>
            <br/>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Ward</h4>
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
                                            <th>Enter By</th>
                                            <th>Description</th>
                                            <th>Ip Address</th>
                                            <th style="text-align: center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($wards as $key => $ward)
                                            <tr>
                                                {{-- <th class="text-center">
                                                    <i class="fas fa-th"></i>
                                                </th> --}}
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $ward->ward_name }}</td>
                                                <td>{{ $ward->lga_name }}</td>
                                                <td>{{ $ward->entered_by_user }}</td>
                                                <td>{{ $ward->ward_description }}</td>
                                                <td>{{ $ward->user_ip_address }}</td>
                                                <td style="text-align: center">
                                                    <div class="btn-group">
                                                        <a href="#" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#editWard{{ $ward->id }}"><i class="fa fa-edit"></i> Edit</a>
                                                        <a href="#" class="btn btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#deleteWard{{ $ward->id }}"><i class="fa fa-trash"></i> Delete</a>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- MODAL FOR EDITING AND UPDATING A WARD -->

                                            <div class="modal fade left" id="editWard{{ $ward->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-notify modal-md modal-right" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-sun-o" aria-hidden="true"> Ed</i>it Ward</h5>
                                                            <button type="button" class="btn btn-dark float-right close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            {{--  {{ $ward->id }}  --}}
                                                        </div>

                                                        <form class="needs-validation" novalidate="" action="{{ url('/ward-update', $ward->id) }}" method="post">
                                                            @csrf
                                                            @method('put')
                                                            <div class="modal-body">

                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="ward_name">Ward</label>
                                                                        <input type="text" class="form-control" name="ward_name" value="{{ $ward->ward_name }}" required="">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12 mt-4">
                                                                    <div class="form-group">
                                                                        <label for="lga_name">LGA</label>
                                                                        <select name="lga_name" class="form-control" required>
                                                                            <option value="">Select LGA</option>
                                                                            @foreach ($lgas as $lga)
                                                                                <option {{ $lga->id == $ward->lga_id ? 'selected' : '' }} value="{{ $lga->id }}">{{ $lga->lga_name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="entered_by_user">Entered By</label>
                                                                        <input type="text" class="form-control" name="entered_by_user" value="{{ $ward->entered_by_user }}" required="">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="ward_description">Description</label>
                                                                        <textarea class="form-control" name="ward_description" rows="3" cols="35" required="">{{ $ward->ward_description }}</textarea>
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

                                            <div class="modal fade left" id="deleteWard{{ $ward->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-notify modal-md modal-right" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-sun-o" aria-hidden="true"> De</i>lete Ward</h5>
                                                            <button type="button" class="btn btn-dark float-right close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            {{--  {{ $ward->id }}  --}}
                                                        </div>

                                                        <div class="modal-body">
                                                            <form action="{{ URL::to('/ward-delete', $ward->id) }}" method="post">
                                                                @csrf
                                                                @method('delete')
                                                                
                                                                <p> Are You Sure You Want To Delete {{ $ward->ward_name }} ?</p>
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


