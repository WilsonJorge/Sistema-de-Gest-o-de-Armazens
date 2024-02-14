@php
    session()->start();
    $_SESSION['html'] = null;
    $_SESSION['title'] = null;
    $content = null;
@endphp


@if(count($provincias)>0)
    <div class="row">
        <div class="col-md-12">
            <h4><strong>Total:  </strong>{{ count($provincias) }}</h4>
        </div>
    </div>
    @php ob_start(); @endphp
    <table class="display table table-hover" width="100%">
        <thead>
            <tr style="font-weight: bold; color:black">
                <th class="col-1">#</th>
                <th class="col-2">Nome</th>
                <th class="col-2">Data Criação</th>
                <th class="col-2">Estado</th>
                <th class="col-2">Acções</th>
            </tr>
        </thead>
        <tbody>
            @php $cont = 1; @endphp
            @foreach ($provincias as $item)
                <tr>
                    <th scope="row">{{ $cont++ }}</th>
                    <td>{{ $item->nome }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td> @php 
                     if($item->estado == '1') : 
                     @endphp
                     <div class="badge text-bg-success">Activo</div>
                     @php
                     elseif($item->estado == '2'):                    
                    @endphp
                     <div class="badge text-bg-danger">Inactivo</div>
                    @php
                    endif
                    @endphp
                    
                    </td>
                    <td> 
                        <button class="btn btn-primary"><i class="i-Eye"></i> </button>
                        <button class="btn btn-warning"><i class="i-Edit"></i> </button>
                        <button class="btn btn-danger"><i class="i-Remove"></i> </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot></tfoot>
    </table>
    @php $content = ob_get_contents(); @endphp
    {{-- <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            @php
            $paginationButtons = paginationButtons($provincia->meta->current_page, $totalPaginas, $maxButtons);
            @endphp
            <div class="pagination justify-content-end">
                {{ $paginationButtons }}
            </div>
        </div>
    </div> --}}
@else
    <div class="alert alert-info" role="alert">
        <strong class="text-capitalize">Alerta!</strong>
        Nenhum registro encontrado.
    </div>
@endif


@php
    $_SESSION['title'] = "Lista de Provincias";
    $_SESSION['html'] .= $content;
@endphp
