@extends('layouts.app')

@section('page-title', 'Document Upload')
@section('page-heading', 'Document Upload')

@section('breadcrumbs')
    <li class="breadcrumb-item active">
        Document Upload
    </li>
@stop

@section('content')
    @include('partials.messages')
    
    <div class="container">
        <div class="card">
            <div class="card-header">
                Upload a Document
            </div>
            <div class="card-body">
                <form action="{{ route('upload-data') }}" method="POST" enctype="multipart/form-data" id="uploadForm">
                    @csrf
                    <div class="form-group">
                        <label for="doc_name">Document Name:</label>
                        <input type="text" name="doc_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="file">Upload Document:</label>
                        <input type="file" name="file" class="form-control" id="fileInput" required>
                    </div>
                    <!-- Hidden input for doc_format -->
                    <input type="hidden" name="doc_format" id="docFormatInput" value="">
                    <br>
                    <button class="btn btn-success">Upload File</button>
                </form>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                Document List
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>File Name</th>
                            <th>Format</th>
                            <th>Download</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($documentUploads as $key => $documentUpload)
                    @if($documentUpload->userid === auth()->user()->email)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $documentUpload->doc_name }}</td>
                        <td>{{ $documentUpload->doc_format }}</td> <!-- Display format -->
                        <td>
                            <a href="{{ route('download-file', $documentUpload->doc_id) }}" class="btn btn-info btn-sm">
                                Download
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('delete-file', $documentUpload->doc_id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endif
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- JavaScript to extract and set the doc_format value -->
    <script>
        document.getElementById('fileInput').addEventListener('change', function () {
            const fileInput = this;
            const docFormatInput = document.getElementById('docFormatInput');
            
            if (fileInput.files.length > 0) {
                const fileName = fileInput.files[0].name;
                const fileFormat = fileName.split('.').pop();
                docFormatInput.value = fileFormat.toLowerCase();
            } else {
                docFormatInput.value = '';
            }
        });
    </script>
@stop

@section('styles')
    <style>
        .user.media {
            float: left;
            border: 1px solid #dfdfdf;
            background-color: #fff;
            padding: 15px 20px;
            border-radius: 4px;
            margin-right: 15px;
        }
    </style>
@stop

@section('scripts')

@stop
