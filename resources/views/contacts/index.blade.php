@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Contact
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Task Form -->
                    <form action="{{ url('contact') }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Task Name -->
                        <div class="form-group">
                            <label for="contact-name" class="col-sm-3 control-label">Name</label>
                            <div class="col-sm-6">
                                <input type="text" name="name" id="contact-name" class="form-control" value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="contact-name" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-6">
                                <input type="text" name="email" id="contact-email" class="form-control" value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="contact-name" class="col-sm-3 control-label">Phone</label>
                            <div class="col-sm-6">
                                <input type="text" name="phone" id="contact-phone" class="form-control" value="{{ old('phone') }}">
                            </div>
                        </div>                                                
                        <div class="form-group">
                            <label for="contact-address" class="col-sm-3 control-label">Address</label>
                            <div class="col-sm-6">
                                <textarea name="address" id="contact-address" class="form-control" value="{{ old('address') }}"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="contact-company" class="col-sm-3 control-label">Company</label>
                            <div class="col-sm-6">
                                <input type="text" name="company" id="contact-company" class="form-control" value="{{ old('company') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="contact-dob" class="col-sm-3 control-label">Date Of Birth</label>
                            <div class="col-sm-6">
                                <input type="text" name="dob" id="contact-dob" class="form-control" value="{{ old('dob') }}">
                            </div>
                        </div>                                                                                                                        
                        <!-- <input type="text" name="email" id="contact-email" class="form-control" value="{{ old('contact') }}">
 -->

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Add Contact
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Current Tasks -->
            @if (count($contacts) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current Contacts
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Company</th>
                                <th>D O B</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $ct)
                                    <tr>
                                        <td class="table-text"><div>{{ $ct->name }}</div></td>
                                        <td class="table-text"><div>{{ $ct->email }}</div></td>
                                        <td class="table-text"><div>{{ $ct->phone }}</div></td>
                                        <td class="table-text"><div>{{ $ct->address }}</div></td>
                                        <td class="table-text"><div>{{ $ct->company }}</div></td>
                                        <td class="table-text"><div>{{ $ct->dob }}</div></td>

                                        <!-- Task Delete Button -->
                                        <td>
                                            <form action="{{url('contact/'. $ct->id)}}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" id="delete-contact-{{ $ct->id }}" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

