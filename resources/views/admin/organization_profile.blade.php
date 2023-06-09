@include('inc.head')
@include('inc.sideNav')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h6 class="m-0">{{$page}}</h6>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-warning card-outline">
                        <div class="overlay overl d-none">
                            <i class="fas fa-2x fa-sync fa-spin"></i>
                        </div>
                        <div class="card-body">
                            <form id="addnew">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Social Media</label>
                                            @csrf
                                            <select class="form-control form-control-sm mselct" name="social_media" id="social_media_id" required='required'>
                                                <option value="" >_Select_</option>
                                                @foreach ($socailMT as $row)
                                                        <option value="{{$row->id}}">{{$row->account_name}}</option>f
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Organization</label>
                                            @csrf
                                            <select class="form-control form-control-sm mselct" name="organization" id="organization" required='required'>
                                                <option value="" disabled>_Select_</option>
                                                @foreach ($organization as $row)
                                                    <option value="{{$row->id}}">{{$row->organization_name}}</option>f
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Account Manager</label>
                                            <select class="form-control form-control-sm mselct" name="account_manager" required='required'>
                                                <option value="">_Select_</option>
                                                @foreach ($user as $row)
                                                    <option value="{{$row->id}}">{{$row->fullName}}</option>f
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Account Name</label>
                                            <input type="text" class="form-control form-control-sm" placeholder="Enter Account Name" required='required' name="accountname" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row"  id="property">
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>&nbsp;&nbsp;</label>
                                            <button type="submit" class="btn btn-block btn-sm btn-success">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                    <div class="card card-primary card-outline">
                        <div class="overlay overl d-none">
                            <i class="fas fa-2x fa-sync fa-spin"></i>
                        </div>
                        <div class="card-body">
                            <h7 class="card-title">organization social media account</h7>
                            <br><br>
                            <form action="" id="filter">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>District</label>
                                            <select class="form-control form-control-sm mselct" name="woreda" required='required'>
                                                <option value="">_Select_</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">ልዩ ወረዳ</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Clasicfication</label>
                                            <select class="form-control form-control-sm mselct" name="title" required='required'>
                                                <option value="">_Select_</option>
                                                @foreach ($socailMT as $row)
                                                    <option value="{{$row->id}}">{{$row->account_name}}</option>f
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>&nbsp;&nbsp;</label>
                                            <button type="submit" class="btn btn-block btn-success btn-sm">Filter</button>
                                        </div>
                                    </div>
                                </div>

                            </form>
                            <div>
                                <table id="example" class="display" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Account Name</th>
                                        <th>Social Media</th>
                                        <th>Organization</th>
                                        <th>Woreda</th>
                                        <th>Account Manager</th>
                                        <th>Detail</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($organization_table as $row)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{$row->social_media_account_name}}</td>
                                            <td>{{$row->soc_media_type['account_name']}}</td>
                                            <td>{{$row->orga_name['organization_name']}}</td>
                                            <td>{{$row->orga_name['woreda']}}</td>
                                            <td>{{$row->soc_media_manager['fullName']}}</td>
                                            <td><a href={{'account_detail/'.$row->id}}><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                                            @if($row->status ==='1')
                                                <td><button type="button" class="btn btn-success" style="pointer-events: none;">Active</button></td>
                                            @else
                                                <td><button type="button" class="btn btn-danger" style="pointer-events: none;">Passive</button></td>
                                            @endif
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info">Action</button>
                                                    <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu" role="menu">
                                                        @if($row->status ==='1')
                                                                <a class="dropdown-item"  id="status" data-col={{$row->id}}>Deactivate</a>
                                                        @else
                                                            <a class="dropdown-item" id="status" data-col={{$row->id}} >Activate</a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>NO</th>
                                        <th>Account Name</th>
                                        <th>Social Media</th>
                                        <th>Organization</th>
                                        <th>Woreda</th>
                                        <th>Account Manager</th>
                                        <th>Detail</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>

                        </div>
                    </div><!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
            <div class="modal fade" id="mymodal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="overlay overl d-none">
                            <i class="fas fa-2x fa-sync fa-spin"></i>
                        </div>
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Social Media</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h4 class="modal-title" id='modname'>name</h4>
                            <form action="" id="addsocialmid">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12">
                                        <!-- select -->
                                        <div class="form-group">
                                            <input type="text" name="pid" id="pid" hidden>
                                            <label>Social media type</label>
                                            <select class="form-control" name="stype" required='required' id="stype">
                                                <option value="">_Select_</option>
                                                @foreach ($socailMT as $row)
                                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Social media link</label>
                                            <input type="url" class="form-control" placeholder="Enter ..." name="slink" id="slink" required='required'>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@include('inc.footer')
