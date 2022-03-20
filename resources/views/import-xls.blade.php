<!DOCTYPE html>
<html>
<head>
    <title>Import Excel File in Laravel</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<br />

<div class="container">
    <h3 align="center">Import Excel File in Laravel</h3>
    <br />
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            Upload Validation Error<br><br>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <form method="post" enctype="multipart/form-data" action="{{ url('/import_category/import') }}">
        {{ csrf_field() }}
        <div class="form-group">
            <table class="table">
                <tr>
                    <td width="40%" align="right"><label>Select File for Upload</label></td>
                    <td width="30">
                        <input type="file" name="select_file" />
                    </td>
                    <td width="30%" align="left">
                        <input type="submit" name="upload" class="btn btn-primary" value="Upload">
                    </td>
                </tr>
                <tr>
                    <td width="40%" align="right"></td>
                    <td width="30"><span class="text-muted">.xls, .xslx</span></td>
                    <td width="30%" align="left"></td>
                </tr>
            </table>
        </div>
    </form>

    <br />
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Customer Data</h3>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Excerpt</th>
                        <th>Date</th>
                        <th>Address</th>
                        <th>Contacts</th>
                        <th>Emails</th>
                        <th>Social Links</th>
                        <th>About company</th>
                        <th>Additional information</th>
                        <th>Services list</th>
                        <th>Links</th>
                        <th>Boss initials</th>
                        <th>Boss position</th>
                        <th>Loyalty programs</th>
                        <th>Payments</th>
                        <th>Categories</th>
                        <th>Tags</th>
                        <th>Images</th>
                    </tr>
                    @foreach($data as $row)
                        <tr>
                            <td>{{ $row->title }}</td>
                            <td>{!! $row->content!!}</td>
                            <td>{{ $row->excerpt }}</td>
                            <td>{{ $row->date }}</td>
                            <td>{{ $row->address }}</td>
                            <td>{{ $row->contacts }}</td>
                            <td>{{ $row->emails }}</td>
                            <td><a href="{{ $row->social_links }}"></a></td>
                            <td>{!!$row->about_company !!}</td>
                            <td>{{ $row->additional_information }}</td>
                            <td>{{ $row->services_list }}</td>
                            <td>{{ $row->links }}</td>
                            <td>{{ $row->boss_initials }}</td>
                            <td>{{ $row->boss_position }}</td>
                            <td>{{ $row->loyalty_programs }}</td>
                            <td>
                                @if(!empty($row->payments))
                                <ul>
                            @foreach(explode(',', $row->payments) as $fields)
                                <li>{{$fields}}</li>
                            @endforeach
                                </ul>
                                    @else

                                @endif
                            </td>
                            <td>
                                @if(!empty($row->categories))
                                    <ul>
                                        @foreach(explode('>', $row->categories) as $cats)
                                            <li>{{$cats}}</li>
                                        @endforeach
                                    </ul>
                                @else
                                @endif
                            </td>
                            <td>{{ $row->tags }}</td>
                            <td><img width="150" height="150" src="{{ $row->image }}" alt=""></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>

