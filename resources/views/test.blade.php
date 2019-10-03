@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<body>
<center>

{{-- User --}}
User
<form action="{{ route('test.store') }}" enctype="multipart/form-data" method="post">
	  {{ csrf_field() }}
    Select file to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    {{-- <input type="submit" value="Upload Image" name="submit"> --}}
    <br>
    <br>
    <button type="submit" class="btn btn-primary">Upload</button>
    <button type="button" class="btn btn-secondary">Preview</button>
</form>
<br>
<br>
{{-- Admin --}}
Admin
<form action="upload.php" method="post" enctype="multipart/form-data">
    Select file to download:
    <br>
    Hier komen de bestanden te staan die zijn geuploaded
   {{--  <input type="file" name="fileToUpload" id="fileToUpload"> --}}
    {{-- <input type="submit" value="Upload Image" name="submit"> --}}
    <br>
    <br>
    {{-- <button type="button" class="btn btn-primary">Upload</button> --}}
    <button type="button" class="btn btn-secondary">Preview</button>
</form>

</center>
</body>
</html>
@endsection
