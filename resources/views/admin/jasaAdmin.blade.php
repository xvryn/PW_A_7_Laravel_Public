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
        background-color: #f5f5f5;
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

    #notif {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 1000;
        background-color: rgba(31, 31, 31, 1);
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
    }
</style>

<div class="content">
    <h1 class="p-5" style="font-weight: bold; text-align: right; color: #000;">Edit Jasa</h1>

    <table>
        <thead>
            <tr>
                <th>Layanan</th>
                <th>Harga</th>
                <th>Durasi (Hari)</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jasas as $jasa)
            <tr>
                <td>{{ $jasa->nama_jasa }}</td>
                <td>{{ number_format($jasa->harga_jasa, 0, ',', '.') }}</td>
                <td>{{ $jasa->lama_jasa }}</td>
                <td>
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#editModalLayanan{{ $jasa->id }}">Edit</button>
                </td>
            </tr>

            <!-- Modal Edit Layanan -->
            <div class="modal fade" id="editModalLayanan{{ $jasa->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $jasa->id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="editModalLabel{{ $jasa->id }}">Edit Layanan</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('jasaAdmin.update', $jasa->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Harga</label>
                                    <input type="number" name="harga_jasa" class="form-control" value="{{ $jasa->harga_jasa }}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Durasi (Hari)</label>
                                    <input type="number" name="lama_jasa" class="form-control" value="{{ $jasa->lama_jasa }}" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> 
            @endforeach
        </tbody>
    </table>

    @if (session('success'))
        <div class="toast align-items-center border-0" id="notif">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="nav-icon bi bi-check"></i>
                    {{ session('success') }}
                </div>
            </div>
        </div>
    @endif

    @if ($errors->any())
        <div class="toast align-items-center border-0 mt-3" id="notif">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="nav-icon bi bi-x">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </i>
                </div>
            </div>
        </div>
    @endif
</div>

<script>
    $(document).ready(function () {
    $('form').on('submit', function (event) {
        event.preventDefault();
        
        var form = $(this);
        var actionUrl = form.attr('action');
        var formData = form.serialize();
        
        $.ajax({
            url: actionUrl,
            method: 'PUT',
            data: formData,
            success: function (response) {
                alert(response.message);
                location.reload();
            },
            error: function (response) {
                alert('Terjadi kesalahan saat memperbarui data!');
            }
        });
    });
});

</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const notif = document.getElementById('notif');
        if (notif) {
            notif.style.display = 'block';
            setTimeout(() => {
                notif.style.display = 'none';
            }, 3000);
        }
    });
</script>
@endsection