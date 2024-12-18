@extends('dashboardAdmin')

@section('content')

<style>
    body {
        font-family: "Poppins", sans-serif;
        color: #333;
    }

    .content {
        padding: 20px;
    }

    h1 {
        font-weight: bold;
        color: #000;
        text-align: right;
    }

    table {
        width: 100%;
        margin-top: 20px;
        border-collapse: collapse;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    th, td {
        padding: 15px;
        text-align: center;
        border-bottom: 1px solid #f0f0f0;
    }

    th {
        background-color: rgba(31, 31, 31, 1);
        color: white;
        font-weight: 600;
    }

    td {
        background-color: #f8f9fa;
        color: #555;
    }

    td:hover {
        background-color: rgba(31, 31, 31, 0.1);
    }

    td a {
        color: #2F527A;
        text-decoration: none;
        font-weight: bold;
    }

    td a:hover {
        text-decoration: underline;
        color: #1E4174;
    }

    .btn {
        background-color: #000;
        color: white;
        border-radius: 5px;
        padding: 8px 20px;
        font-weight: 500;
        border: none;
        transition: all 0.3s ease;
    }

    .btn:hover {
        background-color: #ddd;
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .modal-title {
        color: #000;
        font-weight: 600;
    }

    .modal-header, .modal-footer {
        border: none;
    }

    .modal-body {
        background-color: black;
        padding: 20px;
    }

    .form-label {
        color: #000;
        font-weight: 500;
    }

    .form-control {
        border-radius: 8px;
        padding: 10px;
        border: 1px solid #ddd;
        font-size: 1rem;
    }

    .form-control:focus {
        border-color: #2F527A;
        box-shadow: 0 0 5px rgba(47, 82, 122, 0.2);
    }

    .btn-close {
        background-color: transparent;
        border: none;
    }

    .modal-footer .btn {
        color: white;
    }

    .modal-footer .btn:hover {
        background-color: #ddd;
    }

    @media (max-width: 768px){
        .formTable{
            margin: 0;

            input{
                width: 400px;
            }
        }

        h5{
            padding-right: 50px;
        }

        #keterangan{
            display: flex;
            justify-content: center;
        }

        .textarea{
            width: 400px;
        }
    }
</style>

<div class="content">
    <h1 class="p-5" style="font-weight: bold; text-align: right; color: #000;">Keluhan</h1>
    <h2 id="keterangan" style="text-align: left; color: #000; margin-bottom: 40px; margin-top: 30px; margin-left: 60px;">Detail Keluhan</h2>
    
    <table>
        <thead>
            <tr>
                <th>Nama User</th>
                <th>Email</th>
                <th>Keluhan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($keluhans as $keluhan)
            <tr>
                <td>{{ $keluhan->nama }}</td>
                <td>{{ $keluhan->email }}</td>
                <td><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#detailKeluhan{{ $keluhan->id }}">Detail</button></td>
            </tr>

            <!-- Modal for displaying complaint details -->
            <div class="modal fade" id="detailKeluhan{{ $keluhan->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Detail Keluhan</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            {{ $keluhan->keluhan }}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
</div>

@endsection