@extends('layouts.backend.app')

@section('title', 'Registered Roles')

@section('content')

<div class="main-content">

    <section class="section">
        <div class="section-header">
            <h1>Role User</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Modules</a></div>
                <div class="breadcrumb-item">Uc King</div>
            </div>
        </div>
    </section>

        <div class="section-body">
            
            <div class="dropdown d-inline mr-2">
                <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    PDF
                </button>
                <div class="dropdown-menu">
                    <li id="export-to-pdf">
                        <a href="{{ URL::to('pdf-download-class-teacher') }}" class="btn btn">Download PDF</a>
                    </li>
                    <li role="separator" class="divider"></li>
                    <li id="import-to-pdf">
                        <a href="" class="btn btn">Import PDF</a>
                    </li>
                </div>
            </div>

            <div class="dropdown d-inline mr-2">
                <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    EXCEL
                </button>
                <div class="dropdown-menu">
                    <ul class="dropdown-item" role="item" id="export-item">
                        <li id="export-to-pdf">
                            <a href="{{ URL::to('excel-export-teachers_xlsx') }}" class="btn btn-info" style="color: #fff">Export Xlsx</a>
                        </li>
                        <br/>
                        <li id="export-to-pdf">
                            <a href="{{ URL::to('excel-export-teachers_xls') }}" class="btn btn-danger" style="color: #fff">Export Xls</a>
                        </li>
                        <br/>
                        <li id="export-to-pdf">
                            <a href="{{ URL::to('excel-export-teachers_csv') }}" class="btn btn-primary" style="color: #fff">Export Csv</a>
                        </li>

                        {{-- <li role="separator" class="divider"></li> --}}
                        <li>
                            <form action="{{ URL::to('excel-import-teachers') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                {{-- Form::file('file', null, ['class' => 'form-controller', 'placeholder' => 'Choose Excel File']) --}}
                                <div class="col-12 mt-3">
                                    <label for="image">Image</label>
                                    <input type="file" id="image" class="form-control">
                                </div>
                                <br/>

                                <div class="modal-footer">
                                    {{-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> --}}
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </form>
                        {{-- <li id="import-to-pdf">
                            <a href="" class="btn btn">Import Excel</a>
                        </li> --}}
                    </ul>
                </div>
            </div>

            {{-- ======================== WORD BUTTON ======================= --}}
            <div class="dropdown d-inline mr-2">
                <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    WORD
                </button>

                <div class="dropdown-menu">
                    <li id="export-to-pdf">
                        <a href="{{ URL::to('word-download-class-teacher') }}" class="btn btn">Download WORD</a>
                    </li>
                    <li role="separator" class="divider"></li>
                    <li id="import-to-pdf">
                        <a href="" class="btn btn">Import PDF</a>
                    </li>
                </div>
            </div>

            {{-- <a href="#" style="float: right" class="btn btn-primary" data-toggle="modal" data-target="#addProductModal">Create Product</a> --}}
            <br/>
            <br/>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Registered Roles</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped v_center" id="table-2">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Usertype</th>
                                            <th style="text-align: center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($members as $member)
                                            <tr>
                                                <th class="text-center">
                                                    <i class="fas fa-th"></i>
                                                </th>
                                                {{-- <td>{{ $key + 1 }}</td> --}}
                                                {{-- <td>{{ $member->user_id }}</td> --}}
                                                <td>{{ $member->name }}</td>
                                                <td>{{ $member->phone }}</td>
                                                <td>{{ $member->email }}</td>
                                                <td>{{ $member->usertype }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="#" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#editMember{{ $member->user_id }}"><i class="fa fa-edit"></i> Edit</a>
                                                        <a href="#" class="btn btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#deleteMember{{ $member->user_id }}"><i class="fa fa-trash"></i> Delete</a>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- MODAL FOR EDITING AND UPDATING A MANUFACTURE -->

                                            <div class="modal fade left" id="editMember{{ $member->user_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-notify modal-md modal-right" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-sun-o" aria-hidden="true"> Ed</i>it Member</h5>
                                                            <button type="button" class="btn btn-dark float-right close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            {{--  {{ $member->user_id }}  --}}
                                                        </div>

                                                        <form class="needs-validation" novalidate="" action="{{ URL::to('/update', $member->user_id) }}" method="post">
                                                            @csrf
                                                            @method('put')
                                                            <div class="modal-body">

                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label class="bmd-label-floating">Name</label>
                                                                            <input type="text" name="username" value="{{ $member->name }}" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label class="bmd-label-floating">Name</label>
                                                                            <select name="usertype" class="form-control" required="">
                                                                                <option value="">Select Role</option>
                                                                                <option value="admin">Admin</option>
                                                                                <option value="vendor">Vendor</option>
                                                                                <option value="">None</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="card-footer">
                                                                    <div class="col-6 text-left">
                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary">Update Role</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- MODAL FOR DELETING A PRODUCT -->

                                            <div class="modal fade left" id="deleteMember{{ $member->user_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-notify modal-md modal-right" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-sun-o" aria-hidden="true"> De</i>lete Product</h5>
                                                            <button type="button" class="btn btn-dark float-right close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            {{-- {{ $member->user_id }} --}}
                                                        </div>

                                                        <div class="modal-body">
                                                            <form action="{{ URL::to('/delete', $member->user_id) }}" method="post">
                                                                @csrf
                                                                @method('delete')
                                                                
                                                                <p> Are You Sure You Want To Delete {{ $member->name }} ?</p>
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


