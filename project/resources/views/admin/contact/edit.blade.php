@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <div class="box">
            <form action="{{ route('admin.contact.update', $contact->id) }}" method="post" class="form" enctype="multipart/form-data">
                @method('put')
                <div class="box-body">
                    <div class="row">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put">
                        <div class="col-md-12">
                            <!-- Nav tabs -->
                            <!-- Tab panes -->
                            <div class="tab-content" id="tabcontent">
                                <div role="tabpanel" class="tab-pane @if(!request()->has('combination')) active @endif" id="info">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h2>{{ ucfirst($contact->name_enterprise) }}</h2>
                                            <div class="form-group">
                                                <label for="name">Name Proprietary <span class="text-danger">*</span></label>
                                                <input type="text" name="name_proprietary" id="name_proprietary" placeholder="Name Proprietary" class="form-control"
                                                    value="{!! $contact->name_proprietary !!}">
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Name Enterprise <span class="text-danger">*</span></label>
                                                <input type="text" name="name_enterprise" id="name_enterprise" placeholder="Name Enterprise" class="form-control"
                                                    value="{!! $contact->name_enterprise !!}">
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Name Headquarter <span class="text-danger">*</span></label>
                                                <input type="text" name="name_headquarter" id="name_headquarter" placeholder="Name Headquarter" class="form-control"
                                                    value="{!! $contact->name_headquarter !!}">
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Address <span class="text-danger">*</span></label>
                                                <input type="text" name="address" id="address" placeholder="Address" class="form-control"
                                                    value="{!! $contact->address !!}">
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Description </label>
                                                <textarea class="form-control ckeditor" name="description" id="description" rows="5"
                                                    placeholder="Description">{!! $contact->description  !!}</textarea>
                                            </div>
                                            @if(!is_null($contact->cover))
                                            <div class="form-group">
                                                <div class="col-md-3">
                                                    <div class="row">
                                                        <img src="{{ $contact->cover }}" alt="" class="img-responsive img-thumbnail">
                                                        <a onclick="return confirm('Are you sure?')" href="{{ route('admin.contact.remove.image', ['contact_id' => $contact->id]) }}" class="btn btn-danger btn-sm btn-block">Remove?</a><br />
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            <div class="row"></div>
                                            <div class="form-group">
                                                <label for="cover">Cover <span class="text-danger">*</span></label>
                                                <input type="file" name="cover" id="cover" class="form-control">
                                            </div>    
                                            <div class="form-group">
                                                <label for="name">Email</label>
                                                <input type="text" name="e_mail" id="e_mail" placeholder="Email" class="form-control"
                                                    value="{!! $contact->e_mail !!}">
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Telephone number 1</label>
                                                <input type="text" name="telephone_number_1" id="telephone_number_1" placeholder="Telephone number 1"
                                                    class="form-control" value="{!! $contact->telephone_number_1 !!}">
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Telephone number 2</label>
                                                <input type="text" name="telephone_number_2" id="telephone_number_2" placeholder="Telephone number 2"
                                                    class="form-control" value="{!! $contact->telephone_number_2 !!}">
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Telephone number 3</label>
                                                <input type="text" name="telephone_number_3" id="telephone_number_3" placeholder="Telephone number 3"
                                                    class="form-control" value="{!! $contact->telephone_number_3 !!}">
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Facebook Profile Link</label>
                                                <input type="text" name="profile_facebook" id="profile_facebook" placeholder="Facebook Profile Link"
                                                    class="form-control" value="{!! $contact->profile_facebook !!}">
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Twitter Profile Link</label>
                                                <input type="text" name="profile_twitter" id="profile_twitter" placeholder="Twitter Profile Link"
                                                    class="form-control" value="{!! $contact->profile_twitter !!}">
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Youtube Profile Link</label>
                                                <input type="text" name="profile_youtube" id="profile_youtube" placeholder="Youtube Profile Link"
                                                    class="form-control" value="{!! $contact->profile_youtube !!}">
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Mercadolibre Profile Link</label>
                                                <input type="text" name="profile_mercadolibre" id="profile_mercadolibre" placeholder="Mercadolibre Profile Link"
                                                    class="form-control" value="{!! $contact->profile_mercadolibre !!}">
                                            </div>                                                                                                                                                                                                
                                            <!-- /.box-body -->
                                        </div>                                        
                                    </div>
                                    <div class="row">
                                        <div class="box-footer">
                                            <div class="btn-group">
                                                <a href="{{ route('admin.dashboard') }}" class="btn btn-default btn-sm">Back</a>
                                                <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
@endsection
@section('css')
    <style type="text/css">
        label.checkbox-inline {
            padding: 10px 5px;
            display: block;
            margin-bottom: 5px;
        }
        label.checkbox-inline > input[type="checkbox"] {
            margin-left: 10px;
        }
        ul.attribute-lists > li > label:hover {
            background: #3c8dbc;
            color: #fff;
        }
        ul.attribute-lists > li {
            background: #eee;
        }
        ul.attribute-lists > li:hover {
            background: #ccc;
        }
        ul.attribute-lists > li {
            margin-bottom: 15px;
            padding: 15px;
        }
    </style>
@endsection
@section('js')
    <script type="text/javascript">
        
    </script>
@endsection