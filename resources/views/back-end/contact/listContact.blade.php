@extends('back-end.master')
@section('title')
Danh sách thử độ phù hợp
@endsection
@section('main')
<div class="container pt-5">
    <h2 class="text-center font-weight-bold text-danger border-bottom mb-5">Danh sách thử độ phù hợp</h2>
    <div class="row">
        <div class="col-sm-12">
            <table class="table list-cate">
                <thead>
                <tr>
                    <th style="text-align:center" scope="col">STT</th>
                    <th style="text-align:center" scope="col">Tên người thử</th>
                    <th style="text-align:center" scope="col">Tuổi người thử</th>
                    <th style="text-align:center" scope="col">Phần trăm phù hợp</th>
                    <th style="text-align:center" scope="col">Ngày thử</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1;?> 
                @foreach($contacts as $contact)
                <tr>
                    <th style="text-align:center" scope="row">{{$i++}}</th>
                    <td style="text-align:center">{{$contact->name}}</td>
                    <td style="text-align:center">{{$contact->age}}</td>
                    <td style="text-align:center">{{$contact->number}} %</td>
                    <td style="text-align:center">{{$contact->created_at}}</td>
                    <td style="text-align:center"><button class="btn btn-danger" onclick="remove({{$contact->id}})"><i class="fas fa-trash-alt"></i></button></td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    function remove(id){
            $.ajax({
                type:'get',
                url: 'admin/destroy-contact',
                data: {
                    id : id,
                },
                success: function (data){
                    swal("Thành công!", data.message, "success");
                    setTimeout(function () { location.reload(true); }, 1000);
                }
            })
        }
</script>
@endsection